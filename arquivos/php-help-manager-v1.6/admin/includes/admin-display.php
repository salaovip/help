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
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}

class admin_display
{
    /*---------------------------------------------------------------------------*/
    /* index.php                                                                 */
    /*---------------------------------------------------------------------------*/
    // Dashboard
    public function index_dashboard()
    {
        global $template, $db, $config, $token;
        
        $total_category_art     = $db->sql_numrows("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='article' ORDER BY id ASC");
        $total_article          = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='article' ORDER BY id ASC");
        $total_category_post    = $db->sql_numrows("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='news' ORDER BY id ASC");
        $total_post             = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='news' ORDER BY id ASC");
        $total_faq              = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='faq' ORDER BY id ASC");
        $template->assign_vars(array(
            'ADMIN_TOTAL_CAT_ART'         => $total_category_art,
            'ADMIN_TOTAL_ART'             => $total_article,
            'ADMIN_TOTAL_CAT_POST'        => $total_category_post,
            'ADMIN_TOTAL_POST'            => $total_post,
            'ADMIN_TOTAL_FAQ'             => $total_faq,
        ));
        
        
        page_header(get_admin_languages('dashboard'));
        $template->set_filename('dashboard.html');
        page_footer();
    
    }
    
    
    // Profile
    public function index_profile()
    {
        global $template, $db, $config,$acp_session;
        $template->assign_vars(array(
            'USERNAME'      => $acp_session->get_account('username'),
            'EMAIL'         => $acp_session->get_account('email'),
            'UID'           => $acp_session->get_account('id'),
            'ADMIN_SAVE'    => (intval(@$_GET['save'])) ? true : false ,
        ));
        page_header(get_admin_languages('profile'));
        $template->set_filename('profile.html');
        page_footer();
    }

    
    
    function foldersize($path) {
        $total_size = 0;
        $files = scandir($path);
        $cleanPath = rtrim($path, '/'). '/';
        foreach($files as $t) {
            if ($t<>"." && $t<>"..") {
                $currentFile = $cleanPath . $t;
                if (is_dir($currentFile)) {
                    $size = foldersize($currentFile);
                    $total_size += $size;
                }
                else {
                    $size = filesize($currentFile);
                    $total_size += $size;
                }
            }   
        }
        return $total_size;
    }
    
    public function fsize($bytes) { 
       $bytes = empty($bytes) ? 0 : $bytes;
       if ($bytes < 1024) return ($bytes < 0) ? 0 : $bytes.' B';
       elseif ($bytes < 1048576) return round($bytes / 1024, 2).' KB';
       elseif ($bytes < 1073741824) return round($bytes / 1048576, 2).' MB';
       elseif ($bytes < 1099511627776) return round($bytes / 1073741824, 2).' GB';
       else return round($bytes / 1099511627776, 2).' TB';
    }
    
    
    
    
    
    
    
    
    public function gat_post($field,$id)
    {
        global $template, $db, $config;
        $result     = $db->sql_query("SELECT * FROM ".POSTS_TABLE." WHERE `posttype`='gallery' and `id`='".$id."'");
        $row = $db->sql_fetchrow($result);
        return $row[$field];
    }
    
    
}    



function securitytokenadmincp($length = '15',$num = false)
{
    if($num)
    {
        $chars = '0123456789';
    }
    else
    {
        $chars = 'abcdefghkmnopqrstuvwxyz0123456789';  
    }
    srand((double)microtime()*1000000);
    $str = '';
    for($i=0 ; $i <= $length ;$i++){
        $num = rand() % 33;
        $tmp = substr($chars,$num,1);
        $str = $str. $tmp;
    }
    return $str;
}

function get_user($filed,$id)
{
    global $db;
    $result = $db->sql_query("SELECT * FROM ".ADMIN_TABLE." WHERE `id`='".$id."'");
    $user   = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    return $user[$filed];
}


function pagination($total, $limit = 10,$page = 1, $url = '?'){
        global $db,$config;
        $adjacents  = "2";
    	$page       = ($page == 0 ? 1 : $page);
    	$start      = ($page * $limit) - $limit;
    	$prev       = $page - 1;
    	$next       = $page + 1;
        $lastpage   = ceil($total/$limit);
    	$lpm1       = $lastpage - 1;
        $pagination = '';
	if($lastpage > 1)
	{	
		if ($lastpage < 7 + ($adjacents * 2))
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class='active'><a href='#'>$counter</a></li>";
				else
					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='active'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li class='dot'><a href='#' class='active'>...</a></li>";
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'><a href='#' class='active'>...</a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='active'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			else
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'><a href='#' class='active'>...</a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='active'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
			}
		}		
	}
    return $pagination;
}









function sanitize($string, $trim = false, $int = false, $str = false)
{
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
    if ($trim)
      $string = substr($string, 0, $trim);
    if ($int)
      $string = preg_replace("/[^0-9\s]/", "", $string);
    if ($str)
      $string = preg_replace("/[^a-zA-Z\s]/", "", $string);
      
    return $string;
}

function redirect_to($location)
{
  if (!headers_sent()) {
      header('Location: ' . $location);
	  exit;
  } else
      echo '<script type="text/javascript">';
      echo 'window.location.href="' . $location . '";';
      echo '</script>';
      echo '<noscript>';
      echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
      echo '</noscript>';
}











function get_admin_can_languages()
{
    global $db,$template,$config;
    $sql    = "SELECT * FROM ".LANGS_TABLE." WHERE `defaultd`='1' LIMIT 1";
    $result = $db->sql_query($sql);
    $row    = $db->sql_fetchrow($result);
    if($row['code'])
    {
        return $row['code'];
    }
    else
    {
        return false;
    }
}

function get_admin_languages($varname = '')
{
    global $db,$template,$config;
    if($varname)
    {
        $sql    = "SELECT * FROM ".PHRASES_TABLE." WHERE `varname`='".$varname."' and `lang_iso`='".get_admin_can_languages()."'";
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        if($row['text'])
        {
            return $row['text'];
        }
        else
        {
            return str_replace("_"," ",$varname);
        }
    }
    else
    {
        return false;
    }
}

function get_assign_admin_languages()
{
    global $template, $db, $config;
    if(get_admin_can_languages())
    {
        $lang_iso = get_admin_can_languages();
    }
    else
    {
        $lang_iso = 'en';
    }
    $sql    = "SELECT * FROM ".PHRASES_TABLE." WHERE `lang_iso`='".$lang_iso."'";
    $result = $db->sql_query($sql);
    while($row = $db->sql_fetchrow($result))
    {
        $template->assign_var(strtoupper('LANG_CP_'.$row['varname']),$row['text']);
    }
    $db->sql_freeresult($result);
}
?>