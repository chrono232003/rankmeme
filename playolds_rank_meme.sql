-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2020 at 10:22 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playolds_rank_meme`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `memeID` int(11) NOT NULL,
  `User` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `memeID`, `User`, `comment`, `commentDate`) VALUES
(1, 89, '2348259505184442', 'hahaha true', '2019-02-12 12:56:25'),
(2, 87, '2348259505184442', 'I love this game!!', '2019-02-12 17:52:11'),
(5, 114, '2348259505184442', 'Ha, I got a few chuckles out of this one.', '2019-03-05 17:46:07'),
(6, 51, '2348259505184442', 'haha, she needs to be on one tile though', '2019-03-07 10:43:44'),
(7, 29, '2348259505184442', 'Haha these ones are funny!\n', '2019-10-20 16:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `ID` varchar(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatarLink` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `memekey` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`ID`, `User`, `password`, `email`, `avatarLink`, `active`, `memekey`) VALUES
('', '', '', '', '//graph.facebook.com//picture', 0, ''),
('10100363172616724', 'Jessi Breckster', '', '', '//graph.facebook.com/10100363172616724/picture', 0, ''),
('10150057959453841', 'Klaus Mikaelson', '', '', '//graph.facebook.com/10150057959453841/picture', 0, ''),
('10150078188357922', 'Thomas Anderson', '', '', '//graph.facebook.com/10150078188357922/picture', 0, ''),
('10157112650642309', 'Mike Carey', '', '', '//graph.facebook.com/10157112650642309/picture', 0, ''),
('10207124333824323', 'Elena Laura Suliman', '', '', '//graph.facebook.com/10207124333824323/picture', 0, ''),
('10210368240121780', 'Lance Alex', '', '', '//graph.facebook.com/10210368240121780/picture', 0, ''),
('1189281027904764', 'Kohl K Diaz', '', '', '//graph.facebook.com/1189281027904764/picture', 0, ''),
('2348259505184442', 'Lance Ibrahim', '', '', '//graph.facebook.com/2348259505184442/picture', 0, ''),
('395920327647275', 'Brady Phillips', '', '', '//graph.facebook.com/395920327647275/picture', 0, ''),
('50', 'chrono232003', 'Mayafit23!', 'chrono232003@yahoo.com', '', 1, 'c581d7zrr611939gggh5'),
('65', 'LanceMan12', 'Mayafit23!', '', '', 1, ''),
('66', 'District13', 'Mayafit23!', '', '', 1, ''),
('67', 'rico99', 'Mayafit23!', '', '', 1, ''),
('68', 'flowerpower16', 'Mayafit23!', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `memes`
--

CREATE TABLE `memes` (
  `ID` int(11) NOT NULL,
  `emailID` varchar(100) NOT NULL,
  `memepath` varchar(200) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `votecount` int(11) NOT NULL,
  `commentcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memes`
--

INSERT INTO `memes` (`ID`, `emailID`, `memepath`, `dateAdded`, `votecount`, `commentcount`) VALUES
(1, '50', 'salty.jpg', '2019-02-02 16:16:09', 0, 0),
(2, '50', '920x920.jpg', '2019-02-02 16:19:45', 1, 0),
(3, '50', 'download.jpg', '2019-02-02 16:20:55', 0, 0),
(4, '50', 'FERERT-5bbb3cbfba4fc__700.jpg', '2019-02-02 16:23:21', 2, 0),
(5, '50', 'maury-meme.jpg', '2019-02-02 16:24:23', 0, 0),
(6, '50', 'nk9wd57keqx11.png', '2019-02-02 16:29:13', 1, 0),
(7, '50', 'tfw.jpg', '2019-02-02 16:31:42', 0, 0),
(8, '50', 'night-shift-memes.jpg', '2019-02-02 16:34:54', 0, 0),
(9, '50', 'SEOmeme3.jpg', '2019-02-02 16:37:24', 0, 0),
(14, '50', '52279468.jpg', '2019-02-04 20:04:22', 1, 0),
(15, '50', 'download.jpg', '2019-02-04 20:06:44', 0, 0),
(16, '50', 'afro.jpg', '2019-02-04 20:11:07', 1, 0),
(17, '50', 'baby-look-like-he-pays-his-own-child-support-funny-ghetto-memes.jpg', '2019-02-04 20:11:14', 0, 0),
(18, '50', 'How-to-insult-funny-meme-700x520.jpg', '2019-02-04 20:11:34', 3, 0),
(19, '50', 'Reasons-to-date-me---funny-memes.jpg', '2019-02-04 20:11:43', 4, 0),
(20, '50', 'trump-grumpy-neighbor-57357d015f9b58723d508c22.jpg', '2019-02-04 20:12:06', 0, 0),
(21, '50', '15-funny-memes-that-will-make-you-lol-3.jpg', '2019-02-04 20:14:37', 3, 0),
(22, '50', '51z+4-VDOzL.jpg', '2019-02-04 20:14:48', 2, 0),
(23, '50', '5722f14a32a05.jpg', '2019-02-04 20:14:56', 0, 0),
(24, '50', 'a6551844efa2f043b69e175d1bf0d83e.jpg', '2019-02-04 20:15:07', 0, 0),
(25, '50', 'yellow-octopus-funny-memes-20.jpg', '2019-02-04 20:15:20', 2, 0),
(26, '50', '11a00cb95945704f1722feee887c8c07.jpg', '2019-02-04 20:20:15', 3, 0),
(27, '50', '25mmmt.jpg', '2019-02-04 20:20:21', 2, 0),
(29, '50', '32rg9nnkpdno.jpg', '2019-02-04 20:20:31', 4, 1),
(30, '50', '41Q-a-I8PYL.jpg', '2019-02-04 20:20:39', 3, 0),
(31, '50', 'funny-memes164.jpg', '2019-02-04 20:20:53', 3, 0),
(32, '50', 'Funny-memes-about-girls.jpeg', '2019-02-04 20:21:01', 2, 0),
(33, '50', 'funny-memes-for-girls-entity-13-800x720.png', '2019-02-04 20:21:08', 2, 0),
(34, '50', 'hilarious-memes.jpg', '2019-02-04 20:21:15', 3, 0),
(35, '50', 'list.jpg', '2019-02-04 20:21:20', 1, 0),
(36, '50', 'seal.jpg', '2019-02-04 20:21:26', 1, 0),
(37, '50', 'yellow-octopus-funny-memes-58.jpg', '2019-02-04 20:21:34', 3, 0),
(38, '50', '7-I-need-someone-who-trusts-me-as-much-as-this-woman-trusts-her-shirt-funny-meme.jpg', '2019-02-04 20:23:37', 0, 0),
(39, '50', '20-Hilarious-Funny-Cute-Baby-Meme-On-Internet-5.jpg', '2019-02-04 20:23:49', 2, 0),
(40, '50', '5722f26fede89.jpg', '2019-02-04 20:23:59', 0, 0),
(41, '50', '35623425.jpg', '2019-02-04 20:24:07', 1, 0),
(42, '50', 'best_science_memes_base-570bcb763df78c7d9ef699be.jpg', '2019-02-04 20:24:14', 1, 0),
(43, '50', 'funny-memes-about-mexicans.jpg', '2019-02-04 20:24:24', 0, 0),
(44, '50', 'Funny-memes-about-school-1.jpeg', '2019-02-04 20:24:31', 1, 0),
(45, '50', 'funny-memes-for-girls-entity-10-800x720.png', '2019-02-04 20:24:39', 1, 0),
(46, '50', 'when-your-grandpa-super-funny-memes.jpg', '2019-02-04 20:24:45', 1, 0),
(47, '50', 'yellow-octopus-funny-memes-162.png', '2019-02-04 20:24:52', 0, 0),
(48, '65', '5c5a00de2600e.jpeg', '2019-02-05 19:45:54', 2, 0),
(49, '65', '5c5a01ca0932f.jpeg', '2019-02-05 19:46:02', 1, 0),
(50, '65', '5c5a057a29d2e.jpeg', '2019-02-05 19:46:09', 0, 0),
(51, '65', '58lppiov1te21.jpg', '2019-02-05 19:46:16', 3, 1),
(52, '65', 'Your_Crush_Is_Behind_You_Funny_Meme.jpg', '2019-02-05 19:46:25', 0, 0),
(53, '65', '83-5bc9940ba1fa0__700.jpg', '2019-02-05 19:46:35', 0, 0),
(54, '65', '992e45cedd60d0ffac9a766bd233a21c--good-things-funny-things.jpg', '2019-02-05 19:46:43', 2, 0),
(55, '65', 'a6899e1ca968999a97f3d4f2249e3e5d.jpg', '2019-02-05 19:46:51', 1, 0),
(56, '65', 'e966288fd45a8f29896003ebc118d74c.jpg', '2019-02-05 19:46:58', 1, 0),
(57, '65', 'memes-18.jpg', '2019-02-05 19:47:04', 2, 0),
(58, '66', '0_xeEN-G9FbdT26TdY.jpeg', '2019-02-05 19:56:00', 3, 0),
(59, '66', '0d12c44c7ecf1e650892bf512b8e82dc.jpg', '2019-02-05 19:56:09', 1, 0),
(60, '66', '18.jpg', '2019-02-05 19:56:16', 1, 0),
(61, '66', '3756132cac5709343c7071c72fa29c5d03ae9f6c753cc9784a9966f5e0466d0d.jpg', '2019-02-05 19:56:24', 1, 0),
(62, '66', 'download.jpg', '2019-02-05 19:56:37', 0, 0),
(63, '66', 'meme-005-07152015.jpg', '2019-02-05 19:56:44', 3, 0),
(64, '66', 'wedding-2.jpg', '2019-02-05 19:56:51', 0, 0),
(65, '66', 'wedding-3.jpg', '2019-02-05 19:56:59', 1, 0),
(66, '66', 'weed.jpg', '2019-02-05 19:57:04', 0, 0),
(67, '66', 'when-ur-electric-toothbrush-breaks-ig-meme-mang-we-leak-13507247.png', '2019-02-05 19:57:12', 1, 0),
(68, '67', '1-kids-are-kids.jpg', '2019-02-05 20:03:39', 1, 0),
(69, '67', '52938d6bc8d18171bb5429e736a508d3-VGYCip.jpg', '2019-02-05 20:03:44', 1, 0),
(70, '67', 'a8ae4e1ae603f3d16d4c4a45ea7596bd.jpg', '2019-02-05 20:03:49', 0, 0),
(71, '67', 'aB8b79D_460s.jpg', '2019-02-05 20:03:56', 1, 0),
(72, '67', 'FERERT-5bbb3cbfba4fc__700.jpg', '2019-02-05 20:04:04', 0, 0),
(73, '67', 'funny-memes-for-girls-entity-13-800x720.png', '2019-02-05 20:04:12', 2, 0),
(74, '67', 'hilarious-memes-that-will-lighten-up-your-mood-22.jpg', '2019-02-05 20:04:18', 1, 0),
(75, '67', 'ut8Npez.jpg', '2019-02-05 20:04:44', 0, 0),
(76, '67', 'yellow-octopus-funny-memes-72.jpg', '2019-02-05 20:04:51', 1, 0),
(77, '68', '7C4HDFUGQ2VJQZ5NPXERQ24FM2T3JZFV.jpeg', '2019-02-05 20:09:06', 1, 0),
(78, '68', '15goqz.jpg', '2019-02-05 20:09:11', 1, 0),
(79, '68', 'fa0cc0f1f934c5d884a180b166a2daaaf4631b6989421fe6717123461c234b34.jpg', '2019-02-05 20:09:18', 3, 0),
(80, '68', 'i-dont-always-visit-porn-sites_o_155541.jpg', '2019-02-05 20:09:25', 0, 0),
(81, '68', 'images.jpg', '2019-02-05 20:09:31', 0, 0),
(82, '68', 'jdlp3bc7kre21.jpg', '2019-02-05 20:09:37', 2, 0),
(83, '68', 'mwtgnmm3jte21.jpg', '2019-02-05 20:09:43', 3, 0),
(84, '68', 'p26gdd0hyte21.jpg', '2019-02-05 20:09:50', 2, 0),
(85, '68', 'to-a-lot-of-the-girls-who-put-their-weight-as-average-on-online-dating-sites-21653.jpg', '2019-02-05 20:09:57', 0, 0),
(86, '68', 'x5a67xtw1se21.jpg', '2019-02-05 20:10:03', 0, 0),
(87, '50', 'funny-minecraft.jpg', '2019-02-08 14:44:58', 5, 1),
(88, '50', '51375771_251986572387314_1005249263271149568_n.jpg', '2019-02-08 14:51:45', 1, 0),
(89, '50', '51477338_365915097577760_6426224342807347200_n.jpg', '2019-02-08 14:57:48', 0, 1),
(90, '2348259505184442', '52020763_2247905362198685_4149967357546070016_n.jpg', '2019-02-13 09:18:42', 0, 0),
(91, '2348259505184442', '51939079_600617707052806_3120782074030587904_n.jpg', '2019-02-15 16:07:43', 4, 0),
(92, '2348259505184442', '51861077_2675611592465536_5591759154071994368_n.jpg', '2019-02-15 16:08:33', 2, 0),
(93, '2348259505184442', 'twinkie.jpg', '2019-02-15 16:12:12', 1, 0),
(94, '2348259505184442', '51727693_1515783325222051_2137171616205897728_n.jpg', '2019-02-15 16:17:06', 1, 0),
(95, '2348259505184442', 'guy.jpg', '2019-02-15 16:21:37', 0, 0),
(96, '2348259505184442', 'old.jpg', '2019-02-15 16:23:32', 2, 0),
(97, '2348259505184442', 'best-day.jpg', '2019-02-15 16:27:33', 4, 0),
(98, '2348259505184442', 'taco.jpg', '2019-02-15 16:46:27', 2, 0),
(99, '2348259505184442', 'time.jpg', '2019-02-15 16:55:38', 0, 0),
(100, '2348259505184442', 'FB_IMG_1550277578248.jpg', '2019-02-15 17:42:20', 1, 0),
(101, '2348259505184442', 'FB_IMG_1551629721835.jpg', '2019-03-03 09:17:07', 2, 0),
(102, '2348259505184442', 'FB_IMG_1551629660910.jpg', '2019-03-03 09:17:22', 1, 0),
(103, '2348259505184442', 'FB_IMG_1551629644342.jpg', '2019-03-03 09:17:34', 0, 0),
(104, '2348259505184442', 'FB_IMG_1551629592990.jpg', '2019-03-03 09:17:50', 3, 0),
(105, '2348259505184442', 'FB_IMG_1551629543107.jpg', '2019-03-03 09:18:04', 2, 0),
(106, '2348259505184442', 'FB_IMG_1551629537233.jpg', '2019-03-03 09:18:18', 3, 0),
(107, '2348259505184442', 'FB_IMG_1551630705446.jpg', '2019-03-03 09:32:06', 2, 0),
(108, '2348259505184442', 'FB_IMG_1551630537932.jpg', '2019-03-03 09:32:20', 2, 0),
(109, '2348259505184442', 'FB_IMG_1551630420634.jpg', '2019-03-03 09:32:32', 0, 0),
(110, '2348259505184442', 'FB_IMG_1551630404323.jpg', '2019-03-03 09:32:45', 4, 0),
(111, '2348259505184442', 'FB_IMG_1551630338177.jpg', '2019-03-03 09:33:00', 0, 0),
(112, '2348259505184442', 'FB_IMG_1551630323939.jpg', '2019-03-03 09:33:15', 0, 0),
(113, '2348259505184442', 'FB_IMG_1551631185855.jpg', '2019-03-03 09:41:14', 1, 0),
(114, '2348259505184442', 'FB_IMG_1551631494948.jpg', '2019-03-03 09:45:04', 0, 1),
(115, '2348259505184442', 'FB_IMG_1551659368670.jpg', '2019-03-03 17:30:30', 4, 0),
(116, '2348259505184442', 'FB_IMG_1551709573519.jpg', '2019-03-04 07:27:00', 0, 0),
(117, '2348259505184442', 'FB_IMG_1551711310898.jpg', '2019-03-04 07:55:59', 2, 0),
(118, '2348259505184442', 'FB_IMG_1551712613366.jpg', '2019-03-04 08:17:34', 2, 0),
(119, '2348259505184442', 'FB_IMG_1551723156597.jpg', '2019-03-04 11:13:21', 0, 0),
(120, '2348259505184442', 'FB_IMG_1551729194594.jpg', '2019-03-04 12:53:59', 1, 0),
(121, '1189281027904764', 'e92435d.jpg', '2019-03-08 18:28:49', 1, 0),
(122, '2348259505184442', 'FB_IMG_1552256731527.jpg', '2019-03-10 16:27:57', 1, 0),
(123, '10100363172616724', 'FB_IMG_1546997376840.jpg', '2019-03-12 17:39:20', 2, 0),
(124, '2348259505184442', 'FB_IMG_1555632159775.jpg', '2019-04-18 19:07:00', 0, 0),
(125, '2348259505184442', 'FB_IMG_1555631970612.jpg', '2019-04-18 19:07:19', 0, 0),
(126, '2348259505184442', 'FB_IMG_1555509036966.jpg', '2019-04-18 19:07:39', 2, 0),
(127, '2348259505184442', 'FB_IMG_1555332870376.jpg', '2019-04-18 19:08:07', 2, 0),
(128, '2348259505184442', 'FB_IMG_1554993063471.jpg', '2019-04-18 19:08:34', 2, 0),
(129, '2348259505184442', 'FB_IMG_1555001943195.jpg', '2019-04-18 19:09:53', 2, 0),
(130, '2348259505184442', 'FB_IMG_1558228066070.jpg', '2019-05-19 16:48:29', 1, 0),
(131, '2348259505184442', '72383509_154742035764407_7632686364265283584_n.jpg', '2019-10-18 18:11:04', 2, 0),
(132, '2348259505184442', 'FB_IMG_1571532588740.jpg', '2019-10-20 15:54:32', 3, 0),
(133, '2348259505184442', 'FB_IMG_1571530867158.jpg', '2019-10-20 15:54:48', 2, 0),
(134, '2348259505184442', 'FB_IMG_1578355696777.jpg', '2020-01-10 06:56:34', 0, 0),
(135, '2348259505184442', 'FB_IMG_1578259892777.jpg', '2020-01-10 06:56:53', 3, 0),
(136, '2348259505184442', 'FB_IMG_1577458072223.jpg', '2020-01-10 06:57:22', 1, 0),
(137, '2348259505184442', 'FB_IMG_1577321873938.jpg', '2020-01-10 06:57:58', 0, 0),
(138, '2348259505184442', 'FB_IMG_1575234476462.jpg', '2020-01-10 06:58:38', 3, 0),
(139, '2348259505184442', 'metallica.jpg', '2020-01-10 17:10:53', 2, 0),
(140, '2348259505184442', 'baby-yoda-memes.jpg', '2020-01-11 19:29:08', 0, 0),
(141, '2348259505184442', 'angry-woman-and-cat.jpg', '2020-01-11 19:49:21', 1, 0),
(142, '2348259505184442', 'momo.jpeg', '2020-01-11 20:20:29', 1, 0),
(143, '10157112650642309', 'oprah-flu-meme-768x540.jpg', '2020-01-22 09:05:42', 1, 0),
(144, '10157112650642309', 'funny-memes-job-interview-special-skills-1.jpg', '2020-01-22 09:06:05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weeklywinners`
--

CREATE TABLE `weeklywinners` (
  `ID` int(11) NOT NULL,
  `User` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MemePath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weeklywinners`
--

INSERT INTO `weeklywinners` (`ID`, `User`, `Email`, `MemePath`, `Date`) VALUES
(1, 'chrono232003', 'chrono232003@gmail.com', 'images/50-32rg9nnkpdno.jpg', '2019-02-06 09:45:02'),
(2, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-7-I-need-someone-who-trusts-me-as-much-as-this-woman-trusts-her-shirt-funny-meme.jpg', '2019-02-11 10:05:03'),
(3, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-yellow-octopus-funny-memes-162.png', '2019-02-17 00:00:02'),
(4, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-afro.jpg', '2019-02-24 00:00:01'),
(5, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-32rg9nnkpdno.jpg', '2019-03-17 00:00:01'),
(6, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-afro.jpg', '2019-04-07 00:00:02'),
(7, 'chrono232003', 'chrono232003@yahoo.com', 'images/50-7-I-need-someone-who-trusts-me-as-much-as-this-woman-trusts-her-shirt-funny-meme.jpg', '2019-10-20 15:51:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `memes`
--
ALTER TABLE `memes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `weeklywinners`
--
ALTER TABLE `weeklywinners`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `memes`
--
ALTER TABLE `memes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `weeklywinners`
--
ALTER TABLE `weeklywinners`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
