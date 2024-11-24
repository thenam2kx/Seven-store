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

  public function getAccount(){
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/account.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function editAccount(){
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/editAccount.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function handleEditAccount(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_SESSION['username']['id'];
      $name = $_POST['ho_ten'];
      $email = $_POST['email'];
      $address = $_POST['dia_chi'];
      $phone = $_POST['so_dien_thoai'];
      $date = $_POST['ngay_sinh'];
      $gender = $_POST['gioi_tinh'];
      $result = $this->AuthClientModel->updateAccount($id, $name, $email, $address, $phone, $date, $gender);
      if ($result){
        header("Location: ?act=account&=$id");
      }
    }
  }
  public function changePassword(){
    try {
      $id = $_SESSION['username']['id'];
      $Account = $this->AuthClientModel->getAccountById($id);
      require_once "./views/authClient/changePassword.php";
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function handleChangePassword(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $id = $_SESSION['username']['id'];
      // var_dump($id); die();
      $old_pass=$_POST['old_pass'];
      // var_dump($old_pass); die();
      $new_pass=$_POST['new_pass'];
      // var_dump($new_pass); die();
      $re_pass=$_POST['re_pass'];
      // var_dump($_SESSION['username']); die();
      if(isset($old_pass)&& $old_pass!==''&& $old_pass!==null&& $old_pass == $_SESSION['username']['mat_khau']){
        // var_dump($old_pass);die();
        if($new_pass == $re_pass){
        // var_dump($new_pass);die();
          $result=$this->AuthClientModel->updatePassWord($id,$new_pass);
          // var_dump($result);die();
          if($result){
            $_SESSION['username']['mat_khau'] = $new_pass;
            header('location: ?act=account&='.$id);
          }
        }else{
          header('location: ?act=changePassword');
        }
      }else{
        // header('location: ?act=changePassword');
        echo"balbal";
      }
    }
  }
}
