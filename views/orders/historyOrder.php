<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Chi tiết đơn hàng</title>
  <link rel="shortcut icon" href="assets/images/custom/logo2.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php require_once "views/layouts/libs_css.php"; ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    .order-history-card {
      /* border: 1px solid #ddd; */
      border-radius: 8px;
      padding: 16px;
      margin-bottom: 16px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    .order-status {
      font-size: 0.9rem;
      font-weight: bold;
    }

    .order-details-btn {
      /* font-size: 0.9rem; */
    }

    .product-list {
      margin-top: 8px;
    }

    .product-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
      padding: 8px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .product-item img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 4px;
    }

    .product-info {
      flex: 1;
      margin-left: 12px;
    }

    .product-price {
      font-weight: 500;
    }

    .action-buttons {
      margin-top: 10px;
    }
  </style>

</head>

<body>

  <!-- HEADER -->
  <?php require_once "views/layouts/header.php"; ?>

  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store/">Trang chủ</a></li>
        <li>Đơn hàng</li>
        <li>Chi tiết đơn hàng</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->

  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Lịch sử đơn hàng</h1>
        <!-- Order History Cards -->
        <div class="order-history">
          <!-- Order Card 1 -->
          <?php foreach ($orders as $order): ?>
            <div class="order-history-card">
              <div class="d-flex justify-content-end align-items-center mb-2">
                <div
                  class="
                    order-status
                    <?=
                    $order['trang_thai_don_hang_id'] ===  10 ||
                    $order['trang_thai_don_hang_id'] === 7 ||
                    $order['trang_thai_don_hang_id'] === 8 ? 'text-danger' : '' ?>
                    <?=
                    $order['trang_thai_don_hang_id'] === 6 ||
                    $order['trang_thai_don_hang_id'] === 9 ? 'text-success' : '' ?>
                    <?=
                    $order['trang_thai_don_hang_id'] === 1 ||
                    $order['trang_thai_don_hang_id'] === 2 ||
                    $order['trang_thai_don_hang_id'] === 3 ||
                    $order['trang_thai_don_hang_id'] === 4 ||
                    $order['trang_thai_don_hang_id'] === 5 ? 'text-warning' : '' ?>
                    pb-2"
                ><?= $order['trang_thai'] ?></div>
              </div>

              <div class="product-list">
                <?php $products = array_slice($this->OrderModel->getAllProductFromOrder($order['dhid']), 0, 1) ?>
                <?php foreach($products as $product): ?>
                  <div class="product-item">
                    <img src="admin/<?= $product['anh_dai_dien'] ?>" alt="Product 1">
                    <div class="product-info">
                      <div><?= $product['ten_san_pham'] ?></div>
                      <div class="product-price"><?= $product['dhct_so_luong'] ?> x <?= formatCurrency($product['dhct_gia_tien']) ?><sup>đ</sup></div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>

              <div class="d-flex align-items-center justify-content-between gap-3 mt-4">
                <div class="">
                  <strong style="font-size: 1.1rem; color: #0d6efd;">Tổng tiền:</strong>
                  <span style="font-size: 1.1rem; font-weight: bold; color: #0d6efd;"><?= formatCurrency($order['thanh_toan']) ?><sup>đ</sup></span>
                </div>

                <div class="action-button d-flex justify-content-end gap-3">
                  <a href="?act=detailOrder&orderId=<?= $order['dhid'] ?>" class="btn btn-outline-primary order-details-btn">Xem chi tiết</a>
                  <a href="?act=updateOrderByUser&orderId=<?= $order['dhid'] ?>" class="btn btn-outline-success" <?= $order['trang_thai_don_hang_id'] === 6 ? '' : 'onclick="return false;"' ?>>Đã nhận hàng</a>
                  <a href="?act=deleteOrder&id=<?= $order['dhid'] ?>" class="btn btn-outline-danger" <?= $order['trang_thai_don_hang_id'] >= 4 ? 'onclick="return false;"' : '' ?> >Hủy đơn hàng</a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php require_once "views/layouts/footer.php"; ?>

  <!-- JAVASCRIPT -->
  <?php require_once "views/layouts/libs_js.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
