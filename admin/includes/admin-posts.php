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

class admin_posts
{
    public function index_posts($terms)
    {
        global $template, $db, $config, $token;
        
        if(isset($_REQUEST['action']) and $_REQUEST['action']=='edit' and isset($_GET['id']))
        {
            $this->form_posts($terms,'edit');
        }
        elseif(isset($_POST['query']) and $_POST['query'] == 'addnew')
        {
            $this->post_insert($terms);
        }
        elseif(isset($_POST['query']) and $_POST['query'] == 'update')
        {
            $this->post_update();
        }
        elseif(isset($_POST['query']) and $_POST['query'] == 'action')
        {
            if(isset($_POST['mark'])){$mark = $_POST['mark'];}else{$mark = false;}
            $this->post_query_action($_POST['idx'],$mark,$_POST['action'],$_POST['token']);
        }       
        elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'activ')
        {
            $this->post_active();
        }
        elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'delete')
        {
            $this->post_delete();
        }
        else
        {
            $this->get_posts($terms);
        }
    }
    /*---------------------------------------------------------------------------*/
    public function get_posts($terms)
    {
        global $template, $db, $config, $token;

        $result     = $db->sql_query("SELECT * FROM ".POSTS_TABLE." 
        JOIN ".POSTSMETA_TABLE." ON (`meta_key`='pin_post') AND (`post_id`=`id`) 
        WHERE `post_type`='{$terms}' ORDER BY meta_value DESC , post_modified DESC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_posts', array( 
                'POST_ID'               => $row['id'],
                'POST_TITLE'            => $row['post_title'], 
                'POST_CONTENT'          => $row['post_content'], 
                'POST_TYPE'             => $row['post_type'], 
                'POST_COMMENT_STATS'    => $row['comment_status'],
                'POST_STATS'            => $row['post_status'],
                'POST_MODIFIED'         => date($config['dateformat'], $row['post_modified']),
                'POST_DATE'             => date('d-m-Y',$row['post_modified']),
                'POST_TIME'             => date('h:i:s a',$row['post_modified']),
                'POST_TIME_AGO'         => get_timeago($row['post_modified']),
                'POST_VIEW'             => get_post_meta($row['id'], 'views','0'),
                'POST_USER_ONLY'        => get_post_meta($row['id'], 'user_only',0),
                'POST_PIN_POST'         => get_post_meta($row['id'], 'pin_post',0),
                'POST_TERM_ID'          => $row['term_id'],
                'POST_TERM_NAME'        => get_terms_info($row['term_id'], 'name'),
                'POST_TERM_SLUG'        => get_terms_info($row['term_id'], 'slug'),
                'POST_AUTHOR'           => get_username_by_iduser($row['post_author']), 
                'AUTHOR_AVATER'         => get_gravatar($row['post_author'],'40'),
                'POST_AUTHOR_FULLNAME'  => get_user_meta($row['post_author'], 'firstname').' '.get_user_meta($row['post_author'], 'lastname'), 
                'AUTHOR_GROUP_NAME'     => get_user_meta($row['post_author'], 'group_name'), 
                'AUTHOR_GROUP_COLOR'    => get_user_meta($row['post_author'], 'group_color'), 
                'VOTE_UP'               => is_post_vote( array( 'post_id' => $row['id'], 'action' => 'up', 'user_ip' => GET_IP, 'user_id' => $row['post_author'] ) ),
                'VOTE_DOWN'             => is_post_vote( array( 'post_id' => $row['id'], 'action' => 'down', 'user_ip' => GET_IP, 'user_id' => $row['post_author'] ) ),
                'POST_VOTE'             => get_post_vote($row['id']),
                'VOTE_COLOR'            => (get_post_vote($row['id']) >= 0)? true : false ,
            )); 
        }
        if($terms == 'pages')
        {
            page_header(get_admin_languages('pages'));
            $template->set_filename('posts/index_pages.html');
            page_footer();
        }
        else
        {
            page_header(get_admin_languages('posts'));
            $template->set_filename('posts/index_posts.html');
            page_footer();
        }
            
    }
    /*---------------------------------------------------------------------------*/
    public function form_posts($terms,$type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $id      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".POSTS_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'POST_ID'               => $row['id'],
                'POST_TITLE'            => $row['post_title'], 
                'POST_CONTENT'          => $row['post_content'], 
                'POST_TYPE'             => $row['post_type'], 
                'POST_COMMENT_STATS'    => $row['comment_status'],
                'POST_STATS'            => $row['post_status'],
                'POST_TERM_ID'          => $row['term_id'],
                'POST_USER_ONLY'        => get_post_meta($row['id'], 'user_only'),
                'POST_PIN_POST'         => get_post_meta($row['id'], 'pin_post'),
                'POST_PAGE_TEMP'        => get_post_meta($row['id'], 'page_template'),
                'OPTION_TERMS'          => $this->get_option_categorie($row['post_type'],$row['term_id']),
                'QUERY'                 => 'update',
            )); 
            $title_page  = get_admin_languages('edit_post').'';
            $title_page2 = get_admin_languages('edit_page').'';
        }
        else
        {
            $orders = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE."") + 1;
            $template->assign_vars(array( 
                'POST_ID'               => '',
                'POST_TITLE'            => '', 
                'POST_CONTENT'          => '', 
                'POST_TYPE'             => $terms, 
                'POST_COMMENT_STATS'    => '', 
                'POST_STATS'            => true,
                'POST_USER_ONLY'        => false,  
                'POST_PIN_POST'         => false,
                'POST_TERM_ID'          => '', 
                'POST_PAGE_TEMP'        => '',
                'OPTION_TERMS'          => $this->get_option_categorie($terms),
                'QUERY'                 => 'addnew',
            ));
            $title_page  = get_admin_languages('add_new_post');
            $title_page2 = get_admin_languages('add_new_page');
        }
        
        if($terms == 'pages')
        {
            page_header($title_page2);
            $template->set_filename('posts/form_pages.html');
            page_footer();
        }
        else
        {
            page_header($title_page);
            $template->set_filename('posts/form_posts.html');
            page_footer();
        }
        
            
    }
    /*---------------------------------------------------------------------------*/
    public function post_insert($terms)
    {
        global $template, $db, $config,$acp_session;
        $post = array();
        $post = $_POST;
        $_SESSION['action_token'] = get_admin_languages('add_new_post');
        $sql_ins = array(
	            'id'                => (int)'',
                'post_author'       => (int)$acp_session->get_account('id'),
                'post_content'      => stripslashes(sanitize_text($post['content'])),
                'post_title'        => security($post['title']), 
                'post_status'       => (int)admin_get_form_status($post['status']),
                'comment_status'    => (int)'1',
                'post_name'         => security(preg_slug($post['title'])),
                'post_modified'     => (int)time(),
                'post_type'         => $terms,
                'term_id'           => (int)$post['term_id']  
        );
        $sql     = 'INSERT INTO ' . POSTS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $id = $db->sql_nextid();
        update_post_meta($id, 'user_only', admin_get_form_status($post['user_only']));
        update_post_meta($id, 'pin_post', admin_get_form_status($post['pin_post']));
        if(isset($post['page_template']))
        {
            update_post_meta($id, 'page_template', $post['page_template']);
        }
        
        //
        $db->sql_freeresult($result);
        header("Location:".THIS_SCRIPT."?post_type=".$_REQUEST['post_type']."&action=edit&id=".$id);
    }
    /*---------------------------------------------------------------------------*/
    public function post_update()
    {
        global $template, $db, $config;
        $post = array();
        $post = $_POST;
        $id   = $db->sql_escape($post['id']);
        $_SESSION['action_token'] = get_admin_languages('edit_post');
        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET 
            `post_content`      = '".$db->sql_escape(stripslashes(sanitize_text($post['content'])))."', 
            `post_title`        = '".security($post['title'])."', 
            `post_name`         = '".security(preg_slug($post['title']))."',
            `post_status`       = '".admin_get_form_status($post['status'])."', 
            `term_id`           = '".$post['term_id']."'
             WHERE `id` = '" . $db->sql_escape($id) . "'
        ");
        $db->sql_freeresult($result);
        update_post_meta($id, 'user_only', admin_get_form_status($post['user_only']));
        update_post_meta($id, 'pin_post', admin_get_form_status($post['pin_post']));
        if(isset($post['page_template']))
        {
            update_post_meta($id, 'page_template', $post['page_template']);
        }
        header("Location:".THIS_SCRIPT."?post_type=".$_REQUEST['post_type']."&action=edit&id=".$id);
    }
    
    /*---------------------------------------------------------------------------*/
    public function post_delete()
    {
        global $db;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . POSTS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_post_successfully');
        }
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
    public function post_query_action($idx,$checkbox,$action,$token)
    {
        global $db;
        if($token == $_SESSION['securitytokenadmincp'])
        {
            if($action == "delete"){
                if($checkbox)
                {
                    $number = count($checkbox);
                    for($i=0;$i<$number;$i++){
                        $id     = $checkbox[$i];
                        $result = $db->sql_query("DELETE FROM " . POSTS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
                    }
                    $_SESSION['action_token'] = get_admin_languages('delete_post_successfully');
                }
                else {$_SESSION['action_token'] = get_admin_languages('not_select_anything');}
                @header("Location:".THIS_SCRIPT_RETURN."");
            }
            elseif($action == "activs"){
                if($checkbox)
                {
                    $number = count($checkbox);
                    for($i=0;$i<$number;$i++){
                        $id     = $checkbox[$i];
                        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET `post_status`='1' WHERE `id`='".$db->sql_escape($id)."'"); 
                    }
                    $_SESSION['action_token'] = get_admin_languages('enable_post_successfully');
                }
                else {$_SESSION['action_token'] = get_admin_languages('not_select_anything');}
                @header("Location:".THIS_SCRIPT_RETURN."");
            }
            elseif($action == "disactivs"){
                if($checkbox)
                {
                    $number = count($checkbox);
                    for($i=0;$i<$number;$i++){
                        $id     = $checkbox[$i];
                        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET `post_status`='0' WHERE `id`='".$db->sql_escape($id)."'"); 
                    }
                    $_SESSION['action_token'] = get_admin_languages('disable_post_successfully');
                }
                else {$_SESSION['action_token'] = get_admin_languages('not_select_anything');}
                @header("Location:".THIS_SCRIPT_RETURN."");
            }
        }
    }
    /*---------------------------------------------------------------------------*/
    public function post_active()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token']    = get_admin_languages('disable_post_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_post_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET `post_status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
    public function get_option_categorie($terms, $id = '')
    {
        global $db;
        $result     = $db->sql_query("SELECT * FROM ".TERMS_TABLE." WHERE `type`='{$terms}' ORDER BY orders ASC");
        $option = '';
        while ($row = $db->sql_fetchrow($result)) 
        {
            if($id == $row['id'])
            {
                $option .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
            }
            else
            {
                $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
            
        }
        return $option;
    }
}    
?>