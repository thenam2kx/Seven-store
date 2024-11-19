<?php

class CardController
{
  public function AddToCard()
  {
    try {
      $CardModel = new CardModel();



      $HomeModel = new HomeModel();
      $results = $HomeModel->getProductsNew();
      $resultsBanner = $HomeModel->getImageBanner();
      require_once "./views/home.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
