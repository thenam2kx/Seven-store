-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2024 at 10:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seven-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `duong_dan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `nguoi_dung_id`, `san_pham_id`, `noi_dung`, `trang_thai`, `ngay_tao`) VALUES
(1, 1, 1, 'wnfgbdbdb', 1, '2024-11-15 09:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `diem_danh_gia` int NOT NULL DEFAULT '5',
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `ngay_tao` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `san_pham_id`, `nguoi_dung_id`, `diem_danh_gia`, `noi_dung`, `ngay_tao`) VALUES
(1, 1, 1, 5, 'nnrtg', '2024-11-15 09:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `trang_thai`) VALUES
(1, 'Quần áo nam', 1),
(2, 'Quần áo nữ', 1),
(3, 'Áo thu đông', 1),
(4, 'Áo phao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `trang_thai_don_hang_id` int DEFAULT NULL,
  `ho_ten` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL COMMENT 'Tổng tiền của đơn hàng',
  `thanh_toan` decimal(10,2) NOT NULL COMMENT 'Tổng tiền cuối cùng mà người dùng thanh toán ( sau khi đã trừ tiền vận chuyển và mã khuyến mãi )',
  `khuyen_mai_id` int NOT NULL,
  `hinh_thuc_thanh_toan` int DEFAULT '0' COMMENT '0: COD, 1: MOMO',
  `trang_thai_thanh_toan` int DEFAULT '0' COMMENT '0: chua thanh toan, 1: da thanh toan',
  `ngay_tao` timestamp NULL DEFAULT (now()),
  `cap_nhat` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `nguoi_dung_id`, `trang_thai_don_hang_id`, `ho_ten`, `ghi_chu`, `email`, `so_dien_thoai`, `dia_chi`, `tong_tien`, `thanh_toan`, `khuyen_mai_id`, `hinh_thuc_thanh_toan`, `trang_thai_thanh_toan`, `ngay_tao`, `cap_nhat`) VALUES
(1, 1, 9, 'Thế Nam', 'Giao hàng sớm', 'thenam2kx@gmail.com', '0363560798', 'Hải Hậu, Nam Định', '120000.00', '110000.00', 0, 0, 0, '2024-11-13 01:58:52', '2024-11-13 01:58:52'),
(3, 1, 9, 'abc', 'abc', 'sonhai2020@gmail.com', '0363560799', 'ebrddb', '120000.00', '4534.00', 0, 0, 0, '2024-10-16 10:06:24', '2024-11-13 10:06:24'),
(4, 2, 9, 'Son Hai', '4354354', 'ejtyrer@gmail.com', '0363560755', 'Viet Nam', '435345.00', '4334543.00', 0, 1, 1, '2024-11-13 12:52:00', '2024-11-13 12:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang_cts`
--

CREATE TABLE `don_hang_cts` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang_cts`
--

INSERT INTO `don_hang_cts` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `gia_tien`) VALUES
(1, 1, 1, 2, '120000.00'),
(2, 1, 1, 2, '130000.00'),
(3, 3, 1, 1, '150000.00'),
(4, 4, 2, 1, '180000.00'),
(5, 3, 2, 2, '180000.00');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang_cts`
--

CREATE TABLE `gio_hang_cts` (
  `id` int NOT NULL,
  `gio_hang_id` int DEFAULT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anhs`
--

CREATE TABLE `hinh_anhs` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `duong_dan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anhs`
--

INSERT INTO `hinh_anhs` (`id`, `san_pham_id`, `duong_dan`) VALUES
(1, 1, 'uploads/products/67340708845beyody-tai-tro-1-ty-yody-vn-min.webp'),
(2, 1, 'uploads/products/67340708851c3yody-top-10-thuong-hieu-thoi-trang.webp'),
(3, 2, 'uploads/products/6734a1850edb1yody-tai-tro-1-ty-yody-vn-min.webp'),
(4, 2, 'uploads/products/6734a185107deyody-top-10-thuong-hieu-thoi-trang.webp'),
(5, 3, 'uploads/products/6734a1acbd50byody-tai-tro-1-ty-yody-vn-min.webp'),
(6, 3, 'uploads/products/6734a1acbe874yody-top-10-thuong-hieu-thoi-trang.webp'),
(7, 4, 'uploads/products/6735b76a863ccPHM7009-XDE, ATM7004-TRA (4).webp'),
(8, 5, 'uploads/products/6735b7f336aa2qam6065-ghd-5.webp');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` int NOT NULL,
  `ma_km` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` timestamp NULL DEFAULT NULL,
  `ngay_ket_thuc` timestamp NULL DEFAULT NULL,
  `phan_tram` int NOT NULL COMMENT '10 || ...to... || 100',
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ma_km`, `ngay_bat_dau`, `ngay_ket_thuc`, `phan_tram`, `trang_thai`, `ngay_tao`) VALUES
(1, '851255', '2024-11-10 17:00:00', '2024-11-14 17:00:00', 10, 1, '2024-11-13 01:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `nguoi_dung_id` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `nguoi_dung_id`, `email`, `so_dien_thoai`, `noi_dung`, `trang_thai`, `ngay_tao`) VALUES
(1, 1, 'thenam2kx@gmail.com', '0363560798', '1234', 1, '2024-11-13 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` int DEFAULT '0' COMMENT '0: nam, 1: nu',
  `vai_tro` int DEFAULT '0' COMMENT '0: khach, 1: admin',
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT (now()),
  `cap_nhat` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ho_ten`, `email`, `mat_khau`, `dia_chi`, `so_dien_thoai`, `ngay_sinh`, `gioi_tinh`, `vai_tro`, `trang_thai`, `ngay_tao`, `cap_nhat`) VALUES
(1, 'thenam2kx', 'thenam2kx@gmail.com', '123456', 'Xóm 2, Hải Xuân - Hải Hậu', '0363560798', '2024-11-13', 1, 1, 1, '2024-11-13 01:58:22', '2024-11-13 01:58:22'),
(2, 'Son Hai', 'sonhai2kx@gmail.com', '123456', 'Nam Dinh', '0363560998', '2024-11-04', 0, 0, 1, '2024-11-13 12:03:29', '2024-11-14 08:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `danh_muc_id` int NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_ngan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta_chi_tiet` text COLLATE utf8mb4_unicode_ci,
  `gia_nhap` decimal(10,2) NOT NULL,
  `gia_ban` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `so_luong` int DEFAULT '0',
  `anh_dai_dien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT (now()),
  `cap_nhat` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `danh_muc_id`, `ten_san_pham`, `mo_ta_ngan`, `mo_ta_chi_tiet`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `ngay_nhap`, `so_luong`, `anh_dai_dien`, `trang_thai`, `ngay_tao`, `cap_nhat`) VALUES
(1, 1, 'Quần áo nam siêu đẹp', 'Quần áo nam siêu đẹp', '<p>Quần áo nam siêu đẹp</p>', '80000.00', '120000.00', '110000.00', '2024-11-12', 100, 'uploads/products/673407087fd30.webp', 1, '2024-11-13 01:55:20', '2024-11-13 01:55:20'),
(2, 2, 'Laptop MSI Cyborg 15 A12VE-240VN', '23243547', '<p>374565</p>', '140000.00', '180000.00', '175000.00', '2024-11-12', 100, 'uploads/products/6734a1850a3e2.jpeg', 1, '2024-11-13 12:54:29', '2024-11-13 12:54:29'),
(3, 2, 'Laptop MSI Cyborg 15 A12VE-240VN', '23243547', '<p>374565</p>', '140000.00', '180000.00', '175000.00', '2024-11-12', 100, 'uploads/products/6734a1acb3662.jpeg', 1, '2024-11-13 12:55:08', '2024-11-13 12:55:08'),
(4, 4, ' Áo Phao Nam Trần Trám Nẹp Giấu Khoá', 'Trang bị cho mùa đông lạnh giá một chiếc áo phao ưu việt: Áo Phao Nam Trần Trám Nẹp Giấu Khoá.', '<p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM700921_m2k1v195numa5x1hohq.jpg\" alt=\"image\" width=\"900\" height=\"1200\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM700922_m2k1v7rbxiwzafldgu.jpg\" alt=\"image\" width=\"900\" height=\"1200\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM700923_m2k1vdjbtufng3mngwr.jpg\" alt=\"image\" width=\"900\" height=\"1200\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM700924_m2k1vli8ith0mpg8vr.jpg\" alt=\"image\" width=\"900\" height=\"1200\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamPHM7009_m3844k9f6napdv31s3v.jpg\" alt=\"image\" width=\"900\" height=\"900\"></p><p style=\"text-align:center;\"><i>Khoá kéo YKK - loại khoá hàng đầu thế giới, bền chắc, trơn tru trong quá trình sử dụng.</i></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM700927_m2k1vt6exlb7u1blqgj.jpg\" alt=\"image\" width=\"900\" height=\"1200\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamyodyPHM7009REUALM7007TIT_m36yl3r2lhh88r0yy.jpg\" alt=\"image\" width=\"900\" height=\"1201\"></p><p style=\"text-align:center;\"><img src=\"https://m.yodycdn.com/products/aophaonamPHM7009_m3845b305h54gm3rfcw.png\" alt=\"image\" width=\"900\" height=\"900\"></p>', '664000.00', '720000.00', '710000.00', '2024-11-13', 100, 'uploads/products/6735b76a81912.webp', 1, '2024-11-14 08:40:10', '2024-11-14 08:40:10'),
(5, 3, 'Quần Âu Nam Nano Melange Thêu', 'Quần Âu Nam Nano Melange Thêu', '<p><span style=\"color:rgb(57,73,96);\">Quần Âu Nam Nano Melange Thêu</span></p>', '450000.00', '550000.00', '520000.00', '2024-11-14', 100, 'uploads/products/6735b7f3322e1.webp', 1, '2024-11-14 08:42:27', '2024-11-14 08:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_yeu_thichs`
--

CREATE TABLE `san_pham_yeu_thichs` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `anh_avt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int DEFAULT '1' COMMENT '0: inActive, 1: active',
  `ngay_tao` timestamp NULL DEFAULT (now()),
  `cap_nhat` timestamp NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de`, `noi_dung`, `anh_avt`, `trang_thai`, `ngay_tao`, `cap_nhat`) VALUES
(1, 'baivv v v v v ', '<p>23323</p>', 'uploads/blogs/673472411ac09.webp', 1, '2024-11-13 09:32:49', '2024-11-14 08:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `trang_thai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cho_xac_nhan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang đóng gói'),
(4, 'Đã giao cho đvvc'),
(5, 'Đang giao hàng'),
(6, 'Đã giao hàng'),
(7, 'Đã hủy'),
(8, 'Đã hoàn trả'),
(9, 'Hoàn tất');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`),
  ADD KEY `trang_thai_don_hang_id` (`trang_thai_don_hang_id`);

--
-- Indexes for table `don_hang_cts`
--
ALTER TABLE `don_hang_cts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Indexes for table `gio_hang_cts`
--
ALTER TABLE `gio_hang_cts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_km` (`ma_km`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `so_dien_thoai` (`so_dien_thoai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- Indexes for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `don_hang_cts`
--
ALTER TABLE `don_hang_cts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hang_cts`
--
ALTER TABLE `gio_hang_cts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binh_luans_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `danh_gias_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`),
  ADD CONSTRAINT `danh_gias_ibfk_2` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_2` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`);

--
-- Constraints for table `don_hang_cts`
--
ALTER TABLE `don_hang_cts`
  ADD CONSTRAINT `don_hang_cts_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `don_hang_cts_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

--
-- Constraints for table `gio_hang_cts`
--
ALTER TABLE `gio_hang_cts`
  ADD CONSTRAINT `gio_hang_cts_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`),
  ADD CONSTRAINT `gio_hang_cts_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD CONSTRAINT `hinh_anhs_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD CONSTRAINT `lien_hes_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Constraints for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD CONSTRAINT `san_pham_yeu_thichs_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`),
  ADD CONSTRAINT `san_pham_yeu_thichs_ibfk_2` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
