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

  <link rel="stylesheet" href="views/blog/listUser.css" type="text/css" />

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">
    <!-- HEADER -->
    <?php
    require_once "views/layouts/header.php";
    require_once "views/layouts/siderbar.php";
    ?>

    <?php
    function fortmartTime($timestamp)
    {
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $timeDifference = time() - strtotime($timestamp);
      if ($timeDifference < 60) {
        return $timeDifference . ' seconds ago';
      } elseif ($timeDifference < 3600) {
        return floor($timeDifference / 60) . ' minutes ago';
      } elseif ($timeDifference < 86400) {
        return floor($timeDifference / 3600) . ' hours ago';
      } elseif ($timeDifference < 604800) {
        return floor($timeDifference / 86400) . ' days ago';
      } else {
        return floor($timeDifference / 604800) . ' weeks ago';
      }
    }
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
            <h4 class="mb-sm-0">Danh sách banner</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">danh sách banner</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-header d-flex align-items-center">
              <!-- Sort Button -->
              <a class="btn btn-primary" href="?act=addBanner">
                <i class="bi bi-funnel"></i> Thêm banner
              </a>
            </div>

            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">

                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($banners as $banner): ?>
                        <tr>
                          <th scope="row"><a href="#" class="fw-medium">#<?= $banner['id'] ?></a></th>
                          <td>
                            <div class="d-flex gap-2 align-items-center">
                              <div class="flex-shrink-0">
                                <img src="<?= $banner['duong_dan'] ?>" alt="" class="avatar-xl" />
                              </div>
                            </div>
                          </td>
                          <td>
                            <span class="badge <?= $banner['trang_thai'] == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?> ">
                              <?= $banner['trang_thai'] == 1 ? 'Hiển thị' : 'Đang ẩn' ?>
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-3 flex">
                              <a href="?act=editBanner&id=<?= $banner['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                              <a href="?act=deleteUser&id=<?= $banner['id'] ?>" onclick="confirmDelete(event, <?= $banner['id'] ?>)" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                            </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <script>
                  function confirmDelete(event, id) {
                    event.preventDefault();

                    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                      window.location.href = "?act=deleteBanner&id=" + id;
                    }
                  }
                 </script>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


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
