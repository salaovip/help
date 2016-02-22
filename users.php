<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 2.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
session_start();
ob_start();
define('IN_MEGATPL', true);
include('mega-system/mega.class.php');
$Megatpl->setup();
$display->global_vars();





if(!isset($_REQUEST['action']) or $_REQUEST['action'] =='edit')
{
    $token = securitytoken();
    $_SESSION['securitytoken'] = $token;
    $template->assign_vars(array( 
        'TOKEN' => $token,
    )); 
}
$template->assign_vars(array( 
    'ACTION_TOKEN' => @$_SESSION['action_tokenweb'],
));

//----------------------------------------------------------------------------------------| register
if(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'register')
{
    $users->index_register();
}
//----------------------------------------------------------------------------------------| activate
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'activate')
{
    $users->index_activate();
}
//----------------------------------------------------------------------------------------| login
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'login')
{
    $users->index_login();
}
//----------------------------------------------------------------------------------------| logout
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'logout')
{
    $users->index_logout();
}
//----------------------------------------------------------------------------------------| forget
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'forget')
{
    $users->index_forget();
}
//----------------------------------------------------------------------------------------| profile
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'profile')
{
    $users->index_profile();
}
//----------------------------------------------------------------------------------------| account
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'account')
{
    $users->index_account();
}
//----------------------------------------------------------------------------------------| editprofile
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'editprofile')
{
    $users->index_editprofile();
}
//----------------------------------------------------------------------------------------| username
elseif(isset($_REQUEST['username']))
{
    $users->index_profile(true);
}
//----------------------------------------------------------------------------------------| users
else
{
    $users->index_users();
}
//----------------------------------------------------------------------------------------| end
?>