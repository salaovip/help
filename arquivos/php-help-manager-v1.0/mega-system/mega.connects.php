<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|
//----------------------------------------------------------------------|
// host [ localhost name ]
    $dbhost       = 'localhost';
//----------------------------------------------------------------------|
// name [ database name ]
    $dbname       = 'php_helpdesk';
//----------------------------------------------------------------------|
// user [ user database name ]
    $dbuser       = 'root';
//----------------------------------------------------------------------|
// password [ database password ]
    $dbpasswd     = '123456';
//----------------------------------------------------------------------|
// prefix [  ]
    $table_prefix = '';
//----------------------------------------------------------------------|
// port []
    $dbport       = '';
//----------------------------------------------------------------------|
//----------------------------------------------------------------------|
//----------------------------------------------------------------------| tables DB
    @define('CONFIG_TABLE',     $table_prefix . 'config');
    @define('SESSION_TABLE',    $table_prefix . 'session');
    @define('CATEGORIES_TABLE', $table_prefix . 'categories');
    @define('ADMIN_TABLE',      $table_prefix . 'admin');
    @define('POSTS_TABLE',      $table_prefix . 'posts');
    @define('VOTING_TABLE',     $table_prefix . 'voting');
    @define('LANGS_TABLE',      $table_prefix . 'languages');
    @define('PHRASES_TABLE',    $table_prefix . 'phrases');
    @define('EMAILTEMP_TABLE',  $table_prefix . 'emailtemplates');
//----------------------------------------------------------------------|
?>