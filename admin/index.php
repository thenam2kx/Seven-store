<?php
// Require file config
require_once '../config/env.php'; // Config env
require_once '../config/connect.php'; // Connect to database
require_once '../config/helper.php'; // Helper function

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards
  '/' => (new DashboardController())->index(),
};
