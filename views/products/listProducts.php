<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Trang chủ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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


  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
            <div class="tt-btn-col-close">
              <a href="#">Close</a>
            </div>
            <div class="tt-collapse open tt-filter-detach-option">
              <div class="tt-collapse-content">
                <div class="filters-mobile">
                  <div class="filters-row-select">

                  </div>
                </div>
              </div>
            </div>
            <div class="tt-collapse">
              <h3 class="tt-collapse-title">Lọc theo</h3>
              <div class="tt-collapse-content">
                <ul class="tt-filter-list">
                  <li class="active">
                    <a href="#">Shirts &amp; Tops</a>
                  </li>
                  <li>
                    <a href="#">XS</a>
                  </li>
                  <li>
                    <a href="#">White</a>
                  </li>
                </ul>
                <a href="#" class="btn-link-02">Clear All</a>
              </div>
            </div>
            <div class="tt-collapse open">
              <h3 class="tt-collapse-title">Sản phẩm theo danh mục</h3>
              <div class="tt-collapse-content">
                <ul class="tt-list-row">
                  <li class="active"><a href="?act=products">Tất cả</a></li>
                  <?php foreach ($resultCategory as $row): ?>
                    <li><a href="?act=products&category=<?= $row['id'] ?>"><?= $row['ten_danh_muc'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            <div class="tt-collapse open">
              <h3 class="tt-collapse-title">Lọc theo giá</h3>
              <div class="tt-collapse-content">
                <ul class="tt-list-row">
                  <li class="active"><a href="?act=products">Tất cả</a></li>
                  <li><a href="?act=products&priceMin=0&priceMax=50000">$0 — $50000</a></li>
                  <li><a href="?act=products&priceMin=50000&priceMax=200000">$50000 — $200000</a></li>
                  <li><a href="?act=products&priceMin=200000&priceMax=500000">$200000 — $500000</a></li>
                  <li><a href="?act=products&priceMin=500000&priceMax=2000000">$500000 — $2000000</a></li>
                </ul>
              </div>
            </div>
            <div class="tt-content-aside">
              <a href="listing-left-column.html" class="tt-promo-03">
                <img src="images/custom/listing_promo_img_07.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-md-12 col-lg-9 col-xl-9">
            <div class="content-indent container-fluid-custom-mobile-padding-02">
              <div class="d-flex align-items-center justify-content-between">
                <form class="form-inline form-default" method="post" action="?act=products">
                  <div class="form-group mb-0">
                    <input type="text" name="keysearch" class="form-control" placeholder="Tìm kiếm sản phẩm">
                    <input type="submit" class="btn btn-outline-primary" value="Tìm kiếm">
                  </div>
                </form>
                <div class="tt-filters-options" id="js-tt-filters-options">
                  <div class="tt-btn-toggle">
                    <a href="#">FILTER</a>
                  </div>
                  <div class="tt-sort">
                    <select name="sortPrice" class="select-price" id="select-price">
                      <option value="?act=products">Mặc định</option>
                      <option value="?act=products&sortPrice=asc">Giá từ cao đến thấp</option>
                      <option value="?act=products&sortPrice=desc">Giá từ thấp đến cao</option>
                    </select>
                    <script>
                      $(document).ready(function() {
                        const active = location.search;
                        $('#select-price option[value="' + active + '"]').attr('selected', 'selected');
                      })
                      $('.select-price').change(function() {
                        const value = $(this).find(':selected').val()
                        if (value != 0) {
                          const url = value;
                          window.location.replace(url);
                        } else {
                          alert('Hãy lọc sản phẩm');
                        }
                      })
                    </script>

                    <select name="sortPrice" class="select-limit" id="select-limit">
                      <option value="?act=products">Hiển thị</option>
                      <option value="?act=products&sortLimit=9">9 sản phẩm</option>
                      <option value="?act=products&sortLimit=16">16 sản phẩm</option>
                      <option value="?act=products&sortLimit=32">32 sản phẩm</option>
                    </select>
                    <script>
                      $(document).ready(function() {
                        const active = location.search;
                        console.log('active: ', active)
                        $('#select-limit option[value="' + active + '"]').attr('selected', 'selected');
                      })
                      $('.select-limit').change(function() {
                        const value = $(this).find(':selected').val()
                        if (value != 0) {
                          const url = value;
                          window.location.replace(url);
                        } else {
                          alert('Hãy lọc sản phẩm');
                        }
                      })
                    </script>
                  </div>


                  <div class="tt-quantity">
                    <a href="#" class="tt-col-one" data-value="tt-col-one"></a>
                    <a href="#" class="tt-col-two" data-value="tt-col-two"></a>
                    <a href="#" class="tt-col-three" data-value="tt-col-three"></a>
                    <a href="#" class="tt-col-four" data-value="tt-col-four"></a>
                    <a href="#" class="tt-col-six" data-value="tt-col-six"></a>
                  </div>
                </div>
              </div>



              <div class="tt-product-listing row">
                <?php foreach ($results as $result): ?>
                  <div class="col-6 col-md-4 tt-col-item">
                    <div class="tt-product thumbprod-center">
                      <div class="tt-image-box">
                        <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView" data-tooltip="Quick View" data-tposition="left"></a>
                        <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                        <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>
                        <a href="product.html">
                          <span class="tt-img"><img src="images/loader.svg" data-src="admin/<?= $result['anh_dai_dien'] ?>" alt=""></span>
                          <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-18-01.jpg" alt=""></span>
                        </a>
                      </div>
                      <div class="tt-description">
                        <div class="tt-row">
                          <ul class="tt-add-info">
                            <li><a href="#"><?= $result['ten_danh_muc'] ?></a></li>
                          </ul>
                          <div class="tt-rating">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-half"></i>
                            <i class="icon-star-empty"></i>
                          </div>
                        </div>
                        <h2 class="tt-title"><a href="product.html"><?= $result['ten_san_pham'] ?></a></h2>
                        <div class="tt-price">
                          <?= $result['gia_khuyen_mai'] ?> VND
                        </div>
                        <div class="tt-product-inside-hover">
                          <div class="tt-row-btn">
                            <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                          </div>
                          <div class="tt-row-btn">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                            <a href="#" class="tt-btn-wishlist"></a>
                            <a href="#" class="tt-btn-compare"></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="text-center tt_product_showmore d-flex justify-content-center mt-5">
                <!-- <a href="#" class="btn btn-border">LOAD MORE</a> -->
                <nav aria-label="...">
                  <ul class="pagination">
                    <li class="page-item disabled">
                      <a class="page-link" href="?act=products&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" tabindex="-1" aria-disabled="true">Prev</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=products&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                      </li>
                    <?php }; ?>
                    <li class="page-item">
                      <a class="page-link" href="?act=products&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>">Next</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
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
  <script src="assets/separate-include/listing/listing.js"></script>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
