<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Giỏ hàng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>

  <!-- HEADER -->
  <?php require_once "views/layouts/header.php"; ?>

  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store/">Trang chủ</a></li>
        <li>Giỏ hàng</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->
  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Giỏ hàng</h1>
        <div class="row">
          <div class="col-sm-12 col-xl-8">
            <div class="tt-shopcart-table">
              <table>
                <tbody>
                  <?php foreach($listProductsFromCard as $product): ?>
                    <tr>
                      <td>
                        <a href="?act=deleteProductFromCart&ghid=<?= $product['ghid'] ?>&ghctid=<?= $product['ghctid'] ?>" class="tt-btn-close"></a>
                      </td>
                      <td>
                        <div class="tt-product-img">
                          <img src="admin/<?= $product['anh_dai_dien'] ?>" data-src="admin/<?= $product['anh_dai_dien'] ?>" alt="">
                        </div>
                      </td>
                      <td>
                        <h2 class="tt-title">
                          <a href="?act=productDetail&id=<?= $product['spid'] ?>"><?= $product['ten_san_pham'] ?></a>
                        </h2>
                        <ul class="tt-list-parameters">
                          <li>
                            <div class="tt-price">
                              <?= formatCurrency($product['gia_khuyen_mai']) ?>
                            </div>
                          </li>
                          <li>
                            <div class="detach-quantity-mobile"></div>
                          </li>
                          <li>
                            <div class="tt-price subtotal">
                              <?= formatCurrency($product['gia_khuyen_mai'] * $product['so_luong']) ?>
                            </div>
                          </li>
                        </ul>
                      </td>
                      <td>
                        <div class="tt-price">
                          <?= formatCurrency($product['gia_khuyen_mai']) ?>
                        </div>
                      </td>
                      <td>
                        <div class="detach-quantity-desctope">
                          <div class="tt-input-counter style-01">
                            <a href="?act=removeQuantityProduct&idPrd=<?= $product['spid'] ?>"><span class="minus-btn"></span></a>
                            <input type="text" value="<?= $product['so_luong'] ?>" size="<?= ($this->CartModel->totalNumberProduct($product['spid']))['so_luong'] ?>">
                            <a href="?act=addQuantityProduct&idPrd=<?= $product['spid'] ?>"><span class="plus-btn"></span></a>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="tt-price subtotal">
                          <?= formatCurrency($product['gia_khuyen_mai'] * $product['so_luong']) ?>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>

              <div class="tt-shopcart-btn">
                <div class="col-left">
                  <a class="btn-link" href="http://localhost/seven-store/"><i class="icon-e-19"></i>Về trang chủ</a>
                </div>
                <div class="col-right">
                  <a class="btn-link" href="?act=deleteAllProductFromCart"><i class="icon-h-02"></i>Xóa tất cả sản phẩm</a>
                  <a class="btn-link" href="?act=listCart"><i class="icon-h-48"></i>Cập nhật giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xl-4">
            <div class="tt-shopcart-wrapper">
              <div class="tt-shopcart-box">
                <h4 class="tt-title">
                  Ghi chú
                </h4>
                <p>Thêm hướng dẫn cho shipper giao hàng tới bạn...</p>
                <form class="form-default">
                  <textarea class="form-control" rows="7"></textarea>
                </form>
              </div>
              <div class="tt-shopcart-box tt-boredr-large">
                <table class="tt-shopcart-table01">
                  <tbody>
                    <tr>
                      <th>Tổng tiền trong giỏ hàng</th>
                      <td><?= formatCurrency($totalPrice['tong_tien'] > 0 ? $totalPrice['tong_tien'] : 0) ?></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Thanh toán</th>
                      <td><?= formatCurrency($totalPrice['tong_tien'] > 0 ? $totalPrice['tong_tien'] : 0) ?></td>
                    </tr>
                  </tfoot>
                </table>
                <a href="?act=order&cartId=<?= $ghid ?>" class="btn btn-lg" style="pointer-events: <?= count($listProductsFromCard) <= 0 ? 'none' : 'auto' ?>;" ><span class="icon icon-check_circle"></span>Tiến hành đặt hàng</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php require_once "views/layouts/footer.php"; ?>

  <!-- JAVASCRIPT -->
  <?php require_once "views/layouts/libs_js.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <script>
    function copyToClipboard(text) {
      navigator.clipboard.writeText(text).then(() => {
        alert("Đã sao chép mã: " + text);
      }).catch(err => {
        console.error("Không thể sao chép: ", err);
      });
    }
  </script>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
