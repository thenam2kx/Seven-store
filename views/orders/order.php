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

  <!-- CONTENT -->

  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Đặt hàng</h1>
        <div class="row">
          <div class="col-sm-12">
            <div class="tt-shopcart-table">
              <table>
                <thead>
                  <th>id</th>
                  <th>Sản phẩm</th>
                  <th>Giá tiền</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                </thead>
                <tbody>
                  <?php foreach($result as $row): ?>
                    <tr>
                      <td><?= $row['spid'] ?></td>
                      <td class="d-flex gap-2 w-100">
                        <div class="tt-product-img">
                          <img src="admin/<?= $row['anh_dai_dien'] ?>" data-src="admin/<?= $row['anh_dai_dien'] ?>" alt="">
                        </div>
                        <h2 class="fs-5 text">
                          <a href="?act=productDetail&id=<?= $row['spid'] ?>"><?= $row['ten_san_pham'] ?></a>
                        </h2>
                      </td>
                      <td>
                        <div class="tt-price">
                          <?= formatCurrency($row['gia_khuyen_mai']) ?><sup>đ</sup>
                        </div>
                      </td>
                      <td>
                        <div class="tt-price subtotal">
                          <?= $row['so_luong_gh'] ?>
                        </div>
                      </td>
                      <td>
                        <div class="tt-price subtotal">
                        <?= formatCurrency($row['gia_khuyen_mai'] * $row['so_luong_gh']) ?><sup>đ</sup>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-sm-12 mt-4">
            <form action="?act=createOrder" method="post">
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="totalmoney">Tổng tiền</label>
                  <input type="text" class="form-control" id="totalmoney" name="totalmoney" value="<?= formatCurrency($totalPriceProducts['tong_tien']) ?>" disabled>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="discount">Khuyến mãi</label>
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="Vui lòng nhập mã khuyến mãi">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="vjvfv">Hình thức thanh toán</label>
                  <select class="form-select" name="actionPay">
                    <option value="0">COD</option>
                    <option value="1">Online</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="name">Tên người nhận</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người nhận" value="" required>
                  <div class="valid-feedback">
                    Vui lòng nhập tên người nhận
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control " id="email" name="email" placeholder="Nhập email người nhận" value="" required>
                  <div class="valid-feedback">
                    Vui lòng nhập email
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationServerUsername">Số điện thoại</label>
                  <div class="input-group">
                    <input type="text" class="form-control " id="phone" name="phone" placeholder="Nhập số điện thoại người nhận" value="" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập số điện thoại.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationServer03">Địa chỉ</label>
                  <input type="text" class="form-control" id="validationServer03" name="address" placeholder="Nhập địa chỉ giao hàng" required>
                  <div class="invalid-feedback">
                    Vui lòng nhập địa chỉ
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="validationServer03">Ghi chú</label>
                  <input type="text" class="form-control" id="validationServer03" name="note" placeholder="Nhập địa chỉ giao hàng">
                </div>
              </div>
              <input class="btn btn-primary" type="submit" name="orderbtn" value="Đặt hàng"/>
            </form>
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
