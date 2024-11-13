<?php
// require_once './config/connect.php';
class OrderModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getAll($keySearch = "")
  {
    $sql = "SELECT * FROM don_hangs ";
    $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai AS trang_thai
    FROM don_hangs
    LEFT JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id";
    if ($keySearch !== '') {
      if ($keySearch !== '') {
        $sql .= " WHERE trang_thai_thanh_toan LIKE '%" . $keySearch . "%'";
      }
    }
    return $this->db->query($sql);
  }
  public function getTotalPage()
  {
    $sql = "SELECT COUNT(*) AS total FROM `don_hangs`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
  }

  public function getOne($id)
  {
    $sql = "SELECT * FROM `don_hangs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($nguoi_dung_id, $ho_ten, $ghi_chu, $email, $so_dien_thoai, $dia_chi, $tong_tien, $thanh_toan, $hinh_thuc_thanh_toan, $trang_thai_thanh_toan, $trang_thai_don_hang_id, $ngay_tao)
  {
    $sql = "INSERT INTO `don_hangs` (nguoi_dung_id, ho_ten, ghi_chu, email, so_dien_thoai, dia_chi, tong_tien, thanh_toan, hinh_thuc_thanh_toan, trang_thai_thanh_toan, trang_thai_don_hang_id, ngay_tao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return $this->db->execute($sql, $nguoi_dung_id, $ho_ten, $ghi_chu, $email, $so_dien_thoai, $dia_chi, $tong_tien, $thanh_toan, $hinh_thuc_thanh_toan, $trang_thai_thanh_toan, $trang_thai_don_hang_id, $ngay_tao);
  }


  public function edit($trang_thai_don_hang_id, $id)
  {
    $sql = "";
    if ($trang_thai_don_hang_id !== '') {
      $sql = "UPDATE `don_hangs` SET
       `trang_thai_don_hang_id`=?
      WHERE id=?";
      return $this->db->execute(
        $sql,
        $trang_thai_don_hang_id,
        $id
      );
    } else {
      $sql = "UPDATE `don_hangs` SET
         `trang_thai_don_hang_id`=?
      WHERE id=?";
      return $this->db->execute(
        $sql,
        $trang_thai_don_hang_id,
        $id
      );
    }
  }

  public function delete($id)
  {
    $sql = "SELECT trang_thai_don_hang_id FROM `don_hangs`
              JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
              WHERE don_hangs.id = ?";

    $result = $this->db->queryOne($sql, $id);

    $sqlStatus = "SELECT trang_thai FROM trang_thai_don_hangs WHERE id = ?";
    $statusResult = $this->db->queryOne($sqlStatus, $result['trang_thai_don_hang_id']);

    if ($statusResult['trang_thai'] == 'Đã hủy') {
      $sqlDelete = "DELETE FROM `don_hangs` WHERE id = ?";
      return $this->db->execute($sqlDelete, $id);
    } else {
      return false;
    }
  }
}
