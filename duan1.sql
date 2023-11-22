-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2023 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `noidung_bl` varchar(255) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_nd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_chitietdh` int(11) NOT NULL,
  `soluong_chitietdh` int(11) NOT NULL,
  `size_chitietdh` varchar(4) NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `id_chitietsp` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_sanpham`
--

CREATE TABLE `chitiet_sanpham` (
  `id_chitietsp` int(11) NOT NULL,
  `soluongtrongkho` int(11) NOT NULL,
  `soluongdaban` int(11) NOT NULL,
  `size_chitiet` varchar(4) NOT NULL,
  `gia_chitiet` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `ten_dm`) VALUES
(1, 'Giay 1'),
(2, 'Giay 2'),
(3, 'Giay 3'),
(4, 'Giay 4'),
(5, 'Giay 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(11) NOT NULL,
  `diachi_giaohang` varchar(50) NOT NULL,
  `sdt_nguoinhan` varchar(50) NOT NULL,
  `ten_nguoinhan` varchar(50) NOT NULL,
  `phuongthuc_thanhtoan` int(1) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id_nd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nd` int(11) NOT NULL,
  `sdt_nd` varchar(10) NOT NULL,
  `diachi_nd` varchar(50) NOT NULL,
  `email_nd` varchar(50) NOT NULL,
  `tentaikhoan_nd` varchar(50) NOT NULL,
  `matkhau_nd` varchar(50) NOT NULL,
  `role` tinytext NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `mota_sp` text NOT NULL,
  `gia_sp` double(15,2) NOT NULL DEFAULT 0.00,
  `luotxem_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `lk_binhluan_sanpham` (`id_sp`),
  ADD KEY `lk_binhluan_nguoidung` (`id_nd`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_chitietdh`),
  ADD KEY `lk_chitietdh_sanpham` (`id_sp`),
  ADD KEY `lk_chitietdh_donhang` (`id_dh`),
  ADD KEY `lk_chitietdh_chitietsp` (`id_chitietsp`);

--
-- Chỉ mục cho bảng `chitiet_sanpham`
--
ALTER TABLE `chitiet_sanpham`
  ADD PRIMARY KEY (`id_chitietsp`),
  ADD KEY `lk_chitietsp_sanpham` (`id_sp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `lk_donhang_nguoidung` (`id_nd`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nd`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_sanpham_danhmuc` (`id_dm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_chitietdh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_sanpham`
--
ALTER TABLE `chitiet_sanpham`
  MODIFY `id_chitietsp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_binhluan_nguoidung` FOREIGN KEY (`id_nd`) REFERENCES `nguoidung` (`id_nd`),
  ADD CONSTRAINT `lk_binhluan_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `lk_chitietdh_chitietsp` FOREIGN KEY (`id_chitietsp`) REFERENCES `chitiet_sanpham` (`id_chitietsp`),
  ADD CONSTRAINT `lk_chitietdh_donhang` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`),
  ADD CONSTRAINT `lk_chitietdh_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `chitiet_sanpham`
--
ALTER TABLE `chitiet_sanpham`
  ADD CONSTRAINT `lk_chitietsp_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_donhang_nguoidung` FOREIGN KEY (`id_nd`) REFERENCES `nguoidung` (`id_nd`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
