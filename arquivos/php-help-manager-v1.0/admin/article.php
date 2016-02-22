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
include(INCPATHACP.'admin-article.php');
$admin_article = new admin_article();

define('THIS_SCRIPT', 'article.php');

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
        $status = $admin_article->get_form_status(@$post['status']);
        $sql_ins = array(
	            'id'             => (int)'',
                'uid'            => (int)$acp_session->get_account('id'),
                'cid'            => (int)$post['idcat'],
                'posttype'       => 'article',
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
        $status = $admin_article->get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET 
            `cid`       = '".$post['idcat']."', 
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
        $admin_article->form_article('edit');
    }
    elseif($_REQUEST['action'] == 'activ')
    {
        $admin_article->active_article();
    }
    elseif($_REQUEST['action'] == 'delete')
    {
        $admin_article->delete_article();
    }
    else
    {
        $admin_article->index_article();
    }
}
elseif(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'new')
    {
        $admin_article->form_article('new');
    }
    else
    {
        $admin_article->index_article();
    }
}
else
{
    $admin_article->index_article();
}


?>