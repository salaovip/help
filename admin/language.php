<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP language Manager                                     |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |
 * @package PHP language Manager                                         |
 * @version 2.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-language.php');
$admin_language = new admin_language();
define('THIS_SCRIPT', 'language.php');
if(!isset($_REQUEST['action'])){admin_set_token();}
$template->assign_vars(array( 'ACTION_TOKEN' => @$_SESSION['action_token'],'CLASS_LANGUAGE' => 'class="active"'));    
if(isset($_GET['edit_language']) and is_numeric($_GET['edit_language']))
{
    $admin_language->edit_language();
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'activ')
{
    $admin_language->active_language();
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'delete')
{
    $admin_language->delete_language();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'new')
{
    $admin_language->form_language('new');
}
else
{
    $admin_language->index_language();
}
?>