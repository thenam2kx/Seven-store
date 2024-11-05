<?php
class CategoryModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll($limit = 10, $page = 1) {
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `danh_mucs` ORDER BY danh_muc_id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }
  public function getTotalPage() {
    $sql = "SELECT COUNT(*) AS total FROM `danh_mucs`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
}

  public function getOne($danh_muc_id) {
    $sql = "SELECT * FROM `danh_mucs` WHERE danh_muc_id=?";
    return $this->db->queryOne($sql, $danh_muc_id);
  }

  public function create($ten_danh_muc, $mo_ta, $trang_thai = 1) {
    $sql = "INSERT INTO danh_mucs (ten_danh_muc, trang_thai, mo_ta) VALUES (?, ?, ?)";
    return $this->db->execute($sql, $ten_danh_muc, $trang_thai, $mo_ta);
  }

  public function edit($ten_danh_muc, $trang_thai, $mo_ta, $danh_muc_id) {
    $sql = "UPDATE danh_mucs SET ten_danh_muc=?, trang_thai=?, mo_ta=?, cap_nhat=CURRENT_TIMESTAMP WHERE danh_muc_id=?";
    return $this->db->execute($sql, $ten_danh_muc, $trang_thai, $mo_ta, $danh_muc_id);
  }

  public function delete($danh_muc_id) {
    $sql = "DELETE FROM `danh_mucs` WHERE danh_muc_id=?";
    return $this->db->execute($sql, $danh_muc_id);
  }
}
