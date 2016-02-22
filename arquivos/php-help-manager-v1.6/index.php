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
elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'knowledgebase')
{
    $display->index_knowledgebase();
}
//----------------------------------------------------------------------------------------| knowledgebase
elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'news')
{
    $display->index_news();
}
//----------------------------------------------------------------------------------------| faq
elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'faq')
{
    $display->index_faq();
}
//----------------------------------------------------------------------------------------| cat
elseif(isset($_GET['catid']) and is_numeric(intval($_GET['catid'])))
{
    $display->index_cate();
}
//----------------------------------------------------------------------------------------| postid
elseif(isset($_GET['viewid']) and is_numeric($_GET['viewid']))
{
    $display->index_article();
}
//----------------------------------------------------------------------------------------| search
elseif(isset($_GET['search']) and $_REQUEST['submit'] and $_REQUEST['submit'] == 'search')
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