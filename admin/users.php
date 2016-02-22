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
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-users.php');
$admin_users = new admin_users();
define('THIS_SCRIPT', 'users.php');
if(isset($_REQUEST['action']) or isset($_POST['action'])){}
else{admin_set_token();}

$template->assign_vars(array( 'ACTION_TOKEN' => @$_SESSION['action_token'],'CLASS_USERS' => ' class="active"')); 
if(isset($_POST['query']) and $_POST['query'] == 'addnew')
{
    $admin_users->user_insert();
}
elseif(isset($_POST['query']) and $_POST['query'] == 'update')
{
    $admin_users->user_update();
}
elseif(isset($_POST['query']) and $_POST['query'] == 'action')
{
    if(isset($_POST['mark'])){$mark = $_POST['mark'];}else{$mark = false;}
    $admin_users->query_action($mark,$_POST['action'],$_POST['token']);
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'edit')
{
    $admin_users->form_users('edit');
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'activ')
{
    $admin_users->active_users();
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'delete')
{
    $admin_users->delete_users();
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'profile')
{
    $admin_users->profile_users();
}
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'new')
{
    $admin_users->form_users('new');
}
else
{
    $admin_users->index_users();
}
?>