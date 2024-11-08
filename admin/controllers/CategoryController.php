<?php

class CategoryController {
  public function getAll() {
    try {
        $categoryModel = new CategoryModel();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
        $totalResult = $categoryModel->getTotalPage();
        $categories = $categoryModel->getAll($limit, $page);
        $totalPages = ceil($totalResult / $limit);
        require_once "./views/category/listCategory.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }

  public function add() {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $CategoryModel = new CategoryModel();
        $result = $CategoryModel->create($title,$status);
        if ($result) {
          echo "<script>alert('thanh cong')</script>";
          header("Location: ?act=listCategory");
        }
      }
      require_once "./views/category/addCategory.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function loadEditView() {
    $id = $_GET['id'];
    $categoryModel = new CategoryModel();
    $result = $categoryModel->getOne($id);
    require_once "./views/category/editCategory.php";
  }

  public function handleEdit() {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $categoryModel = new CategoryModel();
    $success = $categoryModel->edit($title, $status, $id);
    if ($success) {
      header("Location: ?act=listCategory");
    }
  }

  public function delete() {
    $id = $_GET['id'];
    $categoryModel = new CategoryModel();
    $categoryModel->delete($id);
    $this->getAll();
  }
}
