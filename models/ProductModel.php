<?php
class ProductModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getProducts($limit = 8, $page = 1, $keySearch = "")
  {
    $offset = ($page - 1) * $limit;
    $sql = "select sp.id, sp.ten_san_pham, sp.gia_ban, sp.gia_khuyen_mai, sp.anh_dai_dien, dm.ten_danh_muc
      from san_phams sp
      join danh_mucs dm on sp.danh_muc_id = dm.id ";
    if ($keySearch !== '') {
      $sql.= " where sp.ten_san_pham LIKE '%".$keySearch."%'";
    }
    $sql.= "ORDER BY sp.id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }

  public function getTotalPage()
  {
    $sql = "SELECT COUNT(*) AS total FROM `san_phams`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
  }

  public function getProductsByPriceSort($limit = 16, $page = 1, $condition = "")
  {
    $offset = ($page - 1) * $limit;
    $sql = "select * from san_phams sp join danh_mucs dm on sp.danh_muc_id = dm.id ORDER BY sp.gia_khuyen_mai $condition LIMIT $offset, $limit";
    return $this->db->query($sql);
  }

  public function getProductsByCategory($condition = 1)
  {
    $sql = "select * from san_phams sp join danh_mucs dm on sp.danh_muc_id = dm.id where dm.id =?";
    return $this->db->query($sql, $condition);
  }

  public function getProductsByPrice($min, $max) {
    $sql = "select * from san_phams sp join danh_mucs dm on sp.danh_muc_id = dm.id where sp.gia_khuyen_mai > ? and sp.gia_khuyen_mai < ?";
    return $this->db->query($sql, $min, $max);
  }

  public function getAllCategory() {
    $sql = "select * from  danh_mucs dm where 1";
    return $this->db->query($sql);
  }

  public function getDetailProduct($id) {
    $sql = "select * from san_phams sp join danh_mucs dm on sp.danh_muc_id = dm.id where sp.id = ?";
    return $this->db->queryOne($sql, $id);
  }

  public function getImagesByProduct($id) {
    $sql = "select ha.duong_dan from hinh_anhs ha join san_phams sp on ha.san_pham_id = sp.id where sp.id = ?";
    return $this->db->query($sql, $id);
  }

  public function getRateProduct($id) {
    $sql = "select dg.diem_danh_gia, dg.noi_dung, dg.ngay_tao, nd.ho_ten
      from san_phams sp
      join danh_gias dg on sp.id = dg.san_pham_id
      join nguoi_dungs nd on nd.id = dg.nguoi_dung_id
      where sp.id = ?";
    return $this->db->query($sql, $id);
  }

  public function getProductThesSame($dmId, $spId) {
    $sql = "select *, sp.id as spid, dm.id as dmid from  san_phams sp join danh_mucs dm ON dm.id = sp.danh_muc_id where dm.id = ? and sp.id <> ?";
    return $this->db->query($sql, $dmId, $spId);
  }

  public function getTotalRateAndCount($id) {
    $sql = "SELECT
      AVG(dg.diem_danh_gia) AS trung_binh_diem,
      COUNT(dg.diem_danh_gia) AS tong_danh_gia
      FROM san_phams sp
      JOIN danh_gias dg ON sp.id = dg.san_pham_id
      WHERE sp.id = ?";
    return $this->db->queryOne($sql, $id);
  }

  public function getComment($idPrd) {
    $sql ="SELECT * from binh_luans inner join nguoi_dungs on binh_luans.nguoi_dung_id = nguoi_dungs.id where binh_luans.san_pham_id = ? ORDER BY binh_luans.ngay_tao DESC";
    return $this->db->query($sql, $idPrd);
  }

  public function addComment($idProduct, $idUser, $content) {
    $sql = "INSERT INTO binh_luans (san_pham_id, nguoi_dung_id, noi_dung) VALUES (?, ?, ?)";
    return $this->db->query($sql, $idProduct, $idUser, $content);
  }

}