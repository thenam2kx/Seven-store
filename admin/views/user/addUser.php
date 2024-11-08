<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>User | NN Shop</title>
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
          <form class="row g-3 needs-validation" method="POST" action="?act=addUser" enctype="multipart/form-data" novalidate>

          <div class="col-md-12">
              <label for="name" class="form-label">Họ Tên</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Họ tên" required>
              <div class="invalid-feedback">
                Vui lòng nhập Họ tên.
              </div>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="text" class="form-control" id="email" placeholder="Email" required>
              <div class="invalid-feedback">
                Vui lòng nhập Email.
              </div>
            </div>

            <div class="col-md-12">
              <label for="address" class="form-label">Địa chỉ</label>
              <input name="address" type="text" class="form-control" id="address" placeholder="Địa chỉ" required>
              <div class="invalid-feedback">
                Vui lòng nhập Địa chỉ.
              </div>
            </div>

            <div class="col-md-12">
              <label for="phone" class="form-label">Số điện thoại</label>
              <input name="phone" type="number" class="form-control" id="phone" placeholder="Số điện thoại" required>
              <div class="invalid-feedback">
                Vui lòng nhập Số điện thoại.
              </div>
            </div>

            <div class="col-md-12">
              <label for="date" class="form-label">Ngày sinh</label>
              <input name="date" type="date" class="form-control" id="date" placeholder="Ngày sinh" required>
              <div class="invalid-feedback">
                Vui lòng nhập Ngày sinh.
              </div>
            </div>

            <div class="col-md-6 position-relative">
              <label for="select-gender" class="form-label">Giới tính</label>
              <select class="form-select" name="gender" id="select-gender" required>
                <option selected value="1">Nam</option>
                <option value="0">Nữ</option>
              </select>
            </div>

            <div class="col-md-12">
              <label for="password" class="form-label">Mật khẩu</label>
              <input name="password" type="password" class="form-control" id="password" placeholder="Mật khẩu" required>
              <div class="invalid-feedback">
                Vui lòng nhập Mật khẩu.
              </div>
            </div>

            <div class="col-md-6 position-relative">
              <label for="select-status" class="form-label">Trạng thái</label>
              <select class="form-select" name="status" id="select-status" required>
                <option selected value="1">Hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
              </select>
            </div>

            <div class="col-12">
              <input class="btn btn-primary" type="submit" name="save" id="btnSave" value="Thêm" />
              <button class="btn btn-outline-primary" type="reset">Xóa</button>
            </div>
          </form>

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
