<?php

class AuthClientController
{
  public $AuthClientModel;
  public function __construct()
  {
    $this->AuthClientModel = new AuthClientModel();
  }

  public function signup()
  {
    try {
      require_once "./views/authClient/signup.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function handleSignup()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['ho_ten'];
      $email = $_POST['email'];
      $password = $_POST['mat_khau'];
      $phone = $_POST['so_dien_thoai'];

      $isUser = $this->AuthClientModel->checkUser($email, $phone);
      if ($isUser) {
        echo '<script>alert("Người dùng đã tồn tại")</script>';
        exit('<script>window.location.href = "?act=signup"</script>');
      } else {
        $result = $this->AuthClientModel->addUser($name, $email, $password, $phone);
        if ($result) {
          $getLastUser = $this->AuthClientModel->getLastUser($email);
          $this->AuthClientModel->createCartForUser($getLastUser['id']);
          header("Location: admin/?act=signin");
        } else {
          header("Location: ?act=signup");
        }
      }
    }
  }
  public function Signout()
  {
    try {
      require_once "./views/authClient/signout.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function getAccount()
  {
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/account.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function editAccount()
  {
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/editAccount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function handleEditAccount()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_SESSION['username']['id'];
      $name = $_POST['ho_ten'];
      $address = $_POST['dia_chi'];
      $gender = $_POST['gioi_tinh'];
      $result = $this->AuthClientModel->updateAccount($id, $name, $address, $gender);
      if ($result) {
        header("Location: ?act=account&=$id");
      }
    }
  }
  public function changePassword()
  {
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/changePassword.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function handleChangePassword()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_SESSION['username']['id'];
      $old_pass = $_POST['old_pass'];
      $new_pass = $_POST['new_pass'];
      $re_pass = $_POST['re_pass'];
      if (isset($old_pass) && $old_pass !== '' && $old_pass !== null && $old_pass == $_SESSION['username']['mat_khau']) {
        if ($new_pass == $re_pass) {
          $result = $this->AuthClientModel->updatePassWord($id, $new_pass);
          if ($result) {
            $_SESSION['username']['mat_khau'] = $new_pass;
            header('location: ?act=account&=' . $id);
          }
        } else {
          header('location: ?act=changePassword');
        }
      } else {
        echo '<script>alert("Mật khẩu không hợp lệ!")</script>';
        exit('<script>window.location.href = "?act=changePassword"</script>');
      }
    }
  }
}
