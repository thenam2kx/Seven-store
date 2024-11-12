<?php

class OrderStatusController
{
  public $orderStatusModel;

  public function __construct()
  {
    $this->orderStatusModel = new OrderStatusModel();
  }
  public function getAll()
  {
    $listOrderStatus = $this->orderStatusModel->getAll();
    require_once "./views/OrderStatus/listOrderStatus.php";
  }


  public function add()
  {
    if (isset($_POST['save']) && ($_POST['save'])) {
      $trang_thai = $_POST['trang_thai'];
      $result = $this->orderStatusModel->add($trang_thai);
      if ($result) {
        header("Location: ?act=listOrderStatus");
      }
    } else {
      require_once "./views/OrderStatus/addOrderStatus.php";
    }
  }

  public function loadEditView()
  {
    $id = $_GET['id'];
    $orderStatus_one = $this->orderStatusModel->getOne($id);
    require_once "./views/OrderStatus/editOrderStatus.php";
  }

  public function handleEdit()
  {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $id = $_POST['id'];
        $trang_thai = $_POST['trang_thai'];
        $result = $this->orderStatusModel->edit($trang_thai, $id);
        if ($result) {
          header("Location: ?act=listOrderStatus");
        }
      }
    } catch (exception $th) {
      echo $th->getMessage();
    }
  }


  public function delete()
  {
    $id = $_GET['id'];
    $orderStatus = $this->orderStatusModel->delete($id);
    if ($orderStatus) {
      $orderStatus = $this->orderStatusModel->delete($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=listOrderStatus');
    exit();
  }
}
