<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
  <meta charset="utf-8" />
  <title>Đặt hàng</title>
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
  </style>
</head>

<body>

  <!-- HEADER -->
  <?php require_once "views/layouts/header.php"; ?>

  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store/">Trang chủ</a></li>
        <li>Đặt hàng</li>
      </ul>
    </div>
  </div>



  <div class="container my-4">
    <div class="row">
      <!-- Billing Details -->
      <div class="col-lg-6">
        <p style="font-size: 20px;">Thông tin thanh toán</p>
        <form action="?act=createOrder" method="post">
          <div class="mb-3">
            <label for="fullName" class="form-label">Họ tên</label>
            <input
              type="text"
              id="fullName"
              class="form-control"
              placeholder="Nhập tên người nhận hàng"
              value="<?= $inforUser['ho_ten'] ?>"
              name="name"
              required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              class="form-control"
              placeholder="example@example.com"
              value="<?= $inforUser['email'] ?>"
              name="email"
              required />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input
              type="text"
              id="phone"
              class="form-control"
              placeholder="0123456789"
              value="<?= $inforUser['so_dien_thoai'] ?>"
              name="phone"
              required />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input
              type="text"
              id="address"
              class="form-control"
              placeholder="123 Hà Nội"
              value="<?= $inforUser['dia_chi'] ?>"
              name="address"
              required />
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="promoCode" class="form-label">Mã khuyến mãi</label>
              <input
                type="text"
                id="promoCode"
                class="form-control"
                name="discount"
                placeholder="Nhập mã khuyến mãi" />
            </div>
            <div class="col-md-6 mb-3">
              <label for="paymentMethod" class="form-label">Phương thức thanh toán</label>
              <select id="paymentMethod" class="form-select" name="actionPay" required>
                <option value="0" selected>Cod</option>
                <option value="1">VNPay</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="notes" class="form-label">Ghi chú</label>
            <textarea id="notes" class="form-control" name="note" placeholder="Thêm ghi chú đơn hàng của bạn"></textarea>
          </div>

          <div class="mb-3">
            <!-- <button class="btn btn-primary w-100 mt-3">Đặt hàng</button> -->
            <input class="btn btn-primary w-100 mt-3" type="submit" name="orderbtn" value="Đặt hàng" />
          </div>
        </form>
      </div>

      <!-- Order Summary -->
      <div class="col-lg-6">
        <p style="font-size: 20px;">Tóm tắt đơn hàng</p>
        <?php foreach ($result as $row): ?>
          <div class="product-item">
            <div class="product-info">
              <img src="admin/<?= $row['anh_dai_dien'] ?>" alt="Product 1" />
              <div>
                <div><?= $row['ten_san_pham'] ?></div>
                <small class="text-muted"><?= formatCurrency($row['gia_khuyen_mai']) ?><sup>đ</sup></small>
                <small class="text-muted">x <?= $row['so_luong_gh'] ?></small>
              </div>
            </div>
            <span><?= formatCurrency($row['gia_khuyen_mai'] * $row['so_luong_gh']) ?><sup>đ</sup></span>
          </div>
        <?php endforeach ?>
        <div class="d-flex justify-content-between mt-3">
          <div class="total">Tổng tiền</div>
          <div class="total"><?= formatCurrency($totalPriceProducts['tong_tien']) ?></div>
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
