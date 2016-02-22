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
include(INCPATHACP.'admin-categorys.php');
$admin_categorys = new admin_categorys();

define('THIS_SCRIPT', 'categorys.php');

if(!$acp_session->get_account('isadmin'))
{
    if(!$acp_session->get_permission('catearticle') or !$acp_session->get_permission('catenews'))
    {
        page_header(get_admin_languages('error_permission'));
        $template->set_filename('permission.html');
        page_footer();
        exit;
    }
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
        $_SESSION['action_token'] = get_admin_languages('add_new_category');
        $status = $admin_categorys->get_form_status(@$post['status']);
        $sql_ins = array(
	            'id'       => (int)'',
                'catetype' => $post['catetype'],
               	'name'     => $post['name'],
                'orders'   => (int)$post['orders'],
                'status'   => (int)$status,
        );
        $sql     = 'INSERT INTO ' . CATEGORIES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        
        header("Location:".THIS_SCRIPT."");
    }
    elseif($_POST['query'] == 'edit')
    {
        $_SESSION['action_token'] = get_admin_languages('edit_category');
        $status = $admin_categorys->get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . CATEGORIES_TABLE . " SET 
            `catetype`  = '".$post['catetype']."', 
            `name`      = '".$post['name']."', 
            `orders`    = '".$post['orders']."', 
            `status`    = '".$status."'
             WHERE `id` = '" . $db->sql_escape($post['id']) . "'
        ");
        $db->sql_freeresult($result);
        header("Location:".THIS_SCRIPT."");
    }
}
        
elseif(isset($_REQUEST['action']))
{
    if($_REQUEST['action'] == 'edit')
    {
        $admin_categorys->form_categorys('edit');
    }
    elseif($_REQUEST['action'] == 'activ')
    {
        $admin_categorys->active_categorys();
    }
    elseif($_REQUEST['action'] == 'delete')
    {
        $admin_categorys->delete_categorys();
    }
    else
    {
        $admin_categorys->index_categorys();
    }
}
elseif(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'new')
    {
        $admin_categorys->form_categorys('new');
    }
    else
    {
        $admin_categorys->index_categorys();
    }
}
else
{
    $admin_categorys->index_categorys();
}


?>