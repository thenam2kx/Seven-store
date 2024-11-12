<?php

class OrderDetailController {
  public function getAll() {
    try {

        $OrderDetailModel = new OrderDetailModel();
        $resultInfoUserOrder = $OrderDetailModel->getInfoUserOrder(2);
        $resultInfoOrder = $OrderDetailModel->getInfoOrder(2);
        $resultAllProducts = $OrderDetailModel->getAllProducts();
        $resultTotalPrice = $OrderDetailModel->getTotalPrice();

        require_once "./views/orderDetail/listOrderDetail.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }
}
