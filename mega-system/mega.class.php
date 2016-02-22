<?php 
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 2.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|
// Start
error_reporting(0);
//----------------------------------------------------------------------|
$path = str_replace("\\","/",dirname(__FILE__));
$path = str_replace("/mega-system","",$path);
if ( !defined('ABSPATH') )
	define('ABSPATH', $path . '/');
//----------------------------------------------------------------------|
// Define System
    @define('SHOWDEBUG',                    false);
    @define('IN_MEGABUGS',                  false);
    @define('GZIP_COMPRESS',                true);
    @define('TEMP_PATH',                    'themes/');
    @define('CACHE_PATH',                   'mega-cache/');
    @define('TEMP_FOLDER_NAME',             '');
    @define('UPLOAD_TEMPIMG_PATH',          'uploads/tempimg/');
    @define('UPLOAD_USER_COVER_SPATH',      'uploads/userscovers/');
    @define('UPLOAD_USER_AVATARS_SPATH',    'uploads/usersavatars/');
    @define('DOC_ROOT',                     $_SERVER['DOCUMENT_ROOT']);
    @define('ADMIN_DIR',                    ABSPATH.'admin/');
    @define('SYSTEM_DIR',                   ABSPATH.'mega-system/');
    
//----------------------------------------------------------------------|
    $configFile = SYSTEM_DIR . "mega.config.php";
    if (file_exists($configFile)) {
      require_once($configFile);
    } else {
      header("Location: setup/");
    }
  
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
    @define('POSTS_TABLE',      $table_prefix . 'posts');
    @define('POSTSMETA_TABLE',  $table_prefix . 'postsmeta');
    @define('TERMS_TABLE',      $table_prefix . 'terms');
    @define('TERMSMETA_TABLE',  $table_prefix . 'termsmeta');
    @define('VOTING_TABLE',     $table_prefix . 'voting');
    @define('VOTINGMETA_TABLE', $table_prefix . 'votingmeta');
    @define('LANGS_TABLE',      $table_prefix . 'languages');
    @define('PHRASES_TABLE',    $table_prefix . 'phrases');
    @define('USERS_TABLE',      $table_prefix . 'users');
    @define('USERSMETA_TABLE',  $table_prefix . 'usersmeta');
    @define('ATTACHMENT_TABLE', $table_prefix . 'attachment');
    @define('COUNTER_TABLE',    $table_prefix . 'counter');
//----------------------------------------------------------------------|
    include('mega.template.php');
// Start Class
    $Megatpl    = new Megatpl();
    $template	= new template();
    if(!defined('IN_MEGATPL_CP')){}
    include(SYSTEM_DIR.'mega.seo.php');
    include(SYSTEM_DIR.'mega.functions.php');
    include(SYSTEM_DIR.'mega.session.php');
    $session = new session();
    include(SYSTEM_DIR.'mega.display.php');
    $display = new display();
    include(SYSTEM_DIR.'mega.users.php');
    $users = new users();
    set_timezone();
    @define('GET_IP',$_SERVER['REMOTE_ADDR']);
    @define('GET_PC',$_SERVER['HTTP_USER_AGENT']);//user_agent
    @define('GET_REFERER',$_SERVER['HTTP_REFERER']); // referer
// end
?>