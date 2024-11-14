<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Đơn hàng chi tiết</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>


</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">
    <!-- HEADER -->
    <?php
    require_once "views/layouts/header.php";
    require_once "views/layouts/siderbar.php";
    ?>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Đơn hàng chi tiết</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">Đơn hàng chi tiết</li>
              </ol>
            </div>
          </div>

          <form action="?act=editOrderDetail" method="post">
            <input type="text" name="id" value="<?= $resultInfoOrder['id'] ?>" hidden>
            <div class="card">
              <div class="card-body">
                <div class="live-preview">
                  <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Tên sản phẩm</th>
                          <th scope="col">Số lượng</th>
                          <th scope="col">Giá bán</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($getProductsByOrder as $result): ?>
                          <tr>
                            <th scope="row"><a href="#" class="fw-medium">#<?= $result['san_pham_id'] ?></a></th>
                            <td>
                              <div class="d-flex gap-2 align-items-center">
                                <div class="flex-shrink-0">
                                  <img src="<?= $result['anh_dai_dien'] ?>" alt="" class="avatar-xs" />
                                </div>
                                <div class="flex-grow-1"><?= $result['ten_san_pham'] ?></div>
                              </div>
                            </td>
                            <td><?= $result['so_luong'] ?></td>
                            <td><?= $result['gia_tien'] ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h5 class="mb-sm-0">Thông tin người nhận</h5>
                  </div>
                  <div class="card-body">
                    <div class="live-preview">
                      <form class="row g-3 needs-validation" method="POST">
                        <div class="col-md-12">
                          <label for="name" class="form-label">Họ tên người nhận hàng</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?= $getUserAndInfoOrder['ho_ten'] ?>" disabled>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?= $getUserAndInfoOrder['email'] ?>" disabled>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="phone" class="form-label">Số điện thoại</label>
                          <input type="number" class="form-control" id="phone" name="phone" value="<?= $getUserAndInfoOrder['so_dien_thoai'] ?>" disabled>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                          <input type="address" class="form-control" id="address" name="address" value="<?= $getUserAndInfoOrder['dia_chi'] ?>" disabled>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="ghi-chu" class="form-label">Ghi chú</label>
                          <input type="text" class="form-control" id="ghi-chu" name="text" value="<?= $getUserAndInfoOrder['ghi_chu'] ?>" disabled>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h5 class="mb-sm-0">Thông tin đơn hàng</h5>
                  </div>
                  <div class="card-body">
                    <div class="row live-preview">
                      <form class="row g-3 needs-validation" method="POST" novalidate>
                        <div class="col-md-6">
                          <label for="phuong-thuc-thanh-toan" class="form-label">Mã đơn hàng</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?= $getUserAndInfoOrder['don_hang_id'] ?>" disabled>
                        </div>

                        <div class="col-md-6">
                          <label for="phuong-thuc-thanh-toan" class="form-label">Ngày đặt</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?= $getUserAndInfoOrder['ngay_tao'] ?>" disabled>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="phuong-thuc-thanh-toan" class="form-label">Phương thức thanh toán</label>
                          <select class="form-select" name="status" id="phuong-thuc-thanh-toan" disabled>
                            <option <?= $getUserAndInfoOrder['hinh_thuc_thanh_toan'] === 0 ? 'selected' : '' ?> value="0">COD</option>
                            <option <?= $getUserAndInfoOrder['hinh_thuc_thanh_toan'] === 0 ? '' : 'selected' ?> value="1">Online</option>
                          </select>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="trang-thai-thanh-toan" class="form-label">Trạng thái thanh toán</label>
                          <select class="form-select" name="status" id="trang-thai-thanh-toan" disabled>
                            <option <?= $getUserAndInfoOrder['trang_thai_thanh_toan'] === 0 ? 'selected' : '' ?> value="0">Chưa thanh toán</option>
                            <option <?= $getUserAndInfoOrder['trang_thai_thanh_toan'] === 0 ? '' : 'selected' ?> value="1">Đã thanh toán</option>
                          </select>
                        </div>

                        <div class="col-md-12 mt-3">
                          <label for="trang-thai-don-hang" class="form-label">Trạng thái đơn hàng</label>
                          <select class="form-select" name="status" id="trang-thai-don-hang" required>
                            <?php foreach ($listStatusOrder as $status): ?>
                              <option value="<?= $status['id'] ?>" <?= $status['id'] === $resultInfoOrder['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                <?= $status['trang_thai'] ?>
                              </option>
                            <?php endforeach ?>
                          </select>
                        </div>

                        <div class="col-md-4 mt-3">
                          <label for="price" class="form-label">Tổng tiền</label>
                          <input type="text" class="form-control" id="price" name="price" value="<?= $resultTotalPrice['tong_tien'] ?>" disabled>
                        </div>

                        <div class="col-md-4 mt-3">
                          <label for="discount" class="form-label">Khuyến mãi</label>
                          <input type="text" class="form-control" id="discount" name="discount" value="<?= $resultDiscount * 100 ?> %" disabled>
                        </div>

                        <div class="col-md-4 mt-3">
                          <label for="name" class="form-label">Thành tiền</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?= $resultTotalMoneyFinal ?>" disabled>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-footer d-flex justify-content-center">
                  <div class="d-flex align-content-center justify-content-end gap-2 w-100">
                    <input class="btn btn-primary" type="submit" name="save" value="Lưu" />
                    <a class="btn btn-outline-primary" href="?act=/">Hủy</a>
                  </div>
                </div>
              </div>
            </div>
          </form>



        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Velzon.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Develop by Themesbrand
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->



  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->

  <!--preloader-->
  <div id="preloader">
    <div id="status">
      <div class="spinner-border text-primary avatar-sm" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>

  <div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
      <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>

</body>

</html>
