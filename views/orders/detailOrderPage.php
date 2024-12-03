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
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    .btn-primary {
      background-color: #2879fe;
      border: none;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #2879fe;
    }

    .btn-secondary {
      color: #757575;
      border-color: #e0e0e0;
    }

    .btn-secondary:hover {
      color: #212121;
    }

    .product-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .product-item:last-child {
      border-bottom: none;
    }

    .product-info {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .product-info img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 10px;
      border: 1px solid #e0e0e0;
    }

    .total {
      font-weight: bold;
      font-size: 1.3rem;
      color: #2879fe;
    }

    h1,
    h2 {
      color: #424242;
    }

    form label {
      color: #616161;
    }

    a {
      color: unset !important;
      text-decoration: none !important;
    }

    input,
    select {
      border-radius: 6px;
      border: 1px solid #e0e0e0;
    }

    input:focus,
    select:focus {
      border-color: #2879fe;
      box-shadow: 0 0 5px rgba(255, 87, 34, 0.3);
    }

    .row-header {
      background-color: #2879fe;
      padding: 6px;
      text-align: center;
      color: #fff;
      border-radius: 4px;
      font-size: 20px;
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

  <div class="container my-4">
    <div class="row">
      <!-- Order Summary -->
      <div class="col-lg-8">
        <p class="row-header">Tóm tắt đơn hàng</p>
        <?php foreach ($result as $row): ?>
          <div class="product-item">
            <div class="product-info">
              <img src="admin/<?= $row['anh_dai_dien'] ?>" alt="Product 1" />
              <div>
                <div><?= $row['ten_san_pham'] ?></div>
                <small class="text-muted"> <?= formatCurrency($row['gia_khuyen_mai']) ?><sup>đ</sup></small>
                <small class="text-muted">x <?= $row['dhct_so_luong'] ?></small>
              </div>
            </div>
            <span><?= formatCurrency($row['gia_khuyen_mai'] * $row['dhct_so_luong']) ?><sup>đ</sup></span>
          </div>
        <?php endforeach ?>
        <div class="d-flex justify-content-between mt-3">
          <div class="total">Tổng tiền</div>
          <div class="total"><?= formatCurrency($totalMoney) ?><sup>đ</sup></div>
        </div>
      </div>

      <!-- Billing Details -->
      <div class="col-lg-4">
        <p class="row-header">Thông tin thanh toán</p>
        <form action="?act=createOrder" method="post">
          <div class="mb-3">
            <label for="fullName" class="form-label">Họ tên</label>
            <input
              type="text"
              id="fullName"
              class="form-control"
              placeholder="Nhập tên người nhận hàng"
              value="<?= $result[0]['ho_ten'] ?>"
              name="name"
              disabled />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              class="form-control"
              placeholder="example@example.com"
              value="<?= $result[0]['email'] ?>"
              name="email"
              disabled />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input
              type="text"
              id="phone"
              class="form-control"
              placeholder="0123456789"
              value="<?= $result[0]['so_dien_thoai'] ?>"
              name="phone"
              disabled />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input
              type="text"
              id="address"
              class="form-control"
              placeholder="123 Hà Nội"
              value="<?= $result[0]['dia_chi'] ?>"
              name="address"
              disabled />
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="promoCode" class="form-label">Mã khuyến mãi</label>
              <input
                type="text"
                id="promoCode"
                class="form-control"
                name="discount"
                value="<?= formatCurrency($totalMoney - $result[0]['thanh_toan']) ?>"
                placeholder="Nhập mã khuyến mãi" disabled />
            </div>
            <div class="col-md-6 mb-3">
              <label for="paymentMethod" class="form-label">Phương thức thanh toán</label>
              <select id="paymentMethod" class="form-select" name="actionPay" disabled>
                <option value="0" selected>Cod</option>
                <option value="1">VNPay</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">Ghi chú</label>
            <textarea id="notes" class="form-control" name="note" placeholder="Thêm ghi chú đơn hàng của bạn" disabled><?= $result[0]['ghi_chu'] ?></textarea>
          </div>

          <div class="mb-3">
          </div>
          <div class="action-button row">
            <!-- <div class="col-8"><a href="" class="btn btn-primary w-100" style="color: #fff !important">Đã nhận hàng</a></div>
            <div class="col-4"><a href="" class="btn btn-outline-danger w-100">Hủy đơn hàng</a></div> -->
          </div>
        </form>
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
