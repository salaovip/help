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
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|


class users extends display
{
    /*--------------------------------------------------------------------------------------------*/
    public function index_users()
    {
        global $template, $db, $config, $session;
        
        
        
        if($config['showpageusers'] == 'useronly' and !$session->get_session())
        {
            $template->assign_vars(array(
                'IS_SHOW_PAGE_USERS'   => true,
            ));
        }
        elseif($config['showpageusers'] == 'noteveryone')
        {
            @header("Location:index.php");
        }
        else
        {
            $template->assign_vars(array(
                'IS_SHOW_PAGE_USERS'   => false,
            ));
        }
        
        if(isset($_REQUEST['sort']) and $_REQUEST['sort'] == 'name')
        {
            $order = 'username ASC';
            $pagers = 'sort=name&';
            $template->assign_vars(array(
                'CLASS_REGISTER'    => '',
                'CLASS_NAME'        => 'active',
            ));
        }
        else
        {
            $order = 'id ASC';
            $pagers = '';
            $template->assign_vars(array(
                'CLASS_REGISTER'    => 'active',
                'CLASS_NAME'        => '',
            ));
        }
        $sql          = "SELECT id,username,email FROM ".USERS_TABLE." WHERE `status`='1' ORDER BY {$order}";
        $page         = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
    	$limit        = ($config['userper_page'] > 0)?$config['userper_page']: 12;
    	$startpoint   = ($page * $limit) - $limit;
        $result       = $db->sql_query_limit($sql,$limit,$startpoint);
        $total        = $db->sql_numrows($sql);
        $lastpage     = ceil($total/$limit);
        if($lastpage < $page )
        {
            @header("Location:users.php?pages={$lastpage}");
        }
        while ($row = $db->sql_fetchrow($result)) 
        {    
            $template->assign_block_vars('loop_users', array( 
                'ID'                => $row['id'], 
                'FNAME'             => get_user_meta($row['id'],'firstname'),
                'LNAME'             => get_user_meta($row['id'],'lastname'),
                'FULLNAME'          => get_user_meta($row['id'],'firstname').' '.get_user_meta($row['id'],'lastname'), 
                'COVER'             => get_cover($row['id']),
                'IMG'               => get_gravatar($row['id'],'50'),
                'LOCATION'          => get_user_meta($row['id'],'location'),
                'USER_NAME'         => $row['username'],
                'USER_FACEBOOK'     => get_user_meta($row['id'],'facebook'),
                'USER_TWITTER'      => get_user_meta($row['id'],'twitter'),
                'USER_GOOGLE'       => get_user_meta($row['id'],'google'),
                'USER_YOUTUBE'      => get_user_meta($row['id'],'youtube'),
                'USER_VIMEO'        => get_user_meta($row['id'],'vimeo'),
                'USER_FILCKR'       => get_user_meta($row['id'],'flickr'),
                'USER_DRIBBBLE'     => get_user_meta($row['id'],'dribbble'),
                'USER_PINTEREST'    => get_user_meta($row['id'],'pinterest'),
            ));
        }
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        $template->assign_vars(array(
            'PAGINATION'        => pagination($total,$limit,$page,'users.php?'.$pagers),
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
        ));
        set_counter();
        page_header('users');
        $template->set_filename('users/index_users.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_register()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'IS_SIGN'       => true,
            'SHOW_FOOTER'   => false,
        ));
        if($session->get_session())
        {
            @header("Location:index.php");
        }
        if($config['registration_status'])
        {
            if(isset($_POST['action']) and $_POST['action']=='newuser')
            {
                $error = false;
                if(empty($_POST['firstname'])){$error = true;}
                if(empty($_POST['lastname'])){$error = true;}
                if(empty($_POST['username'])){$error = true;}
                if(empty($_POST['email'])){$error = true;}
                if(empty($_POST['password'])){$error = true;}
                $numemail = $db->sql_numrows("SELECT * FROM ".USERS_TABLE." WHERE `email`='".$db->sql_escape($_POST['email'])."'");
                if($numemail){$error = true;}
                if(!$error)
                {
                    $password = md5($_POST['password']);
                    $keyforget = securitytoken(30);
                    $sql_ins = array(
                        'id'                => (int)'',
                        'username'          => security($_POST['username']),
                        'email'             => security($_POST['email']),
                        'password'          => $password,
                        'activation_key'    => ($config['registration_activation'])? $keyforget: '',
                        'status'            => (int)($config['registration_activation'])? '0': '1',
                    );
                    $sql     = 'INSERT INTO ' . USERS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
                    $result  = $db->sql_query($sql);
                    $id      = $db->sql_nextid();
                    update_user_meta($id,'firstname',security($_POST['firstname']));
                    update_user_meta($id,'lastname',security($_POST['lastname']));
                    update_user_meta($id,'group_name','user');
                    update_user_meta($id,'group_color','#00adef');
                    update_user_meta($id,'group','user');
                    update_user_meta($id,'capabilities','user');
                    update_user_meta($id,'signuptime',time());
                    update_user_meta($id,'forgettime','');
                    update_user_meta($id,'ipaddress',GET_IP);
                    update_user_meta($id,'user_agent',GET_PC);
                    $datasend = array(
                        'firstname' => $_POST['firstname'],
                        'lastname'  => $_POST['lastname'],
                        'email'     => $_POST['email'],
                        'username'  => $_POST['username'],
                        'siteurl'   => $config['siteurl'],
                        'sitename'  => $config['sitename'],
                        'keyforget' => $keyforget,
                    );
                    $db->sql_freeresult($result);
                    if($config['registration_activation'])
                    {
                        sendemail($datasend,'register_activation',$_POST['email']);
                    }
                    else
                    {
                        sendemail($datasend,'register',$_POST['email']);
                    }
                    $session->set_session('25',$id,'user');
                    @header("Location:index.php");
                }
                else
                {
                    page_header('register');
                    $template->set_filename('users/user_register.html');
                    page_footer();
                }
            }
            else
            {
                page_header('register');
                $template->set_filename('users/user_register.html');
                page_footer();
            }
        }
        else
        {
            $template->assign_vars(array(
                'IS_NOT_RES_USERS'   => true,
            ));
            page_header('register');
            $template->set_filename('users/user_register.html');
            page_footer();
        }
        set_counter();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_activate()
    {
        global $template, $db, $config, $session;
        if(isset($_REQUEST['key']) and isset($_REQUEST['login']))
        {
            $key   = security($_REQUEST['key']);
            $login = security($_REQUEST['login']);
            $sql   = "SELECT * FROM ".USERS_TABLE." WHERE `activation_key`='".$db->sql_escape($key)."' and `username`='".$db->sql_escape($login)."'";
            if($db->sql_numrows($sql))
            {
                $result   = $db->sql_query($sql);
                $date     = $db->sql_fetchrow($result);
                $datasend = array(
                    'firstname' => get_user_meta($date['id'],'firstname'),
                    'lastname'  => get_user_meta($date['id'],'lastname'),
                    'email'     => $date['email'],
                    'username'  => $date['username'],
                    'siteurl'   => $config['siteurl'],
                    'sitename'  => $config['sitename'],
                );
                sendemail($datasend,'register',$date['email']);
                $result = $db->sql_query("UPDATE " . USERS_TABLE . " SET `status`='1', `activation_key`='' 
                WHERE `activation_key`='".$db->sql_escape($key)."' and `username`='".$db->sql_escape($login)."'");
                $session->set_session('25',$date['id'],'user');
                @header("Location:users.php?username={$login}");
            }
            else
            {
                @header("Location:index.php");
            }
        }
        else
        {
            @header("Location:index.php");
        }
    }
    //
    /*--------------------------------------------------------------------------------------------*/
    public function index_login()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'IS_SIGN'       => true,
            'IS_LOGIN'      => true,
            'SHOW_FOOTER'   => false,
        ));
        if($session->get_session())
        {
            @header("Location:index.php");
        }
        if(isset($_POST['action']) and $_POST['action'] == 'login')
        {
            if(!empty($_POST['email']) or !empty($_POST['password']))
            {
                $email    = security($_POST['email']);
                $password = md5($_POST['password']);
                $sql      = "SELECT * FROM ".USERS_TABLE." WHERE `email`='".$db->sql_escape($email)."' and `password`='".$db->sql_escape($password)."'";
                if($db->sql_numrows($sql))
                {
                    $result   = $db->sql_query($sql);
                    $date     = $db->sql_fetchrow($result);
                    $session->set_session('25',$date['id'],'user');
                    @header("Location:index.php");
            	 }
                 else
                 {
                    $template->assign_vars(array(
                        'IS_NOTLOGIN'   => true,
                    ));
                 }
            }
            else
            {
                $template->assign_vars(array(
                    'IS_FIELDLOGIN'   => true,
                ));
            }
        }
        set_counter();
        page_header('login');
        $template->set_filename('users/user_login.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_logout()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'IS_SIGN'       => true,
            'IS_LOGIN'      => true,
            'SHOW_FOOTER'   => false,
        ));
        if($session->get_session())
        {
            $session->unset_session();
            $template->assign_vars(array(
                'IS_LOGOUT' => true,
            ));
            page_header('logout');
            $template->set_filename('users/user_login.html');
            page_footer();
        }
        else
        {
            @header("Location:index.php?mode=login");
        }
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_forget()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'IS_SIGN'       => true,
            'IS_FORGET'     => true,
            'SHOW_FOOTER'   => false,
        ));
        if($session->get_session())
        {
            @header("Location:index.php");
        }
        if(isset($_POST['action']) and $_POST['action'] == 'forgetpassword')
        {
            if(!empty($_POST['email']))
            {
                $email =  security($_POST['email']);
                $sql  = "SELECT * FROM ".USERS_TABLE." WHERE `email`='".$db->sql_escape($email)."'";
                if($db->sql_numrows($sql)){
                    $result    = $db->sql_query($sql);
                    $date      = $db->sql_fetchrow($result);
                    $keyforget = securitytoken(30);
                    $result    = $db->sql_query("UPDATE " . USERS_TABLE . " SET `activation_key`='".$keyforget."' 
                    WHERE `id`='".$db->sql_escape($date['id'])."' and `email`='".$db->sql_escape($email)."'");
                    update_user_meta($date['id'],'forgettime',time());
                    $db->sql_freeresult($result);
                    $template->assign_vars(array(
                        'FORGET_SEND'   => true,
                    ));
                    $datasend = array(
                        'firstname' => get_user_meta($date['id'],'firstname'),
                        'lastname'  => get_user_meta($date['id'],'lastname'),
                        'email'     => $date['email'],
                        'username'  => $date['username'],
                        'userid'    => $date['id'],
                        'keyforget' => $keyforget,
                    );
                    sendemail($datasend,'forget_password',$date['email']);
            
            	 }
                 else
                 {
                    $template->assign_vars(array(
                        'IS_NOTFORGET'  => true,
                        'FORGET_FORM'   => true
                    ));
                 }
            }
            else
            {
                $template->assign_vars(array(
                    'IS_NOTLOGIN'    => true,
                    'FORGET_FORM'    => true,
                ));
            }  
        }
        elseif(isset($_REQUEST['key']) and isset($_REQUEST['login']) and !isset($_POST['action']))
        {
            $key   =  security($_REQUEST['key']);
            $login =  security($_REQUEST['login']);
            $sql   = "SELECT * FROM ".USERS_TABLE." WHERE `activation_key`='".$db->sql_escape($key)."' and `username`='".$db->sql_escape($login)."'";
            if($db->sql_numrows($sql))
            {
                $result   = $db->sql_query($sql);
                $date     = $db->sql_fetchrow($result);
                $time     =  get_user_meta($date['id'],'forgettime')+ (60*60*2);
                if($time > time())
                {
                    $template->assign_vars(array(
                        'FORGET_SET_KEY'    => true,
                        'FORGET_KEY'        => $key,
                        'FORGET_USERNAME'   => $login,
                    ));
                }
                else
                {
                    @header("Location:users.php?mode=forget&error=invalid");
                }
            }
            else
            {
                @header("Location:index.php");
            }
        }
        elseif(isset($_POST['action']) and $_POST['action']=='resetpassword' and isset($_POST['login']) and isset($_POST['key']))
        {
            $key        =  security($_POST['key']);
            $login      =  security($_POST['login']);
            $password   = md5($_POST['password']);
            $result    = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `activation_key`='".$db->sql_escape($key)."' and `username`='".$db->sql_escape($login)."'");
            $date      = $db->sql_fetchrow($result);
            if($date['activation_key'] ==  security($_POST['key']))
            {
                $result = $db->sql_query("UPDATE " . USERS_TABLE . " SET `password`='".$password."', `activation_key`='' 
                WHERE `activation_key`='".$db->sql_escape($key)."' and `username`='".$db->sql_escape($login)."'");
                $datasend = array(
                    'firstname' => get_user_meta($date['id'],'firstname'),
                    'lastname'  => get_user_meta($date['id'],'lastname'),
                    'email'     => $date['email'],
                    'username'  => $date['username'],
                    'userid'    => $date['id'],
                );
                sendemail($datasend,'forget_sucess',$date['email']);
                @header("Location:users.php?mode=login");
            }
            else
            {
                @header("Location:index.php");
            }
        }
        else
        {
            if(isset($_REQUEST['error']) and $_REQUEST['error'] == 'invalid')
            {
                $template->assign_vars(array(
                    'FORGET_INVALID'   => true,
                ));
            }
            $template->assign_vars(array(
                'FORGET_FORM'    => true,
                'FORGET_SEND'    => false,
                'FORGET_SET_KEY' => false,
            ));
        }
        page_header('forget password');
        $template->set_filename('users/user_forget.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_profile($username = true)
    {
        global $template, $db, $config, $session;
        
        
        if($config['showprofileusers'] == 'useronly' and !$session->get_session())
        {
            $template->assign_vars(array(
                'IS_SHOW_PROFILE_USERS'   => true,
            ));
        }
        elseif($config['showprofileusers'] != 'noteveryone')
        {
            $template->assign_vars(array(
                'IS_SHOW_PROFILE_USERS'   => false,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'IS_SHOW_PROFILE_USERS'   => false,
            ));
        }
        
        $crr_userid = '';
        if($username and isset($_REQUEST['username']))
        {
            $numuser = $db->sql_numrows("SELECT id FROM ".USERS_TABLE." WHERE `username`='".$db->sql_escape($_REQUEST['username'])."'");
            if(!$numuser)
            {
                @header("Location:index.php");
            }
            else
            {
                $userid = get_iduser_by_username($_REQUEST['username']);
                if($session->get_session() and $session->get_account('id') == $userid)
                {
                    $crr_userid   = $session->get_account('id');
                    $template->assign_vars(array(
                        'IS_USER_PROFILE_CRR'  => true,
                    ));
                }
                else
                {
                    if($config['showprofileusers'] == 'noteveryone')
                    {
                        @header("Location:index.php");
                    }
                    $crr_userid   = $userid;
                    $template->assign_vars(array(
                        'IS_USER_PROFILE_CRR'  => false,
                    ));
                    $result = $db->sql_query("UPDATE " . USERSMETA_TABLE . " SET  `meta_value`=meta_value+1 WHERE `meta_key`='showprofile' AND `user_id`='{$crr_userid}'");
                    $db->sql_freeresult($result);
        
                }   
            }
            
        }
        elseif(isset($_REQUEST['mode']) and $_REQUEST['mode'] == 'profile')
        {
            $username  = $session->get_account('username');
            if($session->get_session() and $session->get_account('id') and $username)
            {
                @header("Location:users.php?username=".$username);
            }
            else
            {
                @header("Location:users.php");
            }  
        }
        get_userinfo($crr_userid,'vars');
        $template->assign_var('IS_PROFILE',true);
        set_counter();
        page_header('profile');
        $template->set_filename('users/user_profile.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_editprofile()
    {
        global $template, $db, $config, $session;
        if($session->get_session())
        {
            $template->assign_vars(array(
                'IS_EDIT_PROFILE'  => true,
            ));
            get_userinfo($session->get_account('id'),'vars');
            page_header('edit profile');
            $template->set_filename('users/user_editprofile.html');
            page_footer();
        }
        else
        {
            @header("Location:index.php");
        }
    }
    /*--------------------------------------------------------------------------------------------*/
    public function set_editprofile($post)
    {
        global $template, $db, $config, $session;
        if($session->get_session() and isset($post['action']) and $post['action'] == 'updateuser')
        {
            $userid = $session->get_account('id');
            update_user_meta($userid,'firstname',security($post['firstname']));
            update_user_meta($userid,'lastname',security($post['lastname']));
            update_user_meta($userid,'location',security($post['location']));
            update_user_meta($userid,'website',security($post['website']));
            update_user_meta($userid,'twitter',security($post['twitter']));
            update_user_meta($userid,'google',security($post['google']));
            update_user_meta($userid,'facebook',security($post['facebook']));
            update_user_meta($userid,'youtube',security($post['youtube']));
            update_user_meta($userid,'vimeo',security($post['vimeo']));
            update_user_meta($userid,'flickr',security($post['flickr']));
            update_user_meta($userid,'dribbble',security($post['dribbble']));
            update_user_meta($userid,'pinterest',security($post['pinterest']));
        }
        else
        {
            @header("Location:index.php");
        }  
    }
    /*--------------------------------------------------------------------------------------------*/
    public function set_editprofile_cropavatar($post)
    {
       global $template, $db, $config, $session;
        if($session->get_session())
        {
            $dateimg = get_info_attachment($post['avatarimageid']);
            $imgurl = $dateimg['url'];
            $newnameimg = str_replace(UPLOAD_TEMPIMG_PATH,"",$dateimg['url']);
            include('mega.image.php');
            $img    = new class_mage();
            $img->load($imgurl)->crop($_POST['cropx'], $_POST['cropy'], $_POST['cropx2'], $_POST['cropy2'])->save(UPLOAD_USER_AVATARS_SPATH.$newnameimg);
            $avatarimgold = get_user_meta($session->get_account('id'),'avatar');
            remove_temp_upload(UPLOAD_USER_AVATARS_SPATH.$avatarimgold);
            update_user_meta($session->get_account('id'),'avatar',$newnameimg);
            remove_temp_upload(UPLOAD_TEMPIMG_PATH.$newnameimg, $post['avatarimageid']);
        }
        else
        {
            @header("Location:index.php");
        }    
    }
    /*--------------------------------------------------------------------------------------------*/
    public function set_editprofile_cropcover($post)
    {
       global $template, $db, $config, $session;
        if($session->get_session())
        {
            $dateimg = get_info_attachment($post['coverimageid']);
            $imgurl = $dateimg['url'];
            $newnameimg = str_replace(UPLOAD_TEMPIMG_PATH,"",$dateimg['url']);
            include('mega.image.php');
            $img    = new class_mage();
            $img->load($imgurl)->crop($_POST['cropx'], $_POST['cropy'], $_POST['cropx2'], $_POST['cropy2'])->save(UPLOAD_USER_COVER_SPATH.$newnameimg);
            $coverimgold = get_user_meta($session->get_account('id'),'cover');
            remove_temp_upload(UPLOAD_USER_COVER_SPATH.$coverimgold);
            update_user_meta($session->get_account('id'),'cover',$newnameimg);
            remove_temp_upload(UPLOAD_TEMPIMG_PATH.$newnameimg, $post['coverimageid']);
        }
        else
        {
            @header("Location:index.php");
        }    
    }
    /*--------------------------------------------------------------------------------------------*/
    public function set_updateemail($post)
    {
        global $db, $config, $template, $session;
        if($session->get_session())
        {
            if(filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL) and $_POST['email1'] == $_POST['email2'])
            {
                $sql    = "SELECT * FROM ".USERS_TABLE." WHERE `email`='".$post['email1']."'";
                $total  = $db->sql_numrows($sql);
                if($total)
                {
                    echo '<span class="messege error light">Email address of the user by another user.</span>';
                }
                else
                {
                     $result  = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$session->get_account('id')."'");
                     $date    = $db->sql_fetchrow($result);
                     $db->sql_query("UPDATE " . USERS_TABLE . " SET `email`='".$post['email1']."' WHERE `id`='".$session->get_account('id')."'");
                    echo '<span class="newemail hidden">'.$post['email1'].'</span><span class="messege messege-text">Changed email address</span>';
                }
            }
            else
            {
                echo '<span class="messege error light">Please enter your email address in the fields correctly.</span>';
                
            }
        }
    }
    /*--------------------------------------------------------------------------------------------*/
    public function set_updatepassword($post)
    {
        global $db, $config, $template, $session;
        if($session->get_session())
        {
            if( strlen($post['pass1']) >= 6 and $post['pass1'] == $post['pass2'] )
            {
                $result = $db->sql_query("UPDATE " . USERS_TABLE . " SET `password`='".md5($post['pass1'])."' WHERE `id`='".$session->get_account('id')."'");
                echo '
                <div class="form-messeges light done redirect">
                    <div class="messege-warp">
                            <span class="messege-text">Changed Password</span>
                    </div>
                </div>
                ';
                $session->unset_session();
            }
            else
            {
                echo '<span class="messege error light">Please enter the password in the fields correctly and not less than 6 characters.</span>';
            }
                
        }
    }
}

?>