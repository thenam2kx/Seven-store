<?php

class OrderController {
    public $orderModel;

    public function __construct() {
      $this->orderModel = new OrderModel();
    }
  public function getAll() {
        $listOrder = $this->orderModel->getAll();
        require_once "./views/Order/listOrder.php";
  }

  public function loadEditView() {
    $id = $_GET['id'];
    $order_one = $this->orderModel->getOne($id);
    require_once "./views/Order/editOrder.php";
  }

  public function handleEdit()
  {
      try {
        if (isset($_POST['save']) && ($_POST['save'])) {
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            $result = $this->orderModel->edit($trang_thai,$id);
            if ($result) {
              header("Location: ?act=listOrder");
            }
          }
      } catch (exception $th) {
        echo $th->getMessage();
      }
  }


  public function delete() {
    $id = $_GET['id'];
    $order = $this->orderModel->delete($id);
    if($order) {
       $order = $this->orderModel->delete($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=listOrder');
    exit();
  }
}
