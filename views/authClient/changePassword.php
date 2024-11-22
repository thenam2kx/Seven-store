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
                        <form class="form-default" action="?act=handleUpdatePassword" method="post">
                            <div class="form-group">
                                <label for="pass" class="control-label">Nhập mật khẩu</label>
                                <input type="text" name="old_pass" class="form-control" id="mat_khau">
                            </div>
                            <div class="form-group">
                                <label for="new_pass" class="control-label">Nhập mật khẩu mới</label>
                                <input type="text" name="new_pass" class="form-control" id="new_pass">
                            </div>
                            <div class="form-group">
                                <label for="re_pass" class="control-label">Nhập lại mật khẩu</label>
                                <input type="text" name="re_pass" class="form-control" id="re_pass">
                            </div>
                            <div class="row tt-offset-21">
                                <div class="col-auto">
                                    <button type="submit" class="btn">Đổi mật khẩu</button>
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