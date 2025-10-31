-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 07:34 AM
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
-- Database: `hockeyshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`) VALUES
(1, 1, '2025-10-29 06:28:01'),
(2, 2, '2025-10-29 06:28:01'),
(3, 3, '2025-10-29 06:28:01'),
(4, 4, '2025-10-29 06:28:01'),
(5, 5, '2025-10-29 06:28:01'),
(6, 1, '2025-10-29 06:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`) VALUES
(1, 1, 1, 2, '2025-10-29 06:28:01'),
(2, 1, 6, 1, '2025-10-29 06:28:01'),
(3, 2, 2, 3, '2025-10-29 06:28:01'),
(4, 3, 3, 1, '2025-10-29 06:28:01'),
(5, 3, 4, 2, '2025-10-29 06:28:01'),
(6, 4, 7, 1, '2025-10-29 06:28:01'),
(7, 5, 8, 1, '2025-10-29 06:28:01'),
(8, 5, 9, 4, '2025-10-29 06:28:01'),
(9, 1, 1, 2, '2025-10-29 06:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `price_cents` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock_qty` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price_cents`, `image_url`, `stock_qty`, `is_active`, `created_at`) VALUES
(1, 1, 'Espresso Coffee Beans 1kg', 'Fresh roasted arabica blend ideal for espresso machines.', 1499, 'https://pics.example/coffee-1kg.jpg', 120, 1, '2025-10-29 06:28:01'),
(2, 1, 'Green Tea 100g', 'High-quality Japanese sencha green tea.', 699, 'https://pics.example/green-tea.jpg', 60, 1, '2025-10-29 06:28:01'),
(3, 2, 'Dark Chocolate Cake', 'Rich, moist dark chocolate cake (8 slices).', 1299, 'https://pics.example/dark-cake.jpg', 24, 1, '2025-10-29 06:28:01'),
(4, 3, 'Orange Juice 1L', '100% orange juice, not from concentrate.', 399, 'https://pics.example/oj-1l.jpg', 80, 1, '2025-10-29 06:28:01'),
(5, 2, 'Vanilla Cookies (12pc)', 'Crispy vanilla cookies baked daily.', 599, 'https://pics.example/vanilla-cookies.jpg', 40, 1, '2025-10-29 06:28:01'),
(6, 4, 'Stoneware Mug', 'Dishwasher-safe stoneware mug, 350ml.', 899, 'https://pics.example/mug.jpg', 75, 1, '2025-10-29 06:28:01'),
(7, 5, 'French Press 1L', 'Durable borosilicate glass french press.', 2499, 'https://pics.example/french-press.jpg', 35, 1, '2025-10-29 06:28:01'),
(8, 1, 'Cold Brew Pack', 'Coarse-ground beans for cold brew, 500g.', 1199, 'https://pics.example/cold-brew.jpg', 50, 1, '2025-10-29 06:28:01'),
(9, 6, 'Reusable Metal Straw Set', 'Set of 4 stainless steel straws with brush.', 499, 'https://pics.example/straws.jpg', 90, 1, '2025-10-29 06:28:01'),
(10, 3, 'Apple Juice 1L', 'Pressed apple juice with no added sugar.', 379, 'https://pics.example/aj-1l.jpg', 70, 1, '2025-10-29 06:28:01'),
(11, NULL, 'Laptop Lenovo', NULL, 89999, NULL, 10, 1, '2025-10-29 06:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `title` varchar(120) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `title`, `body`, `created_at`) VALUES
(1, 1, 1, 5, 'Excellent beans', 'Great crema and aroma. Would buy again.', '2025-10-29 06:28:01'),
(2, 2, 2, 4, 'Nice sencha', 'Clean taste, slightly grassy in a good way.', '2025-10-29 06:28:01'),
(3, 3, 3, 5, 'Chocolate heaven', 'Moist and rich—perfect with coffee.', '2025-10-29 06:28:01'),
(4, 4, 4, 3, 'Good but average', 'Decent flavor; wish it was fresher.', '2025-10-29 06:28:01'),
(5, 7, 5, 5, 'Solid french press', 'Easy to clean and brews consistently.', '2025-10-29 06:28:01'),
(6, 1, 1, 5, 'Odličan proizvod!', 'Radi brzo i tiho.', '2025-10-29 06:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Marko Petrovic', 'marko.petrovic@example.com', '$2y$10$dummydummydummydummydummydummydummydummy', '2025-10-29 06:28:01'),
(2, 'Ana Maric', 'ana.maric@example.com', '$2y$10$dummydummydummydummydummydummydummydummy', '2025-10-29 06:28:01'),
(3, 'Nikola Jovanovic', 'nikola.jovanovic@example.com', '$2y$10$dummydummydummydummydummydummydummydummy', '2025-10-29 06:28:01'),
(4, 'Jelena Kovacevic', 'jelena.kovacevic@example.com', '$2y$10$dummydummydummydummydummydummydummydummy', '2025-10-29 06:28:01'),
(5, 'Ivana Horvat', 'ivana.horvat@example.com', '$2y$10$dummydummydummydummydummydummydummydummy', '2025-10-29 06:28:01'),
(6, 'Marko Marković', 'marko@example.com', '$2y$10$lFR2D7zGkuphRPKwD8gOWetTEXPAp/P4I6J4f.kOHTVAe3eYtzGuW', '2025-10-29 06:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_carts_user` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_items_cart` (`cart_id`),
  ADD KEY `idx_items_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_category` (`category_id`),
  ADD KEY `idx_products_active` (`is_active`),
  ADD KEY `idx_products_name` (`name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_reviews_product` (`product_id`),
  ADD KEY `idx_reviews_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `fk_items_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_items_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviews_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
