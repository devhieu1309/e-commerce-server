-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2025 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

-- CREATE TABLE `provinces` (
--   `provinces_id` varchar(20) NOT NULL,
--   `name` varchar(255) NOT NULL,
--   `full_name` varchar(255) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`provinces_id`, `name`, `full_name`) VALUES
('01', 'Hà Nội', 'Thành phố Hà Nội'),
('04', 'Cao Bằng', 'Tỉnh Cao Bằng'),
('08', 'Tuyên Quang', 'Tỉnh Tuyên Quang'),
('11', 'Điện Biên', 'Tỉnh Điện Biên'),
('12', 'Lai Châu', 'Tỉnh Lai Châu'),
('14', 'Sơn La', 'Tỉnh Sơn La'),
('15', 'Lào Cai', 'Tỉnh Lào Cai'),
('19', 'Thái Nguyên', 'Tỉnh Thái Nguyên'),
('20', 'Lạng Sơn', 'Tỉnh Lạng Sơn'),
('22', 'Quảng Ninh', 'Tỉnh Quảng Ninh'),
('24', 'Bắc Ninh', 'Tỉnh Bắc Ninh'),
('25', 'Phú Thọ', 'Tỉnh Phú Thọ'),
('31', 'Hải Phòng', 'Thành phố Hải Phòng'),
('33', 'Hưng Yên', 'Tỉnh Hưng Yên'),
('37', 'Ninh Bình', 'Tỉnh Ninh Bình'),
('38', 'Thanh Hóa', 'Tỉnh Thanh Hóa'),
('40', 'Nghệ An', 'Tỉnh Nghệ An'),
('42', 'Hà Tĩnh', 'Tỉnh Hà Tĩnh'),
('44', 'Quảng Trị', 'Tỉnh Quảng Trị'),
('46', 'Huế', 'Thành phố Huế'),
('48', 'Đà Nẵng', 'Thành phố Đà Nẵng'),
('51', 'Quảng Ngãi', 'Tỉnh Quảng Ngãi'),
('52', 'Gia Lai', 'Tỉnh Gia Lai'),
('56', 'Khánh Hòa', 'Tỉnh Khánh Hòa'),
('66', 'Đắk Lắk', 'Tỉnh Đắk Lắk'),
('68', 'Lâm Đồng', 'Tỉnh Lâm Đồng'),
('75', 'Đồng Nai', 'Tỉnh Đồng Nai'),
('79', 'Hồ Chí Minh', 'Thành phố Hồ Chí Minh'),
('80', 'Tây Ninh', 'Tỉnh Tây Ninh'),
('82', 'Đồng Tháp', 'Tỉnh Đồng Tháp'),
('86', 'Vĩnh Long', 'Tỉnh Vĩnh Long'),
('91', 'An Giang', 'Tỉnh An Giang'),
('92', 'Cần Thơ', 'Thành phố Cần Thơ'),
('96', 'Cà Mau', 'Tỉnh Cà Mau');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `provinces`
--
-- ALTER TABLE `provinces`
--   ADD PRIMARY KEY (`provinces_id`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
