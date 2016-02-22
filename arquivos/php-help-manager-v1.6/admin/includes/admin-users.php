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

class admin_users
{
    /*---------------------------------------------------------------------------*/
    /* users.php                                                             */
    /*---------------------------------------------------------------------------*/
    // users
    public function index_users()
    {
        global $template, $db, $config, $token;
        $result     = $db->sql_query("SELECT * FROM ".ADMIN_TABLE." ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_users', array( 
                'ID'            => $row['id'],
                'NAME'          => $row['username'], 
                'EMAIL'         => $row['email'], 
                'GROUP'         => $this->get_group_name($row['gid']),
                'STATUS'        => $row['status'], 
            )); 
        }
        
        

        
        
        
        $template->assign_vars(array(
            'CLASS_USERS' => ' class="active"',
        ));
        page_header(get_admin_languages('manage_users'));
        $template->set_filename('users.html');
        page_footer();
        
    }
    
    public function get_group_name($id)
    {
        global $db;
        $result = $db->sql_query("SELECT * FROM ".GROUPS_TABLE." WHERE `id`='{$id}'");
        $row    = $db->sql_fetchrow($result);
        return $row['name'];
    }
    
    
    public function get_groups_options($id = '')
    {
        global $db;
        $result = $db->sql_query("SELECT * FROM ".GROUPS_TABLE."");
        $html = '';
        while($row = $db->sql_fetchrow($result))
        {
            if($row['id'] == $id)
            {
                $sel = 'selected="selected"';
            }
            else
            {
                $sel = '';
            }
            $html .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['name'].'</option>';
        }
        return $html;
        
    }
    
    /*---------------------------------------------------------------------------*/
    // form users
    public function form_users($type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $id      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".ADMIN_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'ID'       => $row['id'],
                'ISADMIN'  => $row['isadmin'],
                'NAME'     => $row['username'],
                'EMAIL'    => $row['email'],
                'GROUPS'   => $this->get_groups_options($row['gid']),
                'STATUS'   => $row['status'],
                'QUERY'    => 'edit',
            )); 
            $title_page = get_admin_languages('edit_users').' `'.$row['username'].'`';
            $template->assign_vars(array(
                'CLASS_USERS' => ' class="active"',
            ));
        }
        else
        {
            $template->assign_vars(array( 
                'ID'       => 0,
                'ISADMIN'  => false,
                'USER'     => '',
                'EMAIL'    => '',
                'GROUPS'   => $this->get_groups_options(),
                'STATUS'   => true,
                'QUERY'    => 'addnew',
            ));
            $title_page = get_admin_languages('add_new_users');
            $template->assign_vars(array(
                'CLASS_USERS' => ' class="active"',
            ));
        }
        page_header($title_page);
        $template->set_filename('form-users.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    // active users
    public function active_users()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token'] = get_admin_languages('disable_users_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_users_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . ADMIN_TABLE . " SET `status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT);
    }
    /*---------------------------------------------------------------------------*/
    // delete users
    public function delete_users()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . ADMIN_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_users_successfully');
        }
        else
        {
            
        }
        header("Location:".THIS_SCRIPT."");
    }
    /*---------------------------------------------------------------------------*/
    public function get_form_status($status)
    {
        if($status)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    /*---------------------------------------------------------------------------*/
}    






?>