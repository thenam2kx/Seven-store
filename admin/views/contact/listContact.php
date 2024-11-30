<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Liên hệ</title>
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
          <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Liên hệ hỗ trợ</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">Liên hệ hỗ trợ</li>
              </ol>
            </div>
          </div>
          <div class="card ">
            <div class="card-header d-flex align-items-center">
              <!-- Search Form -->
              <form class="d-flex me-3" action="?act=listContact" role="search">
                <input type="search" class="form-control me-2" placeholder="Search..." aria-label="Search" name="search" />
                <input class="btn btn-outline-primary" type="submit" value="Search">
              </form>
              <!-- Sort Button -->
              <!-- <a class="btn btn-primary" href="?act=">
                <i class="bi bi-funnel"></i> Thêm sản phẩm
              </a> -->
            </div>
            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">
                  <table class="table align-middle table-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listContact as $Contact): ?>
                        <tr>
                          <th scope="row"><a href="#" class="fw-medium">#<?= $Contact['id'] ?></a></th>
                          <td><?= $Contact['email'] ?></td>
                          <td><?= $Contact['so_dien_thoai'] ?></td>
                          <td><?= $Contact['noi_dung'] ?></td>
                          <td><?= fortmartTime($Contact['ngay_tao']) ?></td>
                          <td>
                            <span class="badge <?= $Contact['trang_thai'] == 1 ? 'bg-success-subtle text-danger' : 'bg-danger-subtle text-success' ?> ">
                              <?= $Contact['trang_thai'] == 1 ? 'Chưa xử lý' : 'Đang xử lý' ?>
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-3 flex">
                              <!-- <a href="?act=editContact&id=<?= $Contact['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a> -->
                              <a href="?act=deleteContact&id=<?= $Contact['id'] ?>" onclick="return confirm('bạn có muốn xóa liên hệ hỗ trợ này?')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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
                Design & Develop by Seven-store
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
