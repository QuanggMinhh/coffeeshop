-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 12, 2024 lúc 06:28 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `testcoffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id_blog` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`id_blog`, `name`, `author`, `date`, `content`) VALUES
(1, 'Cà phê và sức khỏe', 'admin', '2024-06-05', 'Cà phê và Sức khỏe: Cà phê pha phin giúp giảm nguy cơ mắc tiểu đường loại 2 Trong nghiên cứu được thực hiện bởi các nhà khoa học từ Đại học Công nghệ Chalmers...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(28, '4095', 8, 2),
(29, '4095', 7, 1),
(34, '4469', 12, 1),
(35, '4469', 13, 1),
(36, '6875', 12, 1),
(37, '6875', 13, 1),
(38, '3524', 12, 1),
(39, '3524', 13, 1),
(40, '8326', 14, 1),
(41, '8326', 16, 1),
(0, '9707', 0, 1),
(0, '4499', 0, 1),
(0, '3396', 0, 1),
(0, '2212', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) NOT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` text NOT NULL,
  `chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `diachi`, `chucvu`) VALUES
(1, 'Nguyễn Hữu Nghĩa', 'kopingnghia', 'c4ca4238a0b923820dcc509a6f75849b', 98436347, 'nghia@gmail.com', '																																																																																																																																																				Lạng Sơn																																																																																																																								', 1),
(9, 'Trần Khắc Nam', 'namcolo', '202cb962ac59075b964b07152d234b70', 12346878, 'nam@gmail.com', '										Nam Định					', 0),
(0, 'Võ Quang Minh', 'minh', 'e10adc3949ba59abbe56e057f20f883e', 123456789, 'voquangminh.2k3@gmail.com', '					Hà Tĩnh			', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(5, 'Cà phê Trung Nguyên', 1),
(6, 'Cà phê G7', 2),
(7, 'Cà phê Vinacafe', 3),
(4, 'Cà phê Tươi', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(11) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_payment`) VALUES
(28, 1, '4095', 0, '0'),
(31, 1, '1378', 0, '0'),
(32, 3, '6909', 0, '0'),
(34, 3, '3504', 0, '0'),
(35, 3, '4469', 0, '0'),
(36, 3, '6875', 1, 'tienmat'),
(37, 3, '3524', 1, 'Chuyển Khoảng'),
(38, 9, '8326', 1, 'Tiền Mặt'),
(0, 0, '9707', 1, 'Chuyển Khoảng'),
(0, 0, '4499', 1, 'Tiền Mặt'),
(0, 0, '3396', 1, 'Tiền Mặt'),
(0, 0, '2212', 1, 'Tiền Mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `masanpham` varchar(100) NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `id_danhmuc`, `trangthai`) VALUES
(1, 'Fresh Coffee 1', '1001', 200000, 20, 'product-1.png', 'ggggg', 'Cà phê tươi Nicarugua', 4, 1),
(2, 'Cà phê phin Gourmet Trung Nguyên', '2', 200000, 50, 'anh18.jpg', 'Gourmet Trung Nguyên', '', 5, 1),
(3, 'Cà phê chế phin 5 Trung Nguyên', '102', 175000, 35, 'anh25.jpg', '', '', 5, 1),
(4, 'Cà phê hòa tan G7 3in1', '103', 125000, 30, 'anh5.jpg', '', '', 6, 1),
(5, 'Fresh Coffee 2', '104', 200000, 12, 'product-2.png', '', '', 4, 1),
(6, 'Fresh Coffee 3', '105', 225000, 15, 'product-3.png', '', '', 4, 1),
(7, 'Cà phê hòa tan G7 3in1 20 gói', '106', 180000, 55, 'anh4.jpg', '', '', 6, 1),
(8, 'Cà phê hòa tan G7 3in1 40 gói', '108', 205000, 50, 'anh8.jpg', '', '', 6, 1),
(9, 'Cà phê chế phin 2 Trung Nguyên', '109', 250000, 62, 'anh26.jpg', '', '', 5, 1),
(10, 'Cà phê chế phin 3 Trung Nguyên', '110', 255000, 38, 'anh27.jpg', '', '', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `adress`, `note`, `id_dangky`) VALUES
(1, 'Nguyễn Hữu Nghĩa', '', '', '', 3),
(2, 'Trần Duy Hưng', '', '', '', 3),
(3, 'Trần Khắc Nam', '0984657832', 'Nam Định', '', 1),
(4, 'Nguyễn Quang Nhật', '', '', '', 3),
(5, 'Võ Quang Minh', '', '', '', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
