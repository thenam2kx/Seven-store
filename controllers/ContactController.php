<?php

class ContactController {
    public $contactModel;

    public function __construct() {
      $this->contactModel = new ContactModel();
    }


    public function create(){
      require_once "./views/contact/contact.php";
    }

    public function add() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $email = isset($_POST['email']) ? $_POST['email'] : '';
          $so_dien_thoai = isset($_POST['so_dien_thoai']) ? $_POST['so_dien_thoai'] : '';
          $noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';


          $errors = [];

          if (empty($email)) {
              $errors['email'] = 'Vui lòng nhập đủ thông tin';
          }
          if (empty($so_dien_thoai)) {
              $errors['so_dien_thoai'] = 'Vui lòng nhập đủ thông tin';
          }
          if (empty($noi_dung)) {
              $errors['noi_dung'] = 'Vui lòng nhập đủ thông tin';
          }
          if (empty($errors)) {

             $this->contactModel->add($email, $so_dien_thoai, $noi_dung );

              unset($_SESSION['errors']);
              header('Location: ?act=contact');
              exit();
          } else {
              $_SESSION['errors'] = $errors;
              header('Location: ?act=contact');
              exit();
          }
      }
  }

}
