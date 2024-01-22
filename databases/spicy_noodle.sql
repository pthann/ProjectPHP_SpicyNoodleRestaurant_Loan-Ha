-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2024 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `spicy_noodle`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `food_id`) VALUES
(23, 66, 4),
(24, 66, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(26, 'food'),
(28, 'drink');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `image_link`, `price`, `description`) VALUES
(1, 'Spicy Fried Fish Ball Noodles', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS-hQB9upIEmgIQVG46UVQ9LlWPjtjFCjgHSvChTsGXX-qwUOBk', 70.000, 'A unique dish combining soft and smooth spaghetti with the crunch and spiciness of fried fish patties. Main ingredients include spaghetti, fried fish patties, garlic, onions, chili, fish sauce, and spices.'),
(2, 'Spicy Beef Noodles', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTB4L0jctK_6oSX2tPQk9EXLroCoQt4f9MM2zZzZnrz1URn1aBH', 50.000, 'Delicious Asian dish with fresh noodles stir-fried with thinly sliced beef, onions, black bean sauce, and chili sauce. Offers a delightful mix of spiciness, saltiness, and rich flavors.'),
(3, 'Combo: Spicy Beef Noodles + Pepsi', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS--l9VEb-czy4inpE5Qf5-TyaIDNOnZNGbA9tMA0V6jI50gp-m', 70.000, 'A delicious combination of Pepsi soft drink with spicy beef noodles. The rich and fiery taste of the noodles is balanced by the sweet and refreshing flavor of Pepsi, providing a diverse culinary experience.'),
(4, 'Spicy Italian Pasta', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTf4Tv2C4VLwHsBJUlPZ41F4MDGGW-kkDnIn5j4bqp5zII3gafg', 70.000, 'Fascinating dish in Italian cuisine with spaghetti cooked until tender and combined with red chili peppers, garlic, black pepper, and salt for a unique and refined taste.'),
(5, 'Spicy Sausage Noodles', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSHSRphzBawbC5V3cMVaaTGE-5PguHYOuVE4HWVwulGHsCUidcO', 45.000, 'Exciting Korean dish with soft and chewy noodles, a broth infused with various spices and pepper, and sausages that enhance the aroma, topped with black pepper for added spiciness.'),
(6, 'Spicy Mixed Noodles', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSJhIGjqcRbdYAQo_6dv1QI9Mfp59uQwC5_A2ifS_zDEKFToRZ2', 45.000, 'Rich and flavorful dish combining perfectly cooked noodles, spicy broth with garlic, onions, and chili, enhanced with beef, pork, squid, seafood, vegetables, and tofu for a diverse array of flavors.'),
(7, 'Spicy Crayfish Noodles', 'https://cdn.shortpixel.ai/spai/q_lossless+w_1029+to_auto+ret_img/www.thatlangon.com/wp-content/uploads/2021/09/cachlammicay9.jpg', 45.000, 'Tantalizing dish with succulent crayfish, perfectly cooked noodles, and fiery spices including chili peppers, garlic, ginger, and Sichuan peppercorns. Served in a rich, aromatic broth.'),
(8, 'Pepsi', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQg9PFZFJQ2ASGC6n9EO2qDEORTpgsRseYYz4DW5YcKae7tmq-m', 30.000, 'Popular carbonated sweet beverage worldwide with brown color, delicate bubbles, and a unique blend of cola flavor with hints of vanilla, licorice, and cashew. Refreshing and suitable for quenching thirst.'),
(9, 'Stir-fried Corn', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQaQjQZBnVLLcc9ZUHxtJB_rY9matK7t6AVzktWKWXM4e_8kOxw', 60.000, 'Perfect combination of fresh corn and vegetables stir-fried with delicious spices. Features fresh corn, onions, carrots, and bell peppers for a delicious and nutritious dish.'),
(10, 'Mixed Rice Paper Salad', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRTlimzU9m_tHMtPCkMBi-x-BYmRNjlTUTEYvVq5kGOV7hmfEMM', 60.000, 'Harmonious combination of thin, smooth rice paper layers and fresh ingredients such as green vegetables, chicken, or shrimp, with unique spices. Offers a perfect blend of flavor and nutrients.'),
(11, 'Green Mango Salad', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTtzgL62oO_ygfq7Nr-PRfLSAvTN5jb02i27Gfw4ISRnGssIqGx', 60.000, 'Wonderful combination of crunchy green mango, refreshing green vegetables, and unique spices. Features ripe but crunchy green mangoes, raw vegetables, fish mint, basil, and coriander for a fresh and nutritious salad.'),
(12, 'Lemon Tea', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu-w75wsehWtUwL7uEJvaIs3LQ9tbdqO9JXA&usqp=CAU', 30.000, 'Perfect combination of fresh herbal tea and fresh lemon juice. Popular and suitable for all weather, offering a harmonious balance between tea flavor and a slightly sour taste of lemon.'),
(13, 'Sweet Potato Fries', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3y79J096JMs66c7GKh_SOCJrghX68Q5PAV_LhppspV2imsrnX', 50.000, 'Fun and healthy version of traditional potato chips using sweet potatoes. Features crispy fried sweet potato sticks with a naturally sweet flavor balanced with a mild salty taste from spices like salt and pepper.'),
(14, 'Fried Fermented Pork Roll', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSpt0SODFRny3SAOWvFlpBR5YXbvEn-b6LfnQm4iR8MtTKy1Bk4', 50.000, 'Popular street food made from Nem chua, a spring roll made from marinated and fermented pork, deep-fried for a delicious crispy crust outside while retaining the softness inside.'),
(15, 'Fried Sausages', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu4rHHrSsEOLbzHrtTLL_EmrvJOZDNKn5Atwu1X1KAMYft23Xq', 50.000, 'Popular street food made from ground meat, often pork, mixed with salt, spices, and breadcrumbs, stuffed into casings and fried until golden and crispy. Enhances flavor and texture.'),
(16, 'Peach Tea', 'https://cuongquat.com/files/assets/tr_o.jpg', 30.000, 'Perfect combination of tea and fresh peach flavor, suitable for all weather. Features black tea, green tea, or oolong tea as the base with added fresh peaches or peach juice for a natural and sweet peach flavor.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderr`
--

CREATE TABLE `orderr` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_foood` int(11) NOT NULL,
  `id_user` varchar(150) NOT NULL,
  `foodName` text DEFAULT NULL,
  `foodimg` text DEFAULT NULL,
  `foodPrice` varchar(255) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `code` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `payment_methods` tinyint(3) NOT NULL DEFAULT 1,
  `table_id` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `option_order` tinyint(3) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_foood`, `id_user`, `foodName`, `foodimg`, `foodPrice`, `customer_name`, `code`, `phone`, `payment_methods`, `table_id`, `qty`, `option_order`, `description`, `date`) VALUES
(45, 1, '70', 'Spicy Fried Fish Ball Noodles', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS-hQB9upIEmgIQVG46UVQ9LlWPjtjFCjgHSvChTsGXX-qwUOBk', '70.000', 'demo', 'MDH1aa1e7', '0938290761', 1, 'Table 1', 10, 2, 'ok', '2024-01-22 19:24:31'),
(46, 9, '70', 'Stir-fried Corn', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQaQjQZBnVLLcc9ZUHxtJB_rY9matK7t6AVzktWKWXM4e_8kOxw', '60.000', 'demo', 'MDH1aa1e7', '0938290761', 1, 'Table 1', 7, 2, 'ok', '2024-01-22 19:24:31'),
(47, 2, '70', 'Spicy Beef Noodles', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTB4L0jctK_6oSX2tPQk9EXLroCoQt4f9MM2zZzZnrz1URn1aBH', '50.000', 'demo', 'MDH1aa1e7', '0938290761', 1, 'Table 1', 1, 3, 'ok', '2024-01-22 19:24:31'),
(48, 3, '70', 'Combo: Spicy Beef Noodles + Pepsi', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS--l9VEb-czy4inpE5Qf5-TyaIDNOnZNGbA9tMA0V6jI50gp-m', '70.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56'),
(49, 5, '70', 'Spicy Sausage Noodles', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSHSRphzBawbC5V3cMVaaTGE-5PguHYOuVE4HWVwulGHsCUidcO', '45.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56'),
(50, 14, '70', 'Fried Fermented Pork Roll', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSpt0SODFRny3SAOWvFlpBR5YXbvEn-b6LfnQm4iR8MtTKy1Bk4', '50.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 5, 1, 'ok', '2024-01-22 19:36:56'),
(51, 16, '70', 'Peach Tea', 'https://cuongquat.com/files/assets/tr_o.jpg', '30.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56'),
(52, 12, '70', 'Lemon Tea', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu-w75wsehWtUwL7uEJvaIs3LQ9tbdqO9JXA&usqp=CAU', '30.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56'),
(53, 13, '70', 'Sweet Potato Fries', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3y79J096JMs66c7GKh_SOCJrghX68Q5PAV_LhppspV2imsrnX', '50.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56'),
(54, 7, '70', 'Spicy Crayfish Noodles', 'https://cdn.shortpixel.ai/spai/q_lossless+w_1029+to_auto+ret_img/www.thatlangon.com/wp-content/uploads/2021/09/cachlammicay9.jpg', '45.000', 'demo22', 'MDHc8251e', '1234567890', 3, 'Table 7', 1, 1, 'ok', '2024-01-22 19:36:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`) VALUES
(1, 'Table 1', 'normal'),
(2, 'Table 2', 'normal'),
(3, 'Table 3', 'normal'),
(4, 'Table 4', 'normal'),
(5, 'Table 5', 'normal'),
(6, 'Table 6', 'normal'),
(7, 'Table 7', 'normal'),
(8, 'Table 8', 'normal'),
(9, 'Table 9', 'normal'),
(10, 'Table 10', 'normal'),
(11, 'Table 11', 'normal'),
(12, 'Table 12', 'normal'),
(13, 'Table 13', 'normal'),
(14, 'Table 14', 'normal'),
(15, 'Table 15', 'normal'),
(16, 'Table 16', 'normal'),
(17, 'Table 17', 'normal'),
(18, 'Table 18', 'normal'),
(19, 'Table 19', 'normal'),
(20, 'Table 20', 'normal'),
(21, 'Table 21', 'normal'),
(22, 'Table 22', 'normal'),
(23, 'Table 23', 'normal'),
(24, 'Table 24', 'normal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`, `status`) VALUES
(2, '1', 'Empty'),
(3, '2', 'Empty'),
(4, '3', 'Empty');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_detail`
--

CREATE TABLE `tag_detail` (
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `avatar` text NOT NULL,
  `role` text NOT NULL,
  `telephone` text NOT NULL,
  `list_cart` varchar(255) DEFAULT NULL,
  `point` tinyint(1) NOT NULL DEFAULT 0,
  `block` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `gender`, `avatar`, `role`, `telephone`, `list_cart`, `point`, `block`) VALUES
(65, 'admin@gmail.com', 'loan', '$2y$10$EUaJVDuYmiXj153XxyzlZu2ckA/2xvEHRRtqwIOD0Zk0K0A9QfFtW', '', 'https://inkythuatso.com/uploads/thumbnails/800/2023/03/1-hinh-anh-ngay-moi-hanh-phuc-sieu-cute-inkythuatso-09-13-35-50.jpg', 'ADMIN', '0878138854', NULL, 0, 0),
(66, 'loan.huynh25@student.passerellesnumeriques.org', 'loan', '$2y$10$iJPLFuerfKIIjrm4IjjiPecjcO1DWpF9.4QtraQFbvcGKJI4HZ9FC', '', 'https://top10binhphuoc.vn/wp-content/uploads/2022/10/b2e9c3f455a408f51fca8c1998da425d-800x560.jpg', 'USER', '0878138854', NULL, 0, 0),
(70, 'testuser@gmail.com', 'testuser', '$2y$10$BGd2TojaQHe9verbpyxAAO.Z2cE8ucvc64Bel7pajPnWMsaEHcyrm', '', 'https://cdn-icons-png.flaticon.com/512/219/219969.png', 'USER', '1234567890', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orderr`
--
ALTER TABLE `orderr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `orderr_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orderr_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `orderr_ibfk_3` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
