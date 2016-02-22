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
//----------------------------------------------------------------------------------------| about
if(isset($_REQUEST['page']) and $_REQUEST['page'] == 'about')
{
    $display->index_about();
}
//----------------------------------------------------------------------------------------| privacy
elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'privacy')
{
    $display->index_privacy();
}
//----------------------------------------------------------------------------------------| contact
elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'contact')
{
    $display->index_contact();
}
//----------------------------------------------------------------------------------------| knowledgebase
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'knowledgebase')
{
    $display->index_knowledgebase();
}
//----------------------------------------------------------------------------------------| knowledgebase
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'news')
{
    $display->index_news();
}
//----------------------------------------------------------------------------------------| faq
elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'faq')
{
    $display->index_faq();
}
//----------------------------------------------------------------------------------------| cat
elseif(isset($_GET['catid']) and is_numeric(intval($_GET['catid'])))
{
    $display->index_cate();
}
//----------------------------------------------------------------------------------------| postid
elseif(isset($_GET['post_id']) and is_numeric($_GET['post_id']))
{
    $display->index_single();
}
//----------------------------------------------------------------------------------------| search
elseif(isset($_GET['search']))
{
    $display->index_search();
}
//----------------------------------------------------------------------------------------| home
else
{
    $display->index_home();
}
//----------------------------------------------------------------------------------------| end
?>