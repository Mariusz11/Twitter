-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~xenial.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2016 at 02:17 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Twitter_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `email`, `tweet_id`, `date`, `comment`) VALUES
(1, 'Janek@wp.pl', 3, '2016-11-03 00:00:00', 'Nowy komentarz'),
(2, 'Janek@wp.pl', 3, '2015-10-20 00:00:00', 'Napisz komentarz'),
(3, 'Janek@wp.pl', 7, '2015-05-04 00:00:00', 'Napisz komentarz'),
(4, 'Janek@wp.pl', 7, '2015-10-04 00:00:00', 'Napisz komentarz'),
(5, 'Janek@wp.pl', 1, '2014-10-08 00:00:00', 'Napisz komentarz'),
(6, 'Janek@wp.pl', 1, '2015-10-09 00:00:00', 'Odkrywam bootstrapa'),
(7, 'Janek@wp.pl', 1, '2013-10-22 00:00:00', 'Znowu odkrywam bootstrapa'),
(8, 'Janek@wp.pl', 1, '2014-02-04 00:00:00', 'Super Ci idzie '),
(9, 'Janek@wp.pl', 24, '2014-11-22 00:00:00', 'Nowy komentarz dla Email'),
(10, 'Janek@wp.pl', 16, '2014-11-10 00:00:00', 'Lorem ipsum'),
(11, 'Janek@wp.pl', 1, '2016-09-28 00:00:00', 'To jest komentarz z datÄ…'),
(12, 'Janek@wp.pl', 1, '2016-09-28 14:02:23', 'Napisz komentarz'),
(13, 'Janek@wp.pl', 4, '2016-09-28 14:02:57', 'Napisz komentarz'),
(14, 'Janek@wp.pl', 4, '2016-09-28 14:02:59', 'Napisz komentarz');

-- --------------------------------------------------------

--
-- Table structure for table `infoUsers`
--

CREATE TABLE `infoUsers` (
  `surname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `aboutMe` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `infoUsers`
--

INSERT INTO `infoUsers` (`surname`, `age`, `aboutMe`, `user_id`, `id`) VALUES
('Skorża', 26, 'I am funny gay', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tweets`
--

CREATE TABLE `Tweets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tweet` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tweets`
--

INSERT INTO `Tweets` (`id`, `email`, `tweet`, `date`) VALUES
(1, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(2, 'Janek@wp.pl', 'Napisz tweeta3', '2016-09-08 00:00:00'),
(3, 'Janek@wp.pl', 'Napisz tweeta3', '2016-09-08 00:00:00'),
(4, 'Janek@wp.pl', 'Napisz tweeta3', '2016-09-08 00:00:00'),
(5, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(6, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(7, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(8, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(11, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(12, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(13, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(14, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-10 00:00:00'),
(15, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-10 00:00:00'),
(16, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-14 00:00:00'),
(17, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(18, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(19, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(20, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(21, 'Janek@wp.pl', 'Napisz tweeta', '2016-09-08 00:00:00'),
(22, 'Patryk@o2.pl', 'Napisz tweeta', '2016-09-14 00:00:00'),
(23, 'Email', 'Napisz tweeta', '2016-09-08 00:00:00'),
(24, 'Email', 'Napisz tweeta', '2016-09-08 00:00:00'),
(25, 'Email', 'Napisz tweeta', '2016-09-08 00:00:00'),
(26, 'Janek@wp.pl', 'Napisz tweeta', '2015-11-10 00:00:00'),
(27, 'Janek@wp.pl', 'Napisz tweeta', '2015-11-10 00:00:00'),
(28, 'Janek@wp.pl', 'Napisz tweeta', '2015-11-10 00:00:00'),
(29, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(30, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(31, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(32, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(33, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(34, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(35, 'Email', 'Nowy tweet!', '2014-05-04 00:00:00'),
(36, 'Email', 'Napisz tweeta', '2013-02-11 00:00:00'),
(37, 'Email', 'Znowu nowy tweet', '2012-12-23 00:00:00'),
(38, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(39, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(40, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(41, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(42, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(43, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(44, 'Janek@wp.pl', 'Litwo! Ojczyzno moja! Ty jesteÅ› jak zdrowie. NazywaÅ‚ siÄ™ rumieniec oblekÅ‚y. Tadeusz, chociaÅ¼ liczyÅ‚ lat kilku dzieje chciano przeczyÄ‡ chwaÅ‚y. WiÄ™c SÄ™dzia nagÅ‚ym zwrotem gÅ‚owÄ… rzekÅ‚ do sieni siadÅ‚ przy ktÃ³rym ogieÅ„ pÅ‚onÄ…Å‚. RÃ³wnieÅ¼ patrzyÅ‚a ona, i czuÅ‚ wtenczas, Å¼e po wielu kosztach i z jednej strony a czarnÄ… w jedno pozostaÅ‚ puste miejsce jest kaÅ¼da mÅ‚oda, Å‚adna. Tadeusz przyglÄ…daÅ‚ siÄ™ wachlowaÅ‚a, to mÃ³wiÄ…c, Å¼e zamczysko wziÄ™liÅ›my w lisa, tak siÄ™ wypyta o taÅ„cach, nawet suknie stare. Å»aÅ‚oÅ›nie byÅ‚o wyÅ‚oÅ¼yÄ‡ koszt na ksztaÅ‚t deski. Nogi miaÅ‚ czasu. Na niem noty i poÅ„czoszki. Na to mÃ³wiÄ…c, Å¼e go wtenczas wszyscy sÅ‚uchali w pole, za nim staÅ‚ za wrÃ³cone Å¼ycie podziÄ™kowaÄ‡ Bogu tak siÄ™ zdawaÅ‚ maÅ‚pÄ… lub bez urzÄ™du. ogon teÅ¼ same widzi sprzÄ™ty', '2014-05-03 00:00:00'),
(46, 'Janek@wp.pl', 'NapisaÅ‚em tweeta', '2014-08-06 22:40:33'),
(47, 'Janek@wp.pl', 'tweet z nowÄ… datÄ…', '2016-09-28 13:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `name`) VALUES
(11, 'Janek@wp.pl', 'janek', 'Janek'),
(12, 'Marek@onet.pl', '', 'Marek'),
(13, 'Email', 'nklbhj', 'Jarek'),
(14, 'Mailowy', 'knlkj', 'Mariusz'),
(17, 'Jarek@poczta.pl', 'poczta', 'Jarek'),
(18, 'Arek@google.pl', 'password', 'Arek'),
(20, 'Arek123@google.pl', 'pass', 'Arek'),
(22, 'Kuba@gmail.pl', 'kuba', 'Kuba'),
(23, 'Patryk@o2.pl', 'patryk', 'Patryk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `tweet_id` (`tweet_id`);

--
-- Indexes for table `infoUsers`
--
ALTER TABLE `infoUsers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `Tweets`
--
ALTER TABLE `Tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`email`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `infoUsers`
--
ALTER TABLE `infoUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Tweets`
--
ALTER TABLE `Tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Users` (`email`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`tweet_id`) REFERENCES `Tweets` (`id`);

--
-- Constraints for table `infoUsers`
--
ALTER TABLE `infoUsers`
  ADD CONSTRAINT `infoUsers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Users` (`email`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `Users` (`email`);

--
-- Constraints for table `Tweets`
--
ALTER TABLE `Tweets`
  ADD CONSTRAINT `Tweets_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
