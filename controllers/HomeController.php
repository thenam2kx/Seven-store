<?php

class HomeController
{
  public $HomeModel;
  public function __construct() {
    $this->HomeModel = new HomeModel();
  }
  public function index()
  {
    $results = $this->HomeModel->getProductsNew();
    $resultsBanner = $this->HomeModel->getImageBanner();
    // $getImageSecond = $this->HomeModel->getImageSecond();
    require_once 'views/home.php';
  }

}
