<?php

class CartController
{
  public $CartModel;
  public function __construct() {
    $this->CartModel = new CartModel();
  }
  public function AddToCard()
  {
    try {
      $idPrd = isset($_GET['idPrd']) ? $_GET['idPrd'] : 0;
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;

      if ($idUser !== 0 && $idPrd !== 0) {
        $getCartUser = $this->CartModel->getCartOfUser($idUser);
        $idCart = $getCartUser['ghid'];
        $isSuccess = false;
        $listProductsFromCard = $this->CartModel->getProductsFromCard($idUser);
        foreach ($listProductsFromCard as $productsFromCard) {
          if ($productsFromCard['spid'] == $idPrd) {
            $result = $this->CartModel->updateProductsFromCard($idCart, $idPrd, $productsFromCard['ghctid']);
            $isSuccess = true;
          }
        }
        if ($isSuccess === false) {
          $result = $this->CartModel->addProductToCard($idCart, $idPrd);
          header('Location: ?act=listCart');
        } else {
          header('Location: ?act=listCart');
        }
      }
      // header('Location: ?act=products');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function ListCart() {
    try {
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      if ($idUser !== 0) {
        $listProductsFromCard = $this->CartModel->getProductsFromCard($idUser);

        $getGhid = $this->CartModel->getCartOfUser($idUser);
        $ghid = isset($getGhid) ? $getGhid['ghid'] : 0;
        $totalPrice = $this->CartModel->totalPriceFromCart($ghid);
        require_once "./views/cart/listCart.php";
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function deleteProductFromCart() {
    try {
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      $ghid = $_GET['ghid'];
      $ghctid = $_GET['ghctid'];

      if ($idUser !== 0) {
        $result = $this->CartModel->deleteProductsFromCard($ghid, $ghctid);
        header('Location: ?act=listCart');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function deleteAllProductFromCart() {
    try {
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      if ($idUser !== 0) {
        $getGhid = $this->CartModel->getCartOfUser($idUser);
        $ghid = isset($getGhid) ? $getGhid['ghid'] : 0;
        $result = $this->CartModel->deleteAllProductsFromCard($ghid);
        header('Location: ?act=listCart');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
