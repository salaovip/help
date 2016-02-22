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

class admin_groups
{
    /*---------------------------------------------------------------------------*/
    /* groups.php                                                             */
    /*---------------------------------------------------------------------------*/
    // groups
    public function index_groups()
    {
        global $template, $db, $config, $token;
        $result     = $db->sql_query("SELECT * FROM ".GROUPS_TABLE." ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_groups', array( 
                'ID'            => $row['id'],
                'NAME'          => $row['name'], 
                'USERS'         => $this->get_numusergroup($row['id']), 
            )); 
        }
        $template->assign_vars(array(
            'CLASS_GROUPS' => ' class="active"',
        ));
        page_header(get_admin_languages('manage_groups'));
        $template->set_filename('groups.html');
        page_footer();
    }
    public function get_numusergroup($id)
    {
        global $db;
        $sql    = "SELECT id FROM ".ADMIN_TABLE." WHERE `gid`='{$id}'";
        $total  = $db->sql_numrows($sql);
        return $total;
    }
    /*---------------------------------------------------------------------------*/
    // form groups
    public function form_groups($type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $id      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".GROUPS_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'ID'                => $row['id'],
                'NAME'              => $row['name'],
                'DASHBOARD'         => $row['dashboard'],
                'CATEGORYS_ARTICLE' => $row['catearticle'],
                'ARTICLE'           => $row['article'],
                'CATEGORYS_NEWS'    => $row['catenews'],
                'NEWS'              => $row['news'],
                'FAQ'               => $row['faq'],
                'PAGES'             => $row['pages'],
                'SETTING'           => $row['setting'],
                'THEMES'            => $row['themes'],
                'LANGUAGE'          => $row['language'],
                'QUERY'             => 'edit',
            )); 
            $title_page = get_admin_languages('edit_groups').' `'.$row['name'].'`';
            $template->assign_vars(array(
                'CLASS_GROUPS' => ' class="active"',
            ));
        }
        else
        {
            $template->assign_vars(array( 
                'ID'                => 0,
                'NAME'              => '',
                'DASHBOARD'         => '',
                'CATEGORYS_ARTICLE' => '',
                'ARTICLE'           => '',
                'CATEGORYS_NEWS'    => '',
                'NEWS'              => '',
                'FAQ'               => '',
                'PAGES'             => '',
                'SETTING'           => '',
                'THEMES'            => '',
                'LANGUAGE'          => '',
                'QUERY'             => 'addnew',
            ));
            $title_page = get_admin_languages('add_new_group');
            $template->assign_vars(array(
                'CLASS_GROUPS' => ' class="active"',
            ));
        }
        page_header($title_page);
        $template->set_filename('form-groups.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    // active groups
    public function active_groups()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token'] = get_admin_languages('disable_groups_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_groups_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . GROUPS_TABLE . " SET `status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT);
    }
    /*---------------------------------------------------------------------------*/
    // delete groups
    public function delete_groups()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . GROUPS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_groups_successfully');
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