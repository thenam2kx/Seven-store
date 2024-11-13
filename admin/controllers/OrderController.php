<?php

class OrderController
{
  public function getAll()
  {
    try {
      $userModel = new UserModel();
      $users = $userModel->getAll();
      $orderStatusModel = new OrderStatusModel();
      $listOrderStatus = $orderStatusModel->getAll();
      $orderModel = new OrderModel();
      $orders = $orderModel->getAll();
      require_once "./views/order/listOrder.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function add()
  {
    try {
      $userModel = new UserModel();
      $users = $userModel->getAll();
      $orderStatusModel = new OrderStatusModel();
      $listOrderStatus = $orderStatusModel->getAll();
      if (isset($_POST['save']) && ($_POST['save'])) {
        $name = $_POST['name'];
        $user = $_POST['user'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $totalMoney = $_POST['totalMoney'];
        $pay = $_POST['pay'];
        $payForm = $_POST['payForm'];
        $OrderStatus = $_POST['OrderStatus'];
        $note = $_POST['note'];
        $email = $_POST['email'];
        $payStatus = $_POST['payStatus'];
        $date = $_POST['date'];

        $orderModel = new OrderModel();
        $result = $orderModel->create(
          $user,
          $name,
          $note,
          $email,
          $phone,
          $address,
          $totalMoney,
          $pay,
          $payForm,
          $payStatus,
          $OrderStatus,
          $date
        );

        if ($result) {
          header("Location: ?act=listOrder");
        }
      }
      require_once "./views/order/addOrder.php";
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
        // $name = $_POST['name'];
        // $user = $_POST['user'];
        // $phone = $_POST['phone'];
        // $address = $_POST['address'];
        // $totalMoney = $_POST['totalMoney'];
        // $pay = $_POST['pay'];
        // $payForm = $_POST['payForm'];
        $OrderStatus = $_POST['OrderStatus'];
        // $note = $_POST['note'];
        // $email = $_POST['email'];
        // $payStatus = $_POST['payStatus'];
        // $date=$_POST['date'];


        $orderModel = new OrderModel();
        $result = $orderModel->edit(
          $OrderStatus,
          $id
        );
        if ($result) {
          header("Location: ?act=listOrder");
        }
      }
      require_once "./views/order/addOrder.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function delete()
  {
    $id = $_GET['id'];
    $orderModel = new OrderModel();
    $orderModel->delete($id);
    $this->getAll();
  }
}
