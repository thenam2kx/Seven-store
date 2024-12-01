<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Danh sách đơn hàng của tôi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php require_once "views/layouts/libs_css.php"; ?>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .tt-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #e0e0e0;
      padding: 15px 0;
    }

    .tt-col-description {
      flex: 1;
      margin-right: 20px;
    }

    .tt-description .tt-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .tt-price {
      font-size: 0.95rem;
      color: #6c757d;
      margin-bottom: 5px;
    }

    .tt-col-btn a:hover {
      color: red;
    }


    .tt-pagination-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .tt-pagination ul {
      display: inline-flex;
      list-style: none;
      padding: 0;
    }

    .tt-pagination li {
      margin: 0 5px;
    }

    .tt-pagination a {
      display: block;
      padding: 8px 12px;
      border: 1px solid #e0e0e0;
      border-radius: 5px;
      color: #007bff;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .tt-pagination a:hover {
      background-color: #f1f1f1;
    }

    .tt-pagination .active a {
      background-color: #007bff;
      color: #fff;
    }

    #js-back-to-top {
      background-color: #007bff;
      color: #fff;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      text-align: center;
      line-height: 50px;
      font-size: 1.2rem;
      position: fixed;
      bottom: 20px;
      right: 20px;
      transition: all 0.3s ease;
    }

    #js-back-to-top:hover {
      background-color: #0056b3;
    }

    .status-canceled {
      text-decoration: line-through;
    }

    .status-cancele {
      background-color: red;
    }

    .tt-product-img {
      border-radius: 15%;
      width: 100px;
      height: 100px;
      overflow: hidden;
    }

    .space-between {
      display: flex;
      justify-content: space-between !important;
    }

    .tt-col-description {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .tt-col-description span {
      display: block;
      margin-top: 0.5rem;
      font-size: 1rem;
    }


    .tt-img {
      min-width: 185px;
      text-align: center;
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
        <li>Đơn hàng của tôi</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->
  <div id="tt-pageContent" class="d-<?= empty($orders) ? 'block' : 'none' ?>">
    <div class="container-indent nomargin">
      <div class="tt-empty-cart">
        <span class="tt-icon icon-f-39"></span>
        <h1 class="tt-title">Bạn chưa có đơn hàng nào</h1>
        <p>Mua hàng ngay để hưởng những ưu đãi hấp dẫn...</p>
        <a href="?act=products" class="btn">Mua hàng ngay</a>
      </div>
    </div>
  </div>

  <div id="tt-pageContent" class="d-<?= !empty($orders) ? 'block' : 'none' ?>">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Đơn hàng của tôi</h1>
        <div class="tt-wishlist-box" id="js-wishlist-removeitem">
          <div class="tt-wishlist-list">
            <?php
            $counter = 1;
            $Disabled = '';
            $Disabled = 'btn-disabled';
            ?>
            <?php if (!empty($orders)): ?>
              <?php foreach ($orders as $order): ?>
                <div class="tt-item">
                  <div class="tt-col space-between">
                    <h3 class="tt-col-title tt-title me-3"><?= $counter++ ?></h3>
                    <div class="tt-description me-3">
                      <div class="tt-col-description me-3">
                        <div class="tt-img me-3 <?= $order['trang_thai_don_hang_id'] == 7 ? 'status-canceled' : '' ?>">
                          Mã đơn hàng:<a href="#"><?= $order['id'] ?></a>
                        </div>
                        <div class="tt-img me-3">
                          Ngày đặt: <?= date('d-m-Y', strtotime($order['ngay_tao'])) ?>
                        </div>
                        <div class="tt-img me-3"> Trạng thái đơn hàng:
                          <span class="text-success fw-bold border-success flex-wrap <?= $order['trang_thai_don_hang_id'] == 7 ? ' text-danger' : '' ?>">
                            <?= $order['trang_thai'] ?>
                          </span>
                        </div>
                        <div class="tt-img me-3">
                          Hình thức thanh toán: <span class="fw-bold text-success flex-wrap"> <?= $order['hinh_thuc_thanh_toan'] == 0 ? 'COD' : 'MOMO' ?> </span>
                        </div>
                        <div class="tt-img me-3">
                          Trạng thái thanh toán: <span class="fw-bold text-success flex-wrap"> <?= $order['trang_thai_thanh_toan'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' ?> </span>
                        </div>
                      </div>
                      <!-- <div class="tt-col-description mt-3">
                        <div class="tt-img tt-product-img">
                          <img src="admin/<?= $product['anh_dai_dien'] ?>" alt="aaaaaaaa" >
                        </div>
                        <div class="tt-description mt-3">
                          <h2 class="tt-title "><a href="?act=productDetail&id=<?= $product['id'] ?>"><?= $product['ten_san_pham'] ?></a></h2>
                          <div class="tt-description"><?= substr($product['mo_ta_ngan'], 0, 100) ?>...</div>
                        </div>
                      </div> -->

                      <div class="tt-btn me-3 mt-3 d-flex justify-content-end gap-4">
                        <a class="btn-link" href="?act=updateOrderByUser&orderId=<?= $order['dhid'] ?>" data-target="#ModalquickView" style="display: <?= $order['trang_thai_don_hang_id'] === 6 ? 'block' : 'none' ?>">
                          <i class="icon-f-73"></i>Đã nhận hàng
                        </a>
                        <a class="btn-link" href="?act=detailOrder&orderId=<?= $order['dhid'] ?>" data-target="#ModalquickView"><i class="icon-f-73"></i>Xem chi tiết</a>
                        <a class="btn-link js-removeitem <?= $order['trang_thai_don_hang_id'] == 7 ? 'disabled' : '' ?>"
                          href="<?= $order['trang_thai_don_hang_id'] != 7 ? '?act=deleteOrder&id=' . $order['id'] : '#' ?>"
                          onclick="<?= $order['trang_thai_don_hang_id'] != 7 ? "return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');" : "return false;" ?>"
                          style="<?= $order['trang_thai_don_hang_id'] == 7 || $order['trang_thai_don_hang_id'] == 6 ? 'pointer-events: none; opacity: 0.6; cursor: not-allowed;' : '' ?>">
                          <i class="icon-h-02"></i>
                          <?= $order['trang_thai_don_hang_id'] == 7 ? 'Hủy đơn hàng' : 'Hủy đơn hàng' ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>Không có đơn hàng nào.</p>
            <?php endif; ?>
          </div>
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
