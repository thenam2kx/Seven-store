<?php
class OrderModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getAllOrders($userId)
  {
    $sql = "SELECT don_hangs.*, trang_thai_don_hangs.trang_thai AS trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
            WHERE nguoi_dung_id = ?
            ORDER BY ngay_tao DESC";
    return $this->db->query($sql, $userId);
  }

  public function deleteOrder($orderId)
{
    $sqlGetStatus = "SELECT trang_thai_don_hang_id FROM don_hangs WHERE id = ?";
    $order = $this->db->query($sqlGetStatus, $orderId);

    if ($order && in_array($order[0]['trang_thai_don_hang_id'], [1, 2, 3])) {
        $sqlUpdateStatus = "UPDATE don_hangs SET trang_thai_don_hang_id = 7 WHERE id = ?";
        $this->db->execute($sqlUpdateStatus, $orderId);
        return true;
    }

    return false;
}


}
