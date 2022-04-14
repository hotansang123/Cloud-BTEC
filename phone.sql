-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 11:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `idBL` int(11) NOT NULL COMMENT 'Mã bình luận',
  `NoiDungBL` varchar(2000) NOT NULL COMMENT 'Nội dung bình luận',
  `TenKh` varchar(255) NOT NULL,
  `idDT` int(11) DEFAULT NULL COMMENT 'Mã điện thoại được bình luận',
  `idUser` int(11) DEFAULT NULL COMMENT 'Mã người bình luận',
  `ThoiDiemBL` datetime DEFAULT NULL COMMENT 'Thời điểm bình luận',
  `AnHien` tinyint(1) DEFAULT 0 COMMENT 'ẩn hiện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(3) NOT NULL,
  `createdate` int(10) NOT NULL,
  `expiredate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon`, `discount`, `createdate`, `expiredate`) VALUES
(1, 'LMSQNEW10', 10, 1576232968, 1614390680);

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `idDT` int(11) NOT NULL COMMENT 'Mã điện thoại',
  `TenDT` varchar(100) NOT NULL COMMENT 'Tên điện thoại',
  `Gia` float DEFAULT NULL COMMENT 'Đơn giá',
  `GiaKM` float DEFAULT NULL COMMENT 'Giá khuyến mãi',
  `urlHinh` varchar(200) DEFAULT NULL COMMENT 'Địa chỉ hình chính',
  `ThoiDiemNhap` datetime DEFAULT NULL COMMENT 'Thời điểm nhập hàng',
  `MoTa` varchar(400) DEFAULT NULL COMMENT 'mô tả điện thoại',
  `SoLanXem` int(11) DEFAULT 0 COMMENT 'Số lượt xem',
  `SoLanMua` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lần mua',
  `Hot` tinyint(1) NOT NULL DEFAULT 0,
  `idNSX` int(11) DEFAULT NULL COMMENT 'mã nhà sản xuất',
  `AnHien` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'ẩn hiện',
  `SoLuongTonKho` int(11) NOT NULL DEFAULT 0 COMMENT 'số lượng tồn kho',
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`idDT`, `TenDT`, `Gia`, `GiaKM`, `urlHinh`, `ThoiDiemNhap`, `MoTa`, `SoLanXem`, `SoLanMua`, `Hot`, `idNSX`, `AnHien`, `SoLuongTonKho`, `slug`) VALUES
(15, 'Lego', 800, 500, 'Loge', '2022-04-08 00:00:00', '<p>Nh&acirc;n</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 1232, 1221, 1, 45, 1, 1212, 'lego'),
(16, 'Bup be', 700, 500, 'bupbe', '2021-02-05 00:00:00', '<p>adssdasasdasasdasd</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 1240, 212, 1, 47, 1, 112, 'bup-be'),
(18, 'Mô hình Máy bay', 700, 600, 'mô hình máy bay.png', '2021-01-25 00:00:00', '<p>đ&acirc;sdsaasdasđ</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 70027, 4996, 1, 45, 1, 50, 'm??-h??nh-m??y-bay'),
(19, 'Con Quay', 500, 400, 'con quay.jpg', '2021-02-25 00:00:00', '<p>đasadsasdasadsda</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 5015, 4000, 1, 47, 1, 2, 'con-quay'),
(20, 'Yoyo', 600, 400, 'yoyo.jpg', '2021-02-25 00:00:00', '<p>đẹp</p>\r\n', 1215, 2112, 1, 45, 1, 10, 'yoyo'),
(27, 'Thú bông', 300, 250, 'thubong.jpg', '2022-04-08 00:00:00', '', 2333, 124, 1, 47, 1, 22, 'th??-b??ng');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `idDH` int(11) NOT NULL COMMENT 'id của đơn hàng',
  `ThoiDiemDatHang` datetime NOT NULL COMMENT 'Thời điểm đặt hàng',
  `ThoiDiemGiaoHang` datetime DEFAULT NULL COMMENT 'Thời điểm giao hàng',
  `idUser` int(11) DEFAULT NULL COMMENT 'mã người mua',
  `TenNguoiNhan` varchar(200) DEFAULT NULL COMMENT 'Họ tên người nhận',
  `EmailNguoiNhan` varchar(200) DEFAULT NULL COMMENT 'email người nhận',
  `dienthoai` varchar(10) NOT NULL,
  `DiaChiNguoiNhan` varchar(200) DEFAULT NULL COMMENT 'địa chỉ người nhận',
  `AnHien` tinyint(1) DEFAULT NULL COMMENT 'ẩn hiện',
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0; là chưa xử lý, 1 là đả xử lý',
  `GhiChuCuaKhach` varchar(2000) DEFAULT NULL,
  `GhiChuCuaAdmin` varchar(2000) DEFAULT NULL,
  `keybill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`idDH`, `ThoiDiemDatHang`, `ThoiDiemGiaoHang`, `idUser`, `TenNguoiNhan`, `EmailNguoiNhan`, `dienthoai`, `DiaChiNguoiNhan`, `AnHien`, `TrangThai`, `GhiChuCuaKhach`, `GhiChuCuaAdmin`, `keybill`) VALUES
(34, '2022-04-08 16:34:49', NULL, NULL, 'Hồ Tấn Sang', 'sangho140302@gmail.com', '0963964819', '16', 1, 0, '', NULL, 341000);

-- --------------------------------------------------------

--
-- Table structure for table `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `idCT` int(11) NOT NULL COMMENT 'id',
  `idDH` int(11) NOT NULL COMMENT 'id đơn hàng',
  `idDT` int(11) DEFAULT NULL COMMENT 'mã điện thoại',
  `TenDT` varchar(100) NOT NULL COMMENT 'Tên điện thoại',
  `SoLuong` int(11) NOT NULL COMMENT 'số lượng mua',
  `Gia` float NOT NULL COMMENT 'Giá',
  `urlHinh` varchar(200) DEFAULT NULL COMMENT 'url hình'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhangchitiet`
--

INSERT INTO `donhangchitiet` (`idCT`, `idDH`, `idDT`, `TenDT`, `SoLuong`, `Gia`, `urlHinh`) VALUES
(61, 34, 0, 'Lego', 3, 500, 'Loge');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `idNSX` int(11) NOT NULL COMMENT 'Mã nhà sản xuất',
  `TenNSX` varchar(50) NOT NULL COMMENT 'Tên nhà sản xuất',
  `ThuTu` int(11) DEFAULT NULL COMMENT 'Thứ tự',
  `AnHien` tinyint(1) DEFAULT NULL COMMENT 'Ẩn hiện',
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`idNSX`, `TenNSX`, `ThuTu`, `AnHien`, `slug`) VALUES
(45, 'USA', 2112, 1, 'usa'),
(47, 'Japan', 123, 1, 'japan');

-- --------------------------------------------------------

--
-- Table structure for table `thuoctinhdt`
--

CREATE TABLE `thuoctinhdt` (
  `idDT` int(11) NOT NULL COMMENT 'Mã điện thoại',
  `ManHinh` varchar(50) DEFAULT NULL,
  `HeDieuHanh` varchar(50) DEFAULT NULL,
  `CameraSau` varchar(50) DEFAULT NULL,
  `CameraTruoc` varchar(50) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `BoNhoTrong` int(50) DEFAULT NULL,
  `TheNho` varchar(50) DEFAULT NULL,
  `TheSim` varchar(50) DEFAULT NULL,
  `DungLuongPin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL COMMENT 'Mã user',
  `Username` varchar(30) NOT NULL COMMENT 'Tên đăng nhập',
  `Password` varchar(100) NOT NULL COMMENT 'Mật khẩu mã hóa bcrypt',
  `HoTen` varchar(50) NOT NULL COMMENT 'Họ và tên',
  `KichHoat` tinyint(1) DEFAULT NULL COMMENT 'Kích hoạt chưa, true =1 đã kích hoạt',
  `urlHinh` varchar(200) DEFAULT NULL COMMENT 'url hình',
  `Email` varchar(200) NOT NULL COMMENT 'địa chỉ email',
  `randomkey` varchar(255) NOT NULL,
  `VaiTro` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'vai trò, 0 là sinh vien, 1 là admin',
  `AnHien` tinyint(1) DEFAULT 1 COMMENT 'ẩn hiện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `Username`, `Password`, `HoTen`, `KichHoat`, `urlHinh`, `Email`, `randomkey`, `VaiTro`, `AnHien`) VALUES
(1, 'admin', '123456789Az', 'admin', NULL, NULL, 'admin@gmail.com', '', 1, 1),
(13, 'user', '123456789Az', 'user', NULL, NULL, '', '', 0, 1),
(16, 'username', '123456789Az', 'user', NULL, NULL, 'user@gmail.com', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idBL`),
  ADD KEY `fk_us_bl` (`idUser`),
  ADD KEY `fk_bl_dt` (`idDT`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`idDT`),
  ADD KEY `fk_dt_nsx` (`idNSX`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDH`),
  ADD KEY `fk_dh_us` (`idUser`);

--
-- Indexes for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`idCT`),
  ADD KEY `fk_dh_dhct` (`idDH`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`idNSX`);

--
-- Indexes for table `thuoctinhdt`
--
ALTER TABLE `thuoctinhdt`
  ADD PRIMARY KEY (`idDT`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idBL` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `idDT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã điện thoại', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của đơn hàng', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `idCT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `idNSX` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhà sản xuất', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã user', AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_dt` FOREIGN KEY (`idDT`) REFERENCES `dienthoai` (`idDT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us_bl` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD CONSTRAINT `fk_dt_nsx` FOREIGN KEY (`idNSX`) REFERENCES `nhasanxuat` (`idNSX`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_dh_us` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `fk_dh_dhct` FOREIGN KEY (`idDH`) REFERENCES `donhang` (`idDH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thuoctinhdt`
--
ALTER TABLE `thuoctinhdt`
  ADD CONSTRAINT `fk_tt_dt` FOREIGN KEY (`idDT`) REFERENCES `dienthoai` (`idDT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
