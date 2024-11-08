<?php
// require_once './config/connect.php';
class BannerModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM `banners` ORDER BY bannerId DESC";
    return $this->db->query($sql);
  }

  public function getOne($bannerId) {
    $sql = "SELECT * FROM `banners` WHERE bannerId=?";
    return $this->db->queryOne($sql, $bannerId);
  }

  public function create($duong_dan, $trang_thai = 1) {
    $sql = "INSERT INTO banners (duong_dan, trang_thai) VALUES (?, ?)";
    return $this->db->execute($sql, $duong_dan, $trang_thai);
  }

  public function edit($bannerId, $duong_dan, $trang_thai = 1) {
    $sql = "";
    if ($duong_dan !== '') {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE bannerId=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $bannerId);
    } else {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE tin_tuc_id=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $bannerId);
    }
  }

  public function delete($bannerId) {
    $sql = "DELETE FROM `banners` WHERE bannerId=?";
    return $this->db->execute($sql, $bannerId);
  }
}
