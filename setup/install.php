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
 @define('IN_MEGATPL', true);                                         //|
//----------------------------------------------------------------------|
require_once("functions.php");
session_start();
$msg = '';
error_reporting(E_ALL);
define("CMS_DS", DIRECTORY_SEPARATOR);
define("BASE", dirname(__FILE__));
define("DDPBASE", str_replace('setup', '', BASE));
$script_path = str_replace('/setup', '', dirname($_SERVER['SCRIPT_NAME']));
$_SERVER['REQUEST_TIME'] = time();
$step = !isset($_GET['step']) ? 0 : (int)$_GET['step'];
$err = false;
if (isset($_POST['db_action']) and $_GET['step'] == '2' ) {
    
    if (!$_POST['dbhost']){$err[] = 1;}
    if (!$_POST['dbuser']){$err[] = 2;}
    if (!$_POST['dbname']){$err[] = 3;}
    $link  = @mysql_connect($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpwd']);
    $error = false;
    if (!$link) {
        $error = true;
        $msg = 'Could not connect to MySQL server: ' . @mysql_error() . '<br />';
    }
    if (!@mysql_select_db($_POST['dbname'], $link)) {
        $error = true;
        $msg .= 'Could not select database ' . sanitize($_POST['dbname']) . ': ' . @mysql_error();
    }

    if ($err or $error){
        cmsHeader();
        include("templates/errorestablishing.tpl.php");
        cmsFooter();
        exit;
    }
    else {
        cmsHeader();
        include("templates/structure_install.tpl.php");
        cmsFooter();
        @mysql_close($link);
        exit;
        
    }
}
elseif (isset($_POST['db_action']) and $_GET['step'] == '3' ) {
    if (!$_POST['dbhost']){$err[] = 1;}
    if (!$_POST['dbuser']){$err[] = 2;}
    if (!$_POST['dbname']){$err[] = 3;}
    $link  = @mysql_connect($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpwd']);
    $error = false;
    if (!$link) {
        $error = true;
        $msg = 'Could not connect to MySQL server: ' . @mysql_error() . '<br />';
    }
    if (!@mysql_select_db($_POST['dbname'], $link)) {
        $error = true;
        $msg .= 'Could not select database ' . sanitize($_POST['dbname']) . ': ' . @mysql_error();
    }
    if ($err or $error){
        cmsHeader();
        include("templates/errorestablishing.tpl.php");
        cmsFooter();
        exit;
    }
    else {
        
        $success = true;
        parse_mysql_dump("sql/structure.sql",$_POST['prefix']);
        if (!$success) {
            $msg = "Error in CREATE TABLE the Database<br />";
        }
        $success = true;
        parse_mysql_dump("sql/structuredata.sql",$_POST['prefix']);
        if (!$success) {
            $msg = "Error in adding the structure data<br />";
        }
        if ($success){
            writeConfigFile($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpwd'], $_POST['dbname'], $_POST['prefix']);
        }
        cmsHeader();
        include("templates/data_install.tpl.php");
        cmsFooter();
        @mysql_close($link);
        exit;
    }
}
elseif (isset($_POST['db_action']) and $_GET['step'] == '4' ) {
    
    if (!$_POST['dbhost']){$err[] = 1;}
    if (!$_POST['dbuser']){$err[] = 2;}
    if (!$_POST['dbname']){$err[] = 3;}
    $link  = @mysql_connect($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpwd']);
    $error = false;
    if (!$link) {
        $error = true;
        $msg = 'Could not connect to MySQL server: ' . @mysql_error() . '<br />';
    }
    if (!@mysql_select_db($_POST['dbname'], $link)) {
        $error = true;
        $msg .= 'Could not select database ' . sanitize($_POST['dbname']) . ': ' . @mysql_error();
    }
    if ($err or $error){
        cmsHeader();
        include("templates/errorestablishing.tpl.php");
        cmsFooter();
        exit;
    }
    else {
        
        $firstname = sanitize($_POST['firstname']);
        $lastname  = sanitize($_POST['lastname']);
        $username  = sanitize($_POST['username']);
        $email     = sanitize($_POST['email']);
        $password  = md5($_POST['password']);
        
        
        mysql_query("INSERT INTO `{$_POST['prefix']}users` (`id`, `username`, `email`, `password`, `status`) VALUES ('','".$username."','".$email."','".$password."','1')");
        $uid = mysql_insert_id();
        mysql_query("INSERT INTO `{$_POST['prefix']}usersmeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES 
            ('','".$uid."','firstname','".$firstname."'),
            ('','".$uid."','lastname','".$lastname."'),
            ('','".$uid."','group_name','administrator'),
            ('','".$uid."','group_color','#C71919'),
            ('','".$uid."','group','administrator'),
            ('','".$uid."','capabilities','administrator'),
            ('','".$uid."','signuptime','".time()."'),
            ('','".$uid."','forgettime',''),
            ('','".$uid."','ipaddress','".$_SERVER['REMOTE_ADDR']."'),
            ('','".$uid."','user_agent','".$_SERVER['HTTP_USER_AGENT']."')
        ");
        
        $web_title     = sanitize($_POST['web_title']);
        $web_email     = sanitize($_POST['web_email']);
        $web_tagline   = sanitize($_POST['web_tagline']);
        $script_path = str_replace('setup', '', dirname($_SERVER['SCRIPT_NAME']));
        $web_url       = 'http://'.$_SERVER['SERVER_NAME'].$script_path;
        mysql_query("INSERT INTO `{$_POST['prefix']}config` (`config_name`, `config_value`) VALUES
            ('sitename', '".$web_title."'),
            ('sitemail', '".$web_email."'),
            ('description', '".$web_tagline."'),
            ('siteurl', '".$web_url."')
        ");
        
        cmsHeader();
        include("templates/finish.tpl.php");
        cmsFooter();
        @mysql_close($link);
        exit;
    }
    
}
?>
<?php cmsHeader(); ?>
<?php
    if (!$step): clearstatcache();
        include("templates/pre_install.tpl.php");
    elseif ($step == 1): 
        include("templates/config.db.tpl.php");
    elseif ($step == '2'): 
        include("templates/configuration.tpl.php");
    else: 
        echo 'Incorrect step. Please follow installation instructions.';
    endif;
?>
<?php cmsFooter(); ?>