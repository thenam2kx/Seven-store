<?php

class ProductController
{
  public $ProductModel;
  public function __construct()
  {
    $this->ProductModel = new ProductModel();
  }
  public function index()
  {
    $result = [];
    $resultCategory = $this->ProductModel->getAllCategory();
    $keySearch = isset($_POST['keysearch']) ? $_POST['keysearch'] : '';
    $sortPrice = isset($_GET['sortPrice']) ? $_GET['sortPrice'] : '';
    $sortLimit = isset($_GET['sortLimit']) ? $_GET['sortLimit'] : '';

    // Pagiante
    $limit = isset($_GET['limit']) ? $_GET['limit'] : 9;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalResult = $this->ProductModel->getTotalPage();
    $totalPages = ceil($totalResult / $limit);

    $category = isset($_POST['category']) ? $_POST['category'] : '';

    $getMaxPriceFromProducts = $this->ProductModel->getMaxPriceFromProducts();
    $minPrice= 0;
    $maxPrice =  $getMaxPriceFromProducts['gia_lon_nhat'];
    $interval = ceil(($maxPrice - $minPrice) / 3 / 100000) * 100000;
    $priceRanges = [
      ['min' => $minPrice, 'max' => $minPrice + $interval],
      ['min' => $minPrice + $interval, 'max' => $minPrice + 2 * $interval],
      ['min' => $minPrice + 2 * $interval, 'max' => $maxPrice],
    ];

    $priceMax = null;
    $priceMin = null;
    $priceDetails = isset($_POST['price']) ? json_decode($_POST['price'], true) : null;
    if ($priceDetails) {
      $priceMax = $priceDetails['max'];
      $priceMin = $priceDetails['min'];
    }

    if ($keySearch !== '') {
      $results = $this->ProductModel->getProducts($limit = 9, $page = 1, $keySearch);
    } else if ($sortPrice !== '') {
      $results = $this->ProductModel->getProductsByPriceSort($limit = 9, $page = 1, $sortPrice);
    } else if ($sortLimit !== '') {
      $results = $this->ProductModel->getProducts($sortLimit, $page = 1);
    } else if (isset($_POST['submit']) && $category !== '' || $priceMax) {
      $results = $this->ProductModel->getProductsByPriceAndCategory($category, $priceMax, $priceMin);
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
    //comment
    $comment = $this->ProductModel->getComment($idPrd);

    require_once 'views/products/detailProduct.php';
  }

  public function addComment()
  {
    $checkuser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : null;
    if ($checkuser) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['username'])) {
          $idPrd = $_GET['id'];
          // var_dump($idPrd);die;
          $idUser = $_SESSION['username']['id'];
          $content = $_POST['content'];
          $this->ProductModel->addComment($idPrd, $idUser, $content);
          header('location: ?act=productDetail&id='. $idPrd);
          echo "<script>alert('Thêm bình luận thành công.');</script>";
          exit;
        }
      }
    } else {
      header('Location: http://localhost/seven-store/admin/?act=signin');
    }
  }
}
