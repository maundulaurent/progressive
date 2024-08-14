-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 12:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `exp_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `exp_time`) VALUES
(1, 'charlesmaundu16@gmail.com', '69d8d12087212fffaa593d9b0a5df2ba69068f466dceb4d33e3c7b207d69d53f10369d29003fa7fc4155ac2a127984ee93d0', '2024-08-13 16:36:24'),
(2, 'charlesmaundu16@gmail.com', '689d6c3335ca35414efe7ff7557aa967102d7c0234d85f55890e98f009d0f48f9c2918b70eb0544f1ab3e6743256a515e15d', '2024-08-13 16:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructions` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `recipe_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `instructions`, `image_path`, `created_at`, `recipe_by`) VALUES
(15, 'Brown Bread', 'Me I', '', '../uploads/recipeimage4.avif', '2024-08-07 16:40:53', NULL),
(16, 'DoughNuts', 'A recipe for producing Doughnuts', '', '../uploads/pexels-roman-odintsov-4551832.jpg', '2024-06-19 14:40:53', NULL),
(17, 'Blue Bread', 'Blue Bread Description', '', '../uploads/salad.jpg', '2024-06-10 16:40:53', NULL),
(18, 'Chicken Nuggets', 'Description for  nuggets', '', '../uploads/tacos1.jpg', '2024-08-07 16:40:53', NULL),
(50, 'Bread', 'A recipe designed to produce Bread', '', '../uploads/muffins.jpg', '2024-08-08 12:18:42', NULL),
(52, 'White Bread', 'Description white Bread', '', '../uploads/cake.jpg', '2024-08-11 15:44:57', NULL),
(54, 'Bugger', 'A description', '', '../uploads/muffins.jpg', '2024-08-13 10:09:17', NULL),
(55, 'eleven 44', 'Eleven Description', '', '../uploads/about.jpg', '2024-08-13 10:10:14', 'admin'),
(56, 'to shared', 'No Description yet', '', '../uploads/salad.jpg', '2024-08-13 10:19:33', 'admin'),
(57, 'Check Premix', 'Check Premix Description', '', '../uploads/recipe4.jpg', '2024-08-13 10:24:35', 'admin'),
(58, 'checking the alert', 'Checking description', '', '../uploads/recipe3.jpg', '2024-08-13 10:27:09', 'admin'),
(59, 'One laast', 'One lasts description', '', '../uploads/cake.jpg', '2024-08-13 10:38:17', 'admin'),
(60, 'OneFourty', 'On fourty description', '', '../uploads/dash1.jpg', '2024-08-13 13:45:31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_comments`
--

CREATE TABLE `recipe_comments` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_comments`
--

INSERT INTO `recipe_comments` (`id`, `recipe_id`, `username`, `comment`, `likes`, `dislikes`, `created_at`) VALUES
(1, 16, 'admin', 'Hi', 13, 11, '2024-08-10 08:30:35'),
(2, 16, 'buniwa1', 'Me ban here', 5, 0, '2024-08-10 08:31:37'),
(3, 16, 'buniwa1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste in veritatis fugit dolore porro? Provident eveniet eaque officia tenetur beatae!', 0, 0, '2024-08-10 10:00:52'),
(4, 16, 'buniwa1', 'Hey, 1 20', 0, 0, '2024-08-10 10:20:43'),
(5, 16, 'admin', 'My comment now', 0, 0, '2024-08-10 10:35:06'),
(6, 15, 'admin', 'Hey, Bread Comment', 0, 0, '2024-08-10 11:04:33'),
(7, 18, 'user1', 'This  good recipe', 0, 0, '2024-08-12 09:38:59'),
(8, 60, 'admin', 'This is my review for thisrecipe', 0, 0, '2024-08-13 10:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`id`, `recipe_id`, `ingredient_name`, `quantity`) VALUES
(78, 15, 'Salt', 2.00),
(79, 15, 'Sugar', 5.00),
(80, 15, 'Frymate Fat', 5.00),
(81, 16, 'Salt', 10.00),
(82, 16, 'Wheat Dough', 3.00),
(84, 16, 'Shortenning fat', 12.00),
(85, 16, 'Calcium Prioponate', 12.00),
(86, 17, 'Salt', 4.00),
(87, 17, 'Sugar', 5.00),
(89, 18, 'Ing1', 20.00),
(90, 18, 'Salt', 30.00),
(91, 50, 'wheat', 2.00),
(92, 50, 'flour', 30.00),
(93, 52, 'wheat one', 10.00),
(94, 52, 'salt', 2.00),
(95, 59, 'ing1', 2.00),
(96, 59, 'ING2', 4.00),
(97, 60, 'In1', 2.00),
(98, 60, 'in2', 4.00),
(99, 60, 'In3', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_likes_dislikes`
--

CREATE TABLE `recipe_likes_dislikes` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` enum('like','dislike') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_likes_dislikes`
--

INSERT INTO `recipe_likes_dislikes` (`id`, `recipe_id`, `username`, `type`) VALUES
(5, 16, 'buniwa1', 'like'),
(7, 15, 'admin', 'like'),
(8, 17, 'admin', 'like'),
(14, 50, 'admin', 'like'),
(15, 57, 'admin', 'like'),
(16, 60, 'admin', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `saved_recipes`
--

CREATE TABLE `saved_recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` enum('shared','saved') NOT NULL DEFAULT 'saved',
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_recipes`
--

INSERT INTO `saved_recipes` (`id`, `name`, `ingredients`, `description`, `created_at`, `updated_at`, `type`, `username`) VALUES
(3, 'Brown Bread', '[{\"name\":\"new\",\"quantity\":\"1\",\"unit\":null,\"cost\":\"12\"}]', '', '2024-08-11 11:49:13', '2024-08-11 11:49:13', 'shared', NULL),
(4, 'Now Dough', '[{\"name\":\"one\",\"quantity\":\"2\",\"unit\":null,\"cost\":\"24\"},{\"name\":\"ttw\",\"quantity\":\"23\",\"unit\":null,\"cost\":\"12\"}]', '', '2024-08-11 11:52:01', '2024-08-11 11:52:01', 'shared', NULL),
(12, 'one', '[{\"name\":\"tw\",\"quantity\":\"2\",\"unit\":null,\"cost\":\"46\"}]', '', '2024-08-12 08:42:56', '2024-08-12 08:42:56', 'saved', NULL),
(17, 'one', '[{\"name\":\"two\",\"quantity\":\"12\",\"unit\":null,\"cost\":\"2\"}]', 'No Description yet', '2024-08-12 19:54:51', '2024-08-12 19:54:51', 'shared', NULL),
(19, 'new', '[{\"name\":\"fiirst\",\"quantity\":\"10\",\"unit\":null,\"cost\":\"12\"}]', 'Saved new', '2024-08-12 21:08:12', '2024-08-12 21:08:12', 'saved', 'admin'),
(25, 'cheekingg recipe', '[{\"name\":\"Ing 1\",\"quantity\":\"10\",\"unit\":null,\"cost\":\"20\"}]', 'checking Description', '2024-08-14 06:24:56', '2024-08-14 06:24:56', 'shared', 'user4'),
(26, 'cheekingg recipe', '[{\"name\":\"Ing 1\",\"quantity\":\"10\",\"unit\":null,\"cost\":\"20\"}]', 'checking Description', '2024-08-14 06:25:00', '2024-08-14 06:25:00', 'saved', 'user4'),
(27, 'one', '[{\"name\":\"one\",\"quantity\":\"1\",\"unit\":null,\"cost\":\"1\"},{\"name\":\"two\",\"quantity\":\"2\",\"unit\":null,\"cost\":\"2\"}]', 'Desc', '2024-08-14 07:28:48', '2024-08-14 07:28:48', 'shared', 'user4'),
(28, 'one', '[{\"name\":\"one\",\"quantity\":\"1\",\"unit\":null,\"cost\":\"1\"},{\"name\":\"two\",\"quantity\":\"2\",\"unit\":null,\"cost\":\"2\"}]', 'Desc', '2024-08-14 07:28:53', '2024-08-14 07:28:53', 'saved', 'user4'),
(29, 'new', '[{\"name\":\"one\",\"quantity\":\"2\",\"cost\":\"40\"}]', 'Neww Desc', '2024-08-14 07:40:54', '2024-08-14 07:40:54', 'shared', 'user4'),
(30, 'new', '[{\"name\":\"one\",\"quantity\":\"2\",\"cost\":\"40\"}]', 'Neww Desc', '2024-08-14 07:40:57', '2024-08-14 07:40:57', 'saved', 'user4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `avatar`, `phone_number`, `email`) VALUES
(4, 'admin', '25e4ee4e9229397b6b17776bfceaf8e7', 'admin', '2024-08-01 11:44:58', 'cake.jpg', NULL, NULL),
(6, 'admin1', '$2y$10$R3COgtl642BtxDQ5HgX1P.UVn2Os4aJ47ezvEQJldeOzq/ssf2Day', 'admin', '2024-08-06 14:40:35', NULL, NULL, NULL),
(8, 'buniwa1', 'cd01a5f5263382f9c9d737de57f985d5', 'user', '2024-08-09 18:16:50', NULL, NULL, NULL),
(9, 'user1', '7e58d63b60197ceb55a1c487989a3720', 'user', '2024-08-12 09:25:40', 'cake.jpg', '0123456789', 'newmail2@mail.com'),
(12, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user', '2024-08-13 11:46:27', NULL, '0123456789', 'user4@mail.com'),
(17, 'charles', 'dc5c7986daef50c1e02ab09b442ee34f', 'user', '2024-08-13 13:35:58', NULL, '012345678', 'charlesmaundu16@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_interactions`
--

CREATE TABLE `user_interactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `action` enum('like','dislike') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_comments`
--
ALTER TABLE `recipe_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipe_likes_dislikes`
--
ALTER TABLE `recipe_likes_dislikes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_interaction` (`recipe_id`,`username`);

--
-- Indexes for table `saved_recipes`
--
ALTER TABLE `saved_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `user_interactions`
--
ALTER TABLE `user_interactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`comment_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `recipe_comments`
--
ALTER TABLE `recipe_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `recipe_likes_dislikes`
--
ALTER TABLE `recipe_likes_dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `saved_recipes`
--
ALTER TABLE `saved_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_interactions`
--
ALTER TABLE `user_interactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe_comments`
--
ALTER TABLE `recipe_comments`
  ADD CONSTRAINT `recipe_comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_interactions`
--
ALTER TABLE `user_interactions`
  ADD CONSTRAINT `user_interactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_interactions_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `recipe_comments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
