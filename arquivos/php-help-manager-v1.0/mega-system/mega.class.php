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
// Start
error_reporting(E_ALL);
// Define
    @define('SHOWDEBUG',      true);
    @define('GZIP_COMPRESS',  true);
    @define('TEMP_PATH', 'themes/');
    @define('CACHE_PATH','mega-cache/');
    @define('TEMP_FOLDER_NAME','');
    @define('POST_ARTICLE_PATH','uploads/article/');
    @define('POST_NEWS_PATH','uploads/news/');
    @define('DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
// Setting Array
    $setting['use_database']     = true;
    $setting['class_database']   = true;
    $setting['use_var_config']   = true;
// Include System Template
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