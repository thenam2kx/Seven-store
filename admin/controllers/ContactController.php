<?php

class ContactController {
    public $contactModel;

    public function __construct() {
      $this->contactModel = new ContactModel();
    }
  public function getAll() {
        $listContact = $this->contactModel->getAll();
        require_once "./views/contact/listContact.php";
  }


  public function delete() {
    $id = $_GET['id'];
    $Contact = $this->contactModel->delete($id);
    if($Contact) {
       $Contact = $this->contactModel->delete($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=Contacts');
    exit();
  }
}
