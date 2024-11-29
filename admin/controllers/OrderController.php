<?php

class OrderController
{

  public function getAll()
  {
    try {
      $key = isset($_POST['search']) ? $_POST['search'] : '';
      $userModel = new UserModel();
      $users = $userModel->getAll();
      $orderStatusModel = new OrderStatusModel();
      $listOrderStatus = $orderStatusModel->getAll();
      $orderModel = new OrderModel();
      $orders = $orderModel->getAll($key);
      require_once "./views/order/listOrder.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function loadEditView()
  {
      $id = $_GET['id'];
      $userModel = new UserModel();
      $users = $userModel->getAll();
      $orderStatusModel = new OrderStatusModel();
      $listOrderStatus = $orderStatusModel->getAll();
      $orderModel = new OrderModel();
      $result = $orderModel->getOne($id);

      $validTransitions = [
          1 => [2],
          2 => [3],
          3 => [4],
          4 => [5],
          5 => [6, 8],
          6 => [9],
          7 => [10],
          8 => [10],
          9 => [],
          10 => []               
      ];

      $currentStatus = $result['trang_thai_don_hang_id'];
      $validStatuses = $validTransitions[$currentStatus] ?? [];

      require_once "./views/order/editOrder.php";
  }


  public function handleEdit()
  {
    try {
      $userModel = new UserModel();
      $users = $userModel->getAll();
      $orderStatusModel = new OrderStatusModel();
      $listOrderStatus = $orderStatusModel->getAll();
      if (isset($_POST['save']) && ($_POST['save'])) {
        $id = $_POST['id'];
        $OrderStatus = $_POST['OrderStatus'];

        if ($OrderStatus == 9 || $OrderStatus == 6) {
          $stt = 1;
          $OrderDetailModel = new OrderDetailModel();
          $OrderDetailModel->updatePayOrder($stt, $id);
        }

        $orderModel = new OrderModel();
        $result = $orderModel->edit(
          $OrderStatus,
          $id
        );
        if ($result) {
          header("Location: ?act=listOrder");
        }
      }
      require_once "./views/order/listOrder.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

}
