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
            <h4 class="mb-sm-0">Cập nhật sản phẩm</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="http://localhost/seven-store/admin/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="?act=listProduct">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
              </ol>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="live-preview">
                <form class="row g-3 needs-validation" action="?act=handleEditProduct" method="POST" enctype="multipart/form-data" novalidate>
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="id" value="<?= $result['id'] ?>" hidden>
                  </div>
                  <div class="col-md-12">
                    <img src="<?= $result['anh_dai_dien'] ?>" alt="<?= $result['anh_dai_dien'] ?>" class="img-thumbnail" style="width: 120px; height: 120px;">
                  </div>
                  <div class="col-md-12">
                    <label for="ten-sp" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="ten-sp" name="name" value="<?= $result['ten_san_pham'] ?>" placeholder="Nhập tên sản phẩm" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập tên sản phẩm.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="danh-muc" class="form-label">Danh mục</label>
                    <select class="form-select" name="category" id="danh-muc" required>
                      <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $result['danh_muc_id'] === $category['id'] ? 'selected' : '' ?>><?= $category['ten_danh_muc'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn danh mục sản phẩm.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="gia-nhap" class="form-label">Giá nhập</label>
                    <div class="input-group">
                      <span class="input-group-text">$</span>
                      <input type="number" name="priceInput" class="form-control" id="gia-nhap" value="<?= $result['gia_nhap'] ?>" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="invalid-feedback">
                      Vui lòng nhập giá nhập của sản phẩm.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="gia-ban" class="form-label">Giá bán</label>
                    <div class="input-group">
                      <span class="input-group-text">$</span>
                      <input type="number" name="priceSell" class="form-control" id="gia-ban" value="<?= $result['gia_ban'] ?>" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="invalid-feedback">
                      Vui lòng nhập giá bán của sản phẩm
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="khuyen-mai" class="form-label">Giá khuyến mãi</label>
                    <div class="input-group">
                      <span class="input-group-text">$</span>
                      <input type="number" name="priceDiscount" class="form-control" id="khuyen-mai" value="<?= $result['gia_khuyen_mai'] ?>" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="invalid-feedback">
                      Vui lòng nhập giá khuyến mãi.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="so-luong" class="form-label">Số lượng</label>
                    <input type="number" name="total" class="form-control" id="so-luong" value="<?= $result['so_luong'] ?>" placeholder="Nhập số lượng" required>
                    <div class="invalid-feedback">
                      Vui lòng nhập số lượng
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="trang-thai" class="form-label">Trạng thái</label>
                    <select class="form-select" name="status" id="trang-thai" required>
                      <option <?= $result['trang_thai'] === 1 ? 'selected' : '' ?> value="1">Hiển thị</option>
                      <option <?= $result['trang_thai'] === 0 ? 'selected' : '' ?> value="0">Ẩn</option>
                    </select>
                    <div class="invalid-feedback">
                      Vui lòng chọn trạng thái.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="formFile" class="form-label">Chọn ảnh đại diện</label>
                    <input class="form-control" name="file" type="file" id="formFile">
                    <div class="invalid-feedback">
                      Vui lòng chọn ảnh đại diện.
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="content-short" class="form-label">Mô tả ngắn sản phẩm</label>
                    <textarea class="form-control" name="contentShort" id="content-short" rows="3" placeholder="Nhập mô tả sản phẩm" required>
                      <?= $result['mo_ta_ngan'] ?>
                    </textarea>
                    <div class="invalid-feedback">
                      Vui lòng nhập mô tả ngắn sản phẩm.
                    </div>
                  </div>


                  <div class="col-md-12">
                    <label for="content" class="form-label">Mô tả chi tiết sản phẩm</label>
                    <textarea class="form-control" name="contentdetail" id="content" rows="12" placeholder="Nhập mô tả sản phẩm" required>
                      <?= $result['mo_ta_chi_tiet'] ?>
                    </textarea>
                    <div class="invalid-feedback">
                      Vui lòng nhập mô tả sản phẩm.
                    </div>
                  </div>

                  <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="save" value="Cập nhật" />
                    <a class="btn btn-outline-primary" href="?act=listProduct" type="reset">Hủy</a>
                    <a class="btn btn-outline-danger" href="?act=deleteProduct&id=<?= $result['id'] ?>" onclick="confirmDelete(<?= $result['id'] ?>)">Xóa</a>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <script>
            function confirmDelete(id) {
              if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                window.location.href = "?act=deleteProduct&id=" + id;
              }
            }
          </script>


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
