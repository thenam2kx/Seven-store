<?php
// require_once './config/connect.php';
class BlogModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll($limit = 10, $page = 1) {
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `tin_tucs` ORDER BY id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }
  public function getTotalPage() {
    $sql = "SELECT COUNT(*) AS total FROM `tin_tucs`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
}

  public function getOne($id) {
    $sql = "SELECT * FROM `tin_tucs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($tieu_de, $noi_dung, $anh_avt, $trang_thai = 1) {
    $sql = "INSERT INTO tin_tucs (tieu_de, noi_dung, anh_avt, trang_thai) VALUES (?, ?, ?, ?)";
    return $this->db->execute($sql, $tieu_de, $noi_dung, $anh_avt, $trang_thai);
  }

  public function edit($tieu_de, $noi_dung, $id, $anh_avt, $trang_thai = 1) {
    $sql = "";
    if ($anh_avt !== '') {
      $sql = "UPDATE tin_tucs SET tieu_de=?, noi_dung=?, anh_avt=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE id=?";
      return $this->db->execute($sql, $tieu_de, $noi_dung, $anh_avt, $trang_thai, $id);
    } else {
      $sql = "UPDATE tin_tucs SET tieu_de=?, noi_dung=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE id=?";
      return $this->db->execute($sql, $tieu_de, $noi_dung, $trang_thai, $id);
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM `tin_tucs` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
