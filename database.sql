CREATE TABLE `nguoi_dungs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) UNIQUE,
  `mat_khau` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) UNIQUE NOT NULL,
  `ngay_sinh` date,
  `gioi_tinh` int DEFAULT 0 COMMENT '0: nam, 1: nu',
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `lien_hes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nguoi_dung_id` int,
  `email` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `danh_mucs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) NOT NULL,
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active'
);

CREATE TABLE `san_phams` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `danh_muc_id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `mo_ta_ngan` varchar(255),
  `mo_ta_chi_tiet` text,
  `gia_nhap` decimal(10,2) NOT NULL,
  `gia_ban` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) NOT NULL,
  `ngay_nhap` date,
  `so_luong` int DEFAULT 0,
  `anh_dai_dien` varchar(255),
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `san_pham_yeu_thichs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL
);

CREATE TABLE `hinh_anhs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `duong_dan` varchar(255) NOT NULL
);

CREATE TABLE `danh_gias` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `diem_danh_gia` int NOT NULL DEFAULT 5,
  `noi_dung` text,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `gio_hangs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nguoi_dung_id` int NOT NULL
);

CREATE TABLE `gio_hang_cts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `gio_hang_id` int,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT 1
);

CREATE TABLE `don_hangs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nguoi_dung_id` int NOT NULL,
  `ho_ten` varchar(150),
  `ghi_chu` varchar(255),
  `email` varchar(50),
  `so_dien_thoai` varchar(10) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL COMMENT 'Tổng tiền của đơn hàng',
  `thanh_toan` decimal(10,2) NOT NULL COMMENT 'Tổng tiền cuối cùng mà người dùng thanh toán ( sau khi đã trừ tiền vận chuyển và mã khuyến mãi )',
  `hinh_thuc_thanh_toan` int DEFAULT 0 COMMENT '0: COD, 1: MOMO',
  `trang_thai_thanh_toan` int DEFAULT 0 COMMENT '0: chua thanh toan, 1: da thanh toan',
  `trang_thai` ENUM ('cho_xac_nhan', 'da_xac_nhan', 'dang_dong_goi', 'da_giao_dvvc', 'dang_giao_hang', 'da_giao_hang', 'da_huy', 'da_hoan_tra', 'hoan_tat') DEFAULT 'cho_xac_nhan',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `don_hang_cts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_tien` decimal(10,2) NOT NULL
);

CREATE TABLE `khuyen_mais` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ma_km` varchar(20) UNIQUE NOT NULL,
  `ngay_bat_dau` timestamp,
  `ngay_ket_thuc` timestamp,
  `phan_tram` int NOT NULL COMMENT '10 || ...to... || 100',
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `tin_tucs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text,
  `anh_avt` varchar(255),
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `banners` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `duong_dan` varchar(255),
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active'
);

ALTER TABLE `lien_hes` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

ALTER TABLE `san_phams` ADD FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

ALTER TABLE `san_pham_yeu_thichs` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

ALTER TABLE `san_pham_yeu_thichs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

ALTER TABLE `hinh_anhs` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

ALTER TABLE `danh_gias` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

ALTER TABLE `danh_gias` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

ALTER TABLE `gio_hangs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

ALTER TABLE `gio_hang_cts` ADD FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`);

ALTER TABLE `gio_hang_cts` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

ALTER TABLE `don_hangs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

ALTER TABLE `don_hang_cts` ADD FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`);

ALTER TABLE `don_hang_cts` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);
