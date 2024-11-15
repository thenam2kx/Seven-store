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
            <h4 class="mb-sm-0">Danh sách bình luận</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="?act=listProduct">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Bình luận</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <!-- <div class="card-header align-items-center d-flex py-3">
              <h4 class="card-title mb-0 flex-grow-1"></h4>
              <div class="flex-shrink-0">
                <a href="?act=addCategory">
                  <button class="btn btn-success" type="button">Thêm mới</button>
                </a>
              </div>
            </div> -->

            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">
                  <table class="table table-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $comment): ?>
                        <tr>
                          <th scope="row"><a href="#" class="fw-semibold">#<?= $comment['binh_luan_id'] ?></a></th>
                          <td><?= $comment['ho_ten'] ?></td>
                          <td><?= $comment['ten_san_pham'] ?></td>
                          <td><?= $comment['noi_dung'] ?></td>
                          <td><?= $comment['ngay_tao'] ?></td>
                          <td>
                            <span class="badge <?= $comment['trang_thai'] === 1 ? 'bg-success' : 'bg-danger' ?>">
                              <?= $comment['trang_thai'] === 1 ? 'Hiển thị' : 'Đang ẩn' ?>
                            </span>
                          </td>
                          <!-- <td>
                            <div class="hstack gap-3 flex">
                              <a href="?act=editCategory&id=<?= $category['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                              <a href="?act=deleteCategory&id=<?= $category['id'] ?>" onclick="confirmDelete(<?= $category['id'] ?>)" onclick="confirmDelete(<?= $blog['tin_tuc_id'] ?>)" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                            </div>
                          </td> -->
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- <div class="card-footer d-flex justify-content-center">
              <div class="d-flex align-content-center justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="?act=listCategory&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=listCategory&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                      </li>
                    <?php }; ?>
                    <li class="page-item">
                      <a class="page-link" href="?act=listCategory&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div> -->
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
