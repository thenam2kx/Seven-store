<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Sửa mã khuyến mãi | NN Shop</title>
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
            <h4 class="mb-sm-0">Sửa mã khuyến mãi</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">Sửa mã khuyến mãi</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="live-preview">
                <form class="row g-3 needs-validation" action="?act=handleEditDiscount" method="POST" novalidate>
                  <div class="col-md-12">
                    <input type="text" name="id" value="<?= $result["id"] ?>" hidden>
                  </div>

                  <div class="col-md-12">
                    <label for="ma-km" class="form-label">Mã khuyến mãi</label>
                    <input type="text" class="form-control" id="ma-km" name="code" value="<?= $result["ma_km"] ?>" placeholder="Nhập mã khuyến mãi" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập mã khuyến mãi.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="ngay-bat-dau" class="form-label">Ngày bắt đầu</label>
                    <input type="date" name="startDate" timezone="[Asia/Ho_Chi_Minh]" class="form-control" value="<?= (new DateTime( $result['ngay_bat_dau']))->format("Y-m-d") ?>" id="ngay-bat-dau">
                    <div class="invalid-feedback">
                      Vui lòng chọn ngày bắt đầu
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="ngay-ket-thuc" class="form-label">Ngày kết thúc</label>
                    <input type="date" name="endDate" class="form-control" value="<?= (new DateTime( $result['ngay_ket_thuc']))->format("Y-m-d") ?>" id="ngay-ket-thuc">
                    <div class="invalid-feedback">
                      Vui lòng chọn ngày kết thúc
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="phan-tram" class="form-label">Phần trăm khuyến mãi</label>
                    <input type="number" name="percent" class="form-control" id="phan-tram" value="<?= $result["phan_tram"] ?>" placeholder="Nhập phần trăm khuyến mãi" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập Phần trăm
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="trang-thai" class="form-label">Trạng thái</label>
                    <select class="form-select" name="status" id="trang-thai" required>
                    <option <?= $result['trang_thai'] === 0 ? 'selected' : '' ?> value="0">Sắp diễn ra</option>
                    <option <?= $result['trang_thai'] === 1 ? 'selected' : '' ?> value="1">Đang diễn ra</option>
                    <option <?= $result['trang_thai'] === 2 ? 'selected' : '' ?> value="2">Hết hạn</option>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn trạng thái.
                    </div>
                  </div>

                  <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="save" value="Lưu" />
                    <button class="btn btn-outline-primary" type="reset">Xóa</button>
                    <a class="btn" href="?act=listProduct" type="reset">Hủy</a>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <script>
            (() => {
              'use strict';
              const form = document.querySelector('.needs-validation');
              form.addEventListener('submit', (event) => {
                // Kiểm tra tính hợp lệ của form
                if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                // Thêm lớp 'was-validated' để Bootstrap tự động áp dụng CSS cho các input không hợp lệ
                form.classList.add('was-validated');
              }, false);
            })();
          </script>
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
