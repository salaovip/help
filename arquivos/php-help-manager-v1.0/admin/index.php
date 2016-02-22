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
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
define('THIS_SCRIPT', 'index.php');

if(!isset($_REQUEST['action']))
{
    @$token = securitytokenadmincp();
    $_SESSION['securitytokenadmincp'] = @$token;
    $template->assign_vars(array( 
        'TOKEN' => @$token,
    )); 
}

if(isset($_POST['query']) and $_POST['query'] == 'save')
{
    $result = $db->sql_query("UPDATE ".ADMIN_TABLE." SET `username`='".$_POST['username']."', `email`='".$_POST['email']."' WHERE `id`='".$db->sql_escape($_POST['userid'])."'");
    $db->sql_freeresult($result);
    if($_POST['pass1'] !='' && $_POST['pass2'] != '')
    {
        if($_POST['pass1'] == $_POST['pass2'])
        {
            $password = md5($_POST['pass1']);
            $result2 = $db->sql_query("UPDATE ".ADMIN_TABLE." SET `password`='".$password."'WHERE `id`='".$db->sql_escape($_POST['userid'])."'");
            $db->sql_freeresult($result2);
        }
        else
        {
        }
    }
    header("Location:index.php?mode=profile&save=1");
} 
if(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'profile')
{
        $admin_display->index_profile();
}
else
{
    $admin_display->index_dashboard();
}

    

    
?>