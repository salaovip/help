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

class admin_faq
{
    /*---------------------------------------------------------------------------*/
    /* faq.php                                                             */
    /*---------------------------------------------------------------------------*/
    // faq
    public function index_faq()
    {
        global $template, $db, $config, $token;
        $page         = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit        = 10;
    	$startpoint   = ($page * $limit) - $limit;
        $sql          = "SELECT * FROM ".POSTS_TABLE." WHERE posttype='faq' ORDER BY modified DESC";
        $result       = $db->sql_query_limit($sql,$limit,$startpoint);
        $total        = $db->sql_numrows($sql);
        $lastpage     = ceil($total/$limit);
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_faq', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'MODIFIED'      => date('Y/m/d',$row['modified']),
                'VIEWS'         => $row['views'],
                'ORDERS'        => $row['orders'], 
                'STATUS'        => $row['status'], 
            ));
        }
        $template->assign_vars(array(
            'CLASS_FAQ'     => ' class="active"',
            'CLASS_FAQI'    => ' class="active"',
            'SHOW_PAGINATION'   => $showpagination,
            'PAGINATION'        => pagination($total,$limit,$page,'faq.php?'),
        ));
        page_header(get_admin_languages('manage_faq'));
        $template->set_filename('faq.html');
        page_footer();
    }
    

    // form faq
    public function form_faq($type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $id      = intval($_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".POSTS_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'CONTENT'       => $row['content'],
                'ORDERS'        => $row['orders'], 
                'STATUS'        => $row['status'], 
                'QUERY'         => 'edit',
            )); 
            $title_page = get_admin_languages('edit').' `'.$row['title'].'`';
            $template->assign_vars(array(
                'CLASS_FAQ' => ' class="active"',
                'CLASS_FAQI' => ' class="active"',
            ));
        }
        else
        {
            $orders = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE posttype='faq'") + 1;
            $template->assign_vars(array( 
                'ID'            => 0,
                'STATUS'        => true,
                'ORDERS'        => $orders,
                'QUERY'         => 'addnew',
            ));
            $title_page = get_admin_languages('add_new');
            $template->assign_vars(array(
                'CLASS_FAQ' => ' class="active"',
                'CLASS_FAQA' => ' class="active"',
            ));
        }
        
        page_header($title_page);
        $template->set_filename('form-faq.html');
        page_footer();
    }
    // active faq
    public function active_faq()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token'] = get_admin_languages('disable_post_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_post_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . POSTS_TABLE . " SET `status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT);
    }
    // delete faq
    public function delete_faq()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . POSTS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            
            $_SESSION['action_token'] = get_admin_languages('delete_post_successfully');
        }
        else
        {
            
        }
        header("Location:".THIS_SCRIPT."");
    }


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
}    
?>