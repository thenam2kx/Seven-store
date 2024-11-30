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
    $sql = "SELECT don_hangs.*, don_hangs.id as dhid, trang_thai_don_hangs.trang_thai AS trang_thai
      FROM don_hangs
      INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
      WHERE nguoi_dung_id = ?
      ORDER BY ngay_tao DESC";
    return $this->db->query($sql, $userId);
  }

  public function createOrder($userId, $name, $note, $email, $phone, $address, $totalMoney, $totalPay, $actionPay, $statusOrder = 1, $statusPay = 0)
  {
    $sql = "insert into don_hangs (
        nguoi_dung_id,
        trang_thai_don_hang_id,
        ho_ten,
        ghi_chu,
        email,
        so_dien_thoai,
        dia_chi,
        tong_tien,
        thanh_toan,
        hinh_thuc_thanh_toan,
        trang_thai_thanh_toan
      ) values (?,?,?,?,?,?,?,?,?,?,?)";
    return $this->db->execute($sql, $userId, $statusOrder, $name, $note, $email, $phone, $address, $totalMoney, $totalPay, $actionPay, $statusPay);
  }

  public function getOrderRecentCreate($userId)
  {
    $sql = "select * from don_hangs dh where dh.nguoi_dung_id = ? order by dh.id desc limit 1";
    return $this->db->queryOne($sql, $userId);
  }

  public function getInfoProduct($prdId)
  {
    $sql = "select * from san_phams sp where sp.id = ?";
    return $this->db->queryOne($sql, $prdId);
  }

  public function createOrderDetail($don_hang_id, $san_pham_id, $so_luong, $gia_tien)
  {
    $sql = "insert into don_hang_cts (don_hang_id, san_pham_id, so_luong, gia_tien)
      values (?,?,?,?)";
    return $this->db->execute($sql, $don_hang_id, $san_pham_id, $so_luong, $gia_tien);
  }

  public function getDiscountCode($code)
  {
    $sql = "select * from khuyen_mais km where km.ma_km = ?";
    return $this->db->queryOne($sql, $code);
  }

  public function getAllProductFromCart($userId)
  {
    $sql = "select *, gh.id as ghid, ghct.id as ghctid, sp.id as spid, ghct.so_luong as ghct_so_luong
        from gio_hang_cts ghct
        join gio_hangs gh ON gh.id = ghct.gio_hang_id
        join san_phams sp on sp.id = ghct.san_pham_id
        where gh.nguoi_dung_id = ?";
    return $this->db->query($sql, $userId);
  }

  public function updateQuantityProductAfterOrder($quantity, $spid)
  {
    $sql = "update san_phams sp set sp.so_luong = sp.so_luong - ? where sp.id = ?";
    return $this->db->execute($sql, $quantity, $spid);
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

  public function getInfoOrderDetail($orderId)
  {
    $sql = "select * from don_hangs dh
      join don_hang_cts dhct on dhct.don_hang_id = dh.id
      where dh.id = ?";
    return $this->db->query($sql, $orderId);
  }

  public function updateQuantityProductAfterDeleteOrder($quantity, $spid)
  {
    $sql = "update san_phams sp set sp.so_luong = sp.so_luong + ? where sp.id = ?";
    return $this->db->execute($sql, $quantity, $spid);
  }

  public function getAllDetailOrder($cartId, $userId)
  {
    $sql = "select *, nd.id as ndid, gh.id as ghid, ghct.id as ghctid, sp.id as spid, ghct.so_luong as so_luong_gh
      from gio_hangs gh
      join gio_hang_cts ghct on ghct.gio_hang_id = gh.id
      join san_phams sp on sp.id = ghct.san_pham_id
      join nguoi_dungs nd on nd.id = gh.nguoi_dung_id
      where nd.id = ? AND gh.id = ?";
    return $this->db->query($sql, $userId, $cartId);
  }

  public function detailOrder($orderId, $userId)
  {
    $sql = "select *, dh.id as dhid, dhct.id as dhctid, sp.id as spid, dhct.so_luong as dhct_so_luong
      from don_hangs dh
      join don_hang_cts dhct on dhct.don_hang_id = dh.id
      join san_phams sp on sp.id = dhct.san_pham_id
      where dh.nguoi_dung_id = ? and dh.id = ?";
    return $this->db->query($sql, $userId, $orderId);
  }

  public function totalPriceProducts($ghid) {
    $sql = "select sum(sp.gia_khuyen_mai * ghct.so_luong) as tong_tien from gio_hang_cts ghct
      join san_phams sp on sp.id = ghct.san_pham_id
      where ghct.gio_hang_id = ?";
    return $this->db->queryOne($sql, $ghid);
  }

  public function totalPriceProductsFromOrderDetail($dhid) {
    $sql = "select sum(dhct.gia_tien * dhct.so_luong) as tong_tien from don_hangs dh
      join don_hang_cts dhct on dhct.don_hang_id = dh.id
      where dh.id = ?";
    return $this->db->queryOne($sql, $dhid);
  }

  public function selectCartByUser($userId) {
    $sql = "select gh.id as ghid from nguoi_dungs nd join gio_hangs gh on gh.nguoi_dung_id = nd.id where nd.id = ?";
    return $this->db->queryOne($sql, $userId);
  }

  public function selectOrderStatus() {
    $sql = "select * from trang_thai_don_hangs ttdh";
    return $this->db->query($sql);
  }

  public function deleteAllProductsFromCard($ghid) {
    $sql = "delete from gio_hang_cts ghct where ghct.gio_hang_id = ?";
    return $this->db->execute($sql, $ghid);
  }
}
