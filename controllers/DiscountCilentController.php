<?php

class DiscountCilentController
{
  public $DiscountCilentModel;
  public function __construct() {
    $this->DiscountCilentModel = new DiscountCilentModel();
  }


  public function index() {
        $results = $this->DiscountCilentModel->getAllDiscount();
        require_once "./views/discounts/listDiscount.php";
}

}







