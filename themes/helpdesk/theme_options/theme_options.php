<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Gallery Manager                                     |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Gallery Manager                                         |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}



$template_name  = '../'.TEMP_PATH.$config['sitethemes'].'/theme_options/';


$template->assign_vars(array(
    'CLASS_THEMEOPTION' => 'class="active"',
    'ADMIN_SAVE' => (intval(@$_GET['save'])) ? true : false ,
    'THEME_OPTION_URL'  => $template_name,
    'OPTIONS'           => get_unserialize($config['helpdesk_theme_options'])
));

if(isset($_REQUEST['page']) and $_REQUEST['page'] == 'theme_options')
{
    $theactiv = 'class="active"';
}
else
{
    $theactiv = '';
}


$admin_top_bar = '<li><a href="themes.php?page=theme_options"><i class="fa fa-cog"></i> Theme Options</a></li>';
$admin_sid_bar = '<li '.$theactiv.'><a href="themes.php?page=theme_options"><i class="fa fa-cog"></i><span class="menu-text"> Theme Options</span></a></li>';
$set_filename = '../'.$template_name.'/helpdesk_theme_options.html';



$opp = get_unserialize($config['helpdesk_theme_options']);

foreach($opp as $key => $value)
{
    $template->assign_var(strtoupper($key),$value);
}





if ( isset($_GET['page']) and isset($_GET['do']) )
{
	if (isset($_GET['do']) and $_GET['do'] == 'submit' and isset($_POST))
	{
        $options = set_serialize($_POST);
        set_config('helpdesk_theme_options',$options);
        echo '#message_success';
        die;
	}
}



function set_page()
{
    global $template, $set_filename;
    page_header('Theme Options');
    $template->set_filename($set_filename);
    page_footer();
}








function get_option_theme($b = 'OPTION_')
{
    global $template, $config;
    $opp = get_unserialize($config['helpdesk_theme_options']);
    foreach($opp as $key => $value)
    {
        $template->assign_var(strtoupper($b.$key),$value);
    }
}

?>