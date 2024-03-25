-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 27, 2023 lúc 08:48 AM
-- Phiên bản máy phục vụ: 5.7.40
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `adm_name` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  PRIMARY KEY (`adm_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin_login`
--

INSERT INTO `admin_login` (`adm_name`, `matkhau`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `hd_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenkhachhang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhthucthanhtoan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydat` date NOT NULL,
  PRIMARY KEY (`hd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hd_id`, `tenkhachhang`, `diachi`, `hinhthucthanhtoan`, `thanhtien`, `email`, `ngaydat`) VALUES
(1, 'Khánh', 'Đồng Nai', 'Trả thẻ', 500, 'khanh@gmail.com', '2002-08-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

DROP TABLE IF EXISTS `nhaxuatban`;
CREATE TABLE IF NOT EXISTS `nhaxuatban` (
  `nxb_id` int(11) NOT NULL AUTO_INCREMENT,
  `nxb_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`nxb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`nxb_id`, `nxb_name`) VALUES
(1, 'NXB Kim Đồng'),
(2, 'NXB Hội Nhà Văn'),
(3, 'NXB Măng Non');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_gia` int(255) NOT NULL,
  `sp_giakhuyenmai` int(11) NOT NULL,
  `sp_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_khuyenmai` tinyint(1) NOT NULL,
  `nxb_id` int(11) NOT NULL,
  `sp_mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tacgia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `FK1` (`nxb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_gia`, `sp_giakhuyenmai`, `sp_img`, `sp_khuyenmai`, `nxb_id`, `sp_mota`, `tacgia`) VALUES
(2, 'Và rồi chẳng còn ai', 150, 100, 'sach2.jpg', 1, 2, 'Sách hay số 1 Việt Nam', ''),
(3, 'Muôn kiếp nhân sinh', 150, 100, 'sach3.jpg', 0, 1, 'Sách hay số 1 Việt Nam', ''),
(4, 'Nhà giả kim', 150, 50, 'sach4.jpg', 0, 3, 'Sách hay mới xuất bản', ''),
(5, 'Hiểu về trái tim', 150, 50, 'sach5.jpg', 1, 2, 'Sách hay mới xuất bản', 'Minh Niệm'),
(6, 'Bản án chế độ thực dân pháp', 150, 50, 'sach6.jpg', 0, 1, 'Sách hay mới xuất bản', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `tendangnhap` varchar(255) NOT NULL,
  `hotenuser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  PRIMARY KEY (`tendangnhap`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`tendangnhap`, `hotenuser`, `email`, `matkhau`) VALUES
('khanh123', 'Nhật Khánh', 'khanh1@gmail.com', '1'),
('khanh228ey', 'Khánh', 'khanh2282002dzz@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
