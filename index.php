<?php
session_start();
// Require file config
require_once './config/env.php'; // Config env
require_once './config/helper.php'; // Helper function
require_once './config/connect.php'; // Connect to database

// Require all file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/AuthClientController.php';
require_once './controllers/FavoriteProductController.php';
require_once './controllers/ProductController.php';
require_once './controllers/BlogClientController.php';
require_once './controllers/CartController.php';

require_once './controllers/DiscountCilentController.php';


// Require all file Models
require_once './models/HomeModel.php';
require_once './models/AuthClientModel.php';

require_once './models/FavoriteProductModel.php';

require_once './models/ProductModel.php';
require_once './models/BlogClientModel.php';
require_once './models/CartModel.php';

require_once './models/DiscountCilentModel.php';


// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null;

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
  // Trang chủ
  '/' => (new HomeController())->index(),

  //AuthClient
  'signup' => (new AuthClientController())->signup(),
  'handleSignup' => (new AuthClientController())->handleSignup(),
  // 'fogotPassword' => (new AuthClientController())->fogotPassword(),
  // 'handleFogotPassword' => (new AuthClientController())->handleFogotPassword(),
  'signout' => (new AuthClientController())->Signout(),


  // Favorite Product
    'listFavorite' => (new FavoriteProductController())->index(),
    'addFavorite' => (new FavoriteProductController())->addFavorite(),
    'deleteFavorite' => (new FavoriteProductController())->delete(),


  'products' => (new ProductController())->index(),
  'productDetail' => (new ProductController())->detailProduct(),

  //Blog
  'blog' => (new BlogClientController())->viewBlog(),
  'blog-post' => (new BlogClientController())->blogPost(),

  // Card Action
  'addToCard' => (new CartController())->AddToCard(),
  'listCart' => (new CartController())->ListCart(),
  'deleteProductFromCart' => (new CartController())->deleteProductFromCart(),
  'deleteAllProductFromCart' => (new CartController())->deleteAllProductFromCart(),

  //Comment
  'addComment' => (new ProductController())->addComment(),

  //account
  'account' => (new AuthClientController())->getAccount(),
  'editAccount' => (new AuthClientController())->editAccount(),
  'handleEditAccount' => (new AuthClientController())->handleEditAccount(),
  'changePassword' => (new AuthClientController())->changePassword(),
  'handleUpdatePassword' => (new AuthClientController())->handleChangePassword(),

  // Discount
  'listDiscount' => (new DiscountCilentController())->index(),


};
