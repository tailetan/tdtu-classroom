-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 26, 2021 lúc 07:28 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `classroom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_attendance`
--

CREATE TABLE `table_attendance` (
  `lesson_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` set('present','absent') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'absent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_attendance`
--

INSERT INTO `table_attendance` (`lesson_id`, `student_id`, `status`) VALUES
(1, 416, 'absent'),
(1, 428, 'present'),
(1, 429, 'absent'),
(1, 431, 'present'),
(1, 432, 'present'),
(1, 433, 'absent'),
(1, 436, 'present'),
(1, 437, 'present'),
(2, 416, 'present'),
(2, 428, 'present'),
(2, 429, 'present'),
(2, 431, 'absent'),
(2, 432, 'present'),
(2, 433, 'present'),
(2, 436, 'absent'),
(2, 437, 'absent'),
(3, 416, 'absent'),
(3, 428, 'present'),
(3, 429, 'absent'),
(3, 431, 'absent'),
(3, 432, 'present'),
(3, 433, 'present'),
(3, 436, 'present'),
(3, 437, 'absent'),
(4, 416, 'absent'),
(4, 428, 'present'),
(4, 429, 'present'),
(4, 431, 'present'),
(4, 432, 'present'),
(4, 433, 'present'),
(4, 436, 'present'),
(4, 437, 'absent'),
(5, 416, 'absent'),
(5, 428, 'absent'),
(5, 429, 'absent'),
(5, 431, 'absent'),
(5, 432, 'present'),
(5, 433, 'present'),
(5, 436, 'present'),
(5, 437, 'absent'),
(6, 459, 'absent'),
(6, 460, 'absent'),
(6, 461, 'absent'),
(6, 462, 'absent'),
(6, 463, 'absent'),
(6, 464, 'absent'),
(6, 465, 'absent'),
(6, 466, 'absent'),
(6, 467, 'absent'),
(6, 468, 'absent'),
(6, 469, 'absent'),
(6, 470, 'absent'),
(6, 471, 'absent'),
(6, 472, 'absent'),
(6, 473, 'absent'),
(6, 474, 'absent'),
(6, 475, 'absent'),
(6, 476, 'absent'),
(6, 477, 'absent'),
(6, 478, 'absent'),
(6, 479, 'absent'),
(6, 480, 'absent'),
(6, 481, 'absent'),
(6, 482, 'absent'),
(6, 483, 'absent'),
(6, 484, 'absent'),
(6, 485, 'absent'),
(6, 486, 'absent'),
(7, 459, 'absent'),
(7, 460, 'absent'),
(7, 461, 'absent'),
(7, 462, 'absent'),
(7, 463, 'absent'),
(7, 464, 'absent'),
(7, 465, 'absent'),
(7, 466, 'absent'),
(7, 467, 'absent'),
(7, 468, 'absent'),
(7, 469, 'absent'),
(7, 470, 'absent'),
(7, 471, 'absent'),
(7, 472, 'absent'),
(7, 473, 'absent'),
(7, 474, 'absent'),
(7, 475, 'absent'),
(7, 476, 'absent'),
(7, 477, 'absent'),
(7, 478, 'absent'),
(7, 479, 'absent'),
(7, 480, 'absent'),
(7, 481, 'absent'),
(7, 482, 'absent'),
(7, 483, 'absent'),
(7, 484, 'absent'),
(7, 485, 'absent'),
(7, 486, 'absent');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_class`
--

CREATE TABLE `table_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_period` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_class`
--

INSERT INTO `table_class` (`class_id`, `class_name`, `class_img`, `subject`, `room`, `total_period`, `user_id`) VALUES
(28, '18H50305', 'public/images/head-img-2.png', 'Xác Suất Thống Kê', 'E502', 40, 34),
(30, '18H50302', 'public/images/head-img-1.png', 'Tổ Chức Máy Tính', 'C303', 35, 36),
(31, '18H50302', 'public/images/head-img-5.png', 'Hệ Cơ Sở Dữ Liệu', 'F406', 35, 36),
(33, '19H50203', 'public/images/head-img-4.png', 'Lập Trình Web Và Ứng Dụng', 'D509', 35, 36),
(36, '18H50305', 'public/images/head-img-1.png', 'Hệ Cơ Sở Dữ Liệu', 'C305', 35, 34),
(37, '20H50201', 'public/images/head-img-6.png', 'Toán Kinh Tế', 'C303', 35, 34),
(38, '18H50301', 'public/images/Language.png', 'Anh Văn 5', 'E502', 60, 34),
(39, '19H50203', 'public/images/head-img-4.png', 'Lập Trình Web Và Ứng Dụng', 'F702', 40, 34),
(40, '18H50305', 'public/images/head-img-1.png', 'Hệ Điều Hành', 'D502', 40, 36),
(43, '18H50303', 'public/images/head-img-2.png', 'Bảo Mật Máy Tính', 'C303', 35, 34),
(65, '18E00201', 'public/images/law.png', 'Luật Kinh Tế', 'F405', 35, 74),
(66, '18E00202', 'public/images/head-img-3.png', 'Luật Thương Mại', 'D503', 35, 74),
(67, '19E50407', 'public/images/head-img-6.png', 'Luật Hình Sự', 'F410', 35, 74),
(68, '18H50305', 'public/images/head-img-1.png', 'Bảo Mật Máy Tính', 'C405', 40, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_lesson`
--

CREATE TABLE `table_lesson` (
  `lesson_id` int(11) NOT NULL,
  `date_study` date NOT NULL,
  `room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_period` int(10) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_lesson`
--

INSERT INTO `table_lesson` (`lesson_id`, `date_study`, `room`, `num_of_period`, `class_id`) VALUES
(1, '2021-07-10', 'D502', 3, 31),
(2, '2021-07-24', 'C303', 6, 31),
(3, '2021-07-16', 'F408', 3, 31),
(4, '2021-07-16', 'D502', 3, 31),
(5, '2021-07-17', 'C303', 3, 31),
(6, '2021-07-24', 'D502', 3, 33),
(7, '2021-07-23', 'C303', 6, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_student`
--

CREATE TABLE `table_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_student`
--

INSERT INTO `table_student` (`id`, `student_id`, `last_name`, `first_name`, `email`, `class_id`) VALUES
(416, '518H0522', 'Phạm Hữu', 'Khôi', '518H0522@student.tdtu.edu.vn', 31),
(428, '519H0252', 'Trần Lê Quang', 'Trung', '519H0252@student.tdtu.edu.vn', 31),
(429, '519H0341', 'Tô Trọng', 'Phúc', '519H0341@student.tdtu.edu.vn', 31),
(431, '520H0538', 'Trần Văn', 'Huy', '520H0538@student.tdtu.edu.vn', 31),
(432, '520H0438', 'Đỗ Thanh', 'Tuấn', '520H0438@student.tdtu.edu.vn', 31),
(433, '520H0093', 'Phan Phi', 'Long', '520H0093@student.tdtu.edu.vn', 31),
(436, '520H0592', 'Trần Ngọc', 'Tú', '520H0592@student.tdtu.edu.vn', 31),
(437, '518H0550', 'Trần Công', 'Phú', '518H0550@student.tdtu.edu.vn', 31),
(459, '﻿517H0054', 'Hoàng Tuấn', 'Huy', '517H0054@student.tdtu.edu.vn', 33),
(460, '517H0146', 'Trần Công Quang', 'Minh', '517H0146@student.tdtu.edu.vn', 33),
(461, '517H0172', 'Nguyễn Xuân', 'Trình', '517H0172@student.tdtu.edu.vn', 33),
(462, '517H0175', 'Trương Thị', 'Trường', '517H0175@student.tdtu.edu.vn', 33),
(463, '518H0522', 'Phạm Hữu', 'Khôi', '518H0522@student.tdtu.edu.vn', 33),
(464, '518H0042', 'Trần Quốc', 'Nguyên', '518H0042@student.tdtu.edu.vn', 33),
(465, '518H0043', 'Trần Hồng', 'Nhung', '518H0043@student.tdtu.edu.vn', 33),
(466, '518H0491', 'Nguyễn Thanh', 'Hà', '518H0491@student.tdtu.edu.vn', 33),
(467, '518H0050', 'Nguyễn Văn', 'Tài', '518H0050@student.tdtu.edu.vn', 33),
(468, '518H0062', 'Nguyễn Thị Minh', 'Thư', '518H0062@student.tdtu.edu.vn', 33),
(469, '518H0494', 'Trần Quán', 'Hào', '518H0494@student.tdtu.edu.vn', 33),
(470, '518H0202', 'Trần Đông', 'Khang', '518H0202@student.tdtu.edu.vn', 33),
(471, '518H0095', 'Lê Đăng', 'Huy', '518H0095@student.tdtu.edu.vn', 33),
(472, '518H0679', 'Nguyễn Huỳnh', 'Tú', '518H0679@student.tdtu.edu.vn', 33),
(473, '518H0656', 'Nguyễn Hoài', 'Nam', '518H0656@student.tdtu.edu.vn', 33),
(474, '519H0157', 'Nguyễn Quang', 'Duy', '519H0157@student.tdtu.edu.vn', 33),
(475, '519H0252', 'Trần Lê Quang', 'Trung', '519H0252@student.tdtu.edu.vn', 33),
(476, '519H0341', 'Tô Trọng', 'Phúc', '519H0341@student.tdtu.edu.vn', 33),
(477, '519H0321', 'Nguyễn Trung', 'Nam', '519H0321@student.tdtu.edu.vn', 33),
(478, '520H0538', 'Trần Văn', 'Huy', '520H0538@student.tdtu.edu.vn', 33),
(479, '520H0438', 'Đỗ Thanh', 'Tuấn', '520H0438@student.tdtu.edu.vn', 33),
(480, '520H0093', 'Phan Phi', 'Long', '520H0093@student.tdtu.edu.vn', 33),
(481, '520H0570', 'Trịnh Nguyễn Anh', 'Quân', '520H0570@student.tdtu.edu.vn', 33),
(482, '520H0586', 'Mai Phước', 'Tín', '520H0586@student.tdtu.edu.vn', 33),
(483, '520H0592', 'Trần Ngọc', 'Tú', '520H0592@student.tdtu.edu.vn', 33),
(484, '518H0550', 'Trần Công', 'Phú', '518H0550@student.tdtu.edu.vn', 33),
(485, '518H0276', 'Cù Đình', 'Thi', '518H0276@student.tdtu.edu.vn', 33),
(486, '518H0589', 'Trần Đình Anh', 'Vũ', '518H0589@student.tdtu.edu.vn', 33),
(499, '518H0494', 'Trần Quán', 'Hào', '518H0494@student.tdtu.edu.vn', 65),
(500, '518H0202', 'Trần Đông', 'Khang', '518H0202@student.tdtu.edu.vn', 65),
(501, '518H0095', 'Lê Đăng', 'Huy', '518H0095@student.tdtu.edu.vn', 65),
(502, '518H0679', 'Nguyễn Huỳnh', 'Tú', '518H0679@student.tdtu.edu.vn', 65),
(503, '518H0656', 'Nguyễn Hoài', 'Nam', '518H0656@student.tdtu.edu.vn', 65),
(504, '519H0157', 'Nguyễn Quang', 'Duy', '519H0157@student.tdtu.edu.vn', 65),
(505, '519H0252', 'Trần Lê Quang', 'Trung', '519H0252@student.tdtu.edu.vn', 65),
(506, '519H0341', 'Tô Trọng', 'Phúc', '519H0341@student.tdtu.edu.vn', 65),
(507, '519H0321', 'Nguyễn Trung', 'Nam', '519H0321@student.tdtu.edu.vn', 65),
(508, '520H0538', 'Trần Văn', 'Huy', '520H0538@student.tdtu.edu.vn', 65),
(509, '520H0438', 'Đỗ Thanh', 'Tuấn', '520H0438@student.tdtu.edu.vn', 65),
(510, '520H0093', 'Phan Phi', 'Long', '520H0093@student.tdtu.edu.vn', 65),
(511, '520H0570', 'Trịnh Nguyễn Anh', 'Quân', '520H0570@student.tdtu.edu.vn', 65),
(512, '520H0586', 'Mai Phước', 'Tín', '520H0586@student.tdtu.edu.vn', 65),
(513, '520H0592', 'Trần Ngọc', 'Tú', '520H0592@student.tdtu.edu.vn', 65),
(514, '518H0550', 'Trần Công', 'Phú', '518H0550@student.tdtu.edu.vn', 65),
(515, '518H0276', 'Cù Đình', 'Thi', '518H0276@student.tdtu.edu.vn', 65),
(516, '518H0589', 'Trần Đình Anh', 'Vũ', '518H0589@student.tdtu.edu.vn', 65),
(517, '518H0506', 'Đỗ Mai', 'Hương', '518H0506@student.tdtu.edu.vn', 65),
(518, '518H0537', 'Nguyễn Trần Hoàng', 'Minh', '518H0537@student.tdtu.edu.vn', 65),
(519, '518H0269', 'Nguyễn Văn', 'Thạch', '518H0269@student.tdtu.edu.vn', 65),
(520, '518H0474', 'Mai Duy', 'Bảo', '518H0474@student.tdtu.edu.vn', 65),
(521, '518H0138', 'Nguyễn Hoàng', 'Bảo', '518H0138@student.tdtu.edu.vn', 65),
(522, '518H0321', 'Huỳnh Nhựt', 'An', '518H0321@student.tdtu.edu.vn', 65),
(523, '518H0078', 'Nguyễn Quốc', 'An', '518H0078@student.tdtu.edu.vn', 65),
(524, '51800854', 'Lê Anh', 'Đoàn', '51800854@student.tdtu.edu.vn', 65),
(525, '518H0105', 'Trần Hoàng', 'Long', '518H0105@student.tdtu.edu.vn', 65),
(526, '518H0399', 'Nguyễn Thị Bạch', 'Mai', '518H0399@student.tdtu.edu.vn', 65),
(527, '518H0406', 'Nguyễn Hoàng', 'Nam', '518H0406@student.tdtu.edu.vn', 65),
(528, '518H0672', 'Phạm Như', 'Thuần', '518H0672@student.tdtu.edu.vn', 65),
(529, '518H0593', 'Lý Lý', 'Anh', '518H0593@student.tdtu.edu.vn', 65),
(530, '518H0607', 'Hoàng Hữu', 'Đông', '518H0607@student.tdtu.edu.vn', 65),
(531, '518H0627', 'Lê Đinh Quang', 'Huy', '518H0627@student.tdtu.edu.vn', 65),
(532, '518H0376', 'Huỳnh Anh', 'Khôi', '518H0376@student.tdtu.edu.vn', 65),
(533, '518H0639', 'Nguyễn Đình', 'Khôi', '518H0639@student.tdtu.edu.vn', 65),
(534, '518H0645', 'Nguyễn Tấn', 'Lộc', '518H0645@student.tdtu.edu.vn', 65),
(535, '518H0404', 'Trần Phạm Thanh', 'Minh', '518H0404@student.tdtu.edu.vn', 65),
(536, '518H0114', 'Lê Tấn', 'Tài', '518H0114@student.tdtu.edu.vn', 65),
(537, '518H0372', 'Nguyễn Thành', 'Khang', '518H0372@student.tdtu.edu.vn', 65),
(538, '519H0144', 'Vũ Huy', 'Chương', '519H0144@student.tdtu.edu.vn', 65),
(539, '519H0323', 'Đoàn Văn', 'Nghĩa', '519H0323@student.tdtu.edu.vn', 65),
(541, '﻿517H0054', 'Hoàng Tuấn', 'Huy', '517H0054@student.tdtu.edu.vn', 65),
(542, '517H0146', 'Trần Công Quang', 'Minh', '517H0146@student.tdtu.edu.vn', 65),
(543, '517H0172', 'Nguyễn Xuân', 'Trình', '517H0172@student.tdtu.edu.vn', 65),
(544, '517H0175', 'Trương Thị', 'Trường', '517H0175@student.tdtu.edu.vn', 65),
(545, '518H0522', 'Phạm Hữu', 'Khôi', '518H0522@student.tdtu.edu.vn', 65),
(546, '518H0042', 'Trần Quốc', 'Nguyên', '518H0042@student.tdtu.edu.vn', 65),
(547, '518H0043', 'Trần Hồng', 'Nhung', '518H0043@student.tdtu.edu.vn', 65),
(548, '518H0491', 'Nguyễn Thanh', 'Hà', '518H0491@student.tdtu.edu.vn', 65),
(549, '518H0050', 'Nguyễn Văn', 'Tài', '518H0050@student.tdtu.edu.vn', 65),
(550, '518H0062', 'Nguyễn Thị Minh', 'Thư', '518H0062@student.tdtu.edu.vn', 65),
(551, 'E1701345', 'Trần Lê Thị Ngọc', 'Nguyên', 'E1701345@student.tdtu.edu.vn', 66),
(552, 'B1701253', 'Phạm Thị', 'Thảo', 'B1701253@student.tdtu.edu.vn', 66),
(553, '51800223', 'Nguyễn Thị Quỳnh', 'Như', '51800223@student.tdtu.edu.vn', 66),
(554, 'B1701212', 'Nguyễn Thị Tuyết', 'Nhi', 'B1701212@student.tdtu.edu.vn', 66),
(555, '71706119', 'Nguyễn Thị Huỳnh', 'Như', '71706119@student.tdtu.edu.vn', 66),
(556, '31801066', 'Phạm Văn', 'Lành', '31801066@student.tdtu.edu.vn', 66),
(557, '21800555', 'Nguyễn Mai', 'Thanh', '21800555@student.tdtu.edu.vn', 66),
(558, '61801024', 'Chu Thị Thanh', 'Vy', '61801024@student.tdtu.edu.vn', 66),
(559, '31801050', 'Đặng Thị Hòa', 'Hợp', '31801050@student.tdtu.edu.vn', 66),
(560, '21606087', 'Hồ Như', 'Quỳnh', '21606087@student.tdtu.edu.vn', 66),
(561, '﻿E1701345', 'Trần Lê Thị Ngọc', 'Nguyên', 'E1701345@student.tdtu.edu.vn', 40),
(562, 'B1701253', 'Phạm Thị', 'Thảo', 'B1701253@student.tdtu.edu.vn', 40),
(563, '51800223', 'Nguyễn Thị Quỳnh', 'Như', '51800223@student.tdtu.edu.vn', 40),
(564, 'B1701212', 'Nguyễn Thị Tuyết', 'Nhi', 'B1701212@student.tdtu.edu.vn', 40),
(565, '71706119', 'Nguyễn Thị Huỳnh', 'Như', '71706119@student.tdtu.edu.vn', 40),
(566, '31801066', 'Phạm Văn', 'Lành', '31801066@student.tdtu.edu.vn', 40),
(567, '21800555', 'Nguyễn Mai', 'Thanh', '21800555@student.tdtu.edu.vn', 40),
(568, '61801024', 'Chu Thị Thanh', 'Vy', '61801024@student.tdtu.edu.vn', 40),
(569, '31801050', 'Đặng Thị Hòa', 'Hợp', '31801050@student.tdtu.edu.vn', 40),
(570, '21606087', 'Hồ Như', 'Quỳnh', '21606087@student.tdtu.edu.vn', 40),
(571, 'E1701598', 'Lê Thị Mỹ', 'Lý', 'E1701598@student.tdtu.edu.vn', 40),
(572, 'H1900050', 'Trần Vĩnh', 'Hà', 'H1900050@student.tdtu.edu.vn', 40),
(573, 'H1900067', 'Võ Thị Kim', 'Huệ', 'H1900067@student.tdtu.edu.vn', 40),
(574, 'H1900070', 'Phạm Thị', 'Hương', 'H1900070@student.tdtu.edu.vn', 40),
(575, 'H1900131', 'Lê Thị Hồng', 'Nhung', 'H1900131@student.tdtu.edu.vn', 40),
(576, 'H1900148', 'Trần Thy', 'Phượng', 'H1900148@student.tdtu.edu.vn', 40),
(577, 'H1900167', 'Nguyễn Thúy', 'Thanh', 'H1900167@student.tdtu.edu.vn', 40),
(578, 'H1900250', 'Thạch Thị Thúy', 'An', 'H1900250@student.tdtu.edu.vn', 40),
(579, 'H1900284', 'Phạm Hoàng', 'Linh', 'H1900284@student.tdtu.edu.vn', 40),
(580, 'H1900341', 'Bùi Mỹ', 'Uyên', 'H1900341@student.tdtu.edu.vn', 40),
(581, 'B20H0539', 'Trần Nguyễn Yến', 'My', 'B20H0539@student.tdtu.edu.vn', 40),
(582, 'B20H0560', 'Nguyễn Thành', 'Nhân', 'B20H0560@student.tdtu.edu.vn', 40),
(583, 'B20H0599', 'Trần Phúc', 'Thiên', 'B20H0599@student.tdtu.edu.vn', 40),
(584, 'C1703009', 'Dương Trần', 'Chí', 'C1703009@student.tdtu.edu.vn', 40),
(585, 'C1800014', 'Đào Thiện Đăng', 'Khoa', 'C1800014@student.tdtu.edu.vn', 40),
(586, 'C1800252', 'Nguyễn Lê Thanh', 'Hiền', 'C1800252@student.tdtu.edu.vn', 40),
(587, 'C1800269', 'Nguyễn Tấn', 'Qui', 'C1800269@student.tdtu.edu.vn', 40),
(588, 'C1900018', 'Nguyễn Thị Hồng', 'Loan', 'C1900018@student.tdtu.edu.vn', 40),
(645, '62000326', 'Nguyễn Ngọc Thanh', 'Vy', '62000326@student.tdtu.edu.vn', 40),
(646, '62000728', 'Lý Phước', 'Tài', '62000728@student.tdtu.edu.vn', 40),
(647, '62000773', 'Nguyễn Đào Đức', 'Duy', '62000773@student.tdtu.edu.vn', 40),
(648, '62000818', 'Nguyễn Minh', 'Luân', '62000818@student.tdtu.edu.vn', 40),
(649, '62000881', 'Trần Thị Trúc', 'Sương', '62000881@student.tdtu.edu.vn', 40),
(650, '62000882', 'Nguyễn Tấn', 'Tài', '62000882@student.tdtu.edu.vn', 40),
(651, '62000942', 'Nguyễn Hoàng Thảo', 'Uyên', '62000942@student.tdtu.edu.vn', 40),
(652, '62001013', 'Nguyễn Thị Huỳnh', 'Ngân', '62001013@student.tdtu.edu.vn', 40),
(653, '62001055', 'Phan Phương', 'Thảo', '62001055@student.tdtu.edu.vn', 40),
(654, '620H0271', 'Tăng Quốc', 'Kỳ', '620H0271@student.tdtu.edu.vn', 40),
(655, '22000406', 'Lê Hồng', 'Phúc', '22000406@student.tdtu.edu.vn', 40),
(656, '22000423', 'Trần Thảo', 'Trân', '22000423@student.tdtu.edu.vn', 40),
(657, '220H0069', 'Nguyễn Mai Ngọc', 'Ngân', '220H0069@student.tdtu.edu.vn', 40),
(658, '220H0266', 'Nguyễn Hoài Vân', 'Thanh', '220H0266@student.tdtu.edu.vn', 40),
(659, '220H0495', 'Lưu Ngọc Tường', 'Vi', '220H0495@student.tdtu.edu.vn', 40),
(660, '31703106', 'Trần Khánh', 'Linh', '31703106@student.tdtu.edu.vn', 40),
(661, '31704028', 'Nguyễn Thanh', 'Hòa', '31704028@student.tdtu.edu.vn', 40),
(662, '317H0029', 'Ngô Ngọc Kim', 'Tuyền', '317H0029@student.tdtu.edu.vn', 40),
(663, '317H0077', 'Nguyễn Hồ Thu', 'Hiền', '317H0077@student.tdtu.edu.vn', 40),
(664, '31800439', 'Lê Hữu', 'Thắng', '31800439@student.tdtu.edu.vn', 40),
(665, 'E1701345', 'Trần Lê Thị Ngọc', 'Nguyên', 'E1701345@student.tdtu.edu.vn', 30),
(666, 'B1701253', 'Phạm Thị', 'Thảo', 'B1701253@student.tdtu.edu.vn', 30),
(667, '51800223', 'Nguyễn Thị Quỳnh', 'Như', '51800223@student.tdtu.edu.vn', 30),
(668, 'B1701212', 'Nguyễn Thị Tuyết', 'Nhi', 'B1701212@student.tdtu.edu.vn', 30),
(669, '71706119', 'Nguyễn Thị Huỳnh', 'Như', '71706119@student.tdtu.edu.vn', 30),
(670, '31801066', 'Phạm Văn', 'Lành', '31801066@student.tdtu.edu.vn', 30),
(671, '21800555', 'Nguyễn Mai', 'Thanh', '21800555@student.tdtu.edu.vn', 30),
(672, '61801024', 'Chu Thị Thanh', 'Vy', '61801024@student.tdtu.edu.vn', 30),
(673, '31801050', 'Đặng Thị Hòa', 'Hợp', '31801050@student.tdtu.edu.vn', 30),
(674, '21606087', 'Hồ Như', 'Quỳnh', '21606087@student.tdtu.edu.vn', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_users`
--

CREATE TABLE `table_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `reset_token` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` set('teacher','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_users`
--

INSERT INTO `table_users` (`user_id`, `fullname`, `email`, `password`, `department`, `phone_number`, `reset_token`, `role`) VALUES
(34, 'Nguyễn Thị Bạch Mai', 'ntbmmai865740@gmail.com', '1bbd886460827015e5d605ed44252251', 'Khoa Quản Trị Kinh Doanh', '0969004099', '2187ed7f4961547ac2f273186b244990', 'teacher'),
(35, 'Đặng Minh Thắng', 'minhthang@tdtu.edu.vn', '1bbd886460827015e5d605ed44252251', 'Khoa Công Nghệ Thông Tin', '0969004098', NULL, 'teacher'),
(36, 'Lê Tấn Tài', 'tantai247@gmail.com', '1bbd886460827015e5d605ed44252251', 'Khoa Công Nghệ Thông Tin', '0969004098', 'e36624b7263b6900f874ebc85efc3a9d', 'teacher'),
(44, 'Trần Hoàng Long', 'trlong357@gmail.com', '1bbd886460827015e5d605ed44252251', 'Khoa Toán - Thống Kê', '0969004123', '3e5e1b4faa46a6c3429935c95cd6d060', 'teacher'),
(45, 'Admin', 'dev.tailetan@gmail.com', '1bbd886460827015e5d605ed44252251', 'Tổ Phần Mềm TDTU', '0969004098', NULL, 'admin'),
(47, 'Admin1', 'admin1@tdtu.edu.vn', '1bbd886460827015e5d605ed44252251', 'Tổ Phần Mềm TDTU', '0969004000', NULL, 'admin'),
(48, 'Admin2', 'admin2@tdtu.edu.vn', '1bbd886460827015e5d605ed44252251', 'Tổ Phần Mềm TDTU', '0969004001', NULL, 'teacher'),
(73, 'Huỳnh Nhi', 'huynhnhi@gmail.com', '1bbd886460827015e5d605ed44252251', 'Khoa Quản Trị Kinh Doanh', '0854362458', NULL, 'teacher'),
(74, 'Nguyễn Thị Bích Loan', 'bichloan@gmail.com', '1bbd886460827015e5d605ed44252251', 'Khoa Luật', '0969004005', NULL, 'teacher'),
(75, 'Admin', 'admintdt@tdtu.edu.vn', '1bbd886460827015e5d605ed44252251', 'Tổ Phần Mềm TDTU', '0969004098', NULL, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_attendance`
--
ALTER TABLE `table_attendance`
  ADD PRIMARY KEY (`lesson_id`,`student_id`),
  ADD KEY `FK_attendance_student` (`student_id`);

--
-- Chỉ mục cho bảng `table_class`
--
ALTER TABLE `table_class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `FK_class_user` (`user_id`);

--
-- Chỉ mục cho bảng `table_lesson`
--
ALTER TABLE `table_lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `FK_lesson_class` (`class_id`);

--
-- Chỉ mục cho bảng `table_student`
--
ALTER TABLE `table_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_class_student` (`class_id`);

--
-- Chỉ mục cho bảng `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_class`
--
ALTER TABLE `table_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `table_student`
--
ALTER TABLE `table_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT cho bảng `table_users`
--
ALTER TABLE `table_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `table_attendance`
--
ALTER TABLE `table_attendance`
  ADD CONSTRAINT `FK_attendance_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `table_lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_attendance_student` FOREIGN KEY (`student_id`) REFERENCES `table_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `table_class`
--
ALTER TABLE `table_class`
  ADD CONSTRAINT `FK_class_user` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `table_lesson`
--
ALTER TABLE `table_lesson`
  ADD CONSTRAINT `FK_lesson_class` FOREIGN KEY (`class_id`) REFERENCES `table_class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `table_student`
--
ALTER TABLE `table_student`
  ADD CONSTRAINT `FK_class_student` FOREIGN KEY (`class_id`) REFERENCES `table_class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
