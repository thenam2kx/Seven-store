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


// Require all file Models
require_once './models/HomeModel.php';
require_once './models/AuthClientModel.php';
require_once './models/FavoriteProductModel.php';


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

};
