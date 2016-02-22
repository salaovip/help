<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Gallery Manager                                     |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |
 * @package PHP Gallery Manager                                         |
 * @version 2.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-dashboard.php');
$admin_dashboard = new admin_dashboard();
include(INCPATHACP.'admin-settings.php');
$admin_settings = new admin_settings();
define('THIS_SCRIPT', 'themes.php');
$template->assign_vars(array('CLASS_THEMES' => 'class="active"',)); 
if(isset($_REQUEST['page']) and $_REQUEST['page'] == 'theme_options')
{
    set_page();
}
else
{
    $template->assign_vars(array('CLASS_THEMES_LEVEL' => 'class="active"',));
    $admin_settings->index_themes();
}
?>