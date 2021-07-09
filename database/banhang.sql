-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2021 lúc 03:22 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'hamongkhang@gmail.com', '$2y$10$q3UFgqoa.mt5Yx1dVEBT.ee6CZkLk7p7U4Y.kbYQh6PLJ/mxgenJm', '100', 'Fb00fHTWh1bUJyJdm7BUks7UYuYOobVTKGF8I9YS6Ja5Fl57WAms9QvOZ38F', '2016-12-05 00:38:38', '2016-12-05 02:46:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `status` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(15, 25, '2021-07-08', 540000, 'COD', 1, 'Giao cổng sau', '2021-07-08 02:18:36', '2021-07-07 21:26:39'),
(16, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:40:08', '2021-07-08 09:40:08'),
(17, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:40:33', '2021-07-08 09:40:33'),
(18, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:41:54', '2021-07-08 09:41:54'),
(19, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:46:08', '2021-07-08 09:46:08'),
(20, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:48:33', '2021-07-08 09:48:33'),
(21, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:49:06', '2021-07-08 09:49:06'),
(22, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:49:25', '2021-07-08 09:49:25'),
(23, 26, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 09:50:20', '2021-07-08 09:50:20'),
(24, 26, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 09:51:38', '2021-07-08 09:51:38'),
(25, 25, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 10:22:56', '2021-07-08 10:22:56'),
(26, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:24:39', '2021-07-08 10:24:39'),
(27, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:25:12', '2021-07-08 10:25:12'),
(28, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:33:12', '2021-07-08 10:33:12'),
(29, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:36:17', '2021-07-08 10:36:17'),
(30, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:36:53', '2021-07-08 10:36:53'),
(31, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:38:27', '2021-07-08 10:38:27'),
(32, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:38:55', '2021-07-08 10:38:55'),
(33, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:40:27', '2021-07-08 10:40:27'),
(34, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:58:32', '2021-07-08 10:58:32'),
(35, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 10:59:19', '2021-07-08 10:59:19'),
(36, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 11:00:03', '2021-07-08 11:00:03'),
(37, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 11:00:51', '2021-07-08 11:00:51'),
(38, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 11:03:47', '2021-07-08 11:03:47'),
(39, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 11:05:29', '2021-07-08 11:05:29'),
(40, 25, '2021-07-08', 160000, 'bacs', 0, NULL, '2021-07-08 14:39:52', '2021-07-08 14:39:52'),
(41, 25, '2021-07-08', 0, 'bacs', 0, NULL, '2021-07-08 14:42:10', '2021-07-08 14:42:10'),
(42, 25, '2021-07-08', 180000, 'bacs', 0, NULL, '2021-07-08 14:43:33', '2021-07-08 14:43:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(46, 15, 2, 3, 180000, '2021-07-08 02:18:36', '2021-07-08 02:18:36'),
(47, 16, 2, 1, 180000, '2021-07-08 09:40:08', '2021-07-08 09:40:08'),
(48, 17, 2, 1, 180000, '2021-07-08 09:40:34', '2021-07-08 09:40:34'),
(49, 18, 2, 1, 180000, '2021-07-08 09:41:54', '2021-07-08 09:41:54'),
(50, 19, 2, 1, 180000, '2021-07-08 09:46:08', '2021-07-08 09:46:08'),
(51, 20, 2, 1, 180000, '2021-07-08 09:48:33', '2021-07-08 09:48:33'),
(52, 21, 2, 1, 180000, '2021-07-08 09:49:06', '2021-07-08 09:49:06'),
(53, 22, 2, 1, 180000, '2021-07-08 09:49:25', '2021-07-08 09:49:25'),
(54, 23, 2, 1, 180000, '2021-07-08 09:50:20', '2021-07-08 09:50:20'),
(55, 25, 2, 1, 180000, '2021-07-08 10:22:56', '2021-07-08 10:22:56'),
(56, 40, 7, 1, 160000, '2021-07-08 14:39:52', '2021-07-08 14:39:52'),
(57, 42, 2, 1, 180000, '2021-07-08 14:43:33', '2021-07-08 14:43:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_User` int(10) DEFAULT NULL,
  `id_Product` int(10) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_comment` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_User`, `id_Product`, `content`, `date_comment`, `created_at`, `updated_at`) VALUES
(105, 7, 1, 'bánh khá là tuyệt vời', '0000-00-00', '2019-04-18 06:54:36', '2019-04-18 06:54:36'),
(106, 7, 1, 'bánh khá là tuyệt vời', '0000-00-00', '2019-04-18 06:55:00', '2019-04-18 06:55:00'),
(107, 7, 1, 'bánh ngon lắm ạ', '2019-04-18', '2019-04-18 07:26:47', '2019-04-18 07:26:47'),
(108, 2, 20, 'bánh chất lượng quá shop', '2019-04-18', '2019-04-18 12:46:40', '2019-04-18 12:46:40'),
(109, 25, 2, 'Sản phẩm rất ngon', '2021-07-08', '2021-07-07 19:14:27', '2021-07-07 19:14:27'),
(110, 26, 2, '231312', '2021-07-08', '2021-07-07 21:25:32', '2021-07-07 21:25:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id_contact`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bàn Hữu Quỳnh', 1698586505, 'huuquynh8@gmail.com', 'xin chào shop', '2019-04-16 13:03:51', '2019-04-16 13:03:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_04_10_063302_create_transactions_table', 2),
(4, '2019_04_16_145024_create_admins_table', 3),
(5, '2019_04_17_031458_alter_column_code_and_time_code_in_users_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `pro_number` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hot` int(11) NOT NULL,
  `new` tinyint(4) DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `pro_number`, `image`, `unit`, `hot`, `new`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Crepe Sầu riêng', 5, 'Bánh crepe sầu riêng nhà làm', 150000, 120000, 2, '1430967449-pancake-sau-rieng-6.jpg', 'hộp', 0, 1, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Bánh Crepe Chocolate', 6, '', 180000, 160000, 3, 'crepe-chocolate.jpg', 'hộp', 0, 1, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, '', 150000, 120000, 1, 'crepe-chuoi.jpg', 'hộp', 0, 0, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Bánh Crepe Đào', 5, '', 160000, 0, 4, 'crepe-dao.jpg', 'hộp', 0, 0, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Bánh Crepe Dâu', 5, '', 160000, 0, 4, 'crepedau.jpg', 'hộp', 0, 0, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Bánh Crepe Pháp', 5, '', 200000, 180000, NULL, 'crepe-phap.jpg', 'hộp', 0, 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Bánh Crepe Táo', 5, '', 160000, 0, NULL, 'crepe-tao.jpg', 'hộp', 0, 1, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bánh Crepe Trà xanh', 5, '', 160000, 150000, NULL, 'crepe-traxanh.jpg', 'hộp', 0, 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 160000, 150000, NULL, 'saurieng-dua.jpg', 'hộp', 0, 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, '', 200000, 180000, NULL, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 0, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Bánh kem Chocolate Dâu', 3, '', 300000, 280000, NULL, 'banh kem sinh nhat.jpg', 'cái', 0, 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Bánh kem Dâu III', 3, '', 300000, 280000, NULL, 'Banh-kem (6).jpg', 'cái', 0, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Bánh kem Dâu I', 3, '', 350000, 320000, NULL, 'banhkem-dau.jpg', 'cái', 0, 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Bánh trái cây II', 3, '', 150000, 120000, NULL, 'banhtraicay.jpg', 'hộp', 0, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, '', 250000, 240000, NULL, 'Fruit-Cake_7979.jpg', 'cai', 0, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Bánh ngọt nhân cream táo', 2, '', 180000, 0, NULL, '20131108144733.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, '', 150000, 0, NULL, 'Fruit-Cake_7976.jpg', 'hộp', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, '', 150000, 0, NULL, 'Fruit-Cake_7981.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, '', 160000, 150000, NULL, 'Peach-Cake_3294.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, '', 160000, 150000, NULL, 'banhbonglantrung.jpg', 'hộp', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Bánh bông lan trứng muối II', 1, '', 180000, 0, NULL, 'banhbonglantrungmuoi.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Bánh French', 1, '', 180000, 0, NULL, 'banh-man-thu-vi-nhat-1.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, '', 80000, 70000, NULL, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, '', 50000, 0, NULL, 'Fruit-Cake.png', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, '', 100000, 80000, NULL, 'maxresdefault.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 0, NULL, 'Peach-Cake_3300.jpg', 'hộp', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, '', 100000, 0, NULL, 'sli12.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 380000, 350000, NULL, 'sli12.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 350000, NULL, 'Fruit-Cake.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 350000, NULL, 'Fruit-Cake_7971.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, '', 280000, 250000, NULL, 'p1392962167_banh74.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 0, NULL, 'Caramen-pudding636099031482099583.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 300000, NULL, 'chocolate-fruit636098975917921990.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 320000, 300000, NULL, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, NULL, 'mango-mousse-cake.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, NULL, 'MATCHA-MOUSSE.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, NULL, 'flower-fruits636102461981788938.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, NULL, 'strawberry-delight636102445035635173.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, NULL, 'raspberry.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000, 130000, NULL, '40819_food_pizza.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000, 0, NULL, 'hawaiian paradise_large-900x900.jpg', 'cái', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000, 0, NULL, 'chicken black pepper_large-900x900.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000, 0, NULL, 'pizza-miami.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000, 0, NULL, 'seafood curry_large-900x900.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 140000, 0, NULL, 'all1).jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000, 0, NULL, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, '', 120000, 100000, NULL, 'maxresdefault.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, '', 120000, 100000, NULL, 'sukem.jpg', 'cái', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 150000, 0, NULL, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 150000, 0, NULL, 'sukemdau.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 150000, 0, NULL, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 150000, 0, NULL, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 0, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, '', 150000, 0, NULL, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 0, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, '', 150000, 0, NULL, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 150000, 0, NULL, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 1, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, NULL, 'Macaron9.jpg', '', 0, 0, 1, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, NULL, '234.jpg', '', 1, 0, 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, 0, NULL, '1234.jpg', '', 0, 0, 1, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, NULL, 'cupcake.jpg', 'cái', 1, 1, 0, NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 250000, 220000, NULL, '111.jpg', 'cái', 1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `link`, `image`) VALUES
(1, 'bánh ngọt ngào', '', 'banner1.jpg'),
(2, 'hòa quyện thiên nhiên', '', 'banner2.jpg'),
(3, 'tăng sự kích thích', '', 'banner3.jpg'),
(4, 'ngon miệng', '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'banh-man-thu-vi-nhat-1.jpg', NULL, '2019-04-18 20:55:11'),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` date DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `status`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `code`, `time_code`, `provider`, `provider_id`) VALUES
(25, 'Ha Mong Khang', 'khang.ha22@student.passerellesnumeriques.org', '$2y$10$u.z8tJ5LS1IhHsR3fe1RoO09UPQJmEZnJdQPqIA0hwQg79a7fpN2G', '1234567891', 'Binh Dinh', 1, NULL, NULL, '2021-07-07 19:12:52', '2021-07-07 19:12:52', NULL, NULL, NULL, NULL),
(26, 'kha', 'hamongkhang@gmail.com', '$2y$10$xpYizdkDwDaH1WovE35ArOHBzZMjdGFN86tbGRINafoQtPsoAoe8O', '11111', '1111', 1, NULL, NULL, '2021-07-08 21:24:48', '2021-07-07 21:24:48', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_product`, `name`, `qty`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Bánh Crepe Táo', 1, 160000, 'crepe-tao.jpg', '2021-07-08 15:35:23', '2021-07-08 15:35:23'),
(2, 7, 'Bánh Crepe Táo', 1, 160000, 'crepe-tao.jpg', '2021-07-08 15:37:07', '2021-07-08 15:37:07'),
(3, 7, 'Bánh Crepe Táo', 1, 160000, 'crepe-tao.jpg', '2021-07-08 15:53:09', '2021-07-08 15:53:09'),
(4, 7, 'Bánh Crepe Táo', 1, 160000, 'crepe-tao.jpg', '2021-07-08 16:31:31', '2021-07-08 16:31:31'),
(5, 2, 'Bánh Crepe Chocolate', 1, 180000, 'crepe-chocolate.jpg', '2021-07-08 17:02:56', '2021-07-08 17:02:56'),
(6, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:03:44', '2021-07-08 17:03:44'),
(7, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:27:00', '2021-07-08 17:27:00'),
(8, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:27:12', '2021-07-08 17:27:12'),
(9, 13, 'Bánh kem Chocolate Dâu', 1, 300000, 'banh kem sinh nhat.jpg', '2021-07-08 17:28:20', '2021-07-08 17:28:20'),
(10, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:28:33', '2021-07-08 17:28:33'),
(11, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:28:47', '2021-07-08 17:28:47'),
(12, 2, 'Bánh Crepe Chocolate', 1, 180000, 'crepe-chocolate.jpg', '2021-07-08 17:33:22', '2021-07-08 17:33:22'),
(13, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:33:35', '2021-07-08 17:33:35'),
(14, 61, 'Bánh Cupcake - Anh Quốc', 1, 150000, 'cupcake.jpg', '2021-07-08 17:34:38', '2021-07-08 17:34:38'),
(15, 3, 'Bánh Crepe Sầu riêng - Chuối', 1, 150000, 'crepe-chuoi.jpg', '2021-07-08 17:36:43', '2021-07-08 17:36:43'),
(16, 62, 'Bánh Sachertorte', 1, 250000, '111.jpg', '2021-07-08 17:36:55', '2021-07-08 17:36:55'),
(17, 7, 'Bánh Crepe Táo', 1, 160000, 'crepe-tao.jpg', '2021-07-08 17:46:43', '2021-07-08 17:46:43'),
(18, 50, 'Bánh su kem sữa tươi', 1, 120000, 'sukem.jpg', '2021-07-08 17:46:58', '2021-07-08 17:46:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bills_users` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_code_index` (`code`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `FK_bill_detail_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
