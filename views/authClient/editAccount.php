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
                <li><a href="index.html">Trang chủ</a></li>
                <li>Tài khoản</li>
            </ul>
        </div>
    </div>
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title-subpages noborder">Tài khoản</h1>
                <div class="tt-shopping-layout">
                    <div class="form-default">
                        <form class="form-default" action="?act=handleEditAccount" method="post">
                            <div class="form-group">
                                <label for="ho_ten" class="control-label">Họ tên *</label>
                                <input type="text" name="ho_ten" class="form-control" id="ho_ten" value="<?= $Account['ho_ten'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Địa chỉ email *</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?= $Account['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="dia_chi" class="control-label">Địa chỉ *</label>
                                <input type="text" name="dia_chi" class="form-control" id="dia_chi" value="<?= $Account['dia_chi'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="so_dien_thoai" class="control-label">SĐT *</label>
                                <input type="text" name ="so_dien_thoai" class="form-control" id="so_dien_thoai" value="<?= $Account['so_dien_thoai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="shopEmail" class="control-label">Ngày sinh</label>
                                <input type="date" name="ngay_sinh" class="form-control" id="shopEmail" value="<?= $Account['ngay_sinh'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="gioi_tinh" class="control-label">Giới tính</label>
                                <select name="gioi_tinh" class="form-select" id="gioi_tinh">
                                <option selected hidden value="<?= $Account['gioi_tinh'] ?>"><?= $Account['gioi_tinh'] == 0 ? 'nam' : 'nữ' ?></option>
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                            </div>
                            <div class="row tt-offset-21">
                                <div class="col-auto">
                                    <button type="submit" class="btn">Sửa thông tin</button>
                                </div>
                                <div class="col-auto align-self-center">
                                    or <a href="?act=account" class="tt-link">Cancel</a>
                                </div>
                            </div>
                        </form>
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