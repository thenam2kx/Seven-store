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

    /* Căn giữa nội dung trong bảng */
    .table td,
    .table th {
      text-align: center;
      /* Căn giữa nội dung trong tất cả các ô của bảng */
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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã khuyến mãi</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Phần trăm</th>
                  <th>Trạng thái</th>
                  <th>Ngày tạo</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $counter = 1; // Khởi tạo biến đếm cho STT
                $currentDate = new DateTime(); // Lấy ngày hiện tại
                foreach ($results as $result):
                  $startDate = new DateTime($result['ngay_bat_dau']);
                  $endDate = new DateTime($result['ngay_ket_thuc']);
                  $status = '';
                  $statusClass = '';
                  $isDisabled = '';

                  if ($currentDate < $startDate) {
                    $status = 'Chưa diễn ra';
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
                  <tr>
                    <td><?= $counter++ ?></td> <!-- Sử dụng biến đếm để hiển thị STT -->
                    <td><?= $result['ma_km'] ?></td>
                    <td><?= $startDate->format("d-m-Y") ?></td>
                    <td><?= $endDate->format("d-m-Y") ?></td>
                    <td><?= $result['phan_tram'] ?>%</td>
                    <td class="<?= $statusClass ?>"><?= $status ?></td>
                    <td><?= (new DateTime($result['ngay_tao']))->format("d-m-Y") ?></td>
                    <td>
                      <button class="btn btn-primary btn-sm <?= $isDisabled ?>"
                        onclick="copyToClipboard('<?= $result['ma_km'] ?>')"
                        <?= $status === 'Hết hạn' ? 'disabled' : '' ?>>Sao chép</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
