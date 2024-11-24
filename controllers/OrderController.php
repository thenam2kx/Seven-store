<?php
class OrderController
{
    public $OrderModel;

    public function __construct() {
        $this->OrderModel = new OrderModel();
    }

    public function index() {
        $userId = $_SESSION['username']['id'];
        $orders = $this->OrderModel->getAllOrders($userId);
        require_once "./views/orders/listOrder.php";
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
?>
