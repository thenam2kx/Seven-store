<?php
class AuthClientModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }
  public function addUser($name, $email, $password, $address, $phone, $date, $gender, $status) {
    $sql = "INSERT INTO nguoi_dungs (ho_ten, email, mat_khau, dia_chi, so_dien_thoai, ngay_sinh, gioi_tinh, trang_thai) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
    return $this->db->execute($sql, $name, $email, $password, $address, $phone, $date, $gender, $status);
  }

  public function getAccountById($id) {
    $sql = "SELECT * FROM nguoi_dungs WHERE id = ?";
    return $this->db->queryOne($sql, $id);
  }
  public function updateAccount($id, $name, $email, $address, $phone, $date, $gender) {
    $sql = "UPDATE nguoi_dungs SET ho_ten = ?, email = ?, dia_chi = ?, so_dien_thoai = ?, ngay_sinh = ?, gioi_tinh = ? WHERE id = ?";
    return $this->db->execute($sql, $name, $email, $address, $phone, $date, $gender, $id);
  }

  public function updatePassWord($id){
    $sql = "UPDATE nguoi_dungs SET mat_khau = ? WHERE id = ?";
    return $this->db->execute($sql, $id);
  }
}
