-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 18, 2025 lúc 02:47 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `d4blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hide` tinyint NOT NULL,
  `note` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `hide`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Mẹo đời sống', 0, 'Một số mẹo hay về đời sống !', '2025-08-16 08:28:51', '2025-08-16 08:28:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_path`, `file_type`, `alt_text`, `created_at`) VALUES
(5, 'name.png', 'uploads/media/1755017836_name.png', 'image/png', '', '2025-08-12 16:57:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `sender_id` int DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb3_unicode_ci,
  `type` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `room_id`, `content`, `type`, `created_at`, `is_read`) VALUES
(10, 1, '1_5', 'alo', 'TEXT', '2025-08-03 23:15:15', 0),
(11, 5, '1_5', 'gì', 'TEXT', '2025-08-03 23:15:22', 0),
(12, 1, '1_4', 'óc heo', 'TEXT', '2025-08-03 23:15:38', 0),
(13, 4, '1_4', 'gì', 'TEXT', '2025-08-03 23:16:30', 0),
(14, 1, '1_5', 'không gf', 'TEXT', '2025-08-07 21:31:40', 0),
(15, 1, '1_5', 'Tại sao mày duyệt tài khoản đó vậy ?', 'TEXT', '2025-08-07 21:43:38', 0),
(16, 5, '1_5', 'nó là em t mà', 'TEXT', '2025-08-07 21:44:42', 0),
(17, 1, '1_5', 'không thích', 'TEXT', '2025-08-07 22:00:58', 0),
(18, 5, '1_5', 'v để t gỡ duyệt nó', 'TEXT', '2025-08-07 22:03:33', 0),
(19, 1, '1_5', 'ừ', 'TEXT', '2025-08-07 22:12:47', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb3_unicode_ci,
  `hide` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seo_title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `hide`, `created_at`, `updated_at`, `seo_title`, `seo_description`) VALUES
(2, 'Giới thiệu ', 'gioi-thieu', '<!--?php\n$title = \"Trang chủ\";\n\nob_start();\n?-->\n<div class=\"container py-4\">\n<h3 class=\"mb-4 animate__animated animate__fadeInDown fs-4\"><strong>Đ&aacute;ng ch&uacute; &yacute; </strong></h3>\n<div class=\"row\">\n<div class=\"col-md-4 animate__animated animate__fadeInUp animate__delay-1s\">\n<div class=\"card category-card\"><img class=\"card-img-top\" src=\"https://via.placeholder.com/400x200\" alt=\"Danh mục\" />\n<div class=\"card-body\">\n<h5 class=\"card-title\">Top 3 C&ocirc;ng Nghệ</h5>\n</div>\n</div>\n</div>\n<div class=\"col-md-4 animate__animated animate__fadeInUp animate__delay-2s\">\n<div class=\"mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr />\n<div class=\"mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr />\n<div class=\"mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr /></div>\n<div class=\"col-md-4 animate__animated animate__fadeInUp animate__delay-3s\">\n<div class=\" mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr />\n<div class=\"mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr />\n<div class=\"mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<hr /></div>\n</div>\n</div>\n<!-- body post -->\n<div class=\"container py-4\">\n<div class=\"row\">\n<div class=\"col-8\">\n<h3 class=\" animate__animated animate__fadeInLeft\">B&agrave;i viết đề xuất</h3>\n<!-- card-1 -->\n<div class=\"card mb-3\" data-aos=\"fade-down\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<!-- card-2 -->\n<div class=\"card mb-3\" data-aos=\"fade-down\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n<!-- card-3 -->\n<div class=\"card mb-3\" data-aos=\"fade-down\">\n<div class=\"row g-0\">\n<div class=\"col-md-4\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-8\">\n<div class=\"card-body\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"col-4\">\n<div class=\"d-flex mb-3\" style=\"height: 6px; border-radius: 4px; overflow: hidden;\">\n<div class=\"w-50 \" style=\"background-color: var(--main-color);\">&nbsp;</div>\n<div class=\"w-50 bg-info\">&nbsp;</div>\n</div>\n<h3 class=\" animate__animated animate__fadeInLeft\">Trao Qu&agrave; Nhuận B&uacute;t.</h3>\n<div class=\" mb-3\">\n<div class=\"row g-0\">\n<div class=\"col-md-2\"><img class=\"img-fluid rounded-start\" src=\"...\" alt=\"...\" /></div>\n<div class=\"col-md-10\">\n<div class=\"card-body\">\n<div class=\"d-flex justify-content-between align-items-center\">\n<h5 class=\"card-title mb-0\">Card title</h5>\n<span class=\"text-muted\">1</span></div>\n<p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>\n</div>\n</div>\n<div class=\"card text-bg-light mt-5\" data-aos=\"fade-down\"><img class=\"card-img\" src=\"...\" alt=\"...\" />\n<div class=\"card-img-overlay\">\n<h5 class=\"card-title\">Card title</h5>\n<p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>\n<p class=\"card-text\"><small>Last updated 3 mins ago</small></p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<div class=\"position-fixed bottom-0 end-0 p-3 d-flex flex-column gap-2\" style=\"z-index: 1050;\"><!-- Zalo --> <a class=\"btn btn-primary rounded-circle d-flex justify-content-center align-items-center\" style=\"width: 48px; height: 48px;\" href=\"https://zalo.me/1234567890\" target=\"_blank\" rel=\"noopener\"> <img src=\"https://upload.wikimedia.org/wikipedia/commons/9/91/Icon_of_Zalo.svg\" alt=\"Zalo\" width=\"24\" height=\"24\" /> </a> <!-- Messenger --> <a class=\"btn btn-primary rounded-circle d-flex justify-content-center align-items-center\" style=\"width: 48px; height: 48px;\" href=\"https://m.me/yourpage\" target=\"_blank\" rel=\"noopener\"> <img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Facebook_Messenger_logo_2020.svg/1024px-Facebook_Messenger_logo_2020.svg.png?20220118041828\" alt=\"Messenger\" width=\"24\" height=\"24\" /> </a> <!-- Gọi điện --> <a class=\"btn btn-success rounded-circle d-flex justify-content-center align-items-center\" style=\"width: 48px; height: 48px;\" href=\"tel:0987654321\"> </a></div>\n<!--?php\n$content = ob_get_clean();\n\ninclude __DIR__ . \'/../main/main.php\';\n?-->', 0, '2025-07-23 13:37:33', '2025-07-23 13:37:33', 'test title seo ', 'test dẹnbwbw');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `key_code` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hide` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `key_code`, `hide`) VALUES
(1, 'Trang', 'manage_pages', 0),
(2, 'Xoá thẻ', 'delete_tags', 0),
(3, 'Thêm thẻ', 'create_tags', 0),
(4, 'Sửa thẻ', 'update_tags', 0),
(5, 'Ẩn thẻ', 'hide_tags', 0),
(6, 'Thẻ', 'manage_tags', 0),
(7, 'Thêm trang', 'create_page', 0),
(8, 'Sửa trang', 'update_page', 0),
(9, 'Xoá trang', 'delete_page', 0),
(11, 'Phân Quyền', 'manage_per', 0),
(12, 'Tài khoản', 'manage_users', 0),
(13, 'Thêm tài khoản', 'create_user', 0),
(14, 'Sửa tài khoản', 'update_user', 0),
(15, 'Xoá tài khoản', 'delete_user', 0),
(16, 'Quyền Role', 'role_user', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb3_unicode_ci,
  `seo_keywords` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb3_unicode_ci DEFAULT 'draft',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `user1_id` int NOT NULL,
  `user2_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `user1_id`, `user2_id`, `created_at`) VALUES
(5, 1, 5, '2025-08-03 23:14:22'),
(8, 1, 6, '2025-08-07 21:30:40'),
(9, 1, 7, '2025-08-07 21:30:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seo`
--

CREATE TABLE `seo` (
  `id` int NOT NULL,
  `post_id` int DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb3_unicode_ci,
  `meta_keywords` text COLLATE utf8mb3_unicode_ci,
  `canonical_url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `robots` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT 'index, follow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `setting_key` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(6, 'site_name', 'Meo Blog'),
(7, 'meta_title', 'Blog Đời Sống | Chia Sẻ Kiến Thức & Mẹo Hay Mỗi Ngày'),
(8, 'meta_description', 'Chia sẻ kiến thức và mẹo hay trong cuộc sống, giúp bạn sống thông minh hơn mỗi ngày. Cập nhật bí quyết về sức khỏe, tài chính, công nghệ và nhiều lĩnh vực khác.\r\n'),
(9, 'meta_keywords', 'mẹo đời sống, kiến thức đời sống, mẹo vặt hay, bí quyết sống, chia sẻ kinh nghiệm'),
(10, 'google_analytics', ''),
(11, 'chatbot_script', ''),
(12, 'logo', '/uploads/settings/logo.png'),
(13, 'favicon', '/uploads/settings/favicon.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hide` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `hide`, `created_at`, `updated_at`) VALUES
(5, 'Chính trị', 'chinh-tri', 0, '2025-07-21 15:27:58', '2025-07-21 15:27:58'),
(6, 'TP. Hồ Chí Minh ', 'tp-ho-chi-minh', 1, '2025-07-21 15:31:37', '2025-07-21 15:31:37'),
(12, 'Lập trình', 'lap-trinh', 0, '2025-07-28 14:40:49', '2025-07-28 14:40:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hide` tinyint DEFAULT '0',
  `role` tinyint NOT NULL DEFAULT '0',
  `online` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_active` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `img`, `name`, `email`, `phone`, `password`, `hide`, `role`, `online`, `created_at`, `updated_at`, `last_active`) VALUES
(1, '/uploads/1755440426_avt.jpg', 'tran quoc duong', 'admin@gmail.com', '0965751901', '$2y$12$WL5EmlD5DjFwZ0gsLNmc7eRWj9jBM85lZVILHFyAOFWVlZN0bFTsW', 0, 0, 1, '2025-08-17 17:28:45', '0000-00-00 00:00:00', '2025-08-17 14:17:37'),
(5, '/uploads/1754576022_avata.webp', 'an', 'an@gmail.com', '0123456789', '$2y$12$b/IaBiCYO8IlklZlG3MmuOVTnGQkxyBT/YL8NM5i58FeV9j7wvnFm', 0, 0, 1, '2025-08-07 15:12:57', '2025-07-29 14:29:54', '2025-08-07 22:12:57'),
(6, '/uploads/1754576056_snapedit_1743829590694.png', 'admin clone', 'bossadmin@gmail.com', '0965751901', '$2y$12$az2AKJy5UM0tCL6nDCZDyuUhhDK4BAWS.XZ6RZ023UgqSwuw8iTb.', 0, 0, 1, '2025-08-07 14:14:16', '2025-07-31 14:55:21', NULL),
(7, '/uploads/1754574397_161966400_1437578863247221_3637270099989887877_n.jpg', 'tran quoc tuan ', 'tuan@gmail.com', '0965751901', '$2y$12$9kKBfV40X2ilS/c682dr4unGW.iRVy0eOLQxeGIitN101eFYRWJVC', 0, 0, 1, '2025-08-07 13:46:37', '2025-08-07 13:25:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `permission_id`) VALUES
(70, 6, 12),
(71, 6, 13),
(72, 6, 14),
(103, 1, 11),
(104, 1, 12),
(105, 1, 13),
(106, 1, 14),
(107, 1, 15),
(108, 1, 16),
(109, 1, 2),
(110, 1, 3),
(111, 1, 4),
(112, 1, 5),
(113, 1, 6),
(114, 1, 1),
(115, 1, 7),
(116, 1, 8),
(117, 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `widgets`
--

CREATE TABLE `widgets` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `position` enum('left','main','right') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'main',
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `content`, `position`, `sort_order`) VALUES
(1, 'Widget A', '    <div\n          class=\"col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-1s\"\n        >\n          <div class=\"card category-card\">\n            <img\n              src=\"https://via.placeholder.com/400x200\"\n              class=\"card-img-top\"\n              alt=\"Danh mục\"\n            />\n            <div class=\"card-body\">\n              <h5 class=\"card-title\">Top 3 Công Nghệ</h5>\n            </div>\n          </div>\n        </div>', 'main', 2),
(2, 'Widget B', '   <div\n          class=\"col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-2s\"\n        >\n          <div class=\"mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <hr />\n          <div class=\"card mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <div class=\"card mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <hr />\n        </div>', 'left', 2),
(3, 'Widget C', '   <div\n          class=\"col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-3s\"\n        >\n          <div class=\"card mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <div class=\"card mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <div class=\"card mb-3\">\n            <div class=\"row g-0\">\n              <div class=\"col-md-4\">\n                <img src=\"...\" class=\"img-fluid rounded-start\" alt=\"...\" />\n              </div>\n              <div class=\"col-md-8\">\n                <div class=\"card-body\">\n                  <h5 class=\"card-title\">Card title</h5>\n                  <p class=\"card-text\">\n                    <small class=\"text-body-secondary\"\n                      >Last updated 3 mins ago</small\n                    >\n                  </p>\n                </div>\n              </div>\n            </div>\n          </div>\n          <hr />\n        </div>', 'right', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_code` (`key_code`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_pair` (`user1_id`,`user2_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Chỉ mục cho bảng `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`setting_key`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Chỉ mục cho bảng `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ràng buộc cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `seo`
--
ALTER TABLE `seo`
  ADD CONSTRAINT `seo_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
