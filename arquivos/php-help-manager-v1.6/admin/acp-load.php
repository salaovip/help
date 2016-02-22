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
if($acp_session->get_account('isadmin'))
{
    $template->assign_vars(array(
        'USERNAME'              => $acp_session->get_account('username'),
        'EMAIL'                 => $acp_session->get_account('email'),
        'IS_ADMIN'              => true,
        'ADMIN_AVATAR'          => $imageavatar,
        'IS_DASHBOARD'          => true,
        'IS_CATEGORYS_ARTICLE'  => true,
        'IS_ARTICLE'            => true,
        'IS_CATEGORYS_NEWS'     => true,
        'IS_NEWS'               => true,
        'IS_FAQ'                => true,
        'IS_PAGES'              => true,
        'IS_SETTING'            => true,
        'IS_THEMES'             => true,
        'IS_LANGUAGE'           => true,
    ));
}
else
{
    $template->assign_vars(array(
        'USERNAME'              => $acp_session->get_account('username'),
        'EMAIL'                 => $acp_session->get_account('email'),
        'IS_ADMIN'              => $acp_session->get_account('isadmin'),
        'ADMIN_AVATAR'          => $imageavatar,
        'IS_DASHBOARD'          => $acp_session->get_permission('dashboard'),
        'IS_CATEGORYS_ARTICLE'  => $acp_session->get_permission('catearticle'),
        'IS_ARTICLE'            => $acp_session->get_permission('article'),
        'IS_CATEGORYS_NEWS'     => $acp_session->get_permission('catenews'),
        'IS_NEWS'               => $acp_session->get_permission('news'),
        'IS_FAQ'                => $acp_session->get_permission('faq'),
        'IS_PAGES'              => $acp_session->get_permission('pages'),
        'IS_SETTING'            => $acp_session->get_permission('setting'),
        'IS_THEMES'             => $acp_session->get_permission('themes'),
        'IS_LANGUAGE'           => $acp_session->get_permission('language'),
    ));
}
    

//-------- 
get_assign_admin_languages();
?>