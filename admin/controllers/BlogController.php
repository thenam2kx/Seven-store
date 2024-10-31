<?php

class BlogController {
  public function getAll() {
    try {
        $blogModel = new BlogModel();
        $blogs = $blogModel->getAll();
        require_once "./views/blog/listBlog.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }

  public function add() {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $content = $_POST['content'];
        $file = $_FILES['file'];
        $targetDir = 'uploads/blogs/';
        $thumbnail = uploadImage($file, $targetDir);
        // save to database
        $blogModel = new BlogModel();
        $result = $blogModel->create($title, $content, $thumbnail, $status);
        if ($result) {
          echo "<script>alert('thanh cong')</script>";
          header("Location: ?act=blog");
        }
      }
      require_once "./views/blog/addBlog.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function loadEditView() {
    $id = $_GET['id'];
    $blogModel = new BlogModel();
    $result = $blogModel->getOne($id);
    require_once "./views/blog/editBlog.php";
  }

  public function handleEdit() {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $content = $_POST['content'];
    $file = $_FILES['file'];
    $thumbnail = "";
    if ($file['name']) {
      $targetDir = 'uploads/blogs/';
      $thumbnail = uploadImage($file, $targetDir);
    } else {
      $thumbnail = '';
    }
    $blogModel = new BlogModel();
    $success = $blogModel->edit($title, $content, $id, $thumbnail, $status);
    if ($success) {
      header("Location: ?act=blog");
    }
    // $this->loadEditView();
    // require_once "./views/blog/editBlog.php";
  }

  public function delete() {
    $id = $_GET['id'];
    $blogModel = new BlogModel();
    $blogModel->delete($id);
    $this->getAll();
  }
}
