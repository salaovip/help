<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
define('IN_MEGATPL', true);
define('IN_SCRIPT_NAME', 'PHP Help Manager');
define('IN_LANGUAGE', 'en');
define('IN_THEME', 'color1');
define('IN_SCROLLBAR_THEME', 'dark-3');
define('IN_SHOW_NAVBAR', true);
$temp['URL'] = $_SERVER['SERVER_NAME'].str_replace('install', '', dirname($_SERVER['SCRIPT_NAME']));
define('IN_PATH_FILE_CONFIG', '../mega-system/mega.connects.php');
include(IN_PATH_FILE_CONFIG);
define('IN_DBHOST', $dbhost);
define('IN_DBNAME', $dbname);
define('IN_DBUSER', $dbuser);
define('IN_DBPASS', $dbpasswd);
define('IN_DBPREF', $table_prefix);
$check_the_server[] = array ('check'     => true,'title'     => 'php Version','version'   => '5.2','value'     => phpversion(),'stop'      => false,'msg'       => array('on'=>'yes php Version', 'off'=>'no php Version'),);
$check_the_folder[] = array ('check'     => true,'title'     => 'The existence of a folder uploads','value'     => file_exists('../uploads'),'stop'      => false,'msg'       => array('on'=>'On', 'off'=>'Off'),);
$check_the_folder[] = array ('check'     => true,'title'     => 'The existence of a folder mega-cache','value'     => file_exists('../mega-cache'),'stop'      => false,'msg'       => array('on'=>'On', 'off'=>'Off'),);
$check_the_folder[] = array ('check'     => true,'title'     => 'The existence of a folder admin/mega-cache','value'     => file_exists('../admin/mega-cache'),'stop'      => false,'msg'       => array('on'=>'On', 'off'=>'Off'),);
function modal_step3($date)
{
    $sql['tablename'] = 'config';
    $sql['sql'] = "INSERT INTO `".IN_DBPREF."config` (`config_name`, `config_value`) VALUES ('sitename', '".$date['site_name']."'),('sitemail', '".$date['site_email']."'),('siteurl', '".$date['site_url']."'),('sitethemes', '".$date['sitethemes']."'),('sitetlang', '".$date['sitetlang']."');";
    if($date['sitetlang'] == 'en'){$sqllang = "INSERT INTO `".IN_DBPREF."languages` (`id`, `code`, `name`, `regex`, `active`, `defaultd`) VALUES ('', 'en', 'English', '/^en/i', 0, 1),('', 'ar', 'العربية', '/^ar/i', 0, 0);";}
    elseif($date['sitetlang'] == 'ar'){$sqllang = "INSERT INTO `".IN_DBPREF."languages` (`id`, `code`, `name`, `regex`, `active`, `defaultd`) VALUES ('', 'en', 'English', '/^en/i', 0, 0),('', 'ar', 'العربية', '/^ar/i', 0, 1);";}
    else{$sqllang = "INSERT INTO `".IN_DBPREF."languages` (`id`, `code`, `name`, `regex`, `active`, `defaultd`) VALUES ('', 'en', 'English', '/^en/i', 0, 1),('', 'ar', 'العربية', '/^ar/i', 0, 0);";}
    parse_mysql_dump($sqllang);
    return $sql;
}
function modal_step4($date)
{
    $sql = array();
    $sql['tablename'] = 'admin';
    $sql['sql'] = "INSERT INTO `".IN_DBPREF."admin` (`isadmin`,`username`, `password`, `email`) VALUES ('1', '".$date['admin_name']."', '".md5($date['admin_password'])."', '".$date['admin_email']."');";
    return $sql;
}
$button_show = '<a class="btn btn-xs btn-success status-done hidden" href="../admin/index.php">Admin CP</a> <a class="btn btn-xs btn-success status-done hidden" href="../index.php">Web site</a>';
?>