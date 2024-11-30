<?php
class AuthClientModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function checkUser($email, $phone) {
    $sql = "select * from nguoi_dungs nd where nd.email = ? or nd.so_dien_thoai = ?";
    return $this->db->queryOne($sql, $email, $phone );
  }

  public function getLastUser($email) {
    $sql = "select * from nguoi_dungs nd where nd.email=?";
    return $this->db->queryOne($sql, $email );
  }

  public function createCartForUser($id) {
    $sql = "insert into gio_hangs( nguoi_dung_id ) values (?)";
    return $this->db->queryOne($sql, $id );
  }

  public function addUser($name, $email, $password, $phone) {
    $sql = "INSERT INTO nguoi_dungs (ho_ten, email, mat_khau, so_dien_thoai) VALUES (?, ?, ?, ?)";
    return $this->db->execute($sql, $name, $email, $password, $phone);
  }

  public function getAccountById($id) {
    $sql = "SELECT * FROM nguoi_dungs WHERE id = ?";
    return $this->db->queryOne($sql, $id);
  }
  public function updateAccount($id, $name, $address, $gender) {
    $sql = "UPDATE nguoi_dungs SET ho_ten = ?, dia_chi = ?, gioi_tinh = ? WHERE id = ?";
    return $this->db->execute($sql, $name, $address, $gender, $id);
  }

  public function updatePassWord($id,$new_pass){
    $sql = "UPDATE nguoi_dungs SET mat_khau = ? WHERE id = ?";
    return $this->db->execute($sql, $new_pass, $id);
  }
}
