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
include(INCPATHACP.'admin-pages.php');
$admin_pages = new admin_pages();
define('THIS_SCRIPT', 'pages.php');
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
if(isset($_POST['query']) and $_POST['query'] == 'edit')
{
    if($_POST['page'] == 'about')
    {
        set_config('pageabout',str_replace("'","\'",stripslashes($_POST['content'])));
    }
    elseif($_POST['page'] == 'Privacy')
    {
        set_config('pageprivacy',str_replace("'","\'",stripslashes($_POST['content'])));
    }
    elseif($_POST['page'] == 'contact')
    {
        set_config('pagecontact',str_replace("'","\'",stripslashes($_POST['content'])));
    }
    
    $_SESSION['action_token'] = 'edit Page';
    header("Location:".THIS_SCRIPT."");
}    
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'edit')
{
    $admin_pages->form_pages();
}
else
{
    $admin_pages->index_pages();
}
?>