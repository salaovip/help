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
  if (!defined("IN_MEGATPL"))
      die('Direct access to this location is not allowed.');
?>
<?php
  function getIniSettings($aSetting)
  {
	  $out = (ini_get($aSetting) == '1' ? 'ON' : 'OFF');
	  return $out;
  }

  function getWritableCell($aDir)
  {
	  echo '<tr>';
	  echo '<td class="elem">'.$aDir .CMS_DS.'</td>';
	  echo '<td align="left">';
	  echo is_writable(DDPBASE.$aDir) ? '<span class="yes">Writeable</span>' : '<span class="no">Unwriteable</span>';
	  echo '</td>';
	  echo '</tr>';
  }

  function sanitize($string, $trim = false)
  {
	$string = filter_var($string, FILTER_SANITIZE_STRING); 
	$string = trim($string);
	$string = stripslashes($string);
	$string = strip_tags($string);
	$string = str_replace(array('‘','’','“','”'), array("'","'",'"','"'), $string);
	if($trim)
	$string = substr($string, 0, $trim);
	
	return $string;
  }

  function parse_mysql_dump($filename,$db_prefix = ''){
	  global $success,$msg;
	  $templine = '';
      $data['{$db_prefix}'] = $db_prefix;
      $keys	    = array_keys($data);
      $value	= array_values($data);
	  $lines = file($filename);
	  foreach ($lines as $line_num => $line) {
		  if (substr($line, 0, 2) != '--' && $line != '') {
			  $templine .= $line;
			  if (substr(trim($line), -1, 1) == ';') {
			     $templine = str_replace($keys, $value, $templine);
				  if (!mysql_query($templine)) {
					  $success = false;
					  $msg = "<div class=\"qerror\">'".mysql_errno()." ".mysql_error()."' during the following query:</div> 
					  <div class=\"query\">{$templine} </div>";
				  }
				  $templine = '';
			  }
		  }
	  }
  }

  function testModRewrite()
  {
      global $script_path;

	  if ($script_path == "/")
		  $script_path = "";
		  
      if ($content = @file_get_contents(".htaccess")) {
          $content = str_replace("RewriteBase /setup/", "RewriteBase " . $script_path . "/setup/", $content);
          if (is_writable(".htaccess")) {
              $continue = true;
          } else {
              if (@chmod(".htaccess", 0755)) {
                  $continue = true;
              } else {
                  $continue = false;
              }
          }
          if ($continue) {
              if ($handle = @fopen(".htaccess", "w")) {
                  @fwrite($handle, $content);
                  @fclose($handle);
              }
              @chmod(".htaccess", 0644);
          }
      }
  }
  
  function writeConfigFile($host, $username, $password, $name, $prefix)
  {
      global $success;
      
$content = "<?php \n" 
. "//----------------------------------------------------------------------|\n"
. "/***********************************************************************|\n"
. " * Project:     PHP Help Manager                                        |\n"
. "//----------------------------------------------------------------------|\n"
. " * @link http://themearabia.net                                         |\n"
. " * @copyright 2015.                                                     |\n"
. " * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |\n"
. " * @package PHP Help Manager                                            |\n"
. " * @version 2.0                                                         |\n"
. "//----------------------------------------------------------------------|\n"
. "************************************************************************/\n"
. "//----------------------------------------------------------------------|\n"
. "if (!defined('IN_MEGATPL')){exit;}                                    //|\n"
. "//----------------------------------------------------------------------|\n"
. "//----------------------------------------------------------------------|\n"
. "// host [ localhost name ]\n"
. "   \$dbhost       = '".$host."';\n"
. "//----------------------------------------------------------------------|\n"
. "// name [ database name ]\n"
. "   \$dbname       = '".$name."';\n"
. "//----------------------------------------------------------------------|\n"
. "// user [ user database name ]\n"
. "   \$dbuser       = '".$username."';\n"
. "//----------------------------------------------------------------------|\n"
. "// password [ database password ]\n"
. "   \$dbpasswd     = '".$password."';\n"
. "//----------------------------------------------------------------------|\n"
. "// prefix [  ]\n"
. "  \$table_prefix = '".$prefix."';\n"
. "//----------------------------------------------------------------------|\n"
. "// port []\n"
. "   \$dbport       = '';\n"
. "//----------------------------------------------------------------------|\n"
. "?>";
      
      $confile = '../mega-system/mega.config.php';
      if (is_writable('../mega-system/')) {
          $handle = fopen($confile, 'w');
          fwrite($handle, $content);
          fclose($handle);
          $success = true;
      } else {
          $success = false;
      }
  }

  function safeConfig($host, $username, $password, $name, $prefix)
  {

$content = "<?php \n" 
. "//----------------------------------------------------------------------|\n"
. "/***********************************************************************|\n"
. " * Project:     PHP Help Manager                                        |\n"
. "//----------------------------------------------------------------------|\n"
. " * @link http://themearabia.net                                         |\n"
. " * @copyright 2015.                                                     |\n"
. " * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |\n"
. " * @package PHP Help Manager                                            |\n"
. " * @version 2.0                                                         |\n"
. "//----------------------------------------------------------------------|\n"
. "************************************************************************/\n"
. "//----------------------------------------------------------------------|\n"
. "if (!defined('IN_MEGATPL')){exit;}                                    //|\n"
. "//----------------------------------------------------------------------|\n"
. "//----------------------------------------------------------------------|\n"
. "// host [ localhost name ]\n"
. "   \$dbhost       = '".$host."';\n"
. "//----------------------------------------------------------------------|\n"
. "// name [ database name ]\n"
. "   \$dbname       = '".$name."';\n"
. "//----------------------------------------------------------------------|\n"
. "// user [ user database name ]\n"
. "   \$dbuser       = '".$username."';\n"
. "//----------------------------------------------------------------------|\n"
. "// password [ database password ]\n"
. "   \$dbpasswd     = '".$password."';\n"
. "//----------------------------------------------------------------------|\n"
. "// prefix [  ]\n"
. "  \$table_prefix = '".$prefix."';\n"
. "//----------------------------------------------------------------------|\n"
. "// port []\n"
. "   \$dbport       = '';\n"
. "//----------------------------------------------------------------------|\n"
. "?>";
		  
		  return $content;
  }
  
  function cmsHeader()
  {
      echo '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Php Help Manager v2.0 &rsaquo; Setup Configuration File</title>
    <link rel="stylesheet" id="open-sans-css"  href="//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.2.5" type="text/css" media="all" />
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" id="install-css"  href="install.min.css" type="text/css" media="all" />
    <script type="text/javascript" src="script.js"></script>
</head>
<body class="wp-core-ui">
<h1 id="logo"><a href="http://codecanyon.net/user/themearabia" tabindex="-1">Php Help Manager v2.0</a></h1>
      ';
  }

  function cmsFooter()
  {
      global $err;
      echo '<script type="text/javascript">';
      if ($err) {
          $j = 0;
          foreach ($err as $key => $i) {
              if ($i > 0) {
                  $first = ($j > 0) ? $i : '';
                  echo "document.getElementById('err{$i}').style.display = 'block';\n";
                  echo "document.getElementById('t{$i}').style.background = '#FFD5D5';\n";
                  $j++;
              }
          }
          echo "document.getElementById('t{$err[0]}').focus();\n";
      }
      echo '</script>';
      echo '</body>';
      echo '</html>';
  }
?>