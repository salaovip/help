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
define('THIS_SCRIPT', 'index.php');
$template->assign_vars(array( 'ACTION_TOKEN'    => @$_SESSION['action_token'],)); 
if(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'profile')
{
    $admin_dashboard->index_profile();
}
else
{
    $admin_dashboard->index_dashboard();
}
?>