-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2015 at 03:55 AM
-- Server version: 5.0.51b-community-nt-log
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_help_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tp_attachment`
--

CREATE TABLE IF NOT EXISTS `tp_attachment` (
  `id` int(9) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `typepost` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbimage` varchar(255) NOT NULL,
  `time` int(20) NOT NULL,
  `size` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `orders` int(9) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tp_attachment`
--

INSERT INTO `tp_attachment` (`id`, `title`, `typepost`, `url`, `thumbimage`, `time`, `size`, `type`, `dimensions`, `orders`, `status`) VALUES
(3, 'Fantastic_City_Wallpaper_26_', 'post', '../uploads/tempimg/admin_1910974847_1447151263.jpg', '../uploads/tempimg/admin_1910974847_1447151263.jpg', 1447151263, 931935, 'image/jpeg', '1920 × 1440', 1, 1),
(4, 'baby_1', 'site', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/baby_1.jpg', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/baby_1.jpg', 1447151372, 16159, 'image/jpeg', '288 × 192', 1, 1),
(5, 'Fantastic_City_Wallpaper_12_', 'site', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/Fantastic_City_Wallpaper_12_.jpg', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/Fantastic_City_Wallpaper_12_.jpg', 1447151477, 474869, 'image/jpeg', '1024 × 768', 1, 1),
(6, 'choice_way_1366x768', 'site', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/choice_way_1366x768.jpg', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/choice_way_1366x768.jpg', 1447153951, 457765, 'image/jpeg', '1366 × 768', 1, 1),
(7, 'slideshow_02', 'site', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/slideshow_02.jpg', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/slideshow_02.jpg', 1447154007, 225201, 'image/jpeg', '1920 × 1200', 1, 1),
(8, 'intro_cover', 'site', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/intro_cover.jpg', 'http://localhost/envato/works/php-help-manager-v2.0/uploads/site/intro_cover.jpg', 1447161538, 227571, 'image/jpeg', '1920 × 1200', 1, 1),
(9, 'intro_cover', 'post', '../uploads/tempimg/admin_1868787418_1447162319.jpg', '../uploads/tempimg/admin_1868787418_1447162319.jpg', 1447162319, 227571, 'image/jpeg', '1920 × 1200', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tp_config`
--

CREATE TABLE IF NOT EXISTS `tp_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tp_config`
--

INSERT INTO `tp_config` (`config_name`, `config_value`) VALUES
('sitethemes', 'helpdesk'),
('session_id', 'user_helpdesk_id'),
('session_name', 'user_helpdesk_name'),
('charset', 'UTF-8'),
('dateformat', 'F j, Y'),
('sitekey', 'Site wide Meta Keywords'),
('sitedesc', 'Site wide Meta Description'),
('session_length', '3600'),
('acp_session_id', 'acp_megatplhelpdesk_id'),
('acp_session_name', 'acp_megatplhelpdesk_name'),
('lastactivity', '3600'),
('typeuploads', 'gif|png|jpg|jpeg|bmp'),
('gzip_compress', '1'),
('per_page', '6'),
('userper_page', '12'),
('per_popular', '7'),
('defaultcatnews', '0'),
('defaultcatarticle', '0'),
('permalink', 'numeric'),
('folderadmin', 'admin'),
('bg_color', '#ffffff'),
('bg_image', ''),
('bg_logo', ''),
('bg_favicon', ''),
('pageabout', '1'),
('pageprivacy', '2'),
('pagecontact', '3'),
('themecolor', ''),
('facebook', '#'),
('twitter', '#'),
('googleplus', '#'),
('youtube', '#'),
('instagram', '#'),
('facebook_status', 'on'),
('twitter_status', 'on'),
('google_status', 'on'),
('youtube_status', 'on'),
('instagram_status', 'on'),
('gravatar', '0'),
('voting', '0'),
('timezone_string', 'Africa/Cairo'),
('timeformat', 'g:i a'),
('version', '2.0'),
('helpdesk_theme_options', 'a:28:{s:8:"iconbox1";s:12:"fa-life-ring";s:9:"titlebox1";s:4:"FAQS";s:8:"linkbox1";s:18:"index.php?mode=faq";s:13:"titlelinkbox1";s:10:"Visit FAQS";s:11:"bgcolorbox1";s:7:"#5CACE2";s:13:"textcolorbox1";s:7:"#ffffff";s:8:"textbox1";s:84:"Did you visit our FAQS section?\r\n<br />\r\nYou will probably find the answer right way";s:8:"iconbox2";s:14:"fa-file-text-o";s:9:"titlebox2";s:14:"Knowledge Base";s:8:"linkbox2";s:28:"index.php?mode=knowledgebase";s:13:"titlelinkbox2";s:22:"Browser Knowledge Base";s:11:"bgcolorbox2";s:7:"#E74C3C";s:13:"textcolorbox2";s:7:"#ffffff";s:8:"textbox2";s:91:"We have knowledge articles.\r\n<br />\r\nPlease type keywords on the search above or broser it.";s:8:"iconbox3";s:11:"fa-bullhorn";s:9:"titlebox3";s:4:"News";s:8:"linkbox3";s:19:"index.php?mode=news";s:13:"titlelinkbox3";s:12:"Browser News";s:11:"bgcolorbox3";s:7:"#F1C40F";s:13:"textcolorbox3";s:7:"#ffffff";s:8:"textbox3";s:64:"Did you visit our News section?\r\n<br />\r\nYou may find help News.";s:23:"cover_background_header";s:80:"http://localhost/envato/works/php-help-manager-v2.0/uploads/site/intro_cover.jpg";s:12:"title_header";s:21:"PHP Help manager v2.0";s:18:"title_header_color";s:7:"#ffffff";s:14:"tagline_header";s:45:"A premium script  Knowledge Base & News & FAQ";s:20:"tagline_header_color";s:7:"#fcfcfc";s:18:"Search_show_header";s:2:"on";s:25:"Search_placeholder_header";s:9:"Search...";}'),
('mailer_header', '<blockquote class="ecxgmail_quote" style="max-width: 500px;margin: 10px auto;">\r\n<div dir="rtl">\r\n<table cellspacing="0" cellpadding="0" width="100%" style="color:#666666;background-color:#fafafa;border:1px solid #e7e7e7;border-collapse:collapse">\r\n<tbody><tr>\r\n<td>\r\n<div style="padding:10px"><div class="ecxim">\r\n<table width="100%" dir="ltr" align="center" style="border-collapse:collapse" border="0" cellpadding="0">\r\n<tbody><tr>\r\n<td width="70%">\r\n<span style="font-size:22pt;font-family:Tahoma,sans-serif;color:#666666">  </span>\r\n{$sitename}\r\n</td>\r\n<td width="30%" style="font-size:8pt;color:#666666;text-align:right;">\r\n {$time}\r\n</td>\r\n</tr>\r\n</tbody></table>\r\n<hr color="#E7E7E7" size="1">\r\n</div>\r\n<div style="text-align:left;padding:10px 0 0px 0;color:#444444;font-family:Tahoma,Verdana,sans-serif;font-size:8pt">\r\n'),
('mailer_footer', '<br /><br />\r\n<div class="ecxim">\r\n<hr color="#E7E7E7" size="1">\r\n<div style="font-family:Tahoma,Verdana,sans-serif;font-size:8pt;color:#666666;padding:10px 0px 0px 0;text-align:center;">\r\nCopyright &copy; {$sitename}\r\n</div>\r\n</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p style="text-align: center;">Please do not reply to this message.</p>\r\n</blockquote>'),
('mailer_register_activation', '<p style="text-align:left;" dir="ltr">\nHello, {$firstname} {$lastname} ({$username})\n<br><br>\nThank you for signing up for {$sitename}\n<br><br>\nActivating your account. <br>\nClick on the link below or copy and paste it into your browser''s address bar.\n<br><br>\n<a href="{$siteurl}users.php?mode=activate&key={$keyforget}&login={$username}">Activating your account</a>\n</p>'),
('mailer_register', '<p style="text-align:left;" dir="ltr">Hello, {$firstname} {$lastname} ({$username})\r\n<br><br>\r\nWelcome to the <a href="{$siteurl}">{$sitename}</a>\r\n</p>'),
('mailer_forget_password', '<p style="text-align:left" dir="ltr">Hello, {$firstname} {$lastname} ({$username})\n<br>\n<br>\nBeen sent a request to change your password, you can do so by clicking on the following link:\n<br><br>\n<a href="{$siteurl}users.php?mode=forget&key={$keyforget}&login={$username}">\nchange your password</a>\n<br><br><br>\nIf you do not send this request, please ignore this message.\n</p>'),
('mailer_forget_sucess', '<p style="text-align:left" dir="ltr">Hello, {$firstname} {$lastname} ({$username})\r\n<br>\r\n<br>\r\nchange your password\r\n<br><br>\r\n</p>'),
('mailer_update_password', '<p style="text-align:left" dir="ltr">Hello, {$firstname} {$lastname} ({$username})\r\n<br>\r\n<br>\r\nchange your password\r\n<br><br>\r\n</p>'),
('mailer_contact', '<p style="text-align:left" dir="ltr">\r\nusername: {$username}\r\n<br>\r\nemail: {$email}\r\n<br>\r\nsubject: {$subject}\r\n<br>\r\n<br>\r\nmessage:\r\n<br>\r\n{$message}\r\n</p>'),
('registration_status', '1'),
('registration_activation', '1'),
('pageknowledgebase', 'everyone'),
('pagenews', 'everyone'),
('pagefaq', 'everyone'),
('showpageusers', 'everyone'),
('showprofileusers', 'everyone'),
('sitename', 'Php Help Manager v2.0'),
('sitemail', 'megatpl@gmail.com'),
('description', 'Tagline'),
('siteurl', 'http://localhost/envato/works/php-help-manager-v2.0/');

-- --------------------------------------------------------

--
-- Table structure for table `tp_counter`
--

CREATE TABLE IF NOT EXISTS `tp_counter` (
  `id` int(11) NOT NULL auto_increment,
  `meta_key` varchar(50) NOT NULL,
  `ip` varchar(100) default NULL,
  `modified` int(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `tp_counter`
--

INSERT INTO `tp_counter` (`id`, `meta_key`, `ip`, `modified`) VALUES
(1, 'visits', '127.0.0.1', 1447151617),
(2, 'visits', '127.0.0.1', 1447151629),
(3, 'visits', '127.0.0.1', 1447151637),
(4, 'visits', '127.0.0.1', 1447151683),
(5, 'visits', '127.0.0.1', 1447151705),
(6, 'visits', '127.0.0.1', 1447151753),
(7, 'visits', '127.0.0.1', 1447151776),
(8, 'visits', '127.0.0.1', 1447151817),
(9, 'visits', '127.0.0.1', 1447151859),
(10, 'visits', '127.0.0.1', 1447151929),
(11, 'visits', '127.0.0.1', 1447153845),
(12, 'visits', '127.0.0.1', 1447153962),
(13, 'visits', '127.0.0.1', 1447154017),
(14, 'visits', '127.0.0.1', 1447154695),
(15, 'visits', '127.0.0.1', 1447154703),
(16, 'visits', '127.0.0.1', 1447154710),
(17, 'visits', '127.0.0.1', 1447154782),
(18, 'visits', '127.0.0.1', 1447154841),
(19, 'visits', '127.0.0.1', 1447154901),
(20, 'visits', '127.0.0.1', 1447154920),
(21, 'visits', '127.0.0.1', 1447154994),
(22, 'visits', '127.0.0.1', 1447155010),
(23, 'visits', '127.0.0.1', 1447155275),
(24, 'visits', '127.0.0.1', 1447155292),
(25, 'visits', '127.0.0.1', 1447155307),
(26, 'visits', '127.0.0.1', 1447155454),
(27, 'visits', '127.0.0.1', 1447155650),
(28, 'visits', '127.0.0.1', 1447155661),
(29, 'visits', '127.0.0.1', 1447155668),
(30, 'visits', '127.0.0.1', 1447155676),
(31, 'visits', '127.0.0.1', 1447155681),
(32, 'visits', '127.0.0.1', 1447155740),
(33, 'visits', '127.0.0.1', 1447155763),
(34, 'visits', '127.0.0.1', 1447156204),
(35, 'visits', '127.0.0.1', 1447156392),
(36, 'visits', '127.0.0.1', 1447156449),
(37, 'visits', '127.0.0.1', 1447156456),
(38, 'visits', '127.0.0.1', 1447156461),
(39, 'visits', '127.0.0.1', 1447156474),
(40, 'visits', '127.0.0.1', 1447156475),
(41, 'visits', '127.0.0.1', 1447156535),
(42, 'visits', '127.0.0.1', 1447156548),
(43, 'visits', '127.0.0.1', 1447156562),
(44, 'visits', '127.0.0.1', 1447156564),
(45, 'visits', '127.0.0.1', 1447156573),
(46, 'visits', '127.0.0.1', 1447156575),
(47, 'visits', '127.0.0.1', 1447156578),
(48, 'visits', '127.0.0.1', 1447156579),
(49, 'visits', '127.0.0.1', 1447156585),
(50, 'visits', '127.0.0.1', 1447156589),
(51, 'visits', '127.0.0.1', 1447156597),
(52, 'visits', '127.0.0.1', 1447156649),
(53, 'visits', '127.0.0.1', 1447156714),
(54, 'visits', '127.0.0.1', 1447156756),
(55, 'visits', '127.0.0.1', 1447156774),
(56, 'visits', '127.0.0.1', 1447160011),
(57, 'visits', '127.0.0.1', 1447160016),
(58, 'visits', '127.0.0.1', 1447160214),
(59, 'visits', '127.0.0.1', 1447160225),
(60, 'visits', '127.0.0.1', 1447160226),
(61, 'visits', '127.0.0.1', 1447160228),
(62, 'visits', '127.0.0.1', 1447160229),
(63, 'visits', '127.0.0.1', 1447160231),
(64, 'visits', '127.0.0.1', 1447160235),
(65, 'visits', '127.0.0.1', 1447160237),
(66, 'visits', '127.0.0.1', 1447160249),
(67, 'visits', '127.0.0.1', 1447160252),
(68, 'visits', '127.0.0.1', 1447160259),
(69, 'visits', '127.0.0.1', 1447160264),
(70, 'visits', '127.0.0.1', 1447160268),
(71, 'visits', '127.0.0.1', 1447160269),
(72, 'visits', '127.0.0.1', 1447160275),
(73, 'visits', '127.0.0.1', 1447160303),
(74, 'visits', '127.0.0.1', 1447160307),
(75, 'visits', '127.0.0.1', 1447161379),
(76, 'visits', '127.0.0.1', 1447161465),
(77, 'visits', '127.0.0.1', 1447161546),
(78, 'visits', '127.0.0.1', 1447161648),
(79, 'visits', '127.0.0.1', 1447161665),
(80, 'visits', '127.0.0.1', 1447161674),
(81, 'visits', '127.0.0.1', 1447161678),
(82, 'visits', '127.0.0.1', 1447161682),
(83, 'visits', '127.0.0.1', 1447161685),
(84, 'visits', '127.0.0.1', 1447161716),
(85, 'visits', '127.0.0.1', 1447161742),
(86, 'visits', '127.0.0.1', 1447161765),
(87, 'visits', '127.0.0.1', 1447161802),
(88, 'visits', '127.0.0.1', 1447161827),
(89, 'visits', '127.0.0.1', 1447161831),
(90, 'visits', '127.0.0.1', 1447161836),
(91, 'visits', '127.0.0.1', 1447162461),
(92, 'visits', '127.0.0.1', 1447162629),
(93, 'visits', '127.0.0.1', 1447162632),
(94, 'visits', '127.0.0.1', 1447162667),
(95, 'visits', '127.0.0.1', 1447162671),
(96, 'visits', '127.0.0.1', 1447162885),
(97, 'visits', '127.0.0.1', 1447162959),
(98, 'visits', '127.0.0.1', 1447163035),
(99, 'visits', '127.0.0.1', 1447163179),
(100, 'visits', '127.0.0.1', 1447163283),
(101, 'visits', '127.0.0.1', 1447163536),
(102, 'visits', '127.0.0.1', 1447163782),
(103, 'visits', '127.0.0.1', 1447163855),
(104, 'visits', '127.0.0.1', 1447163860),
(105, 'visits', '127.0.0.1', 1447163863),
(106, 'visits', '127.0.0.1', 1447163877),
(107, 'visits', '127.0.0.1', 1447163895),
(108, 'visits', '127.0.0.1', 1447163899),
(109, 'visits', '127.0.0.1', 1447163905),
(110, 'visits', '127.0.0.1', 1447163920),
(111, 'visits', '127.0.0.1', 1447163921),
(112, 'visits', '127.0.0.1', 1447163931),
(113, 'visits', '127.0.0.1', 1447163935),
(114, 'visits', '127.0.0.1', 1447164130),
(115, 'visits', '127.0.0.1', 1447164135),
(116, 'visits', '127.0.0.1', 1447164531),
(117, 'visits', '127.0.0.1', 1447164537),
(118, 'visits', '127.0.0.1', 1447165023),
(119, 'visits', '127.0.0.1', 1447165036),
(120, 'visits', '127.0.0.1', 1447165074),
(121, 'visits', '127.0.0.1', 1447165078),
(122, 'visits', '127.0.0.1', 1447165080),
(123, 'visits', '127.0.0.1', 1447165083),
(124, 'visits', '127.0.0.1', 1447165088),
(125, 'visits', '127.0.0.1', 1447165090),
(126, 'visits', '127.0.0.1', 1447165108),
(127, 'visits', '127.0.0.1', 1447165371),
(128, 'visits', '127.0.0.1', 1447165377),
(129, 'visits', '127.0.0.1', 1447165381),
(130, 'visits', '127.0.0.1', 1447166064),
(131, 'visits', '127.0.0.1', 1447166082),
(132, 'visits', '127.0.0.1', 1447189636),
(133, 'visits', '127.0.0.1', 1447189640),
(134, 'visits', '127.0.0.1', 1447240920),
(135, 'visits', '127.0.0.1', 1447240925),
(136, 'visits', '127.0.0.1', 1447242210),
(137, 'visits', '127.0.0.1', 1447242246),
(138, 'visits', '127.0.0.1', 1447494823);

-- --------------------------------------------------------

--
-- Table structure for table `tp_languages`
--

CREATE TABLE IF NOT EXISTS `tp_languages` (
  `id` int(9) NOT NULL auto_increment,
  `code` varchar(8) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL default '0',
  `regex` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL,
  `defaultd` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `language_default` (`defaultd`),
  KEY `language_code` (`code`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tp_languages`
--

INSERT INTO `tp_languages` (`id`, `code`, `name`, `regex`, `active`, `defaultd`) VALUES
(1, 'en', 'English', '/^en/i', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tp_phrases`
--

CREATE TABLE IF NOT EXISTS `tp_phrases` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lang_iso` varchar(5) NOT NULL default 'en',
  `varname` varchar(250) NOT NULL default '',
  `text` text character set utf8 collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=301 ;

--
-- Dumping data for table `tp_phrases`
--

INSERT INTO `tp_phrases` (`id`, `lang_iso`, `varname`, `text`) VALUES
(1, 'en', 'about_us', 'About us'),
(2, 'en', 'accept', 'Accept'),
(3, 'en', 'action', 'Action'),
(4, 'en', 'activate', 'activate'),
(5, 'en', 'add', 'Add'),
(6, 'en', 'add_group', 'Add Group'),
(7, 'en', 'add_language', 'Add Language'),
(8, 'en', 'add_new', 'Add New'),
(9, 'en', 'add_new_article', 'Add New Article'),
(10, 'en', 'add_new_categorie', 'Add New Categorie'),
(11, 'en', 'add_new_group', 'Add New Group'),
(12, 'en', 'add_new_language', 'Add New Language'),
(13, 'en', 'add_new_page', 'Add New Page'),
(14, 'en', 'add_new_phrase', 'Add New Phrase'),
(15, 'en', 'add_new_post', 'Add New Post'),
(16, 'en', 'add_phrase', 'Add Phrase'),
(17, 'en', 'add_picture', 'Add Picture'),
(18, 'en', 'add_user_successfully', 'Add User Successfully'),
(19, 'en', 'administrator', 'Administrator'),
(20, 'en', 'align1', 'left'),
(21, 'en', 'align2', 'center'),
(22, 'en', 'align3', 'right'),
(23, 'en', 'all_faq', 'ALL FAQ'),
(24, 'en', 'all_knowledgebase', 'ALL Knowledgebase'),
(25, 'en', 'all_news', 'ALL News'),
(26, 'en', 'appearance', 'Appearance'),
(27, 'en', 'apply', 'Apply'),
(28, 'en', 'as_default_language', 'as Default Language'),
(29, 'en', 'author', 'Author'),
(30, 'en', 'avatar_image_size_must', 'The image size must be at least 256x256 pixels.'),
(31, 'en', 'back', 'Back'),
(32, 'en', 'back_to', 'Back To'),
(33, 'en', 'been_sent_change_the_password', 'Been Sent Change The Password'),
(34, 'en', 'bulk_actions', 'Bulk Actions'),
(35, 'en', 'by', 'By'),
(36, 'en', 'cancel', 'Cancel'),
(37, 'en', 'categorie', 'Categorie'),
(38, 'en', 'categories', 'Categories'),
(39, 'en', 'cencel', 'Cencel'),
(40, 'en', 'change_avatar', 'Change Avatar'),
(41, 'en', 'change_cover', 'Change cover'),
(42, 'en', 'change_email_address', 'Change email address'),
(43, 'en', 'change_password', 'Change password'),
(44, 'en', 'click_here_to_login', 'Click here to login'),
(45, 'en', 'confirm_action', 'Are you sure of the procedure?'),
(46, 'en', 'confirm_password', 'Confirm Password'),
(47, 'en', 'contact', 'Contact'),
(48, 'en', 'content_is_available_to_members_only', 'Content is available to members only'),
(49, 'en', 'copyright', 'copyright © 2015 All Rights Reserved.'),
(50, 'en', 'count', 'Count'),
(51, 'en', 'cover_background', 'Cover Background'),
(52, 'en', 'cover_image_size_must', 'The image size must be at least 1190x260 pixels.'),
(53, 'en', 'cover_text_color', 'Cover Text Color'),
(54, 'en', 'crop_avatar', 'Crop Avatar'),
(55, 'en', 'crop_cover', 'Crop Cover'),
(56, 'en', 'dashboard', 'Dashboard'),
(57, 'en', 'date', 'Date'),
(58, 'en', 'date_format', 'Date Format'),
(59, 'en', 'deactivate', 'Deactivate'),
(60, 'en', 'delete', 'Delete'),
(61, 'en', 'delete_categorie_successfully', 'Delete Categorie Successfully'),
(62, 'en', 'delete_language_successfully', 'Delete Language Successfully.'),
(63, 'en', 'delete_post_successfully', 'Delete Post successfully.'),
(64, 'en', 'delete_users_successfully', 'delete users successfully'),
(65, 'en', 'delete_user_successfully', 'delete user successfully'),
(66, 'en', 'description', 'Description'),
(67, 'en', 'didnot_match', 'didnot match to our content in asked queries!'),
(68, 'en', 'dir', 'ltr'),
(69, 'en', 'disable', 'Disable'),
(70, 'en', 'disable_categorie_successfully', 'Disable Categorie Successfully'),
(71, 'en', 'disable_language_successfully', 'Disable Language Successfully.'),
(72, 'en', 'disable_post_successfully', 'Disable Post Successfully.'),
(73, 'en', 'down', 'Down'),
(74, 'en', 'doyou_logout', 'Do you want to log out?'),
(75, 'en', 'edit', 'Edit'),
(76, 'en', 'editing', 'Editing'),
(77, 'en', 'edit_article', 'Edit Article'),
(78, 'en', 'edit_categorie', 'Edit Categorie'),
(79, 'en', 'edit_groups', 'Edit Groups'),
(80, 'en', 'edit_page', 'Edit Page'),
(81, 'en', 'edit_phrases', 'Edit Phrases'),
(82, 'en', 'edit_post', 'Edit Post'),
(83, 'en', 'edit_profile', 'Edit Profile'),
(84, 'en', 'edit_user_successfully', 'Edit User Successfully'),
(85, 'en', 'email', 'E-mail'),
(86, 'en', 'email_address', 'Email Address'),
(87, 'en', 'email_address_is_required', 'Email Address is required.'),
(88, 'en', 'email_another_user', 'This email user by another user.'),
(89, 'en', 'email_available_registration', 'This email is available for registration.'),
(90, 'en', 'email_is_hidden', 'Email is hidden.'),
(91, 'en', 'email_or_password_is_incorrect', 'E-mail or password is incorrect'),
(92, 'en', 'email_templates', 'Email Templates'),
(93, 'en', 'enable', 'Enable'),
(94, 'en', 'enable_categorie_successfully', 'Enable Categorie Successfully'),
(95, 'en', 'enable_language_successfully', 'Enable Language Successfully.'),
(96, 'en', 'enable_post_successfully', 'Enable Post Successfully.'),
(97, 'en', 'english_only_characters', 'English only characters'),
(98, 'en', 'enter_email_address', 'Enter Email address'),
(99, 'en', 'enter_message', 'Enter Message'),
(100, 'en', 'enter_subject', 'Enter Subject'),
(101, 'en', 'enter_the_new_email_address', 'Enter the new Email address'),
(102, 'en', 'enter_the_new_password', 'Enter the new password'),
(103, 'en', 'enter_title_here', 'Enter title here'),
(104, 'en', 'enter_username', 'Enter Username'),
(105, 'en', 'error_permission', 'error permission'),
(106, 'en', 'everyone', 'Everyone'),
(107, 'en', 'export', 'Export'),
(108, 'en', 'e_mail', 'E-Mail'),
(109, 'en', 'facebook', 'Facebook'),
(110, 'en', 'facebook_url', 'Facebook URL'),
(111, 'en', 'faq', 'FAQ'),
(112, 'en', 'faq_items', 'FAQ Items'),
(113, 'en', 'favicon', 'Favicon'),
(114, 'en', 'featured_image', 'Featured Image'),
(115, 'en', 'firstname', 'Firstname'),
(116, 'en', 'first_name_is_required', 'First name is required'),
(117, 'en', 'follow_us_on_facebook', 'Follow us on Facebook'),
(118, 'en', 'follow_us_on_google', 'Follow us on Google+'),
(119, 'en', 'follow_us_on_twitter', 'Follow us on Twitter'),
(120, 'en', 'forget_password', 'Forget Password?'),
(121, 'en', 'forget_your_password', 'forget your password'),
(122, 'en', 'frequently_asked_questions', 'Frequently Asked Questions'),
(123, 'en', 'full_name', 'Full Name'),
(124, 'en', 'general_setting', 'General Setting'),
(125, 'en', 'google', 'Google+'),
(126, 'en', 'google_url', 'Google+ URL'),
(127, 'en', 'group', 'Group'),
(128, 'en', 'gzip_compress', 'GZIP Compress'),
(129, 'en', 'home', 'Home'),
(130, 'en', 'howdy', 'Howdy,'),
(131, 'en', 'if_you_already_have_an_account', 'If You already have an account'),
(132, 'en', 'if_you_dont_have_account', 'If You Dont have account'),
(133, 'en', 'in', 'in'),
(134, 'en', 'infoposts', 'Posts'),
(135, 'en', 'info_add_newphrase', 'To display this text in your template , simple add this where you want to display your text'),
(136, 'en', 'info_change_password', 'If you would like to change the password type a new one.<br/>Otherwise leave this blank.'),
(137, 'en', 'inf_upload_language', 'Browse Language File ( must be .xml format )'),
(138, 'en', 'instagram', 'Instagram'),
(139, 'en', 'instagram_url', 'Instagram URL'),
(140, 'en', 'isadmin', 'Admin'),
(141, 'en', 'items', 'items'),
(142, 'en', 'items_per_page', 'Items Per Page'),
(143, 'en', 'items_per_popular', 'Items Per Popular'),
(144, 'en', 'join_new', 'Join New'),
(145, 'en', 'knowledge', 'Knowledge'),
(146, 'en', 'knowledge_base', 'Knowledge Base'),
(147, 'en', 'lang', 'en'),
(148, 'en', 'language', 'Language'),
(149, 'en', 'language_code', 'Language Code'),
(150, 'en', 'language_name', 'Language Name'),
(151, 'en', 'language_regex', 'Language Regex'),
(152, 'en', 'language_settings', 'Language Setting'),
(153, 'en', 'lastname', 'Lastname'),
(154, 'en', 'last_name_is_required', 'Last name is required'),
(155, 'en', 'local_time_is', 'Local time is'),
(156, 'en', 'location', 'Location'),
(157, 'en', 'logged_out', 'logged out'),
(158, 'en', 'login', 'Login'),
(159, 'en', 'login_admin', 'Login Admin'),
(160, 'en', 'login_error', 'Error:Username or password entered were incorrect.'),
(161, 'en', 'logout', 'Logout'),
(162, 'en', 'make_default', 'Make Default'),
(163, 'en', 'make_sure_you_write_your_email_correctly', 'Make sure you write your email correctly.'),
(164, 'en', 'member_for', 'Member for'),
(165, 'en', 'message', 'Message'),
(166, 'en', 'messege_is_required', 'Messege is required.'),
(167, 'en', 'mgs_new_password', 'If you would like to change the password type a new one. Otherwise leave this blank.'),
(168, 'en', 'modified', 'Modified'),
(169, 'en', 'msg_name_must_be_in_english', 'The user name must be in English and does not contain symbols or distance not less than 3 letters and no more than 16 characters. Symbol (_) is permitted.'),
(170, 'en', 'name', 'Name'),
(171, 'en', 'name_available_registration', 'Username is available for registration.'),
(172, 'en', 'name_not_available_registration', 'The name is not available for registration, a user by another user.'),
(173, 'en', 'new', 'New'),
(174, 'en', 'news', 'News'),
(175, 'en', 'news_items', 'news Items'),
(176, 'en', 'new_password', 'New Password'),
(177, 'en', 'no', 'No'),
(178, 'en', 'nof_nopermission', 'Error Permission'),
(179, 'en', 'none', 'None'),
(180, 'en', 'normal', 'Normal'),
(181, 'en', 'not_for_everyone', 'Not for everyone'),
(182, 'en', 'not_select_anything', 'Sorry it seems you do not select anything!'),
(183, 'en', 'not_valid_format_upload', 'not have a valid format. Upload a png, jpg, gif, jpeg file type'),
(184, 'en', 'no_result', 'No Result'),
(185, 'en', 'options', 'Options'),
(186, 'en', 'order', 'Order'),
(187, 'en', 'orders_categorie_successfully', 'Orders Categorie Successfully'),
(188, 'en', 'package_name', 'Package Name'),
(189, 'en', 'pages', 'Pages'),
(190, 'en', 'pages_setting', 'Pages Setting'),
(191, 'en', 'page_about', 'Page About'),
(192, 'en', 'page_contact', 'Page Contact'),
(193, 'en', 'page_privacy', 'Page Privacy'),
(194, 'en', 'page_views', 'Page Views'),
(195, 'en', 'parent', 'Parent'),
(196, 'en', 'password', 'Password'),
(197, 'en', 'password_must_be_at_least_6_characters', 'Password must be at least 6 characters.'),
(198, 'en', 'phrase', 'Phrase'),
(199, 'en', 'phrase_code', 'Phrase Code'),
(200, 'en', 'phrase_module', 'Phrase Module'),
(201, 'en', 'phrase_text', 'Phrase Text'),
(202, 'en', 'pin_post', 'Pin Post'),
(203, 'en', 'please_activate_your_account', 'Please activate your account activation message been sent to your registered email'),
(204, 'en', 'please_complete_the_fields', 'Please complete the fields'),
(205, 'en', 'popular_knowledgebase', 'Popular Knowledgebase'),
(206, 'en', 'popular_knowledge_base', 'Popular Knowledge Base'),
(207, 'en', 'popular_news', 'Popular News'),
(208, 'en', 'posts', 'Posts'),
(209, 'en', 'posts_chart', 'Posts Chart'),
(210, 'en', 'preview', 'Preview'),
(211, 'en', 'privacy', 'privacy'),
(212, 'en', 'processing', 'Processing ...'),
(213, 'en', 'profile', 'Profile'),
(214, 'en', 'public_information', 'Public Information'),
(215, 'en', 'publish', 'Publish'),
(216, 'en', 'publishnow', 'Publish Now'),
(217, 'en', 'register', 'Register'),
(218, 'en', 'registration', 'Registration'),
(219, 'en', 'registration_activation', 'Registration Activation'),
(220, 'en', 'reg_closed', 'Registration is closed at this time!'),
(221, 'en', 'reset', 'Reset'),
(222, 'en', 'return_to_login', 'Return To Login'),
(223, 'en', 're_enter_the_new_email_address', 'Re-enter the new Email address'),
(224, 'en', 're_enter_the_new_password', 'Re-enter the new password'),
(225, 'en', 'role', 'Role'),
(226, 'en', 'save', 'Save'),
(227, 'en', 'saved_successfully', 'Saved successfully.'),
(228, 'en', 'save_changes', 'Save Changes'),
(229, 'en', 'search', 'search'),
(230, 'en', 'search_the_knowledge_base', 'search the Knowledge Base ...'),
(231, 'en', 'send_message', 'Send Message'),
(232, 'en', 'send_your_message_has_been_successfully', 'Send your message has been successfully.'),
(233, 'en', 'settings', 'Settings'),
(234, 'en', 'show_page_users', 'Show Page Users'),
(235, 'en', 'show_profile_users', 'Show Profile Users'),
(236, 'en', 'sign_up', 'Sign up'),
(237, 'en', 'sign_up_for_your_free', 'sign up for your free'),
(238, 'en', 'site_wide_meta_description', 'Site wide Meta Description'),
(239, 'en', 'site_wide_meta_keywords', 'Site wide Meta Keywords'),
(240, 'en', 'slug', 'Slug'),
(241, 'en', 'socials', 'Socials'),
(242, 'en', 'socials_setting', 'Socials Setting'),
(243, 'en', 'statistics', 'Statistics'),
(244, 'en', 'status', 'Status'),
(245, 'en', 'subject', 'Subject'),
(246, 'en', 'subject_is_required', 'Subject is required.'),
(247, 'en', 'tagline', 'Tagline'),
(248, 'en', 'template', 'Template'),
(249, 'en', 'themes', 'Themes'),
(250, 'en', 'themes_setting', 'Themes Setting'),
(251, 'en', 'theme_activated_successfully', 'theme activated successfully.'),
(252, 'en', 'this_field_is_required', 'This field is required'),
(253, 'en', 'timezone', 'Timezone'),
(254, 'en', 'time_format', 'Time Format'),
(255, 'en', 'title', 'Title'),
(256, 'en', 'toggle_navigation', 'Toggle navigation'),
(257, 'en', 'twitter', 'Twitter'),
(258, 'en', 'twitter_url', 'Twitter URL'),
(259, 'en', 'type', 'Type'),
(260, 'en', 'unique_visitors', 'Unique Visitors'),
(261, 'en', 'up', 'Up'),
(262, 'en', 'update', 'Update'),
(263, 'en', 'upload', 'Upload'),
(264, 'en', 'upload_file', 'Upload file'),
(265, 'en', 'used_template', 'used template'),
(266, 'en', 'user', 'User'),
(267, 'en', 'username', 'Username'),
(268, 'en', 'usernames_cannot_be_changed', 'Usernames cannot be changed.'),
(269, 'en', 'username_is_required', 'Username is required.'),
(270, 'en', 'users', 'Users'),
(271, 'en', 'users_chart', 'Users Chart'),
(272, 'en', 'users_per_page', 'Users Per Page'),
(273, 'en', 'users_setting', 'Users Setting'),
(274, 'en', 'user_only', 'User only'),
(275, 'en', 'utc_time_is', 'UTC time is'),
(276, 'en', 'view', 'View'),
(277, 'en', 'views', 'views'),
(278, 'en', 'view_my_profile', 'View My Profile'),
(279, 'en', 'view_post', 'View Post'),
(280, 'en', 'view_profile', 'Views Profile'),
(281, 'en', 'visitors_chart', 'Visitors Chart'),
(282, 'en', 'visits_the_day', 'Visits The Day'),
(283, 'en', 'visits_the_month', 'Visits The Month'),
(284, 'en', 'visits_the_year', 'Visits The Year'),
(285, 'en', 'visit_site', 'Visit Site'),
(286, 'en', 'vote_users_only', 'Vote Users Only'),
(287, 'en', 'voting', 'Voting'),
(288, 'en', 'voting_chart', 'Voting Chart'),
(289, 'en', 'voting_down', 'Voting Down'),
(290, 'en', 'voting_up', 'Voting Up'),
(291, 'en', 'website', 'Web Site'),
(292, 'en', 'website_email', 'Website Email'),
(293, 'en', 'website_name', 'Website Name'),
(294, 'en', 'website_url', 'Website URL'),
(295, 'en', 'welcome', 'Welcome'),
(296, 'en', 'well_done', 'Well done!'),
(297, 'en', 'yes', 'Yes'),
(298, 'en', 'your_current_email_address', 'Your current email address'),
(299, 'en', 'youtube', 'Youtube'),
(300, 'en', 'youtube_url', 'Youtube URL');

-- --------------------------------------------------------

--
-- Table structure for table `tp_posts`
--

CREATE TABLE IF NOT EXISTS `tp_posts` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `post_author` bigint(20) unsigned NOT NULL default '0',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  `comment_status` tinyint(1) NOT NULL,
  `post_name` varchar(200) NOT NULL,
  `post_modified` int(50) NOT NULL,
  `post_type` varchar(20) NOT NULL default 'post',
  `term_id` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`id`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tp_posts`
--

INSERT INTO `tp_posts` (`id`, `post_author`, `post_content`, `post_title`, `post_status`, `comment_status`, `post_name`, `post_modified`, `post_type`, `term_id`) VALUES
(1, 1, '<p>Creativity is crucial, but it''s our overall approach that gives it the focus required to make it really work.<br /><br /></p><h2><strong>COLLABORATIVE TEAMWORK<br /><br /></strong></h2><p>It might sound like a cliché, but our success is about teamwork. And while it''s easy to talk about internal teamwork (our whole team work in-house and in close proximity to one another), it''s the teamwork we enjoy with our clients that adds something special. Part of that comes down to attitude, part down to process. Go team!</p><p> </p><h2><strong>AGILE PROCESS<br /><br /></strong></h2><p>We run all projects using ''agile''. An iterative process, it includes daily ''scrums'' involving key stakeholders that deal with issues and opportunities as they arise, as well as continual communication within the agency. The result is a more reliable, comfortable and faster process – with better results.</p><p> </p><h2><strong>ONGOING SUPPORT<br /><br /></strong></h2><p>Once your site is up and running beautifully, we won''t just sit there admiring it. We''ll run training sessions to make sure your staff are completely confident in ''driving'' it (updating content for instance). We''ll always be there if you have a question. And we''ll come back with any other ideas we think could help you<br /><br /></p><p>Beautiful doesn''t happen by chance. It takes a lot of hard work. As an agency, we''ve made a deliberate commitment to creating beautiful outcomes, then engineered every aspect of our operation to achieve them.</p>', 'About', 1, 1, 'about', 1447151433, 'pages', 0),
(2, 1, '<h1 id="welcome" class="t-heading -size-m"><strong>Welcome</strong></h1><p> </p><p class="t-body">1. Hi, we''re <a href="http://envato.com/">Envato</a>. We''ve met before over at Envato Market Terms. It''s good to meet you again and we''re really glad you''re keen on becoming an author with us.<br /><br /></p><p class="t-body">2. Imagine creating what you want, when you want, from the comfort of your own home, making passive income whether you''re working or not. Some of our authors sell stock in their free time as a hobby, some do it to get their name out there, and some are able to make it their full time profession.<br /><br /></p><p class="t-body">3. Becoming an author is easy and if you''ve reached this point then you''re already a member and you''ve accepted our <a href="http://codecanyon.net/legal/market">Envato Market Terms</a>. These additional terms for authors (''<strong>Author Terms</strong>'') are an extra part of the Envato Market Terms that apply specifically to authors on the Envato Market. You''ll need to agree to them before you can become an author. These govern the relationships, rights and obligations of authors to us and buyers using Envato Market. You agree to put your items on Envato Market and make them available to buyers on the basis stated in the Envato Market Terms and these Author Terms.</p><div class="license-bubble--below">As an author on the Envato Market you have responsibilities to us and buyers of your items. Please take the time to review these Author Terms carefully.<br /><br /></div><p class="t-body">4. When we say ''<strong>you</strong>'' in these Author Terms we are referring to you, the author. All other words defined or explained in the Envato Market Terms have the same meaning here. If there''s any inconsistency between what we say in these Author Terms and what is in the Envato Market Terms, what we say in these Author Terms prevails.<br /><br /></p><p class="t-body">5. Read on for details about your author responsibilities, the process of selling your items on the Envato Market and how you can earn money with us.<br /><br /></p><p class="t-body"> </p><h2><strong>Becoming an author</strong><br /><br /></h2><p class="t-body">6. <strong>Becoming an author is free</strong>: Becoming an author and putting your items up on the Envato Market is free but there is a review process before your items go live. There are a few things you promise in exchange for the right to be an author, which are outlined in these Author Terms.<br /><br /></p><p class="t-body">7. <strong>Process to become an author</strong>: There are easy steps you follow to sign up as an author, which are outlined on the Envato Market <a href="http://codecanyon.net/become_an_author">Become an Author</a> guide. There you''ll find instructions and resources that will help you get started. You''ll also find information about payment, submission requirements and other important information about being an author on our <a href="http://codecanyon.net/author_guide">Author Guide</a> page.<br /><br /></p><h2 id="how-selling-your-items-works" class="t-heading -size-m"> </h2>', 'Privacy and Terms', 1, 1, 'privacy-and-terms', 1447154233, 'pages', 0),
(4, 1, '<header class="article-header clearfix"><h1>Where Is My Purchase Code?</h1></header><article class="main-column"><div class="article-body"><ul><li>Log into your Envato Market account.</li><li>Hover the mouse over your username at the top of the screen.</li><li>Click ''Downloads'' from the drop down menu.`</li><li>Click ''License certificate &amp; purchase code'' (available as PDF or text file).</li></ul><p><iframe class="wistia_embed" src="https://fast.wistia.net/embed/iframe/gqsrs2assi" name="wistia_embed" width="640" height="455" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p><ul><li>Below is an example of a PDF License certificate and purchase code.</li></ul><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/201801083/License_Purchase_Code_Example.png" alt="" /></p></div></article>', 'Where Is My Purchase Code?', 1, 1, 'where-is-my-purchase-code', 1447155179, 'knowledgebase', 1),
(5, 1, '<h2><strong>What is Content ID?</strong></h2><p>Content ID is a popular digital fingerprinting system that content creators can use to easily identify and manage their copyrighted content on YouTube. Videos uploaded to YouTube are compared against audio and video files registered with Content ID by content owners, looking for any matches.</p><p>When a video is matched to Content ID registered content, a copyright notice will appear on the video, and the content owner may choose to take certain actions, such as:</p><ul><li><strong>Clearing</strong> the claim and taking no further action</li><li><strong>Tracking</strong> the video''s viewership statistics</li><li><strong>Monetizing</strong> the video by running ads against it</li><li><strong>Muting</strong> the audio that matches their music</li><li>Or even <strong>blocking</strong> a whole video from being viewed</li></ul><h2><strong>What is AdRev?</strong></h2><p>AdRev (and other companies such as Audiam, TuneCore, etc) are YouTube Partner platforms that use the Content ID system to manage and administer this copyrighted content on behalf of content owners. They in turn provide users with various information such as which videos their content is used in, tracking of unauthorized uses, viewership reports, and distribution of any monetization earnings.</p><h2><strong>How does this relate to AudioJungle music?</strong></h2><p>Many online based music composers, including some of those that sell licenses to their music via AudioJungle, have their content digitally fingerprinted via Content ID to help protect against unauthorized uses, and also use these YouTube Partner platforms to administer and manage their content.</p><p>We provide <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-can-I-find-my-Purchase-Code-">license certificates and purchase codes</a> for all purchases on Envato Market, including AudioJungle music, so should a copyright notice appear on a video containing music that is tracked by Content ID, it can be easily cleared and you shouldn''t have anything to worry about.</p><h2><strong>What does this mean for me and my YouTube projects?</strong></h2><p>When a video is uploaded to YouTube that contains licensed, digitally fingerprinted music, a<em>"matched third party content" </em>copyright notice will appear alongside the uploaded video in the YouTube Video Manager (this typically appears shortly after uploading).</p><p>A copyright notice <strong>does not </strong>mean that copyrights have been infringed, and this shouldn''t be confused with a YouTube "<a href="https://support.google.com/youtube/answer/2814000?hl=en-GB">copyright strike</a>". It''s simply a notice to advise that YouTube has detected Content ID registered content within the video, and that further information/action is needed.</p><p>Again, if you''ve licensed the music from AudioJungle, you will be easily able to clear this notice and you shouldn''t have anything to worry about.</p><h2><strong>Isn''t AudioJungle music royalty free?</strong></h2><p>Absolutely! While unauthorized/unlicensed use of music in a video may have monetized ads placed on it by the content owner, no royalties or earnings are ever collected on licensed music usage.</p><h2><strong>How do I know if an item is registered with Content ID?</strong></h2><p>If a track is registered and digitally fingerprinted with Content ID, it will be called out in the item description on the item page, as in the image below:</p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202231480/registeredinfobanner.png" alt="" /></p><p>Additionally, on the item page sidebar you''ll see an attribute for "YouTube Content ID Registered: Yes/No", as well as which partner platform the Content ID is administered by, if any:</p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202326134/itempageattributes5_padd_.png" alt="" /></p><p><strong>Please Note:</strong> This is a <strong>new policy</strong> as of <strong>April</strong><strong> 2015</strong>, and it may take some time for all authors to add this Content ID information to their existing items. In the meantime, you can still check the item description as many registered authors already provide a note about YouTube &amp; Content ID, and if in doubt you can always contact the author directly via their profile page to find out.</p><h2><strong>How to clear a YouTube copyright notice</strong></h2><p>Clearing a YouTube copyright notice is a very straightforward process. You can remove copyright notices in the following ways:</p><ol><li>Disputing the claim via YouTube''s built-in form.</li><li>If the music is administered via AdRev, using the <a href="http://adrev.net/contact-us">AdRev Claim Clearance</a> page is the quickest and most direct way to clear a claim.  AdRev will send you an email confirmation once it has been cleared.</li><li>Or by contacting the author directly via their AudioJungle profile page with a link to your YouTube video, where they can further assist with having the copyright notices removed as quickly as possible.</li></ol><p>To clear a claim via YouTube, you simply need to let YouTube know that you have licensed the music and have the rights to use it. Simply choose to "dispute" the claim by clicking the <em>"matched third party content"</em> copyright notice next to the video in your <a href="https://www.youtube.com/my_videos">Video Manager</a>, or on your dedicated<a href="https://www.youtube.com/my_videos_copyright">copyright notices page</a>. After you click "file a dispute", select the option <em>"I have a license or written permission from the proper rights holder to use this material"</em>.</p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202216624/matched3rdpartycontent.png" alt="" /></p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202216634/fileadispute.png" alt="" /></p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202231510/notvalid.png" alt="" /></p><p>In the "Reason for dispute" box, copy/paste the contents from your <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-can-I-find-my-Purchase-Code-">purchased license certificate</a>(accessible via the <a href="http://audiojungle.net/downloads">Downloads</a> section in your Envato Market account).  You may also wish to include the statement <em>"A license to use this royalty-free music by [Name of Author] was purchased from AudioJungle.net"</em>.</p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202216664/resonfordispute.png" alt="" /></p><p>Once you submit the dispute, claims are usually cleared within 24 - 96 hours. If any issues arise, contacting the author directly via their profile page can often help to expedite clearing a claim as well.</p><ul><li>For help on finding your item purchase code &amp; license certificate, <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-can-I-find-my-Purchase-Code-">see this article</a>.</li><li>You may also find it helpful to read <a href="https://support.google.com/youtube/answer/6013276">YouTube''s support article for users affected by copyright claims</a> as well as <a href="https://support.google.com/youtube/answer/1311196">YouTube''s support article on submitting additional documentation to claim montezation rights</a>.</li></ul><h2><strong>Tips for clearing claims in advance</strong></h2><h3><strong>Uploading early as an "Unlisted" video</strong></h3><p>If you''ve licensed digitally fingerprinted music from AudioJungle, we recommend that you set your YouTube videos to "Unlisted" upon uploading, until all "matched third-party content" notices are cleared.</p><p>This will allow suitable time for any copyright notices to be cleared before the video is published, and ensure that you can monetize your video from the moment it goes live without any conflicts. Once the copyright notice has been removed, the video can then be set to "Public" and monetization can be activated on the video.</p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202216674/unlisted.png" alt="" /></p><h3><strong>Whitelisting Channels</strong></h3><p>If you or your client regularly uses Content ID registered music by a particular author in your YouTube videos, or have used a piece of Content ID registered music in multiple YouTube videos, some YouTube Partner Platforms such as AdRev also support having an entire YouTube channel<strong>whitelisted</strong>. Whitelisting a channel will prevent any further copyright notices from appearing on future videos that contain music from that specific author.</p><p>To do so, you''ll need to directly contact the author via their AudioJungle profile page to have them request this for your channel. In your message simply provide them with:</p><ol><li>The contents of your purchased License Certificate(s)</li><li>A link to the relevant YouTube channel (this may be your own channel or a client''s channel, for example if you are producing videos for them)</li></ol>', 'Buyers Guide to YouTube Content ID & Copyright Notices', 1, 1, 'buyers-guide-to-youtube-content-id-copyright-notices', 1447155223, 'knowledgebase', 1),
(6, 1, '<p>Envato Market will generally only offer refunds where the item you purchased is broken, malfunctioning or corrupt, or doesn''t work as described.</p><p><span class="wysiwyg-font-size-large">Before requesting a refund</span></p><p class="p1"><span class="s1"><strong>It''s important</strong> to keep in mind that there is often a <em>difference</em> between an item that is <em>broken</em> and a situation where you are receiving an <em>error message</em>.</span></p><p>Error messages could be related to an incorrect setup, configuration or software and as a result the <a href="https://help.market.envato.com/hc/en-us/articles/204013780-The-Item-Is-Not-Working">item is not working.</a></p><p><strong>Before</strong> you request a refund from Envato it''s <em>vitally important</em> that you have first:</p><ul><li>Read the items <a href="https://help.market.envato.com/hc/en-us/articles/203686084-Where-Can-I-Find-Installation-Guide-or-Help-Documentation-">installation guide and documentation.</a></li><li>Read and <a href="https://help.market.envato.com/hc/en-us/articles/203686094-Search-The-Item-Comments">search the item comments</a> page, as this may answer your question.</li><li><a href="https://help.market.envato.com/hc/en-us/articles/203039054-How-do-I-contact-an-Envato-Market-author-">Contact the author</a> of the item for support - although it is <strong><em>not</em></strong> mandatory for authors to offer support, majority of authors do.</li><li>Using the item for it''s <em>intended</em> function and purpose, which is outlined in the items description - eg. <a href="https://help.market.envato.com/hc/en-us/articles/203688924-How-Do-I-Check-Item-Compatibility-">correct software version</a>.</li><li>Opening a <a href="https://help.market.envato.com/hc/en-us/articles/204010880-PayPal-Disputes-And-Chargebacks">dispute</a><strong> </strong>or <a href="https://help.market.envato.com/hc/en-us/articles/204010880-PayPal-Disputes-And-Chargebacks">chargeback</a>, will <strong><em>not</em></strong> speed up your refund request.</li></ul><blockquote><strong>Please Note: </strong>As the item you are purchasing is digital goods, <strong><em>by downloading</em></strong> the item you have <strong><em>taken ownership of the item</em></strong>, and we <strong><em>cannot</em></strong> offer refunds or exchanges due to a change of mind.</blockquote><p><strong><em>If you are unsure</em></strong>, it is you the "buyers" responsibility to <a href="https://help.market.envato.com/hc/en-us/articles/203039054-How-do-I-contact-an-Envato-Market-author-">ask the author</a> questions <em>before purchasing</em>. To make sure the item is suitable for your project and is <a href="https://help.market.envato.com/hc/en-us/articles/203688924-How-Do-I-Check-Item-Compatibility-">compatible</a> with your<a href="https://help.market.envato.com/hc/en-us/articles/203688924-How-Do-I-Check-Item-Compatibility-">hardware or software.</a></p><p>If the item you purchased is broken, malfunctioning or corrupt, or doesn''t work as described in the items description and <em>you have completed</em> the above steps please open a <a href="http://themeforest.net/refund_requests/new">refund request</a>.</p><p><span class="wysiwyg-font-size-large">The item I purchased is gone</span></p><ul><li>Items may be <a href="https://help.market.envato.com/hc/en-us/articles/202500244-The-Item-Has-Been-Removed">removed</a> and <a href="https://help.market.envato.com/hc/en-us/articles/202500244-The-Item-Has-Been-Removed">no longer available</a> for download for a number of reasons.</li><li>If the item was; r<em>emoved within <strong>5 days</strong> of your initial purchase</em> And / Or <em>has <strong>not</strong> been downloaded,</em> please open a <a href="http://themeforest.net/refund_requests/new">refund request</a>.</li></ul>', 'Can I Get A Refund?', 1, 1, 'can-i-get-a-refund', 1447155255, 'knowledgebase', 1),
(7, 1, '<p>The Envato Help Team provide general customer service via email and aim to respond to all queries within 24 hours.</p><p>For <strong>pre sales enquiries </strong>or<strong><strong> technical support</strong> </strong>with an item you''ve purchased, please <a href="https://help.market.envato.com/hc/en-us/articles/203039054-Contacting-An-Author" target="_blank">contact the author of the item</a>.</p><p>The Help Team <strong>cannot</strong> assist with; <strong>technical support</strong> for individual items, <strong>item customization</strong>,<strong>suggesting items</strong> or <strong>declined transactions</strong>.</p><p>The Help Team can assist with:</p><ul><li>Account related questions</li><li>Large deposits and payment options</li><li>Refund requests</li><li>Information about copyright procedures, policies and piracy</li><li>License questions</li><li>Information about the Envato affiliate program</li><li>Envato Market terms and conditions</li><li>Information on becoming an author</li></ul><p>For help, please open a <a href="https://help.market.envato.com/hc/en-us/requests/new" target="_blank">new ticket</a>. Envato <strong>does not</strong> provide help via telephone or live chat.</p>', 'Contact Us', 1, 1, 'contact-us', 1447155326, 'knowledgebase', 1),
(8, 1, '<p>Envato is an ecosystem of sites to help you get creative. <a href="http://market.envato.com/">Envato Market </a>is the leading marketplace for images, themes, project files and creative assets. <a href="https://studio.envato.com/">Envato Studio</a> connects clients with hand-picked freelance talent, and <a href="http://tutsplus.com/">Tuts+</a> is home to thousands of tutorials and video courses. Our sites and services help millions of people around the world.</p><p>You can learn more about us, including a complete list of Envato brands and staff at <a href="http://www.envato.com/" target="_blank">Envato.com</a></p><h2>Envato Market</h2><p>Envato Market comprises of  <a href="http://activeden.net/" target="_blank">ActiveDen</a>, <a href="http://audiojungle.net/" target="_blank">AudioJungle</a>, <a href="http://codecanyon.net/" target="_blank">CodeCanyon</a>, <a href="http://themeforest.net/" target="_blank">ThemeForest</a>, <a href="http://graphicriver.net/" target="_blank">GraphicRiver</a>,<a href="http://videohive.net/" target="_blank">VideoHive</a>, <a href="http://3docean.net/" target="_blank">3DOcean</a> and <a href="http://photodune.net/" target="_blank">PhotoDune</a>. They are a set of interconnected sites that allow anyone to buy or sell digital products, ranging from website templates, to video templates, to royalty free stock graphics. When you create an account on one, it will work on any of them.</p><p>Each Envato Market site has its own authors, items for sale, forums and community.  This means the focus on each site is slightly different, but all housed within a familiar, intuitive interface and accessible with your one account.</p><p>All products for sale on the Envato Market sites are created and sold by our community of authors. The sites are owned and operated by <a href="http://www.envato.com/" target="_blank">Envato</a> which is where we get the name!</p><h2>Buying on Envato Market</h2><p>If you are interested in buying items, you can begin your searches at:</p><ul><li><a href="http://activeden.net/" target="_blank">ActiveDen</a> – Royalty-free stock items for use in Adobe Flash projects and websites.</li><li><a href="http://audiojungle.net/" target="_blank">AudioJungle</a> – Royalty-free music and sound effects.</li><li><a href="http://graphicriver.net/" target="_blank">GraphicRiver</a> – Royalty free layered Adobe Photoshop Files, Vector Graphics, Icon Sets and Add-ons for Adobe Photoshop and Illustrator.</li><li><a href="http://themeforest.net/" target="_blank">ThemeForest</a>– Site templates and themes to skin popular CMS products like WordPress, Drupal and Joomla.</li><li><a href="http://videohive.net/" target="_blank">VideoHive</a> – Royalty free stock footage, motion graphics and project files for applications such as Adobe After Effects.</li><li><a href="http://3docean.net/" target="_blank">3DOcean</a> – 3D Models, Textures, Materials, Shaders and Concepts.</li><li><a href="http://codecanyon.net/" target="_blank">CodeCanyon</a> – PHP, Javascript, ASP.NET and Java.</li><li><a href="http://photodune.net/" target="_blank">PhotoDune</a> – Royalty-free stock photography.</li></ul><p>You can buy items immediately via <a href="http://support.envato.com/index.php?/Knowledgebase/Article/View/217/" target="_blank">Paypal or prepaid deposits.</a></p><p>You may find this information useful:</p><ul><li><a href="http://support.envato.com/index.php?/Knowledgebase/Article/View/216/" target="_blank">The beginner''s guide to purchasing items</a></li><li><a href="http://themeforest.net/licenses" target="_blank">Which license should you purchase for your project?</a></li></ul><h2>Selling on Envato Market</h2><p>Anyone is eligible to sell their work on Envato Market sites.  Our team of reviewers inspect all items that are submitted to ensure we have a high standard of quality. If you are interested in selling items, you can visit the <a href="http://support.envato.com/index.php?/Knowledgebase/List/Index/9/marketplace-authors">author section</a> of the Help Center to find out more.</p>', 'Envato and the Envato Market sites', 1, 1, 'envato-and-the-envato-market-sites', 1447155354, 'knowledgebase', 1),
(9, 1, '<div class="article-body"><ul><li>In the final stages of the checkout flow (i.e., after clicking <strong>"Buy Now"</strong> or <strong>"Checkout"</strong>), you''ll be asked to enter your billing address details.</li></ul><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202065700/Billing_Details_Form_Updated__Wide_.png" alt="" /></p><ul><li>After entering your billing address, click <strong>"Save and Continue"</strong>.</li><li>Your billing address entered is stored securely our database, so you can skip this step for future purchases.</li></ul><blockquote><strong>Please note: </strong>fields with * are required. If you''re based in the European Union and have a Value-Added Tax (VAT) number, you can enter it here.</blockquote><p><img src="https://help.market.envato.com/hc/en-us/article_attachments/201991250-Click_to_Edit_Checkout.png" alt="" /></p><ul><li>If you wish to change your billing address, click <strong>"Edit"</strong> and enter your new billing address.</li><li>Click <strong>"Save and Continue"</strong>.</li></ul><blockquote><strong>Please note: </strong>fields with * are required. Enter Tax details (VAT) if applicable.</blockquote><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/201985204-Edit_and_Changed_Address.png" alt="" /></p><ul><li>Your new billing address has been saved.</li><li>Now select your payment method and continue to <strong>Step 3 - Review Order.</strong></li></ul><p class="wysiwyg-text-align-center"><strong><img src="https://help.market.envato.com/hc/en-us/article_attachments/201985224-Hover_Settings_400px.png" alt="" /></strong></p><ul><li>You can also update your billing address in your account<strong> "Settings".</strong></li><li>Hover over your name at the top of the screen, then click on <strong>"Settings". </strong>(See above)</li><li>On the <strong>"Personal Information"</strong> tab enter your new billing address details.</li><li>Click <strong>"Save"</strong>.</li><li>Your new billing address will be used for future purchases.</li></ul><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/201987200-Settings_Personal_Address_Change.png" alt="" /></p><p class="wysiwyg-text-align-center"> </p><p class="wysiwyg-text-align-center"> </p></div>', 'How Do I Add Or Change My Billing Address?', 1, 1, 'how-do-i-add-or-change-my-billing-address', 1447155400, 'knowledgebase', 1),
(10, 1, '<p>You may have questions about how an item works before buying. You may need help on how to use an item you''ve purchased or just want to tell an author how much you love their work. Great! Contacting an author is easy.</p><h2>Comments Tab</h2><p>Post your comment here for the author to see or read through existing comments, as your question may have already been answered. Item Comments are visible to everyone.</p><p> </p><p><iframe class="wistia_embed" src="https://fast.wistia.net/embed/iframe/ggf1b9n0f8" name="wistia_embed" width="640" height="541" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p><ul><li>Sign in or sign up for an Envato Market account.</li><li>From the item page Click the ''Comments'' tab.</li><li>Scroll to the bottom of the page.</li><li>Type your comment and Click ''Post Comment''.</li></ul><h2>Authors Profile</h2><p>You can email an author directly via their Envato Market profile page.</p><p> </p><p><iframe class="wistia_embed" src="https://fast.wistia.net/embed/iframe/l2aqaos4jl" name="wistia_embed" width="640" height="553" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p><ul><li>Sign in or sign up for an Envato Market account.</li><li>From the item page Click the author''s Name or Logo (on the right-hand side).</li><li>Scroll to the bottom of the page.</li><li>Type your message and Click ''Send''.</li></ul><h2>Support Tab</h2><p>The support tab indicates if the item is supported, what support includes and how to get support. It may also include popular questions about the item, helpful links or support response time.</p><p> </p><p><iframe class="wistia_embed" src="https://fast.wistia.net/embed/iframe/c2cx9q2e5i" name="wistia_embed" width="640" height="467" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe></p><ul><li>From the item page Click the ''Support'' tab.</li><li>Click ''Go to item support button'' for the authors support site (Outside Envato Market).</li><li>If the author does not have an external support site, follow the instructions of the page on how to get support.</li><li>More information about the Item Support Policy can be found <a href="http://themeforest.net/page/item_support_policy">here</a>.</li></ul>', 'How to Contact an Author', 1, 1, 'how-to-contact-an-author', 1447155447, 'knowledgebase', 2),
(3, 1, '<div class="contact-phone"><div><strong>LOCATION.</strong></div><div> </div><div>Mauris dapibus quam id turpis dignissim rutrum. Phasellus placerat nunc in nulla pretium pellentesque. Aliquam erat volutpat. In nec enim dui, in hendrerit enim. Vestibulum ante ipsum primis in faucibus adipcising elit. Lorem ipsum Dolor sit amet adipcising elit mauris dapibus dignisim.</div><div> </div><div><strong>Creative Laboratory </strong></div><div>77 New York Avenue, New York city, </div><div>USA 10000.</div><div> </div><div><strong>Phone</strong>: 73 443 11 23. </div><div><strong>Fax</strong>: 73 443 11 23.</div></div>', 'contact', 1, 1, 'contact', 1447154658, 'pages', 0),
(11, 1, '<h3>Identifying if a buyer has support</h3><p>Regardless of how you choose to support your customers there will be a way to see if they have valid support:</p><ul><li>if you provide support via a third party system then you can use the<br />Verify Purchase API to see if the buyer has purchased the item and<br />whether or not they have valid support;</li><li>if you provide support via email then you can use the link the email<br />to verify the purchase and support; or</li><li>if you provide support via<br />comments then we''ll identify buyers that have purchased and those<br />with valid support.</li></ul><h3>Identyifying supported item sales on statements</h3><p>We split the sales from a supported item sale into two lines (license and bundled support) to reflect what is being bought and to help authors more accurately define and describe their earnings for accounting purposes.</p><p>Authors will still earn the exact same money from a sale as the would have previously, it is just split over two lines of the statement. For more information please refer to <a href="https://help.market.envato.com/hc/en-us/articles/205352404">this help centre article</a>.</p><p><strong>NOTE:</strong> There has been feedback from authors about the difficulty in reading statements because of these changes and we are working on a solution to roll the two line items into one although it may take some time to implement.</p><h3>Rounding of item sale amounts</h3><p>The rules for rounding are the same as those used for VAT (i.e. if less then 0.5 round down, if greater than or equal to 0.5 then round up).</p><p>Because we are splitting a supported item into two (license and support), the author fee and any taxes were being applied separately and therefore rounding can occur twice meaning each sale can be up to 1 cent out (positive or negative).</p><p><strong>NOTE:</strong> When we combine the line items into one (as mentioned above) this will be no longer and issue.</p><h3>Categories the item support policy applies to</h3><p>The item support policy applies to all categories on ThemeForest and CodeCanyon <strong>excluding</strong> - PSD templates, Sketch templates, TypeEngine themes, Mobile, and Edge Animate templates.</p>', 'Authors Item Support FAQ', 1, 1, 'authors-item-support-faq', 1447155491, 'knowledgebase', 2),
(12, 1, '<h3>Updates and bug fixes are included in the cost of ALL items</h3><p>Regardless of whether you have support or not:</p><ul><li>If and when an author releases an updates, it will be available for all previous buyers to download for free</li><li>You can report bugs</li><li>Authors are expected to keep the item in good working order, working as described and protected against major security issues</li></ul><h3>Impact on buyers who bought before the new item support policy</h3><p>As mentioned in the original item support announcement, items sold before September 1st will be treated as follows:</p><ul><li>If the item did not advertise support, nothing changes</li><li>If the item advertised support for less than 6 months, that remains valid</li><li>If the item advertised support for more than 6 months, those items will be supported for 6 months after September 1st</li></ul><p>So from <strong>September 1st</strong> there will still be another 6 months for buyers who have purchased before.</p><p>After that <em>if there are pre-policy buyers who still want support extended further and if the author agrees, then that can happen too.</em> Buyers who need clarification about their purchase should contact the <a href="https://help.market.envato.com/hc/en-us/requests/new" target="_blank">Envato Help Team</a>.</p>', 'Buyers Item Support FAQ', 1, 1, 'buyers-item-support-faq', 1447155521, 'knowledgebase', 2),
(13, 1, '<p>As a customer of Envato Market, when you buy an item from ThemeForest or CodeCanyon, you''ll now have a clear indication of the level of post-purchase support offered by the author, before you complete the purchase.</p><p>The new support policy clearly defines what is included in all items not just supported ones, meaning you''re better informed to make decisions about which item is right for you.</p><h2>Items Marked as ''Supported''</h2><ul><li>All supported items have 6 months of included support (including Extended Licenses).</li></ul><ul><li>You have the option to add a further 6 months of support when purchasing an item (License).</li></ul><ul><li>Your item can only ever have a maximum of 12 months valid support at any given time.</li></ul><ul><li>To purchase additional support, simply check the ''extend support to 12 months'' box, add the item to your shopping cart and checkout.</li></ul><p><strong>For information on what item support includes read the <a href="http://themeforest.net/page/item_support_policy" target="_blank">Item Support policy</a>.</strong></p><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202937604/pasted_image_at_2015_08_26_10_30_am.png" alt="" width="633" height="453" /></p><h2>Items Marked as ''Not Supported''</h2><ul><li>Item support is <strong>not</strong> offered by the author, for these items.</li></ul><ul><li>Support is not included in the price of purchase and support extensions are <strong>not </strong>available for these items.</li></ul><ul><li>It is not possible to purchase unsupported items at a lower price.</li></ul><ul><li>For information on what is included in all items on ThemeForest and CodeCanyon read the<a href="http://themeforest.net/page/item_support_policy" target="_blank">Item Support policy.</a></li></ul>', 'Purchasing Supported and Unsupported Items', 1, 1, 'purchasing-supported-and-unsupported-items', 1447155563, 'knowledgebase', 2),
(14, 1, '<p>Now the <a href="http://themeforest.net/page/item_support_policy">item support policy</a> is established the following are some examples of support requests that <strong>are</strong> and <strong>are not</strong> <strong>included</strong> in the support purchase.</p><h2>Included</h2><ul><li>"I can''t find the setting that will allow me to add in my company logo, can you help me?"</li><li>"Hi, I''m not sure how how to change the colour scheme of the theme, can you point me in the right direction?"</li><li>"When I add pictures into the image slider they aren''t centered correctly. How do I fix this?"</li><li>"How do I change the text in the contact form plugin?"</li><li>"It looks like there an error in the code of your plugin, can you please take a look?"</li></ul><h2>Not Included</h2><ul><li>"Hi, Can you please add in a new feature that will allow me to add in video clips?"</li><li>"I''m having trouble installing your theme on my server, can you log in and install it for me?"</li><li>" I''m new to WordPress and not sure how it all works, can you teach me some basics so I can use your theme?"</li><li>"Your theme doesn''t have eCommerce functionality, can you add this in?"</li></ul>', 'Examples of Support Requests', 1, 1, 'examples-of-support-requests', 1447155616, 'knowledgebase', 2),
(15, 1, '<ul><li>Envato staff look over every item before it can be sold on Envato Market.</li><li>Technical items contain <a href="https://help.market.envato.com/hc/en-us/articles/203686084">help files</a> to introduce you to the item and its components.</li><li>Authors can choose to support their items but this is optional and may vary.</li></ul><blockquote><em>While we encourage authors to provide free </em><a href="https://help.market.envato.com/hc/en-us/articles/203039054"><em>support</em></a><em>, authors are not required to do so.</em></blockquote><p><strong><em>If you are unsure</em></strong><strong>,</strong> it''s you the "buyers" responsibility to<a href="https://help.market.envato.com/hc/en-us/articles/203039054-How-do-I-contact-an-Envato-Market-author-"> ask the author</a> questions <em>before purchasing</em>. To make sure the item is suitable for your project and is<a href="https://help.market.envato.com/hc/en-us/articles/203688924-How-Do-I-Check-Item-Compatibility-"> compatible</a> with your<a href="https://help.market.envato.com/hc/en-us/articles/203688924-How-Do-I-Check-Item-Compatibility-">hardware or software.</a></p><p>We want to hear from you if the item is genuinely broken or malfunctioning; so we can assess<a href="https://help.market.envato.com/hc/en-us/articles/202821460">refund eligibility</a>, have the item reviewed and either fixed, or removed from the Market.</p>', 'The Author Is Not Responding', 1, 1, 'the-author-is-not-responding', 1447155648, 'knowledgebase', 2),
(16, 1, '<p>Envato Market uses <a href="http://www.paypal.com/">PayPal</a> and <a href="http://moneybookers.com/">MoneyBookers</a> to facilitate prepaid deposits and withdrawals. This article details some of the most common issues relating to the use of PayPal and MoneyBookers in conjunction with Envato Market.</p><h4><strong>I made a purchase or deposited funds via PayPal or MoneyBookers a few hours ago, but it still hasn''t registered on my Envato Market account. What can I do?</strong></h4><p>Majority of the time PayPal or MoneyBookers payments will process instantaneously, but occasionally there can be a delay.</p><p>Often this delay is related to the original funding source. If a bank transfer or e-check was used, it sometimes takes 3-5 days for this kind of payment to be processed.</p><p>If you did not use a bank transfer and your deposit or purchase is still <em>not</em> shown on your Envato Market account, please <a href="https://help.market.envato.com/hc/en-us/requests/new">contact Envato Market Help</a> with the following information:</p><ul><li>Which payment provider you used. PayPal or MoneyBookers?</li><li>The Envato Market account user name related to the transaction.</li><li>The email address related to the Paypal or Moneybookers transaction.</li><li>The unique transaction ID of the payment.</li><li>Any other receipt information relating to the transaction.</li></ul>', 'Common PayPal and MoneyBookers Issues', 1, 1, 'common-paypal-and-moneybookers-issues', 1447155848, 'faq', 3),
(17, 1, '<h2>Add to Cart or Buy Now</h2><ul><li>To purchase multiple items, click the ''Add to Cart'' button.</li><li>Click ''Keep Browsing'' to add more items or click ''Checkout'' to purchase.</li><li>To purchase a single item and to go directly to the checkout, click ''Buy Now''.</li><li>At the checkout, we''ll ask for some account information before completing your purchase.</li><li>If you already have an Envato account, Sign In to pre-fill your account information.</li><li>Pay using <a href="https://help.market.envato.com/hc/en-us/articles/202821550-Common-PayPal-and-MoneyBookers-Issues">PayPal</a> for convenient one-off purchases.</li><li>Pay using Prepaid <a href="https://help.market.envato.com/hc/en-us/articles/202500304-Why-is-there-a-minimum-20-deposit-on-Envato-Markets-">Envato Credit</a> for multiple purchases.</li></ul>', 'How to Purchase Items', 1, 1, 'how-to-purchase-items', 1447155889, 'faq', 3),
(18, 1, '<p><span class="wysiwyg-font-size-large">Will disputing the transaction in PayPal or filing a chargeback speed up my refund request?</span></p><ul><li>We''d really like the opportunity to look into your request first, so please get in touch with us by<a href="http://themeforest.net/refund_requests/new"> creating a refund request</a>.</li></ul><ul><li><strong><em>Before</em></strong> submitting a refund request, please read the article <a href="https://help.market.envato.com/hc/en-us/articles/202821460-Can-I-Get-A-Refund-">Can I Get A Refund?</a></li></ul><ul><li>As <em>an anti-fraud measure</em>, if you open a dispute in PayPal or file a chargeback, your Envato account will be <em>automatically disabled</em> and you will not have access to any item purchases until it''s resolved.</li></ul>', 'PayPal Disputes And Chargebacks', 1, 1, 'paypal-disputes-and-chargebacks', 1447155936, 'faq', 3),
(19, 1, '<p><strong>Deposits or ''prepaid credits'' made into your Envato Market account are valid for 12 months. If you do not use your Envato credits within 12 months they may expire.</strong></p><p>For accounting reasons, Envato can''t be responsible for holding deposits indefinitely. Credits may be removed from your account if they have not been topped up within 12 months.</p><blockquote>You can view the date of the deposit by checking your invoice.</blockquote><p>If you make any additional deposits, your existing credit will be further extended for 12 months from the new date of deposit.</p><p>For example:</p><ul><li>1st Deposit = $50.00 on 17/07/2014 Expires on 17/07/2015</li><li>2nd Deposit = $20 on 06/02/2015 Expires on 06/02/2016</li><li>New Total Balance = $70.00  Expires on 06/02/2016</li></ul><p>4 weeks before credits are due to expire Envato sends a reminder email with the <strong>option to extend credits for an additional 6 months</strong>.</p><p class="p1"><span class="s1">In addition, when you log in to your account a banner will be displayed at the top of the screen that will also give you the option to extend your credits if they have not yet expired.</span></p><p><strong>Recently expired credits are able to be reinstated</strong>. If your credits have already expired please contact <a href="https://help.market.envato.com/hc/en-us/requests/new">The Help Team</a></p>', 'Why do Pre-Paid Credits Expire?', 1, 1, 'why-do-pre-paid-credits-expire', 1447156052, 'faq', 3),
(20, 1, '<p>The Envato Market only accept deposits in <strong>$10 increments</strong>, with a minimum of <strong>$20</strong> and a maximum of <strong>$100</strong>. Some of the content on the Market sites sells for as low as $1. We are, however, unable to allow deposits under $20 as the transaction fees for these deposits mean that they are currently not sustainable for the Envato Market.</p><p>The <strong>PayPal</strong> option is available to buyers who do not wish to make a deposit. <strong>Buy Now allows instant purchase through PayPal but will incur a fee of up to $2.</strong>  </p><p><a href="http://themeforest.net/deposit/start" target="_blank"><img class="wysiwyg-text-align-center" src="https://help.market.envato.com/hc/en-us/article_attachments/201285754/deposits.png" alt="" /></a></p>', 'Why is there a minimum $20 deposit on Envato Markets?', 1, 1, 'why-is-there-a-minimum-20-deposit-on-envato-markets', 1447156096, 'faq', 3),
(21, 1, '<ul><li><strong>A file cannot be downloaded more than 20 times within a 24 hour period</strong>.</li></ul><p>Once you reach this limit your item will be flagged and you will not be able to download the file for a further 24 hours.</p>', 'Download Limit Reached', 1, 1, 'download-limit-reached', 1447156131, 'faq', 4),
(22, 1, '<p>Item(s) should be downloaded <strong>immediately</strong> after <a href="https://help.market.envato.com/hc/en-us/articles/203269700-How-to-Purchase-Items">purchasing</a>. Items may be <a href="https://help.market.envato.com/hc/en-us/articles/202500244-The-Item-Has-Been-Removed">removed</a> from Envato Market from time to time.</p><p class="wysiwyg-text-align-left">To download your item(s):</p><ul><li>Hover over your username and click ''<strong>Downloads''</strong> from the drop-down menu.</li><li>The downloads section displays a list of all the items purchased using your account.</li><li>Click the <strong>''Download''</strong> button next to the item and select <strong>''Main File(s)''</strong> which contains all files, or <strong>''Licence Certificate and Purchase Code''</strong> for the item licence information only.</li></ul>', 'How To Download Your Items', 1, 1, 'how-to-download-your-items', 1447156170, 'faq', 4),
(23, 1, '<p>If you are having problems downloading the item file(s), please check the following:</p><ul><li>Clear your web browser <em>cache</em>. (Select your browser from the links for a guide). <a href="https://support.google.com/chrome/answer/95582">Google Chrome</a>,<a href="https://support.mozilla.org/en-US/kb/how-clear-firefox-cache"> Mozilla FireFox</a>,<a href="http://support.microsoft.com/kb/260897"> Internet Explorer</a> and<a href="http://support.apple.com/kb/ph5041"> Safari</a>.</li><li>Check that no 3rd party application, software or browser extension is preventing a successful download. (ie. Internet Security, Antivirus or Firewall).</li><li>If you''re using a wireless connection, plug your computer directly into the router/broadband modem.</li><li>Try downloading the file using an <em>alternate browser</em> and / or computer.</li><li>Check your router to see if you have any <em>content filtering</em> enabled.</li><li>Check with your <em>ISP</em> to make sure that you haven''t exceeded any download limits.</li></ul><p>Envato recommends <em>agains</em>t the use of <a href="http://support.envato.com/index.php?/Knowledgebase/Article/View/268/0/why-doesnt-my-download-manager-work">download managers</a> when downloading your purchased item(s).</p><p>If you are still having problems downloading your purchase, please<a href="https://help.market.envato.com/hc/en-us/requests/new"> contact Envato Market Help</a>with the following information:</p><ul><li>Name of the item (include the link from your browser).</li><li>The Envato Market username your purchase was made from.</li><li>A brief description of the problem e.g. download stops half way through, error message etc</li></ul>', 'Problems Downloading A File', 1, 1, 'problems-downloading-a-file', 1447156238, 'faq', 4);
INSERT INTO `tp_posts` (`id`, `post_author`, `post_content`, `post_title`, `post_status`, `comment_status`, `post_name`, `post_modified`, `post_type`, `term_id`) VALUES
(24, 1, '<p><img src="https://help.market.envato.com/hc/en-us/article_attachments/201935194/Item_No_Longer_Available.png" alt="" /></p><p><strong>Please Note: </strong>When an item has been removed or is no longer available, it will not explicitly say (as per image above) and could be due to any of the following reasons:</p><p>The item is pending an <em>update</em> from the author and is <em>temporarily unavailable.</em></p><blockquote>Authors may update the item at any time and without prior notice.</blockquote><ul><li>The author may have decided to<em> permanently delete</em> the item from Envato Market.</li></ul><blockquote>The items on Envato Market are <em><strong>not</strong></em> created by Envato. They are created by designers, developers and creatives from all over the globe.</blockquote><ul><li>The file may have been <em>temporarily disabled</em> due to a technical problem or bug.</li></ul><blockquote>The item could be re-activated again after the problem is fixed and the author has updated it.</blockquote><ul><li>We may have received a copyright complaint about the item.</li></ul><blockquote>You can view more information on <a href="https://help.market.envato.com/hc/en-us/articles/202500454-Copyright-101">copyright here.</a></blockquote><ul><li>Unfortunately once a file is <em>permanently removed</em> or <em>deleted</em> from our system, <em>the item can no longer be offered for download.</em></li></ul><p>For these reasons, Envato <strong><em>does not guarantee</em></strong> the ongoing availability of items after the initial download.</p><p><img src="https://help.market.envato.com/hc/en-us/article_attachments/201934860/Download_Not_Available.png" alt="" /></p><p>Envato strongly encourage users to;</p><ul><li>Download your files <strong><em>immediately</em></strong> after purchase.</li><li>Store your original files in a safe place for future access.</li><li>Store locally on your hard drive or backup files to a cloud storage service such as Dropbox or Google Drive.</li></ul><p>If the item you purchased has been removed and no longer available for download, you may be asking <a href="https://help.market.envato.com/hc/en-us/articles/202821460">can I get a refund?</a></p>', 'The Item Has Been Removed', 1, 1, 'the-item-has-been-removed', 1447156304, 'faq', 4),
(25, 1, '<ul><li>To update your item, simply redownload the file.</li><li>Sign In to your Envato account.</li><li>Click ''Downloads'' from the drop down menu.</li><li>Click the ''Download'' button of the item you are updating.</li></ul><h2>Item Update Notifications</h2><ul><li>Authors may choose to notify people who purchase their item via email.</li><li>Change your preference for each item by using the tick box.</li><li>This may not be available for all items you purchase.</li></ul><p class="wysiwyg-text-align-center"><img src="https://help.market.envato.com/hc/en-us/article_attachments/202433954/NotifyEmailUpdate.png" alt="" /></p><p class="wysiwyg-text-align-left"> </p>', 'Update a Purchased Item', 1, 1, 'update-a-purchased-item', 1447156348, 'faq', 4),
(26, 1, '<p>Envato recommends against the use of download managers, to download your purchased files from Envato Market.</p><p>Download managers send multiple requests and create multiple connections to the server - each one counting as a download.</p><p>The server will receive an abnormally large amount of requests to download the file(s) and may result in the item exceeding the <a href="https://help.market.envato.com/hc/en-us/articles/202821300-How-many-times-can-I-download-a-purchased-item-">download limit</a>.</p><p>If you have used a download manager and the items <a href="https://help.market.envato.com/hc/en-us/articles/202821300-How-many-times-can-I-download-a-purchased-item-">download limit</a> has been reached, please contact the <a href="https://help.market.envato.com/hc/en-us/requests/new">Help Team</a> for assistance.</p>', 'Using A Download Manager', 1, 1, 'using-a-download-manager', 1447156383, 'faq', 4),
(27, 1, '<p class="story-body__introduction">China''s two largest internet retailers have clashed in the run-up to Singles Day, the world''s biggest online sales day, on 11 November.</p><p>Alibaba has been accused by its smaller rival JD.com of "forcing retailers" to promote their sales exclusively with its own outlet, Tmall.</p><p>JD.com has lodged a complaint with the Chinese industry and commerce watchdog but Alibaba denies the allegation.</p><p>The retail giant claims its rival is "panicking because they''re losing".</p><p>"They simply can''t match our customer and merchant experience and logistical scale because Alibaba wins with customers and merchants as we provide a superior experience for users on our platforms," said Jim Wilkinson, Alibaba''s senior vice president of international corporate affairs.</p><p>The Wall Street Journal reported that a shoe retailer called Mulinsen had declined to promote JD''s Singles Day event.</p><p>Singles Day began in the early 1990s as a day for people not in relationships to treat themselves, in the spirit of Valentines Day.</p><p>The Chinese State Administration for Industry and Commerce (SAIC) has accepted the complaint and warned retailers "not to use malicious marketing methods to engage in competition" ahead of the event, according to the Xinhua news agency.</p><div class="hotspot hotspot--empty"> </div><p>A recent change in legislation bans online retailers limiting promotional activity by their merchants on other platforms.</p><p>Last year, Alibaba recorded $9.3bn (£5.9bn) sales during the annual event, which it adopted in 2009.</p>', 'Alibaba in Singles Day sales clash', 1, 1, 'alibaba-in-singles-day-sales-clash', 1447159611, 'news', 5),
(28, 1, '<p class="story-body__introduction">The number of videos viewed every day on messaging app Snapchat has tripled since May this year to six billion.</p><p>Snapchat confirmed the figure following a report in the Financial Times.</p><p>Last week, Facebook said it was now registering eight billion views a day of video material posted on its social media network.</p><p>However, different platforms do not use the same criteria when counting views - Facebook <a class="story-body__link-external" href="https://www.facebook.com/business/news/Coming-Soon-Video-Metrics">counts videos viewed for three seconds or longer</a>.</p><p>YouTube <a class="story-body__link-external" href="https://support.google.com/displayspecs/answer/6055025?hl=en">only charges advertisers if a video is viewed for 30 seconds</a>, and while Snapchat does not say how long a video must play in order to count, a<a class="story-body__link-external" href="http://digiday.com/platforms/snapchats-bold-strategy-charges-brands-videos-zero-seconds/"> recent report</a> said advertisers were being charged even if their ad was viewed for less than one second.</p><p>According to Snapchat, more than 60% of 13- to 34 year-old smartphone owners in the US use the service, which is available only on mobile platforms.</p><p>Chief executive Evan Spiegel <a class="story-body__link-external" href="http://www.bloomberg.com/news/features/2015-05-26/evan-spiegel-reveals-plan-to-turn-snapchat-into-a-real-business">told Bloomberg in May</a> that videos had reached two billion hits per day.</p><p>In 2013, Snapchat turned down a $3bn (£2bn) acquisition offer from Facebook,<a class="story-body__link-external" href="http://blogs.wsj.com/digits/2013/11/13/snapchat-spurned-3-billion-acquisition-offer-from-facebook/?mod=WSJ_hps_LEFTTopStories">according to the Wall Street Journal</a>.</p>', 'Snapchat hits six billion daily video views', 1, 1, 'snapchat-hits-six-billion-daily-video-views', 1447159658, 'news', 5),
(29, 1, '<h2 class="story-body__crosshead">Will it work?</h2><p> </p><figure class="media-landscape has-caption full-width"><span class="image-and-copyright-container"><img class="js-image-replace" src="http://ichef.bbci.co.uk/news/624/cpsprodpb/1530/production/_86542450_blackberrysecondpic.jpg" alt="BB logo and flag" width="976" height="549" /><span class="off-screen">Image copyright</span><span class="story-image-copyright">Reuters</span></span><figcaption class="media-caption"><span class="off-screen">Image caption</span><span class="media-caption__text">Canada-based Blackberry may desert the device business if its latest handset is a flop</span></figcaption></figure><p>By Blackberry''s own admission, its handsets are performing terribly. So much so that current chief executive John Chen said he''d pull out of the device market if things didn''t pick up soon.</p><p>But the Blackberry aesthetic has attracted some fans.</p><p>The unorthodox Blackberry Passport, which is square, was laughed at by many techies but impressed in the fashion community, picking up various design awards along the way.</p><p>By being aligned with corporate success, Blackberry devices can be a status symbol, like a sharp suit. It says "you must be doing something very important if you''re using a Blackberry to do it".</p><p>Furthermore, as the Priv is an Android device, it means all the popular apps will be available - unlike previous Blackberrys which didn''t support the likes of Uber and Instagram (although there were some attempts to emulate Android apps).</p><p>As for the downsides, while the rear camera is well-specced, the front-facing camera is a less impressive at 2 megapixels. Not great for selfies, naturally, but also bad for video conferencing over Skype, among others - so perhaps a turn-off for business customers.</p><p>At a cost of $700 for a sim-free handset (or £579.99 in the UK) - the new handset is in line with the iPhone and top-end Android devices.</p><p>Though a more aggressively priced device might have been what made people jump ship at their next upgrade.</p>', 'Blackberry Priv: The final phone in the coffin?', 1, 1, 'blackberry-priv-the-final-phone-in-the-coffin', 1447159726, 'news', 5),
(30, 1, '<p>But even if the government wanted to spend taxpayer funds to make that happen, there will be resistance from BT''s rivals.</p><p>Virgin Media has already called for an end to subsidies for rural broadband, claiming the market can now do the job - although it isn''t clear that it will be moving to offer cable to every remote home.</p><p>Meanwhile, there are signs of a split opening up between town and country over the subsidy issue.</p><p>The director of the free market Institute of Economic Affairs Mark Littlewood told Radio 4''s PM that people living in remote rural areas had made that choice, and fast broadband should not be a right.</p><p>Rural broadband campaigners hit back.</p><p>John Popham, who advises rural communities wanting to get connected, told me there was already a widening gap between town and country: "For me the issue is that urban connections are getting faster. Stuff is then developed to take advantage of those fast connections which is then inaccessible to rural users."</p><p>Many of those campaigners have been deeply sceptical about BT''s strategy for rolling out fast broadband, and some have joined calls for its Openreach division, which operates the fibre and copper networks, to be sold off.</p><p>But here''s the paradox - the move to make fast broadband a right for everyone could end up strengthening BT''s hand. If it is asked to meet a Universal Service Obligation, without being offered subsidies to make that feasible, then the company will want something in return.</p><p>It is Ofcom, not ministers, which is currently pondering whether Openreach should be sold off.</p><p>But the regulator will be hearing strong arguments that a divided BT will not be in good shape to help the Prime Minister fulfil his promises on fast broadband.</p>', 'Universal broadband - how, why, how much?', 1, 1, 'universal-broadband-how-why-how-much', 1447159782, 'news', 5),
(31, 1, '<figure class="media-landscape no-caption full-width lead"><span class="image-and-copyright-container"><img class="js-image-replace" style="display: block; margin-left: auto; margin-right: auto;" src="http://ichef-1.bbci.co.uk/news/660/cpsprodpb/4DC2/production/_86560991_gettyimages-145774235.jpg" alt="Activision Blizzard" width="976" height="549" /></span></figure><p> </p><p class="story-body__introduction">Activision Blizzard, maker of the Call of Duty video game, announced it will make original films and TV series.</p><p>The newly formed Activision Blizzard Studios will base the shows and movies on the company''s games.</p><p>It plans to release a TV series based on Skylanders Academy in 2016 and films based of the military videogame Call of Duty starting in 2018 or 2019.</p><p>The firm made the announcement during its annual fan convention called BlizzCon.</p><p>Nick van Dyk co-president of Activision Blizzard Studios said the studio would deliver the "action that fans expect from this franchise".</p><p>"We''ll have a fraction of the overhead of the typical studio since we''re starting with a blank page and building an organization that is right-sized for our intended creative output and for the future of the industry," he said.</p><h2 class="story-body__crosshead">Branching out</h2><p>Activision already had plans to release a film based on its game franchise Warcraft in 2016 through a partnership with Legendary Pictures.</p><p>It is a further effort by the company to expand beyond games for games consoles.</p><p>On Monday Activision announced plans to buy mobile phone game maker King Digital Entertainment, the creator of Candy Crush.</p><p>That deal is valued at $5.9bn (£3.9bn).</p>', 'Activision Blizzard to launch a TV and film studio', 1, 1, 'activision-blizzard-to-launch-a-tv-and-film-studio', 1447159848, 'news', 5),
(32, 1, '<p>Composer is really missing an "outdated" command like most of the other package managers. Luckily, the <a href="https://github.com/vinkla/climb" target="_blank">Climb</a> package has this covered!</p><p align="center"><img src="https://jenssegers.com/uploads/images/climbing.png?v2" alt="" width="276" /></p><p>Climb checks your composer files to see which packages are outdated, regardless of your version constraints. Without Climb, there''s no way of knowing if a package has a new major release unless you use a notification system like<a href="https://gemnasium.com/" target="_blank">Gemnasium</a>. Climb is one of those tools you just need to get on your tool belt.</p><p>Install Climb by adding it to your global composer packages:</p><pre><code class="bash hljs">composer global require vinkla/climb</code></pre><p>Make sure your global composer bin folder is added to your <code>$PATH</code> environment variable. If not, add the following to your <code>.bashrc</code> or <code>.zshrc</code>:</p><pre><code class="bash hljs"><span class="hljs-built_in">export</span> PATH=<span class="hljs-variable">$PATH</span>:~/.composer/vendor/bin</code></pre><p>Then go to one of your PHP projects and run the <code>climb</code> command. You should see a list of outdated and upgradable packages for that specific project:</p><pre><code class="bash hljs">&gt;  climb\r\n\r\nguzzlehttp/guzzle               <span class="hljs-number">5.3</span>.<span class="hljs-number">0</span>      →     <span class="hljs-number">6.1</span>.<span class="hljs-number">0</span>\r\njenssegers/optimus              <span class="hljs-number">0.1</span>.<span class="hljs-number">4</span>      →     <span class="hljs-number">0.2</span>.<span class="hljs-number">0</span>\r\nsensiolabs/security-checker     <span class="hljs-number">2.0</span>.<span class="hljs-number">5</span>      →     <span class="hljs-number">3.0</span>.<span class="hljs-number">2</span>\r\n\r\nThe following dependencies are satisfied by their declared version constraint, but the installed versions are behind. You can install the latest versions without modifying your composer.json file by using <span class="hljs-string">''composer update''</span>.\r\n\r\njenssegers/agent     <span class="hljs-number">2.2</span>.<span class="hljs-number">2</span>     →     <span class="hljs-number">2.3</span>.<span class="hljs-number">0</span></code></pre><p>The package is still under development, but some cool new things are coming soon such as <code>climb global</code> to check your global packages and <code>climb upgrade</code> to update the version constraints in your <code>composer.json</code> file.</p>', 'List outdated composer packages with Climb', 1, 1, 'list-outdated-composer-packages-with-climb', 1447160008, 'news', 6),
(33, 1, '<p>Self teaching PHP. It''s pretty easy and going well, I''ve built myself a little system for work that has multiple databases and stuff. In the meantime I''ve been building out modules for different segments like queries or array generation as many of the parts of the site have similar structures.</p><p> </p><p>For example: to create an array from a query about user data, I''ll "include ''Gen_usr_query.php'';". It works well but is a separate document. Would it be better to build one function document that has these functions? Gen_usr_query(); in lieu of the include?</p><p> </p><p>Any recommendations for other best practices or sites with best practices?</p>', 'When to use a function?', 1, 1, 'when-to-use-a-function', 1447160080, 'news', 6),
(34, 1, '<p>Another three months have passed, and our author roster has expanded again.</p><p> </p><p><img title="" src="http://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2014/10/1414659144Fotolia_55746932_Subscription_XL-Medium.jpg" alt="Silhouettes of formally dressed people, blurred, walking towards camera" /></p><p> </p><p>We''ve got six more authors joining us this trimester and they are, in order:</p>', 'PHP Channel’s 2015 2nd Trimester Update', 1, 1, 'php-channels-2015-2nd-trimester-update', 1447160206, 'news', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tp_postsmeta`
--

CREATE TABLE IF NOT EXISTS `tp_postsmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `tp_postsmeta`
--

INSERT INTO `tp_postsmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'user_only', '0'),
(2, 1, 'pin_post', '0'),
(3, 1, 'page_template', 'normal'),
(4, 2, 'user_only', '0'),
(5, 2, 'pin_post', '0'),
(6, 2, 'page_template', 'normal'),
(7, 3, 'user_only', '0'),
(8, 3, 'pin_post', '0'),
(9, 3, 'page_template', 'contact'),
(10, 3, 'views', '3'),
(11, 2, 'views', '5'),
(12, 1, 'views', '2'),
(13, 4, 'user_only', '0'),
(14, 4, 'pin_post', '0'),
(15, 5, 'user_only', '0'),
(16, 5, 'pin_post', '0'),
(17, 6, 'user_only', '0'),
(18, 6, 'pin_post', '0'),
(19, 5, 'views', '1'),
(20, 7, 'user_only', '0'),
(21, 7, 'pin_post', '0'),
(22, 8, 'user_only', '0'),
(23, 8, 'pin_post', '0'),
(24, 9, 'user_only', '0'),
(25, 9, 'pin_post', '0'),
(26, 10, 'user_only', '0'),
(27, 10, 'pin_post', '0'),
(28, 11, 'user_only', '0'),
(29, 11, 'pin_post', '0'),
(30, 12, 'user_only', '0'),
(31, 12, 'pin_post', '0'),
(32, 13, 'user_only', '1'),
(33, 13, 'pin_post', '0'),
(34, 14, 'user_only', '0'),
(35, 14, 'pin_post', '1'),
(36, 15, 'user_only', '1'),
(37, 15, 'pin_post', '1'),
(38, 16, 'user_only', '0'),
(39, 16, 'pin_post', '0'),
(40, 17, 'user_only', '0'),
(41, 17, 'pin_post', '0'),
(42, 18, 'user_only', '0'),
(43, 18, 'pin_post', '0'),
(44, 19, 'user_only', '0'),
(45, 19, 'pin_post', '0'),
(46, 20, 'user_only', '0'),
(47, 20, 'pin_post', '0'),
(48, 21, 'user_only', '0'),
(49, 21, 'pin_post', '0'),
(50, 22, 'user_only', '0'),
(51, 22, 'pin_post', '0'),
(52, 23, 'user_only', '0'),
(53, 23, 'pin_post', '0'),
(54, 24, 'user_only', '0'),
(55, 24, 'pin_post', '0'),
(56, 25, 'user_only', '0'),
(57, 25, 'pin_post', '0'),
(58, 26, 'user_only', '0'),
(59, 26, 'pin_post', '0'),
(60, 15, 'views', '4'),
(61, 14, 'views', '2'),
(62, 13, 'views', '2'),
(63, 11, 'views', '1'),
(64, 12, 'views', '1'),
(65, 10, 'views', '1'),
(66, 27, 'user_only', '0'),
(67, 27, 'pin_post', '0'),
(68, 28, 'user_only', '0'),
(69, 28, 'pin_post', '0'),
(70, 29, 'user_only', '0'),
(71, 29, 'pin_post', '0'),
(72, 30, 'user_only', '0'),
(73, 30, 'pin_post', '0'),
(74, 31, 'user_only', '0'),
(75, 31, 'pin_post', '0'),
(76, 32, 'user_only', '0'),
(77, 32, 'pin_post', '0'),
(78, 32, 'views', '2'),
(79, 33, 'user_only', '0'),
(80, 33, 'pin_post', '0'),
(81, 34, 'user_only', '0'),
(82, 34, 'pin_post', '0'),
(83, 34, 'views', '2'),
(84, 33, 'views', '1'),
(85, 31, 'views', '1'),
(86, 30, 'views', '1'),
(87, 29, 'views', '1'),
(88, 28, 'views', '1'),
(89, 27, 'views', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tp_session`
--

CREATE TABLE IF NOT EXISTS `tp_session` (
  `sessionhash` char(32) NOT NULL default '',
  `userid` int(10) unsigned NOT NULL default '0',
  `host` char(15) NOT NULL default '',
  `idhash` char(32) NOT NULL default '',
  `lastactivity` int(10) unsigned NOT NULL default '0',
  `location` char(255) NOT NULL default '',
  `useragent` char(255) NOT NULL,
  PRIMARY KEY  (`sessionhash`),
  KEY `user_activity` (`userid`,`lastactivity`),
  KEY `guest_lookup` (`idhash`,`host`,`userid`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tp_terms`
--

CREATE TABLE IF NOT EXISTS `tp_terms` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(200) NOT NULL default '',
  `slug` varchar(200) NOT NULL default '',
  `parent` bigint(20) NOT NULL default '0',
  `type` varchar(30) NOT NULL default '',
  `orders` bigint(20) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tp_terms`
--

INSERT INTO `tp_terms` (`id`, `name`, `slug`, `parent`, `type`, `orders`, `status`) VALUES
(1, 'Buying', 'buying', 0, 'knowledgebase', 1, 1),
(2, 'Item Support', 'item-support', 0, 'knowledgebase', 2, 1),
(3, 'Payments', 'payments', 0, 'faq', 1, 1),
(4, 'Downloads', 'downloads', 0, 'faq', 2, 1),
(5, 'Technology', 'technology', 0, 'news', 1, 1),
(6, 'news php', 'news-php', 0, 'news', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tp_termsmeta`
--

CREATE TABLE IF NOT EXISTS `tp_termsmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `term_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tp_termsmeta`
--

INSERT INTO `tp_termsmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'thumbnail', ''),
(2, 1, 'description', ''),
(3, 2, 'thumbnail', ''),
(4, 2, 'description', ''),
(5, 3, 'thumbnail', ''),
(6, 3, 'description', ''),
(7, 4, 'thumbnail', ''),
(8, 4, 'description', ''),
(9, 5, 'thumbnail', ''),
(10, 5, 'description', ''),
(11, 6, 'thumbnail', ''),
(12, 6, 'description', '');

-- --------------------------------------------------------

--
-- Table structure for table `tp_users`
--

CREATE TABLE IF NOT EXISTS `tp_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(24) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_key` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tp_users`
--

INSERT INTO `tp_users` (`id`, `username`, `password`, `email`, `activation_key`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'megatpl@gmail.com', '', 1),
(2, 'hossam', 'e10adc3949ba59abbe56e057f20f883e', 'eng.h.hamed@gmail.com', '', 1),
(3, 'omar', 'e10adc3949ba59abbe56e057f20f883e', 'themearabia@gmail.com', '', 1),
(4, 'Ahmed', 'e10adc3949ba59abbe56e057f20f883e', 'themearabia@gmail.com', '', 1),
(5, 'adamaris', 'e10adc3949ba59abbe56e057f20f883e', 'adamaris@gmail.com', '', 1),
(6, 'Angela', 'e10adc3949ba59abbe56e057f20f883e', 'angela@gmail.com', '', 1),
(7, 'Amanda', 'e10adc3949ba59abbe56e057f20f883e', 'amanda@gmail.com', '', 1),
(8, 'Addison', 'e10adc3949ba59abbe56e057f20f883e', 'addison@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tp_usersmeta`
--

CREATE TABLE IF NOT EXISTS `tp_usersmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `tp_usersmeta`
--

INSERT INTO `tp_usersmeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'firstname', 'hossam'),
(2, 1, 'lastname', 'hamed'),
(3, 1, 'group_name', 'administrator'),
(4, 1, 'group_color', '#C71919'),
(5, 1, 'group', 'administrator'),
(6, 1, 'capabilities', 'administrator'),
(7, 1, 'signuptime', '1447151082'),
(8, 1, 'forgettime', ''),
(9, 1, 'ipaddress', '127.0.0.1'),
(10, 1, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(11, 1, 'avatar', 'admin_1975693709_1447163275.png'),
(12, 1, 'cover', 'admin_900173982_1447163248.png'),
(13, 1, 'location', 'Egypt, Cairo'),
(14, 1, 'website', 'themearabia.net'),
(15, 1, 'twitter', '#'),
(16, 1, 'google', '#'),
(17, 1, 'facebook', '#'),
(18, 1, 'youtube', '#'),
(19, 1, 'vimeo', '#'),
(20, 1, 'flickr', '#'),
(21, 1, 'dribbble', '#'),
(22, 1, 'pinterest', '#'),
(23, 2, 'firstname', 'hossam'),
(24, 2, 'lastname', 'mega'),
(25, 2, 'group_name', 'administrator'),
(26, 2, 'group_color', '#C71919'),
(27, 2, 'group', 'administrator'),
(28, 2, 'capabilities', 'administrator'),
(29, 2, 'signuptime', '1447151082'),
(30, 2, 'forgettime', ''),
(31, 2, 'ipaddress', '127.0.0.1'),
(32, 2, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(33, 2, 'avatar', 'hossam_965830211_1447163112.png'),
(34, 2, 'cover', 'hossam_1281091761_1447163128.png'),
(35, 2, 'location', 'Egypt, Cairo'),
(36, 2, 'website', 'themearabia.net'),
(37, 2, 'twitter', '#'),
(38, 2, 'google', '#'),
(39, 2, 'facebook', '#'),
(40, 2, 'youtube', '#'),
(41, 2, 'vimeo', '#'),
(42, 2, 'flickr', '#'),
(43, 2, 'dribbble', '#'),
(44, 2, 'pinterest', '#'),
(45, 3, 'firstname', 'omar'),
(46, 3, 'lastname', 'hossam'),
(47, 3, 'group_name', 'administrator'),
(48, 3, 'group_color', '#C71919'),
(49, 3, 'group', 'administrator'),
(50, 3, 'capabilities', 'administrator'),
(51, 3, 'signuptime', '1447151082'),
(52, 3, 'forgettime', ''),
(53, 3, 'ipaddress', '127.0.0.1'),
(54, 3, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(55, 3, 'avatar', 'omar_614635404_1447163168.png'),
(56, 3, 'cover', 'omar_1706295947_1447163149.png'),
(57, 3, 'location', 'Egypt, Cairo'),
(58, 3, 'website', 'themearabia.net'),
(59, 3, 'twitter', '#'),
(60, 3, 'google', '#'),
(61, 3, 'facebook', '#'),
(62, 3, 'youtube', '#'),
(63, 3, 'vimeo', '#'),
(64, 3, 'flickr', '#'),
(65, 3, 'dribbble', '#'),
(66, 3, 'pinterest', '#'),
(67, 4, 'firstname', 'ahmed'),
(68, 4, 'lastname', 'hossam'),
(69, 4, 'group_name', 'administrator'),
(70, 4, 'group_color', '#C71919'),
(71, 4, 'group', 'administrator'),
(72, 4, 'capabilities', 'administrator'),
(73, 4, 'signuptime', '1447151082'),
(74, 4, 'forgettime', ''),
(75, 4, 'ipaddress', '127.0.0.1'),
(76, 4, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(77, 4, 'avatar', 'Ahmed_855475384_1447163201.png'),
(78, 4, 'cover', 'Ahmed_1463969819_1447163220.png'),
(79, 4, 'location', 'Egypt, Cairo'),
(80, 4, 'website', 'themearabia.net'),
(81, 4, 'twitter', '#'),
(82, 4, 'google', '#'),
(83, 4, 'facebook', '#'),
(84, 4, 'youtube', '#'),
(85, 4, 'vimeo', '#'),
(86, 4, 'flickr', '#'),
(87, 4, 'dribbble', '#'),
(88, 4, 'pinterest', '#'),
(89, 5, 'firstname', 'adamaris'),
(90, 5, 'lastname', 'adamaris'),
(91, 5, 'group_name', 'administrator'),
(92, 5, 'group_color', '#C71919'),
(93, 5, 'group', 'administrator'),
(94, 5, 'capabilities', 'administrator'),
(95, 5, 'signuptime', '1447151082'),
(96, 5, 'forgettime', ''),
(97, 5, 'ipaddress', '127.0.0.1'),
(98, 5, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(99, 5, 'avatar', 'adamaris_1124639322_1447163627.png'),
(100, 5, 'cover', 'adamaris_13340949_1447163645.jpg'),
(101, 5, 'location', 'Aramaic'),
(102, 5, 'website', 'adamaris.net'),
(103, 5, 'twitter', '#'),
(104, 5, 'google', '#'),
(105, 5, 'facebook', '#'),
(106, 5, 'youtube', '#'),
(107, 5, 'vimeo', '#'),
(108, 5, 'flickr', '#'),
(109, 5, 'dribbble', '#'),
(110, 5, 'pinterest', '#'),
(111, 6, 'firstname', 'angela'),
(112, 6, 'lastname', 'angela'),
(113, 6, 'group_name', 'administrator'),
(114, 6, 'group_color', '#C71919'),
(115, 6, 'group', 'administrator'),
(116, 6, 'capabilities', 'administrator'),
(117, 6, 'signuptime', '1447151082'),
(118, 6, 'forgettime', ''),
(119, 6, 'ipaddress', '127.0.0.1'),
(120, 6, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(121, 6, 'avatar', 'Angela_447351573_1447163679.png'),
(122, 6, 'cover', 'Angela_395347555_1447163665.png'),
(123, 6, 'location', 'Armenian'),
(124, 6, 'website', 'angela.net'),
(125, 6, 'twitter', '#'),
(126, 6, 'google', '#'),
(127, 6, 'facebook', '#'),
(128, 6, 'youtube', '#'),
(129, 6, 'vimeo', '#'),
(130, 6, 'flickr', '#'),
(131, 6, 'dribbble', '#'),
(132, 6, 'pinterest', '#'),
(133, 7, 'firstname', 'amanda'),
(134, 7, 'lastname', 'amanda'),
(135, 7, 'group_name', 'administrator'),
(136, 7, 'group_color', '#C71919'),
(137, 7, 'group', 'administrator'),
(138, 7, 'capabilities', 'administrator'),
(139, 7, 'signuptime', '1447151082'),
(140, 7, 'forgettime', ''),
(141, 7, 'ipaddress', '127.0.0.1'),
(142, 7, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(143, 7, 'avatar', 'Amanda_1135628256_1447163707.png'),
(144, 7, 'cover', 'Amanda_1953203118_1447163720.png'),
(145, 7, 'location', 'Aramaic'),
(146, 7, 'website', 'amanda.net'),
(147, 7, 'twitter', '#'),
(148, 7, 'google', '#'),
(149, 7, 'facebook', '#'),
(150, 7, 'youtube', '#'),
(151, 7, 'vimeo', '#'),
(152, 7, 'flickr', '#'),
(153, 7, 'dribbble', '#'),
(154, 7, 'pinterest', '#'),
(155, 8, 'firstname', 'addison'),
(156, 8, 'lastname', 'addison'),
(157, 8, 'group_name', 'administrator'),
(158, 8, 'group_color', '#C71919'),
(159, 8, 'group', 'administrator'),
(160, 8, 'capabilities', 'administrator'),
(161, 8, 'signuptime', '1447151082'),
(162, 8, 'forgettime', ''),
(163, 8, 'ipaddress', '127.0.0.1'),
(164, 8, 'user_agent', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'),
(165, 8, 'avatar', 'Addison_1356707731_1447163753.png'),
(166, 8, 'cover', 'Addison_1695254600_1447163768.png'),
(167, 8, 'location', 'Aramaic'),
(168, 8, 'website', 'addison.net'),
(169, 8, 'twitter', '#'),
(170, 8, 'google', '#'),
(171, 8, 'facebook', '#'),
(172, 8, 'youtube', '#'),
(173, 8, 'vimeo', '#'),
(174, 8, 'flickr', '#'),
(175, 8, 'dribbble', '#'),
(176, 8, 'pinterest', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tp_voting`
--

CREATE TABLE IF NOT EXISTS `tp_voting` (
  `id` bigint(20) NOT NULL auto_increment,
  `post_id` bigint(20) NOT NULL,
  `vote` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tp_votingmeta`
--

CREATE TABLE IF NOT EXISTS `tp_votingmeta` (
  `voting_id` bigint(20) unsigned NOT NULL auto_increment,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  `modified` int(50) NOT NULL,
  PRIMARY KEY  (`voting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
