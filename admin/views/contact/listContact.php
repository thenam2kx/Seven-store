<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Category | NN Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>

  <link rel="stylesheet" href="views/category/listCategory.css" type="text/css" />

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

          <div class="card-header align-items-center d-flex py-3">
            <h4 class="card-title mb-0 flex-grow-1">Liên hệ hỗ trợ</h4>
            <div class="flex-shrink-0">
              <!-- <a href="?act=/">
                <button class="btn btn-success" type="button">Thêm mới</button>
              </a> -->
            </div>
          </div>

          <table class="table table-nowrap">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listContact as $Contact): ?>
                <tr>
                  <th scope="row"><a href="#" class="fw-semibold">#<?= $Contact['lien_he_id'] ?></a></th>
                  <td><?= $Contact['ho_ten'] ?></td>
                  <td><?= $Contact['email'] ?></td>
                  <td><?= $Contact['so_dien_thoai'] ?></td>
                  <td><?= $Contact['dia_chi'] ?></td>
                  <td><?= $Contact['noi_dung'] ?></td>
                  <td><?= fortmartTime($Contact['ngay_tao']) ?></td>
                  <td class="text-center text-primary"><?= 'chưa xử lí' //fortmartTime($Contact['cap_nhat']) ?></td>
                  
                  <td>
                    <div class="hstack gap-3 flex">
                      <!-- <a href="?act=editContact&id=<?= $Contact['lien_he_id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a> -->
                      <a href="?act=deleteContact&id=<?= $Contact['lien_he_id'] ?>" onclick="return confirm('bạn có muốn xóa liên hệ hỗ trợ này?')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


          <!-- <div class="d-flex align-content-center justify-content-center mt-3">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="?act=listContact&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                  <li class="page-item">
                    <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=listContact&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                  </li>
                <?php }; ?>
                <li class="page-item">
                  <a class="page-link" href="?act=listContact&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
 -->

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
