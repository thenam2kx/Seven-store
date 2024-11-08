<?php
// require_once './config/connect.php';
class UserModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM `nguoi_dungs` ORDER BY id DESC";
    return $this->db->query($sql);
  }

  public function getOne($id) {
    $sql = "SELECT * FROM `nguoi_dungs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($ho_ten, $email, $dia_chi, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $mat_khau, $trang_thai = 1) {
    $sql = "INSERT INTO nguoi_dungs (ho_ten, email, dia_chi, so_dien_thoai, ngay_sinh, gioi_tinh, mat_khau, trang_thai) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
    return $this->db->execute($sql, $ho_ten, $email, $dia_chi, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $mat_khau, $trang_thai);
  }

  public function edit($id, $ho_ten, $email, $dia_chi, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $mat_khau, $trang_thai = 1) {
    $sql = "";
    if ($email !== '') {
      $sql = "UPDATE nguoi_dungs SET ho_ten=?, email=?, dia_chi=?, so_dien_thoai=?, ngay_sinh=?, gioi_tinh=?, mat_khau=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE id=?";
      return $this->db->execute($sql, $ho_ten, $email, $dia_chi, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $mat_khau, $trang_thai, $id);
    } else {
      $sql = "UPDATE nguoi_dungs SET ho_ten=?, email=?, dia_chi=?, so_dien_thoai=?, ngay_sinh=?, gioi_tinh=?, mat_khau=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE id=?";
      return $this->db->execute($sql, $ho_ten, $email, $dia_chi, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $mat_khau, $trang_thai,  $id);
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM `nguoi_dungs` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
