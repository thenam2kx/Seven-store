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

  public function getAllProducts($id)
  {
    $sql = "SELECT * FROM `don_hang_cts` dhct INNER JOIN `san_phams` sp ON dhct.san_pham_id = sp.id WHERE dhct.don_hang_id = ?";
    return $this->db->query($sql, $id);
  }

  public function getTotalAndPriceProduct($id)
  {
    $sql = "SELECT dhct.gia_tien as gia_tien, dhct.so_luong as so_luong FROM `don_hang_cts` dhct INNER JOIN `san_phams` sp ON dhct.san_pham_id = sp.id WHERE dhct.san_pham_id=?";
    return $this->db->queryOne($sql, $id);
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
    return $this->db->execute($sql, $status, $id);
  }

  public function updatePayOrder($status, $id)
  {
    $sql = "UPDATE `don_hangs` SET `trang_thai_thanh_toan`=? WHERE id=?";
    return $this->db->execute($sql, $status, $id);
  }

  public function getUserAndInfoOrder($don_hang_id)
  {
    $sql = "select dh.ho_ten, dh.email, dh.so_dien_thoai, dh.dia_chi, dh.ghi_chu,
            dh.id as don_hang_id, dh.ngay_tao, dh.hinh_thuc_thanh_toan, dh.trang_thai_thanh_toan,
            dh.tong_tien, dh.thanh_toan
          from don_hangs as dh
          join nguoi_dungs as nd on dh.nguoi_dung_id = nd.id where dh.id =?";
    return $this->db->queryOne($sql, $don_hang_id);
  }
  public function getTotalPrice($don_hang_id)
  {
    $sql = "select SUM(dhct.gia_tien * dhct.so_luong) as tong_tien
      FROM `don_hang_cts` as dhct where don_hang_id=?";
    return $this->db->queryOne($sql, $don_hang_id);
  }


  public function getProductsByOrder($don_hang_id)
  {
    $sql = "select sp.id as san_pham_id, dhct.so_luong, dhct.gia_tien, sp.ten_san_pham, sp.anh_dai_dien
from don_hang_cts as dhct join san_phams as sp on dhct.san_pham_id = sp.id where dhct.don_hang_id = ?";
    return $this->db->query($sql, $don_hang_id);
  }
}
