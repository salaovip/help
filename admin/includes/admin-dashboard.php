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

class admin_dashboard
{
    public function index_dashboard()
    {
        global $template, $db, $config, $token;
        
        $day    = date('d');
        $month  = date('m');
        $year   = date('Y');
        
        $template->assign_vars(array(
            'CLASS_DASHBOARD'           => 'class="active"',
            'STATISTICS_YEAR'           => date('Y'),
            'DASH_COUNT_USERS'          => $this->get_numrows(USERS_TABLE),
            'DASH_COUNT_KNOWLEDGE'      => $this->get_numrows(POSTS_TABLE,"WHERE `post_type`='knowledgebase'"),
            'DASH_COUNT_NEWS'           => $this->get_numrows(POSTS_TABLE,"WHERE `post_type`='news'"),
            'DASH_COUNT_FAQS'           => $this->get_numrows(POSTS_TABLE,"WHERE `post_type`='faq'"),
            'DASH_COUNT_KNOWLEDGE_PER'  => $this->get_post_pre('knowledgebase'),
            'DASH_COUNT_NEWS_PER'       => $this->get_post_pre('news'),
            'DASH_COUNT_FAQS_PER'       => $this->get_post_pre('faq'),
            'DASH_COUNT_VOTE'           => $this->get_numrows(VOTINGMETA_TABLE),
            'DASH_COUNT_VOTEUP'         => $this->get_numrows(VOTINGMETA_TABLE,"WHERE `meta_key`='up'"),
            'DASH_COUNT_VOTEDOWN'           => $this->get_numrows(VOTINGMETA_TABLE,"WHERE `meta_key`='down'"),
            'DASH_COUNT_VOTEUP_PER'         => $this->get_vote_pre('up'),
            'DASH_COUNT_VOTEDOWN_PER'       => $this->get_vote_pre('down'),//
            'DASH_COUNT_VISITS_YEAR'        => $this->get_numrows(COUNTER_TABLE,"WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y')='{$year}'"),
            'DASH_COUNT_VISITS_MONTH'       => $this->get_numrows(COUNTER_TABLE,"WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$month}'"),
            'DASH_COUNT_VISITS_DAY'         => $this->get_numrows(COUNTER_TABLE,"WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c%d')='{$year}{$month}{$day}'"),
            'DASH_COUNT_VISITS_MONTH_PER'   => $this->get_visits_pre('month'),
            'DASH_COUNT_VISITS_DAY_PER'     => $this->get_visits_pre('day'),
        ));
        $this->get_counter('posts');
        $this->get_counter('vote');
        $this->get_counter('visits');
        $this->get_counter('users');
        page_header(get_admin_languages('dashboard'));
        $template->set_filename('dashboard/dashboard.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function get_numrows($table, $where = '')
    {
        global $db;
        $sql = "SELECT * FROM {$table} {$where}";
        $num = $db->sql_numrows($sql);
        return ($num)? $num : '0';
    }
    /*---------------------------------------------------------------------------*/
    public function get_post_pre($post_type)
    {
        global $db;
        $total_post = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE."");
        $total_type = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE `post_type`='{$post_type}'");
        $per = ( $total_type / $total_post  ) * 100;
        return format_num($per,2);
    }
    /*---------------------------------------------------------------------------*/
    public function get_vote_pre($meta_key)
    {
        global $db;
        $total_vote = $db->sql_numrows("SELECT * FROM ".VOTINGMETA_TABLE."");
        $total_type = $db->sql_numrows("SELECT * FROM ".VOTINGMETA_TABLE." WHERE `meta_key`='{$meta_key}'");
        if($total_vote and $total_type)
        {
            $per = ( $total_type / $total_vote  ) * 100;
            return format_num($per,2);
        }
        else
        {
            return 0;
        }
            
    }
    /*---------------------------------------------------------------------------*/
    public function get_visits_pre($type, $day = false, $month = false, $year = false)
    {
        global $db;
        $day            = ($day)? $day : date('d');
        $month          = ($month)? $month : date('m');
        $year           = ($year)? $year : date('Y');
        $total_year     = $db->sql_numrows("SELECT * FROM ".COUNTER_TABLE." WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y')='{$year}'");
        $total_month    = $db->sql_numrows("SELECT * FROM ".COUNTER_TABLE." WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$month}'");
        $total_day      = $db->sql_numrows("SELECT * FROM ".COUNTER_TABLE." WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c%d')='{$year}{$month}{$day}'");
        if($type == 'month')
        {
            $per = ( $total_month / $total_year  ) * 100;
        }
        elseif($type == 'day')
        {
            $per = ( $total_day / $total_month  ) * 100;
        }
        return format_num($per,2);
    }
    /*---------------------------------------------------------------------------*/
    public function get_counter($type, $meta_key = array(), $day = false, $month = false, $year = false)
    {
        global $template, $db, $config;
        // COUNTER_TABLE // visits,users,voteup,votedown,knowledgebase,news,faqs
        $day        = ($day)? $day : date('d');
        $month      = ($month)? $month : date('m');
        $year       = ($year)? $year : date('Y');
        if($type == 'posts')
        {
            
            for($i = 1; $i <= 12; $i++) {
                $knowledgebase  = $this->get_numrows(POSTS_TABLE, " WHERE `post_type`='knowledgebase' and FROM_UNIXTIME(post_modified, '%Y%c')='{$year}{$i}' ");
                $news           = $this->get_numrows(POSTS_TABLE, " WHERE `post_type`='news' and FROM_UNIXTIME(post_modified, '%Y%c')='{$year}{$i}'");
                $faqs           = $this->get_numrows(POSTS_TABLE, " WHERE `post_type`='faq' and FROM_UNIXTIME(post_modified, '%Y%c')='{$year}{$i}'");
                
                $template->assign_block_vars('posts_loop_counter', array( 
                    'MONTH'     => $i,
                    'KNOWLEDGE' => $knowledgebase,
                    'NEWS'      => $news,
                    'FAQS'      => $faqs,
                )); 
            }
        }
        
        elseif($type == 'visits')
        {
            for($i = 1; $i <= 12; $i++) {
                $unique = $this->get_numrows(COUNTER_TABLE, " WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$i}' GROUP BY `ip`");
                $views  = $this->get_numrows(COUNTER_TABLE, " WHERE `meta_key`='visits' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$i}'");
                $template->assign_block_vars('visits_loop_counter', array( 
                    'MONTH'     => $i,
                    'UNIQUE'    => $unique,
                    'VIEWS'     => $views,
                )); 
            }
        }
        
        elseif($type == 'vote')
        {
            for($i = 1; $i <= 12; $i++) {
                $up     = $this->get_numrows(VOTINGMETA_TABLE, " WHERE `meta_key`='up' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$i}'");
                $down   = $this->get_numrows(VOTINGMETA_TABLE, " WHERE `meta_key`='down' and FROM_UNIXTIME(modified, '%Y%c')='{$year}{$i}'");
                $template->assign_block_vars('vote_loop_counter', array( 
                    'MONTH'     => $i,
                    'VOTEUP'    => $up,
                    'VOTEDOWN'  => $down,
                )); 
            }
        }
        
        elseif($type == 'users')
        {
            for($i = 1; $i <= 12; $i++) {
                $users    = $this->get_numrows(USERS_TABLE, " JOIN ".USERSMETA_TABLE."  ON (`meta_key`='signuptime') AND (`user_id`=`id`) 
                WHERE FROM_UNIXTIME(meta_value, '%Y%c')='{$year}{$i}'");
                $template->assign_block_vars('users_loop_counter', array( 
                    'MONTH'     => $i,
                    'USERS'    => $users,
                )); 
            }
        }
            
        
        
    }
    /*---------------------------------------------------------------------------*/
    public function index_profile()
    {
        global $template, $db, $config, $token, $acp_session;
        $uid = $acp_session->get_account('id');
        $template->assign_vars(array(
            'USER_UID'              => $uid,
            'USER_USERNAME'         => get_user_column($uid,'username'),
            'USER_FIRSTNAME'        => get_user_meta($uid,'firstname'),
            'USER_LASTNAME'         => get_user_meta($uid,'lastname'),
            'USER_EMAIL'            => get_user_column($uid,'email'),
            'USER_COVER'            => get_cover($uid),
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
        page_header(get_admin_languages('profile'));
        $template->set_filename('users/users_profile.html');
        page_footer();
    }
}    






?>