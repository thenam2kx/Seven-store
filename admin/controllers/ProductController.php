<?php

class ProductController
{
  public function getAll()
  {
    try {
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->getAll(20, 1);
      $ProductModel = new ProductModel();
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
      $totalResult = $ProductModel->getTotalPage();
      $products = $ProductModel->getAll($limit, $page);
      $totalPages = ceil($totalResult / $limit);
      require_once "./views/product/listProduct.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function add() {
    try {
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->getAll(20, 1);
      if (isset($_POST['save']) && ($_POST['save'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $priceInput = $_POST['priceInput'];
        $priceSell = $_POST['priceSell'];
        $priceDiscount = $_POST['priceDiscount'];
        $inputDate = $_POST['inputDate'];
        $total = $_POST['total'];
        $status = $_POST['status'];
        $contentShort = $_POST['contentShort'];
        $contentdetail = $_POST['contentdetail'];
        $file = $_FILES['file'];
        $targetDir = 'uploads/products/';
        $thumbnail = uploadImage($file, $targetDir);

        $ProductModel = new ProductModel();
        $result = $ProductModel->create(
          $category,
          $name,
          $contentShort,
          $contentdetail,
          $priceInput,
          $priceSell,
          $priceDiscount,
          $inputDate,
          $total,
          $thumbnail,
          $status
        );
      }
      require_once "./views/product/addProduct.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function loadEditView() {
    $id = $_GET['id'];
    $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll(20, 1);
    $ProductModel = new ProductModel();
    $result = $ProductModel->getOne($id);
    require_once "./views/product/editProduct.php";
  }

  public function handleEdit()
  {
    try {
      $categoryModel = new CategoryModel();
      $categories = $categoryModel->getAll(20, 1);
      if (isset($_POST['save']) && ($_POST['save'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $priceInput = $_POST['priceInput'];
        $priceSell = $_POST['priceSell'];
        $priceDiscount = $_POST['priceDiscount'];
        $total = $_POST['total'];
        $status = $_POST['status'];
        $contentShort = $_POST['contentShort'];
        $contentdetail = $_POST['contentdetail'];
        $file = $_FILES['file'];
        $targetDir = 'uploads/products/';
        $thumbnail = '';
        if ($file['name']) {
          $thumbnail = uploadImage($file, $targetDir);
        } else {
          $thumbnail = '';
        }

        $ProductModel = new ProductModel();
        $result = $ProductModel->edit(
          $category,
          $name,
          $contentShort,
          $contentdetail,
          $priceInput,
          $priceSell,
          $priceDiscount,
          $total,
          $thumbnail,
          $status,
          $id
        );
        if ($result) {
          header("Location: ?act=listProduct");
        }
      }
      require_once "./views/product/addProduct.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function delete() {
    $id = $_GET['id'];
    $ProductModel = new ProductModel();
    $ProductModel->delete($id);
    $this->getAll();
  }


}
