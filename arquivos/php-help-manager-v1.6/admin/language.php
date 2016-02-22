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
include(INCPATHACP.'admin-language.php');
$admin_language = new admin_language();

define('THIS_SCRIPT', 'language.php');

if(!$acp_session->get_permission('language') or !$acp_session->get_account('isadmin'))
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