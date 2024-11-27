<?php

class OrderDetailController {
  public function getDetail() {
    try {
        $id = $_GET['id'];
        $OrderDetailModel = new OrderDetailModel();
        $resultInfoUserOrder = $OrderDetailModel->getInfoUserOrder($id);
        $resultInfoOrder = $OrderDetailModel->getInfoOrder($id);
        $resultAllProducts = $OrderDetailModel->getAllProducts($resultInfoOrder['id']);
        $resultTotalPrice = $OrderDetailModel->getTotalPrice($id)['tong_tien'];
        $resultPriceFinal = $OrderDetailModel->getInfoOrder($id)['thanh_toan'];
        $resultDiscount = (($resultTotalPrice - $resultPriceFinal) * 100) / $resultTotalPrice;

        $listStatusOrder = $OrderDetailModel->getAllStatusOrder();
        $getProductsByOrder = $OrderDetailModel->getProductsByOrder($id);
        $getUserAndInfoOrder = $OrderDetailModel->getUserAndInfoOrder($id);

        require_once "./views/orderDetail/listOrderDetail.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }

  public function editDetail() {
    try {
        $OrderDetailModel = new OrderDetailModel();
        if (isset($_POST["save"]) && $_POST["save"]) {
          $status = $_POST["status"];
          $id = $_POST["id"];
          if ($status == 9 || $status == 6) {
            $stt = 1;
            $OrderDetailModel->updatePayOrder($stt, $id);
          }
          $result = $OrderDetailModel->updateDetailOrder($status, $id);
        }
        header("Location: ?act=listOrder");
      } catch (\Throwable $th) {
        throw $th;
      }
  }
}
