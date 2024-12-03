<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

  <meta charset="utf-8" />
  <title>Liên Hệ</title>
  <link rel="shortcut icon" href="assets/images/custom/logo2.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "./views/layouts/libs_css.php";
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
</head>

<body>

  <!-- HEADER -->
  <?php
  require_once "./views/layouts/header.php";
  ?>

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
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="index.html">Trang Chủ</a></li>
			<li>Liên Hệ</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">

	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-contact02-col-list">
				<div class="row">
					<div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-93"></i>
							<h6 class="tt-title">HÃY TRÒ CHUYỆN!</h6>
							<address>
                0123456789;<br>
								0987654321
							</address>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-24"></i>
							<h6 class="tt-title">THĂM QUAN ĐỊA ĐIỂM CỦA CHÚNG TÔI</h6>
							<address>
                Đường Trinh Văn Bô,<br>
								Nam Từ Liên,<br>
								Thành Phố Hà Nội
							</address>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-92"></i>
							<h6 class="tt-title">THỜI GIAN LÀM VIỆC</h6>
							<address>
                7 Ngày một tuần<br>
								từ 10 giờ sáng đến 6 giờ chiều
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
    <form class="contact-form form-default" method="post" novalidate="novalidate" action="?act=addContact">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                <input type="text" name="so_dien_thoai" class="form-control" id="so_dien_thoai" placeholder="Số điện thoại của bạn (bắt buộc)" required>
                <span class="text-danger">
                    <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                </span>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email của bạn (bắt buộc)" required>
                <span class="text-danger">
                    <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="noi_dung" class="form-control" rows="7" placeholder="Nội dung của bạn" id="noi_dung" required></textarea>
                <span class="text-danger">
                    <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                </span>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn">Gửi Tin Nhắn</button>
    </div>
</form>




  <!-- FOOTER -->
  <?php
  require_once "./views/layouts/footer.php";
  ?>
  <!-- JAVASCRIPT -->
  <?php
  require_once "./views/layouts/libs_js.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <a href="#" class="tt-back-to-top tt-show" id="js-back-to-top" style="right: 0px;">BACK TO TOP</a>

</body>

</html>
