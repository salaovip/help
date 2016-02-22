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
@session_start();
@ob_start();
//--------
error_reporting(E_ALL);
//--------
define('IN_MEGATPL_CP','1');
define('IN_MEGATPL','1');
define('INCPATHGNR','../mega-system/');
define('INCPATHACP','includes/');
//--------
include(INCPATHGNR.'mega.class.php');
$Megatpl->setup('style','admin','mega-cache/','');
include(INCPATHACP.'admin-session.php');
include(INCPATHACP.'admin-display.php');
//--------
$acp_session        = new acp_session();    
$admin_display      = new admin_display();
// path Script
    // Info uploader
    @define('ACCEPT','gif|png|jpg|jpeg|bmp'); // Type files
    @define('MAXLENGTH','5');                 // Max uploader
    @define('PER_PAGE','10');                 // Num items in page
//--------
$lowercase      = strtolower($acp_session->get_account('email'));
$imageavatar    = md5( $lowercase );
//--------
$template->assign_vars(array(
    'USERNAME'          => $acp_session->get_account('username'),
    'EMAIL'             => $acp_session->get_account('email'),
    'ADMIN_AVATAR'      => $imageavatar,
));
//-------- 
get_assign_admin_languages();
?>