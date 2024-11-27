<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Thay đổi mật khẩu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once "views/layouts/header.php";
  ?>

  <!-- CONTENT -->
  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store">Trang chủ</a></li>
        <li><a href="?act=account">Tài khoản</a></li>
        <li>Thay đổi mật khẩu</li>
      </ul>
    </div>
  </div>
  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container container-fluid-custom-mobile-padding">
        <h1 class="tt-title-subpages noborder">Thay đổi mật khẩu</h1>
        <div class="tt-shopping-layout">
          <div class="form-default">
            <form class="form-default" action="?act=handleUpdatePassword" method="post">
              <div class="form-group">
                <label for="pass" class="control-label">Nhập mật khẩu</label>
                <input type="text" name="old_pass" class="form-control" id="mat_khau" required>
              </div>
              <div class="form-group">
                <label for="new_pass" class="control-label">Nhập mật khẩu mới</label>
                <input type="text" name="new_pass" class="form-control" id="new_pass" required>
              </div>
              <div class="form-group">
                <label for="re_pass" class="control-label">Nhập lại mật khẩu</label>
                <input type="text" name="re_pass" class="form-control" id="re_pass" required>
              </div>
              <div class="row tt-offset-21">
                <div class="col-auto">
                  <button type="submit" class="btn">Đổi mật khẩu</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php
  require_once "views/layouts/footer.php";
  ?>
  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>
</body>

</html>
