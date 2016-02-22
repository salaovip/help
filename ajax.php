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
if(isset($_REQUEST['do']))
{
    if($_REQUEST['do'] == 'emailexist')
    {
        $email   = $_REQUEST['email'];
        $numrows = $db->sql_numrows("SELECT * FROM ".USERS_TABLE." WHERE `email`='".$email."'");
        if($numrows)
        {
            echo '<span class="messege error">'.$display->get_languages('email_another_user').'</span>';
        }
        else
        {
            echo '<span class="messege done">'.$display->get_languages('email_available_registration').'</span>';
        }
    }
    elseif($_REQUEST['do'] == 'userexist')
    {
        $username   = $_REQUEST['uname'];
        $numrows    = $db->sql_numrows("SELECT * FROM ".USERS_TABLE." WHERE `username`='".$username."'");
        if($numrows)
        {
            echo '<span class="messege error">'.$display->get_languages('name_not_available_registration').'</span>';
        }
        else
        {
            echo '<span class="messege done">'.$display->get_languages('name_available_registration').'</span>';
        }
    }
    elseif($_REQUEST['do'] == 'addcommente')
    {
        $pid  = intval($_POST['comment_post_id']);
        $text = $_POST['comment'];
        $display->set_comment($pid,$text);
        @header("Location:index.php?post_id=".$pid);
    }
    elseif($_REQUEST['do'] == 'editprofile')
    {
        if(!empty($_FILES['avatarimage']))
        {
            $validate    = validate_dimensions($_FILES['avatarimage']['tmp_name'],256,256);
            $validateimg = validatefile($_FILES['avatarimage']['tmp_name'],$_FILES['avatarimage']["name"]);
            if($validate['w'] and $validate['h'] and $validateimg['valid'])
            {
                $setimg  = upload_file('avatarimage','tempimg/');
                echo '
                <img width="128" height="128" src="'.$setimg['imgurl'].'" class="attachment-thumbnail" alt="">
                <input type="hidden" name="imgw" class="imgw" value="'.$setimg['imgw'].'">
                <input type="hidden" name="imgh" class="imgh" value="'.$setimg['imgh'].'">
                <input type="hidden" name="avatarimageid" class="imgh" value="'.$setimg['id'].'">
                ';
            }
            elseif($validateimg['valid'] == false)
            {
                echo '<span class="messege error light">'.$display->get_languages('not_valid_format_upload').'</span>';
            }
            else
            {
                echo '<span class="messege error light">'.$display->get_languages('avatar_image_size_must').'</span>';
            }
        }
        elseif(!empty($_FILES['coverimage']))
        {
            $validate    = validate_dimensions($_FILES['coverimage']['tmp_name'],1190,260);
            $validateimg = validatefile($_FILES['coverimage']['tmp_name'],$_FILES['coverimage']["name"]);
            if($validate['w'] and $validate['h'] and $validateimg['valid'])
            {
                $setimg  = upload_file('coverimage','tempimg/');
                echo '
                <img width="50" height="238" src="'.$setimg['imgurl'].'" class="attachment-thumbnail profile-cover" alt="">
                <input type="hidden" name="imgw" class="imgw" value="'.$setimg['imgw'].'">
                <input type="hidden" name="imgh" class="imgh" value="'.$setimg['imgh'].'">
                <input type="hidden" name="coverimageid" class="imgh" value="'.$setimg['id'].'">
                ';
            }
            elseif($validateimg['valid'] == false)
            {
                echo '<span class="messege error light">'.$display->get_languages('not_valid_format_upload').'</span>';
            }
            else
            {
                echo '<span class="messege error light">'.$display->get_languages('cover_image_size_must').'</span>';
            }
        }
        elseif($_POST['cropavatar']=='1')
        {
            $users->set_editprofile_cropavatar($_POST);
            echo '
            <img width="128" height="128" src="'.UPLOAD_USER_AVATARS_SPATH.get_user_meta($session->get_account('id'),'avatar').'" class="avatar-image avatar-80" alt="">
            ';
        }
        elseif($_POST['cropcover']=='1')
        {
            $users->set_editprofile_cropcover($_POST);
            echo '
            <img width="128" height="128" src="'.UPLOAD_USER_COVER_SPATH.get_user_meta($session->get_account('id'),'cover').'" class="cover-image avatar-80 profile-cover" alt="">
            ';
        }
        else
        {
            $users->set_editprofile($_POST);
        }
    }
    elseif($_REQUEST['do'] == 'cancelprofileupload')
    {
        //
    }
    elseif($_REQUEST['do'] == 'updateemail')
    {
        $users->set_updateemail($_POST);
    }
    elseif($_REQUEST['do'] == 'updatepassword')
    {
        $users->set_updatepassword($_POST);
    }
    elseif($_REQUEST['do'] == 'setvote')
    {
        if (isset($_POST['postid']) AND isset($_POST['action']))
        {
        	$args = array(
                'action'    => $_POST['action'],
                'post_id'   => $_POST['postid'],
                'user_id'   => ($session->get_session())? $session->get_account('id') : '0',
                'user_ip'   => GET_IP,
            );
            if(!is_post_vote($args))
            {
                set_post_vote($args);
                $return['setvote']  = true;
                $return['vote']     = get_post_vote($_POST['postid']);
            }
            else
            {
                $return['setvote']  = false;
                $return['vote']     = get_post_vote($_POST['postid']);
            }
            echo json_encode($return);
        }
    }
}
else
{
    
}
//----------------------------------------------------------------------------------------| end
?>