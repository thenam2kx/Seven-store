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
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
  <script type="importmap">
    {
      "imports": {
          "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.js",
          "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.0/"
          }
      }
  </script>

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
            <h4 class="mb-sm-0">Cập nhật người dùng</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="?act=listUser">Danh sách người dùng</a></li>
                <li class="breadcrumb-item active">Cập nhật người dùng</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="live-preview">
          <form class="row g-3 needs-validation" method="POST" action="?act=handleEditUser&id=<?= $result['id'] ?>" enctype="multipart/form-data">


            <div class="col-md-12">
              <label for="name" class="form-label">Họ tên</label>
              <input type="text" class="form-control" name="name" id="name" value="<?= $result['ho_ten'] ?>" placeholder="Họ tên" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= $result['email'] ?>" placeholder="Email" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="address" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" name="address" id="address" value="<?= $result['dia_chi'] ?>" placeholder="Địa chỉ" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="phone" class="form-label">Số điện thoại</label>
              <input type="number" class="form-control" name="phone" id="phone" value="<?= $result['so_dien_thoai'] ?>" placeholder="Số điện thoại" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="date" class="form-label">Ngày sinh</label>
              <input type="date" class="form-control" name="date" id="date" value="<?= $result['ngay_sinh'] ?>" placeholder="Ngày sinh" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6 position-relative">
              <label for="select-gender" class="form-label">Giới tính</label>
              <select class="form-select" name="gender" id="select-gender" required>
                <option <?= $result['gioi_tinh'] === 1 ? 'selected' : '' ?>  value="1">Nam</option>
                <option <?= $result['gioi_tinh'] === 0 ? 'selected' : '' ?> value="0">Nữ</option>
              </select>
            </div>

            <div class="col-md-12">
              <label for="password" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" name="password" id="password" value="<?= $result['mat_khau'] ?>" placeholder="Mật khẩu" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>


            <div class="col-md-6 position-relative">
              <label for="select-status" class="form-label">Trạng thái</label>
              <select class="form-select" name="status" id="select-status" required>
                <option <?= $result['trang_thai'] === 1 ? 'selected' : '' ?>  value="1">Hoạt động</option>
                <option <?= $result['trang_thai'] === 0 ? 'selected' : '' ?> value="0">Ngừng hoạt động</option>
              </select>
            </div>



            <div class="col-12">
              <button class="btn btn-primary" name="save" type="submit">Cập nhật</button>
              <button class="btn btn-outline-primary" type="reset" onclick='confirmCancel()'>Hủy</button>
            </div>
          </form>
          </div>
      </div>
      </div>
          <script>
            function confirmCancel() {
              window.location.href = "?act=users"
            }
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
