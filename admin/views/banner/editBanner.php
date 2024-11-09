<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Banner | NN Shop</title>
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
            <h4 class="mb-sm-0">Cập nhật banner</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="?act=lisBanner">Danh sách banner</a></li>
                <li class="breadcrumb-item active">Cập nhật banner</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="live-preview">
          <form class="row g-3 needs-validation" method="POST" action="?act=handleDditBanner&id=<?= $result['id'] ?>" enctype="multipart/form-data">
            <div class="col-md-12">
              <img src="<?= $result['duong_dan'] ?>" class="img-rounded" alt="Cinque Terre" style="height: 180px; width: 180px">
            </div>

            <div class="col-md-12">
              <label for="title" class="form-label">ID</label>
              <input type="text" class="form-control" name="id" id="title" value="<?= $result['id'] ?>" disabled>
            </div>


            <div class="col-md-6 position-relative">
              <label for="select-status" class="form-label">Trạng thái</label>
              <select class="form-select" name="status" id="select-status" required>
                <option <?= $result['trang_thai'] === 1 ? 'selected' : '' ?>  value="1">Hiển thị</option>
                <option <?= $result['trang_thai'] === 0 ? 'selected' : '' ?> value="0">Ẩn</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="formFile" class="form-label">Chọn ảnh</label>
              <input class="form-control" name="file" type="file" id="formFile">
            </div>

            <div class="col-12">
              <button class="btn btn-primary" name="save" type="submit">Cập nhật</button>
              <button class="btn btn-outline-primary" type="reset" onclick='confirmCancel()'>Hủy</button>
            </div>
          </form>
          <script>
            function confirmCancel() {
              window.location.href = "?act=banners"
            }
          </script>
        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      </div>
      </div>
      </div>
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
