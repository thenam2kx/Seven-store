<?php
// Require file config
require_once './config/env.php'; // Config env
require_once './config/connect.php'; // Connect to database
require_once './config/helper.php'; // Helper function

// Require all file Controllers
require_once './controllers/HomeController.php';

// Require all file Models

// Route
$act = $_GET['act'] ?? '/';
$id = $_GET['id'] ?? null;

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Trang chủ
  '/' => (new HomeController())->index(),
};
