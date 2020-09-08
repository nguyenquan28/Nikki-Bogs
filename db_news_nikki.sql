-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_news_nikki`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name`, `tag`, `description`, `slug`, `active`) VALUES
(1, 'Fashion', 'Fashion', 'tin tuc noi ve cac the loai thoi trang moi nhat', 'tin tuc thoi trang m', b'1'),
(2, 'Sport', 'Sport', 'tin tuc noi ve cac dau the thao moi nhat', 'tin tuc the thao moi', b'0'),
(8, 'Cars', 'Cars, Speed', 'Information about Car us world', 'Cars', b'0'),
(9, 'Books', 'Books', 'Books, Novel', 'Books', b'0'),
(10, 'Books', 'Books', 'Books, Novel', 'Books', b'0'),
(13, 'Books', 'Books', 'Books, Novel', 'Books', b'1'),
(14, 'Books', 'Books', 'Books, Novel', 'Books', b'1'),
(16, 'XE', 'xe máy', 'các loại xe', 'XE', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `content`, `status`, `active`, `time`) VALUES
(1, 2, 1, 'xin chao ban1', b'0', b'1', '2020-10-10 00:00:00'),
(2, 2, 1, 'xin chao ban2', b'1', b'1', '2020-10-10 00:00:00'),
(3, 2, 2, 'xin chao ban3', b'1', b'1', '2020-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_id` int(11) NOT NULL,
  `fullname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contacts_id`, `fullname`, `email`, `phone_number`, `title`, `content`, `status`, `active`) VALUES
(1, 'nguyen van a', 'nguyenvana@gmail.com', '0169857548', 'xin chao a', 'xin chao admin', b'0', b'1'),
(2, 'nguyen van b', 'nguyenvanb@gmail.com', '0169857548', 'xin chao b', 'xin chao admin', b'0', b'1'),
(3, 'nguyen van c', 'nguyenvanc@gmail.com', '0169857548', 'xin chao c', 'xin chao admin', b'0', b'1'),
(4, 'Quân', 'nguyenquan.cntt.k17da@gmail.com', '0397411511', 'Nikki Blogs', 'Hello shop\r\n', b'1', b'1'),
(6, 'Matte Jersey', 'buivantuan1403@gmail.com', '0818966262', 'Dữ liệu phải dài hơn ', 'hihihi chào shop nha', b'1', b'1'),
(21, 'Quan ne', 'nguyenquan.cntt.k17da@gmail.com', '0818966262', 'Dữ liệu phải dài hơn ', 'https://github.com/nguyenquan28/Nikki-Bogs', b'1', b'1'),
(22, 'quân', 'nguyenquan.cntt.k17da@gmail.com', '0818966262', 'tiêu đề', 'nội dung', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `url`, `post_id`) VALUES
(1, 'image1', 1),
(2, 'image2', 1),
(3, 'image3', 1),
(4, 'image4', 2),
(5, 'image5', 2),
(6, 'image6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `his_id` int(11) NOT NULL,
  `time_login` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `intro` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `slug` varchar(20) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `categories_id`, `title`, `intro`, `content`, `tag`, `description`, `slug`, `active`, `time`, `status`, `user_id`) VALUES
(1, 1, 'Express recipes: Give a twist to your classic moong dal with this recipe', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'fashion', ' voluptate velit esse cillum dolore eu fugiat nulla', 'voluptate velit esse', b'1', '2020-05-05', b'0', 2),
(2, 2, 'A Closer Look At Our Front Porch Items From Lowe’s', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id es', 'I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese..', 'sport', 'This recipe is without any onions and garlic', ' This recipe is with', b'1', '2020-05-05', b'0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `content`, `user_id`, `time`, `post_id`, `status`) VALUES
(1, 'bài đăng xàm xí', 11, '2020-08-27 12:41:03', 2, 0),
(2, 'tính chất kích động', 13, '2020-08-28 06:41:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `permission` bit(1) DEFAULT NULL,
  `lock_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `gender`, `birthday`, `status`, `permission`, `lock_time`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', b'1', '1999-07-03', b'0', b'1', '0000-00-00 00:00:00'),
(2, 'Customer', 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', b'0', '1999-07-03', b'0', b'0', '2020-09-01 10:45:33'),
(11, 'Quan', 'quan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', b'1', '1998-10-19', b'0', b'0', '0000-00-00 00:00:00'),
(13, 'Quan', 'buivantuan1403@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', b'1', '2020-07-24', b'0', b'0', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `PK_user_Comments_id` (`user_id`),
  ADD KEY `PK_Posts_Comments_id` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contacts_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `PK_Posts_Images_id` (`post_id`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `PK_User_Posts_id` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `a` (`user_id`),
  ADD KEY `b` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `PK_Posts_Comments_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `PK_user_Comments_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `PK_Posts_Images_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD CONSTRAINT `loginhistory_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `PK_User_Posts_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `a` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `b` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
