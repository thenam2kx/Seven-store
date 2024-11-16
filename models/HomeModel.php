<?php
class HomeModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getProductsNew($limit = 8, $page = 1, $keySearch = "")
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

  public function getImageSecond($id) {
    $sql = "select ha.duong_dan from san_phams sp join hinh_anhs ha on sp.id = ha.san_pham_id where sp.id = ? limit 1";
    return $this->db->queryOne($sql, $id);
  }

  public function getImageBanner() {
    $sql = "select  * from banners b  where 1";
    return $this->db->query($sql);
  }
}
