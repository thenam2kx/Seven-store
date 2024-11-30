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
      $idCart = $this->CartModel->getCartOfUser($idUser)['ghid'];

      $checkQuantityProductFromCart = $this->CartModel->checkQuantityProductFromCart($idCart, $idPrd) ?
        $this->CartModel->checkQuantityProductFromCart($idCart, $idPrd)['so_luong'] : 0;
      $checkQuantityProductBeforAddToCart = $this->CartModel->checkQuantityProductBeforAddToCart($idPrd)['so_luong'];
      $quantity = isset($_POST['quantity']) && $_POST['quantity'] ? $_POST['quantity'] : 1;

      if (
        $checkQuantityProductBeforAddToCart <= 0 ||
        $quantity > $checkQuantityProductBeforAddToCart ||
        ($checkQuantityProductFromCart + $quantity) > $checkQuantityProductBeforAddToCart
      ) {
        echo '<script>alert("Sản phẩm không đủ hàng. Vui lòng liên hệ shop để hỗ trợ")</script>';
        exit('<script>window.location.href = "?act=products"</script>');
      }

      if ($idUser !== 0 && $idPrd !== 0) {
        $getCartUser = $this->CartModel->getCartOfUser($idUser);
        $idCart = $getCartUser['ghid'];
        $isSuccess = false;
        $listProductsFromCard = $this->CartModel->getProductsFromCard($idUser);

        foreach ($listProductsFromCard as $productsFromCard) {
          if ($productsFromCard['spid'] == $idPrd) {
            // update quantity priduct to cart
            $result = $this->CartModel->updateProductsFromCard($idCart, $idPrd, $productsFromCard['ghctid'], $quantity);
            $isSuccess = true;
          }
        }

        if ($isSuccess === false) {
          $result = $this->CartModel->addProductToCard($idCart, $idPrd, $quantity);
          echo '<script>alert("Thêm vào giỏ hàng thành công")</script>';
          exit('<script>window.location.href = "?act=products"</script>');
        } else {
          header('Location: ?act=listCart');
        }
      } else {
        header('Location: http://localhost/seven-store/admin/?act=signin');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function addQuantityProduct()
  {
    try {
      $idPrd = isset($_GET['idPrd']) ? $_GET['idPrd'] : 0;
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      $getCartUser = $this->CartModel->getCartOfUser($idUser);
      $idCart = $getCartUser['ghid'];
      $getProductFormCartDetail = $this->CartModel->getProductFormCartDetail($idCart, $idPrd);

      $totalNumberProduct = $this->CartModel->totalNumberProduct($idPrd);
      if ($totalNumberProduct['so_luong'] <= $getProductFormCartDetail['so_luong']) {
        echo '<script>alert("Số lượng không hợp lệ")</script>';
        exit('<script>window.location.href = "?act=listCart"</script>');
      } else {
        $addQuantityProduct = $this->CartModel->addQuantityProductOnCart($getProductFormCartDetail['id'], $idCart, $idPrd);
        header('Location: ?act=listCart');
      }

    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public function removeQuantityProduct()
  {
    try {
      $idPrd = isset($_GET['idPrd']) ? $_GET['idPrd'] : 0;
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      $getCartUser = $this->CartModel->getCartOfUser($idUser);
      $idCart = $getCartUser['ghid'];
      $getProductFormCartDetail = $this->CartModel->getProductFormCartDetail($idCart, $idPrd);

      $totalNumberProduct = $this->CartModel->totalNumberProduct($idPrd);
      if ($getProductFormCartDetail['so_luong'] <= 1) {
        echo '<script>alert("Số lượng không hợp lệ")</script>';
        exit('<script>window.location.href = "?act=listCart"</script>');
      } else {
        $addQuantityProduct = $this->CartModel->removeQuantityProductOnCart($getProductFormCartDetail['id'], $idCart, $idPrd);
        header('Location: ?act=listCart');
      }


    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function updateInputQuantityProduct()
  {
    try {
      $idUser = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
      $idCart = $this->CartModel->getCartOfUser($idUser)['ghid'];
      if (isset($idUser) && $idUser > 0) {
        $getProductsFromCard = $this->CartModel->getProductsFromCard($idUser);
        foreach ($getProductsFromCard as $product) {
          $quantity = $_POST['quantity_' . $product['spid']];
          $updateQuantityProductsFromCard = $this->CartModel->updateQuantityProductsFromCard($idCart, $product['spid'], $product['ghctid'], $quantity);
        }
        header('Location: ?act=listCart');
      }
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
