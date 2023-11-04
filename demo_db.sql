-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2022 lúc 12:37 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES
(4, 68, 'uploads/08-12-2022/c91d79010b7e5a2c9a51442db2b25cc2.jpg', 1670475244, 1670475244),
(5, 69, 'uploads/08-12-2022/d5f37e6b8e287e15ba0130968484adc7(1)(1).jpg', 1670476089, 1670476089),
(6, 70, 'uploads/08-12-2022/b6b39af79d70e7660b68bae950140298.jpg', 1670476508, 1670476508),
(7, 71, 'uploads/08-12-2022/747a4213e7540701d058edea3052a475_tn.jpg', 1670476615, 1670476615),
(8, 73, 'uploads/08-12-2022/tmpphp5rvdb6-1639540459.jpg', 1670478164, 1670478164),
(9, 74, 'uploads/08-12-2022/2.jpg', 1670478245, 1670478245),
(10, 75, 'uploads/08-12-2022/23c3468c0755fe65dc0d380579ebf0d3.jpg', 1670478397, 1670478397),
(11, 76, 'uploads/08-12-2022/f4716fcea1ec68ea0d6f96e69ac36561.jpg', 1670478542, 1670478542),
(12, 78, 'uploads/08-12-2022/IMG_9874.jpg', 1670478989, 1670478989),
(13, 80, 'uploads/08-12-2022/bd2273f3f0d6a864b0316e9feb211ee7.jpg', 1670479536, 1670479536),
(14, 81, 'uploads/08-12-2022/3mvPfg.jpeg', 1670479708, 1670479708),
(15, 82, 'uploads/08-12-2022/T261Y_XbdbXXXXXXXX_!!1734331216.jpg', 1670480438, 1670480438),
(16, 84, 'uploads/08-12-2022/4f5924c0e9bef59a71b741b812517d25.jpg', 1670480711, 1670480711),
(17, 85, 'uploads/08-12-2022/may_khoan_cham_khac___TOLSEN_79555_sieu_cho_co_khi.jpeg', 1670480803, 1670480803),
(18, 87, 'uploads/08-12-2022/dau-nhot-mobil1-usa-946ml-5w30-1647400147.jpg', 1670482375, 1670482375),
(19, 88, 'uploads/08-12-2022/6035abf23055244a967cb51c98c16886.jpg', 1670482507, 1670482507),
(20, 90, 'uploads/08-12-2022/4-may-mai-goc-800w-dca-asm06-100-s1m-ff05-100b.jpeg', 1670482688, 1670482688),
(21, 91, 'uploads/08-12-2022/may-mai-goc-makitamt954-sieu-cho-co-khi.jpg', 1670482753, 1670482753),
(22, 92, 'uploads/08-12-2022/fb077463d9578bc764e486bddee2cc40.jpg', 1670482860, 1670482860),
(23, 93, 'uploads/08-12-2022/515c770af0340a6a5325.jpg', 1670482918, 1670482918),
(24, 94, 'uploads/08-12-2022/4bce02195c4d2076c2ccd1e836a03afe-min.jpg', 1670483434, 1670483434),
(25, 96, 'uploads/08-12-2022/bbaaef543c4b3ed3c34e76b7ae9e3af7.jpg', 1670483676, 1670483676),
(26, 97, 'uploads/08-12-2022/14bd5782fb3a03645a2b.jpg', 1670483783, 1670483783),
(27, 98, 'uploads/08-12-2022/nhip-gap-linh-kien-mui-bang-asaki-ak-9193_(1).jpg', 1670483848, 1670483848),
(28, 100, 'uploads/08-12-2022/tmpphpd97ih4-1651203700.png', 1670484000, 1670484000),
(29, 102, 'uploads/08-12-2022/917808bebe0bee6bc6fa64e9b5458107.jpg', 1670484194, 1670484194),
(30, 103, 'uploads/08-12-2022/c48294639051429a9e7c35d69dd65772.jpg', 1670484278, 1670484278),
(31, 104, 'uploads/08-12-2022/i3y8rQ_simg_de2fe0_500x500_maxb.jpg', 1670484344, 1670484344),
(32, 106, 'uploads/08-12-2022/bc1b29645ee5c7a348559b835607ddfd_tn_(1).jpg', 1670484446, 1670484446),
(33, 107, 'uploads/08-12-2022/GCS45185-2.jpg', 1670484490, 1670484490);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `position`, `created_time`, `last_updated`) VALUES
(4, 0, 'Level 1', 'home2.php', 0, 1555232698, 1555232698),
(5, 4, 'Level 2', 'product.php', 1, 1555232976, 1555232976),
(6, 5, 'Level 3', 'product.php', 0, 1555232976, 1555232976),
(7, 6, 'Level 4', 'home.php', 0, 1555232976, 1555232976),
(8, 4, 'Level 2.2', 'product.php', 2, 1555232976, 1555232976),
(9, 8, 'Level 3.2', 'product.php', 1, 1555427808, 1555427808),
(10, 7, 'Level 5', 'home.php', 0, 1555427808, 1555427808),
(16, 0, 'Level 1.2', 'home2.php', 1, 1555232698, 1555232698),
(17, 10, 'Level 6', '#', 1, 1555542591, 1555542591),
(20, 17, 'Level 7', '#', 1, 1555542591, 1555542591),
(21, 16, 'Level 2.2.2', 'home2.php', 1, 1555232698, 1555232698);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `pay_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES
(67, 'abc', '0123456789', 'tphcm', '', 300000, 1669065416, 1669065416),
(68, 'Tiến Phan Quang', '0971876233', 'abc', '', 300000, 1669065602, 1669065602),
(69, 'Tiến Phan Quangabc', '0123456789', 'abc', '', 2657000, 1669262295, 1669262295),
(71, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 39710000, 1669283598, 1669283598),
(72, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 4314000, 1669286074, 1669286074),
(73, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2971000, 1669286130, 1669286130),
(74, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 4500000, 1669286248, 1669286248),
(75, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 1500000, 1669286595, 1669286595),
(76, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 1971000, 1669286700, 1669286700),
(77, 'abc', '799150991', 'TPHCM', '', 300000, 1670496146, 1670496146),
(78, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2431570, 1670553549, 1670553549),
(79, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2431570, 1670553613, 1670553613),
(80, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2431570, 1670553663, 1670553663),
(81, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2431570, 1670553693, 1670553693),
(82, 'Phan Quang Tiến', '971876233', 'TPHCM', '', 2431570, 1670553720, 1670553720),
(83, 'abc', '799150991', 'TPHCM', '', 5627030, 1670553944, 1670553944),
(84, 'abc', '799150991', 'TPHCM', '', 275205, 1670568104, 1670568104),
(85, 'Ngô Trọng Nhân', '09812541', 'TPHCM', '', 275205, 1670568189, 1670568189),
(86, 'Ngô Trọng Nhân', '01233', 'number', 'aewfqwefawwaw', 0, 1671708729, 1671708729),
(87, 'Ngô Trọng Nhân', '032323', 'number', '', 550410, 1671708795, 1671708795);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES
(92, 67, 59, 1, 300000, 1669065416, 1669065416),
(93, 68, 59, 1, 300000, 1669065602, 1669065602),
(94, 69, 21, 1, 657000, 1669262295, 1669262295),
(95, 69, 67, 1, 2000000, 1669262295, 1669262295),
(97, 71, 21, 30, 657000, 1669283598, 1669283598),
(98, 71, 23, 20, 1000000, 1669283598, 1669283598),
(99, 72, 21, 2, 657000, 1669286074, 1669286074),
(100, 72, 23, 3, 1000000, 1669286074, 1669286074),
(101, 73, 21, 3, 657000, 1669286130, 1669286130),
(102, 73, 23, 1, 1000000, 1669286130, 1669286130),
(103, 74, 59, 5, 300000, 1669286248, 1669286248),
(104, 74, 66, 2, 1500000, 1669286248, 1669286248),
(105, 75, 66, 1, 1500000, 1669286595, 1669286595),
(106, 76, 21, 3, 657000, 1669286700, 1669286700),
(107, 77, 59, 1, 300000, 1670496146, 1670496146),
(108, 78, 91, 1, 2431570, 1670553549, 1670553549),
(109, 79, 91, 1, 2431570, 1670553613, 1670553613),
(110, 80, 91, 1, 2431570, 1670553663, 1670553663),
(111, 81, 91, 1, 2431570, 1670553693, 1670553693),
(112, 82, 91, 1, 2431570, 1670553720, 1670553720),
(113, 83, 64, 1, 1300000, 1670553944, 1670553944),
(114, 83, 88, 1, 1964230, 1670553944, 1670553944),
(115, 83, 106, 1, 2362800, 1670553944, 1670553944),
(116, 84, 69, 1, 275205, 1670568104, 1670568104),
(117, 85, 69, 1, 275205, 1670568189, 1670568189),
(118, 86, 69, 2, 275205, 1671708729, 1671708729),
(119, 87, 69, 2, 275205, 1671708795, 1671708795);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `privilege`
--

INSERT INTO `privilege` (`id`, `group_id`, `name`, `url_match`, `created_time`, `last_updated`) VALUES
(1, 1, 'Danh sách sản phẩm', 'product_listing\\.php$', 1553185530, 1553185530),
(2, 1, 'Xóa sản phẩm', 'product_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(3, 1, 'Sửa sản phẩm', 'product_editing\\.php\\?id=\\d+$|product_editing\\.php\\?action=edit&id=\\d+$', 1553185530, 1553185530),
(4, 1, 'ThÃªm sáº£n pháº©m', 'product_editing\\.php$|product_editing\\.php\\?action=add$', 1553185530, 1553185530),
(5, 1, 'Copy sáº£n pháº©m', 'product_editing\\.php\\?id=\\d+&task=copy', 1553185530, 1553185530),
(6, 4, 'Danh sÃ¡ch danh má»¥c', 'menu_listing\\.php$', 1553185530, 1553185530),
(7, 4, 'XÃ³a danh má»¥c', 'menu_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(8, 4, 'Sá»­a danh má»¥c', 'menu_editing\\.php\\?id=\\d+$', 1553185530, 1553185530),
(9, 4, 'ThÃªm danh má»¥c', 'menu_editing\\.php$', 1553185530, 1553185530),
(10, 4, 'Copy danh má»¥c', 'menu_editing\\.php\\?id=\\d+&task=copy', 1553185530, 1553185530),
(11, 3, 'Danh sÃ¡ch Ä‘Æ¡n hÃ ng', 'order_listing\\.php$', 1553185530, 1553185530),
(12, 2, 'PhÃ¢n quyá»n quáº£n trá»‹', 'member_privilege\\.php\\?id=\\d+$|member_privilege\\.php\\?action=save$', 1553185530, 1553185530),
(13, 2, 'danh sách thành viên', 'member_listing\\.php$', 1553185530, 1553185530),
(14, 2, 'xóa thành viên', 'member_delete\\.php\\?id=\\d+$', 1553185530, 1553185530),
(15, 2, 'sửa thành viên', 'member_editing\\.php\\?id=\\d+$|member_editing\\.php\\?action=edit&id=\\d+$', 1553185530, 1553185530),
(16, 2, 'thêm thành viên', 'member_editing\\.php$|member_editing\\.php\\?action=add$', 1553185530, 1553185530);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege_group`
--

CREATE TABLE `privilege_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `name`, `position`, `created_time`, `last_updated`) VALUES
(1, 'Sáº£n pháº©m', 2, 1553185530, 1553185530),
(2, 'ThÃ nh viÃªn', 4, 1553185530, 1553185530),
(3, 'ÄÆ¡n hÃ ng', 3, 1553185530, 1553185530),
(4, 'Danh má»¥c', 1, 1553185530, 1553185530);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text NOT NULL,
  `mieuta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noibat` int(1) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `quantity`, `loai`, `content`, `mieuta`, `noibat`, `created_time`, `last_updated`) VALUES
(21, 'Máy Cưa', 'uploads/09-11-2022/nganhmoc2.jpg', 657000, 97, 'NGÀNH MỘC', '\r\n', '', 0, 1552615987, 1669286680),
(23, 'Máy Cưa', 'uploads/09-11-2022/nganhmoc1.jpg', 1000000, 100, 'NGÀNH MỘC', '', '', 0, 1552615987, 1669286688),
(59, 'máy khoan', 'uploads/09-11-2022/maykhoan1.jpg', 300000, 99, 'MÁY KHOAN', '', '', 0, 1667989909, 1669286754),
(60, 'máy khoan', 'uploads/09-11-2022/maykhoan2.jpg', 500000, 100, 'MÁY KHOAN', '', '', 0, 1667989968, 1669286748),
(61, 'máy khoan', 'uploads/09-11-2022/maykhoan3.jpg', 400000, 100, 'máy khoan', '', '', 0, 1667990014, 1669286742),
(62, 'máy mài', 'uploads/09-11-2022/maymai1.jpg', 450000, 100, 'MÁY MÀI', '', '', 0, 1667991198, 1669286736),
(63, 'máy phát điện', 'uploads/09-11-2022/mayphatdien.jpg', 1000000, 100, 'MÁY PHÁT ĐIỆN', '', '', 0, 1667991246, 1669286671),
(64, 'máy phát điện', 'uploads/09-11-2022/mayphatdien1.jpg', 1300000, 0, 'MÁY PHÁT ĐIỆN', '', '', 0, 1667991265, 1669286664),
(65, 'Máy hàn điện tử', 'uploads/09-11-2022/mayhandientu1.jpg', 1200000, 100, 'MÁY HÀN ĐIỆN TỬ', '', '', 0, 1667993833, 1669286656),
(66, 'Máy hàn điện tử', 'uploads/09-11-2022/mayhandientu3.jpg', 1500000, 100, 'MÁY HÀN ĐIỆN TỬ', '', '', 0, 1667993866, 1669286767),
(67, 'máy khoan dùng pin', 'uploads/09-11-2022/thietbidungpin1.jpg', 2000000, 100, 'THIẾT BỊ DÙNG PIN', '', '', 0, 1668000462, 1669286643),
(68, 'Máy khoan pin dùng pin Lithum 12V Ingco CDLI1211 kèm1 pin + 1 sạc', 'uploads/08-12-2022/may-khoan-pin-dung-pin-lithum-ingco-cdli1211-12v-1610536609.jpg', 832000, 100, 'thiết bị dùng pin', '', 'Điện thế khoan :12V, \r\nTốc độ không tải :0-600/min, \r\nLực mô men quay tối đa :20NM\r\nKhả năng khoan tối đa: 0.8- 10mm, Điều chỉnh xoắn:15+1,\r\nDung lượng pin Li-ion: 12V /1.5Ah, \r\nKèm theo 1 pin và 1 sạc, mỗi pin sạc trong 2h\r\nĐiện thế sạc: 100V-240V~50/60Hz, Có 1 mũi Cr-V 65mm, pin có đèn LED hiển thị dung lượng của pin.,0,', 1, 1670475244, 1670481125),
(69, 'MÂM XOAY 200 x 200MM CHO NGÀNH MỘC', 'uploads/08-12-2022/2b6ee52357152e88d109ebe78af2904b(1)(1).jpg', 275205, 96, 'Ngành mộc', '', '- Sản phầm là mâm xoay ghế, là 1 phụ kiện trong nội thất, dùng làm các ghế xoay văn phòng, ghế xoay của quán,...nhằm tăng tính thẩm mỹ cho sản phẩm và nhiều công dụng khác tùy vào mục đích sử dụng của khách hàng.\r\n\r\n- Sản phẩm dùng cho các loại sản phẩm ngành gỗ, điêu khắc, đục chạm,thiết kế nội thất,...\r\n\r\n- Chức năng: xoay tự do 360 độ nhờ vào rãnh bi, xoay êm ái , cho tuổi thọ cao.\r\n\r\n- Công dụng: xoay bàn TV, bàn ăn, kệ VCD, bàn làm việc, ghế đẩu, bàn xoay màu kẽm trắng được ứng dụng trong đồ trang sức nhỏ (chẳng hạn như hộp quà xoay, vv) hoặc ghế  sofa, giường thong minh,  các ứng dụng lớn trong gương xoay, tủ giày xoay, giá sách xoay,...,0,', 1, 1670476089, 1670478814),
(70, 'Máy Cưa Xích ( nâng cấp từ TG945185) total tg5451811', 'uploads/08-12-2022/Fact-depot-May-cua-xich-Total-TG945185-1-8-KW-1.png', 2522000, 100, 'Ngành mộc', '', 'Dung tích xi lanh: 46 cc\r\nCông suất: 1.8 KW\r\nTốc độ không tải 3200 V/P\r\nĐường kính lưỡi cắt: 445mm\r\nDung tích bình nhiên liệu: 550ml\r\nDung tích bình nhiên liệu 260ml\r\nĐông cơ mạnh: 2 Thì\r\nĐóng gói trong hộp màu.\r\nTrọng lượng: 8kg,0,', 1, 1670476508, 1670478805),
(71, 'Máy cưa đĩa tròn dùng pin Lithium 20V (không kèm pin sạc)', 'uploads/08-12-2022/9740462a8178848664c05ef2f42e91ca.jpg', 1860000, 100, 'Ngành mộc', '', 'Mã sản phẩm: TSLI1501\r\nThương hiệu: Total\r\nXuất xứ: Trung Quốc\r\nMODEL NÀY KHÔNG BAO GỒM PIN VÀ SẠC\r\nMáy cưa đĩa dùng pin này sử dụng motor có chổi than\r\nĐiện thế pin: 20V / 2.0Ah\r\nTốc độ không tải: 0 - 3600 vòng/phút\r\nĐường kính lưỡi: 150mm\r\nKhả năng cắt tại góc 45 độ: 33mm 90 độ: 45mm\r\nTrọng lượng: 2kg\r\nBảo hành: 6 tháng,0,', 1, 1670476615, 1670478797),
(72, 'LƯỠI CƯA TCT TOTAL SIZE: 150MM(6″) 60T – TAC2311243T', 'uploads/08-12-2022/14845737a5ca856997c0adcd6e549ed9_tn.jpg', 339000, 100, 'Ngành mộc', '', 'Thông tin chi tiết:\r\n\r\nSize: 150mm(6″)\r\nSố lỗ: 60T\r\nLỗ cốt: 25.4mm\r\nĐộ dày:22.2mm\r\nĐóng gói trong họp màu – 50/T\r\nƯu điểm của LƯỠI CƯA TCT TOTAL SIZE: 150MM(6″) 60T – TAC2311243T:\r\n\r\nLưỡi cưa này có độ ổn định cao, cho đường cắt mịn và phẳng\r\nLưỡi cắt này thường được kết hợp với máy cưa đĩa để cắt và xẻ gỗ thịt, gỗ tấm, gỗ nhân tạo, ván gỗ... \r\nĐộ rung giảm, những đường cắt cực kỳ mượt mà và ít tiếng ồn hơn hẳn,0,', 1, 1670476752, 1670478788),
(73, 'Bộ 6 dũa gỗ mini 180mm', 'uploads/08-12-2022/bo-6-dua-go-mini-180mm-1639540459.jpg', 306000, 100, 'Ngành mộc', '', '_ Chất liệu: thép cacbon cứng\r\n_ Dùng để dũa gỗ, chà nhám bề mặt gỗ\r\n_ Bao gồm 6 loại dũa: dẹt, dẹt đầu nhọn, hình trụ, tam giác, hình vuông và bán nguyệt\r\n_ Tổng chiều dài dũa bao gồm cán: 180mm\r\n_ Chiều dài phần dũa: 80mm,0,', 0, 1670478164, 1670478779),
(74, 'Bộ phụ kiện mài dũa lưỡi cưa dũa cưa mài lưỡi cưa xích', 'uploads/08-12-2022/1.jpg', 213000, 100, 'Ngành mộc', '', 'Bộ phụ kiện mài dũa lưỡi cưa dũa cưa mài lưỡi cưa xích (dùng cho máy mài khuôn)\r\n\r\nXIN LƯU Ý: Bộ sản phẩm không bao gồm máy mài nhé\r\n_ Lưỡi cưa không còn bén, cắt sẽ rất khó khăn, gây hư tổn máy, tổn điện, mất nhiều công thợ, công nhân mệt mỏi, vết cắt xấu.  Vì thế chúng ta cần phải mài nó, nay đã có bộ dụng cụ mài lưỡi cưa thần thánh, giúp bạn giải quyết khó khăn để làm việc một cách hiệu quả và tốt hơn\r\n_ Bộ dụng cụ với thiết kế nhỏ gọn tiện lợi, sử dụng kết hợp với máy mài khuôn, máy mài khắc mini\r\n_ Một bộ bao gồm:\r\n1 cữ mài bằng thép đế nhựa\r\n1 thước đo bằng thép\r\n3 mũi đá mài trục 3mm,0,', 1, 1670478245, 1670494200),
(75, 'Máy khắc chữ, mài, dũa móng loại mini cầm tay mầu trắng', 'uploads/08-12-2022/may-khac-chu-mai-dua-mong-loai-mini-sieu-cho-co-khi.jpg', 136136, 100, 'Ngành mộc', '', 'Máy khắc mài mini cầm tay là dụng cụ nhằm thỏa mãn niềm đam mê sáng tạo trên mọi vật liệu: vỏ trứng, kim loại, thủy tinh, gỗ, mica, nhựa…\r\n\r\nThân máy thiết kế nhỏ gọn vừa tay do đó bạn có thể cầm nó thao tác như cầm một cây bút. Máy khắc mài mini cầm tay là dụng cụ nhằm thỏa mãn niềm đam mê sáng tạo trên mọi vật liệu: vỏ trứng, kim loại, thủy tinh, gỗ, mica, nhựa…\r\n\r\nDo tốc độ quay của máy có thể lên tới trên 20,000 vòng/phút nên các đường nét hoa văn được tạo ra rất sắc nét, mịn mà và tinh xảo. Thân máy thiết kế nhỏ gọn vừa tay do đó bạn có thể cầm nó thao tác như cầm một cây bút.,0,', 0, 1670478397, 1670478733),
(76, 'Tu Vít Đa Năng 2 đầu có (Tăng Đưa) CENTURY - Thép không gỉ cao cấp', 'uploads/08-12-2022/tu-vit-da-nang-2-dau-co-tang-dua-century-sieu-cho-co-khi.jpg', 56000, 100, 'Ngành mộc', '', '- Tu Vít Đa Năng 2 đầu có (Tăng Đưa) CENTURY được chế tạo bằng thép không gỉ cao cấp. Cán được chế tạo bằng nhựa cao cấp\r\n\r\n- Tu Vít Đa Năng 2 đầu có (Tăng Đưa) CENTURY thiết kế gọn, đẹp, tiện dụng. Sử dụng được 2 đầu: bake (ph2) và dẹp (6mm)\r\n\r\n- Có thể tăng giảm độ dài tùy thích từ 100mm đến 150mm, có thể thay đổi kiểu vặn như cần chữ T\r\n\r\n,0,', 1, 1670478542, 1670478727),
(77, 'MÁY CƯA CÀNH TRÊN CAO DÙNG PIN MAKITA (18Vx2) DUA300ZB', 'uploads/08-12-2022/may-cua-canh-tren-cao-dung-pin-makita-18vx2-dua300zb-1658305470.png', 11886900, 100, 'Ngành mộc', '', 'Chiều dài thanh dẫn hướng: 300 mm (12 inch)\r\nChiều dài cắt hiệu quả: 296 mm (11-5 / 8 ″)\r\nChiều dài thanh dẫn hướng được đề xuất: 250 - 300 mm (10 - 12 ″)\r\nChiều dài cắt tối đa: 300 mm (12 inch)\r\nXích cưa: Máy đo: 1.1 / 1.3 mm (0.043 / 0.050 ″)\r\nSân: 3/8 ″\r\nTốc độ chuỗi: 0 - 20,0 m / s (0 - 1.200 m / phút) (0 - 3.940 FPM)\r\nMức áp suất âm thanh: 93 dB (A)\r\nMức công suất âm thanh: 103 dB (A)\r\nMức độ rung Tay cầm bên trái: 2,5 m / s² trở xuống\r\nMức độ rung Tay cầm bên phải: 2,5 m / s² trở xuống\r\nKích thước (Dài x Rộng x Cao):\r\nw / o Thanh dẫn hướng: 2.238 x 155 x 191 mm (88 x 6-1 / 8 x 7-1 / 2 ″)\r\nw / Thanh dẫn hướng & Xích cưa: 2.478 x 155 x 191 mm (97-1 / 2 x 6-1 / 8 x 7-1 / 2 ″)\r\nKhối lượng tịnh : 6,1 - 6,9 kg (13,5 - 15,2 lbs.),0,', 0, 1670478639, 1670478711),
(78, 'Máy khoan búa 13mm DCA 500W AZJ04-13', 'uploads/08-12-2022/unnamed_(11).jpg', 1592070, 100, 'Máy khoan', '', 'Mã sản phẩm: AZJ04-13\r\nNhà sản xuất: DCA\r\nXuất xứ: Đài Loan\r\nCông xuất: 500W\r\nĐiện áp: 220V-50Hz\r\nTốc độ không tải: 0-1200 vòng/phút \r\nKhả năng khoan sắt: 10mm\r\nKhả năng khoan bê tông: 13mm\r\nKhả năng khoan gỗ: 25mm\r\nTrọng lượng: 2.0kg,0,', 1, 1670478989, 1670479365),
(80, '3800W Máy khoan đá DCA AZZ250A', 'uploads/08-12-2022/unnamed_(53).jpg', 9105200, 100, 'máy khoan', '', 'Mã sản phẩm: AZZ250A\r\nThương hiệu: DCA Power Tools\r\nXuất xứ: Trung Quốc\r\nCông suất: 3800W\r\nTốc độ không tải: 580v/p\r\nKhả năng khoan tối đa: 250mm\r\nMáy kèm theo giá đỡ có trục lăn dễ dàng di chuyển\r\nTrọng lượng: 25.5kg,0,', 0, 1670479536, 1670479536),
(81, 'Máy khoan từ 1600W DCA AJC02-23', 'uploads/08-12-2022/ajc23_1_883ba5678e004f58b5accba6f6a4a087_master.jpeg', 10360400, 100, 'máy khoan', '', 'Mã sản phẩm	AJC02-23\r\nThương hiệu	DCA\r\nXuất xứ	Trung Quốc\r\nCông suất	1600W\r\nĐường kính mũi khoan xoắn	23mm\r\nĐường kính mũi khoan ống	50mm\r\nĐiện áp sử dụng	220V- 50Hz\r\nLực từ	15000 N\r\nTốc độ không tải	130-260/260-5200 lần/phút\r\nKhớp nối	MT3\r\nTrọng lượng	24 kg \r\n(Tặng kèm 1 mũi khoan từ Total Φ 24),0,', 0, 1670479708, 1670479708),
(82, 'Máy khoan bê tông 800W DCA AZC38', 'uploads/08-12-2022/f60720f9bf98edd2c3f20a96e817c11a-756_500x490.jpeg', 3888740, 100, 'máy khoan', '', 'Mã sản phẩm	AZC38\r\nNhà sản xuất	DCA\r\nXuất xứ	Đài Loan\r\nCông xuất	800W\r\nĐiện áp	220V-50Hz\r\nTốc độ không tải	0-400 vòng/phút\r\nĐường kính mũi khoan	38mm\r\nTrọng lượng	7.6kg,0,', 0, 1670480438, 1670494326),
(83, 'COMBO MÁY KHOAN VÀ MÁY CƯA KIẾM', 'uploads/08-12-2022/main_9c6483ca7c324a8297a0a030c1e0fd82.jpg', 2332440, 100, 'máy khoan', '', 'MÁY KHOAN DÙNG PIN ADJZ10-10\r\n\r\nDung lượng pin 12V/1.5Ah\r\nĐường kính mũi khoan 6mm\r\nKhoan thép 10mm, khoan gỗ 20mm\r\nTốc độ không tải mức cao 0-1400 v/p, mức thấp 0-350 v/p\r\nTrọng lượng 1kg\r\nMÁY CƯA KIẾM DÙNG PIN ADJF15\r\n\r\nDung lượng pin 12V/1.5Ah\r\nTốc độ không tải 0-3000 v/p\r\nĐường kính lưỡi cưa D50\r\nKhả năng cưa sâu của kim loại 8mm, gỗ 65mm\r\nTrọng lượng 1.3 kg,0,', 0, 1670480596, 1670494355),
(84, 'Máy khoan bàn 350W TOTAL TDP133501', 'uploads/08-12-2022/a115cce3f2a517a2f4c1910cc0485d9e.jpg', 2503930, 100, 'máy khoan', '', 'Điện áp sử dụng: 220-240V~50Hz\r\nNguồn vào: 350W\r\nTốc độ không tải: 620-2620 / phút (50Hz) / 740-3100 / phút (60Hz)\r\nThiết lập tốc độ trục chính: 5\r\nKhả năng khoan tối đa: 13mm\r\nTraval trục chính: 50mm\r\nĐường kính trụ: 46mm\r\nKích thước bàn: 160x160 mm\r\nKích thước đế: 290X190mm\r\nChiều cao của máy: 580mm,0,', 0, 1670480711, 1670480711),
(85, 'Máy mài khuôn mini TOLSEN 79555', 'uploads/08-12-2022/5aba3e72fd227bde2fda13ba3872cdfa.jpeg', 929500, 100, 'máy khoan', '', 'Điện áp sử dụng	220-240V~50/60Hz\r\nNguồn vào	135W\r\nTốc độ không tải	10000-30000/ phút\r\nKích thước kẹp	3.2mm\r\nTrọng lượng	1.96kg,0,', 0, 1670480803, 1670480803),
(86, 'HR2652 MÁY KHOAN ĐA NĂNG VỚI HỆ THỐNG HÚT BỤI', 'uploads/08-12-2022/hr2652-may-khoan-da-nang-voi-he-thong-hut-buichuoi-gai-sds-plus26mm-1659271096.png', 6266260, 100, 'máy khoan', '', 'Lực thổi mỗi phút	0 - 4,600\r\nSức Chứa/Khả Năng Chứa	Our experimental conditions: 2.9 J Concrete : 26 mm (1\") Core Bit: 68 mm (2-11/16\") Diamond Core Bit (Dry Type): 80 mm (3-1/8\") Steel : 13 mm (1/2\") Wood : 32 mm (1-1/4\")\r\nCông Suất Đầu Vào	800W\r\nKích thước (L X W X H)	604x89x260 mm (23-3/4\"x3-1/2\"x10-1/4\")\r\nLưc Đập	EPTA-Procedure 05/2009 : 2.2 J\r\nTrọng Lượng	3 - 4.3 kg (6.7 - 9.4 lbs.)\r\nTốc Độ Không Tải	0 - 1,200\r\nDây Dẫn Điện/Dây Pin	2.5 m (8.2 ft.)\r\nCường độ âm thanh	102 dB(A)\r\nĐộ ồn áp suất	91 dB(A)\r\nĐộ Rung/Tốc Độ Rung	Hammer Drilling into Concrete : 12.5 m/s² Chiselling Funtion w/ Side Grip: 9.5 m/s² Drilling Into Metal : 2.5 m/s²,0,', 0, 1670480926, 1670494248),
(87, 'Dầu Nhớt MOBIL1 USA 946ML (5W30)', 'uploads/08-12-2022/tmpphpiwvx7k-1647400147.jpg', 312000, 100, 'dụng cụ điện, xăng ', '', 'Nhớt tổng hợp cao cấp xe tay ga cao cấp Mobil 1 EP 5W30 946ml (USA)\r\n\r\nMobil1 5w30 Là loại dầu chính thức của Hiệp hội đua xe thương mai Mỹ NASCAR\r\n\r\nDầu chạy rất bốc máy và tiết kiệm nhiên liệu.\r\n\r\nKéo dài hơn tuổi thọ động cơ\r\n\r\nLàm sạch động cơ, giúp động cơ vận hành nhẹ nhàng\r\n\r\nKéo dài tuổi thọ của cơ cấu truyền động supap và ổ đỡ\r\n\r\nKhởi động dễ dàng hơn khi thời tiết lạnh, kéo dài tuổi thọ hệ thống điện\r\n\r\nVới MOBIL1 USA 946ML (0W40) , bạn có thể kéo dài thời gian thay nhớt lên đến 2000 - 3000 km\r\n\r\nTiêu chuẩn kỹ thuật của dầu nhớt MOBIL1 USA 946ML (0W40) :\r\n\r\n-Dầu nhớt tổng hợp nhập 100% từ USA\r\n\r\n- API SN\r\n\r\n- Độ nhớt: 5W30\r\n\r\n- Dung tích nhớt: 946M,0,', 0, 1670482375, 1670482406),
(88, 'MÁY HÀN 250A BOSS', 'uploads/08-12-2022/7d83cb7b66a7c042ccc52ee6c5170f21.jpg', 1964230, 0, 'máy hàn điện tử', '', '- Máy hàn Boss 250A với chế độ bảo hành lên đến 18 Tháng. Máy sử dụng được khi điện yếu (≥ 180V) Tính năng nổi bật tiết kiệm điện năng 50% – 60% so với máy hàn truyền thống. Đồng hồ hiển thị dòng hàn bằng kỹ thuật số tăng hiệu suất làm việc và thời gian hàn không giới hạn. Có chế độ bảo vệ quá nhiệt, quá tải, nguồn điện không ổn định, chế độ chống giật ( 250TP, 315I, 400I). Máy có thể hàn được vật liệu hàn: Sắt, Inox, hàn vật liệu mỏng, mối hàn đẹp. Thiết kế thông minh máy nhỏ gọn giúp việc sử dụng và di chuyển một cách linh hoạt và an toàn.\r\n\r\n- Máy hàn Boss 250A có chế độ bảo vệ quá nhiệt, quá tải và chống giật ở môi trường ẩm ướt.\r\n\r\n- Máy hàn Boss 250A thiết kế nhỏ gọn và nhẹ nhàng giúp chúng ta di chuyển một cách nhẹ nhàng và nhanh chóng.,0,', 0, 1670482507, 1670482507),
(89, 'Nhớt pha 2T ORANGE RACING (0.7)', 'uploads/08-12-2022/nhot-pha-2t-orange-racing-07-1651037297.png', 187500, 100, 'dụng cụ điện, xăng ', '', 'Nhớt pha 2T ORANGE RACING (0.7)\r\n\r\nDùng cho xe 2 thì: Suzuki Sport 120\r\n\r\nSản phẩm chính hãng. Đảm bảo chất lượng\r\n\r\nThương hiệu: Orange\r\n\r\nXuất xứ: Indonesia\r\n\r\nSản phẩm từ shop được nhập khẩu từ Indonesia nên không lo sợ việc hàng nhái và giả\r\n\r\nCần hỗ trợ tư vấn sản phẩm anh em bấm vào chat ngay để shop có thể phản hồi kịp thời.\r\n\r\nShop xe máy với kinh nghiệm nhiều năm bán hàng nhập khẩu phục vụ anh em đam mê tân trang \" Xế Yêu\". Chúng tôi cam kết:\r\n\r\nChính sách hoàn trả nếu sản phẩm không đúng với thương hiệu mô tả.\r\nSản phẩm cam kết chính hãng 100% .\r\nChế độ bảo hành linh hoạt.\r\nĐội ngũ chăm sóc tư vấn sản phẩm cho anh em nhiệt tình. \r\nKiểm tra hàng trước khi thanh toán.\r\nShip COD toàn quốc - nhận hàng thanh toán.,0,', 0, 1670482574, 1670482574),
(90, '800w Máy mài góc 1tấc DCA ASM06-100', 'uploads/08-12-2022/4df69352f2f2387998348504552be945.jpeg', 691600, 100, 'máy mài', '', 'Ưu điểm của Máy mài góc 800W DCA ASM06-100:\r\n\r\nThân máy thiết kế thon dài, dễ cầm nắm bằng một tay với công tắc ngay phía trên giúp người dùng thao tác tiện lợi.\r\n\r\nVành chắn tia lửa tiện lợi giúp bảo vệ tay người dùng,0,', 0, 1670482688, 1670482817),
(91, 'Máy Mài Góc Makita MT954', 'uploads/08-12-2022/may-mai-goc-maktec-mt954.jpg', 2431570, 95, 'máy mài', '', 'Máy mài góc là công cụ thi công ứng dụng trong công nghiệp xây dựng, sửa chữa. Dùng để cắt, mài đá, đánh bóng bề mặt kim loại, có thể thực hiện ở những góc hẹp nhờ thiết kế nhỏ gọn.,0,', 0, 1670482753, 1670494450),
(92, 'MÁY HÀN JASIC MIG MINI 250A', 'uploads/08-12-2022/52c4d0c5b2fa1c5466016346f4a3b175.jpg', 5892680, 100, 'máy hàn điện tử', '', '- Máy hàn JASIC MIG MINI 250A chuyên dùng hàn sắt, thép, tôn, inox\r\n\r\n- Máy hàn JASIC MIG MINI 250A hoạt động ổn định bền bỉ, thiết kế nhỏ gọn và nhẹ nhàng giúp chúng ta di chuyển một cách nhẹ nhàng và nhanh chóng\r\n\r\n- Ưu điểm giá cả phải chăng cho nhu cầu gia đình và những thợ hàn chuyên nghiệp\r\n\r\n- Máy hoạt động tốt và ổn định, không hư vặt công tắc sau 1 thời gian như các dòng máy khác.\r\n\r\n,0,', 0, 1670482860, 1670494486),
(93, 'MÁY MÀI KENMAX 1550W', 'uploads/08-12-2022/93504648b3f4423274d5719687912ed4.jpg', 1335100, 100, 'máy mài', '', 'Kenmax là loại máy mài góc cầm tay với thiết kế rất cứng cáp, kiểu dáng thuôn dài, trọng lượng nhẹ, dễ dàng cầm nắm để làm việc. Đầu máy mài được làm từ kim loại chống gỉ sét, độ hoàn thiện tốt, chống biến dạng khi bị tác động mạnh. Lớp vỏ ngoài của máy mài có khả năng cách điện, cách nhiệt đảm bảo cầm nắm không bị nóng tay, thao tác dứt khoát, an toàn. \r\n\r\nMáy mài góc Kenmax hoạt động với công suất lên tới 1550W giúp làm việc nhanh và hiệu quả hơn. Máy sử dụng loại đá mài có đường kính 150mm giúp mài bề mặt vật liệu nhanh chóng.,0,', 0, 1670482918, 1670482918),
(94, 'Bộ chuyển đổi chân lục giác sang đầu marank dùng cho máy chuyên vít', 'uploads/08-12-2022/bo-chuyen-doi-chan-luc-giac-sang-dau-marank-dung-cho-may-chuyen-vit-sieu-cho-co-khi.jpg', 766584, 100, 'thiết bị đồ gia dụng', '', 'Với bộ chuyển đổi chân lục giác sang đầu marank dùng cho máy chuyên vít vô cùng tiện lợi. Được làm từ chất liệu cao cấp và gia công tỉ mỉ, bộ đầu chuyển có độ rắn chắc cao, bền bỉ, không biến dạng khi chịu lực cao hay có va chạm mạnh. ,0,', 0, 1670483434, 1670483434),
(95, 'Mũi giáp tròn mài khắc gỗ lũa cán 6mm hoặc Mũi giáp tròn mài khắc gỗ lũa cán 6mm hoặc doa gang nhôm dùng cho máy khoan điện khoan pin doa gang nhôm dồng cho máy khoan điện khoan pin', 'uploads/08-12-2022/Mui-giap-tron-mmai-khac-go-6mm-sieu-cho-co-khi.jpg', 145500, 100, 'thiết bị đồ gia dụng', '', 'Ứng dụng:\r\n\r\nThích hợp để gia công những đồ mô hình, làm thủ công với các mặt hàng chạm, khắc, mài trên hầu như tất cả vật liệu như thép, gỗ, kính, gốm, xương,….,0,', 0, 1670483554, 1670483554),
(96, 'Kìm cắt chân linh kiện điện tử HOBO USA (3 1/2”) - Thép Cr-v không gỉ cao cấp - Hàng chất lượng', 'uploads/08-12-2022/32e3994da503c58ef98c4efe6b7ccdfc.jpg', 79000, 100, 'linh kiện', '', '- Kìm cắt chân linh kiện điện tử HOBO USA (3 1/2”) được làm từ thép nguyên khối, có độ bén cao, tay cầm được bọc nhựa cao cấp giúp chống trơn trượt khi thao tác và cách điện đem lại sự yên tâm cho người dùng.\r\n\r\n- Làm bằng thép sản xuất qua công nghệ xử lý nhiệt hiện đại cho đầu kìm cứng cáp, sắc bén và không bị rỉ sét giúp kìm có tuổi thọ sử dụng lâu dài.,0,', 0, 1670483676, 1670483676),
(97, 'Kìm cắt nhựa, chân linh kiện điện tử hàng cao cấp', 'uploads/08-12-2022/Kìm-cắt-nhựa-FC-120-Nhật-Bản-scaled.jpg', 90000, 100, 'linh kiện', '', 'Làm từ thép hợp kim đã qua xử lý nhiệt với độ cứng cao, chống biến dạng khi sử dụng\r\n\r\nLưỡi kìm nhọn, vát một mặt, sắc bén, một bên đệm miếng nhựa để làm điểm tì đè khi cắt\r\n\r\nLưỡi cắt nghiêng góc 20° cho phép cắt sát chân vật liệu hiệu quả\r\n\r\nTay cầm bọc nhựa có vân sần chống trơn trượt,0,', 0, 1670483783, 1670483783),
(98, 'Nhíp Inox Gắp Linh Kiện Mũi Bằng Asaki ', 'uploads/08-12-2022/nhip-gap-linh-kien-mui-bang-asaki-ak-9193-sieu-cho-co-khi.jpg', 118800, 100, 'linh kiện', '', 'Nhíp Inox Gắp Linh Kiện Mũi Bằng Asaki AK-9193- Mã sản phẩm: AK-9193 – Nhà sản xuất: Asaki – Xuất xứ: Trung Quốc – Quy cách: 120x9x2mm – Chất liệu: Inox,0,', 0, 1670483848, 1670494528),
(99, 'Bộ 250 linh kiện khoan mini', 'uploads/08-12-2022/bo-250-linh-kien-khoan-mini-total-tacsd12501-1658743359.png', 543270, 100, 'linh kiện', '', 'Bộ 250 linh kiện khoan mini Total TACSD12501\r\n\r\n     + 76 Cutting discs (76 đĩa cắt)\r\n     + 60 Sandpaper (60 giấy nhám)\r\n     + 2 Grinding bases (2 mài móng)\r\n     + 10 Stones with a pin (10 Đá bằng một chân)\r\n     + 13 Polishing wheels (13 bánh xe đánh bóng)\r\n     + 9 Sandpaper drums (9 trống cát)\r\n     + 5 Brushes (5 bàn chải)\r\n     + 5 Diamonds (5 viên kim cương)\r\n     + 2 Engraving tips (2 Mẹo khắc)\r\n     + 3 Grinding wheels (3 mài bánh xe)\r\n     + 2 Grinding units (2 Các yếu tố chà nhám)\r\n     + 4 Drills (4 Máy khoan)\r\n     + 4 Chuck (4 Chuck)\r\n     + 1 Wheel flop (1 bánh xe lật)\r\n     + 1 Key (Phím 1)\r\n     + 1 Stone grinding (1 Đá mài)\r\n     + 1 Stinging ointment (1 mỡ bôi trơn)\r\n     + 14 Grinding wheels (14 Mài bánh xe)\r\n     + 1 Plastic carry case (1 Bao đựng bằng nhựa) ,0,', 0, 1670483903, 1670494553),
(100, 'THIẾT BỊ MÀI CHỐT', 'uploads/08-12-2022/thiet-bi-mai-chot-1651203699.jpg', 7200000, 100, 'm', '', 'THÔNG SỐ KỸ THUẬT:\r\n\r\n- Độ chính xác con lăn: 0.005-0.002\r\n\r\n- Độ cứng con lăn: HRC58-62\r\n\r\n- Chiều dài phạm vi kẹp con lăn: 22-100mm\r\n\r\n- Vật liệu con lăn: SUS440\r\n\r\n- Trọng lượng：5.8kg\r\n\r\n=> Chỉ áp dụng ĐỔI sản phẩm nếu LỖI DO NHÀ SẢN XUẤT (không áp dụng cho sản phẩm không bị lỗi), sản phẩm đổi phải còn đầy đủ, nguyên vẹn các linh phụ kiện, tem nhãn ban đầu của nhà sản xuất. Thời gian đổi trả là 3 ngày kể từ lúc nhận hàng\r\n\r\n**KHÔNG HỖ TRỢ DỊCH VỤ LẮP ĐẶT VÀ VẬN HÀNH MÁY.\r\n\r\n******** NHỮNG LƯU Ý KHI SỬ DỤNG MÁY !!!!\r\n\r\n+ Đọc kỹ hướng dẫn, cách sử dụng máy. Trang bị đầy đủ bảo hộ lao động khi làm việc.\r\n\r\n+ Thường xuyên kiểm tra, thay thế các phụ tùng bị hỏng của máy. Nên thay thế các phụ tùng chính hãng, để đảm bảo độ nhạy của máy và sử dụng máy được bền lâu.\r\n\r\n+ Vị trí đặt máy ở những nơi khô ráo, có ánh sáng tốt, tránh những nơi ẩm ướt, có vật liệu dễ gây cháy nổ.,0,', 0, 1670484000, 1670484018),
(101, 'THIẾT BỊ CÂN BẰNG ĐÁ', 'uploads/08-12-2022/thiet-bi-can-bang-da-1655975609.png', 6800000, 100, 'thiết bị đồ gia dụng', '', '=> Chỉ áp dụng ĐỔI sản phẩm nếu LỖI DO NHÀ SẢN XUẤT (không áp dụng cho sản phẩm không bị lỗi), sản phẩm đổi phải còn đầy đủ, nguyên vẹn các linh phụ kiện, tem nhãn ban đầu của nhà sản xuất. Thời gian đổi trả là 3 ngày kể từ lúc nhận hàng\r\n\r\n**KHÔNG HỖ TRỢ DỊCH VỤ LẮP ĐẶT VÀ VẬN HÀNH MÁY.\r\n\r\n******** NHỮNG LƯU Ý KHI SỬ DỤNG MÁY !!!!\r\n\r\n+ Đọc kỹ hướng dẫn, cách sử dụng máy. Trang bị đầy đủ bảo hộ lao động khi làm việc.\r\n\r\n+ Thường xuyên kiểm tra, thay thế các phụ tùng bị hỏng của máy. Nên thay thế các phụ tùng chính hãng, để đảm bảo độ nhạy của máy và sử dụng máy được bền lâu.\r\n\r\n+ Vị trí đặt máy ở những nơi khô ráo, có ánh sáng tốt, tránh những nơi ẩm ướt, có vật liệu dễ gây cháy nổ.,0,', 0, 1670484112, 1670484112),
(102, 'Máy khoan vặn vít không dây Aotuo – máy khoan chạy pin 12V thiết kế bền bỉ và chắc chắn, hiệu suất cao', 'uploads/08-12-2022/may-khoan-van-vit-khong-day-aotuo-sieu-cho-co-khi.jpg', 526500, 100, 'thiết bị dùng pin', '', '⚙ Thiết kế:\r\n\r\n- Thiết kế bền bỉ và chắc chắn, trọng lượng chỉ với 1.2 kg thao tác dễ dàng ở mọi ngóc ngách, đặc biệt với những mũi khoan ở chiều cao quá đầu.\r\n\r\n- Đầu khóa đơn: nhanh hơn, dễ hơn trong việc thay vít, giữ chắt đầu vít hơn.\r\n\r\n-Tay cầm mềm giúp tối ưu việc cầm nắm.\r\n\r\n- Bộ Máy khoan vặn vít không dây aotuo 12V, có nút điều chỉnh tốc độ ngay trên thân máy rất thuận tiện.\r\n\r\n- Chế độ đảo chiều rất đơn giản với 1 nút bấm trên máy, giúp bạn làm được mọi hướng xoay , vặn\r\n\r\n- Có hệ thống đèn led thuận tiện cho những công việc trong điều kiện thiếu ánh sáng dễ dàng hơn\r\n\r\n- Sử dụng Pin Li-ion với công nghệ bảo vệ pin điện tử thông minh ECP bảo vệ pin không bị quá tải, luôn mát trong quá trình vận hành liên tục và không bị thất thoát năng lượng khi sử dụng\r\n\r\n- Hiệu suất cao: Cải tiến 20% mô-men xoắn giúp máy hoạt động mạnh hơn\r\n\r\n,0,', 0, 1670484194, 1670484194),
(103, 'Máy phát điện Hoanda Ec1500Cx chạy bằng xăng, cho điện áp ra luôn ổn định và an toàn cho các thiết bị được cấp điện', 'uploads/08-12-2022/may-phat-dien-honda-ec1500cx-sieu-cho-co-khi.jpg', 7020000, 100, 'thiết bị dùng pin', '', '? Ưu điểm và Công dụng:\r\n\r\n– Máy Phát Điện Honda chạy xăng được sản xuất theo công nghệ hiện đại của Thái Lan, tích hợp với những tính năng ưu việt:\r\n\r\n– Máy phát điện Honda chạy xăng có thể cung cấp điện cho các thiết bị sử dụng trong gia đình như đèn chiếu sáng, quạt gió, nồi cơm, tivi, tủ lạnh, điều hòa.\r\n\r\n– Máy phát điện gia đình Honda được thiết kế với khung chịu lực chắc chắn, chân đệm cao su giảm tối đa rung lắc trong quá trình vận hành.\r\n\r\n– Máy được thiết kế hệ thống bugi đánh lửa hiện đại, hệ thống tự động điều chỉnh điện áp AVR với chức năng đảm bảo điện áp ra luôn ổn định và an toàn cho các thiết bị được cấp điện.,0,', 0, 1670484278, 1670484278),
(104, '12V Máy mài khuôn dùng pin DCA ADSJ10', 'uploads/08-12-2022/94d4cac8366290b2eaef6d0c40672c64.jpg', 1820000, 100, 'thiết bị dùng pin', '', 'Thông số kỹ thuật:\r\n\r\nXuất xứ thương hiệu: Trung Quốc\r\nSản xuất tạị: Trung Quốc\r\nDung lượng pin: 12V/1.5Ah x2\r\nTốc độ mài: 5000-3200 v/p\r\nTốc độ thay đổi của nhông: 1-2-3-4-5-6\r\nĐường kính cốt mài tối đa: 10 mm\r\nTrọng lượng: 0.61 kg\r\nƯu điểm của 12V Máy mài khuôn dùng pin DCA ADSJ10:\r\n\r\nTrọng lượng nhẹ\r\nTay cầm phủ lớp cách điện đảm bảo an toàn\r\nMáy được làm từ các chất liệu cao cấp với độ bền cao.\r\nSử dụng dễ dàng, nhanh chóng và tiện lợi.\r\nBảo quản dễ dàng.,0,', 0, 1670484344, 1670484344),
(105, 'Máy cắt tỉa hàng rào dùng pin Lithium-Ion 20V-450mm CHTLI2001', 'uploads/08-12-2022/163f94f5bca161e72ae00a6f797166c5.jpg', 1060200, 100, 'thiết bị dùng pin', '', 'Thông số kỹ thuật:\r\n\r\nĐiện thế:20V\r\nTốc độ tối đa :1450rpm±10%\r\nChiều dài lưỡi cắt:450mm（18\")\r\nKhoảng cách răng:18mm\r\nKhông bao gồm pin và cục sạc.\r\nƯu điểm của Máy cắt tỉa hàng rào dùng pin Lithium-Ion 20V-450mm CHTLI2001:\r\n\r\nTay cầm chắc chắn\r\nThiết kế nhỏ gọn,0,', 0, 1670484399, 1670484399),
(106, 'Máy cưa xích dùng pin Kason 88V', 'uploads/08-12-2022/530a62054cd341c253bd5727eec3f93e_tn.jpg', 2362800, 99, 'thiết bị dùng pin', '', 'Phụ kiện bao gồm:\r\n\r\nMáy cưa xích dùng pin Kason bảo hành chính hãng 6 tháng tại Bigtools Việt Nam.\r\nCông dụng: Chuyên cưa cành cây, gỗ,... \r\n2 pin 88V (10 cell)\r\n1 sạc chân nhỏ\r\nBộ lam xích 8 inch\r\nHai loại: \r\n\r\nMotor chổi than\r\nMotor từ,0,', 0, 1670484446, 1670484446),
(107, 'Máy cưa xích xăng 445mm', 'uploads/08-12-2022/1-8kw-may-cua-xich-xang-445mm-ingco-gcs45185.jpg', 2945800, 100, 'd', '', 'Thông số kĩ thuật:\r\n\r\nMã sản phẩm: GCS45185\r\nThương hiệu: INGCO\r\nXuất xứ: Trung Quốc \r\nDung tích xi lanh: 45.8 cc\r\nCông suất: 1.8 KW\r\nTốc độ: 3200 v/p\r\nĐường kính lưỡi cắt: 445mm\r\nDung tích bình nhiên liệu: 550ml\r\nDung tích bình dầu: 260ml\r\nĐông cơ mạnh: 2 Thì,0,', 0, 1670484490, 1670552874),
(108, 'Máy cắt cỏ dùng xăng DCA ACXB1.25KW', 'uploads/08-12-2022/may-cat-co-dung-xang-dca-acxb1-25kw.jpg', 4732000, 100, 'dụng cụ điện, xăng ', '', 'Thông số kỹ thuật:\r\n\r\nMã sản phẩm: ACXB1.25KW\r\nNhà sản xuất: DCA\r\nXuất xứ: Đài Loan\r\nTay cầm giảm rung động mạnh và xoay được 360°\r\nDung tích bình xăng: 42.7cc\r\nĐường kính cắt: 415mm\r\nĐường kính lưỡi cắt: 255mm\r\nCông suất nguồn: 1.25Kw. Tốc độ không tải: 700 Vòng/phút\r\nTrọng lượng: 7.9kg,0,', 0, 1670484562, 1670484562),
(109, 'Máy phát điện chạy xăng Total TP115001', 'uploads/08-12-2022/may-phat-dien-chay-dong-co-xanh-total-tp115001-1500w-result.jpg', 4254270, 100, 'dụng cụ điện, xăng ', '', 'Thông số kĩ thuật\r\n\r\nMã sản phẩm: TP115001\r\nThương hiệu: Total\r\nXuất xứ: Trung Quốc\r\nĐiện thế: 220-240V\r\nTần số: 50 hz \r\nCông suất tối đa: 1.2 KW\r\nCông suất liên tục: 1.0 KW \r\nTốc độ quay: 3000 v/p \r\nCông suất động Cơ: 4 thì - OHV \r\nDung tích xi lanh: 87 ml \r\nCó hệ thống làm mát bằng quạt gió \r\nHệ thống khởi động: giật nổ\r\nHệ thống đánh lửa: T.C.I \r\nDung tích bình nhiên liệu: 5.5L \r\nĐóng gói bằng thùng carton\r\nĐóng gói bằng hộp màu,0,', 0, 1670484610, 1670484610),
(110, 'máy mài', 'uploads/08-12-2022/1(1).jpg', 832000, 100, 'Ngành mộc', '', ',0,', 0, 1670496243, 1670496243);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sale`
--

CREATE TABLE `product_sale` (
  `id` int(11) NOT NULL,
  `discountcode` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` int(12) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `level`, `diachi`, `sdt`, `created_time`, `last_updated`) VALUES
(1232, 'nhanngo', 'Ngô Trọng Nhân', '123456', 0, 'number', 0, 1669270433, 1669270433),
(1233, 'tien', 'Phan Quang Tiến', '123456', 1, 'TPHCM', 971876233, 1669270501, 1669270501),
(1235, 'cattuong', 'Cát Tường', 'e10adc3949ba59abbe56e057f20f883e', 0, 'number', 0, 1669275891, 1669275891),
(1236, 'meimei', 'Tuong', '123456', 0, 'TPHCM', 987465321, 0, 0),
(1237, 'CatTuongg', 'abc', '01012001', 0, 'TPHCM', 799150991, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `ID` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`ID`, `id_product`, `sale`) VALUES
(4, 69, 100000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Chỉ mục cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_privilege_ibfk_1` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

--
-- AUTO_INCREMENT cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`);

--
-- Các ràng buộc cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
