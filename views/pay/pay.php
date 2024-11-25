<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Đơn Hàng</title>
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
        <li>Đơn Hàng</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<h1 class="tt-title-subpages noborder">Đơn hàng</h1>
			<div class="tt-shopping-layout">
				<a href="http://localhost/seven-store/" class="tt-link-back">
					<i class="icon-e-19"></i> Quay về trang chủ
				</a>
				<div class="tt-wrapper">
					<div class="tt-table-responsive">
          <table class="tt-table-shop-03">
              <thead>
                  <tr>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thành Tiền</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($listProductsFromCard as $product): ?>
                      <tr>
                          <td <?= $product['spid'] ?>><?= $product['ten_san_pham'] ?></td>
                          <td><?= formatCurrency($product['gia_khuyen_mai']) ?></td>
                          <td><?= $product['so_luong'] ?></td>
                          <td><?= formatCurrency($product['gia_khuyen_mai'] * $product['so_luong']) ?></td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
                    <hr>
          <table class="tt-table-shop-03">
              <tbody>
                  <tr>
                      <th>Tổng tiền trong giỏ hàng</th>
                      <td colspan="3"><?= formatCurrency($totalPrice['tong_tien']) ?></td>
                  </tr>
                  <tr>
                      <th>Thanh toán</th>
                      <td colspan="3"><?= formatCurrency($totalPrice['tong_tien']) ?></td>
                  </tr>
              </tbody>
          </table>
					</div>
				</div>
        <br>
        <div class="col-xs-12 col-md-12">
						<div class="tt-item">
							<h2 class="tt-title">Thông tin người nhận</h2>

							<div class="form-default form-top">
								<form method="post" >
									<div class="form-group">
										<label for="ho_ten">Tên người nhận</label>
										<input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?=$users['ho_ten'] ?>"  >
									</div>

                  <div class="form-group">
										<label for="email">Email người nhận</label>
										<input type="email" class="form-control" id="email"  name="email" value="<?=$users['email'] ?>">
									</div>

                  <div class="form-group">
										<label for="so_dien_thoai">Số điện thoại người nhận</label>
										<input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai"  value="<?=$users['so_dien_thoai'] ?>">
									</div>

                  <div class="form-group">
										<label for="dia_chi">Địa chỉ người nhận</label>
										<input type="text" class="form-control" id="dia_chi" name="dia_chi"  value="<?=$users['dia_chi'] ?>">
									</div>

                  <div class="form-group">
										<label for="ghi_chu">Ghi chú </label>
										<textarea class="form-control" name="ghi_chu" id="ghi_chu" rows="7" value="<?=$users['ghi_chu'] ?>"></textarea>
									</div>

                  <div class="form-group">
                      <label for="hinh_thuc_thanh_toan" class="form-label">Phương thức thanh toán</label>
                      <select class="form-select" name="hinh_thuc_thanh_toan" id="hinh_thuc_thanh_toan" required>
                          <option value="0" <?= $users['hinh_thuc_thanh_toan'] == 0 ? 'selected' : '' ?>>Trả tiền khi nhận hàng</option>
                          <option value="1" <?= $users['hinh_thuc_thanh_toan'] == 1 ? 'selected' : '' ?>>MOMO</option>
                      </select>
                  </div>

									<div class="row">
										<div class="col-auto mr-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit">Xác nhận</button>
											</div>
										</div>
										<!-- <div class="col-auto align-self-end">
											<div class="form-group">
												<ul class="additional-links">
													<li><a href="#">Lost your password?</a></li>
												</ul>
											</div>
										</div> -->
									</div>
								</form>
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
