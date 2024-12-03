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
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    if ($userId == 0) { header('Location: http://localhost/seven-store/'); }
    $orders = $this->OrderModel->getAllOrders($userId);
    require_once "./views/orders/historyOrder.php";
  }

  public function order()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    if ($userId == 0) { header('Location: http://localhost/seven-store/'); }
    $cartId = isset($_GET['cartId']) ? $_GET['cartId'] : 0;
    if ($userId !== 0 && $cartId !== 0) {
      $inforUser = $_SESSION['username'];
      $totalPriceProducts = $this->OrderModel->totalPriceProducts($cartId);
      $result = $this->OrderModel->getAllDetailOrder($cartId, $userId);
    }
    require_once "./views/orders/orderPage.php";
    // require_once "./views/orders/order.php";
  }

  public function addOrder()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    if ($userId == 0) { header('Location: http://localhost/seven-store/'); }
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

      if ($name === '' || $email === '' || $phone === '' || $address === '') {
        echo '<script>alert("Thông tin người nhận khong thể để trống")</script>';
        exit('<script>window.location.href = "?act=order&cartId=' . $cartId . '"</script>');
      }

      $getDiscountCode = $this->OrderModel->getDiscountCode($discount);
      if ($discount !== '') {
        if (
          $getDiscountCode !== '' &&
          $getDiscountCode['ngay_bat_dau'] > date("Y-m-d H:i:s") ||
          $getDiscountCode["ngay_ket_thuc"] < date("Y-m-d H:i:s")
        ) {
          echo '<script>alert("Mã khuyến mãi không hợp lệ")</script>';
          $statusDiscount = false;
          exit('<script>window.location.href = "?act=order&cartId=' . $cartId . '"</script>');
        } else {
          $priceDiscount = $totalMoney - ($totalMoney * $getDiscountCode['phan_tram'] / 100);
        }
      }

      $getAllProductFromCart = $this->OrderModel->getAllProductFromCart($userId);
      foreach ($getAllProductFromCart as $product) {
        $getInfoProduct = $this->OrderModel->getInfoProduct($product['spid']);
        if ($product['ghct_so_luong'] > $getInfoProduct['so_luong']) {
          echo '<script>alert("Số lượng sản phẩm không hợp lệ")</script>';
          exit('<script>window.location.href = "?act=order&cartId=' . $cartId . '"</script>');
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

        if (isset($result) && $result) {
          $totalPriceProducts = $this->OrderModel->totalPriceProducts($cartId)['tong_tien'];
          $emailUser = $email;
          $subject = 'Đơn hàng của bạn đã được đặt thành công. vui lòng chú ý điện thoại để nhận hàng';
          $content = '<!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Order Confirmation</title>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                  }
                  .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                  }
                  .email-header {
                    text-align: center;
                    padding: 10px 0;
                    border-bottom: 1px solid #ddd;
                  }
                  .email-header h1 {
                    color: #333;
                  }
                  .email-body {
                    padding: 20px 0;
                  }
                  .order-info {
                    margin-bottom: 20px;
                  }
                  .order-info p {
                    margin: 5px 0;
                  }
                  .product-list {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                  }
                  .product-list th,
                  .product-list td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                  }
                  .product-list th {
                    background-color: #f8f8f8;
                    color: #333;
                  }
                  .total {
                    font-size: 18px;
                    font-weight: bold;
                    text-align: right;
                    margin-top: 10px;
                  }
                  .email-footer {
                    text-align: center;
                    padding: 10px 0;
                    border-top: 1px solid #ddd;
                    color: #777;
                    font-size: 14px;
                  }
                </style>
              </head>
              <body>
                <div class="email-container">
                  <div class="email-header">
                    <h1>Thông báo đơn hàng</h1>
                  </div>

                  <div class="email-body">
                    <div class="order-info">
                      <p><strong>Mã đơn hàng:</strong> #' . $idOrderRecent . '</p>
                      <p><strong>Tên khách hàng:</strong> ' . $name . '</p>
                      <p><strong>Email:</strong> ' . $email . '</p>
                      <p><strong>Ngày đặt hàng:</strong> ' . date("d/m/Y") . '</p>
                    </div>

                    <table class="product-list">
                      <thead>
                        <tr>
                          <th>Sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Tổng giá</th>
                        </tr>
                      </thead>
                      <tbody>';
          foreach ($getAllProductFromCart as $product) {
            $content .= '<tr>
                            <td>' . $product['ten_san_pham'] . '</td>
                            <td>' . $product['ghct_so_luong'] . '</td>
                            <td>' . formatCurrency($product['gia_khuyen_mai']) . '</td>
                            <td>' . formatCurrency($product['gia_khuyen_mai'] * $product['ghct_so_luong']) . '</td>
                          </tr>';
          }
          $content .= '</tbody>
                    </table>

                    <div class="total">Tổng tiền: ' . formatCurrency($totalPriceProducts) . '</div>
                  </div>

                  <div class="email-footer">
                    <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
                    <p>Mọi thắc mắc, xin vui lòng liên hệ sevenstore@gmail.com</p>
                  </div>
                </div>
              </body>
            </html>
            ';
          sendEmail($emailUser, $subject, $content);
        }

        $deleteAllProductsFromCard = $this->OrderModel->deleteAllProductsFromCard($cartId);
        header('Location: ?act=listOrders');
      } else {
        header('Location: ?act=order&cartId=' . $cartId);
      }
    }
  }

  public function detailOrder()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    if ($userId == 0) { header('Location: http://localhost/seven-store/'); }
    $orderId = isset($_GET['orderId']) ? $_GET['orderId'] : 0;
    if ($userId !== 0 && $orderId !== 0) {
      $totalMoney = ($this->OrderModel->totalPriceProductsFromOrderDetail($orderId))['tong_tien'];
      $selectOrderStatus = $this->OrderModel->selectOrderStatus();
      $result = $this->OrderModel->detailOrder($orderId, $userId);
    }
    require_once "./views/orders/detailOrderPage.php";
  }


  public function updateOrderByUser()
  {
    $userId = isset($_SESSION['username']['id']) ? $_SESSION['username']['id'] : 0;
    $orderId = isset($_GET['orderId']) ? $_GET['orderId'] : 0;
    if ($userId !== 0 && $orderId !== 0) {
      $result = $this->OrderModel->updateOrderByUser($orderId, $userId);
    }
    // require_once "./views/orders/detailOrder.php";
    $this->index();
  }


  public function deleteOrder()
  {
    $orderId = $_GET['id'] ?? null;

    if ($orderId) {
      $getInfoOrderDetail = $this->OrderModel->getInfoOrderDetail($orderId);

      if ($getInfoOrderDetail['trang_thai_don_hang_id'] >= 4) {
        echo '<script>alert("Không thể hủy đơn hàng")</script>';
        exit('<script>window.location.href = "?act=listOrders"</script>');
      }
      $result = $this->OrderModel->deleteOrder($orderId);

      foreach ($getInfoOrderDetail as $content) {
        $this->OrderModel->updateQuantityProductAfterDeleteOrder($content['so_luong'], $content['san_pham_id']);
      }

      if ($result) {
        echo "<script>alert('Hủy đơn hàng thành công!'); window.location.href = '?act=listOrders';</script>";
      } else {
        echo "<script>alert('Đơn hàng không thể hủy!'); window.location.href = '?act=listOrders';</script>";
      }
    }
  }
}
