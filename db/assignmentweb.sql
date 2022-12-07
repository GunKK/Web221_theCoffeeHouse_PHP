-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2022 at 12:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignmentWeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`, `role`, `updated_at`) VALUES
(1, 'hau.nguyenbk8786@gmail.com', '1bbd886460827015e5d605ed44252251', 'NDucHau', 0, '2022-11-03 01:16:07'),
(2, 'hau.nguyenbk19@hcmut.edu.vn', 'bae5e3208a3c700e3db642b6631e95b9', 'NDucHau_NV', 1, '2022-11-03 01:17:08'),
(3, 'admin@gmail.com', '', 'Admin', 0, '2022-12-07 08:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Cà phê'),
(2, 'Trà'),
(3, 'Bánh & Snack'),
(4, 'CloudFee'),
(5, 'Hi-Tea Healthy'),
(6, 'CloudTea'),
(7, 'Thức uống khác');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT 'Tiền mặt khi nhận hàng',
  `payment` bigint(20) NOT NULL,
  `address_receiver` varchar(50) NOT NULL,
  `phone_receiver` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Đang xử lý','Đang giao','Đã giao') NOT NULL DEFAULT 'Đang xử lý',
  `name_receiver` varchar(50) NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `payment_method`, `payment`, `address_receiver`, `phone_receiver`, `updated_at`, `status`, `name_receiver`) VALUES
(1, 2, 'Tiền mặt khi nhận hàng', 122000, 'Kí túc xá khu B, Đông Hòa, Dĩ An, Bình Dương', '0382848786', '2022-12-07 11:19:20', 'Đang xử lý', 'Nguyễn Văn An');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_item` bigint(20) NOT NULL DEFAULT 1,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `quantity_item`, `price`) VALUES
(1, 2, 2, 29000),
(1, 3, 1, 35000),
(1, 4, 1, 29000);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `updated_at`, `image`) VALUES
(1, 'HI-TEA HEALTHY: DA ĐẸP DÁNG XINH - RINH DEAL 0Đ', 'Mùa lễ hội đến gần, cần da đẹp dáng xinh phát mê, thì hổng được bỏ qua Hi-Tea Healthy bạn nha. Nhà còn có deal 0Đ dành tặng bạn nữa nè 💃💃\r\n💃\r\n\r\n\r\n🔸 Nhập mã: HITEADAY\r\n\r\n🔸 Thứ 3 hàng tuần: 13, 20, 27/12\r\n\r\n🔸 Áp dụng ly Hi-Tea thứ 2 giá 0đ, khi mua một ly Hi-Tea bất kỳ cho đơn Giao hàng\r\n\r\n👉 Mãi “biu tì”, chốt ngay Hi-Tea!\r\n\r\n', '2022-12-07 10:51:25', 'https://feed.thecoffeehouse.com//content/images/2022/12/NOTI--22-.jpg'),
(2, 'ĐẠI TIỆC LINH ĐÌNH - RINH DEAL MUA 1 TẶNG 1', 'Black Friday vừa qua, deal Nhà siêu to MUA 1 TẶNG 1 ở lại. Cùng bạn mở tiệc thiệt hoành tráng, mừng ngày “anh lương” ghé thăm 😜.\r\n\r\n\r\n🔸 Nhập mã: DAITIEC\r\n\r\n🔸 Thời gian: 02/12 - 07/12\r\n\r\n🔸 Áp dụng cho Hi-Tea/CloudTea/CloudFee/The Coffee House Sữa Đá cho đơn Giao hàng\r\n\r\n👉 Nhà hùn vốn rồi đó, còn khum mau mau chốt đơn!', '2022-12-07 11:11:19', 'https://feed.thecoffeehouse.com//content/images/2022/12/noti--19-.jpg'),
(3, 'BÁNH NƯỚC ĐỦ ĐẦY - CHỚP NGAY COMBO 3 MÓN CHỈ 99K', 'Cuối tuần rồi, chạy về nhà thôi. Nơi có ba có mẹ và trăm chuyện tỉ tê trên đời 👨‍👩‍👧‍👦\r\n\r\nNhà góp chút “ấm áp” để nhà mình thêm vui bạn nhé!\r\n\r\n\r\n🔸 Nhập mã: FAMILYDAY\r\n\r\n🔸 Thứ 7, CN hàng tuần: 10-11,17-18, 24-25/12\r\n\r\nMón 1: 01 Cà phê VN/CloudFee\r\nMón 2: 01 Hi-Tea/Trà trái cây/Trà sữa/CloudTea\r\nMón 3: 01 Chocolate hoặc bánh Mousse/Chà bông phô mai/Croissant trứng muối\r\n🔸 Áp dụng size M cho đơn Giao hàng\r\n\r\n👉 Chớp deal đi chờ chi!', '2022-12-07 11:13:45', 'https://feed.thecoffeehouse.com//content/images/2022/12/NOTI--16-.jpg'),
(4, 'GHÉ NHÀ MANG ĐI - RƯỚC DEAL MÊ LY', 'Biết bạn dạo này bận lắm, nhưng món nước yêu thích thì hổng thể thiếu 😢\r\n\r\nThương thương! Từ ngày 01/12 - 31/12, Nhà mời ngay 10% cho đơn Mang đi, để bạn không chỉ được thưởng thức món ngon mà còn tiện lợi nữa nè ^^\r\n\r\n\r\n🔸 Nhập mã: GHENHANHE\r\n\r\n🔸 Thời gian: 01/12 - 31/12\r\n\r\n🔸 Áp dụng cho đơn Mang đi từ 2 món bất kỳ\r\n\r\nGhé Nhà Mang đi nào bạn ơi!', '2022-12-07 11:13:50', 'https://feed.thecoffeehouse.com//content/images/2022/12/NOTI--18-.jpg'),
(5, 'NƯỚC NGON TUYỆT VỜI - NHÀ MỜI CHỈ TỪ 19K', 'Cầu được ước thấy! Món ghiền của bạn mỗi ngày, nay Nhà ưu đãi chỉ từ 19K ^^  Từ 01/12 - 31/12, bạn tranh thủ rước deal lia lịa nha: Cà phê 19K/ The Coffee House Sữa Đá 29K/Trà trái cây, CloudFee 39K\r\n\r\n🔸 Nhập mã: TUYETVOI\r\n\r\n🔸 Áp dụng size M khi mua cùng bánh bất kỳ, cho đơn Giao hàng.\r\n\r\n🔸  Không áp dụng cho nước đóng chai Fresh và topping\r\n\r\n🔸 Không áp dụng cho các chương trình khuyến mãi song song\r\n\r\n*Không áp dụng cho Bánh mì que\r\n\r\n👉 Xế Nhà giao ngay, chốt đơn liền tay!', '2022-12-07 11:14:45', 'https://feed.thecoffeehouse.com//content/images/2022/12/NOTI--17-.jpg'),
(6, 'SÁNG NO NÊ, BÁNH MÌ GẬY THIỆT MÊ CHỈ 9K', 'Nhà phát hiện dạo này có người hay bỏ bữa sáng lắm 😭\r\n\r\nNên từ ngày 01/12 - 31/12, Nhà ủ mưu lắp đầy chiếc bụng đói bằng Bánh mì Gậy ngon ngon, nhanh gọn chỉ với 9K thôi nè ^^\r\n\r\n\r\n🔸Nhập mã: ANSANG9K\r\n\r\n🔸Thời gian: 07:00 - 14:00\r\n\r\n🔸Áp dụng khi mua kèm 1 nước (size M, L) bất kỳ cho đơn Giao hàng\r\n\r\n🔸Không áp dụng cho nước đóng chai Fresh và topping\r\n\r\n🔸Không áp dụng cho các chương trình khuyến mãi song song\r\n\r\n👉 Có thực mới vực được deadline, chốt đơn ngay bạn nhé!', '2022-12-07 11:17:39', 'https://feed.thecoffeehouse.com//content/images/2022/12/noti--21-.jpg'),
(7, 'BÊN NHAU NHIỀU - NHÀ CHIỀU DEAL ĐẬM', 'Chỉ cần được bên bạn mỗi ngày, Nhà hổng ngại chiều deal đậm 😘\r\n\r\nTừ ngày 01/12 - 31/12, Nhà giảm lớn đến 70K, thoả thích thưởng thức bánh nước thơm ngon bạn nha ^^\r\n\r\n\r\n🔸 Giảm 35K đơn từ 169K\r\n\r\nNhập mã: BENNHAU35\r\n\r\n🔸 Giảm 70K đơn từ 289K\r\n\r\nNhập mã: BENNHAU70\r\n\r\n🔸 Áp dụng cho bánh, nước cho đơn Giao hàng.\r\n\r\n🔸 Không áp dụng cho nước đóng chai Fresh và topping\r\n\r\n🔸 Không áp dụng cho các chương trình khuyến mãi song song\r\n\r\n👉  Đặt đi, chờ chi!', '2022-12-07 11:18:23', 'https://feed.thecoffeehouse.com//content/images/2022/12/noti--20-.jpg'),
(8, 'MANG ĐI CÙNG NHÀ - GIẢM NGAY 15%', 'Biết bạn dù bận bịu nhưng nước ngon thì không thể thiếu 😜\r\n\r\n\r\nNên từ ngày 01/11 - 30/11, Nhà mời ngay deal 15% nè cho đơn Mang đi nè.\r\n\r\n🔸 Nhập mã: GHENHA\r\n\r\n🔸 Áp dụng đơn hàng từ 2 món\r\n\r\nMở app, mang đi rốp rẻng liền nha!', '2022-12-07 11:19:04', 'https://feed.thecoffeehouse.com//content/images/2022/11/NOTI--6-.jpg'),
(9, 'VITAMIN TỈNH TÁO - NHÀ KHAO DEAL CHỈ TỪ 25K', 'Xử gọn deadline, thứ 2 không còn ngập task. Vì có vitamin tỉnh táo, Nhà mời rồi đây 😍\r\n\r\n\r\nTừ ngày 01/11 - 30/11, bạn nhớ chớp ngay deal The Coffee House Sữa Đá, Coldbrew Phúc Bồn Tử chỉ 25K và Cà phê CloudFee chỉ 35K\r\n\r\n🔸 Nhập mã: CAPHEDAY\r\n\r\n🔸 Thứ 2 hàng tuần từ 07:00 - 13:00\r\n\r\n🔸 Áp dụng size M cho đơn Giao hàng\r\n\r\n👉 Mở app liền tay, chốt đơn lia lịa ngay!', '2022-12-07 11:20:00', 'https://feed.thecoffeehouse.com//content/images/2022/11/NOTI--1-.jpg'),
(10, 'ĐẠI TIỆC TRÀ - 3 LY CHỈ 99K', 'Thứ 6 rồi, mở tiệc linh đình thôi team mình ơi😍\r\n\r\nTừ ngày 01/11 - 30/11, Nhà mời ngay combo 3 ly trà chỉ 99K, để chúng mình thoải mái chill nước ngon đã đời, mà chẳng lo về giá ^^\r\n\r\n\r\n🔸 Nhập mã: PARTEADAY\r\n\r\n🔸 Thời gian: Thứ 6 hàng tuần (từ 01/11 - 30/11)\r\n\r\n🔸 Áp dụng Trà trái cây, Hi-Tea, Trà sữa, CloudTea (size M) cho đơn Giao hàng\r\n\r\nĐặt ngay đi chờ chi!', '2022-12-07 11:21:18', 'https://feed.thecoffeehouse.com//content/images/2022/11/noti--9-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(100) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `price_sale` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category_id`, `description`, `images`, `quantity`, `price`, `price_sale`, `timestamp`) VALUES
(1, 'The Coffee House Sữa Đá', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec cursus eros non diam porttitor consectetur. Aenean sed nisl eu orci mollis efficitur vel in urna. Mauris egestas, neque id hendrerit effi', 'coffeeSuaDa.jpg', 0, 39000, 25000, '2022-11-03 02:41:11'),
(2, 'Cà Phê Sữa Đá', 1, '', 'coffeeSuaTruyenThong.jpg', 25, 29000, NULL, '2022-11-03 02:26:47'),
(3, 'Cà Phê Sữa Nóng', 1, '', 'coffeeSuaNong.jpg', 20, 35000, NULL, '2022-12-07 11:19:02'),
(4, 'Bạc Sỉu', 1, '', 'coffeeBacSiu.jpg', 20, 29000, NULL, '2022-12-07 11:19:03'),
(5, 'Bánh Mì Gậy Gà Kim Quất', 3, '', 'banhKimQuat.jpg', NULL, 25000, NULL, '2022-11-03 01:28:27'),
(6, 'Bánh Mì VN Thịt Nguội', 3, '', 'banhMiVN.jpg', NULL, 35000, NULL, '2022-11-03 01:29:40'),
(7, 'Bánh Mì Que Pate Cay', 3, '', 'banhMiQueCay.jpg', NULL, 15000, NULL, '2022-11-03 01:30:43'),
(8, 'Mochi Kem Phúc Bồn Tử', 3, '', 'banhMoChiVietQuat.jpg', NULL, 19000, NULL, '2022-11-03 01:32:28'),
(9, 'Hi-tea Trà Xoài', 5, NULL, 'hiTeaXoai.jpg', NULL, 55000, NULL, '2022-11-03 05:05:45'),
(10, 'Hi-tea Trà Vải', 5, NULL, 'hiTeaVai.jpg', NULL, 59000, NULL, '2022-11-03 05:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `user_id`, `title`, `content`, `updated_at`) VALUES
(1, 4, 1, 'Sản phẩm tốt', 'Giá phù hợp nhiều người dùng', '2022-12-07 11:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `phone`, `address`, `updated_at`) VALUES
(1, 'huylg2109@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Huy', '0358035821', 'KTX Khu A ĐHQGTPHCM', '2022-12-07 11:02:33'),
(2, 'hau.nguyenbk8786@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'User', '0123456789', 'KTX Khu B ĐHQGTPHCM', '2022-12-07 11:18:23'),
(3, 'hau.nguyenbk19@hcmut.edu.vn', '25f9e794323b453885f5181f1b624d0b', 'Hậu', '0382848786', 'Hồ Chí Minh', '2022-12-07 11:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_order_user` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `FK_order_item_product` (`product_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK__product` (`product_id`),
  ADD KEY `FK__user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_order_item_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_item_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
