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
                        <h4 class="mb-sm-0">Danh sách Đơn Hàng</h4>
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
                            <form class="d-flex me-3" action="?act=listOrder" role="search">
                                <input
                                    type="search"
                                    class="form-control me-2"
                                    placeholder="Search..."
                                    aria-label="Search"
                                    name="search" />
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
                                                <th scope="col">Tên Người nhận</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Ghi chú</th>
                                                <th scope="col">Hình thức thanh toán</th>
                                                <th scope="col">Trang thái thanh toán</th>
                                                <th scope="col">Thời gian đặt hàng</th>
                                                <th scope="col">Trạng thái đơn hàng</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listOrder as $Order): ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#<?= $Order['id'] ?></a></th>
                                                    <td><?= $Order['ho_ten'] ?></td>
                                                    <td><?= $Order['so_dien_thoai'] ?></td>
                                                    <td><?= $Order['email'] ?></td>
                                                    <td><?= $Order['ghi_chu'] ?></td>
                                                    <td><?= $Order['hinh_thuc_thanh_toan'] == 0 ? "Thanh toán COD" : "Thanh toán MOMO" ?></td>
                                                    <td><?= $Order['trang_thai_thanh_toan'] == 0 ? "Chưa thanh toán" : "Đã thanh toán" ?></td>
                                                    <td><?= fortmartTime($Order['ngay_tao']) ?></td>
                                                    <td>
                                                        <div class="badge bg-danger-subtle text-danger">
                                                            <?= $Order['trang_thai'] ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-3 flex">
                                                            <a href="?act=editOrder&id=<?= $Order['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                            <a href="?act=deleteOrder&id=<?= $Order['id'] ?>" onclick="return confirm('bạn có muốn xóa đơn hàng này?')" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
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
                      <a class="page-link" href="?act=listOrder&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=listOrder&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                      </li>
                    <?php }; ?>
                    <li class="page-item">
                      <a class="page-link" href="?act=listOrder&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>" aria-label="Next">
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