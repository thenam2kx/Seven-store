<?php
class OrderController
{
  public $OrderModel;

  public function __construct()
  {
    $this->OrderModel = new OrderModel();
  }

  public function index()
  {
    $userId = $_SESSION['username']['id'];
    $orders = $this->OrderModel->getAllOrders($userId);
    require_once "./views/orders/listOrder.php";
  }

  public function order()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    $cartId = isset($_GET['cartId']) ? $_GET['cartId'] : 0;
    if ($userId !== 0 && $cartId !== 0) {
      $totalPriceProducts = $this->OrderModel->totalPriceProducts($cartId);
      $result = $this->OrderModel->getAllDetailOrder($cartId, $userId);
    }
    require_once "./views/orders/order.php";
  }

  public function addOrder()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    if ($userId !== 0 && isset($_POST['orderbtn']) && $_POST['orderbtn']) {
      $cartId = ($this->OrderModel->selectCartByUser($userId))['ghid'];
      $totalMoney = ($this->OrderModel->totalPriceProducts($cartId))['tong_tien'];
      $discount = $_POST['discount'];
      $actionPay = $_POST['actionPay'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $note = $_POST['note'];
      $statusOrder = 1;
      $priceDiscount = $totalMoney;

      $statusDiscount = true;

      $getDiscountCode = $this->OrderModel->getDiscountCode($discount);
      if ($discount !== '') {
        if (
          $getDiscountCode !== '' &&
          $getDiscountCode['ngay_bat_dau'] > date("Y-m-d H:i:s") ||
          $getDiscountCode["ngay_ket_thuc"] < date("Y-m-d H:i:s")
        ) {
          echo '<script>alert("Mã khuyến mãi không hợp lệ")</script>';
          $statusDiscount= false;
          exit('<script>window.location.href = "?act=order&cartId='.$cartId.'"</script>');
        } else {
          $priceDiscount = $totalMoney - ($totalMoney * $getDiscountCode['phan_tram'] / 100);
        }
      }

      $getAllProductFromCart = $this->OrderModel->getAllProductFromCart($userId);
      foreach ($getAllProductFromCart as $product) {
        $getInfoProduct = $this->OrderModel->getInfoProduct($product['spid']);
        if ($product['ghct_so_luong'] > $getInfoProduct['so_luong']) {
          echo '<script>alert("Số lượng sản phẩm không hợp lệ")</script>';
          exit('<script>window.location.href = "?act=order&cartId='.$cartId.'"</script>');
        }
      }


      if ($statusDiscount) {
        $result = $this->OrderModel->createOrder(
          $userId,
          $name,
          $note,
          $email,
          $phone,
          $address,
          $totalMoney,
          $priceDiscount,
          $actionPay,
          $statusOrder,
        );
        $idOrderRecent = ($this->OrderModel->getOrderRecentCreate($userId))['id'];
        foreach ($getAllProductFromCart as $product) {
          $createOrderDetail = $this->OrderModel->createOrderDetail($idOrderRecent, $product['san_pham_id'], $product['ghct_so_luong'], $product['gia_khuyen_mai']);
          $updateQuantityProductAfterOrder = $this->OrderModel->updateQuantityProductAfterOrder($product['ghct_so_luong'], $product['spid']);
        }
        $deleteAllProductsFromCard = $this->OrderModel->deleteAllProductsFromCard($cartId);
        header('Location: ?act=listOrders');
      } else {
        header('Location: ?act=order&cartId='.$cartId);
      }

    }
  }

  public function detailOrder()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    $orderId = isset($_GET['orderId']) ? $_GET['orderId'] : 0;
    if ($userId !== 0 && $orderId !== 0) {
      $totalMoney = ($this->OrderModel->totalPriceProductsFromOrderDetail($orderId))['tong_tien'];
      $selectOrderStatus = $this->OrderModel->selectOrderStatus();
      $result = $this->OrderModel->detailOrder($orderId, $userId);
    }
    require_once "./views/orders/detailOrder.php";
  }

  public function deleteOrder()
  {
    $orderId = $_GET['id'] ?? null;

    if ($orderId) {
      $result = $this->OrderModel->deleteOrder($orderId);

      if ($result) {
        echo "<script>alert('Hủy đơn hàng thành công!'); window.location.href = '?act=listOrders';</script>";
      } else {
        echo "<script>alert('Đơn hàng không thể hủy!'); window.location.href = '?act=listOrders';</script>";
      }
    }
  }
}
