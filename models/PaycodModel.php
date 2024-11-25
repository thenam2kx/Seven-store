<?php
class PaycodModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }



  public function get($id) {
    $sql = "SELECT * FROM don_hangs WHERE id = ?";
    return $this->db->queryOne($sql,$id);
  }

  public function getPayById($id) {
    $sql = "SELECT * FROM gio_hangs WHERE id = ?";
    return $this->db->queryOne($sql, $id);
  }

  public function getCartOfUser($id) {
    $sql = "select gh.id as ghid, nd.email, nd.id as ndid from nguoi_dungs nd
      join gio_hangs gh on nd.id = gh.nguoi_dung_id
      where nd.id = ?";
    return $this->db->queryOne($sql, $id);
  }

  public function createCard($id) {
    $sql = "insert into gio_hangs (nguoi_dung_id) values (?)";
    return $this->db->execute($sql, $id);
  }

  public function getProductsFromCard($nguoi_dung_id) {
    $sql = "select ghct.id as ghctid, gh.id as ghid, sp.id as spid, sp.anh_dai_dien, sp.ten_san_pham, sp.gia_khuyen_mai, ghct.so_luong
      from gio_hang_cts ghct
      join san_phams sp on sp.id = ghct.san_pham_id
      join gio_hangs gh on gh.id = ghct.gio_hang_id
      where gh.nguoi_dung_id = ?";
    return $this->db->query($sql, $nguoi_dung_id);
  }

  public function totalPriceFromCart($ghid) {
    $sql = "select sum(sp.gia_khuyen_mai * ghct.so_luong) as tong_tien from gio_hang_cts ghct
      join san_phams sp on sp.id = ghct.san_pham_id
      where ghct.gio_hang_id = ?";
    return $this->db->queryOne($sql, $ghid);
  }

  public function totalProductsFromCart($ghid) {
    $sql = "select count(ghct.id) as tong_so_luong from gio_hang_cts ghct where ghct.gio_hang_id = ?";
    return $this->db->queryOne($sql, $ghid);
  }

  public function totalNumberProduct($spid) {
    $sql = "select sp.so_luong from san_phams sp where sp.id = ?";
    return $this->db->queryOne($sql, $spid);
  }
}
