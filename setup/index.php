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
setcookie("LANG_CMSPRO", "", time()-3600);
  if (!file_exists("../mega-system/mega.config.php")) {
      if (file_exists("install.php")) {
          header("Location: install.php");
      } else {
          die("<div style='text-align:center'>" 
			  . "<span style='padding: 5px; border: 1px solid #999; background-color:#EFEFEF;" 
			  . "font-family: Verdana; font-size: 11px; margin-left:auto; margin-right:auto; display:inline-block'>" 
			  . "<b>Attention:</b>The configuration file is missing and a new installation cannot be started because the install file cannot be located</span></div>");
      }
  } elseif (file_exists("update.php")) {
      header("Location: update.php");
  } else {
      die("<div style='text-align:center'>" 
		  . "<span style='padding: 5px; border: 1px solid #999; background-color:#EFEFEF;" 
		  . "font-family: Verdana; font-size: 11px; margin-left:auto; margin-right:auto; display:inline-block'>" 
		  . "<b>Attention:</b> The file mega.config.php already exists!<br>If you want to reinstall Php Help Manager v2.0 you must first delete the mega.config.php</span></div>");
  }
?>