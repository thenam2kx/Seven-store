<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title><?= $blogPost["tieu_de"]; ?></title>
  <link rel="shortcut icon" href="assets/images/custom/logo2.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "./views/layouts/libs_css.php";
  ?>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once "views/layouts/header.php";
  ?>

  <!-- CONTENT -->

  <!-- MAIN -->
  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container container-fluid-custom-mobile-padding">
        <div class="row justify-content-center">
          <div class="col-xs-12 col-md-10 col-lg-8 col-md-auto">
            <div class="tt-post-single">
              <h1 class="tt-title">
                <?= $blogPost["tieu_de"]; ?>
              </h1>
              <div class="tt-autor">
                <?= $blogPost["ngay_tao"]; ?>
              </div>
              <div class="tt-post-content">
                <?= $blogPost["noi_dung"]; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-indent">
    <div class="container container-fluid-custom-mobile-padding">
    </div>
  </div>
  <div class="container-indent wrapper-social-icon">
    <div class="container container-fluid-custom-mobile-padding">
      <ul class="tt-social-icon justify-content-center">
        <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
        <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
        <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
        <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
        <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
      </ul>
    </div>
  </div>
  <!-- END MAIN -->

  <!-- FOOTER -->
  <?php
  require_once "views/layouts/footer.php";
  ?>
  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
