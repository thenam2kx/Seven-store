<?php

class ProductController
{
  public $ProductModel;
  public function __construct() {
    $this->ProductModel = new ProductModel();
  }
  public function index()
  {
    // $results = $this->ProductModel->getProducts();
    $result = [];
    $resultCategory = $this->ProductModel->getAllCategory();
    $keySearch = isset($_POST['keysearch']) ? $_POST['keysearch'] : '';
    $sortPrice = isset($_GET['sortPrice']) ? $_GET['sortPrice'] : '';
    $sortLimit = isset($_GET['sortLimit']) ? $_GET['sortLimit'] : '';
    $sortCategory = isset($_GET['category']) ? $_GET['category'] : '';
    $priceMin = isset($_GET['priceMin']) ? $_GET['priceMin'] : '';
    $priceMax = isset($_GET['priceMax']) ? $_GET['priceMax'] : '';

    $limit = isset($_GET['limit']) ? $_GET['limit'] : 16;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalResult = $this->ProductModel->getTotalPage();
    $totalPages = ceil($totalResult / $limit);

    if ($keySearch !== '') {
      $results = $this->ProductModel->getProducts($limit = 16, $page = 1,$keySearch);
    } else if ($sortPrice !== '') {
      $results = $this->ProductModel->getProductsByPriceSort($limit = 16, $page = 1,$sortPrice);
    } else if ($sortLimit !== '') {
      $results = $this->ProductModel->getProducts($sortLimit, $page = 1);
    } else if ($sortCategory !== '') {
      $results = $this->ProductModel->getProductsByCategory($sortCategory);
    } else if ($priceMin !== '' && $priceMax !== '') {
      $results = $this->ProductModel->getProductsByPrice($priceMin, $priceMax);
    } else {
      $results = $this->ProductModel->getProducts($limit, $page);
    }


    require_once 'views/products/listProducts.php';
  }


  public function detailProduct()
  {
    $idPrd = isset($_GET['id']) ? $_GET['id'] : 0;
    $infoProduct = $this->ProductModel->getDetailProduct($idPrd);
    $imageByProduct = $this->ProductModel->getImagesByProduct($idPrd);
    $productTheSame = $this->ProductModel->getProductThesSame($infoProduct['danh_muc_id'], $idPrd);
    $rateProduct = $this->ProductModel->getRateProduct($idPrd);
    $totalRateAndCount = $this->ProductModel->getTotalRateAndCount($idPrd);


    require_once 'views/products/detailProduct.php';
  }

}
