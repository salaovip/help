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
require_once('./acp-load.php');
if( ! defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-settings.php');
$admin_settings = new admin_settings();
if(!isset($_REQUEST['action'])){admin_set_token();}
$template->assign_var('CLASS_SETTING',' class="active"');
if(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'general')
{
    $admin_settings->index_general();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'socials')
{
    $admin_settings->index_socials();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'pages')
{
    $admin_settings->index_pages();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'users')
{
    $admin_settings->index_users();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'emailtemplate')
{
    $admin_settings->index_emailtemplate();
}

else
{
    $admin_settings->index_general();
}
?>