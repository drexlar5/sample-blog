-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 05:45 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Business', '2018-09-07 12:36:49'),
(2, 'Technology', '2018-09-07 12:36:49'),
(3, 'politics', '2018-09-08 19:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `coder`
--

CREATE TABLE `coder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coder`
--

INSERT INTO `coder` (`id`, `name`, `age`) VALUES
(1, 'mark', '55'),
(2, 'jude', '44'),
(3, 'clement', '30'),
(4, 'victor', '25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 11, 'seyi', 'seylight@yahoo.com', 'avsrdf', '2018-09-08 21:57:07'),
(2, 11, 'jade doe', 'seylight@yahoo.com', 'this is the comment section', '2018-09-08 22:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(15) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(10, 1, 1, 'oya now', 'oya-now', '<p>lets do this</p>\r\n', '34836224_1701913409856623_887330936159469568_n.png', '2018-09-07 23:51:10'),
(11, 2, 1, 'hmmmsd', 'hmmmsd', '<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit, sed do eiusmod tempor</strong> incididunt ut labore et dolore magna aliqua. ... The first word, &ldquo;Lorem,&rdquo; isn&#39;t even a word; instead it&#39;s a piece of the word &ldquo;dolorem,&rdquo; meaning pain, suffering, or sorrow.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ... The first word, &ldquo;Lorem,&rdquo; i<em>sn&#39;t even a word;</em> instead it&#39;s a piece of the word &ldquo;dolorem,&rdquo; meaning pain, suffering, or sorrow.</p>\r\n', 'noimage.jpg', '2018-09-07 23:53:17'),
(12, 1, 1, 'third post', 'third-post', '<p>Lorem ipsum dolor sit amet, has corpora facilisis ei, sit assum expetendis in. Eirmod mediocritatem vim at. Invidunt consectetuer vel te, gloriatur deseruisse in pri. Duo ei scriptorem adversarium conclusionemque, ex dolores volutpat sed, usu id eros probatus deseruisse. Quo ad atqui dicam semper, est autem option cu.</p>\r\n\r\n<p>At sed dicunt eleifend posidonium. At modus probatus mea, nam noluisse interpretaris ex. Nostrum reformidans has et. Cu vix omittantur complectitur, eu sint incorrupte conclusionemque quo.</p>\r\n\r\n<p>Quo eu laudem omittam, ubique reprimique eum ut. Ne mei autem atqui eripuit. Utinam nominati ei nam, quo ea denique tacimates. Quo in vocibus posidonium necessitatibus. His iuvaret definitiones interpretaris an.</p>\r\n\r\n<p>Sed ei tale officiis dignissim, erat accumsan mei te. Cum hinc placerat explicari in. Ad amet constituam vis. Falli adipisci salutandi eu mei, te nec case wisi debet.</p>\r\n\r\n<p>Epicurei phaedrum hendrerit vel ad, ad vis dictas perfecto adipisci, vix ea oporteat assueverit omittantur. No nec hinc maiorum denique. Errem ceteros est ne, sit ex erat dicit, legimus lobortis elaboraret vis et. Quis nominati cum ea, per soluta labores ex. Natum mentitum eam ut, accusata volutpat vel ad. Eu discere verterem sed, usu ea gloriatur dissentias. Everti impedit torquatos ex ius.</p>\r\n', 'th.jpg', '2018-09-09 09:09:10'),
(13, 3, 1, 'fifth post', 'fifth-post', '<p>Lorem ipsum dolor sit amet, id urbanitas mnesarchum sit, pro putant volutpat concludaturque et. At eum vide pertinax. Ius ea alienum corrumpit, quas legimus patrioque vix ex, lorem incorrupte sed eu. Justo falli eam eu, ea bonorum deleniti ocurreret vim, id adipiscing definitiones his.</p>\r\n\r\n<p>Errem voluptatibus ei sea. Id nec veri gubergren scriptorem, eam nulla laoreet vivendum ea, qui habeo nulla denique at. Id molestie fabellas mel. An duo elaboraret comprehensam, pri tota tamquam offendit no. Stet probo quaerendum eu sit, cu dicam vocibus qui. Ea sed legere scribentur, at vix choro mollis deleniti.</p>\r\n\r\n<p>In usu semper ceteros singulis, platonem reprehendunt id his. Ei mel vide quodsi expetenda. Et latine ancillae copiosae mea. Odio falli intellegebat ea vel, te nam solum eloquentiam, solet homero vis ea. Bonorum deterruisset eum no.</p>\r\n\r\n<p>Ei vel adipiscing posidonium, vix erat conceptam repudiandae te. Probo epicuri eu eum. Et quo tempor blandit. No dicit dicant alienum mea. At vide verear per, eu eum regione nostrum platonem, solum adipisci mei at.</p>\r\n\r\n<p>Vim error tibique antiopam in, sed eu odio augue causae. Mazim adipiscing vim ut. Est ei hinc appareat. Cu alia hinc commodo vel, eum ea propriae maiestatis adversarium. Eu primis appellantur duo. Est ceteros mediocritatem cu.</p>\r\n', 'noimage.jpg', '2018-09-09 09:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'seyi', '090110', 'seylight@yahoo.com', 'seyioladipo', '827ccb0eea8a706c4c34a16891f84e7b', '2018-09-08 23:17:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coder`
--
ALTER TABLE `coder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coder`
--
ALTER TABLE `coder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
