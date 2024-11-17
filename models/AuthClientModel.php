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
  
}
