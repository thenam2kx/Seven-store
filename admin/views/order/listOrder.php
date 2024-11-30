<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Order | NN Shop</title>
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
          <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Danh sách đơn hàng</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">danh sách đơn hàng</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-header d-flex align-items-center">
              <!-- Search Form -->
              <form class="d-flex me-3" action="?act=listOrder" role="search" method="POST">
                <input
                  type="search"
                  class="form-control me-2"
                  placeholder="Search..."
                  aria-label="Search"
                  name="search" />
                <input class="btn btn-outline-primary" type="submit" value="Search">
              </form>

            </div>

            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">
                  <table class="table align-middle table-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                        <th scope="col">Hình thức thanh toán</th>
                        <th scope="col">Trạng thái thanh toán</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($orders as $order): ?>
                        <tr>
                          <th scope="row"><a href="#" class="fw-medium">#<?= $order['id'] ?></a></th>
                          <td><?= date('d/m/Y', strtotime($order['ngay_tao'])) ?></td>
                          <td><?= $order['trang_thai'] ?></td>
                          <td>
                            <span class="badge <?= $order['hinh_thuc_thanh_toan'] == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?> ">
                              <?= $order['hinh_thuc_thanh_toan'] == 1 ? 'MOMO' : 'COD' ?>
                            </span>
                          </td>
                          <td>
                            <span class="badge <?= $order['trang_thai_thanh_toan'] == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?> ">
                              <?= $order['trang_thai_thanh_toan'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' ?>
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-3 flex">
                              <a href="?act=orderDetail&id=<?= $order['id'] ?>" class="link-success fs-15"><i class="ri-eye-line"></i></a>
                              <a href="?act=editOrder&id=<?= $order['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
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
