<?php

class PaycodController {
  public $PaycodModel;

  public function __construct() {
    $this->PaycodModel = new PaycodModel();
  }


  public function create(){
    try {
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      if ($idUser !== 0) {
        $listProductsFromCard = $this->PaycodModel->getProductsFromCard($idUser);
        $users = $this->PaycodModel->get($idUser);
        $getGhid = $this->PaycodModel->getCartOfUser($idUser);
        $ghid = isset($getGhid) ? $getGhid['ghid'] : 0;
        $totalPrice = $this->PaycodModel->totalPriceFromCart($ghid);
        require_once "./views/pay/pay.php";
      }
    } catch (\Throwable $th) {
      throw $th;
    }


  }

}
