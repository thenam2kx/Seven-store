<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signup-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:05 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Đăng ký tài khoản</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="./admin/assets/images/favicon.ico">

  <!-- Layout config Js -->
  <script src="./admin/assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="./admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="./admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="./admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="./admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

  <!-- auth-page wrapper -->
  <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card overflow-hidden m-0 card-bg-fill galaxy-border-none">
              <div class="row justify-content-center g-0">
                <div class="col-lg-6">
                  <div class="p-lg-5 p-4 auth-one-bg h-100">
                    <div class="bg-overlay"></div>
                    <div class="position-relative h-100 d-flex flex-column">
                      <div class="mb-4">
                        <a href="index.html" class="d-block">
                          <img src="./admin/assets/images/logo-light.png" alt="" height="18">
                        </a>
                      </div>
                      <div class="mt-auto">
                        <div class="mb-3">
                          <i class="ri-double-quotes-l display-4 text-success"></i>
                        </div>

                        <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner text-center text-white-50 pb-5">
                            <div class="carousel-item active">
                              <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                            </div>
                            <div class="carousel-item">
                              <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>
                            </div>
                            <div class="carousel-item">
                              <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                            </div>
                          </div>
                        </div>
                        <!-- end carousel -->

                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="p-lg-5 p-4">
                    <div>
                      <h5 class="text-primary">Đăng ký tài khoản</h5>
                      <p class="text-muted">Đăng ký tài khoản để mua sắm tại Seven store.</p>
                    </div>

                    <div class="mt-4">
                      <form class="needs-validation" novalidate action="?act=handleSignup" method="POST">

                        <div class="mb-3">
                          <label for="username" class="form-label">Họ Tên <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="ho_ten" id="username" placeholder="Enter name" required>
                          <div class="invalid-feedback">
                            Vui lòng nhập tên
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email " required>
                          <div class="invalid-feedback">
                            Vui lòng nhập email
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="phone" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="so_dien_thoai" id="phone" placeholder="Enter phone" required>
                          <div class="invalid-feedback">
                            Vui lòng nhập số điện thoại
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="password-input">Mật khẩu <span class="text-danger">*</span></label>
                          <div class="position-relative auth-pass-inputgroup">
                            <input type="password" name="mat_khau" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            <div class="invalid-feedback">
                              Vui lòng nhập mật khẩu
                            </div>
                          </div>
                        </div>

                        <div class="mb-4">
                          <p class="mb-0 fs-12 text-muted fst-italic">Bằng cách đăng ký bạn đã đồng ý với điều khoản của seven <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                        </div>

                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                          <h5 class="fs-13">Password must contain:</h5>
                          <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                          <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                          <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                          <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                        </div>

                        <div class="mt-4">
                          <button class="btn btn-success w-100" type="submit">Đăng ký</button>
                        </div>

                        <div class="mt-4 text-center">
                          <div class="signin-other-title">
                            <h5 class="fs-13 mb-4 title text-muted">Đăng ký tài khoản với</h5>
                          </div>
                          <div>
                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="mt-5 text-center">
                      <p class="mb-0">Bạn đã có tài khoản ? <a href="admin/?act=signin" class="fw-semibold text-primary text-decoration-underline"> Đăng nhập</a> </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->

        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer galaxy-border-none">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <p class="mb-0">&copy;
                <script>
                  document.write(new Date().getFullYear())
                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->
  </div>
  <!-- end auth-page-wrapper -->

  <!-- JAVASCRIPT -->
  <script src="./admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./admin/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="./admin/assets/libs/node-waves/waves.min.js"></script>
  <script src="./admin/assets/libs/feather-icons/feather.min.js"></script>
  <script src="./admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="./admin/assets/js/plugins.js"></script>

  <!-- validation init -->
  <script src="./admin/assets/js/pages/form-validation.init.js"></script>
  <!-- password create init -->
  <script src="./admin/assets/js/pages/passowrd-create.init.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signup-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:05 GMT -->

</html>
