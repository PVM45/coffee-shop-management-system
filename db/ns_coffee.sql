-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ns_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `description`, `product_id`, `quantity`, `user_id`, `created_at`) VALUES
(19, 'Creamy Latte Coffee', 'menu-2.jpg', 20000, 'A mellow blend of espresso and milk, soft and warm, like stories whispered far from the word lands.', 2, 1, 9, '2025-05-27 10:34:07'),
(20, 'Creamy Latte Coffee', 'menu-2.jpg', 20000, 'A mellow blend of espresso and milk, soft and warm, like stories whispered far from the word lands.', 2, 1, 9, '2025-05-27 12:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `type`, `created_at`) VALUES
(1, 'Coffee Capuccino', 'menu-1.jpg', 'Creamy and bold, brewed with smooth espresso and frothed milk beneath the clouds of distant mountains.', 20000, 'coffee', '2024-02-28 06:19:36'),
(2, 'Creamy Latte Coffee', 'menu-2.jpg', 'A mellow blend of espresso and milk, soft and warm, like stories whispered far from the word lands.', 20000, 'coffee', '2024-02-28 06:19:36'),
(3, 'Cold Coffee', 'menu-3.jpg', 'Chilled and energizing, crafted for quiet days beyond the bustling noise of urban letters.', 22000, 'coffee', '2024-02-28 07:13:50'),
(4, 'Lemonde Juice', 'drink-1.jpg', 'Citrusy and light, a refreshing sip from groves tucked away in sunny syllabic valleys.', 15000, 'drink', '2024-04-24 16:53:22'),
(5, 'Pineapple Juice', 'drink-2.jpg', 'Tropical sweetness, juiced from golden fruits grown near the coastlines of the language sea.', 16000, 'drink', '2024-04-24 16:53:22'),
(6, 'Hot Cake Honey', 'dessert-1.jpg', 'Warm and fluffy, drizzled with honey echoes from the mountains of forgotten words.', 18000, 'dessert', '2024-04-24 16:59:23'),
(7, 'Cherry Butter Cake', 'dessert-2.jpg', 'Soft as a whisper, cherry-kissed butter cake from the hidden grammar garden.', 20000, 'dessert', '2024-04-24 16:59:23'),
(8, 'Banana Cheery Cake', 'dessert-5.jpg', 'Sweet banana and cherry layers rise like tales from behind punctuation peaks.', 22000, 'dessert', '2024-04-24 17:01:31'),
(14, 'Soda Drinks', 'drink-3.jpg', 'Fizzing joy from carbonated clouds, born far from consonant cities and vowel villages.', 12000, 'drink', '2024-05-28 07:40:44'),
(15, 'Roasted Chicken', 'dish-4.jpg', 'Marinated and oven-loved, this golden chicken hails from the far hills of culinary syntax.', 28000, 'main dish', '2024-05-28 07:43:52'),
(16, 'Cornish - Mackere', 'dish-1.jpg', 'Grilled and seasoned, caught beyond the semantic shores and prepared with harmony.\r\n\r\n', 35000, 'main dish', '2024-05-28 07:56:21'),
(17, ' Roasted Steak', 'dish-2.jpg', 'Juicy and savory, seared in the lands where verbs sizzle and nouns rest.', 38000, 'main dish', '2024-05-28 07:59:00'),
(18, 'Cheese Burger', 'burger-1.jpg', 'Cheesy layers of comfort, stacked from the alphabets of taste and texture.', 25000, 'starter', '2024-05-28 08:01:57'),
(19, 'Salad Burger', 'burger-3.jpg', 'Fresh, green, and crunchy, it grew in peaceful groves beyond grammar cities.', 22000, 'starter', '2024-05-28 08:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin45', '2024-07-03 05:45:14', 'admin'),
(2, 'pam', 'pam@gmail.com', 'pam123', '2025-05-26 02:01:58', 'user'),
(3, 'aji', 'aji', 'ajiaji45', '2025-05-26 09:55:01', 'user'),
(4, 'aji', 'aji', 'ajiaji45', '2025-05-26 09:57:33', 'user'),
(5, 'pam2', 'pam2@gmai.com', 'pampam2', '2025-05-26 09:58:45', 'user'),
(9, 'kalica', 'kalica@gmail.com', 'kalica45', '2025-05-26 12:22:12', 'user'),
(10, 'admin2', 'admin2@gmail.com', '$2y$10$hpoVlQN2XqVyCFaU9WHfl.yKt0UJ43kew.C7ib2Z4VcOd5i3VTt8K', '2025-05-27 03:41:38', 'admin'),
(11, 'admin3', 'admin3@gmail.com', '$2y$10$4SH5DnDcMnIFP5iTEcKyo.mXz8SbnuItVLY6CKh5ikEZp0N3LyHdm', '2025-05-27 03:44:26', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_code` (`order_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
