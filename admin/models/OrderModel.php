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
    $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai AS trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs
            ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id";
    if ($keySearch !== '') {
        $sql .= " WHERE don_hangs.trang_thai_don_hang_id LIKE '%" . $keySearch . "%'";
    }
    $sql .= " ORDER BY don_hangs.ngay_tao DESC";

    return $this->db->query($sql);
}

  public function getOne($id)
  {
    $sql = "SELECT * FROM `don_hangs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
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
    }
  }
}
