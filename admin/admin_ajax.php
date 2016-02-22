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
require_once('./acp-load.php');
if(!defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();
define('THIS_SCRIPT', 'ajax_phrase.php');
if(isset($_REQUEST['action']) and $_REQUEST['action'] == 'timeformat')
{
    echo date($_REQUEST['date'],time());
}
elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'dateformat')
{
    echo date($_REQUEST['date'],time());
}
elseif(isset($_REQUEST['do']))
{
    if($_REQUEST['do'] == 'setlang')
    {
        $post = $_POST;
        $result = $db->sql_query("UPDATE ".PHRASES_TABLE." SET `text`='".$post['value']."' WHERE `id`='".$db->sql_escape($post['pk'])."'");
        $db->sql_freeresult($result);
    }
    elseif($_REQUEST['do'] == 'emailexist')
    {
        $email   = $_REQUEST['email'];
        $numrows = $db->sql_numrows("SELECT * FROM ".USERS_TABLE." WHERE `email`='".$email."'");
        if($numrows)
        {
            echo '<span class="messege error">'.get_admin_languages('email_another_user').'</span>';
        }
        else
        {
            echo '<span class="messege done">'.get_admin_languages('email_available_registration').'</span>';
        }
    }
    elseif($_REQUEST['do'] == 'userexist')
    {
        $username   = $_REQUEST['uname'];
        $numrows    = $db->sql_numrows("SELECT * FROM ".USERS_TABLE." WHERE `username`='".$username."'");
        if($numrows)
        {
            echo '<span class="messege error">'.get_admin_languages('name_not_available_registration').'</span>';
        }
        else
        {
            echo '<span class="messege done">'.get_admin_languages('name_available_registration').'</span>';
        }
    }

    elseif($_REQUEST['do'] == 'editprofile')
    {
        if(!empty($_FILES['avatarimage']))
        {
            $validate    = admin_validate_dimensions($_FILES['avatarimage']['tmp_name'],256,256);
            $validateimg = admin_validatefile($_FILES['avatarimage']['tmp_name'],$_FILES['avatarimage']["name"]);
            if($validate['w'] and $validate['h'] and $validateimg['valid'])
            {
                $setimg  = admin_upload_file('avatarimage','tempimg/',$_POST['username']);
                echo '
                <img width="128" height="128" src="'.$setimg['imgurl'].'" class="attachment-thumbnail" alt="">
                <input type="hidden" name="imgw" class="imgw" value="'.$setimg['imgw'].'">
                <input type="hidden" name="imgh" class="imgh" value="'.$setimg['imgh'].'">
                <input type="hidden" name="avatarimageid" class="imgid" value="'.$setimg['id'].'">
                ';
            }
            elseif($validateimg['valid'] == false)
            {
                echo '<span class="messege error light">'.get_admin_languages('not_valid_format_upload').'</span>';
            }
            else
            {
                echo '<span class="messege error light">'.get_admin_languages('avatar_image_size_must').'</span>';
            }
        }
        elseif(!empty($_FILES['coverimage']))
        {
            $validate    = admin_validate_dimensions($_FILES['coverimage']['tmp_name'],1190,260);
            $validateimg = admin_validatefile($_FILES['coverimage']['tmp_name'],$_FILES['coverimage']["name"]);
            if($validate['w'] and $validate['h'] and $validateimg['valid'])
            {
                $setimg  = admin_upload_file('coverimage','tempimg/',$_POST['username']);
                echo '
                <img width="50" height="238" src="'.$setimg['imgurl'].'" class="attachment-thumbnail profile-cover" alt="">
                <input type="hidden" name="imgw" class="imgw" value="'.$setimg['imgw'].'">
                <input type="hidden" name="imgh" class="imgh" value="'.$setimg['imgh'].'">
                <input type="hidden" name="coverimageid" class="imgid" value="'.$setimg['id'].'">
                ';
            }
            elseif($validateimg['valid'] == false)
            {
                echo '<span class="messege error light">'.get_admin_languages('not_valid_format_upload').'</span>';
            }
            else
            {
                echo '<span class="messege error light">'.get_admin_languages('cover_image_size_must').'</span>';
            }
        }
        elseif($_POST['cropavatar']=='1')
        {
            admin_set_editprofile_cropavatar($_POST);
            echo '
            <img width="128" height="128" src="../'.UPLOAD_USER_AVATARS_SPATH.get_user_meta($_POST['userid'],'avatar').'" class="avatar-image avatar-80" alt="">
            ';
        }
        elseif($_POST['cropcover']=='1')
        {
            admin_set_editprofile_cropcover($_POST);
            echo '
            <img width="128" height="128" src="../'.UPLOAD_USER_COVER_SPATH.get_user_meta($_POST['userid'],'cover').'" class="cover-image avatar-80 profile-cover" alt="">
            ';
        }
        else
        {
            $users->set_editprofile($_POST);
        }
    }
    elseif($_REQUEST['do'] == 'cancelprofileupload')
    {
        
    }
}
else
{
    
}
//----------------------------------------------------------------------------------------| end
?>