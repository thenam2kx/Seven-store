<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Blog | NN Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>

  <link rel="stylesheet" href="views/blog/listBlog.css" type="text/css" />

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


          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($blogs as $blog): ?>
                <tr>
                  <th scope="row" class='text-center'><?= $blog['tin_tuc_id'] ?></th>
                  <td>
                    <div class="card mb-3" style="max-width: 540px;">
                      <div class="row g-0">
                        <div class="col-md-2">
                          <img src="<?= $blog['anh_avt'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-10">
                          <div class="card-body">
                            <h5 class="card-title"><?= $blog['tieu_de'] ?></h5>
                            <div class="card-text trunc-text">
                              <?= $blog['noi_dung'] ?>
                            </div>
                            <p class="card-text"><small class="text-body-secondary">Last updated <?= fortmartTime($blog['cap_nhat']) ?></small></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="d-flex flex-column gap-2">
                    <!-- <a href="?act=deleteBlog&id=<?= $blog['tin_tuc_id'] ?>"> -->
                    <button type="button" class="btn btn-outline-danger" onclick="confirmDelete(<?= $blog['tin_tuc_id'] ?>)">Xóa</button>
                    <!-- </a> -->
                    <a href="?act=editBlog&id=<?= $blog['tin_tuc_id'] ?>" class="d-flex">
                      <button type="button" class="btn btn-warning w-100">Chỉnh sửa</button>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>



              <script>
                function confirmDelete(id) {
                  if (confirm("Bạn có chắc chắn muốn xóa bài viết này?")) {
                    window.location.href = "?act=deleteBlog&id=" + id;
                  }
                }
              </script>
            </tbody>
          </table>



          <div class="d-flex align-content-center justify-content-center mt-3">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="?act=blog&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                  <li class="page-item">
                    <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=blog&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i?></a>
                  </li>
                <?php }; ?>
                <li class="page-item">
                  <a class="page-link" href="?act=blog&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
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
