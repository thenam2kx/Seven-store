<?php
class CartModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
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

  public function updateProductsFromCard($gio_hang_id, $san_pham_id, $gio_hang_ct_id) {
    $sql = "update gio_hang_cts ghct set ghct.so_luong = ghct.so_luong + 1 where ghct.gio_hang_id = ? and ghct.san_pham_id = ? and ghct.id = ?";
    return $this->db->query($sql, $gio_hang_id, $san_pham_id, $gio_hang_ct_id);
  }

  public function addProductToCard($gio_hang_id, $san_pham_id, $so_luong = 1) {
    $sql = "insert into gio_hang_cts (gio_hang_id, san_pham_id, so_luong) values (?, ?, ?)";
    return $this->db->execute($sql, $gio_hang_id, $san_pham_id, $so_luong);
  }

  public function deleteProductsFromCard($ghid, $ghctid) {
    $sql = "delete from gio_hang_cts as ghct where ghct.id = ? and ghct.gio_hang_id = ?";
    return $this->db->execute($sql, $ghctid, $ghid);
  }

  public function deleteAllProductsFromCard($ghid) {
    $sql = "delete from gio_hang_cts ghct where  ghct.gio_hang_id = ?";
    return $this->db->execute($sql, $ghid);
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

  public function getProductFormCartDetail($ghid, $spid) {
    $sql = "select * from gio_hang_cts ghct where ghct.gio_hang_id = ? and ghct.san_pham_id = ?";
    return $this->db->queryOne($sql, $ghid, $spid);
  }

  public function addQuantityProductOnCart($cartDetailId, $cartId, $productId) {
    $sql = "update gio_hang_cts ghct set ghct.so_luong = ghct.so_luong + 1 where ghct.id = ? and ghct.gio_hang_id = ? and ghct.san_pham_id = ?";
    return $this->db->execute($sql, $cartDetailId, $cartId, $productId);
  }

  public function removeQuantityProductOnCart($cartDetailId, $cartId, $productId) {
    $sql = "update gio_hang_cts ghct set ghct.so_luong = ghct.so_luong - 1 where ghct.id = ? and ghct.gio_hang_id = ? and ghct.san_pham_id = ?";
    return $this->db->execute($sql, $cartDetailId, $cartId, $productId);
  }
}
