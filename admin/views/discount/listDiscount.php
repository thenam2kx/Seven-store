<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Danh sách mã khuyến mãi</title>
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
            <h4 class="mb-sm-0">Danh sách mã khuyến mãi</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">danh sách mã khuyến mãi</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-header d-flex align-items-center">
              <!-- Search Form -->
              <form class="d-flex me-3" action="?act=listProduct" role="search">
                <input
                  type="search"
                  class="form-control me-2"
                  placeholder="Search..."
                  aria-label="Search"
                  name="search"
                />
                <input class="btn btn-outline-primary" type="submit" value="Search">
              </form>
              <!-- Sort Button -->
              <a class="btn btn-primary" href="?act=addDiscount">
                <i class="bi bi-funnel"></i> Thêm mã khuyến mãi
              </a>
            </div>

            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">
                  <table class="table align-middle table-nowrap mb-0">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã khuyến mãi</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Phần trăm khuyến mãi</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($results as $result): ?>
                        <?php
                          $status = '';
                          $bg = '';
                          $txt = '';
                            if ($result['trang_thai'] === 1) {
                              $status = 'Đang diễn ra';
                              $bg = 'bg-success-subtle';
                              $txt = 'text-success';
                            } else if ($result['trang_thai'] === 2) {
                              $status = 'Đã hết hạn';
                              $bg = 'bg-danger-subtle';
                              $txt = 'text-danger';
                            } else if ($result['trang_thai'] === 0) {
                              $status = 'Chưa diễn ra';
                              $bg = 'bg-warning-subtle';
                              $txt = 'text-warning';
                            }
                        ?>
                        <tr>
                          <th scope="row"><a href="#" class="fw-medium">#<?= $result['id'] ?></a></th>
                          <td class="fw-bold"><?= $result['ma_km'] ?></td>
                          <td><?= (new DateTime( $result['ngay_bat_dau']))->format("d-m-Y") ?></td>
                          <td><?= (new DateTime( $result['ngay_ket_thuc']))->format("d-m-Y") ?></td>
                          <td><?= $result['phan_tram'] ?></td>
                          <td>
                            <span class="badge <?= $bg ?> <?= $txt ?> ">
                              <?= $status ?>
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-3 flex">
                              <a href="?act=editDiscount&id=<?= $result['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                              <a href="?act=listDiscount" onclick="confirmDelete(<?= $result['id'] ?>)" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                  <script>
                    function confirmDelete(id) {
                      if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                        window.location.href = "?act=deleteDiscount&id=" + id;
                      }
                    }
                  </script>
                </div>
              </div>
            </div>

            <div class="card-footer d-flex justify-content-center">
              <div class="d-flex align-content-center justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="?act=listDiscount&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=listDiscount&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                      </li>
                    <?php }; ?>
                    <li class="page-item">
                      <a class="page-link" href="?act=listDiscount&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
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
