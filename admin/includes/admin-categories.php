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

class admin_categories
{
    
    
    public function index_terms($terms)
    {
        global $template, $db, $config, $token;
        if(isset($_REQUEST['action']) and $_REQUEST['action'] == 'edit' and isset($_GET['id']) and is_numeric($_GET['id']))
        {
            $action = true;
        }
        else
        {
            $action = false;
        }
        $this->form_terms($terms,$action);
        if(isset($_POST['query']) and $_POST['query'] == 'addnew')
        {
            $this->insert($terms);
        }
        elseif(isset($_POST['query']) and $_POST['query'] == 'update')
        {
            $this->update();
        }
        elseif(isset($_POST['query']) and $_POST['query'] == 'action')
        {
            if(isset($_POST['mark'])){$mark = $_POST['mark'];}else{$mark = false;}
            $this->terms_query_action($_POST['idx'],$_POST['order'],$mark,$_POST['action'],$_POST['token']);
        }       
        elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'activ')
        {
            $this->terms_active();
        }
        elseif(isset($_REQUEST['action']) and $_REQUEST['action'] == 'delete')
        {
            $this->terms_delete();
        }
        else
        {
            
        }
        
        
        
        $this->get_terms_loop($terms);
        page_header(get_admin_languages('categories'));
        $template->set_filename('categories/index_categories.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function get_terms_loop($terms)
    {
        global $template, $db, $config, $token;
        
        $result     = $db->sql_query("SELECT * FROM ".TERMS_TABLE." WHERE `type`='{$terms}' ORDER BY orders ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_categorie', array( 
                'ID'           => $row['id'],
                'NAME'         => $row['name'], 
                'SLUG'         => strtolower(urldecode($row['slug'])),
                'THUMBNAIL'    => get_terms_meta($row['id'],'thumbnail'),
                'DESCRIPTION'  => get_terms_meta($row['id'],'description'),
                'ORDERS'       => $row['orders'], 
                'STATUS'       => $row['status'], 
                'NUMPOSTS'     => get_count_post_terms($row['id'],$terms)
            )); 
        }
        
    }
    /*---------------------------------------------------------------------------*/
    public function form_terms($terms,$edit = false)
    {
        global $template, $db, $config;
        if($edit)
        {
            $id      = intval(@$_GET['id']);
            $result  = $db->sql_query("SELECT * FROM ".TERMS_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
            $row     = $db->sql_fetchrow($result);
            $template->assign_vars(array( 
                'ID'                => $row['id'],
                'NAME'              => $row['name'],
                'SLUG'              => strtolower(urldecode($row['slug'])),
                'FEATURED_IMAGE'    => get_terms_meta($row['id'],'thumbnail'),
                'DESCRIPTION'       => get_terms_meta($row['id'],'description'),
                'PARENT'            => $this->terms_parent_option($terms, $row['parent'],$row['id']),
                'ORDERS'            => $row['orders'],
                'STATUS'            => $row['status'],
                'QUERY'             => 'update',
                'TYPE_TERMS'        => $terms,
            )); 
            $title_page = get_admin_languages('edit_categorie').' `'.$row['name'].'`';
        }
        else
        {
            $orders = $db->sql_numrows("SELECT * FROM ".TERMS_TABLE." WHERE `type`='{$terms}'") + 1;
            $template->assign_vars(array( 
                'ID'                => 0,
                'SLUG'              => '',
                'FEATURED_IMAGE'    => false,
                'DESCRIPTION'       => '',
                'PARENT'            => $this->terms_parent_option($terms),
                'STATUS'            => true,
                'ORDERS'            => $orders,
                'QUERY'             => 'addnew',
                'TYPE_TERMS'        => $terms,
            ));
            $title_page = get_admin_languages('add_new_categorie');
        }
    }
    /*---------------------------------------------------------------------------*/
    public function insert($terms)
    {
        global $template, $db, $config;
        $post = array();
        $post = $_POST;
        $_SESSION['action_token'] = get_admin_languages('add_new_categorie');
        $status = get_form_status(@$post['status']);
        $sql_ins = array(
            'id'        => (int)'',
           	'name'      => security($post['name']),
            'slug'      => ($post['slug'])? security(preg_slug($post['slug'])) : security(preg_slug($post['name'])),
            'parent'    => (int)$post['parent'],
            'type'      => $terms,
            'orders'    => (int)$post['orders'],
            'status'    => (int)$status,
        );
        $sql     = 'INSERT INTO ' . TERMS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $id = $db->sql_nextid();
        $db->sql_freeresult($result);
        $this->set_terms_meta($id,'thumbnail',$post['featured_image']);
        $this->set_terms_meta($id,'description',$post['description']);
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
    public function update()
    {
        global $template, $db, $config;
        $post = array();
        $post = $_POST;
        $id   = $db->sql_escape($post['id']);
        $slug = ($post['slug'])? security(preg_slug($post['slug'])) : security(preg_slug($post['name']));
        $_SESSION['action_token'] = get_admin_languages('edit_categorie');
        $status = get_form_status(@$post['status']);
        $result = $db->sql_query("UPDATE " . TERMS_TABLE . " SET 
            `name`      = '".security($post['name'])."', 
            `slug`      = '".$slug."', 
            `parent`    = '".$post['parent']."',
            `orders`    = '".$post['orders']."', 
            `status`    = '".$status."'
             WHERE `id` = '" . $id . "'
        ");
        $db->sql_freeresult($result);
        $this->update_terms_meta($id,'thumbnail',$post['featured_image']);
        $this->update_terms_meta($id,'description',$post['description']);
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
    public function set_terms_meta($term_id, $meta_key, $meta_value)
    {
        global $db;
        $sql_ins = array(
                'meta_id'    => (int)'',
                'term_id'    => (int)$term_id,
               	'meta_key'   => security($meta_key),
                'meta_value' => security($meta_value),
        );
        $sql     = 'INSERT INTO ' . TERMSMETA_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, false);
        $result  = $db->sql_query($sql);
        $id = $db->sql_nextid();
        $db->sql_freeresult($result);
        return $id;
    }
    /*---------------------------------------------------------------------------*/
    public function update_terms_meta($term_id, $meta_key, $meta_value)
    {
        global $db;
        $result = $db->sql_query("UPDATE " . TERMSMETA_TABLE . " SET 
            `meta_value`  = '".security($meta_value)."' 
             WHERE `term_id` = '" . $term_id . "' and `meta_key` = '" . $meta_key . "'
        ");
        $db->sql_freeresult($result);
    }
    /*---------------------------------------------------------------------------*/
    public function terms_parent_option($type = '', $parent = '',$id = false)
    {
        global $db, $template;
        $sql = "SELECT id, name FROM ".TERMS_TABLE." WHERE `type`='{$type}' ORDER BY orders ASC";
        $result = $db->sql_query($sql);
        $options = '<option value="0" >'.get_admin_languages('none').'</option>';
        while($row = $db->sql_fetchrow($result))
        {
            
            if($parent and $parent == $row['id'])
            {
                $select = 'selected="selected"';
            }
            else
            {
                $select = '';
            }
            if($id and $row['id'] == $id)
            {
                
            }
            else
            {
                $options .= '<option value="'.$row['id'].'" '.$select.'>'.$row['name'].'</option>';
            }
            
        }
        return $options;
    }
    /*---------------------------------------------------------------------------*/
    public function terms_query_action($idx,$order,$checkbox,$action,$token)
    {
        global $db;
        if($token == $_SESSION['securitytokenadmincp'])
        {
            if($action == "orders"){
                $number = count($idx);
                for($i=0;$i<$number;$i++){
                    $id     = $idx[$i];
                    $orders = $order[$i];
                    $result = $db->sql_query("UPDATE " . TERMS_TABLE . " SET `orders`='".$orders."' WHERE `id`='".$db->sql_escape($id)."'"); 
                }
                $_SESSION['action_token'] = get_admin_languages('orders_categorie_successfully');
                @header("Location:".THIS_SCRIPT_RETURN."");
            }
            elseif($action == "delete"){
                if($checkbox)
                {
                    $number = count($checkbox);
                    for($i=0;$i<$number;$i++){
                        $id     = $checkbox[$i];
                        $result = $db->sql_query("DELETE FROM " . TERMS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
                    }
                    $_SESSION['action_token'] = get_admin_languages('delete_categorie_successfully');
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
                        $result = $db->sql_query("UPDATE " . TERMS_TABLE . " SET `status`='1' WHERE `id`='".$db->sql_escape($id)."'"); 
                    }
                    $_SESSION['action_token'] = get_admin_languages('enable_categorie_successfully');
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
                        $result = $db->sql_query("UPDATE " . TERMS_TABLE . " SET `status`='0' WHERE `id`='".$db->sql_escape($id)."'"); 
                    }
                    $_SESSION['action_token'] = get_admin_languages('disable_categorie_successfully');
                }
                else {$_SESSION['action_token'] = get_admin_languages('not_select_anything');}
                @header("Location:".THIS_SCRIPT_RETURN."");
            }
        }
    }
    /*---------------------------------------------------------------------------*/
    public function terms_active()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id         = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token']    = get_admin_languages('disable_categorie_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_categorie_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        $result = $db->sql_query("UPDATE " . TERMS_TABLE . " SET `status`='".$status."' WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
    public function terms_delete()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $result = $db->sql_query("DELETE FROM " . TERMS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_categorie_successfully');
        }
        else
        {
            
        }
        @header("Location:".THIS_SCRIPT_RETURN."");
    }
    /*---------------------------------------------------------------------------*/
}    
?>