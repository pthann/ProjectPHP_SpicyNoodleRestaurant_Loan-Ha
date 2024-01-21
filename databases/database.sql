CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `category` (`id`, `name`) VALUES
(24, 'Drink'),
(25, 'Food'),
CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customer` (`id`, `name`, `password`) VALUES
(1, 'loan@gmail.com', 'Loan@123');

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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



CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `phone` text DEFAULT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `order_detail` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `img` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Còn hàng',
  `note` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tables` (`id`, `name`) VALUES
(1, 'Bàn 1'),
(2, 'Bàn 2'),
(3, 'Bàn 3'),
(4, 'Bàn 4'),
(5, 'Bàn 5'),
(6, 'Bàn 6'),
(7, 'Bàn 7'),
(8, 'Bàn 8'),
(9, 'Bàn 9'),
(10, 'Bàn 10'),
(11, 'Bàn 11'),
(12, 'Bàn 12'),
(13, 'Bàn 13'),
(14, 'Bàn 14'),
(15, 'Bàn 15'),
(16, 'Bàn 16'),
(17, 'Bàn 17'),
(18, 'Bàn 18'),
(19, 'Bàn 19'),
(20, 'Bàn 20'),
(21, 'Bàn 21'),
(22, 'Bàn 22'),
(23, 'Bàn 23'),
(24, 'Bàn 24');

ALTER TABLE `order`
ADD COLUMN `table_id` INT,
ADD CONSTRAINT `fk_order_tables`
FOREIGN KEY (`table_id`) REFERENCES `tables`(`id`);


CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tag` (`id`, `name`, `status`) VALUES
(2, '1', 'Empty'),
(3, '2', 'Empty'),
(4, '3', 'Empty');



CREATE TABLE `tag_detail` (
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `avatar` text NOT NULL,
  `role` text NOT NULL,
  `telephone` text NOT NULL,
  `point` bigint(20) NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `email`, `name`, `password`, `gender`, `avatar`, `role`, `telephone`, `point`, `block`) VALUES
(45, 'admin@gmail.com', 'Tố Loan', '$2y$10$tvTtope3bwfZLezmGzW3qONDnL1WVcRCN85WdebhX8u.GbFYla4Ru', '', 'https://img.meta.com.vn/Data/image/2022/03/14/anh-anime-chibi-8.jpg', 'ADMIN', '0878138854', 0, 0),
(48, 'loan.huynh25@student.passerellesnumeriques.org', 'Tố Loan', '$2y$10$M8J.ujUCZvt.sYfqJ0Orv.7c12D4onJYRShqf9CyS0aXdtkgb9w1u', '', 'https://inkythuatso.com/uploads/thumbnails/800/2023/03/1-hinh-anh-ngay-moi-hanh-phuc-sieu-cute-inkythuatso-09-13-35-50.jpg', 'USER', '0332042241', 0, 0);


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`);

ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);


ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;


ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;


ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;


ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id`) REFERENCES `category` (`id`);
COMMIT;

