<?php
class CategoryModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll($limit = 10, $page = 1) {
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `danh_mucs` ORDER BY id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }
  public function getTotalPage() {
    $sql = "SELECT COUNT(*) AS total FROM `danh_mucs`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
}

  public function getOne($id) {
    $sql = "SELECT * FROM `danh_mucs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($ten_danh_muc, $trang_thai = 1) {
    $sql = "INSERT INTO danh_mucs (ten_danh_muc, trang_thai) VALUES (?, ?)";
    return $this->db->execute($sql, $ten_danh_muc, $trang_thai);
  }

  public function edit($ten_danh_muc, $trang_thai, $id) {
    $sql = "UPDATE danh_mucs SET ten_danh_muc=?, trang_thai=? WHERE id=?";
    return $this->db->execute($sql, $ten_danh_muc, $trang_thai, $id);
  }

  public function delete($id) {
    $sql = "DELETE FROM `danh_mucs` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
