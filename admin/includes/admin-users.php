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
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}
class admin_users
{
    public function index_users()
    {
        global $template, $db, $config, $token;
        $result     = $db->sql_query("SELECT * FROM ".USERS_TABLE." ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_users', array( 
                'ID'            => $row['id'],
                'NAME'          => $row['username'], 
                'EMAIL'         => $row['email'], 
                'STATUS'        => $row['status'], 
                'ROLE'          => get_user_meta($row['id'],'capabilities'),
                'AVATAR'        => get_gravatar($row['id'],'32'),
                'POSTS'         => get_count_post_user($row['id']),
            )); 
        }
        $template->assign_vars(array(
            'CLASS_USERSS' => ' class="active"',
        ));
        page_header(get_admin_languages('users'));
        $template->set_filename('users/index_users.html');
        page_footer();
        
    }
    /*---------------------------------------------------------------------------*/
    public function profile_users()
    {
        global $template, $db, $config, $token, $acp_session;
        $uid = intval($_GET['id']);
        $template->assign_vars(array(
            'USER_UID'              => $uid,
            'USER_USERNAME'         => get_user_column($uid,'username'),
            'USER_FIRSTNAME'        => get_user_meta($uid,'firstname'),
            'USER_LASTNAME'         => get_user_meta($uid,'lastname'),
            'USER_EMAIL'            => get_user_column($uid,'email'),
            'USER_COVERIMG'         => get_cover($uid, '../'),
            'USER_LOCATION'         => get_user_meta($uid,'location'),
            'USER_WEBSITE'          => get_user_meta($uid,'website'),
            'USER_FACEBOOK'         => get_user_meta($uid,'facebook'),
            'USER_TWITTER'          => get_user_meta($uid,'twitter'),
            'USER_GOOGLE'           => get_user_meta($uid,'google'),
            'USER_YOUTUBE'          => get_user_meta($uid,'youtube'),
            'USER_VIMEO'            => get_user_meta($uid,'vimeo'),
            'USER_FILCKR'           => get_user_meta($uid,'flickr'),
            'USER_DRIBBBLE'         => get_user_meta($uid,'dribbble'),
            'USER_PINTEREST'        => get_user_meta($uid,'pinterest'),
            'USER_AVATER'           => get_gravatar($uid,180,'','','../'),
            'USER_SHOW_PROFILE'     => get_user_meta($uid,'showprofile'),
            'USER_TIMEAGO'          => get_timeago(get_user_meta($uid,'signuptime')),
            'USER_TIMEREG'          => date('d/m/Y - g:i a',get_user_meta($uid,'signuptime')),
            'ADMIN_SAVE'            => (intval(@$_GET['save'])) ? true : false ,
        ));
        page_header(get_admin_languages('profile').' '.get_user_column($uid,'username'));
        $template->set_filename('users/users_profile.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    // form users
    public function form_users($type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $uid      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$db->sql_escape($uid)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'USER_UID'              => $uid,
                'USER_USERNAME'         => get_user_column($uid,'username'),
                'USER_FIRSTNAME'        => get_user_meta($uid,'firstname'),
                'USER_LASTNAME'         => get_user_meta($uid,'lastname'),
                'USER_EMAIL'            => get_user_column($uid,'email'),
                'USER_COVERIMG'         => get_cover($uid,'../'),
                'USER_LOCATION'         => get_user_meta($uid,'location'),
                'USER_WEBSITE'          => get_user_meta($uid,'website'),
                'USER_FACEBOOK'         => get_user_meta($uid,'facebook'),
                'USER_TWITTER'          => get_user_meta($uid,'twitter'),
                'USER_GOOGLE'           => get_user_meta($uid,'google'),
                'USER_YOUTUBE'          => get_user_meta($uid,'youtube'),
                'USER_VIMEO'            => get_user_meta($uid,'vimeo'),
                'USER_FILCKR'           => get_user_meta($uid,'flickr'),
                'USER_DRIBBBLE'         => get_user_meta($uid,'dribbble'),
                'USER_PINTEREST'        => get_user_meta($uid,'pinterest'),
                'USER_ROLE'             => get_user_meta($uid,'capabilities'),
                'USER_AVATER'           => get_gravatar($uid,180,'','','../'),
                'USER_STATUS'           => $row['status'],
                'QUERY'                 => 'update',
            )); 
            $title_page = get_admin_languages('edit').'  `'.$row['username'].'`';
            $template->assign_vars(array(
                'CLASS_USERSS' => ' class="active"',
            ));
        }
        else
        {
            $template->assign_vars(array( 
                'USER_UID'              => '',
                'USER_USERNAME'         => '',
                'USER_FIRSTNAME'        => '',
                'USER_LASTNAME'         => '',
                'USER_EMAIL'            => '',
                'USER_COVERIMG'         => '',
                'USER_LOCATION'         => '',
                'USER_WEBSITE'          => '',
                'USER_FACEBOOK'         => '',
                'USER_TWITTER'          => '',
                'USER_GOOGLE'           => '',
                'USER_YOUTUBE'          => '',
                'USER_VIMEO'            => '',
                'USER_FILCKR'           => '',
                'USER_DRIBBBLE'         => '',
                'USER_PINTEREST'        => '',
                'USER_AVATER'           => '',
                'USER_ROLE'             => 'user',
                'USER_STATUS'           => true,
                'QUERY'                 => 'addnew',
            ));
            $title_page = get_admin_languages('add_new');
            $template->assign_vars(array(
                'CLASS_USERSS' => ' class="active"',
            ));
        }
        page_header($title_page);
        $template->set_filename('users/form_users.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    // delete users
    public function delete_users()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . USERS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_user_successfully');
        }
        else
        {
            
        }
        header("Location:".THIS_SCRIPT."");
    }
    /*---------------------------------------------------------------------------*/
    public function user_insert()
    {
        global $template, $db, $config;
        $post = array();
        $post = $_POST;
        $_SESSION['action_token'] = get_admin_languages('add_user_successfully');
        $password = md5($post['password']);
        $sql_ins = array(
            'id'                => (int)'',
            'username'          => security($post['username']),
            'email'             => security($post['email']),
            'password'          => $password,
            'activation_key'    => '',
            'status'            => (int)admin_get_form_status($post['status']),
        );
        $sql     = 'INSERT INTO ' . USERS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        $userid = $db->sql_nextid();
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
        update_user_meta($userid,'capabilities',security($post['capabilities']));
        update_user_meta($userid,'group',security($post['capabilities']));
        update_user_meta($userid,'group_name',security($post['capabilities']));
        if($post['capabilities'] == 'user')
        {
            update_user_meta($userid,'group_color','#00adef');
        }
        else
        {
            update_user_meta($userid,'group_color','#C71919');
        }
        header("Location:".THIS_SCRIPT."");
    }
    /*---------------------------------------------------------------------------*/
    public function user_update()
    {
        global $template, $db, $config;
        $post = array();
        $post = $_POST;
        $userid = security($post['userid']);
        $_SESSION['action_token'] = get_admin_languages('edit_user_successfully');
        $status = admin_get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . USERS_TABLE . " SET  
            `email`     = '".$post['email']."', 
            `status`    = '".$status."' 
             WHERE `id` = '" . $db->sql_escape($userid) . "'
        ");
        $db->sql_freeresult($result);
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
        update_user_meta($userid,'capabilities',security($post['capabilities']));
        update_user_meta($userid,'group',security($post['capabilities']));
        update_user_meta($userid,'group_name',security($post['capabilities']));
        if($post['capabilities'] == 'user')
        {
            update_user_meta($userid,'group_color','#00adef');
        }
        else
        {
            update_user_meta($userid,'group_color','#C71919');
        }
        
        if(isset($post['password']) and !empty($post['password']))
        {
            $result = $db->sql_query("UPDATE ".USERS_TABLE." SET `password`='".md5($post['password'])."' WHERE `id`='".$db->sql_escape($userid)."'");
            $db->sql_freeresult($result);
        }
        header("Location:".THIS_SCRIPT."");
    }
    /*---------------------------------------------------------------------------*/
    // actions users
    public function query_action($checkbox,$action,$token){
        global $db;
        if($token == $_SESSION['securitytokenadmincp'])
        {
            if($action == "delete"){
                if($checkbox)
                {
                    $number = count($checkbox);
                    for($i=0;$i<$number;$i++){
                        $id     = $checkbox[$i];
                        $result = $db->sql_query("DELETE FROM " . USERS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
                    }
                    $_SESSION['action_token'] = get_admin_languages('delete_users_successfully');
                }
                else {$_SESSION['action_token'] = get_admin_languages('not_select_anything');}
                header("Location:".THIS_SCRIPT."");
            }
        }
    }
}    
?>