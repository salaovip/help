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
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}


if(file_exists('../'.TEMP_PATH.$config['sitethemes'].'/theme_options/theme_options.php'))
{
    include('../'.TEMP_PATH.$config['sitethemes'].'/theme_options/theme_options.php');
    $admin_top_navbar = $admin_top_bar;
    $admin_sid_navbar = $admin_sid_bar;
}
else
{
    $admin_top_navbar = '';
    $admin_sid_navbar = '';
}

$template->assign_vars(array(
    'ADMIN_NAVTOP_BAR' => $admin_top_navbar,
    'ADMIN_NAVSID_BAR' => $admin_sid_navbar,
));

function global_temp()
{
    
}










function admin_get_form_status($status)
{
    if($status == 'on')
    {
        return 1;
    }
    else
    {
        return 0;
    }
}


function admin_set_token()
{
    global $template;
    $token = securitytokenadmincp();
    $_SESSION['securitytokenadmincp'] = $token;
    $template->assign_vars(array( 'TOKEN' => $token,));
}


function securitytokenadmincp($length = '15',$num = false)
{
    if($num){$chars = '0123456789';}
    else{$chars = 'abcdefghkmnopqrstuvwxyz0123456789';  }
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
    $result = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$id."'");
    $user   = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    return $user[$filed];
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
        return 'en';
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
            //return str_replace("_"," ",$varname);
            return '--------no------';
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









function timezone_list($timezone) {
    $zones_array = array();
    $timestamp = time();
    foreach(timezone_identifiers_list() as $key => $zone) {
        @date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
        $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
    }
    $option = '<option value="0">Please, select timezone</option>';
    foreach($zones_array as $t)
    {
        if($timezone == $t['zone'])
        {
            $sel = 'selected="selected"';
        }
        else
        {
            $sel = '';
        }
        $option .= '<option value="'.$t['zone'].'" '.$sel.'>'.$t['diff_from_GMT'] . ' - ' . $t['zone'].'</option>';
    }
    return $option;
}










/*--------------------------------------------------------------------------------------------*/
function admin_get_info_attachment($id)
{
    global $db, $config, $template, $session;
    $sql    = "SELECT * FROM ".ATTACHMENT_TABLE." WHERE  `id`='".$db->sql_escape($id)."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    return $row;
}
/*--------------------------------------------------------------------------------------------*/
function admin_validate_dimensions($path,$width,$height)
{
    $image = getimagesize($path);
    if($image[0] >= $width){$output['w'] = true;}
    else{$output['w'] = false;}
    if($image[1] >= $height){$output['h'] = true;}
    else{$output['h'] = false;}
    return $output;
}
/*--------------------------------------------------------------------------------------------*/
function admin_validatefile($path, $name, $allowed = array('png', 'jpg', 'gif', 'jpeg')) {
	$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	$image = getimagesize($path);
	$output['width'] = $image[0];
	$output['height'] = $image[1];
    $output['mime'] = str_replace('image/', '', $image['mime']);
	// Verify if the mime type and extensions are allowed
	if(in_array($output['mime'], $allowed) && in_array($ext, $allowed)) {
		$output['valid'] = 1;
	} else {
		$output['valid'] = 0;
	}
	return $output;
}
/*--------------------------------------------------------------------------------------------*/
function admin_upload_file($file,$path = 'images/',$username = 'none')
{
    global $db, $config, $template, $session;
    $ext          = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
    $admin_validatefile = admin_validatefile($_FILES[$file]['tmp_name'], $_FILES[$file]["name"]);
    
    if($admin_validatefile['valid'])
    {
        $imagesname     = preg_replace('/[^\w\._]+/', '_', $_FILES[$file]["name"]);
        $images         = $username.'_'.mt_rand().'_'.time().'.'.$ext;
        $type           = strrchr(strtolower($images) ,'.');
		$fileext        = str_replace(".","",$type);
		$fileext        =  strtolower($fileext);
        // Move the file into the uploaded folder
        move_uploaded_file($_FILES[$file]['tmp_name'], '../uploads/' . $path . $images );
        $imgname        = $imagesname;
        $imgname        = str_replace(".".$fileext,"",$imagesname);
        $imgurl         = '../uploads/' . $path . $images;
        $imgsize        = $_FILES[$file]['size'];
        $imgtype        = $_FILES[$file]['type'];
        $default        = 1;
        $orders         = 1;
        $image_info     = getimagesize('../uploads/' . $path . $images);
        $image_width    = $image_info[0];
        $image_height   = $image_info[1];
        $dimensions     = ''.$image_width.' × '.$image_height.'';
        $sql_ins2 = array(
            'id'             => (int)'',
            'title'          => $imgname,
            'typepost'       => 'post',
            'url'            => $imgurl,
            'thumbimage'     => $imgurl,
           	'time'           => (int)time(), 
            'size'           => (int)$imgsize, 
            'type'           => $imgtype,    
            'dimensions'     => $dimensions,
            'orders'         => (int)$orders,
            'status'         => (int)'1'
        );
        $sql     = 'INSERT INTO ' . ATTACHMENT_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins2, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        $id = $db->sql_nextid();
        $new_file = '../uploads/' . $path . $images;
        $stat = stat( dirname( $new_file ));
    	$perms = $stat['mode'] & 0000666;
    	@ chmod( $new_file, $perms );
        $atr = array('id' => $id, 'imgurl' => $imgurl, 'imgw' => $image_width, 'imgh' => $image_height);
        return $atr;
    }
    else
    {
         $atr = array('id' => false, 'imgurl' => false, 'imgw' => false, 'imgh' => false);
         return $atr;
    }
}
/*--------------------------------------------------------------------------------------------*/
function admin_upload_file_array($file,$i = '',$path = 'images/')
{
    global $db, $config, $template, $session;
    $ext          = pathinfo($_FILES[$file]['name'][$i], PATHINFO_EXTENSION);
    $admin_validatefile = admin_validatefile($_FILES[$file]['tmp_name'][$i], $_FILES[$file]["name"][$i]);
    if($admin_validatefile['valid'])
    {
        $imagesname     = preg_replace('/[^\w\._]+/', '_', $_FILES[$file]["name"][$i]);
        $images         = $session->get_account('username').'_'.mt_rand().'_'.time().'.'.$ext;
        $type           = strrchr(strtolower($images) ,'.');
		$fileext        = str_replace(".","",$type);
		$fileext        =  strtolower($fileext);
        // Move the file into the uploaded folder
        move_uploaded_file($_FILES[$file]['tmp_name'][$i], 'uploads/' . $path . $images );
        $imgurl         = 'uploads/' . $path . $images;
        $stat = stat( dirname( $imgurl ));
    	$perms = $stat['mode'] & 0000666;
    	@ chmod( $imgurl, $perms );
        return $imgurl;
    }
    else
    {
         return false;
    }
}
















/*--------------------------------------------------------------------------------------------*/
function admin_set_editprofile_cropavatar($post)
{
    global $template, $db, $config, $session;
    $dateimg = admin_get_info_attachment($post['avatarimageid']);
    $imgurl = $dateimg['url'];
    $newnameimg = str_replace("../".UPLOAD_TEMPIMG_PATH,"",$dateimg['url']);
    include('../mega-system/mega.image.php');
    $img    = new class_mage();
    $img->load($imgurl)->crop($_POST['cropx'], $_POST['cropy'], $_POST['cropx2'], $_POST['cropy2'])->save('../'.UPLOAD_USER_AVATARS_SPATH.$newnameimg);
    $avatarimgold = get_user_meta($post['userid'],'avatar');
    remove_temp_upload('../'.UPLOAD_USER_AVATARS_SPATH.$avatarimgold);
    update_user_meta($post['userid'],'avatar',$newnameimg);
    remove_temp_upload('../'.UPLOAD_TEMPIMG_PATH.$newnameimg, $post['avatarimageid']);
}
/*--------------------------------------------------------------------------------------------*/
function admin_set_editprofile_cropcover($post)
{
    global $template, $db, $config;
    $dateimg = admin_get_info_attachment($post['coverimageid']);
    $imgurl = $dateimg['url'];
    $newnameimg = str_replace("../".UPLOAD_TEMPIMG_PATH,"",$dateimg['url']);
    include('../mega-system/mega.image.php');
    $img    = new class_mage();
    $img->load($imgurl)->crop($_POST['cropx'], $_POST['cropy'], $_POST['cropx2'], $_POST['cropy2'])->save('../'.UPLOAD_USER_COVER_SPATH.$newnameimg);
    $coverimgold = get_user_meta($post['userid'],'cover');
    remove_temp_upload('../'.UPLOAD_USER_COVER_SPATH.$coverimgold);
    update_user_meta($post['userid'],'cover',$newnameimg); 
    remove_temp_upload('../'.UPLOAD_TEMPIMG_PATH.$newnameimg, $post['coverimageid']);
}

?>