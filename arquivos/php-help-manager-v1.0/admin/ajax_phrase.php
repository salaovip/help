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
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
define('THIS_SCRIPT', 'ajax_phrase.php');


$post = $_POST;
$result = $db->sql_query("UPDATE ".PHRASES_TABLE." SET `text`='".$post['value']."' WHERE `id`='".$db->sql_escape($post['pk'])."'");
$db->sql_freeresult($result);
echo $post['value'];
?>