GRANT ALL PRIVILEGES
ON mypham.*
TO 'phi'@'%';



-- show databases;
-- create database mypham;
use mypham;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 10:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypham`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `SoLuong` int(20) NOT NULL,
  `GiaCa` int(20) NOT NULL,
  `MaDonHang` varchar(15) NOT NULL,
  `MaSP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `SoLuong`, `GiaCa`, `MaDonHang`, `MaSP`) VALUES
('1', 1, 69000, '1', '1'),
('2', 0, 0, '2', ''),
('3', 3, 2000000, '3', '20'),
('4', 2, 2000000, '3', '20'),
('5', 3, 130000, '3', '18'),
('6', 3, 1200000, '3', '16'),
('7', 4, 69000, '4', '1'),
('8', 2, 970000, '4', '4'),
('9', 2, 700000, '1', '9'),
('10', 3, 250000, '1', '7'),
('11', 0, 0, '2', ''),
('12', 1, 48000, '3', '12'),
('13', 1, 500000, '3', '14'),
('14', 1, 1200000, '3', '16'),
('15', 1, 480000, '4', '8'),
('16', 1, 250000, '4', '7'),
('17', 1, 700000, '4', '9'),
('18', 1, 1300000, '5', '17'),
('19', 1, 500000, '5', '14'),
('20', 1, 250000, '5', '7'),
('21', 3, 250000, '6', '21'),
('22', 4, 2000000, '6', '20'),
('23', 2, 48000, '6', '12'),
('24', 2, 970000, '7', '4'),
('25', 2, 340000, '7', '5'),
('26', 1, 69000, '8', '1'),
('27', 1, 48000, '8', '12'),
('28', 1, 250000, '9', '7'),
('29', 1, 155000, '9', '13'),
('30', 1, 69000, '10', '1'),
('31', 1, 500000, '10', '14'),
('32', 1, 155000, '10', '13'),
('33', 1, 69000, '11', '1'),
('34', 8, 340000, '12', '5'),
('35', 3, 190000, '13', '15'),
('36', 4, 2000000, '13', '20'),
('37', 1, 700000, '14', '9'),
('38', 1, 250000, '14', '7'),
('39', 1, 190000, '14', '15'),
('40', 1, 639000, '15', '11'),
('41', 1, 700000, '15', '9'),
('42', 3, 700000, '16', '9'),
('43', 3, 340000, '16', '5'),
('44', 3, 250000, '16', '7'),
('45', 3, 129000, '16', '10'),
('46', 2, 639000, '16', '11'),
('47', 2, 250000, '16', '21'),
('48', 1, 500000, '17', '2'),
('49', 8, 250000, '19', '21'),
('50', 1, 69000, '20', '1'),
('51', 1, 15600, '21', '3'),
('52', 1, 15600, '22', '3'),
('53', 1, 0, '23', '13'),
('54', 4, 15600, '24', '3');

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `maPhieuNhap` varchar(15) DEFAULT NULL,
  `maSP` varchar(15) DEFAULT NULL,
  `soLuong` int(10) DEFAULT NULL,
  `donGia` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`maPhieuNhap`, `maSP`, `soLuong`, `donGia`) VALUES
('1', '3', 5, 12000),
('2', '3', 5, 60000),
('3', '4', 12, 12000),
('6', '3', 2, 60000),
('6', '3', 2, 60000),
('7', '3', 2, 60000),
('8', '3', 2, 60000),
('9', '3', 2, 60000),
('10', '5', 5, 500000),
('11', '5', 5, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `MaDM` varchar(15) NOT NULL,
  `TenDanhMuc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmucsp`
--

INSERT INTO `danhmucsp` (`MaDM`, `TenDanhMuc`) VALUES
('1', 'Chăm Sóc Da'),
('2', 'Trang Điểm'),
('3', 'Chăm sóc cơ thể');

-- --------------------------------------------------------

--
-- Table structure for table `dichvukhuyenmai`
--

CREATE TABLE `dichvukhuyenmai` (
  `MaDVKM` varchar(15) NOT NULL,
  `TenDV` varchar(20) NOT NULL,
  `ThoiGianBatDau` date NOT NULL,
  `ThoiGianKetThuc` date NOT NULL,
  `Loai` varchar(20) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaDonHang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` varchar(15) NOT NULL,
  `NgayDatHang` date NOT NULL,
  `DiaChiGiaoHang` varchar(50) NOT NULL,
  `TrangThaiDonHang` tinyint(1) NOT NULL,
  `TongGiaTriDonHang` int(20) NOT NULL,
  `MTaiKhoan` varchar(10) NOT NULL,
  `MaNhanVien` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `NgayDatHang`, `DiaChiGiaoHang`, `TrangThaiDonHang`, `TongGiaTriDonHang`, `MTaiKhoan`, `MaNhanVien`) VALUES
('1', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 2150000, '0123456789', ''),
('2', '2024-05-06', 'Thôn Tiên Sơn 3, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 1000050, '0369698363', '18'),
('3', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 1748000, '0123456789', ''),
('4', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 1430000, '0123456789', ''),
('5', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 2050000, '0123456789', ''),
('6', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 8846000, '0123456789', ''),
('7', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 2620000, '0123456789', ''),
('8', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 117000, '0123456789', ''),
('9', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 405000, '0123456789', ''),
('10', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 724000, '0123456789', ''),
('11', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 69000, '0123456789', ''),
('12', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 2720000, '0123456789', ''),
('13', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 8570000, '0123456789', ''),
('14', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 1140000, '0123456789', ''),
('15', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 1339000, '0123456789', ''),
('16', '2024-05-06', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 6035000, '0123456789', ''),
('17', '2024-09-10', '99 An Dương Vương, Phường 16, Quận 8, TP.HCM', 0, 500000, '0369698363', ''),
('18', '2024-05-06', 'Thôn Tiên Sơn 3, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 1, 1000050, '0369698363', '18'),
('19', '2024-09-14', 'TP.Pleiku', 1, 2000000, '0369698361', ''),
('20', '2024-09-15', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 69000, '0123456789', ''),
('21', '2024-09-22', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 15600, '0123456789', ''),
('22', '2024-09-22', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 15600, '0123456789', ''),
('23', '2024-09-25', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 0, '0123456789', ''),
('24', '2024-09-27', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 0, 62400, '0123456789', '');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` varchar(15) NOT NULL,
  `TenNCC` varchar(20) NOT NULL,
  `DiaChi` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `SoDienThoai` varchar(13) NOT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `Email`, `SoDienThoai`, `TrangThai`) VALUES
('1', 'Huy', 'BinhThuan', 'Huynguyen120304@gmail.com', '0367644927', 0),
('2', 'Mai Vy', '99 An Dương Vương, P', 'vynguyen08257@gmail.com', '0862498257', 1),
('3', 'Ong hoang ban lẻ', '99 An Dương Vương, P', 'phuhuynh.010104@gmail.com', '0369698361', 1),
('4', 'Ong hoang ban lẻ', '99 An Dương Vương, P', 'phuhuynh.010104@gmail.com', '0369698361', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `GioiTinh` varchar(5) NOT NULL,
  `SoDienThoai` varchar(13) NOT NULL,
  `UserName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `maPhieuNhap` varchar(10) DEFAULT NULL,
  `maNhanVien` varchar(15) DEFAULT NULL,
  `maNhaCC` varchar(15) DEFAULT NULL,
  `ngayLap` date DEFAULT NULL,
  `tongTien` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`maPhieuNhap`, `maNhanVien`, `maNhaCC`, `ngayLap`, `tongTien`) VALUES
('1', '0123456789', '2', '2024-09-22', 60000),
('2', '0123456789', '2', '2024-09-22', 300000),
('3', '0123456789', '2', '2024-09-22', 144000),
('4', '0123456789', '2', '2024-09-25', 120000),
('5', '0123456789', '2', '2024-09-25', 120000),
('6', '0123456789', '2', '2024-09-25', 120000),
('7', '0123456789', '2', '2024-09-25', 120000),
('8', '0123456789', '2', '2024-09-25', 120000),
('9', '0123456789', '2', '2024-09-25', 120000),
('10', '0123456789', '2', '2024-10-07', 2500000),
('11', '0123456789', '2', '2024-10-07', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPT` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `LoaiPT` varchar(15) NOT NULL,
  `TenPT` varchar(15) NOT NULL,
  `MaDonHang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` varchar(15) NOT NULL,
  `TenSP` varchar(120) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `SoLuongSP` int(100) NOT NULL,
  `GiaSP` int(50) NOT NULL,
  `GiaNhap` int(50) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaTH` varchar(15) NOT NULL,
  `MaDM` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `HinhAnh`, `SoLuongSP`, `GiaSP`, `GiaNhap`, `TrangThai`, `MaTH`, `MaDM`) VALUES
('1', 'Sửa rửa mặt La Roche Posay    ', 'vn-11134207-7r98o-lr5k3duijixlc2.jpeg', 0, 0, 0, 0, '2', '1'),
('2', 'Kem Dưỡng AHC Làm Sáng Vùng Da Mắt Luminous Glow Real Eye Cream For Face 30Ml', 'Kem Dưỡng AHC Làm Sáng Vùng Da Mắt.webp', 0, 0, 0, 0, '1', '1'),
('3', 'Sữa Chống Nắng La Roche-Posay Kiềm Dầu Suốt 12h Anthelios UVMUNE 400 Oil Control Fluid 50ml', 'product-variation-50-ml-front.webp', 20, 15600, 12000, 1, '2', '1'),
('4', 'Nước Cân Bằng Chống Lão Hóa Làm Sáng Da AHC 365 Red Toner 100Ml', 'Nước Cân Bằng Chống Lão.webp', 12, 15600, 12000, 1, '1', '1'),
('5', 'Tinh Chất Dưỡng Trắng Da Dermatory Pro Niacin Shot Brightening Ampoule 20Ml', 'Tinh Chất Dưỡng Trắng Da.webp', 10, 650000, 500000, 1, '3', '1'),
('6', 'Tinh Chất Giảm Mụn, Giảm Thâm & Thu Nhỏ Lỗ Chân Lông', 'Tinh Chất Giảm Mụn, Giảm Thâm.webp', 0, 0, 0, 1, '1', '1'),
('7', 'Son Tint Lì Peripera Ink Mood Matte Tint 4G', 'Son Tint Lì Peripera Ink.webp', 0, 0, 0, 1, '3', '2'),
('8', 'Bảng Phấn Mắt 12 Màu Perfect Diary Explorer Twelve Eyeshadow Palette #13 Red Fox 14G (Kèm Cọ)', 'Bảng Phấn Mắt 12 Màu Perfect Diary Explorer.webp', 0, 0, 0, 1, '4', '2'),
('9', 'Phấn Nước Che Khuyết Điểm Mịn Lì Clio Kill Cover The New Founwear Cushion SPF50+ PA+++ (15gx2)', 'Phấn Nước Che Khuyết Điểm Mịn Lì.webp', 0, 0, 0, 1, '3', '2'),
('10', 'Chì Chân Mày THE FACE SHOP Designing Eyebrow Pencil 0.3G', 'Chì Chân Mày THE FACE SHOP.webp', 0, 0, 0, 1, '5', '2'),
('11', 'Son Dưỡng Môi Chăm Sóc Dịu Nhẹ Dear Dahlia Blooming Edition Paradise Tinted Blooming Balm – Fantasy 3.8G', 'e6f67dbc0aa4621f97cd4211cf4ab8bb.webp', 0, 0, 0, 1, '6', '2'),
('12', 'Bộ Cọ Trang Điểm Mắt 6 Cây TOOLA - TLA019', 'Bộ Cọ Trang Điểm Mắt 6 Cây TOOLA - TLA019.webp', 0, 0, 0, 1, '7', '2'),
('13', 'Son Tint Nước Siêu Lì, Lâu Trôi Romand Glasting Water Tint 4g', 'Son Tint Nước Siêu Lì.webp', 0, 0, 0, 1, '8', '2'),
('14', 'Bộ Sưu Tập Phiên Bản Giới Hạn Romand x Sanrio My Melody Kuromi', 'Bộ Sưu Tập Phiên Bản.webp', 0, 0, 0, 1, '8', '2'),
('15', 'Men Stay Simplicity Facial Moisturizer 80g', '1.jpg', 0, 0, 0, 1, '12', '3'),
('16', 'Combo 3in1 Nâng Tầm Nam Giới MERLIN for men', '2.jpg', 0, 0, 0, 1, '13', '3'),
('17', 'Bộ Dưỡng Da Nâng Tầm Nam Giới 5 Món DSiuan', '3.jpg', 0, 0, 0, 1, '14', '3'),
('18', 'Sữa Tắm Nam Nâng Tầm Đẳng Cấp 500ml D\'Vi Nature', '4.jpg', 0, 0, 0, 1, '15', '3'),
('19', 'Kem Chống Nắng Dành Cho Nam Giới - The Inkey List SPF 30 PA++++', '5.jpg', 0, 0, 0, 1, '16', '3'),
('20', 'Kem trắng da trị nám IMAGE ILUMA Image Skincare', '6.jpg', 0, 0, 0, 1, '18', '3'),
('21', 'Kem Dưỡng Trắng Da Toàn Thân Nâng Tông Tức Thì White Conc', 'Soyraie.jpg', 0, 0, 0, 1, '17', '3'),
('22', 'ten san pham test edit', 'linkanh.jpn', 0, 0, 0, 0, '2', '3'),
('22', 'Sản phẩm mới', '', 0, 0, 0, 1, '2', '12'),
('23', 'njjn', '', 0, 0, 0, 0, '9', '3');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `UserName` varchar(25) NOT NULL,
  `TenNhomQuyen` varchar(20) NOT NULL,
  `MatKhau` varchar(60) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `TrangThai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`UserName`, `TenNhomQuyen`, `MatKhau`, `SDT`, `DiaChi`, `TrangThai`) VALUES
('Admin', 'Admin', 'Admin@', '0123456789', 'Thôn Tiên Sơn 2, Xã Tân Sơn, Quận 8, Hồ Chí Minh', 'active'),
('Phú Văn', 'Admin', '123456', '0369698362', '99 An Dương Vương, Phường 16, Quận 8, TP.HCM', 'deleted'),
('Huỳnh Văn Nam', 'KH', '123456', '0369698363', '99 An Dương Vương, Phường 16, Quận 8, TP.HCM', 'active'),
('Huỳnh Văn Phú', 'KH', '123456', '0369698361', 'TP.Pleiku', 'active'),
('Huỳnh Văn Nữ', 'KH', '123456', '0369698364', '99 An Dương Vương, Phường 16, Quận 8, TP.HCM', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaTH` varchar(15) NOT NULL,
  `TenTH` varchar(20) NOT NULL,
  `XuatXu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaTH`, `TenTH`, `XuatXu`) VALUES
('1', 'AHC', 'Hàn Quốc'),
('2', 'La Roche-Posay', 'Pháp'),
('3', 'CLUB CLIO', 'Hàn Quốc'),
('4', 'PERFECT DIARY', 'Trung Quốc'),
('5', 'THE FACE SHOP', 'Hàn Quốc'),
('6', 'Dear Dahlia', 'Hàn Quốc'),
('7', 'TOOLA', 'Trung Quốc'),
('8', 'ROMAND', 'Hàn Quốc'),
('9', 'Dermafirm', 'Hàn Quốc'),
('10', 'DSIUAN', 'Trung Quốc'),
('11', 'Lameila', 'Trung Quốc'),
('12', 'Men Stay Simplicity', 'Việt Nam'),
('13', 'MERLIN for men', 'Việt Nam'),
('14', 'DSiuan', 'Trung Quốc'),
('15', 'D\'Vi Nature', 'Việt Nam'),
('16', 'The Inkey List', 'Anh Quốc'),
('17', 'White Conc', 'Nhật Bản'),
('18', 'ILUMA Image ', 'Mỹ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
