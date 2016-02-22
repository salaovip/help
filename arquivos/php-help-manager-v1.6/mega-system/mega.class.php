<?php 
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|
// Start
error_reporting(E_ALL);
//----------------------------------------------------------------------|
// Define System
    @define('SHOWDEBUG',      true);
    @define('GZIP_COMPRESS',  true);
    @define('TEMP_PATH', 'themes/');
    @define('CACHE_PATH','mega-cache/');
    @define('TEMP_FOLDER_NAME','');
    @define('POST_ARTICLE_PATH','uploads/article/');
    @define('POST_NEWS_PATH','uploads/news/');
    @define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
//----------------------------------------------------------------------|
// Setting Array
    $setting['use_database']     = true;
    $setting['class_database']   = true;
    $setting['use_var_config']   = true;
// Include System Template
//----------------------------------------------------------------------| 
// Tables DB
    @define('CONFIG_TABLE',     $table_prefix . 'config');
    @define('SESSION_TABLE',    $table_prefix . 'session');
    @define('CATEGORIES_TABLE', $table_prefix . 'categories');
    @define('ADMIN_TABLE',      $table_prefix . 'admin');
    @define('POSTS_TABLE',      $table_prefix . 'posts');
    @define('VOTING_TABLE',     $table_prefix . 'voting');
    @define('LANGS_TABLE',      $table_prefix . 'languages');
    @define('PHRASES_TABLE',    $table_prefix . 'phrases');
    @define('EMAILTEMP_TABLE',  $table_prefix . 'emailtemplates');
    @define('GROUPS_TABLE',     $table_prefix . 'groups');
//----------------------------------------------------------------------|
    include('mega.template.php');
// Start Class
    $Megatpl    = new Megatpl();
    $template	= new template();
    if(!defined('IN_MEGATPL_CP'))
    {
        
    }
    include('mega.seo.php');
    include('mega.display.php');
    $display = new display();   
    @define('GET_IP',$_SERVER['REMOTE_ADDR']);
    @define('GET_PC',$_SERVER['HTTP_USER_AGENT']);
    @define('GET_REFERER',$_SERVER['HTTP_REFERER']); // referer
// end
?>