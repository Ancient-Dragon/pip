-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2018 at 09:56 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `amount`, `recipe_id`) VALUES
(1, 'Flour', 400, 1),
(2, 'Sugar', 200, 1),
(3, 'Water', 100, 1),
(4, 'Egg', 50, 1),
(5, 'Flour', 400, 2),
(6, 'Sugar', 200, 2),
(7, 'Water', 100, 2),
(8, 'Egg', 50, 2),
(9, 'Flour', 400, 3),
(10, 'Sugar', 200, 3),
(11, 'Water', 100, 3),
(12, 'Egg', 50, 3),
(13, 'Flour', 400, 4),
(14, 'Sugar', 200, 4),
(15, 'Water', 100, 4),
(16, 'Egg', 50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'Recipe 1', 'Follow these steps:\r\n1 - Add Ingredient 1\r\n2 - Add Ingredient 2\r\n3 - Mix\r\n4 - Bake for 40 minutes', 8),
(2, 'Recipe 2', 'Follow these steps:\r\n1 - Add Ingredient 1\r\n2 - Add Ingredient 2\r\n3 - Mix\r\n4 - Bake for 40 minutes', 8),
(3, 'Recipe 3', 'Follow these steps:\r\n1 - Add Ingredient 1\r\n2 - Add Ingredient 2\r\n3 - Mix\r\n4 - Bake for 40 minutes', 9),
(4, 'Recipe 4', 'Follow these steps:\r\n1 - Add Ingredient 1\r\n2 - Add Ingredient 2\r\n3 - Mix\r\n4 - Bake for 40 minutes', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`) VALUES
('b90e9ec982e9f401e718aca4ce98e3da', 8),
('f7915df9110487c3ec13346ceee430d4', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(8, 'adjsfna@dasfa.com', '$argon2i$v=19$m=1024,t=2,p=2$UkF5Tk5EeERrcHBRV3VUbg$SixP7/ZPpKPIkP4Gi1YBkTlZc9TPmgybE4Ca3vD7WW4'),
(9, 'kmkdmaf@dasf.com', '$argon2i$v=19$m=1024,t=2,p=2$aEFNMU5DRUkxMHdIaU9SYQ$4qGYvl7YEgBldzARhXB2Jq+iVVhgAzGs53AWkl8JcK4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
