<?php

class FavoriteProductController
{
  public $FavoriteProductModel;
  public function __construct()
  {
    $this->FavoriteProductModel = new FavoriteProductModel();
  }

  public function addFavorite()
  {
    try {
      $checkUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : null;
      $isSuccess = false;
      if ($checkUser) {
        $FavoriteProductModel = new FavoriteProductModel();
        $san_pham_id = $_GET['id'];
        $nguoi_dung_id = $_SESSION['username']['id'];

        $listFavoritePrd = $this->FavoriteProductModel->getAllFavoriteFn2($checkUser);

        foreach ($listFavoritePrd as $favorite) {
          if ($favorite['spid'] == $san_pham_id) {
            $isSuccess = true;
          }
        }

        if ($isSuccess) {
          echo '
            <script>
              alert("Sản phẩm đã tồn tại trong trang yêu thích");
              window.location.assign("?act=products")
            </script>
          ';
        } else {
          $result = $FavoriteProductModel->create($san_pham_id, $nguoi_dung_id,);
          header('location: ?act=listFavorite&id=' . $nguoi_dung_id);
        }
      } else {
        header('Location: http://localhost/seven-store/admin/?act=signin');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function index()
  {
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $results = $this->FavoriteProductModel->getAllFavorite($id);
    require_once "./views/favorites/listFavorite.php";
  }


  public function delete()
  {
    $id = $_GET['id'];
    $this->FavoriteProductModel->delete($id);
    $idUser = $_GET['idUser'];
    $results = $this->FavoriteProductModel->getAllFavorite($idUser);
    require_once "./views/favorites/listFavorite.php";
    // $this->index();
  }
}
