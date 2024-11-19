<?php
class CardModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function createCard($id) {
    $sql = "insert into gio_hangs (nguoi_dung_id) values (?)";
    return $this->db->execute($sql, $id);
  }
  public function addProductToCard($gio_hang_id, $san_pham_id, $so_luong = 1) {
    $sql = "insert into gio_hang_cts (gio_hang_id, san_pham_id, so_luong) values (?, ?, ?)";
    return $this->db->execute($sql, $gio_hang_id, $san_pham_id, $so_luong);
  }

}
