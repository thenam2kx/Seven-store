<?php
// require_once './config/connect.php';
class BannerModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM `banners` ORDER BY id DESC";
    return $this->db->query($sql);
  }

  public function getOne($id) {
    $sql = "SELECT * FROM `banners` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($duong_dan, $trang_thai = 1) {
    $sql = "INSERT INTO banners (duong_dan, trang_thai) VALUES (?, ?)";
    return $this->db->execute($sql, $duong_dan, $trang_thai);
  }

  public function edit($id, $duong_dan, $trang_thai = 1) {
    $sql = "";
    if ($duong_dan !== '') {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=? WHERE id=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $id);
    } else {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=? WHERE id=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $id);
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM `banners` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
