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
            <h4 class="mb-sm-0">Danh sách bài viết</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">danh sách bài viết</li>
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
                  name="search" />
                <input class="btn btn-outline-primary" type="submit" value="Search">
              </form>
              <!-- Sort Button -->
              <a class="btn btn-primary" href="?act=addBlog">
                <i class="bi bi-funnel"></i> Tạo bài viết mới
              </a>
            </div>

            <div class="card-body">
              <div class="live-preview">
                <div class="table-responsive">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" style="white-space: nowrap;">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($blogs as $blog): ?>
                        <tr>
                          <th scope="row"><?= $blog['id'] ?></th>
                          <td>
                            <div class="d-flex gap-2 align-items-start">
                              <div class="flex-shrink-0">
                                <img src="<?= $blog['anh_avt'] ?>" alt="" class="avatar-md" />
                              </div>
                              <div class="flex-grow-1 fw-bold fs-6"><?= $blog['tieu_de'] ?></div>
                            </div>
                          </td>
                          <td>
                            <p class="card-text"><small class="text-body-secondary"><?= fortmartTime($blog['cap_nhat']) ?></small></p>
                          </td>
                          <td>
                            <span class="badge <?= $blog['trang_thai'] == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?> ">
                              <?= $blog['trang_thai'] == 1 ? 'Hiển thị' : 'Đang ẩn' ?>
                            </span>
                          </td>
                          <td>
                            <div class="hstack gap-3 flex">
                              <a href="?act=editBlog&id=<?= $blog['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                              <a href="?act=deleteBlog&id=<?= $blog['id'] ?>" onclick="confirmDelete(<?= $blog['id'] ?>)" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                            </div>
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
                </div>
              </div>
            </div>

            <div class="card-footer d-flex justify-content-center">
              <div class="d-flex align-content-center justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="?act=blog&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=blog&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
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
