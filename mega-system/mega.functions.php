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
/*--------------------------------------------------------------------------------------------*/
function gethost(){
    $remoteIP = $_SERVER['REMOTE_ADDR'];
    if (strstr ($remoteIP, ', ')){
      $ips = explode (', ', $remoteIP);
      $remoteIP = $ips[0];
    }
    return gethostbyaddr($remoteIP);
}
/*--------------------------------------------------------------------------------------------*/
function get_post_meta($post_id, $meta_key, $return = false)
{
    global $db;
    $sql = "SELECT meta_value FROM ".POSTSMETA_TABLE." WHERE `meta_key`='{$meta_key}' AND `post_id`='{$post_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        return $row['meta_value'];
    }
    else
    {
        return $return;
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_assign_popular_posts($args = array())
{
    global $db;
    $sql    = "SELECT * FROM ".POSTS_TABLE." 
    JOIN ".POSTSMETA_TABLE." ON (`meta_key`='views') AND (`post_id`=`id`)
    WHERE `post_status`='1' and `post_type`='{$args['post_type']}' and `meta_key`='views' 
    ORDER BY ABS(`meta_value`) DESC 
    LIMIT {$args['limit']} ";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) 
    {
        set_assign_loop_posts($row,$args['assign_name']);
    }
}
/*--------------------------------------------------------------------------------------------*/
function set_assign_loop_posts($row,$assign_name = 'loop_posts')
{
    global $template, $db, $config, $session;
    $user_id = ($session->get_session())? $session->get_account('id') : '0';
    $assign = array( 
        'POST_ID'               => $row['id'],
        'POST_TITLE'            => $row['post_title'], 
        'POST_CONTENT'          => $row['post_content'], 
        'POST_TYPE'             => $row['post_type'], 
        'POST_COMMENT_STATS'    => $row['comment_status'],
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
        'VOTE_UP'               => is_post_vote( array( 'post_id' => $row['id'], 'action' => 'up', 'user_ip' => GET_IP, 'user_id' => $user_id ) ),
        'VOTE_DOWN'             => is_post_vote( array( 'post_id' => $row['id'], 'action' => 'down', 'user_ip' => GET_IP, 'user_id' => $user_id ) ),
        'POST_VOTE'             => get_post_vote($row['id']),
        'VOTE_COLOR'            => (get_post_vote($row['id']) >= 0)? true : false ,
    );
    if($assign_name)
    {
        $template->assign_block_vars($assign_name, $assign);
    }
    else
    {
        $template->assign_vars($assign);
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_assign_posts($args = array())
{
    global $template, $db, $config, $session;
    if($args['limit'])
    {
        $limit = " LIMIT {$args['limit']}";
    }
    else
    {
        $limit = "";
    }
    $sql    = "SELECT * FROM ".POSTS_TABLE." JOIN ".POSTSMETA_TABLE." ON (`meta_key`='pin_post') AND (`post_id`=`id`) WHERE `post_status`='1' and `post_type`='{$args['post_type']}' ORDER BY  meta_value DESC , {$args['orderby']} {$args['orders']} {$limit}";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) 
    {
        set_assign_loop_posts($row,$args['assign_name']);
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_assign_single_posts($args = array())
{
    global $template, $db, $config, $session;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' and `id`='{$args['post_id']}'";
    $total  = $db->sql_numrows($sql);
    
    if(!$total)
    {
        header("Location:index.php");
    }
    else
    {
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        set_assign_loop_posts($row, false);
        update_post_meta_view($args['post_id']);
    }  
}
/*--------------------------------------------------------------------------------------------*/
function get_assign_terms($args = array())
{
    global $template, $db, $config, $session;
    $sql    = "SELECT * FROM ".TERMS_TABLE." WHERE `status`='1' and `type`='{$args['term_type']}' ORDER BY {$args['orderby']} {$args['orders']}";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) 
    {
        if(get_count_post_terms($row['id'],$args['term_type']))
        {
            $template->assign_block_vars($args['assign_name'], array( 
                'TERM_ID'       => $row['id'],
                'TERM_NAME'     => $row['name'], 
                'TERM_SLUG'     => $row['slug'],
            ));
        }   
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_assign_limit_posts($args = array())
{
    global $template, $db, $config, $session;
    $page           = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
    $page           = trim(paranoia($page));
	$limit          = ($config['per_page'])? $config['per_page'] : 10;
	$startpoint     = ($page * $limit) - $limit;
    if(isset($args['term_id']) and $args['term_id'])
    {
        $sql    = "SELECT * FROM ".POSTS_TABLE." JOIN ".POSTSMETA_TABLE." ON (`meta_key`='pin_post') AND (`post_id`=`id`) WHERE `post_status`='1' and `post_type`='{$args['post_type']}' and `term_id`='{$args['term_id']}' ORDER BY meta_value DESC , {$args['orderby']} {$args['orders']}";
    }
    else
    {
        $sql    = "SELECT * FROM ".POSTS_TABLE." JOIN ".POSTSMETA_TABLE." ON (`meta_key`='pin_post') AND (`post_id`=`id`) WHERE `post_status`='1' and `post_type`='{$args['post_type']}' ORDER BY meta_value DESC , {$args['orderby']} {$args['orders']}";
    }
    $total          = $db->sql_numrows($sql);
    
    if($total)
    {
        $lastpage       = ceil($total/$limit);
        if($lastpage < $page )
        {
            @header("Location:index.php?mode={$args['post_type']}&pages={$lastpage}");
        }
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        $result = $db->sql_query_limit($sql,$limit,$startpoint);
        while ($row = $db->sql_fetchrow($result)) 
        {
            set_assign_loop_posts($row,$args['assign_name']);
        }
        $template->assign_vars(array('PAGINATION'=> pagination($total,$limit,$page,$args['page_url'])));
        $template->assign_vars(array(
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
            'NOTFOUND'          => $total,
        ));   
    }
         
}
/*--------------------------------------------------------------------------------------------*/
function get_title_posts($args = array())
{
    global $template, $db, $config, $session;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `id`='{$args['post_id']}'";
    $result = $db->sql_query($sql);
    $row    = $db->sql_fetchrow($result);
    return $row['post_title'];
}
/*--------------------------------------------------------------------------------------------*/
function get_type_posts($args = array())
{
    global $template, $db, $config, $session;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `id`='{$args['post_id']}'";
    $result = $db->sql_query($sql);
    $row    = $db->sql_fetchrow($result);
    return $row['post_type'];
}
/*--------------------------------------------------------------------------------------------*/
function get_post_vote($post_id)
{
    global $db;
    $sql = "SELECT vote FROM ".VOTING_TABLE." WHERE `post_id`='{$post_id}' LIMIT 1";
    $total_rows = $db->sql_numrows($sql);
	if ($total_rows)
    {
        $result = $db->sql_query($sql);
        $data = $db->sql_fetchrow($result);
        return $data['vote'];
    }
    else
    {
        return 0;
    }
}
/*--------------------------------------------------------------------------------------------*/
function is_post_vote($args = array(), $all = false)
{
    global $db;
    if($all)
    {
        $sql   = "SELECT * FROM ".VOTINGMETA_TABLE." WHERE `post_id`='{$args['post_id']}' and `meta_value`='{$args['user_ip']}' and `user_id`='{$args['user_id']}' LIMIT 1";
    }
    else
    {
        $sql   = "SELECT * FROM ".VOTINGMETA_TABLE." WHERE `post_id`='{$args['post_id']}' and `meta_key`='{$args['action']}' and `meta_value`='{$args['user_ip']}' and `user_id`='{$args['user_id']}' LIMIT 1";
    }
    $total = $db->sql_numrows($sql);
    return $total;
}
/*--------------------------------------------------------------------------------------------*/
function set_post_vote($args = array())
{
    global $db;
    $post_id = (int) $db->sql_escape($args['post_id']);
    $user_id = (int) $db->sql_escape($args['user_id']);
    $sql = "SELECT vote FROM ".VOTING_TABLE." WHERE `post_id`='{$post_id}' LIMIT 1";
    $total_rows = $db->sql_numrows($sql);
    
	if ($total_rows)
    {
        $result = $db->sql_query($sql);
        $data   = $db->sql_fetchrow($result);
        
        $sqlup = "SELECT user_id FROM ".VOTINGMETA_TABLE." WHERE `post_id`='{$post_id}' and `meta_key` IN('up','down') and  `user_id`='{$user_id}'";
        $totalup = $db->sql_numrows($sqlup);
        
        
        
        
        if ($args['action'] === 'up')
        {
			$vote = ++$data['vote'];
            ($totalup)?$vote = ++$vote:'';
		}
        else
        {
			$vote = --$data['vote'];
            ($totalup)?$vote = --$vote:'';
		}
		$db->sql_query("UPDATE ".VOTING_TABLE." SET `vote`='{$vote}' WHERE `post_id`='{$post_id}'");
        $db->sql_freeresult($result);
        $status = true;
	}
    else
    {
        $data['vote'] = 0;
        if ($args['action'] === 'up')
        {
			$vote = ++$data['vote'];
		}
        else
        {
			$vote = --$data['vote'];
		}
        $sql_ins = array(
            'id'       => (int)'',
            'post_id'  => $post_id,
            'vote'     => $vote
        );
        $sql     = 'INSERT INTO ' . VOTING_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        $status = false;
    }
    update_post_vote($args,$status);
}
/*--------------------------------------------------------------------------------------------*/
function update_post_vote($args = array(),$status = false)
{
    global $db;
    if(is_post_vote($args, true))
    {
        $result = $db->sql_query("UPDATE ".VOTINGMETA_TABLE." SET `meta_key`='{$args['action']}' WHERE `post_id`='{$args['post_id']}' and `user_id`='{$args['user_id']}' and `meta_value`='{$args['user_ip']}'");
        $db->sql_freeresult($result);
    }
    else
    {
        $sql_ins = array(
            'voting_id'     => (int)'',
            'post_id'       => $args['post_id'],
            'user_id'       => $args['user_id'],
            'meta_key'      => $args['action'],
            'meta_value'    => $args['user_ip'],
            'modified'      => time(),
        );
        $sql     = 'INSERT INTO ' . VOTINGMETA_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
    }
}
/*--------------------------------------------------------------------------------------------*/
function update_post_meta($post_id, $meta_key, $meta_value = '')
{
    global $db;
    $sql = "SELECT meta_value FROM ".POSTSMETA_TABLE." WHERE `meta_key`='{$meta_key}' AND `post_id`='{$post_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query("UPDATE " . POSTSMETA_TABLE . " SET  `meta_value`='{$meta_value}' WHERE `meta_key`='{$meta_key}' AND `post_id`='{$post_id}'");
        $db->sql_freeresult($result);
    }
    else
    {
        $sql_ins = array(
            'meta_id'       => (int)'',
            'post_id'       => (int)$post_id,
            'meta_key'      => $meta_key,
            'meta_value'    => $meta_value
        );
        $sql     = 'INSERT INTO ' . POSTSMETA_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
    }
}
/*--------------------------------------------------------------------------------------------*/
function update_post_meta_view($post_id)
{
    global $db;
    $sql = "SELECT meta_value FROM ".POSTSMETA_TABLE." WHERE `meta_key`='views' AND `post_id`='{$post_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query("UPDATE " . POSTSMETA_TABLE . " SET  `meta_value`=meta_value+1 WHERE `meta_key`='views' AND `post_id`='{$post_id}'");
        $db->sql_freeresult($result);
    }
    else
    {
        $sql_ins = array(
            'meta_id'       => (int)'',
            'post_id'       => (int)$post_id,
            'meta_key'      => 'views',
            'meta_value'    => (int)'1'
        );
        $sql     = 'INSERT INTO ' . POSTSMETA_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_term_id($args = array())
{
    global $db;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' and `id`='{$args['post_id']}'";
    $result = $db->sql_query($sql);
    $row    = $db->sql_fetchrow($result);
    return $row['term_id'];
}
/*--------------------------------------------------------------------------------------------*/
function get_count_posts_term($term_id)
{
    global $db;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' and `term_id`='{$term_id}'";
    $total  = $db->sql_numrows($sql);
    return $total;
}
/*--------------------------------------------------------------------------------------------*/
function get_count_posts($args = array())
{
    global $db;
    $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' and `post_type`='{$args['post_type']}'";
    $total  = $db->sql_numrows($sql);
    return $total;
}
/*--------------------------------------------------------------------------------------------*/
function get_count_terms($args = array())
{
    global $db;
    $sql    = "SELECT * FROM ".TERMS_TABLE." WHERE `status`='1' and `type`='{$args['term_type']}'";
    $total  = $db->sql_numrows($sql);
    return $total;
}
/*--------------------------------------------------------------------------------------------*/
function get_terms_meta($term_id, $meta_key)
{
    global $db;
    $sql = "SELECT meta_value FROM ".TERMSMETA_TABLE." WHERE `meta_key`='{$meta_key}' AND `term_id`='{$term_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        return $row['meta_value'];
    }
    else
    {
        return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_terms_info($term_id, $meta)
{
    global $db;
    $sql = "SELECT {$meta} FROM ".TERMS_TABLE." WHERE `id`='{$term_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        return $row[$meta];
    }
    else
    {
        return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_count_post_terms($term_id, $post_type = 'post')
{
    global $db;
    $sql    = "SELECT id FROM ".POSTS_TABLE." WHERE `term_id`='{$term_id}' AND  `post_type`='{$post_type}'";
    $count  = $db->sql_numrows($sql);
    return $count;
}
/*--------------------------------------------------------------------------------------------*/
function get_user_meta($user_id, $meta_key)
{
    global $db;
    $sql = "SELECT meta_value FROM ".USERSMETA_TABLE." WHERE `meta_key`='{$meta_key}' AND `user_id`='{$user_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        return $row['meta_value'];
    }
    else
    {
        return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function update_user_meta($user_id, $meta_key, $meta_value = '')
{
    global $db;
    $sql = "SELECT meta_value FROM ".USERSMETA_TABLE." WHERE `meta_key`='{$meta_key}' AND `user_id`='{$user_id}'";
    if($db->sql_numrows($sql))
    {
        $result = $db->sql_query("UPDATE " . USERSMETA_TABLE . " SET  `meta_value`='{$meta_value}' WHERE `meta_key`='{$meta_key}' AND `user_id`='{$user_id}'");
        $db->sql_freeresult($result);
    }
    else
    {
        $sql_ins = array(
            'meta_id'       => (int)'',
            'user_id'       => (int)$user_id,
            'meta_key'      => $meta_key,
            'meta_value'    => $meta_value
        );
        $sql     = 'INSERT INTO ' . USERSMETA_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_count_post_user($user_id, $post_type = 'post')
{
    global $db;
    if($post_type == 'post')
    {
        $sql    = "SELECT id FROM ".POSTS_TABLE." WHERE `post_author`='{$user_id}'";
    }
    else
    {
        $sql    = "SELECT id FROM ".POSTS_TABLE." WHERE `post_author`='{$user_id}' AND  `post_type`='{$post_type}'";
    }
    $count  = $db->sql_numrows($sql);
    return $count;
}
/*--------------------------------------------------------------------------------------------*/
function sanitize($string, $trim = false, $int = false, $str = false)
{
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
    if ($trim)
      $string = substr($string, 0, $trim);
    if ($int)
      $string = preg_replace("/[^0-9\s]/", "", $string);
    if ($str)
      $string = preg_replace("/[^a-zA-Z\s]/", "", $string);
    return $string;
}
/*--------------------------------------------------------------------------------------------*/
function sanitize_text( $string ) {
        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
        return $string;
}
/*--------------------------------------------------------------------------------------------*/
function preg_slug($title, $context = 'save')
{
    $title = strip_tags($title);
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    $title = str_replace('%', '', $title);
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }
    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    if ( 'save' == $context ) {
        $title = str_replace( array( '%c2%a0', '%e2%80%93', '%e2%80%94' ), '-', $title );
        $title = str_replace( array(
                '%c2%a1', '%c2%bf',
                '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
                '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
                '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
                '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
                '%c2%b4', '%cb%8a', '%cc%81', '%cd%81',
                '%cc%80', '%cc%84', '%cc%8c',
        ), '', $title );
        $title = str_replace( '%c3%97', 'x', $title );
    }
    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}
/*--------------------------------------------------------------------------------------------*/
function seems_utf8( $str ) {
    $length = strlen($str);
    for ($i=0; $i < $length; $i++) {
            $c = ord($str[$i]);
            if ($c < 0x80) $n = 0; // 0bbbbbbb
            elseif (($c & 0xE0) == 0xC0) $n=1; // 110bbbbb
            elseif (($c & 0xF0) == 0xE0) $n=2; // 1110bbbb
            elseif (($c & 0xF8) == 0xF0) $n=3; // 11110bbb
            elseif (($c & 0xFC) == 0xF8) $n=4; // 111110bb
            elseif (($c & 0xFE) == 0xFC) $n=5; // 1111110b
            else return false; // Does not match any model
            for ($j=0; $j<$n; $j++) { // n bytes matching 10bbbbbb follow ?
                    if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                            return false;
            }
    }
    return true;
}
/*--------------------------------------------------------------------------------------------*/
function utf8_uri_encode( $utf8_string, $length = 0 ) {
    $unicode = '';
    $values = array();
    $num_octets = 1;
    $unicode_length = 0;
    $string_length = strlen( $utf8_string );
    for ($i = 0; $i < $string_length; $i++ ) {
            $value = ord( $utf8_string[ $i ] );
            if ( $value < 128 ) {
                    if ( $length && ( $unicode_length >= $length ) )
                            break;
                    $unicode .= chr($value);
                    $unicode_length++;
            } else {
                    if ( count( $values ) == 0 ) {
                            if ( $value < 224 ) {
                                    $num_octets = 2;
                            } elseif ( $value < 240 ) {
                                    $num_octets = 3;
                            } else {
                                    $num_octets = 4;
                            }
                    }

                    $values[] = $value;

                    if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
                            break;
                    if ( count( $values ) == $num_octets ) {
                            for ( $j = 0; $j < $num_octets; $j++ ) {
                                    $unicode .= '%' . dechex( $values[ $j ] );
                            }

                            $unicode_length += $num_octets * 3;

                            $values = array();
                            $num_octets = 1;
                    }
            }
    }

    return $unicode;
}
/*--------------------------------------------------------------------------------------------*/
function get_form_status($status)
{
    if($status){return 1;}
    else{return 0;}
}
/*--------------------------------------------------------------------------------------------*/
function set_serialize($data)
{
    if(!is_serialized($data))
    {
        $serialize = serialize($data);
        return $serialize;
    }
    else
    {
        return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_unserialize($data)
{
    if(is_serialized($data))
    {
        $unserialize = unserialize($data);
        return $unserialize;
    }
    else
    {
        return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function is_serialized( $data, $strict = true ) {
	        // if it isn't a string, it isn't serialized.
	        if ( ! is_string( $data ) ) {
	                return false;
	        }
	        $data = trim( $data );
	        if ( 'N;' == $data ) {
	                return true;
	        }
	        if ( strlen( $data ) < 4 ) {
	                return false;
	        }
	        if ( ':' !== $data[1] ) {
	                return false;
	        }
	        if ( $strict ) {
	                $lastc = substr( $data, -1 );
	                if ( ';' !== $lastc && '}' !== $lastc ) {
	                        return false;
	                }
	        } else {
	                $semicolon = strpos( $data, ';' );
	                $brace     = strpos( $data, '}' );
	                // Either ; or } must exist.
	                if ( false === $semicolon && false === $brace )
	                        return false;
	                // But neither must be in the first X characters.
	                if ( false !== $semicolon && $semicolon < 3 )
	                        return false;
	                if ( false !== $brace && $brace < 4 )
	                        return false;
	        }
	        $token = $data[0];
	        switch ( $token ) {
	                case 's' :
	                        if ( $strict ) {
	                                if ( '"' !== substr( $data, -2, 1 ) ) {
	                                        return false;
	                                }
	                        } elseif ( false === strpos( $data, '"' ) ) {
	                                return false;
	                        }
	                        // or else fall through
	                case 'a' :
	                case 'O' :
	                        return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
	                case 'b' :
	                case 'i' :
	                case 'd' :
	                        $end = $strict ? '$' : '';
	                        return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
	        }
        return false;
}
/*--------------------------------------------------------------------------------------------*/
function get_userinfo($id,$type = '')
{
    global $db, $template;
    $result  = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$id."'");
    $user     = $db->sql_fetchrow($result);
    
    if($type == 'vars')
    {
        $template->assign_vars(array(
            'IN_USER_ID'            => $user['id'],
            'IN_USER_NAME'          => $user['username'],
            'IN_USER_EMAIL'         => $user['email'],
            'IN_USER_FNAME'         => get_user_meta($user['id'],'firstname'),
            'IN_USER_LNAME'         => get_user_meta($user['id'],'lastname'),
            'IN_USER_WEBSITE'       => get_user_meta($user['id'],'website'),
            'IN_USER_LOCATION'      => get_user_meta($user['id'],'location'),
            'IN_USER_FACEBOOK'      => get_user_meta($user['id'],'facebook'),
            'IN_USER_TWITTER'       => get_user_meta($user['id'],'twitter'),
            'IN_USER_GOOGLE'        => get_user_meta($user['id'],'google'),
            'IN_USER_YOUTUBE'       => get_user_meta($user['id'],'youtube'),
            'IN_USER_VIMEO'         => get_user_meta($user['id'],'vimeo'),
            'IN_USER_FILCKR'        => get_user_meta($user['id'],'flickr'),
            'IN_USER_DRIBBBLE'      => get_user_meta($user['id'],'dribbble'),
            'IN_USER_PINTEREST'     => get_user_meta($user['id'],'pinterest'),
            'IN_USER_COVER'         => get_cover($user['id']),
            'IN_USER_IMG20'         => get_gravatar($user['id'],20),
            'IN_USER_IMG30'         => get_gravatar($user['id'],30),
            'IN_USER_IMG80'         => get_gravatar($user['id'],80),
            'IN_USER_SHOW_PROFILE'  => get_user_meta($user['id'],'showprofile'),
            'IN_USER_TIMEAGO'       => get_timeago(get_user_meta($user['id'],'signuptime'))
        ));
    }
    else
    {
         return $user;
    }
}
/*--------------------------------------------------------------------------------------------*/
function get_user_column($id,$filed)
{
    global $db, $config, $template, $session;
    $result = $db->sql_query("SELECT ".$filed." FROM ".USERS_TABLE." WHERE `id`='".$id."'");
    $user   = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    return $user[$filed];
}
/*--------------------------------------------------------------------------------------------*/
function get_iduser_by_username($username)
{
    global $db, $template, $config, $session;
    $result = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `username`='".$db->sql_escape($username)."'");
    $user   = $db->sql_fetchrow($result);
    return $user['id'];
}
/*--------------------------------------------------------------------------------------------*/
function get_username_by_iduser($id)
{
    global $db, $template, $config, $session;
    $result = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$db->sql_escape($id)."'");
    $user   = $db->sql_fetchrow($result);
    return $user['username'];
}
/*--------------------------------------------------------------------------------------------*/
function get_info_user_by_pid_or_uid($pid = false,$uid = false)
{
    global $db, $config, $template, $session;
    if($uid)
    {
        $result2 = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$db->sql_escape($uid)."'");
        $date2   = $db->sql_fetchrow($result2);
    }
    else
    {
        $result1 = $db->sql_query("SELECT * FROM ".POSTS_TABLE." WHERE `id`='".$db->sql_escape($pid)."'");
        $date1   = $db->sql_fetchrow($result1);
        $result2 = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$db->sql_escape($date1['iduser'])."'");
        $date2   = $db->sql_fetchrow($result2);
    }
    return $date2;
}
/*--------------------------------------------------------------------------------------------*/
function get_gravatar( $id, $s = 80, $d = 'identicon', $r = 'g', $dir = '' ) {
    global $config, $session;

    $avatar = get_user_meta($id,'avatar');
    if($avatar)
    {
        $url = $dir.UPLOAD_USER_AVATARS_SPATH.$avatar;
        
    }
    elseif($config['gravatar'])
    {
        $user = get_userinfo($id,'array');
        $url  = 'http://www.gravatar.com/avatar/';
    	$url .= md5( strtolower( trim( $user['email'] ) ) );
    	$url .= "?s=$s&d=$d&r=$r";
    }
    else
    {
        $url = $dir.'assets/images/avatar.jpg';
    }
	return $url;
} 
/*--------------------------------------------------------------------------------------------*/
function get_cover($id,$dir = '') {
    global $config;
    $cover  = get_user_meta($id,'cover');
    if($cover)
    {
        $url = $dir.UPLOAD_USER_COVER_SPATH.$cover;
    }
    else
    {
        $url = 'assets/images/cover.jpg';
    }
	return $url;
} 
/*--------------------------------------------------------------------------------------------*/
function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;
    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }
    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );
    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
/*--------------------------------------------------------------------------------------------*/
function mega_mail($to, $subject, $message, $headers = '', $attachments = array() )
{
    global $db, $config, $template, $session, $phpmailer;
	if ( ! ( $phpmailer instanceof PHPMailer ) ) {
		require_once SYSTEM_DIR . '/mega.phpmailer.php';
		require_once SYSTEM_DIR . '/mega.smtp.php';
		$phpmailer = new PHPMailer( true );
	}
	$phpmailer->ClearAllRecipients();
	$phpmailer->ClearAttachments();
	$phpmailer->ClearCustomHeaders();
	$phpmailer->ClearReplyTos();
	if ( !isset( $from_email ) ) {
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );
		}
		$from_email = 'phphelp@' . $sitename;
	}
	$phpmailer->From = $from_email;
	$phpmailer->FromName = $config['sitename'];
	// Set destination addresses
	if ( !is_array( $to ) )
		$to = explode( ',', $to );

	foreach ( (array) $to as $recipient ) {
		try {
			// Break $recipient into name and address parts if in the format "Foo <bar@baz.com>"
			$recipient_name = '';
			if( preg_match( '/(.*)<(.+)>/', $recipient, $matches ) ) {
				if ( count( $matches ) == 3 ) {
					$recipient_name = $matches[1];
					$recipient = $matches[2];
				}
			}
			$phpmailer->AddAddress( $recipient, $recipient_name);
		} catch ( phpmailerException $e ) {
			continue;
		}
	}
	$phpmailer->Subject = $subject;
	$phpmailer->Body    = $message;
	$phpmailer->IsMail();
	$content_type = 'text/html';
	$phpmailer->ContentType = $content_type;
    $phpmailer->IsHTML( true );
	$phpmailer->CharSet = $config['charset'];
	try {
		return $phpmailer->Send();
	} catch ( phpmailerException $e ) {
		return false;
	}
}

function sendemail($data, $type, $to, $headers = '', $attachments = array())
{
    global $db, $config, $template, $session;
    $exmailer = 'mailer_';
    $ex_template['header']  = $config[$exmailer.'header'];
    $ex_template['content'] = $config[$exmailer.$type];
    $ex_template['footer']  = $config[$exmailer.'footer'];
    if(isset($data['contact']))
    {
       $data['contact']         = nl2br(str_replace('\r\n', '<br />', $data['contact'])); 
    }
    foreach($data as $key => $value)
    {
        $data['{$time}']        = date("F j, Y, g:i a", time());
        $data['{$year}']        = date("Y", time());
        $data['{$siteurl}']     = $config['siteurl'];
        $data['{$sitename}']    = $config['sitename'];
        $data['{$sitemail}']    = $config['sitemail'];
    	$data['{$'. $key . '}'] = $data[$key] ;
    	unset($data[$key]);
    }
    if($type == 'contact'){ $title = 'contact'; }
    elseif($type == 'register'){ $title = 'Welcome'; }
    elseif($type == 'forget_password'){ $title = 'Forget Password'; }
    elseif($type == 'forget_password_sucess'){ $title = 'Forget password'; }
    elseif($type == 'update_password'){ $title = 'Update Password'; }
    elseif($type == 'register_activation'){ $title = 'Activate Your '.$config['sitename'].' Account'; }
    else {$title = $config['sitename'];}
    
    $keys	     = array_keys($data);
    $value	     = array_values($data);
    $header	     = str_replace($keys, $value, $ex_template['header']);
    $content     = str_replace($keys, $value, $ex_template['content']);
    $footer      = str_replace($keys, $value, $ex_template['footer']);
    $message     = $header .  $content . $footer;
    mega_mail($to, $title, $message);
}
/*--------------------------------------------------------------------------------------------*/
function get_info_attachment($id)
{
    global $db, $config, $template, $session;
    $sql    = "SELECT * FROM ".ATTACHMENT_TABLE." WHERE  `id`='".$db->sql_escape($id)."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    return $row;
}
/*--------------------------------------------------------------------------------------------*/
function validate_dimensions($path,$width,$height)
{
    $image = getimagesize($path);
    if($image[0] >= $width){$output['w'] = true;}
    else{$output['w'] = false;}
    if($image[1] >= $height){$output['h'] = true;}
    else{$output['h'] = false;}
    return $output;
}
/*--------------------------------------------------------------------------------------------*/
function validatefile($path, $name, $allowed = array('png', 'jpg', 'gif', 'jpeg')) {
	$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	$image = getimagesize($path);
	$output['width'] = $image[0];
	$output['height'] = $image[1];
    $output['mime'] = str_replace('image/', '', $image['mime']);
	// Verify if the mime type and extensions are allowed
	if(in_array($output['mime'], $allowed) && in_array($ext, $allowed)) {
		$output['valid'] = 1;
	} else {
		$output['valid'] = 0;
	}
	return $output;
}
/*--------------------------------------------------------------------------------------------*/
function upload_file($file,$path = 'images/')
{
    global $db, $config, $template, $session;
    $ext          = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
    $validatefile = validatefile($_FILES[$file]['tmp_name'], $_FILES[$file]["name"]);
    
    if($validatefile['valid'])
    {
        $imagesname     = preg_replace('/[^\w\._]+/', '_', $_FILES[$file]["name"]);
        $images         = $session->get_account('username').'_'.mt_rand().'_'.time().'.'.$ext;
        $type           = strrchr(strtolower($images) ,'.');
		$fileext        = str_replace(".","",$type);
		$fileext        =  strtolower($fileext);
        // Move the file into the uploaded folder
        move_uploaded_file($_FILES[$file]['tmp_name'], 'uploads/' . $path . $images );
        $imgname        = $imagesname;
        $imgname        = str_replace(".".$fileext,"",$imagesname);
        $imgurl         = 'uploads/' . $path . $images;
        $imgsize        = $_FILES[$file]['size'];
        $imgtype        = $_FILES[$file]['type'];
        $default        = 1;
        $orders         = 1;
        $image_info     = getimagesize('uploads/' . $path . $images);
        $image_width    = $image_info[0];
        $image_height   = $image_info[1];
        $dimensions     = ''.$image_width.' × '.$image_height.'';
        $sql_ins2 = array(
            'id'             => (int)'',
            'title'          => $imgname,
            'typepost'       => 'post',
            'url'            => $imgurl,
            'thumbimage'     => $imgurl,
           	'time'           => (int)time(), 
            'size'           => (int)$imgsize, 
            'type'           => $imgtype,    
            'dimensions'     => $dimensions,
            'orders'         => (int)$orders,
            'status'         => (int)'1'
        );
        $sql     = 'INSERT INTO ' . ATTACHMENT_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins2, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        $id = $db->sql_nextid();
        $new_file = 'uploads/' . $path . $images;
        $stat = stat( dirname( $new_file ));
    	$perms = $stat['mode'] & 0000666;
    	@ chmod( $new_file, $perms );
        $atr = array('id' => $id, 'imgurl' => $imgurl, 'imgw' => $image_width, 'imgh' => $image_height);
        return $atr;
    }
    else
    {
         $atr = array('id' => false, 'imgurl' => false, 'imgw' => false, 'imgh' => false);
         return $atr;
    }
}
/*--------------------------------------------------------------------------------------------*/
function upload_file_array($file,$i = '',$path = 'images/')
{
    global $db, $config, $template, $session;
    $ext          = pathinfo($_FILES[$file]['name'][$i], PATHINFO_EXTENSION);
    $validatefile = validatefile($_FILES[$file]['tmp_name'][$i], $_FILES[$file]["name"][$i]);
    if($validatefile['valid'])
    {
        $imagesname     = preg_replace('/[^\w\._]+/', '_', $_FILES[$file]["name"][$i]);
        $images         = $session->get_account('username').'_'.mt_rand().'_'.time().'.'.$ext;
        $type           = strrchr(strtolower($images) ,'.');
		$fileext        = str_replace(".","",$type);
		$fileext        =  strtolower($fileext);
        // Move the file into the uploaded folder
        move_uploaded_file($_FILES[$file]['tmp_name'][$i], 'uploads/' . $path . $images );
        $imgurl         = 'uploads/' . $path . $images;
        $stat = stat( dirname( $imgurl ));
    	$perms = $stat['mode'] & 0000666;
    	@ chmod( $imgurl, $perms );
        return $imgurl;
    }
    else
    {
         return false;
    }
}
/*--------------------------------------------------------------------------------------------*/
function pagination($total, $limit = 10,$page = 1, $url = '?'){
    global $db,$config;
    $adjacents  = "2";
	$page       = ($page == 0 ? 1 : $page);
	$start      = ($page * $limit) - $limit;
	$prev       = $page - 1;
	$next       = $page + 1;
    $lastpage   = ceil($total/$limit);
	$lpm1       = $lastpage - 1;
    $pagination = '';
	if($lastpage > 1)
	{
		if ($lastpage < 7 + ($adjacents * 2))
		{
            for ($counter = 1; $counter <= $lastpage; $counter++)
			{
                if($counter == $page){$pagination.= "<li class='active'><span class='page-numbers active'>$counter</span></li>";}
				else{$pagination.= "<li><a class='page-numbers' href='{$url}pages=$counter'>$counter</a></li>";}
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
			
            if($page < 1 + ($adjacents * 2))
			{
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if($counter == $page){$pagination.= "<li class='active'><span class='page-numbers active'>$counter</span></li>";}
					else{$pagination.= "<li><a class='page-numbers' href='{$url}pages=$counter'>$counter</a></li>";}
				}
				$pagination.= '<li><span class="page-numbers dots">…</span></li>';
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=$lastpage'>$lastpage</a></li>";
			}
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
                $pagination.= "<li><a class='page-numbers' href='{$url}pages=1'>1</a></li>";
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=2'>2</a></li>";
				$pagination.= '<li><span class="page-numbers dots">…</span></li>';
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if($counter == $page){$pagination.= "<li class='active'><span class='page-numbers active'>$counter</span></li>";}
					else{$pagination.= "<li><a class='page-numbers' href='{$url}pages=$counter'>$counter</a></li>";}
				}
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=$lastpage'>$lastpage</a></li>";
			}
			else
			{
                $pagination.= "<li><a class='page-numbers' href='{$url}pages=1'>1</a></li>";
				$pagination.= "<li><a class='page-numbers' href='{$url}pages=2'>2</a></li>";
				$pagination.= '<li><span class="page-numbers dots">…</span></li>';
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if($counter == $page){$pagination.= "<li class='active'><span class='page-numbers active'>$counter</span></li>";}
					else{$pagination.= "<li><a class='page-numbers' href='{$url}pages=$counter'>$counter</a></li>";}
				}
			}
		}
	}
    return $pagination;
}




function remote_get_contents($url)
{
    if (function_exists('curl_get_contents') AND function_exists('curl_init')) {
        return curl_get_contents($url);
    } else {
        return file_get_contents($url);
    }
}

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function purchase_code($code)
{
    $object = remote_get_contents('http://fc2.luxsys-apps.com/check/xml.php?code=' . $code);
    $object = json_decode($object);
    return $object;
}



function remove_temp_upload($filename, $id = false)
{
    global $db;
    if (file_exists($filename))
    {
        if($id)
        {
            $result = $db->sql_query("DELETE FROM " . ATTACHMENT_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
        }
        unlink($filename);
    }
}
function format_num($num,$dd = 2)
{
     return number_format((float)$num, $dd, '.', ',');
}
/*--------------------------------------------------------------------------------------------*/
function set_counter($meta_key = 'visits')
{
    global $db;
     $sql_ins = array(
        'id'        => (int)'',
        'meta_key'  => $meta_key,
        'ip'        => GET_IP,
        'modified'  => time(),
    );
    $sql     = 'INSERT INTO ' . COUNTER_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
    $result  = $db->sql_query($sql);
    $db->sql_freeresult($result);
}




function get_assign_page($page_id)
{
    global $template, $db, $config, $session, $display;
    
    $sql = "SELECT * FROM ".POSTS_TABLE." WHERE `post_type`='pages' AND `id`='{$page_id}'";
    if($db->sql_numrows($sql))
    {
        set_counter();
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $template->assign_vars(array(
            'POST_TITLE'    => $row['post_title'],
            'POST_CONTENT'  => $row['post_content'],
        ));
        update_post_meta_view($page_id);
        $temp_page = get_post_meta($page_id,'page_template',false);
        if($temp_page == 'normal')
        {
            $set_filename = 'index_page.html';
        }
        elseif($temp_page == 'contact')
        {
            $set_filename = 'index_contact.html';
        }
        else
        {
            header("Location:index.php");
        }
        page_header($row['post_title']);
        $template->set_filename($set_filename);
        page_footer();
    }
    else
    {
        header("Location:index.php");
    }
}
?>