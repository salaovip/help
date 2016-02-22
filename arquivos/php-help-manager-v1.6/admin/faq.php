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
include(INCPATHACP.'admin-faq.php');
$admin_faq = new admin_faq();

define('THIS_SCRIPT', 'faq.php');

if(!$acp_session->get_permission('faq') or !$acp_session->get_account('isadmin'))
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
        $_SESSION['action_token'] = get_admin_languages('add_new_post');
        $status = $admin_faq->get_form_status(@$post['status']);
        $sql_ins = array(
	            'id'             => (int)'',
                'uid'            => (int)$acp_session->get_account('id'),
                'cid'            => '0',
                'posttype'       => 'faq',
               	'title'          => $post['title'], 
                'content'        => str_replace("'","\'",stripslashes($post['content'])),
                'modified'       => (int)time(),
                'views'          => (int)'0',
                'orders'         => (int)$post['orders'],
                'status'         => $status,
        );
        $sql     = 'INSERT INTO ' . POSTS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        header("Location:".THIS_SCRIPT."");
    }
    elseif($_POST['query'] == 'edit')
    {
        $_SESSION['action_token'] = get_admin_languages('edit_post');
        $status = $admin_faq->get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET 
            `title`     = '".$post['title']."',                   
            `content`   = '".str_replace("'","\'",stripslashes($post['content']))."',  
            `status`    = '".$status."',
            `orders`    = '".$post['orders']."'
            WHERE `id`  = '".$db->sql_escape($post['id'])."'
        ");
        $db->sql_freeresult($result);
        header("Location:".THIS_SCRIPT."");
    }
}
        
elseif(isset($_REQUEST['action']))
{
    if($_REQUEST['action'] == 'edit')
    {
        $admin_faq->form_faq('edit');
    }
    elseif($_REQUEST['action'] == 'activ')
    {
        $admin_faq->active_faq();
    }
    elseif($_REQUEST['action'] == 'delete')
    {
        $admin_faq->delete_faq();
    }
    else
    {
        $admin_faq->index_faq();
    }
}
elseif(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'new')
    {
        $admin_faq->form_faq('new');
    }
    else
    {
        $admin_faq->index_faq();
    }
}
else
{
    $admin_faq->index_faq();
}


?>