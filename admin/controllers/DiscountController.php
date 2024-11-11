<?php

class DiscountController
{
  public function getAll()
  {
    try {
      $DiscountModel = new DiscountModel();
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
      $totalResult = $DiscountModel->getTotalPage();
      $results = $DiscountModel->getAll();
      $totalPages = ceil($totalResult / $limit);
      require_once "./views/discount/listDiscount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function add()
  {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $code = $_POST['code'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $percent = $_POST['percent'];
        $status = $_POST['status'];
        $DiscountModel = new DiscountModel();
        $result = $DiscountModel->create($code, $startDate, $endDate, $percent, $status);
        if ($result) {
          header("Location: ?act=listDiscount");
        }
      }
      require_once "./views/discount/addDiscount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function edit()
  {
    try {
      $id = $_GET['id'];
      $DiscountModel = new DiscountModel();
      $result = $DiscountModel->getOne($id);
      require_once "./views/discount/editDiscount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function handleEdit()
  {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $percent = $_POST['percent'];
        $status = $_POST['status'];
        $DiscountModel = new DiscountModel();
        $result = $DiscountModel->edit($code, $startDate, $endDate, $percent, $status, $id);
        if ($result) {
          header("Location: ?act=listDiscount");
        }
      }
      // require_once "./views/discount/listDiscount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function delete()
  {
    $id = $_GET['id'];
    $DiscountModel = new DiscountModel();
    $DiscountModel->delete($id);
    $this->getAll();
  }
}
