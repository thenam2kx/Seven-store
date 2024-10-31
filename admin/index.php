<?php
// Require file config
require_once '../config/env.php'; // Config env
require_once '../config/helper.php'; // Helper function
require_once '../config/connect.php'; // Connect to database

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/BlogController.php';

// Require toàn bộ file Models
require_once 'models/BlogModel.php';


// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards
  '/' => (new DashboardController())->index(),
  'blog' => (new BlogController())->getAll(),
  'addBlog' => (new BlogController())->add(),
  'editBlog' => (new BlogController())->loadEditView(),
  'handleDditBlog' => (new BlogController())->handleEdit(),
  'deleteBlog' => (new BlogController())->delete(),
};
