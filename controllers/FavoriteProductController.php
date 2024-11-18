<?php

class FavoriteProductController
{
  public $FavoriteProductModel;
  public function __construct() {
    $this->FavoriteProductModel = new FavoriteProductModel();
  }

  public function addFavorite()
  {
    try {
      $FavoriteProductModel = new FavoriteProductModel();
        $san_pham_id = $_GET['id'];
        // var_dump($san_pham_id); die();
        $nguoi_dung_id = $_SESSION['username']['id'];
        // var_dump($_SESSION['username']['id']); die();
        $result = $FavoriteProductModel->create(
          $san_pham_id,
          $nguoi_dung_id,
        );
        header('location: ?act=listFavorite&id='.$nguoi_dung_id);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function index() {
        $id = $_GET['id'];
        $results = $this->FavoriteProductModel->getAllFavorite($id);
        require_once "./views/favorites/listFavorite.php";
}


public function delete() {
      $id = $_GET['id'];
      $this->FavoriteProductModel->delete($id);
      $this->index();
  }
}







