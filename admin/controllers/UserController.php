<?php

class UserController {
  public function getAll() {
    try {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        require_once "./views/user/listUser.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function addUser() {
    try {
      if (isset($_POST['save']) && ($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $status = $_POST['status'];


        $userModel = new UserModel();
        $result = $userModel->create($name, $email, $address, $phone, $date, $gender, $password, $status);
        if ($result) {
          echo "<script>alert('thanh cong')</script>";
          header("Location: ?act=users");
        }
      }
      require_once "./views/user/addUser.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }


  public function loadEditView() {
    $id = $_GET['id'];
    $userModel = new UserModel();
    $result = $userModel->getOne($id);
    require_once "./views/user/editUser.php";
  }

  public function handleEdit() {
    $id = $_GET['id'];
    $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $status = $_POST['status'];


    $userModel = new UserModel();
    $success = $userModel->edit( $id, $name, $email, $address, $phone, $date, $gender, $password, $status);
    if ($success) {
      header("Location: ?act=users");
    }

  }


  public function delete() {
    $id = $_GET['id'];
    $userModel = new UserModel();
    $userModel->delete($id);
    $this->getAll();
  }
}
