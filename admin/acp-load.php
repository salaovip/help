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
@session_start();
@ob_start();
//----------------------------------------------------------------------|
@define('IN_MEGATPL_CP','1');
@define('IN_MEGATPL','1');
//----------------------------------------------------------------------|
include('../mega-system/mega.class.php');
$Megatpl->setup('acp-themes','admin','mega-cache/','');
include(ADMIN_DIR.'includes/admin-session.php');
include(ADMIN_DIR.'includes/admin-functions.php');
@define('INCPATHACP', ADMIN_DIR.'includes/');
//----------------------------------------------------------------------|
$acp_session = new acp_session();    
//----------------------------------------------------------------------|
@define('ACCEPT','gif|png|jpg|jpeg|bmp'); // Type files
@define('MAXLENGTH','5');                 // Max uploader
@define('PER_PAGE','10');                 // Num items in page
//----------------------------------------------------------------------|
$template->assign_vars(array(
    'SITE_NAME'             => $config['sitename'],
));
//----------------------------------------------------------------------|
if($acp_session->get_account('id'))
{
    $uid = $acp_session->get_account('id');
    $template->assign_vars(array(
        'ADMIN_USERNAME'    => $acp_session->get_account('username'),
        'ADMIN_EMAIL'       => $acp_session->get_account('email'),
        'ADMIN_AVATAR'      => get_gravatar($uid,60,'','','../'),
    ));
}
//----------------------------------------------------------------------|
get_assign_admin_languages();
//----------------------------------------------------------------------|
?>