<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Bảng điều khiển</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "layouts/libs_css.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- HEADER -->
    <?php
    require_once "layouts/header.php";

    require_once "layouts/siderbar.php";
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

          <div class="row">
            <div class="col">
              <div class="h-100">
                <div class="row mb-3 pb-1">
                  <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                      <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">Chào mừng bạn đã quay trở lại, <?= $_SESSION['username'] ? $_SESSION['username']['ho_ten'] : '' ?>!</h4>
                        <p class="text-muted mb-0">Bảng báo cáo tổng quan</p>
                      </div>
                      <div class="mt-3 mt-lg-0">
                        <form action="javascript:void(0);">
                          <div class="row g-3 mb-0 align-items-center">
                            <div class="col-auto">
                              <a href="?act=addProduct" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</a>
                            </div>
                            <!--end col-->
                            <div class="col-auto">
                              <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                            </div>
                            <!--end col-->
                          </div>
                          <!--end row-->
                        </form>
                      </div>
                    </div><!-- end card header -->
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng thu nhập</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="<?= $boolearnResultEarning >= 0 ? 'text-success' : 'text-danger' ?> fs-14 mb-0">
                              <i class="<?= $boolearnResultEarning >= 0 ? 'ri-arrow-right-up-line' : 'ri-arrow-right-down-line' ?> fs-13 align-middle"></i>
                              <?= $boolearnResultEarning >= 0 ? '+' : '' ?><?= formatCurrency($resultEarning) ?> %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                              <span class="counter-value" data-target="<?= isset($getTotalEarningWithCurrentMonth['tong_thanh_toan']) ? $getTotalEarningWithCurrentMonth['tong_thanh_toan'] : 0 ?>">0</span>k
                            </h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-success-subtle rounded fs-3">
                              <i class="bx bx-dollar-circle text-success"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng đơn hàng</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="<?= $boolearnResultOrders > 0 ? 'text-success' : 'text-danger' ?> fs-14 mb-0">
                              <i class="<?= $boolearnResultOrders > 0 ? 'ri-arrow-right-up-line' : 'ri-arrow-right-down-line' ?> fs-13 align-middle"></i>
                              <?= $boolearnResultOrders > 0 ? '+' : '' ?><?= formatCurrency($resultOrders) ?> %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $getTotalOrdersWithCurrentMonth['tong_don_hang'] ?>">0</span></h4>
                            <a href="?act=listOrder" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-info-subtle rounded fs-3">
                              <i class="bx bx-shopping-bag text-info"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Lợi nhuận</p>
                          </div>
                          <div class="flex-shrink-0">
                            <h5 class="<?= $boolearnResultProfit > 0 ? 'text-success' : 'text-danger' ?> fs-14 mb-0">
                              <i class="<?= $boolearnResultProfit > 0 ? 'ri-arrow-right-up-line' : 'ri-arrow-right-down-line' ?> fs-13 align-middle"></i>
                              <?= $boolearnResultProfit > 0 ? '+' : '' ?><?= formatCurrency($resultProfit)  ?> %
                            </h5>
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $getTotalProfitWithCurrentMonth['loi_nhuan'] ?>">0</span>k </h4>
                            <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                              <i class="bx bx-wallet text-primary"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Người dùng</p>
                          </div>
                          <div class="flex-shrink-0">
                            <!-- <h5 class="text-success fs-14 mb-0">
                              <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                            </h5> -->
                          </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                          <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $getTotalUsers['tong_nguoi_dung'] ?>">0</span> </h4>
                            <a href="?act=users" class="text-decoration-underline">Xem chi tiết</a>
                          </div>
                          <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                              <i class="bx bx-user-circle text-warning"></i>
                            </span>
                          </div>
                        </div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                </div> <!-- end row-->

                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">
                      <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Doanh thu</h4>
                      </div><!-- end card header -->

                      <div class="card-body p-3 pb-2">
                        <s class="w-100">
                          <div
                            id="customer_charts"
                            data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                            data-colors-minimal='["--vz-light", "--vz-primary", "--vz-info"]'
                            data-colors-saas='["--vz-success", "--vz-info", "--vz-danger"]'
                            data-colors-modern='["--vz-warning", "--vz-primary", "--vz-success"]'
                            data-colors-interactive='["--vz-info", "--vz-primary", "--vz-danger"]'
                            data-colors-creative='["--vz-warning", "--vz-primary", "--vz-danger"]'
                            data-colors-corporate='["--vz-light", "--vz-primary", "--vz-secondary"]'
                            data-colors-galaxy='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]'
                            data-colors-classic='["--vz-light", "--vz-primary", "--vz-secondary"]'
                            data-colors-vintage='["--vz-success", "--vz-primary", "--vz-secondary"]'
                            class="apex-charts" dir="ltr"></div>
                          <script>
                            var options = {
                              series: [{
                                  name: "Thu nhập",
                                  // data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                                  data: <?= json_encode($dataTotalEarningOnYear) ?>
                                },
                                {
                                  name: "Lợi nhuận",
                                  // data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                                  data: <?= json_encode($dataTotalProfitOnYear) ?>
                                },
                                // {
                                //   name: 'Lợi nhuận',
                                //   data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                                // }
                              ],
                              chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                  enabled: false
                                },
                              },
                              dataLabels: {
                                enabled: false
                              },
                              stroke: {
                                width: [5, 7, 5],
                                curve: 'straight',
                                dashArray: [0, 8, 5]
                              },
                              // title: {
                              //   text: 'Page Statistics',
                              //   align: 'left'
                              // },
                              legend: {
                                tooltipHoverFormatter: function(val, opts) {
                                  return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
                                }
                              },
                              markers: {
                                size: 0,
                                hover: {
                                  sizeOffset: 6
                                }
                              },
                              xaxis: {
                                // categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                                //   '10 Jan', '11 Jan', '12 Jan'
                                // ],
                                categories: <?= json_encode($allMonthsEarningOnYear) ?>
                              },
                              tooltip: {
                                y: [{
                                    title: {
                                      formatter: function(val) {
                                        return val + " (mins)"
                                      }
                                    }
                                  },
                                  {
                                    title: {
                                      formatter: function(val) {
                                        return val + " per session"
                                      }
                                    }
                                  },
                                  {
                                    title: {
                                      formatter: function(val) {
                                        return val;
                                      }
                                    }
                                  }
                                ]
                              },
                              toolbar: {
                                enabled:false
                              },
                              grid: {
                                borderColor: '#f1f1f1',
                              }
                            };

                            var chart = new ApexCharts(document.querySelector("#customer_charts"), options);
                            chart.render();
                          </script>
                        </s>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->
                </div>

                <div class="row">
                  <div class="col-xl-4">
                    <div class="card card-height-100">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sản phẩm theo danh mục</h4>
                        <div class="flex-shrink-0">
                          <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Tải báo cáo</a>
                              <a class="dropdown-item" href="#">Xuất</a>
                              <a class="dropdown-item" href="#">Nhập</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <!-- id="store-visits-source" -->
                        <div
                          id="chart"
                          data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                          data-colors-minimal='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                          data-colors-interactive='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                          data-colors-galaxy='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                          class="apex-charts" dir="ltr"></div>
                        <script>
                          var options = {
                            series: <?= json_encode($data) ?>,
                            chart: {
                              width: 380,
                              type: 'donut',
                            },
                            labels: <?= json_encode($dataLabel) ?>,
                            dataLabels: {
                              enabled: true
                            },
                            responsive: [{
                              breakpoint: 480,
                              options: {
                                chart: {
                                  width: 200
                                },
                                legend: {
                                  show: false
                                }
                              }
                            }],
                            legend: {
                              position: 'right',
                              offsetY: 0,
                              height: 230,
                            }
                          };
                          var chart = new ApexCharts(document.querySelector("#chart"), options);
                          chart.render();
                        </script>
                      </div>
                    </div> <!-- .card-->
                  </div>

                  <div class="col-xl-8">
                    <div class="card card-height-100">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Top sản phẩm khuyến mại</h4>
                        <div class="flex-shrink-0">
                          <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted">Báo cáo<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Tải báo cáo</a>
                              <a class="dropdown-item" href="#">Xuất</a>
                              <a class="dropdown-item" href="#">Nhập</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <div class="table-responsive table-card">
                          <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                            <tbody>
                              <?php foreach ($getTopSellers as $row): ?>
                                <tr>
                                  <td>
                                    <div class="d-flex align-items-center">
                                      <div class="flex-shrink-0 me-2">
                                        <img src="<?= $row['anh_dai_dien'] ?>" alt="" class="avatar-sm p-2" />
                                      </div>
                                      <div>
                                        <h5 class="fs-14 my-1 fw-medium">
                                          <a href="apps-ecommerce-seller-details.html" class="text-reset"><?= $row['ten_san_pham'] ?></a>
                                        </h5>
                                        <span class="text-muted"><?= $row['ten_danh_muc'] ?></span>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <span class="text-muted"><?= formatCurrency($row['gia_khuyen_mai']) ?><sup>đ</sup></span>
                                  </td>
                                  <td>
                                    <h5 class="fs-14 mb-0"><?= formatCurrency((($row['gia_ban'] - $row['gia_khuyen_mai']) / $row['gia_ban'] * 100)) ?>%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                  </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table><!-- end table -->
                        </div>
                      </div> <!-- .card-body-->
                    </div> <!-- .card-->
                  </div> <!-- .col-->
                </div> <!-- end row-->

                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Đơn hàng gần đây</h4>
                        <div class="flex-shrink-0">
                          <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
                            <i class="ri-file-list-3-line align-middle"></i> Xuất báo cáo
                          </button>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <div class="table-responsive table-card">
                          <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                              <tr>
                                <th scope="col">ID đơn hàng</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($getOrderRecent as $row): ?>
                                <tr>
                                  <td>
                                    <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#<?= $row['don_hang_id'] ?></a>
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-center">
                                      <div class="flex-shrink-0 me-2">
                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle material-shadow" />
                                      </div>
                                      <div class="flex-grow-1"><?= $row['ho_ten'] ?></div>
                                    </div>
                                  </td>
                                  <td><?= $row['email'] ?></td>
                                  <td>
                                    <span class="text-success"><?= formatCurrency($row['tong_tien']) ?><sup>đ</sup></span>
                                  </td>
                                  <td>
                                    <span class="badge bg-success-subtle text-success"><?= $row['trang_thai'] ?></span>
                                  </td>
                                  <td>
                                    <a href="?act=orderDetail&id=<?= $row['don_hang_id'] ?>" class="link-success fs-15"><i class="ri-eye-line"></i></a>
                                  </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table><!-- end table -->
                        </div>
                      </div>
                    </div> <!-- .card-->
                  </div> <!-- .col-->
                </div> <!-- end row-->

              </div> <!-- end .h-100-->

            </div> <!-- end col -->
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
  require_once "layouts/libs_js.php";
  ?>

</body>

</html>
