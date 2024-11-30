<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
  <meta charset="utf-8" />
  <title>Danh sách mã khuyến mãi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php require_once "views/layouts/libs_css.php"; ?>

  <style>
    .status-red {
      color: red;
      font-weight: bold;
    }

    .status-blue {
      color: blue;
      font-weight: bold;
    }

    .status-yellow {
      color: orange;
      font-weight: bold;
    }

    .btn-disabled {
      background-color: gray;
      border-color: gray;
      pointer-events: none;
    }

    .promotion-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      gap: 20px;
      margin-top: 20px;
    }

    .promotion-item {
      flex: 0 0 calc(25% - 20px);
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      border: 1px solid blueviolet;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      position: relative;
      height: 120px;
    }

    @media (max-width: 1200px) {
      .promotion-item {
        flex: 0 0 calc(33.333% - 20px);
      }
    }

    @media (max-width: 768px) {
      .promotion-item {
        flex: 0 0 calc(50% - 20px);
      }
    }

    @media (max-width: 576px) {
      .promotion-item {
        flex: 0 0 100%;
      }
    }


    .promotion-details {
      text-align: left;
      margin-bottom: 10px;
    }

    .promotion-details p {
      margin: 2px 0;
    }

    .promotion-code {
      font-weight: bold;
    }

    .promotion-btn {
      width: 80px;
      position: absolute;
      bottom: 15px;
      right: 10px;
    }


    .promotion-btn:hover {
      background-color: red;
      color: white;
      border-color: #ff5722;
      transform: scale(1.1);
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <?php require_once "views/layouts/header.php"; ?>

  <div class="tt-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="http://localhost/seven-store/">Trang chủ</a></li>
        <li>Khuyến mãi</li>
      </ul>
    </div>
  </div>

  <!-- CONTENT -->
  <div id="tt-pageContent">
    <div class="container-indent">
      <div class="container">
        <h1 class="tt-title-subpages noborder">Danh sách mã khuyến mãi</h1>
        <div class="tt-wishlist-box" id="js-wishlist-removeitem">
          <div class="tt-wishlist-list">
            <div class="tt-wishlist-list promotion-container">
              <?php
              $counter = 1;
              $currentDate = new DateTime(); // Lấy ngày hiện tại
              foreach ($results as $result):
                $startDate = new DateTime($result['ngay_bat_dau']);
                $endDate = new DateTime($result['ngay_ket_thuc']);
                $status = '';
                $statusClass = '';
                $isDisabled = '';

                if ($currentDate < $startDate) {
                  $status = 'Sắp diễn ra';
                  $statusClass = 'status-yellow';
                } elseif ($currentDate > $endDate) {
                  $status = 'Hết hạn';
                  $statusClass = 'status-red';
                  $isDisabled = 'btn-disabled';
                } else {
                  $status = 'Đang diễn ra';
                  $statusClass = 'status-blue';
                }
              ?>
                <div class="promotion-item">
                  <div class="promotion-details">
                    <p class="promotion-code">Mã khuyến mãi: <?= $result['ma_km'] ?></p>
                    <p>Giảm giá <?= $result['phan_tram'] ?>% giá trị đơn hàng</p>
                    <p class="<?= $statusClass ?>">TRẠNG THÁI: <?= $status ?></p>
                    <?php if ($status === 'Sắp diễn ra'): ?>
                      <p>Ngày bắt đầu: <?= $startDate->format("d/m/Y") ?></p>
                    <?php elseif ($status === 'Đang diễn ra'): ?>
                      <p>Ngày kết thúc: <?= $endDate->format("d/m/Y") ?></p>
                    <?php endif; ?>
                  </div>
                  <button class="btn btn-primary btn-sm promotion-btn <?= $isDisabled ?>"
                    onclick="handleCopy('<?= $result['ma_km'] ?>')"
                    <?= $status === 'Hết hạn' ? 'disabled' : '' ?>>Sao chép</button>
                </div>

              <?php endforeach ?>
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
    function handleCopy(code, status) {
      if (status === 'Hết hạn') {
        if (confirm("Mã này đã hết hạn. Bạn có chắc chắn muốn sao chép không?")) {
          copyToClipboard(code);
        }
      } else {
        copyToClipboard(code);
      }
    }

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
