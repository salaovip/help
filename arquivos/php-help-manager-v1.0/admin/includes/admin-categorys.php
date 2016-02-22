<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}

class admin_categorys
{
    /*---------------------------------------------------------------------------*/
    /* categorys.php                                                             */
    /*---------------------------------------------------------------------------*/
    // categorys
    public function index_categorys()
    {
        global $template, $db, $config, $token;
        $result_art     = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE catetype='article' ORDER BY orders ASC");
        while ($row_art = $db->sql_fetchrow($result_art)) 
        {
            $numposts = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE `cid`='".$row_art['id']."'");
            $template->assign_block_vars('admin_loop_category_art', array( 
                'ID'           => $row_art['id'],
                'NAME'         => $row_art['name'], 
                'ORDERS'       => $row_art['orders'], 
                'CATETYPE'     => 'Knowledge Base',
                'STATUS'       => $row_art['status'], 
                'NUMPOSTS'     => $numposts,
            )); 
        }
        
        
        $result_new     = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE catetype='news' ORDER BY orders ASC");
        while ($row_new = $db->sql_fetchrow($result_new)) 
        {
            $numposts = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE `cid`='".$row_new['id']."'");
            $template->assign_block_vars('admin_loop_category_new', array( 
                'ID'           => $row_new['id'],
                'NAME'         => $row_new['name'], 
                'ORDERS'       => $row_new['orders'], 
                'CATETYPE'     => $row_new['catetype'],
                'STATUS'       => $row_new['status'], 
                'NUMPOSTS'     => $numposts,
            )); 
        }
        
        
        
        $template->assign_vars(array(
            'CLASS_CATE' => ' class="active"',
            'CLASS_CATEI' => ' class="active"',
        ));
        page_header(get_admin_languages('manage_categorys'));
        $template->set_filename('categorys.html');
        page_footer();
        
    }
    /*---------------------------------------------------------------------------*/
    // form categorys
    public function form_categorys($type = 'new')
    {
        global $template, $db, $config;
        if($type == 'edit')
        {
            $id      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'ID'       => $row['id'],
                'NAME'     => $row['name'],
                'ORDERS'   => $row['orders'],
                'CATETYPE' => $row['catetype'],
                'STATUS'   => $row['status'],
                'QUERY'    => 'edit',
            )); 
            $title_page = get_admin_languages('edit_category').' `'.$row['name'].'`';
            $template->assign_vars(array(
                'CLASS_CATE' => ' class="active"',
                'CLASS_CATEI' => ' class="active"',
            ));
        }
        else
        {
            $arr_catetype = array('news','article');
            if(isset($_REQUEST['catetype']) AND in_array($_REQUEST['catetype'],$arr_catetype))
            {
                $where  = " WHERE catetype='".$_REQUEST['catetype']."'";
                $assvar = $_REQUEST['catetype'];
            }
            else
            {
                $where  = "";
                $assvar = "";
            }
            $orders = $db->sql_numrows("SELECT * FROM ".CATEGORIES_TABLE." ".$where."") + 1;
            $template->assign_vars(array( 
                'ID'       => 0,
                'STATUS'   => true,
                'ORDERS'   => $orders,
                'CATETYPE' => $assvar,
                'QUERY'    => 'addnew',
            ));
            $title_page = get_admin_languages('add_new_category');
            $template->assign_vars(array(
                'CLASS_CATE' => ' class="active"',
                'CLASS_CATEA' => ' class="active"',
            ));
        }
        page_header($title_page);
        $template->set_filename('form-categorys.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    // active categorys
    public function active_categorys()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token'] = get_admin_languages('disable_category_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_category_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . CATEGORIES_TABLE . " SET `status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT);
    }
    /*---------------------------------------------------------------------------*/
    // delete categorys
    public function delete_categorys()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . CATEGORIES_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_category_successfully');
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