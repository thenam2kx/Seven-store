<?php
// Require file config
require_once '../config/env.php'; // Config env
require_once '../config/helper.php'; // Helper function
require_once '../config/connect.php'; // Connect to database

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/BlogController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ProductController.php';

require_once 'controllers/OrderController.php';

require_once 'controllers/DiscountController.php';


require_once 'controllers/AuthController.php';



// Require toàn bộ file Models
require_once 'models/BlogModel.php';
require_once 'models/CategoryModel.php';
require_once 'models/BannerModel.php';
require_once 'models/ContactModel.php';
require_once 'models/UserModel.php';
require_once 'models/ProductModel.php';

require_once 'models/OrderModel.php';

require_once 'models/DiscountModel.php';




// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards
  '/' => (new DashboardController())->index(),

  // Blogs
  'blog' => (new BlogController())->getAll(),
  'addBlog' => (new BlogController())->add(),
  'editBlog' => (new BlogController())->loadEditView(),
  'handleEditBlog' => (new BlogController())->handleEdit(),
  'deleteBlog' => (new BlogController())->delete(),

  // Category
  'listCategory' => (new CategoryController())->getAll(),
  'addCategory' => (new CategoryController())->add(),
  'editCategory' => (new CategoryController())->loadEditView(),
  'handleEditCategory' => (new CategoryController())->handleEdit(),
  'deleteCategory' => (new CategoryController())->delete(),

  //Banner
  'banners' => (new BannerController())->getAll(),
  'addBanner' => (new BannerController())->addBanner(),
  'editBanner' => (new BannerController())->loadEditView(),
  'handleDditBanner' => (new BannerController())->handleEditBanner(),
  'deleteBanner' => (new BannerController())->delete(),

  //Contact
  'Contacts' => (new ContactController())->getAll(),
  // 'editContact' => (new ContactController())->loadEditView(),
  // 'handleDditContact' => (new ContactController())->handleEditContact(),
  'deleteContact' => (new ContactController())->delete(),


  //User
  'users' => (new UserController())->getAll(),
  'addUser' => (new UserController())->addUser(),
  'editUser' => (new UserController())->loadEditView(),
  'handleEditUser' => (new UserController())->handleEdit(),
  'deleteUser' => (new UserController())->delete(),

  // Products
  'listProduct' => (new ProductController())->getAll(),
  'addProduct' => (new ProductController())->add(),
  'editProduct' => (new ProductController())->loadEditView(),
  'handleEditProduct' => (new ProductController())->handleEdit(),
  'deleteProduct' => (new ProductController())->delete(),

  // Images
  'listImages' => (new ProductController())->listImages(),
  'deleteImage' => (new ProductController())->deleteImage(),
  'addImage' => (new ProductController())->addImage(),

  // Order
  'listOrder' => (new OrderController())->getAll(),
  'editOrder' => (new OrderController())->loadEditView(),
  'handleEditOrder' => (new OrderController())->handleEdit(),
  'deleteOrder' => (new OrderController())->delete(),



  // Discount
  'listDiscount' => (new DiscountController())->getAll(),
  'addDiscount' => (new DiscountController())->add(),
  'editDiscount' => (new DiscountController())->edit(),
  'handleEditDiscount' => (new DiscountController())->handleEdit(),
  'deleteDiscount' => (new DiscountController())->delete(),



  // Auth
  'signin' => (new AuthController())->signIn(),
  'signup' => (new AuthController())->signUp(),
  'fogotPassword' => (new AuthController())->fogotPassword(),
};
