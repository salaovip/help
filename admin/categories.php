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
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
include(INCPATHACP.'admin-categories.php');
$admin_categories = new admin_categories();
$taxonomy = (isset($_REQUEST['taxonomy']))? $_REQUEST['taxonomy']: 'knowledgebase';
define('THIS_SCRIPT', 'categories.php');
define('THIS_SCRIPT_RETURN', 'categories.php?taxonomy='.$taxonomy);
if(isset($_REQUEST['action']) or isset($_POST['action'])){}
else{admin_set_token();}
$class = strtoupper($taxonomy);
$template->assign_vars(array( 
    'ACTION_TOKEN'     => @$_SESSION['action_token'],
    'THIS_SCRIPT'      => THIS_SCRIPT,
    'CLASS_'.$class    => 'class="active"',
    'TAXONOMY'         => $taxonomy,
)); 
$template->assign_var('CLASS_'.$class.'_CATE','class="active"');
$admin_categories->index_terms($taxonomy);
?>