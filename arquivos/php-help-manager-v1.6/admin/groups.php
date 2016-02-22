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
include(INCPATHACP.'admin-groups.php');
$admin_groups = new admin_groups();

define('THIS_SCRIPT', 'groups.php');


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
        $_SESSION['action_token'] = get_admin_languages('add_new_group');
        $sql_ins = array(
	            'id'            => (int)'',
                'name'          => $post['name'],
                'dashboard'     => (int)$admin_groups->get_form_status($post['dashboard']),
                'catearticle'   => (int)$admin_groups->get_form_status($post['catearticle']),
                'article'       => (int)$admin_groups->get_form_status($post['article']),
                'catenews'      => (int)$admin_groups->get_form_status($post['catenews']),
                'news'          => (int)$admin_groups->get_form_status($post['news']),
                'faq'           => (int)$admin_groups->get_form_status($post['faq']),
                'pages'         => (int)$admin_groups->get_form_status($post['pages']),
                'setting'       => (int)$admin_groups->get_form_status($post['setting']),
                'themes'        => (int)$admin_groups->get_form_status($post['themes']),
                'language'      => (int)$admin_groups->get_form_status($post['language'])
        );
        $sql     = 'INSERT INTO ' . GROUPS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        
        header("Location:".THIS_SCRIPT."");
    }
    elseif($_POST['query'] == 'edit')
    {
        $_SESSION['action_token'] = get_admin_languages('edit_group');
        $result = $db->sql_query("UPDATE " . GROUPS_TABLE . " SET  
            `name`          = '".$post['name']."', 
            `dashboard`     = '".$admin_groups->get_form_status($post['dashboard'])."',
            `catearticle`   = '".$admin_groups->get_form_status($post['catearticle'])."',
            `article`       = '".$admin_groups->get_form_status($post['article'])."',
            `catenews`      = '".$admin_groups->get_form_status($post['catenews'])."',
            `news`          = '".$admin_groups->get_form_status($post['news'])."',
            `faq`           = '".$admin_groups->get_form_status($post['faq'])."',
            `pages`         = '".$admin_groups->get_form_status($post['pages'])."',
            `setting`       = '".$admin_groups->get_form_status($post['setting'])."',
            `themes`        = '".$admin_groups->get_form_status($post['themes'])."',
            `language`      = '".$admin_groups->get_form_status($post['language'])."'
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
        $admin_groups->form_groups('edit');
    }
    elseif($_REQUEST['action'] == 'activ')
    {
        $admin_groups->active_groups();
    }
    elseif($_REQUEST['action'] == 'delete')
    {
        $admin_groups->delete_groups();
    }
    else
    {
        $admin_groups->index_groups();
    }
}
elseif(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'new')
    {
        $admin_groups->form_groups('new');
    }
    else
    {
        $admin_groups->index_groups();
    }
}
else
{
    $admin_groups->index_groups();
}


?>