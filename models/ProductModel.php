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
}
