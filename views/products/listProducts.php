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
          <!-- Sort -->
            <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
              <form action="?act=products" method="post">
                <div class="tt-collapse open tt-filter-detach-option">
                  <div class="tt-collapse-content">
                    <div class="filters-mobile">
                      <div class="filters-row-select">

                      </div>
                    </div>
                  </div>
                </div>
                <div class="tt-collapse open">
                  <h3 class="tt-collapse-title">Sản phẩm theo danh mục</h3>
                  <div class="tt-collapse-content">
                    <?php foreach ($resultCategory as $row): ?>
                      <div class="form-check">
                        <input class="form-check-input" name="category" type="radio" value="<?= $row['id'] ?>" id="flexCheck<?= $row['id'] ?>">
                        <label class="form-check-label" for="flexCheck<?= $row['id'] ?>">
                          <?= $row['ten_danh_muc'] ?>
                        </label>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
                <div class="tt-collapse open">
                  <h3 class="tt-collapse-title">Lọc theo giá</h3>
                  <div class="tt-collapse-content">
                      <?php foreach($priceRanges as $row): ?>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="price" value='<?= json_encode(["min" => $row["min"], "max" => $row["max"]]) ?>' id="checkbox-<?= $row['min'] ?>">
                          <label class="form-check-label" for="checkbox-<?= $row['min'] ?>">
                            <?= formatCurrency($row['min']) ?> — <?= formatCurrency($row['max']) ?>
                          </label>
                        </div>
                      <?php endforeach ?>
                  </div>
                </div>
                <input type="submit" class="btn btn-outline-primary" name="submit" value="Lọc" class="w-100">
              </form>
            </div>




          <!-- main content -->
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
                    <a href="#">Lọc</a>
                  </div>
                  <div class="tt-sort">
                    <select name="sortPrice" class="select-price" id="select-price">
                      <option value="?act=products">Mặc định</option>
                      <option value="?act=products&sortPrice=asc">Giá từ thấp đến cao</option>
                      <option value="?act=products&sortPrice=desc">Giá từ cao đến thấp</option>
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
                        <a href="?act=productDetail&id=<?= $result['spid'] ?>" class="tt-btn-quickview" data-target="#ModalquickView" data-tooltip="Xem chi tiết" data-tposition="left"></a>
                        <a href="?act=addFavorite&id=<?= $result['spid'] ?>" class="tt-btn-quickview" style="top: 70px" data-tooltip="Thêm vào sản phẩm yêu thích" data-tposition="left"></a>
                        <a href="?act=productDetail&id=<?= $result['spid'] ?>">
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
                          <?php
                            $point = ($this->ProductModel->getTotalRateAndCount($result['spid']))['trung_binh_diem'];
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
                        <h2 class="tt-title"><a href="?act=productDetail&id=<?= $result['spid'] ?>"><?= $result['ten_san_pham'] ?></a></h2>
                        <div class="tt-price">
                          <?= formatCurrency($result['gia_khuyen_mai']) ?>
                        </div>
                        <div class="tt-product-inside-hover">
                          <div class="tt-row-btn">
                            <a href="?act=addToCard&idPrd=<?= $result['spid'] ?>" class="tt-btn-addtocart thumbprod-button-bg" data-target="#modalAddToCartProduct">Thêm vào giỏ hàng</a>
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
                <nav aria-label="...">
                  <ul class="pagination">
                    <li class="page-item disabled">
                      <a class="page-link" href="?act=products&page=<?= ($page - 1) <= 0 ? 1 : $page - 1 ?>&limit=<?= $limit ?>" tabindex="-1" aria-disabled="true">Trang trước</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link <?= $i == $page ? 'active' : '' ?>" href="?act=products&page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                      </li>
                    <?php }; ?>
                    <li class="page-item">
                      <a class="page-link" href="?act=products&page=<?= ($page + 1) >= $totalPages ? $totalPages : $page + 1 ?>&limit=<?= $limit ?>">Trang tiếp</a>
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
