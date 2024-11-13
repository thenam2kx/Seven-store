<?php
class OrderDetailModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getAllStatusOrder()
  {
    $sql = "SELECT * FROM `trang_thai_don_hangs` WHERE 1";
    return $this->db->query($sql);
  }

  public function getOrderDetail($id)
  {
    $sql = "SELECT * FROM `don_hang_cts` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function getAllProducts()
  {
    $sql = "SELECT * FROM `don_hang_cts` dhct INNER JOIN `san_phams` sp ON dhct.san_pham_id = sp.id";
    return $this->db->query($sql);
  }

  public function getTotalAndPriceProduct($id)
  {
    $sql = "SELECT dhct.gia_tien as gia_tien, dhct.so_luong as so_luong FROM `don_hang_cts` dhct INNER JOIN `san_phams` sp ON dhct.san_pham_id = sp.id WHERE dhct.san_pham_id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function getTotalPrice()
  {
    $sql = "SELECT SUM(dhct.gia_tien * dhct.so_luong) as tong_tien FROM `don_hangs` dh INNER JOIN `don_hang_cts` dhct on dh.id = dhct.don_hang_id";
    return $this->db->queryOne($sql);
  }

  public function getInfoUserOrder($id)
  {
    $sql = "SELECT nd.email, nd.so_dien_thoai FROM `don_hangs` dh INNER JOIN `nguoi_dungs` nd ON dh.id = nd.id WHERE dh.id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function getInfoOrder($id)
  {
    $sql = "SELECT * FROM `don_hangs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function updateDetailOrder($status, $id)
  {
    $sql = "UPDATE `don_hangs` SET `trang_thai_don_hang_id`=? WHERE id=?";
    return $this->db->queryOne($sql, $status, $id);
  }
}
