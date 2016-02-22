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
if( ! defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();

include(INCPATHACP.'admin-settings.php');
$admin_settings = new admin_settings();
if(!isset($_REQUEST['action']))
{
    $token     = securitytokenadmincp();
    $_SESSION['securitytokenadmincp'] = $token;
    $template->assign_vars(array( 
        'TOKEN'        => $token,
    )); 
}
if(isset($_REQUEST['mode']))
{
    if($_REQUEST['mode'] == 'general')
    {
        $admin_settings->index_general();
    }
    elseif($_REQUEST['mode'] == 'themes')
    {
        $admin_settings->index_themes();
    }
    else
    {
        $admin_settings->index_general();
    }
}
else
{
    $admin_settings->index_general();
}
?>