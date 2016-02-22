<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-users.php');
$admin_users = new admin_users();

define('THIS_SCRIPT', 'users.php');


if(!$acp_session->get_account('isadmin'))
{
    page_header(get_admin_languages('error_permission'));
    $template->set_filename('permission.html');
    page_footer();
    exit;
}

if(!isset($_REQUEST['action']))
{
    $token = securitytokenadmincp();
    $_SESSION['securitytokenadmincp'] = $token;
    $template->assign_vars(array( 
        'TOKEN' => $token,
    )); 
}
$template->assign_vars(array( 
    'ACTION_TOKEN' => @$_SESSION['action_token'],
)); 



if(isset($_POST['query']))
{
    $post = array();
    $post = $_POST;
    if($_POST['query'] == 'addnew')
    {
        $_SESSION['action_token'] = get_admin_languages('add_new_user');
        $sql_ins = array(
	            'id'        => (int)'',
                'gid'       => (int)$post['groups'],
                'isadmin'   => (int)$admin_users->get_form_status($post['isadmin']),
                'username'  => $post['username'],
                'email'     => $post['email'],
                'password'  => md5($post['password']),
                'ip'        => GET_IP,
                'pc'        => GET_PC,
                'status'    => (int)$admin_users->get_form_status($post['status']),
        );
        $sql     = 'INSERT INTO ' . ADMIN_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        
        header("Location:".THIS_SCRIPT."");
    }
    elseif($_POST['query'] == 'edit')
    {
        $_SESSION['action_token'] = get_admin_languages('edit_user');
        $status = $admin_users->get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . ADMIN_TABLE . " SET 
            `gid`       = '".$post['groups']."', 
            `isadmin`   = '".$admin_users->get_form_status($post['isadmin'])."', 
            `username`  = '".$post['username']."', 
            `email`     = '".$post['email']."', 
            `status`    = '".$status."' 
             WHERE `id` = '" . $db->sql_escape($post['id']) . "'
        ");
        $db->sql_freeresult($result);
        if(isset($post['password']) and !empty($post['password']))
        {
            $result = $db->sql_query("UPDATE ".ADMIN_TABLE." SET `password`='".md5($post['password'])."' WHERE `id`='".$db->sql_escape($post['id'])."'");
            $db->sql_freeresult($result);
        }
        header("Location:".THIS_SCRIPT."");
    }
}
        
elseif(isset($_REQUEST['action']))
{
    if($_REQUEST['action'] == 'edit')
    {
        $admin_users->form_users('edit');
    }
    elseif($_REQUEST['action'] == 'activ')
    {
        $admin_users->active_users();
    }
    elseif($_REQUEST['action'] == 'delete')
    {
        $admin_users->delete_users();
    }
    else
    {
        $admin_users->index_users();
    }
}
elseif(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'new')
    {
        $admin_users->form_users('new');
    }
    else
    {
        $admin_users->index_users();
    }
}
else
{
    $admin_users->index_users();
}


?>