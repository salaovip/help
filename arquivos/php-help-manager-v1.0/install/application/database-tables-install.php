<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
// sql $tables = array("table name" => "code SQL")
// Example
$tables = array(
    "admin" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."admin` (
                  `id` int(11) NOT NULL auto_increment,
                  `username` varchar(24) NOT NULL,
                  `password` varchar(256) NOT NULL,
                  `email` varchar(100) NOT NULL,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
                ",
                
    "config" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."config` (
                  `config_name` varchar(255) NOT NULL default '',
                  `config_value` text NOT NULL,
                  PRIMARY KEY  (`config_name`)
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    ",
    
    "categories" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."categories` (
                  `id` int(6) NOT NULL auto_increment,
                  `catetype` varchar(50) NOT NULL,
                  `name` varchar(255) NOT NULL,
                  `orders` int(6) NOT NULL,
                  `status` int(1) NOT NULL,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
                ",
                
    "emailtemplates" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."emailtemplates` (
                  `id` int(10) NOT NULL auto_increment,
                  `name` varchar(100) NOT NULL,
                  `content` text NOT NULL,
                  `vars` varchar(255) NOT NULL,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
                ",
    
    "languages" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."languages` (
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
                ",
                
    "phrases" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."phrases` (
                  `id` int(10) unsigned NOT NULL auto_increment,
                  `lang_iso` varchar(5) NOT NULL default 'en',
                  `varname` varchar(250) NOT NULL default '',
                  `text` text character set utf8 collate utf8_unicode_ci,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
                ",
                
    "posts" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."posts` (
                  `id` int(9) NOT NULL auto_increment,
                  `uid` int(9) NOT NULL,
                  `cid` int(9) NOT NULL,
                  `posttype` varchar(20) NOT NULL,
                  `title` varchar(255) NOT NULL,
                  `content` longtext NOT NULL,
                  `modified` int(50) NOT NULL,
                  `views` int(9) NOT NULL,
                  `orders` int(9) NOT NULL,
                  `status` int(1) NOT NULL,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
                ",
                
    "session" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."session` (
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
                ",
                
    "voting" => "CREATE TABLE IF NOT EXISTS `".IN_DBPREF."voting` (
                  `id` int(9) NOT NULL auto_increment,
                  `pid` int(9) NOT NULL,
                  `vote_up` int(9) NOT NULL,
                  `vote_down` int(11) NOT NULL,
                  PRIMARY KEY  (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
                ",
);
?>