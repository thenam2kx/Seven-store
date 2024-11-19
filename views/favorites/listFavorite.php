<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Danh sách sản phẩm</title>
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
  <!-- BANNERS -->



  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Danh sách yêu thích</h1>
        <div class="tt-wishlist-box" id="js-wishlist-removeitem">
          <div class="tt-wishlist-list">
            <?php foreach ($results as $result): ?>
              <div class="tt-item">
                <div class="tt-col-description">
                  <div class="tt-img">
                    <img src="admin/<?= empty($result['anh_dai_dien']) ? 'default-avatar.jpg' : $result['anh_dai_dien'] ?>" alt="Avatar" class="loaded" class="loading" data-was-processed="true">
                  </div>
                  <div class="tt-description">
                    <h2 class="tt-title"><a href="#"><?= $result['ten_san_pham'] ?></a></h2>
                    <div class="tt-price">
                      <?= $result['gia_ban'] ?>Đ
                    </div>
                  </div>
                </div>
                <div class="tt-col-btn">
                  <a href="#" class="tt-btn-addtocart" data-toggle="modal" data-target="#modalAddToCartProduct"><i class="icon-f-39"></i>Thêm vào giỏ</a>
                  <a class="btn-link" href="#" data-toggle="modal" data-target="#ModalquickView"><i class="icon-f-73"></i>Xem sản phẩm</a>
                  <a class="btn-link js-removeitem" href="?act=listFavorite&id=<?php echo $_SESSION['username']['id']; ?>" onclick="confirmDelete(<?= $result['id'] ?>)"><i class="icon-h-02"></i>Xóa</a>
                </div>
              </div>
            <?php endforeach ?>
            <script>
                    function confirmDelete(id) {
                      if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                        window.location.href = "?act=deleteFavorite&id=" + id;
                      }
                    }
                  </script>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  <style>
    .loading {
      width: 100px;
      /* Set your fixed width */
      height: 100px;
      /* Set your fixed height */

    }
  </style>
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
