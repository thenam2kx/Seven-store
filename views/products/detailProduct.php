<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Chi tiết sản phẩm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>
  <link href="assets/cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">

  <style>
    #custom-product-item .slick-arrow {
      position: absolute;
      top: 50%;
      z-index: 2;
      cursor: pointer;
      font-size: 0;
      line-height: 0;
      background: none;
      border: none;
      width: 38px;
      height: 38px;
      background: #f7f8fa;
      color: #191919;
      font-weight: 500;
      border-radius: 50%;
      transition: all 0.2s linear;
      transform: translate(0%, -50%)
    }

    #custom-product-item {
      opacity: 0;
      transition: opacity 0.2s linear;
    }

    #custom-product-item.tt-show {
      opacity: 1;
    }

    #custom-product-item .slick-arrow:hover {
      background: #2879fe;
      color: #ffffff;
    }

    #custom-product-item .slick-arrow:before {
      font-family: "wokiee";
      font-size: 20px;
      line-height: 1;
    }

    #custom-product-item .slick-prev {
      left: 10px;
    }

    #custom-product-item .slick-prev:before {
      content: "\e90d";
    }

    #custom-product-item .slick-next {
      right: 10px;
    }

    #custom-product-item .slick-next:before {
      content: "\e90e";
    }

    #smallGallery .slick-arrow.slick-disabled,
    #custom-product-item .slick-arrow.slick-disabled {
      opacity: 0;
      pointer-events: none;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once "views/layouts/header.php";
  ?>

  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store/">Trang chủ</a></li>
        <li>Sản phẩm</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->
  <div id="tt-pageContent">
    <div class="container-indent">
      <!-- mobile product slider  -->
      <div class="tt-mobile-product-layout visible-xs">
        <div class="tt-mobile-product-slider arrow-location-center" id="zoom-mobile__slider">
          <div><img data-lazy="https://picsum.photos/100/100" alt=""></div>
          <div><img data-lazy="https://picsum.photos/100/100" alt=""></div>
          <div><img data-lazy="https://picsum.photos/100/100" alt=""></div>
          <div><img data-lazy="https://picsum.photos/100/100" alt=""></div>
        </div>
        <div id="zoom-mobile__layout">
          <a class="zoom-mobile__close btn" href="#">Back</a>
          <div id="tt-fotorama" data-nav="thumbs" data-auto="false" data-allowfullscreen="false" dataa-fit="cover"></div>
        </div>
      </div>
      <!-- /mobile product slider  -->
      <div class="container container-fluid-mobile">
        <div class="row">
          <div class="col-6 hidden-xs">
            <div class="tt-product-vertical-layout">
              <div class="tt-product-single-img">
                <div>
                  <button class="tt-btn-zomm tt-top-right"><i class="icon-f-86"></i></button>
                  <img class="zoom-product" src='admin/<?= $infoProduct['anh_dai_dien'] ?>' data-zoom-image="admin/<?= $infoProduct['anh_dai_dien'] ?>" alt="">
                  <div id="custom-product-item">
                    <button type="button" class="slick-arrow slick-prev">Previous</button>
                    <button type="button" class="slick-arrow slick-next">Next</button>
                  </div>
                </div>
              </div>
              <div class="tt-product-single-carousel-vertical">
                <ul id="smallGallery" class="tt-slick-button-vertical  slick-animated-show-js">
                  <li><a class="zoomGalleryActive" href="#" data-image="admin/<?= $infoProduct['anh_dai_dien'] ?>" data-zoom-image="admin/<?= $infoProduct['anh_dai_dien'] ?>"><img src="admin/<?= $infoProduct['anh_dai_dien'] ?>" alt=""></a></li>
                  <?php foreach ($imageByProduct as $item): ?>
                    <li><a href="#" data-image="admin/<?= $item['duong_dan'] ?>" data-zoom-image="admin/<?= $item['duong_dan'] ?>"><img src="admin/<?= $item['duong_dan'] ?>" alt=""></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="tt-product-single-info">
              <h1 class="tt-title"><?= $infoProduct['ten_san_pham'] ?></h1>
              <div class="tt-price">
                <span class="new-price">
                  <?= formatCurrency($infoProduct['gia_khuyen_mai']) ?> <sup>đ</sup>
                </span>

                <span class="new-price" style="color: gray; font-size: 16px; text-decoration: line-through; margin-left: 10px;">
                  <?= formatCurrency($infoProduct['gia_ban']) ?> <sup>đ</sup>
                </span>
              </div>
              <div class="tt-review">
                <div class="tt-rating">
                  <?php
                    $rating = isset($totalRateAndCount['trung_binh_diem']) ? $totalRateAndCount['trung_binh_diem'] : 0;
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
                <a class="product-page-gotocomments-js" href="#rate">(<?= $totalRateAndCount['tong_danh_gia'] ?> Đánh giá)</a>
              </div>
              <div class="tt-wrapper">
                <?= $infoProduct['mo_ta_ngan'] ?>
              </div>
              <div class="tt-wrapper">
                <div class="tt-add-info">
                  <ul>
                    <li><span>Người bán:</span> Seven store</li>
                    <li><span>Danh mục:</span> <?= $infoProduct['ten_danh_muc'] ?></li>
                  </ul>
                </div>
              </div>
              <div class="tt-wrapper">
                <div class="tt-row-custom-01">
                  <div class="col-item">
                    <div class="tt-input-counter style-01">
                      <span class="minus-btn"></span>
                      <input type="text" value="1" size="<?= $infoProduct['so_luong'] ?>">
                      <span class="plus-btn"></span>
                    </div>
                  </div>
                  <div class="col-item">
                    <a href="?act=addToCard&idPrd=<?= $infoProduct['spid'] ?>" class="btn btn-lg"><i class="icon-f-39"></i>Thêm vào giỏ hàng</a>
                  </div>
                </div>
              </div>
              <div class="tt-wrapper">
                <ul class="tt-list-btn">
                  <li><a class="btn-link" href="?act=addFavorite&id=<?= $idPrd ?>"><i class="icon-n-072"></i>Thêm vào danh sách yêu thích</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-indent">
      <div class="container">
        <div class="tt-collapse-block">
          <div class="tt-item">
            <div class="tt-collapse-title">MÔ TẢ</div>
            <div class="tt-collapse-content" style="display: none;">
              <?= $infoProduct['mo_ta_chi_tiet'] ?>
            </div>
          </div>
          <div class="tt-item" id="rate">
            <div class="tt-collapse-title tt-poin-comments">Đánh giá (<?= sizeof($rateProduct) ?>)</div>
            <div class="tt-collapse-content" style="display: none;">
              <div class="tt-review-block">
                <div class="tt-row-custom-02">
                  <div class="col-item"></div>
                  <div class="col-item">
                    <a href="#">Viết đánh giá</a>
                  </div>
                </div>
                <div class="tt-review-comments">
                  <?php foreach ($rateProduct as $item): ?>
                    <div class="tt-item">
                      <div class="tt-avatar">
                        <a href="#">
                          <img data-src="images/product/single/review-comments-img-01.jpg" alt="" class="loaded" src="images/product/single/review-comments-img-01.jpg" data-was-processed="true">
                        </a>
                      </div>
                      <div class="tt-content">
                        <div class="tt-rating">
                          <?php
                            $rating = $item['diem_danh_gia'];
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
                        <div class="tt-comments-title">
                          <span class="username"><span><?= $item['ho_ten'] ?></span></span>
                          <span class="time"> - <?= date('d-m-Y', strtotime($item['ngay_tao'])) ?></span></span>
                        </div>
                        <p><?= $item['noi_dung'] ?></p>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
                <div class="tt-review-form d-none">
                  <div class="tt-message-info">
                    Viết đánh giá của bạn cho sản phẩm
                  </div>
                  <div class="tt-rating-indicator">
                    <div class="tt-title">
                      Đánh giá của bạn *
                    </div>
                    <div class="tt-rating">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star-half"></i>
                      <i class="icon-star-empty"></i>
                    </div>
                  </div>
                  <form class="form-default">
                    <div class="form-group">
                      <label for="inputName" class="control-label">Họ tên *</label>
                      <input type="email" class="form-control" id="inputName" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="control-label">Email *</label>
                      <input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail">
                    </div>
                    <div class="form-group">
                      <label for="textarea" class="control-label">Nội dung *</label>
                      <textarea class="form-control" id="textarea" placeholder="Enter your review" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn">Lưu</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Comment -->
          <div class="tt-item" id="comment">
            <div class="tt-collapse-title tt-poin-comments">Bình luận (<?= sizeof($comment) ?>)</div>
            <div class="tt-collapse-content" style="display: none;">
              <div class="tt-review-block">
                <div class="tt-review-form #ffffff">
                  <div class="tt-message">
                    Viết bình luận của bạn cho sản phẩm
                  </div>
                  <form class="form-comment flex" action="?act=addComment&id=<?= $idPrd ?>" method="post">
                    <div class="form-group">
                      <input class="form-control " name="content" placeholder="Enter your review" rows="8"></input>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Thêm bình luận</button>
                    </div>
                  </form>
                </div>

                <div class="tt-review-comments">
                  <?php foreach ($comment as $item): ?>
                    <div class="tt-item">
                      <div class="tt-avatar">
                        <a href="#">
                          <img data-src="images/product/single/review-comments-img-01.jpg" alt="" class="loaded" src="images/product/single/review-comments-img-01.jpg" data-was-processed="true">
                        </a>
                      </div>
                      <div class="tt-content">
                        <div class="tt-comments-title">
                          <span class="username"><span><?= $item['ho_ten'] ?></span></span>
                          <span class="time"> - <?= date('d-m-Y', strtotime($item['ngay_tao'])) ?></span></span>
                        </div>
                        <p><?= $item['noi_dung'] ?></p>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-indent wrapper-social-icon">
      <div class="container">
        <ul class="tt-social-icon justify-content-center">
          <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
          <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
          <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
          <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
          <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
        </ul>
      </div>
    </div>

    <div class="container-indent <?= sizeof($productTheSame) === 0 ? 'd-none' : 'd-flex' ?>">
      <div class="container container-fluid-custom-mobile-padding">
        <div class="tt-block-title text-left">
          <h3 class="tt-title-small">SẢN PHẨM TƯƠNG TỰ</h3>
        </div>
        <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js">
          <?php foreach ($productTheSame as $item): ?>
            <div class="col-2 col-md-4 col-lg-3 tt-col-item">
              <div class="tt-product thumbprod-center">
                <div class="tt-image-box">
                  <a href="?act=productDetail&id=<?= $item['spid'] ?>" class="tt-btn-quickview" data-target="#ModalquickView" data-tooltip="Xem chi tiết" data-tposition="left"></a>
                  <a href="?act=addFavorite&id=<?= $item['spid'] ?>" class="tt-btn-wishlist" data-tooltip="Thêm vào sản phẩm yêu thích" data-tposition="left"></a>
                  <a href="?act=productDetail&id=<?= $item['spid'] ?>">
                    <span class="tt-img"><img src="images/loader.svg" data-src="admin/<?= $item['anh_dai_dien'] ?>" alt=""></span>
                    <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-18-01.jpg" alt=""></span>
                  </a>
                </div>
                <div class="tt-description">
                  <div class="tt-row">
                    <ul class="tt-add-info">
                      <li><a href="?act=products&category=<?= $item['dmid'] ?>"><?= $item['ten_danh_muc'] ?></a></li>
                    </ul>
                  </div>
                  <h2 class="tt-title"><a href="?act=productDetail&id=<?= $item['spid'] ?>"><?= $item['ten_san_pham'] ?></a></h2>
                  <div class="tt-price">
                    <?= formatCurrency($infoProduct['gia_khuyen_mai']) ?> <sup>đ</sup>
                  </div>
                  <div class="tt-product-inside-hover">
                    <div class="tt-row-btn">
                      <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                    </div>
                    <div class="tt-row-btn">
                      <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                      <a href="#" class="tt-btn-wishlist"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>



  <!-- FOOTER -->
  <?php
  require_once "views/layouts/footer.php";
  ?>
  <!-- JAVASCRIPT -->
  <script src="assets/ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>
  <!-- <script src="assets/separate-include/listing/listing.js"></script> -->
  <script src="assets/cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> -->
  <script src="assets/separate-include/single-product/single-product.js"></script>

  <div class="zoomContainer" style="transform: translateZ(0px); position: absolute; left: 110.844px; top: 131.99px; height: 491px; width: 393px;">
    <div class="zoomWindowContainer" style="width: 400px;">
      <div style="z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: -207px -9.60755px; width: 393px; height: 491px; float: left; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image: url(&quot;images/product/product-01.jpg&quot;); top: 0px; left: 0px; display: none;" class="zoomWindow">&nbsp;</div>
    </div>
  </div>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
