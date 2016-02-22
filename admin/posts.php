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
include(INCPATHACP.'admin-posts.php');
$admin_posts = new admin_posts();
$post_type = (isset($_REQUEST['post_type']))? $_REQUEST['post_type']: 'knowledgebase';
define('THIS_SCRIPT', 'posts.php');
define('THIS_SCRIPT_RETURN', 'posts.php?post_type='.$post_type);

if(isset($_REQUEST['action']) or isset($_POST['action'])){}
else{admin_set_token();}
$class = strtoupper($post_type);
$template->assign_vars(array( 
    'ACTION_TOKEN'      => @$_SESSION['action_token'],
    'THIS_SCRIPT'       => THIS_SCRIPT,
    'CLASS_'.$class     => 'class="active"',
    'POST_TYPE'         => $post_type,
)); 

if(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'new')
{
    $template->assign_var('CLASS_'.$class.'_ADDNEW','class="active"');
    $admin_posts->form_posts($post_type, false);
}
else
{
    $template->assign_var('CLASS_'.$class.'_LEVEL','class="active"');
    $admin_posts->index_posts($post_type);
}

?>