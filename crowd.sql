-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 01:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created-at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role_as`, `status`, `created-at`) VALUES
(1, 'Super Admin', 'super@gmail.com', '1234567', 2, 0, '2023-05-22 07:31:05'),
(2, 'normal admin', 'normal@gmail.com', '123456', 1, 0, '2023-05-22 07:40:02'),
(3, 'user', 'user@gmail.com', '123456', 0, 0, '2023-05-22 08:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_desc` mediumtext,
  `description` text,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext,
  `meta_keyword` mediumtext,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `small_desc`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(1, 'Social Media', 'Social-Media', 'Social media isÂ a digital technology that facilitates the sharing of text and multimedia through virtual networks and communities', '<p><font color=\"#ffffff\"><span style=\"\" google=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 20px;\"=\"\">Social media isÂ </span><span style=\"\" google=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 20px;\"=\"\">a digital technology that facilitates the sharing of text and multimedia through virtual networks and communities</span><span style=\"\" google=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 20px;\"=\"\">. More than 4.7 billion people around the world use social media.</span></font></p>', '1685266986.jpg', 'Social Media', 'Social Media', 'Social Media', 0, '2023-05-28 09:43:06'),
(2, 'Graphic design', 'Graphic-design', 'Graphic design is a craft where professionals create visual content to communicate messages', '<p><span style=\"\" google=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 20px;\"=\"\"><font color=\"#ffffff\">By applying visual hierarchy and page layout techniques designers use typography and pictures to meet users specific needs and focus on the logic of displaying elements in interactive designs</font></span></p>', '1685267331.jpg', 'Graphic design', 'Graphic design', 'Graphic design', 0, '2023-05-28 09:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_desc` mediumtext,
  `description` text,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `name`, `slug`, `small_desc`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(1, 1, 2, 'Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§Ù†Øª ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ ', 'FaceBook-Ads', 'Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§Ù†Øª ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§Ù†Øª ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ ', '<p style=\"text-align: right; \"><b>Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§Ù†Øª ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ&nbsp;</b><span style=\"text-align: var(--bs-body-text-align);\">Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§Ù†Øª ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ&nbsp;</span><span style=\"text-align: var(--bs-body-text-align);\"><b>Ø§Ø¹Ù„Ø§Ù†Ø§Øª Ø§Ù„ÙÙŠØ³ Ø¨ÙˆÙƒ Ø§Ù„Ù…Ù…ÙˆÙ„Ø© ÙˆØ§Ù„ØºÙŠØ± Ù…Ù…ÙˆÙ„Ø© ÙŠØ¬Ø¨ Ø§</b></span></p><p style=\"text-align: right; \"><span style=\"text-align: var(--bs-body-text-align);\"><b> ÙŠØªÙ… Ù…Ù†Ø§Ù‚Ø´ØªÙ‡Ø§ Ø§Ù„Ø§Ù† Ù„Ùˆ Ø³Ù…Ø­Øª ÙŠØ¹Ù†ÙŠ Ø¨Ø¹Ø¯ Ø§Ø°Ù†Ùƒ ÙˆØ§Ù„Ø§Ù† ØªÙ‚ÙˆÙ… Ø¨ØªØ¬Ø±Ø¨Ø© Ø¨Ø¹Ø¶ Ø§Ù„Ø¹Ù„Ø§Ù…Ø§Øª Ø§Ù„ÙØ§ØµÙ„Ø© Ù…Ø«Ù„Ø§ )(</b></span></p><p style=\"text-align: right; \"><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\">ffdfØªÙŠØ³Øª Ø¯ÙŠØ³ÙƒØ±ÙŠØ¨Ø´Ù† Ø¹Ø±Ø¨ÙŠ</span></p>', '', 'FaceBook Ads', 'FaceBook Ads', 'FaceBook Ads', 1, '2023-05-28 11:31:29'),
(2, 2, 1, 'Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&*&* ÙƒÙ…Ø§Ù†', 'Graphic-design-post', 'Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&*&* ÙƒÙ…Ø§Ù†', '<p style=\"text-align: right; \">Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø© %^&amp;*&amp;* ÙƒÙ…Ø§Ù†&nbsp;Ø§Ù„Ø¨ÙˆØ³Øª Ø§Ù„Ø§ÙˆÙ„ ÙˆØ§Ù„Ø§Ø®ÙŠØ± ÙŠÙ…ÙƒÙ† ÙÙŠ Ø§Ù„Ø¬Ø±Ø§ÙÙŠÙƒ Ø¯ÙŠØ²Ø§ÙŠÙ† ÙˆØªØ¬Ø±Ø¨Ø©<span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\">%^&amp;*&amp;* ÙƒÙ…Ø§Ù†</span></p><p style=\"text-align: right; \"><br></p><p style=\"text-align: right; \"><img src=\"https://us.123rf.com/450wm/shushanto/shushanto2209/shushanto220900703/191842443-destruction-of-planets-concept-art-illustration-background-image.jpg?ver=6\" style=\"width: 450px;\"><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\"><br></span></p><p style=\"text-align: left;\"><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\">some english text to try</span></p><p style=\"text-align: left;\"><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\"><br></span></p><p style=\"text-align: center;\"><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/QgleisXugYc\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><span style=\"color: var(--bs-card-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);\"><br></span></p><p style=\"text-align: right; \"></p>', '', 'Graphic design post', 'Graphic design post', 'Graphic design post', 1, '2023-05-28 11:31:38'),
(3, 1, 2, 'Super Admin postss', 'Super-Admin-posts', ' Super Admin post Super Admin post s', '<p>Super Admin post&nbsp;Super Admin post&nbsp;Super Admin post&nbsp;Super Admin postsfd</p>', '', 'Super Admin post', 'Super Admin post', 'Super Admin post', 1, '2023-05-28 11:31:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
