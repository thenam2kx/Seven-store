<?php

class BannerController {
  public function getAll() {
    try {
        $bannerModel = new BannerModel();
        $banners = $bannerModel->getAll();
        require_once "./views/banner/listBanner.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function addBanner() {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $status = $_POST['status'];
        $file = $_FILES['file'];
        $targetDir = 'uploads/banners/';
        $thumbnail = uploadImage($file, $targetDir);
        // save to database
        $bannerModel = new BannerModel();
        $result = $bannerModel->create($thumbnail, $status);
        if ($result) {
          echo "<script>alert('thanh cong')</script>";
          header("Location: ?act=banners");
        }
      }
      require_once "./views/banner/addBanner.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function loadEditView() {
    $id = $_GET['id'];
    $bannerModel = new BannerModel();
    $result = $bannerModel->getOne($id);
    require_once "./views/banner/editBanner.php";
  }

  public function handleEditBanner() {
    $id = $_GET['id'];
    $status = $_POST['status'];
    $file = $_FILES['file'];
    $thumbnail = "";
    if ($file['name']) {
      $targetDir = 'uploads/banners/';
      $thumbnail = uploadImage($file, $targetDir);
    } else {
      $thumbnail = '';
    }
    $bannerModel = new BannerModel();
    $success = $bannerModel->edit(  $id, $thumbnail, $status);
    if ($success) {
      header("Location: ?act=banners");
    }

  }


  public function delete() {
    $id = $_GET['id'];
    $bannerModel = new BannerModel();
    $bannerModel->delete($id);
    $this->getAll();
  }
}
