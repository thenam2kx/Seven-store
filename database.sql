CREATE TABLE `nguoi_dungs` (
  `nguoi_dung_id` int PRIMARY KEY AUTO_INCREMENT,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50),
  `mat_khau` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) UNIQUE NOT NULL,
  `ngay_sinh` date,
  `gioi_tinh` int DEFAULT 0 COMMENT '0: nam, 1: nu',
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `danh_mucs` (
  `danh_muc_id` int PRIMARY KEY AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` varchar(255),
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `san_phams` (
  `san_pham_id` int PRIMARY KEY AUTO_INCREMENT,
  `danh_muc_id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `mo_ta` text,
  `gia_tien` decimal(10,2) NOT NULL,
  `so_luong` int DEFAULT 0,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `san_pham_yeu_thichs` (
  `san_pham_yeu_thich_id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `hinh_anhs` (
  `hinh_anh_id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `duong_dan` varchar(255) NOT NULL,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `danh_gias` (
  `danh_gia_id` int PRIMARY KEY AUTO_INCREMENT,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `diem_danh_gia` int NOT NULL DEFAULT 5,
  `noi_dung` text,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `gio_hangs` (
  `gio_hang_id` int PRIMARY KEY AUTO_INCREMENT,
  `nguoi_dung_id` int NOT NULL,
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `gio_hang_cts` (
  `gio_hang_ct_id` int PRIMARY KEY AUTO_INCREMENT,
  `gio_hang_id` int,
  `san_pham_id` int NOT NULL,
  `so_luong` int DEFAULT 1
);

CREATE TABLE `don_hangs` (
  `don_hang_id` int PRIMARY KEY AUTO_INCREMENT,
  `nguoi_dung_id` int NOT NULL,
  `thanh_toan` int DEFAULT 0 COMMENT '0: chua thanh toan, 1: da thanh toan',
  `trang_thai` ENUM ('cho_xac_nhan', 'da_xac_nhan', 'dang_dong_goi', 'da_giao_dvvc', 'dang_giao_hang', 'da_giao_hang', 'da_huy', 'da_hoan_tra', 'hoan_tat') DEFAULT 'cho_xac_nhan',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `don_hang_cts` (
  `don_hang_ct_id` int PRIMARY KEY AUTO_INCREMENT,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int
);

CREATE TABLE `khuyen_mais` (
  `khuyen_mai_id` int PRIMARY KEY AUTO_INCREMENT,
  `ma_km` varchar(20) NOT NULL,
  `phan_tram` int NOT NULL COMMENT '10 || ...to... || 100',
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `tin_tucs` (
  `tin_tuc_id` int PRIMARY KEY AUTO_INCREMENT,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text,
  `anh_avt` varchar(255),
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `banners` (
  `bannerId` int PRIMARY KEY AUTO_INCREMENT,
  `duong_dan` varchar(255),
  `trang_thai` int DEFAULT 1 COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `cap_nhat` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

ALTER TABLE `san_phams` ADD FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`danh_muc_id`);

ALTER TABLE `san_pham_yeu_thichs` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`san_pham_id`);

ALTER TABLE `san_pham_yeu_thichs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`nguoi_dung_id`);

ALTER TABLE `hinh_anhs` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`san_pham_id`);

ALTER TABLE `danh_gias` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`san_pham_id`);

ALTER TABLE `danh_gias` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`nguoi_dung_id`);

ALTER TABLE `gio_hangs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`nguoi_dung_id`);

ALTER TABLE `gio_hang_cts` ADD FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`gio_hang_id`);

ALTER TABLE `gio_hang_cts` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`san_pham_id`);

ALTER TABLE `don_hangs` ADD FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`nguoi_dung_id`);

ALTER TABLE `don_hang_cts` ADD FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`don_hang_id`);

ALTER TABLE `don_hang_cts` ADD FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`san_pham_id`);
