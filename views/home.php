<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Trang chủ</title>
  <link rel="shortcut icon" href="assets/images/custom/logo2.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "layouts/libs_css.php";
  ?>
  <style>
    .boxImage {
      position: relative;
    }

    .btn-addCard {
      position: absolute;
      bottom: 0;
      left: 0;
      z-index: 99;
      background-color: #2879fe;
      color: #ffffff;
      padding: 6px 12px;
      border-radius: 0px 0px 6px 6px;
      width: 100%;
      opacity: 0;
      visibility: hidden;
      transition: all linear .15s;
    }

    .tt-product:hover .btn-addCard {
      opacity: 1;
      visibility: visible;
    }

    .prdPrice {
      /* display: flex !important; */
      align-items: center;
      gap: 20x;
    }

    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

  </style>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once "layouts/header.php";
  ?>

  <!-- CONTENT -->
  <!-- BANNERS -->
  <swiper-container
    class="mySwiper"
    pagination="true"
    pagination-clickable="true"
    navigation="true"
    space-between="30"
    centered-slides="true"
    autoplay-delay="4000"
    autoplay-disable-on-interaction="false"
    loop='true'>
    <?php foreach ($resultsBanner as $row): ?>
      <swiper-slide>
        <img src="admin/<?= $row['duong_dan'] ?>" alt="">
      </swiper-slide>
    <?php endforeach ?>
  </swiper-container>


  <!-- PRODUCTS NEW -->
  <div class="container-indent mt-5">
    <div class="container container-fluid-custom-mobile-padding">
      <div class="tt-block-title">
        <h1 class="tt-title">Sản phẩm mới</h1>
        <!-- <div class="tt-description">TOP VIEW IN THIS WEEK</div> -->
      </div>
      <div class="row tt-layout-product-item">
        <?php foreach ($results as $result): ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="tt-product thumbprod-center">
              <div class="tt-image-box boxImage">
                <a href="?act=productDetail&id=<?= $result['id'] ?>" class="tt-btn-quickview" data-target="#ModalquickView" data-tooltip="Xem chi tiết" data-tposition="left"></a>
                <a href="?act=addFavorite&id=<?= $result['id'] ?>" class="tt-btn-wishlist" data-tooltip="Thêm vào sản phẩm yêu thích" data-tposition="left"></a>
                <a href="?act=productDetail&id=<?= $result['id'] ?>">
                  <span class="tt-img"><img src="admin/<?= $result['anh_dai_dien'] ?>" data-src="admin/<?= $result['anh_dai_dien'] ?>" alt="" class="loaded" data-was-processed="true"></span>
                  <span class="tt-img-roll-over"><img src="admin/<?= ($this->HomeModel->getImageSecond($result['id']))['duong_dan']  ?>" data-src="admin/<?= ($this->HomeModel->getImageSecond($result['id']))['duong_dan']  ?>" alt="" class="loaded" data-was-processed="true"></span>
                  <span class="tt-label-location">
                    <span class="tt-label-sale">Sale <?= number_format((($result['gia_ban'] - $result['gia_khuyen_mai']) / $result['gia_ban'] * 100), 0) ?>%</span>
                  </span>
                </a>
                <a href="?act=addToCard&idPrd=<?= $result['id'] ?>" class="tt-btn-addtocart btn-addCard thumbprod-button-bg" data-target="?act=addToCard&idPrd=<?= $result['id'] ?>">
                  Thêm vào giỏ hàng
                </a>
              </div>
              <div class="tt-description">
                <div class="tt-row">
                  <ul class="tt-add-info">
                    <li><a href="?act=products&category=<?= $result['dmid'] ?>"><?= $result['ten_danh_muc'] ?></a></li>
                  </ul>
                  <div class="tt-rating">
                    <?php
                    $point = ($this->HomeModel->getTotalRateAndCount($result['id']))['trung_binh_diem'];
                    $rating = isset($point) ? $point : 0;
                    $fullStars = floor($rating);
                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                    for ($i = 0; $i < $fullStars; $i++) {
                      echo '<i class="icon-star"></i>';
                    }
                    // Render sao nửa (nếu có)
                    if ($hasHalfStar) {
                      echo '<i class="icon-star-half"></i>';
                    }
                    // Render sao rỗng
                    for ($i = 0; $i < $emptyStars; $i++) {
                      echo '<i class="icon-star-empty"></i>';
                    }
                    ?>
                  </div>
                </div>
                <h2 class="tt-title"><a href="?act=productDetail&id=<?= $result['id'] ?>" style="display: inline-block; margin: 4px 0;"><?=  $result['ten_san_pham'] ?></a></h2>
                <div class="tt-price prdPrice">
                  <div style="color: #b0b0b0; text-decoration: line-through; font-size: 14px"><?= formatCurrency($result['gia_ban']) ?><sup>đ</sup></div>
                  <div><?= formatCurrency($result['gia_khuyen_mai']) ?><sup>đ</sup></div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>



  <!-- PRODUCTS BEST SELLING -->
  <div class="container-indent mt-5">
    <div class="container container-fluid-custom-mobile-padding">
      <div class="tt-block-title">
        <h1 class="tt-title">Sản phẩm nổi bật</h1>
      </div>
      <div class="row tt-layout-product-item">
        <?php foreach ($resultProductPopular as $result): ?>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="tt-product thumbprod-center">
              <div class="tt-image-box boxImage">
                <a href="?act=productDetail&id=<?= $result['id'] ?>" class="tt-btn-quickview" data-target="#ModalquickView" data-tooltip="Xem chi tiết" data-tposition="left"></a>
                <a href="?act=addFavorite&id=<?php echo $result['id']; ?>" class="tt-btn-wishlist" data-tooltip="Thêm vào sản phẩm yêu thích" data-tposition="left"></a>
                <a href="?act=productDetail&id=<?= $result['id'] ?>">
                  <span class="tt-img"><img src="admin/<?= $result['anh_dai_dien'] ?>" data-src="admin/<?= $result['anh_dai_dien'] ?>" alt="" class="loaded" data-was-processed="true"></span>
                  <span class="tt-img-roll-over"><img src="admin/<?= ($this->HomeModel->getImageSecond($result['id']))['duong_dan']  ?>" data-src="admin/<?= ($this->HomeModel->getImageSecond($result['id']))['duong_dan']  ?>" alt="" class="loaded" data-was-processed="true"></span>
                  <span class="tt-label-location">
                    <span class="tt-label-sale">Sale <?= number_format((($result['gia_ban'] - $result['gia_khuyen_mai']) / $result['gia_ban'] * 100), 0) ?>%</span>
                  </span>
                </a>
                <a href="?act=addToCard&idPrd=<?= $result['id'] ?>" class="tt-btn-addtocart btn-addCard thumbprod-button-bg" data-target="?act=addToCard&idPrd=<?= $result['id'] ?>">
                  Thêm vào giỏ hàng
                </a>
              </div>
              <div class="tt-description">
                <div class="tt-row">
                  <ul class="tt-add-info">
                    <li><a href="#"><?= $result['ten_danh_muc'] ?></a></li>
                  </ul>
                  <div class="tt-rating">
                    <?php
                      $point = ($this->HomeModel->getTotalRateAndCount($result['id']))['trung_binh_diem'];
                      $rating = isset($point) ? $point : 0;
                      $fullStars = floor($rating);
                      $hasHalfStar = ($rating - $fullStars) >= 0.5;
                      $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                      for ($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="icon-star"></i>';
                      }
                      // Render sao nửa (nếu có)
                      if ($hasHalfStar) {
                        echo '<i class="icon-star-half"></i>';
                      }
                      // Render sao rỗng
                      for ($i = 0; $i < $emptyStars; $i++) {
                        echo '<i class="icon-star-empty"></i>';
                      }
                    ?>
                  </div>
                </div>
                <h2 class="tt-title"><a href="?act=productDetail&id=<?= $result['id'] ?>" style="display: inline-block; margin: 4px 0;"><?= $result['ten_san_pham'] ?></a></h2>
                <div class="tt-price prdPrice">
                  <div style="color: #b0b0b0; text-decoration: line-through; font-size: 14px"><?= formatCurrency($result['gia_ban'])  ?> <sup>đ</sup></div>
                  <div><?= formatCurrency($result['gia_khuyen_mai']) ?><sup>đ</sup></div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <!-- CONTACT -->
  <div class="container-indent" style="margin-top: 80px">
    <div class="container-fluid">
      <div class="tt-block-title">
        <h2 class="tt-title"><a target="_blank" href="https://www.instagram.com/wokieeshop/">@ Theo dõi chúng tôi</a></h2>
        <div class="tt-description">FACEBOOK</div>
      </div>
      <div class="row">
        <div id="instafeed" class="instafeed-fluid" data-access-token="IGQVJXX1hydHVETWFEMGIzeFFmYzIyU1ZAjTHREakhBU1ZAHU0JOZAXJmSWtfbUotMnNHVGxUTUxXckIwVUlhVk1QTEhfQXliNkVoejlILS1Kem40NU1fSWszOTZAhT0dOZAWZAqLXZA1QWxKSHNhSTdpRmN5WQZDZD" data-limitimg="6"></div>
      </div>
    </div>
  </div>


  <!-- MORE -->
  <div class="container-indent mt-5">
    <div class="container">
      <div class="row tt-services-listing">
        <div class="col-xs-12 col-md-6 col-lg-4">
          <a href="#" class="tt-services-block">
            <div class="tt-col-icon">
              <i class="icon-f-48"></i>
            </div>
            <div class="tt-col-description">
              <h4 class="tt-title">Miễn phí giao hàng</h4>
              <p>Miễn phí vận chuyển cho tất cả các đơn hàng tại Hoa Kỳ hoặc đơn hàng trên 200k</p>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
          <a href="#" class="tt-services-block">
            <div class="tt-col-icon">
              <i class="icon-f-35"></i>
            </div>
            <div class="tt-col-description">
              <h4 class="tt-title">Hỗ trợ 24/7</h4>
              <p>Liên hệ đội ngũ hỗ trợ của chúng tôi để được tư vấn</p>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
          <a href="#" class="tt-services-block">
            <div class="tt-col-icon">
              <i class="icon-e-09"></i>
            </div>
            <div class="tt-col-description">
              <h4 class="tt-title">Miễn phí đổi trả trong 24 giờ</h4>
              <p>Miễn phí đổi hàng trong vòng 24 giờ nếu bạn không hài lòng với sản phẩm.</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>


  <!-- FOOTER -->
  <?php
  require_once "layouts/footer.php";
  ?>
  <!-- JAVASCRIPT -->
  <?php
  require_once "layouts/libs_js.php";
  ?>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
