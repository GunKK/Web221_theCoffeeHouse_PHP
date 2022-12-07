-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2022 at 09:03 AM
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
  `payment` bigint(20) NOT NULL DEFAULT 0,
  `address_receiver` varchar(50) NOT NULL DEFAULT '0',
  `phone_receiver` varchar(50) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `content`, `updated_at`) VALUES
(1, 'CÁCH PHA CÀ PHÊ PHIN THƠM NGON TRÒN VỊ', 'Có nhiều cách để pha một ly cà phê ngon, nhưng đối với nhiều người Việt giây phút đợi chờ những giọt cà phê rơi từ chiếc phin đã trở thành nét văn hóa ăn sâu trong tiềm thức. Để tạo nên một ly cà phê phin chuẩn vị, không chỉ cần sự tinh tế trong cách chọn loại cà phê mà còn cả sự tỉ mỉ trong từng bước pha.\r\n\r\n', '2022-12-05 13:45:23'),
(2, 'TẠI SAO CÀ PHÊ CÓ VỊ CHUA?\r\n', 'Nhiều người khi uống cà phê cảm thấy có vị chua thường e ngại rằng cà phê hỏng, kém chất lượng hay gặp các vấn đề trong quá trình pha chế và bảo quản. Tuy nhiên, điều này chưa chính xác. Cả hương vị của Arabica hay Robusta nguyên chất, trải qua quá trình chế biến, rang xay đều có vị chua nhẹ. Vậy nên, cà phê có vị chua chua, vẫn giữ được hương thơm đặc trưng vốn có của nó thì bạn có thể yên tâm đó không phải là cà phê hỏng. The Coffee House sẽ chỉ ra những lý do khiến cà phê có vị chua tự nhiên.', '2022-12-05 13:46:00'),
(3, 'GU THƯỞNG THỨC CÀ PHÊ CỦA NGƯỜI SÀNH ĐIỆU\r\n', 'Đối với người sành cà phê thì không gì sánh bằng một ly cà phê nguyên chất pha phin. Có thể tự pha khi có thời gian, hoặc có thể chọn ra cửa hàng, nhưng những quán lọt vào mắt xanh của người sành cà phê phải là nơi có những ly cà phê 100% nguyên chất, chất lượng cao. Phải ngon và thơm để khuấy động các giác quan và mang đến cảm xúc thú vị tột cùng.\r\n\r\nHương vị của cà phê phin nguyên chất luôn đậm đà, đặc trưng và mạnh mẽ khiến người ta thổn thức. Cái cảm giác những giọt cà phê nhiễu qua chiếc phin một cách chậm rãi, trong lúc đó đưa mắt ngắm nhìn sự chuyển động của đường phố là cái thú vui thị của những người sành cà phê vào những ngày có chút dư giả thời gian. ', '2022-12-05 13:46:27'),
(4, '8 LỢI ÍCH BẤT NGỜ CỦA CÀ PHÊ COLD BREW\r\n', '\r\nCold brew là thức uống rất được yêu thích trong thời gian gần đây. Không chỉ có hương thơm đặc trưng và vị lôi cuốn, nó còn có nhiều lợi ích cho sức khỏe. Cùng The Coffee House tìm hiểu 8 lợi ích nổi bật của loại cà phê lạnh siêu hot này. ', '2022-12-05 14:45:28');

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
(3, 'Cà Phê Sữa Nóng', 1, '', 'coffeeSuaNong.jpg', NULL, 35000, NULL, '2022-11-03 01:25:51'),
(4, 'Bạc Sỉu', 1, '', 'coffeeBacSiu.jpg', NULL, 29000, NULL, '2022-11-03 01:26:55'),
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
  `title` int(11) NOT NULL,
  `content` text DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'huylg2109@gmail.com', 'lygiahuy', 'Huy', '0358035821', 'KTX Khu A ĐHQGTPHCM', '2022-12-07 08:02:13'),
(2, 'user@gmail.com', '', 'User', '0123456789', 'KTX Khu B ĐHQGTPHCM', '2022-12-07 08:02:49');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
