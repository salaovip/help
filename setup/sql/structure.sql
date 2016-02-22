-- ================================================================
--
-- @version $Id: structure.sql 2015-11-10 10:12:05 gewa $
-- @package PHP Help Manager v2.0
-- @copyright 2015.
--
-- ================================================================
-- Database structure
-- ================================================================

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}attachment` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}counter` (
  `id` int(11) NOT NULL auto_increment,
  `meta_key` varchar(50) NOT NULL,
  `ip` varchar(100) default NULL,
  `modified` int(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}languages` (
  `id` int(9) NOT NULL auto_increment,
  `code` varchar(8) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL default '0',
  `regex` varchar(64) character set utf8 collate utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL,
  `defaultd` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `language_default` (`defaultd`),
  KEY `language_code` (`code`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phrases`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}phrases` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lang_iso` varchar(5) NOT NULL default 'en',
  `varname` varchar(250) NOT NULL default '',
  `text` text character set utf8 collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}posts` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postsmeta`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}postsmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}session` (
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
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}terms` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termsmeta`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}termsmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `term_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(24) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_key` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}usersmeta` (
  `meta_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  PRIMARY KEY  (`meta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}voting` (
  `id` bigint(20) NOT NULL auto_increment,
  `post_id` bigint(20) NOT NULL,
  `vote` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `votingmeta`
--

CREATE TABLE IF NOT EXISTS `{$db_prefix}votingmeta` (
  `voting_id` bigint(20) unsigned NOT NULL auto_increment,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) default NULL,
  `meta_value` longtext,
  `modified` int(50) NOT NULL,
  PRIMARY KEY  (`voting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
