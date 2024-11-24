<?php

class AuthClientController
{
  public $AuthClientModel;
  public function __construct() {
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
  public function handleSignup(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['ho_ten'];
        $email = $_POST['email'];
        $password = $_POST['mat_khau'];
        $address = $_POST['dia_chi'];
        $phone = $_POST['so_dien_thoai'];
        $date = $_POST['ngay_sinh'];
        $gender = $_POST['gioi_tinh'];
        $status = 1;
        $result = $this->AuthClientModel->addUser($name, $email, $password, $address, $phone, $date, $gender, $status);
        if ($result) {
          header("Location: admin/?act=signin");
        }else {
          header("Location: ?act=signup");
        }
      }
  }
  public function Signout(){
    try {
      require_once "./views/authClient/signout.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
