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
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
  <script type="importmap">
    {
      "imports": {
          "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.js",
          "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.0/"
          }
      }
  </script>
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
            <h4 class="mb-sm-0">Thêm đơn hàng</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item active">Thêm đơn hàng</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="live-preview">
                <form class="row g-3 needs-validation" action="?act=addOrder" method="POST" enctype="multipart/form-data" novalidate>
                  <div class="col-md-12">
                    <label for="user" class="form-label">Người gửi</label>
                    <select class="form-select" name="user" id="user" required>
                      <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= $user['ho_ten'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn họ tên người nhận.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="name" class="form-label">Họ tên người nhận</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người nhận" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập tên người nhận.
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="note" class="form-label">Ghi chú đơn hàng</label>
                    <textarea class="form-control" name="note" id="note" maxlength="255" rows="1" placeholder="Nhập ghi chú" required></textarea>
                    <div class="invalid-feedback">
                      Vui lòng nhập ghi chú đơn hàng.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập emai người nhận.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Nhập Số điện thoại người nhận" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập Số điện thoại người nhận.
                    </div>
                  </div>


                  <div class="col-md-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập địa chỉ người nhận.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="totalMoney" class="form-label">Tổng tiền</label>
                    <input type="number" class="form-control" id="totalMoney" name="totalMoney" placeholder="Nhập tổng tiền" required step="0.01">
                    <div class="invalid-feedback">
                      Vui lòng nhập tổng tiền của đơn hàng.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="pay" class="form-label">Thanh toán</label>
                    <input type="number" name="pay" class="form-control" id="pay" placeholder="Tổng tiền sau khi trừ khuyến mãi và vận chuyển" required step="0.01">
                    <div class="invalid-feedback">
                      Vui lòng nhập tổng tiền thanh toán.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="date" class="form-label">Ngày đặt</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Nhập ngày đặt" required>
                    <div class="invalid-feedback">
                      Vui lòng chọn ngày đặt.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="payForm" class="form-label">Hình thức thanh toán</label>
                    <select class="form-select" name="payForm" id="payForm" required>
                      <option selected value="1">MOMO</option>
                      <option value="0">COD</option>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn hình thức thanh toán.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="payStatus" class="form-label">Trạng thái thanh toán</label>
                    <select class="form-select" name="payStatus" id="payStatus" required>
                      <option selected value="1">Đã thanh toán</option>
                      <option value="0">Chưa thanh toán</option>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn trạng thái thanh toán.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="OrderStatus" class="form-label">Trạng thái đơn hàng</label>
                    <select class="form-select" name="OrderStatus" id="OrderStatus" required>
                      <?php foreach ($listOrderStatus as $OrderStatus): ?>
                        <option value="<?= $OrderStatus['id'] ?>"><?= $OrderStatus['trang_thai'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn trạng thái đơn hàng.
                    </div>
                  </div>

                  <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="save" value="Thêm đơn hàng" />
                    <button class="btn btn-outline-primary" type="reset">Xóa</button>
                    <a class="btn" href="?act=listOrder" type="reset">Hủy</a>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <script type="module">
            import {
              ClassicEditor,
              Essentials,
              Paragraph,
              Bold,
              Italic,
              Underline,
              Strikethrough,
              Superscript,
              Link,
              List,
              Font,
              Alignment,
              Subscript,
              Indent,
              BlockQuote,
              Image,
              ImageUpload,
              MediaEmbed,
              Table,
              Code,
              Highlight,
              HorizontalLine,
              PageBreak,
              SpecialCharacters,
              CodeBlock,
              TodoList,
              FontSize,
              FontBackgroundColor,
              FontColor
            } from 'ckeditor5'

            ClassicEditor
              .create(document.querySelector('#content'), {
                plugins: [
                  Essentials,
                  Paragraph,
                  Bold,
                  Italic,
                  Alignment,
                  Underline,
                  Strikethrough,
                  Subscript,
                  Superscript,
                  Link,
                  List,
                  Font,
                  Indent,
                  BlockQuote,
                  Image,
                  ImageUpload,
                  MediaEmbed,
                  Table,
                  Code,
                  Highlight,
                  HorizontalLine,
                  PageBreak,
                  SpecialCharacters,
                  CodeBlock,
                  TodoList,
                  FontSize,
                  FontBackgroundColor,
                  FontColor
                ],
                toolbar: {
                  items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                    'link', 'bulletedList', 'numberedList', 'todoList', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', 'indent', 'outdent', '|',
                    'blockQuote', 'insertTable', 'mediaEmbed', 'imageUpload', '|',
                    'undo', 'redo', '|',
                    'code', 'codeBlock', 'highlight', '|',
                    'horizontalLine', 'pageBreak', '|',
                    'removeFormat', 'specialCharacters'
                  ]
                },
                image: {
                  toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                  ]
                },
                imageUpload: {
                  // Endpoint xử lý tải lên hình ảnh
                  uploadUrl: '../config/upload.php',
                },
                table: {
                  contentToolbar: [
                    'tableColumn', 'tableRow', 'mergeTableCells'
                  ]
                },
                alignment: {
                  options: ['left', 'center', 'right', 'justify']
                },
                fontFamily: {
                  options: [
                    'default',
                    'Ubuntu, Arial, sans-serif',
                    'Ubuntu Mono, Courier New, Courier, monospace'
                  ]
                },
                fontSize: {
                  options: [9, 11, 13, 17, 19, 21]
                },
                fontColor: {
                  colors: [{
                      color: 'hsl(0, 0%, 0%)',
                      label: 'Đen'
                    },
                    {
                      color: 'hsl(0, 0%, 50%)',
                      label: 'Xám'
                    },
                    {
                      color: 'hsl(0, 100%, 100%)',
                      label: 'Trắng'
                    },
                    {
                      color: 'hsl(0, 100%, 60%)',
                      label: 'Đỏ'
                    },
                    {
                      color: 'hsl(120, 100%, 40%)',
                      label: 'Xanh lá cây'
                    },
                    {
                      color: 'hsl(240, 100%, 50%)',
                      label: 'Xanh dương'
                    },
                  ]
                },
              })
              .catch(error => {
                console.error(error);
              });
          </script>


          <script>
            (() => {
              'use strict';
              const form = document.querySelector('.needs-validation');
              form.addEventListener('submit', (event) => {
                // Kiểm tra tính hợp lệ của form
                if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                // Thêm lớp 'was-validated' để Bootstrap tự động áp dụng CSS cho các input không hợp lệ
                form.classList.add('was-validated');
              }, false);
            })();
          </script>
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
