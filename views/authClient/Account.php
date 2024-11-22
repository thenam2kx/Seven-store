<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Tài khoản cá nhân</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
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
  require_once "views/layouts/header.php";
  ?>

  <!-- CONTENT -->
  <div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="index.html">Trâng chủ</a></li>
			<li>Tài khoản</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<h1 class="tt-title-subpages noborder">Tài khoản cá nhân</h1>
			<div class="tt-shopping-layout">
				<div class="tt-wrapper">
					<h2 class="tt-title">Chi tiết</h2>
					<div class="tt-table-responsive">
						<table class="tt-table-shop-02">
							<tbody>
								<tr>
									<td>Họ tên :</td>
									<td><?= $Account['ho_ten'] ?></td>
								</tr>
								<tr>
									<td>Email :</td>
									<td><?= $Account['email'] ?></td>
								</tr>
                                <tr>
									<td>Số điện thoại :</td>
									<td><?= $Account['so_dien_thoai'] ?></td>
								</tr>
								<tr>
									<td>Địa chỉ :</td>
									<td><?= $Account['dia_chi'] ?></td>
								</tr>
								<tr>
									<td>Giới tính :</td>
									<td><?= $Account['gioi_tinh'] == 0 ? 'Nam' : 'Nữ' ?></td>
								</tr>
								<tr>
									<td>Ngày sinh :</td>
									<td><?= $Account['ngay_sinh'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
                    <div class="tt-shop-btn">
						<a class="btn-link" href="?act=editAccount">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve">
							<g>
								<path d="M2.3,20.4C2.3,20.4,2.3,20.4,2.3,20.4C2.2,20.4,2.2,20.4,2.3,20.4c-0.2,0-0.2,0-0.3,0c-0.1,0-0.1-0.1-0.2-0.1
									c-0.1-0.1-0.1-0.2-0.1-0.3c0-0.1,0-0.2,0-0.3l0.6-5c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0-0.1,0-0.1
									c0,0,0-0.1,0.1-0.1L14.6,2.1C15,1.7,15.4,1.6,16,1.6c0.5,0,1,0.2,1.3,0.5l2.6,2.6c0.4,0.4,0.5,0.8,0.5,1.3c0,0.5-0.2,1-0.5,1.3
									L7.7,19.6c0,0-0.1,0-0.1,0.1c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0L2.3,20.4z M2.9,19.1l2.9-0.4
									l-2.6-2.6L2.9,19.1z M3.7,14.8L5,16.1l9.7-9.7L13.5,5L3.7,14.8z M7.2,18.3L17,8.5l-1.3-1.3L5.9,17L7.2,18.3z M15.5,3l-1.2,1.2
									l3.5,3.5L19,6.5c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4L16.4,3c-0.1-0.1-0.3-0.2-0.4-0.2C15.8,2.8,15.6,2.8,15.5,3z"></path>
							</g>
							</svg>
							<span class="tt-text">Sửa thông tin</span>
						</a>
                        <a class="btn-link" href="?act=changePassword"><i class="icon-e-10"></i>Đổi mật khẩu</a>
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

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
