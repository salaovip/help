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


class display
{
    /*--------------------------------------------------------------------------------------------*/
    public function global_vars()
    {
        global $template, $db, $config, $session;
        if(file_exists(''.TEMP_PATH.$config['sitethemes'].'/theme_options/theme_options.php'))
        {
            include(''.TEMP_PATH.$config['sitethemes'].'/theme_options/theme_options.php');
            get_option_theme();
        }
        $template->assign_vars(array(
            'COPYRIGHT'             => 'Copyright &copy; '.date('Y').' <a href="'.$config['siteurl'].'">'.$config['sitename'].'</a> All Rights Reserved. | Powered by: PHP Help manager v2.0',
            'COVER_BACKGROUND'      => $config['bg_image'],
            'COVER_COLOR'           => $config['bg_color'],
            'FAVICON'               => $config['bg_favicon'],
            'GET_URL_FACEBOOK'      => $config['facebook'],
            'GET_URL_TWITTER'       => $config['twitter'],
            'GET_URL_GOOGLE'        => $config['googleplus'],
            'GET_URL_INSTAGRAM'     => $config['instagram'],
            'GET_URL_YOUTUBE'       => $config['youtube'],
            'GET_STATUS_FACEBOOK'   => $config['facebook_status'],
            'GET_STATUS_TWITTER'    => $config['twitter_status'],
            'GET_STATUS_GOOGLE'     => $config['google_status'],
            'GET_STATUS_INSTAGRAM'  => $config['instagram_status'],
            'GET_STATUS_YOUTUBE'    => $config['youtube_status'],
            'NAV_HOME'              => '',
            'NAV_KNOW'              => '',
            'NAV_NEWS'              => '',
            'NAV_FAQ'               => '',
            'NAV_USERS'             => '',
            'NAV_CONTACT'           => '',
            'NAV_ABOUT'             => '',
            'NAV_PRIVACY'           => '',
            'CATEIDSET'             => false,
            'IS_NOTLOGIN'           => false,
            'IS_PROFILEUPDATE'      => false,
            'IS_NOTUPDATE'          => false,
            'IS_PASSWORDUPDATE'     => false,
            'IS_REGISTER'           => false,
            'IS_NOTREGISTER'        => false,
            'IS_GOLOGIN'            => false,
            'IS_PROFILE'            => false,
            'IS_EDIT_PROFILE'       => false,
            'IS_SIGN'               => false,
            'IS_LOGIN'              => false,
            'IS_FORGET'             => false,
            'IS_LOGOUT'             => false,
            'IS_FIELDLOGIN'         => false,
            'IS_NOTFORGET'          => false,
            'FORGET_FORM'           => false,
            'FORGET_SEND'           => false,
            'FORGET_SET_KEY'        => false,
            'IS_POWERFORGET'        => false,
            'FORGET_INVALID'        => false,
            'IS_NOT_RES_USERS'      => false,
            'USER_ID'               => false,
            'SHOW_FOOTER'           => true,
            'USER_GROUP'            => false,
            'IS_CRR_HOME'           => false,
            'IS_CRR_KNOW'           => false,
            'IS_CRR_NEWS'           => false,
            'IS_CRR_FAQ'            => false,
            'IS_CRR_USER'           => false,
            'CRUMB_KNOW'            => false,
            'CRUMB_NEWS'            => false,
            'SHOW_PAGINATION'       => false,
            'POST_TYPE'             => false,
            'IS_USER_PROFILE_CRR'   => false,
            'USER_STATUS'           => false,
        ));
    }
    /*--------------------------------------------------------------------------------------------*/
    public function global_temp()
    {
        global $template, $db, $config, $session;
        $this->get_assign_languages();
        
        
        if($config['showpageusers'] == 'noteveryone')
        {
            $template->assign_vars(array(
                'SHOW_PAGE_USERS'   => false,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'SHOW_PAGE_USERS'   => true,
            ));
        }
        if($session->get_session())
        {
            $userid = $session->get_account('id');
            $template->assign_vars(array(
                'IS_USER'           => true,
                'USER_ID'           => $userid,
                'USER_NAME'         => $session->get_account('username'),
                'USER_EMAIL'        => $session->get_account('email'),
                'USER_STATUS'       => $session->get_account('status'),
                'USER_FNAME'        => get_user_meta($userid,'firstname'),
                'USER_LNAME'        => get_user_meta($userid,'lastname'),
                'USER_WEBSITE'      => get_user_meta($userid,'website'),
                'USER_COVER'        => get_user_meta($userid,'cover'),
                'USER_FACEBOOK'     => get_user_meta($userid,'facebook'),
                'USER_TWITTER'      => get_user_meta($userid,'twitter'),
                'USER_GOOGLE'       => get_user_meta($userid,'google'),
                'USER_YOUTUBE'      => get_user_meta($userid,'youtube'),
                'USER_VIMEO'        => get_user_meta($userid,'vimeo'),
                'USER_FILCKR'       => get_user_meta($userid,'flickr'),
                'USER_DRIBBBLE'     => get_user_meta($userid,'dribbble'),
                'USER_PINTEREST'    => get_user_meta($userid,'pinterest'),
                'USER_IMG30'        => get_gravatar($userid,30),
                'USER_IMG50'        => get_gravatar($userid,50),
                'USER_IMG80'        => get_gravatar($userid,80),
                'USER_GROUP'        => get_user_meta($userid,'group'),
            ));
        }
        else
        {
            $template->assign_vars(array(
                'IS_USER'   => false,
            ));
        }
        $args_know = array(
            'post_type'     => 'knowledgebase',
            'assign_name'   => 'loop_popularknow',
            'limit'         => ($config['per_popular'])? $config['per_popular'] : '8',
        );
        get_assign_popular_posts($args_know);
        $args_news = array(
            'post_type'     => 'news',
            'assign_name'   => 'loop_popularnews',
            'limit'         => ($config['per_popular'])? $config['per_popular'] : '8',
        );
        get_assign_popular_posts($args_news);
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_home()
    {
        global $template, $db, $config, $session;
        
        $template->assign_vars(array(
            'IS_CRR_HOME'   => true,
        ));
        set_counter();
        page_header($this->get_languages('home'));
        $template->set_filename('index_body.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_knowledgebase()
    {
        global $template, $db, $config, $session;

        if($config['pageknowledgebase'] == 'useronly' and !$session->get_session())
        {
            $template->assign_vars(array(
                'IS_KNOW_USERS_ONLY'   => true,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'IS_KNOW_USERS_ONLY'   => false,
            ));
        }
        $page_url = '';
        if(isset($_REQUEST['term_id']))
        {
            $term_id  = $_REQUEST['term_id'];
            if(get_count_post_terms($term_id,'knowledgebase'))
            {
                $page_url = 'index.php?mode=knowledgebase&term_id='.$_REQUEST['term_id'].'&';
            }
            else
            {
                @header("Location:index.php?mode=knowledgebase");
            }
        }
        else
        {
            $term_id = false;
            $page_url = 'index.php?mode=knowledgebase&';
        }
        $args = array(
            'post_type'     => 'knowledgebase',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_knowledgebase',
            'page_url'      => $page_url,
            'term_id'       => $term_id,
        );
        get_assign_limit_posts($args);
        
        $args_terms = array(
            'term_type'     => 'knowledgebase',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_terms',
            'term_id'       => $term_id,
        );
        get_assign_terms($args_terms);
        $template->assign_vars(array(
            'IS_CRR_KNOW'   => true,
            'COUNT_POSTS'   => get_count_posts($args),
            'COUNT_TERMS'   => get_count_terms($args_terms),
            'THIS_TERM_ID'  => $term_id,
        ));
        set_counter();
        page_header($this->get_languages('knowledge_base'));
        $template->set_filename('index_knowledgebase.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_news()
    {
        global $template, $db, $config, $session;
        
        
        
        if($config['pagenews'] == 'useronly' and !$session->get_session())
        {
            $template->assign_vars(array(
                'IS_NEWS_USERS_ONLY'   => true,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'IS_NEWS_USERS_ONLY'   => false,
            ));
        }
        
        
        $page_url = '';
        if(isset($_REQUEST['term_id']))
        {
            $term_id = $_REQUEST['term_id'];
            if(get_count_post_terms($term_id,'news'))
            {
                $page_url = 'index.php?mode=news&term_id='.$_REQUEST['term_id'].'&';
            }
            else
            {
                @header("Location:index.php?mode=news");
            }
        }
        else
        {
            $term_id = false;
            $page_url = 'index.php?mode=news&';
        }
        $args = array(
            'post_type'     => 'news',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_news',
            'page_url'      => $page_url,
            'term_id'       => $term_id,
        );
        get_assign_limit_posts($args);
        $args_terms = array(
            'term_type'     => 'news',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_terms',
            'term_id'       => $term_id,
        );
        get_assign_terms($args_terms);
        $template->assign_vars(array(
            'IS_CRR_NEWS'   => true,
            'COUNT_POSTS'   => get_count_posts($args),
            'COUNT_TERMS'   => get_count_terms($args_terms),
            'THIS_TERM_ID'  => $term_id,
        ));
        set_counter();
        page_header($this->get_languages('news'));
        $template->set_filename('index_news.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_faq()
    {
        global $template, $db, $config, $session;
        
        if($config['pagefaq'] == 'useronly' and !$session->get_session())
        {
            $template->assign_vars(array(
                'IS_FAQ_USERS_ONLY'   => true,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'IS_FAQ_USERS_ONLY'   => false,
            ));
        }
        
        $page_url = '';
        if(isset($_REQUEST['term_id']))
        {
            $term_id  = $_REQUEST['term_id'];
            if(get_count_post_terms($term_id,'faq'))
            {
                $page_url = 'index.php?mode=faq&term_id='.$_REQUEST['term_id'].'&';
            }
            else
            {
                @header("Location:index.php?mode=faq");
            }
        }
        else
        {
            $term_id  = false;
            $page_url = 'index.php?mode=faq&';
        }
        $args = array(
            'post_type'     => 'faq',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_faq',
            'page_url'      => $page_url,
            'term_id'       => $term_id,
        );
        get_assign_limit_posts($args);
        $args_terms = array(
            'term_type'     => 'faq',
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_terms',
            'term_id'       => $term_id,
        );
        get_assign_terms($args_terms);
        $template->assign_vars(array(
            'IS_CRR_FAQ'    => true,
            'COUNT_POSTS'   => get_count_posts($args),
            'COUNT_TERMS'   => get_count_terms($args_terms),
            'THIS_TERM_ID'  => $term_id,
        ));
        set_counter();
        page_header($this->get_languages('faq'));
        $template->set_filename('index_faq.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_single()
    {
        global $template, $db, $config, $session;
        $post_id = intval(trim(paranoia($_GET['post_id'])));
        $args = array(
            'post_id'       => $post_id,
        );
        if(!$session->get_session() and get_post_meta($post_id, 'user_only',0))
        {
            $template->assign_vars(array(
                'SHOW_USER_ONLY'  => true,
            ));
        }
        else
        {
            $template->assign_vars(array(
                'SHOW_USER_ONLY'  => false,
            ));
        }
        get_assign_single_posts($args);
        $post_type = get_type_posts($args);
        $args_terms = array(
            'term_type'     => $post_type,
            'orderby'       => 'id',
            'orders'        => 'DESC',
            'assign_name'   => 'loop_terms',
        );
        get_assign_terms($args_terms);
        $term_id = get_term_id($args);
        $template->assign_vars(array(
            'COUNT_POSTS_TERM'  => get_count_posts_term($term_id),
            'COUNT_POSTS'       => get_count_posts( array( 'post_type' => $post_type ) ),
            'COUNT_TERMS'   => get_count_terms($args_terms),
        ));
        if($post_type == 'knowledgebase')
        {
            $template->assign_vars(array(
                'IS_CRR_KNOW'   => true,
                'CRUMB_KNOW'    => true,
            ));
            if($config['pageknowledgebase'] == 'useronly' and !$session->get_session())
            {
                $template->assign_vars(array('IS_SHOW_POST_USERS_ONLY'   => true,));
            }
            else
            {
                $template->assign_vars(array('IS_SHOW_POST_USERS_ONLY'   => false,));
            }
        }
        elseif($post_type == 'news')
        {
            if($config['pagenews'] == 'useronly' and !$session->get_session())
            {
                $template->assign_vars(array('IS_SHOW_POST_USERS_ONLY'   => true,));
            }
            else
            {
                $template->assign_vars(array('IS_SHOW_POST_USERS_ONLY'   => false,));
            }
            $template->assign_vars(array(
                'IS_CRR_NEWS'   => true,
                'CRUMB_NEWS'    => true,
            ));
        }
        set_counter();
        page_header(get_title_posts($args));
        $template->set_filename('index_single.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_search()
    {
        global $template, $db, $config, $session;
        $this->get_loop_posts_search(trim(sanitize($db->sql_escape($_GET['search']))));
        page_header($this->get_languages('search').'::'.trim($_GET['search']));
        $template->set_filename('index_search.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_contact()
    {
        global $template, $db, $config, $session;
        if(isset($_POST['action']) and $_POST['action'] == 'contact')
        {
            if($_POST['username'] == ''){
                $error1 = true;
            }
            else{
                $error1 = false;
            }
            
            if($_POST['email'] == ''){
                $error2 = true;
            }
            else{
                $error2 = false;
            }
            
            if($_POST['subject'] == ''){
                $error3 = true;
            }
            else{
                $error3 = false;
            }
            
            if($_POST['message'] == ''){
                $error4 = true;
            }
            else{
                $error4 = false;
            }
            
            if($error1 or $error2 or $error3 or $error4)
            {
                $template->assign_vars(array(
                    'MSGSEND'           => false,
                    'ERROR_USERNAME'    => $error1,
                    'ERROR_EMAIL'       => $error2,
                    'ERROR_SUBJECT'     => $error3,
                    'ERROR_MESSAGE'     => $error4,
                    'VAL_USERNAME'    => $_POST['username'],
                    'VAL_EMAIL'       => $_POST['email'],
                    'VAL_SUBJECT'     => $_POST['subject'],
                    'VAL_MESSAGE'     => $_POST['message'],
                ));
            }
            else
            {
                $data = array(
                    'username'  => $_POST['username'],
                    'email'     => $_POST['email'],
                    'subject'   => $_POST['subject'],
                    'message'   => str_replace("\n","<br>",$_POST['message']),
                );
                sendemail($data,'contact',$config['sitemail']);
                $template->assign_vars(array(
                    'MSGSEND'           => true,
                    'ERROR_USERNAME'    => false,
                    'ERROR_EMAIL'       => false,
                    'ERROR_SUBJECT'     => false,
                    'ERROR_MESSAGE'     => false,
                    'VAL_USERNAME'      => '',
                    'VAL_EMAIL'         => '',
                    'VAL_SUBJECT'       => '',
                    'VAL_MESSAGE'       => '',
                ));
            }  
        }
        else
        {
            $template->assign_vars(array(
                'MSGSEND'           => false,
                'ERROR_USERNAME'    => false,
                'ERROR_EMAIL'       => false,
                'ERROR_SUBJECT'     => false,
                'ERROR_MESSAGE'     => false,
                'VAL_USERNAME'      => '',
                'VAL_EMAIL'         => '',
                'VAL_SUBJECT'       => '',
                'VAL_MESSAGE'       => '',
            ));
        }
        get_assign_page($config['pagecontact']);
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_about()
    {
        global $template, $db, $config, $session;
        get_assign_page($config['pageabout']);
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_privacy()
    {
        global $template, $db, $config, $session;
        get_assign_page($config['pageprivacy']);
    }
    /*--------------------------------------------------------------------------------------------*/
    public function get_the_cate($id)
    {
        global $db;
        $result  = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE `id`='".$id."'");
        $row     = $db->sql_fetchrow($result);
        return $row;
    }
    
    /*--------------------------------------------------------------------------------------------*/
    public function get_loop_posts_search($text = false)
    {
        global $db, $config, $template, $session;
        
        
        
        if(!$text){@header("Location:index.php");}
        //
        $sql          = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' AND (`post_title` LIKE '%".$text."%' OR `post_content` LIKE '%".$text."%') and `post_type`!='faq' ORDER BY `post_modified` DESC";
        $page         = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
    	$limit        = $config['per_page'];
    	$startpoint   = ($page * $limit) - $limit;
        $result       = $db->sql_query_limit($sql,$limit,$startpoint);
        $total        = $db->sql_numrows($sql);
        $lastpage     = ceil($total/$limit);
        if($total){$template->assign_var('NOTFOUND',false);}
        else{$template->assign_var('NOTFOUND',true);}
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        if($lastpage < $page and $page and $total > $limit ){@header("Location:index.php");}
        while ($row = $db->sql_fetchrow($result)) 
        {    
            set_assign_loop_posts($row,'loop_posts_search');
        }
        
        $sql_news              = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' AND `post_title` LIKE '%".$text."%' and `post_type`='news'";
        $total_news            = $db->sql_numrows($sql_news);
        $sql_knowledgebase     = "SELECT * FROM ".POSTS_TABLE." WHERE `post_status`='1' AND `post_title` LIKE '%".$text."%' and `post_type`='knowledgebase'";
        $total_knowledgebase   = $db->sql_numrows($sql_knowledgebase);
        
        $template->assign_vars(array()); 
        $template->assign_vars(array(
            'PAGINATION'            => pagination($total,$limit,$page,'index.php?search='.$text.'&'),
            'ALL'                   => true,
            'SHOW_PAGINATION'       => $showpagination,
            'THISPAGE'              => $page,
            'OFPAGES'               => $lastpage,
            'NOTFOUND'              => $total,
            'COUNT_NEWS_POSTS'      => $total_news,
            'COUNT_KNOWLEDGE_POSTS' => $total_knowledgebase,
        ));
        
        

        
    }
    
    
    
    
    
    
    
    
    
    
    
    /*--------------------------------------------------------------------------------------------*/
    public function get_can_languages()
    {
        global $db,$template,$config;
        $sql    = "SELECT * FROM ".LANGS_TABLE." WHERE `defaultd`='1' LIMIT 1";
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        if($row['code'])
        {
            return $row['code'];
        }
        else
        {
            return 'en';
        }
    }
    /*--------------------------------------------------------------------------------------------*/
    public function get_languages($varname = '')
    {
        global $db,$template,$config;
        if($varname)
        {
            $sql    = "SELECT * FROM ".PHRASES_TABLE." WHERE `varname`='".$varname."' and `lang_iso`='".$this->get_can_languages()."'";
            $result = $db->sql_query($sql);
            $row    = $db->sql_fetchrow($result);
            if($row['text'])
            {
                return $row['text'];
            }
            else
            {
                return '----{Not Varname}----';
            }
        }
        else
        {
            return false;
        }
    }
    /*--------------------------------------------------------------------------------------------*/
    public function get_assign_languages()
    {
        global $template, $db, $config;
        if($this->get_can_languages())
        {
            $lang_iso = $this->get_can_languages();
        }
        else
        {
            $lang_iso = 'en';
        }
        $sql    = "SELECT * FROM ".PHRASES_TABLE." WHERE `lang_iso`='".$lang_iso."'";
        $result = $db->sql_query($sql);
        while($row = $db->sql_fetchrow($result))
        {
            $template->assign_var(strtoupper('LANG_'.$row['varname']),$row['text']);
        }
        $db->sql_freeresult($result);
    }
    
}
?>