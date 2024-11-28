<?php
$listProductsFromCardHeader = [];
$idUserCart = isset($_SESSION['username']) ? $_SESSION['username']['id'] : 0;
if (isset($idUserCart) && $idUserCart !== 0) {
  $cartModelHeader = new CartModel();
  $getGhid = $cartModelHeader->getCartOfUser($idUserCart);
  $ghid = isset($getGhid) ? $getGhid['ghid'] : 0;
  $totalPrice = $cartModelHeader->totalPriceFromCart($ghid);
  $totalProductsFromCart = $cartModelHeader->totalProductsFromCart($ghid);
  $listProductsFromCardHeader = $cartModelHeader->getProductsFromCard($idUserCart);
}
?>
<header id="tt-header">
  <nav class="panel-menu mobile-main-menu">
    <div class="mmpanels">
      <div class="mmpanel mmhidden" id="mm5">
        <ul>
          <li>
            <a href="?act=products" title="Sản phẩm"><span>Sản phẩm</span></a>
          </li>
          <li>
            <a href="?act=listDiscount" title="Mã khuyến mãi"><span>Khuyến mãi</span></a>
          </li>
          <li>
            <a href="?act=blog" title="Tin tức"><span>Tin tức</span></a>
          </li>
          <li>
            <a href="?act=contact" title="Liên hệ"><span>Liên hệ</span></a>
          </li>
        </ul>
      </div>
  </nav>
  <!-- tt-mobile-header -->
  <div class="tt-mobile-header">
    <div class="container-fluid">
      <div class="tt-header-row">
        <div class="tt-mobile-parent-menu">
          <div class="tt-menu-toggle" id="js-menu-toggle" style="display: none;">
            <i class="icon-03"></i>
          </div>
        </div>
        <!-- search -->
        <div class="tt-mobile-parent-search tt-parent-box"></div>
        <!-- /search -->
        <!-- cart -->
        <div class="tt-mobile-parent-cart tt-parent-box"></div>
        <!-- /cart -->
        <!-- account -->
        <div class="tt-mobile-parent-account tt-parent-box"></div>
        <!-- /account -->
        <!-- currency -->
        <div class="tt-mobile-parent-multi tt-parent-box"></div>
        <!-- /currency -->
      </div>
    </div>
    <div class="container-fluid tt-top-line">
      <div class="row">
        <div class="tt-logo-container">
          <!-- mobile logo -->
          <a class="tt-logo tt-logo-alignment" href="http://localhost/seven-store/"><img src="assets/images/custom/logo2.png" alt=""></a>
          <!-- /mobile logo -->
        </div>
      </div>
    </div>
  </div>
  <!-- tt-desktop-header -->
  <div class="tt-desktop-header">
    <div class="container">
      <div class="tt-header-holder">
        <div class="tt-col-obj tt-obj-logo">
          <!-- logo -->
          <a class="tt-logo tt-logo-alignment" href="http://localhost/seven-store/"><img src="assets/images/custom/logo2.png" alt="" class="loading" data-was-processed="true"></a>
          <!-- /logo -->
        </div>
        <div class="tt-col-obj tt-obj-menu">
          <!-- tt-menu -->
          <div class="tt-desctop-parent-menu tt-parent-box">
            <div class="tt-desctop-menu tt-hover-03" id="js-include-desktop-menu">
              <nav>
                <ul>
                  <li class="dropdown megamenu selected tt-submenu">
                    <a href="http://localhost/seven-store/" title="Trang chủ"><span>Trang chủ</span></a>
                  </li>
                  <li class="dropdown megamenu tt-submenu">
                    <a href="?act=products" title="Sản phẩm mới"><span>Sản phẩm</span></a>
                  </li>
                  <li class="dropdown megamenu tt-submenu">
                    <a href="?act=listDiscount" title="khuyến mãi"><span>Khuyến mãi</span></a>
                  </li>
                  <li class="dropdown tt-megamenu-col-01 tt-submenu">
                    <a href="?act=blog" title="Tin tức"><span>Tin tức</span></a>
                  </li>
                  <li class="dropdown tt-megamenu-col-01 tt-submenu">
                    <a href="?act=contact" title="Liên hệ"><span>Liên hệ</span></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /tt-menu -->
        </div>
        <div class="tt-col-obj tt-obj-options obj-move-right">
          <!-- tt-search -->
          <div class="tt-desctop-parent-search tt-parent-box">

            <div class="tt-search tt-dropdown-obj">
              <button class="tt-dropdown-toggle" data-tooltip="Tìm kiếm" data-tposition="bottom">
                <i class="icon-f-85"></i>
              </button>
              <div class="tt-dropdown-menu">
                <div class="container">
                  <form>
                    <div class="tt-col">
                      <input type="text" class="tt-search-input" placeholder="Nhập tìm kiếm sản phẩm">
                      <button class="tt-btn-search" type="submit"></button>
                    </div>
                    <div class="tt-col">
                      <button class="tt-btn-close icon-g-80"></button>
                    </div>
                    <div class="tt-info-text">
                      Bạn đang tìm gì?
                    </div>
                    <div class="search-results"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /tt-search -->
          <!-- tt-cart -->
          <div class="tt-desctop-parent-cart tt-parent-box">

            <div class="tt-cart tt-dropdown-obj" data-tooltip="Giỏ hàng" data-tposition="bottom">
              <button class="tt-dropdown-toggle">
                <i class="icon-f-39"></i>
                <span class="tt-badge-cart"><?= isset($totalProductsFromCart['tong_so_luong']) ? $totalProductsFromCart['tong_so_luong'] : 0 ?></span>
              </button>
              <div class="tt-dropdown-menu">
                <div class="tt-mobile-add">
                  <h6 class="tt-title">Giỏ hàng</h6>
                  <button class="tt-close">Thoát</button>
                </div>
                <div class="tt-dropdown-inner">
                  <div class="tt-cart-layout">
                    <div class="tt-cart-content">
                      <div class="tt-cart-list">
                        <?php foreach ($listProductsFromCardHeader as $row): ?>
                          <div class="tt-item">
                            <a href="?act=productDetail&id=<?= $row['spid'] ?>">
                              <div class="tt-item-img">
                                <img src="admin/<?= $row['anh_dai_dien'] ?>" data-src="admin/<?= $row['anh_dai_dien'] ?>" alt="">
                              </div>
                              <div class="tt-item-descriptions">
                                <h2 class="tt-title"><?= $row['ten_san_pham'] ?></h2>
                                <div class="tt-quantity mt-2"><?= $row['so_luong'] ?> X</div>
                                <div class="tt-price"><?= formatCurrency($row['gia_khuyen_mai']) ?></div>
                              </div>
                            </a>
                          </div>
                        <?php endforeach ?>
                      </div>
                      <div class="tt-cart-total-row">
                        <div class="tt-cart-total-title">Tổng tiền:</div>
                        <div class="tt-cart-total-price"><?= formatCurrency(isset($totalPrice['tong_tien']) ? $totalPrice['tong_tien'] : 0) ?></div>
                      </div>
                      <div class="tt-cart-btn">
                        <div class="tt-item">
                          <a href="?act=order&cartId=<?= $ghid ?>" class="btn">TIẾN HÀNH ĐẶT HÀNG</a>
                        </div>
                        <div class="tt-item">
                          <a href="?act=listCart" class="btn-link-02 tt-hidden-mobile">Xem giỏ hàng</a>
                          <a href="?act=listCart" class="btn btn-border tt-hidden-desctope">Xem giỏ hàng</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /tt-cart -->
          <!-- tt-account -->
          <div class="tt-desctop-parent-account tt-parent-box">

            <div class="tt-account tt-dropdown-obj">
              <button class="tt-dropdown-toggle" data-tooltip="Tài khoản" data-tposition="bottom"><i class="icon-f-94"></i></button>
              <?php if (isset($_SESSION['username'])) {  ?>
                <div class="tt-dropdown-menu">
                  <div class="tt-mobile-add">
                    <button class="tt-close">Close</button>
                  </div>
                  <div class="tt-dropdown-inner">
                    <ul>
                      <li><a href="?act=account"><i class="icon-f-94"></i>Tài khoản</a></li>
                      <li><a href="?act=listFavorite&id=<?php echo $_SESSION['username']['id']; ?>"><i class="icon-n-072"></i>Danh sách yêu thích</a></li>
                      <li><a href="?act=listOrders"><i class="icon-f-43"></i>Đơn hàng của tôi</a></li>
                      <li><a href="?act=signout"><i class="icon-f-77"></i>Đăng xuất</a></li>
                    </ul>
                  </div>
                </div>
              <?php } else {  ?>
                <div class="tt-dropdown-menu">
                  <div class="tt-mobile-add">
                    <button class="tt-close">Close</button>
                  </div>
                  <div class="tt-dropdown-inner">
                    <ul>
                      <li><a href="admin/?act=signin"><i class="icon-f-76"></i>Đăng nhập</a></li>
                      <li><a href="<?php echo BASE_URL; ?>?act=signup"><i class="icon-f-94"></i>Đăng ký</a></li>
                    </ul>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- stuck nav -->
  <div class="tt-stuck-nav" id="js-tt-stuck-nav">
    <div class="container">
      <div class="tt-header-row ">
        <div class="tt-stuck-parent-menu"></div>
        <div class="tt-stuck-parent-search tt-parent-box"></div>
        <div class="tt-stuck-parent-cart tt-parent-box"></div>
        <div class="tt-stuck-parent-account tt-parent-box"></div>
        <div class="tt-stuck-parent-multi tt-parent-box"></div>
      </div>
    </div>
  </div>
</header>
