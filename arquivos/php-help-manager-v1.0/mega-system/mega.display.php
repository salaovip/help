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
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|


class display
{
    /*--------------------------------------------------------------------------------------------*/
    public function global_vars()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'CATEIDSET'         => false,
            'COVER_BACKGROUND'  => $config['bg_image'],
            'COVER_COLOR'       => $config['bg_color'],
            'FAVICON'           => $config['bg_favicon'],
        ));
        
        $template->assign_vars(array(
            'NAV_HOME'          => '',
            'NAV_KNOW'          => '',
            'NAV_NEWS'          => '',
            'NAV_FAQ'           => '',
            'NAV_CONTACT'       => '',
            'NAV_ABOUT'         => '',
            'NAV_PRIVACY'       => '',
        ));
        // 
    }
    /*--------------------------------------------------------------------------------------------*/
    public function global_temp()
    {
        global $template, $db, $config, $session;
        $this->get_assign_languages();
        //------- Category article
        $result     = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='article' ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {    
            $totalarticle = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE `cid`='".$row['id']."' and posttype='article'");
            $template->assign_block_vars('loop_category_article', array( 
                'NAME'  => $row['name'], 
                'ID'    => $row['id'],
                'TOTAL' => $totalarticle,
            )); 
        }
        //------- Category news
        $result     = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='news' ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {    
            $totalarticle = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE `cid`='".$row['id']."' and posttype='news'");
            $template->assign_block_vars('loop_category_news', array( 
                'NAME'  => $row['name'], 
                'ID'    => $row['id'],
                'TOTAL' => $totalarticle,
            )); 
        }
        if(isset($_GET['catid']))
        {
            $template->assign_var('CATEIDSET',trim(paranoia($_GET['catid'])));
        }
        $total_category_art     = $db->sql_numrows("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='article' ORDER BY id ASC");
        $total_article          = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='article' ORDER BY id ASC");
        $total_category_post    = $db->sql_numrows("SELECT * FROM ".CATEGORIES_TABLE." WHERE status='1' and catetype='news' ORDER BY id ASC");
        $total_post             = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='news' ORDER BY id ASC");
        $total_faq              = $db->sql_numrows("SELECT * FROM ".POSTS_TABLE." WHERE status='1' and posttype='faq' ORDER BY id ASC");
        $template->assign_vars(array(
            'TOTAL_CAT_ART'         => $total_category_art,
            'TOTAL_ART'             => $total_article,
            'TOTAL_CAT_POST'        => $total_category_post,
            'TOTAL_POST'            => $total_post,
            'TOTAL_FAQ'             => $total_faq,
            'URL_FACEBOOK'          => $config['facebook'],
            'URL_TWITTER'           => $config['twitter'],
            'URL_GOOGLE'            => $config['googleplus'],
            'SITE_EMAIL'            => $config['sitemail'],
        ));
        
        
        
        
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_home()
    {
        global $template, $db, $config, $session;
        $sqlarticle     = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and posttype='article' ORDER BY views DESC LIMIT 6";
        $resultarticle  = $db->sql_query($sqlarticle);
        $totalarticle   = $db->sql_numrows($sqlarticle);
        while ($row     = $db->sql_fetchrow($resultarticle)) 
        {
            $template->assign_block_vars('loop_popular_article', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
            ));
        }
        $sqlnews        = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and posttype='news' ORDER BY views DESC LIMIT 6";
        $resultnews     = $db->sql_query($sqlnews);
        $totalnews      = $db->sql_numrows($sqlnews);
        while ($row     = $db->sql_fetchrow($resultnews)) 
        {
            $template->assign_block_vars('loop_popular_news', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
            ));
        }
        $template->assign_vars(array(
            'NAV_HOME'          => ' class="active"',
            'NOTFOUND_ART'      => $totalarticle,
            'NOTFOUND_NEWS'     => $totalnews,
        ));
        page_header($this->get_languages('home'));
        $template->set_filename('index_body.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_knowledgebase()
    {
        global $template, $db, $config, $session;
        $page           = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
        $page           = trim(paranoia($page));
    	$limit          = $config['per_page'];
    	$startpoint     = ($page * $limit) - $limit;
        $sql            = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and posttype='article' ORDER BY orders DESC "; 
        $result         = $db->sql_query_limit($sql,$limit,$startpoint);
        $total          = $db->sql_numrows($sql);
        $lastpage       = ceil($total/$limit);
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        while ($row = $db->sql_fetchrow($result)) 
        {
            $rowcate = $this->get_the_cate($row['cid']);
            $template->assign_block_vars('loop_article', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'VIEWS'         => $row['views'],
                'CATID'         => $row['cid'],
                'CATENAME'      => $rowcate['name'],
                'MODIFIED'      => date($config['dateformat'],$row['modified']),
                'BY'            => 'admins',
            ));
        }
        $template->assign_vars(array('PAGINATION'=> $this->pagination($total,$limit,$page,'index.php?page=knowledgebase&')));
        $template->assign_vars(array(
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
            'NOTFOUND'          => $total,
        ));
        $template->assign_vars(array(
            'NAV_CAT_ART'   => true,
            'NAV_CAT_NEW'   => false,
            'NAV_KNOW'      => ' class="active"',
        ));
        page_header($this->get_languages('knowledge_base'));
        $template->set_filename('index_knowledgebase.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_news()
    {
        global $template, $db, $config, $session;
        $page           = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
        $page           = trim(paranoia($page));
    	$limit          = $config['per_page'];
    	$startpoint     = ($page * $limit) - $limit;
        $sql            = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and posttype='news' ORDER BY orders DESC "; 
        $result         = $db->sql_query_limit($sql,$limit,$startpoint);
        $total          = $db->sql_numrows($sql);
        $lastpage       = ceil($total/$limit);
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        while ($row = $db->sql_fetchrow($result)) 
        {
            $rowcate = $this->get_the_cate($row['cid']);
            $template->assign_block_vars('loop_news', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'VIEWS'         => $row['views'],
                'CATID'         => $row['cid'],
                'CATENAME'      => $rowcate['name'],
                'MODIFIED'      => date($config['dateformat'],$row['modified']),
                'BY'            => 'admins',
            ));
        }
        $template->assign_vars(array('PAGINATION'=> $this->pagination($total,$limit,$page,'index.php?page=news&')));
        $template->assign_vars(array(
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
            'NOTFOUND'          => $total,
        ));
        $template->assign_vars(array(
            'NAV_CAT_ART'   => false,
            'NAV_CAT_NEW'   => true,
            'NAV_NEWS'      => ' class="active"',
        ));
        page_header($this->get_languages('news'));
        $template->set_filename('index_news.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_faq()
    {
        global $template, $db, $config, $session;
        $sql            = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and posttype='faq' ORDER BY orders DESC "; 
        $total          = $db->sql_numrows($sql);
        $result         = $db->sql_query($sql);
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('loop_faq', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'CONTENT'       => $row['content'], 
                'MODIFIED'      => date($config['dateformat'],$row['modified']),
            ));
        }
        $template->assign_vars(array(
            'NAV_CAT_ART'   => false,
            'NAV_CAT_NEW'   => false,
            'NAV_FAQ'       => ' class="active"',
            'NOTFOUND'      => $total,
        ));
        page_header($this->get_languages('faq'));
        $template->set_filename('index_faq.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_cate()
    {
        global $template, $db, $config, $session;
        $catid        = intval(trim(paranoia($_GET['catid'])));
        $page         = (int) (!isset($_GET["pages"]) ? 1 : $_GET["pages"]);
        $page         = trim(paranoia($page));
    	$limit        = $config['per_page'];
    	$startpoint   = ($page * $limit) - $limit;
        $sql          = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and `cid`='".$db->sql_escape($catid)."'  ORDER BY orders DESC "; 
        $result       = $db->sql_query_limit($sql,$limit,$startpoint);
        $total        = $db->sql_numrows($sql);
        $lastpage     = ceil($total/$limit);
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        $rowcate = $this->get_the_cate($catid);
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('loop_article', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'VIEWS'         => $row['views'],
                'CATID'         => $row['cid'],
                'CATENAME'      => $rowcate['name'],
                'MODIFIED'      => date($config['dateformat'],$row['modified']),
                'BY'            => 'admins',
            ));
        }
        $template->assign_vars(array('PAGINATION'=> $this->pagination($total,$limit,$page,'index.php?catid='.$catid.'&')));
        $template->assign_vars(array(
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
            'CATE_NAME'         => $this->get_the_cate($catid),
        )); 
        $rowcate = $this->get_the_cate($catid);
        $template->assign_vars(array(
            'NAV_CAT_ART'   => ($rowcate['catetype'] == 'article')? true: false,
            'NAV_CAT_NEW'   => ($rowcate['catetype'] == 'news')? true: false,
            'NOTFOUND'      => $total,
        ));
        if($rowcate['catetype'] == 'article')
        {
            $template->assign_vars(array(
                'NAV_KNOW'   => ' class="active"',
            ));
        }
        elseif($rowcate['catetype'] == 'news')
        {
            $template->assign_vars(array(
                'NAV_NEWS'   => ' class="active"',
            ));
        }
            
        
        page_header($rowcate['name']);
        $template->set_filename('index_cate.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_article()
    {
        global $template, $db, $config, $session;
        $articleid = intval(trim(paranoia($_GET['viewid'])));
        $sql    = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' and `id`='".$db->sql_escape($articleid)."'";
        $total  = $db->sql_numrows($sql);
        if(!$total)
        {
            header("Location:index.php");
        }
        $result2 = $db->sql_query("UPDATE " . POSTS_TABLE . " SET `views`=views+1 WHERE `id`='".$db->sql_escape($articleid)."'");
        $db->sql_freeresult($result2);
        $result = $db->sql_query($sql);
        $row    = $db->sql_fetchrow($result);
        $rowcate = $this->get_the_cate($row['cid']);
        $template->assign_vars(array( 
            'ID'            => $row['id'],
            'TITLE'         => $row['title'],
            'CONTENT'       => $row['content'], 
            'CATID'         => $row['cid'],
            'CATENAME'      => $rowcate['name'],
            'MODIFIED'      => date($config['dateformat'],$row['modified']),
            'VIEWS'         => $row['views'],
            'CATEIDSET'     => $row['cid'],
            'POST_IS_LIKES' => false,
            'POST_IS_FAVO'  => false,
        ));
        $template->assign_vars(array(
            'NAV_CAT_ART'   => ($row['posttype'] == 'article')? true:false,
            'NAV_CAT_NEW'   => ($row['posttype'] == 'news')? true:false,
        ));
        
        if($rowcate['catetype'] == 'article')
        {
            $template->assign_vars(array(
                'NAV_KNOW'   => ' class="active"',
            ));
        }
        elseif($rowcate['catetype'] == 'news')
        {
            $template->assign_vars(array(
                'NAV_NEWS'   => ' class="active"',
            ));
        }
        
        page_header($row['title']);
        $template->set_filename('index_article.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_search()
    {
        global $template, $db, $config, $session;
        $this->get_loop_posts_search(trim(paranoia($_GET['search'])));
        page_header($this->get_languages('search').'::'.trim(paranoia($_GET['search'])));
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
                $this->sendemail($data,'contact',$config['sitemail']);
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
        $template->assign_vars(array(
            'NAV_CONTACT'   => ' class="active"',
            'CONTENT'       => $config['pagecontact'],
        ));
        page_header($this->get_languages('contact'));
        $template->set_filename('index_contact.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_about()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'CONTENT'   => $config['pageabout'],
            'NAV_ABOUT' => ' class="active"',
        ));
        page_header($this->get_languages('about_us'));
        $template->set_filename('index_about.html');
        page_footer();
    }
    /*--------------------------------------------------------------------------------------------*/
    public function index_privacy()
    {
        global $template, $db, $config, $session;
        $template->assign_vars(array(
            'CONTENT'       => $config['pageprivacy'],
            'NAV_PRIVACY'   => ' class="active"',
        ));
        page_header($this->get_languages('privacy'));
        $template->set_filename('index_privacy.html');
        page_footer();
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
    public function pagination($total, $limit = 10,$page = 1, $url = '?'){
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
    /*--------------------------------------------------------------------------------------------*/
    public function get_loop_posts_search($text = false)
    {
        global $db, $config, $template, $session;
        if(!$text){@header("Location:index.php");}
        $sql          = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' AND `title` LIKE '%".$text."%' and posttype!='faq' ORDER BY `modified` DESC";
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
            $rowcate = $this->get_the_cate($row['cid']);
            $template->assign_block_vars('loop_article', array( 
                'ID'            => $row['id'],
                'TITLE'         => $row['title'], 
                'VIEWS'         => $row['views'],
                'CATID'         => $row['cid'],
                'POSTTYPE'      => $row['posttype'],
                'CATENAME'      => $rowcate['name'],
                'MODIFIED'      => date($config['dateformat'],$row['modified']),
            ));
        }
        $template->assign_vars(array('PAGINATION'=> $this->pagination($total,$limit,$page,'index.php?search='.$text.'&submit=search&'))); 
        $template->assign_vars(array(
            'ALL'               => true,
            'SHOW_PAGINATION'   => $showpagination,
            'THISPAGE'          => $page,
            'OFPAGES'           => $lastpage,
            'NOTFOUND'          => $total,
        ));
        $sql_news    = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' AND `title` LIKE '%".$text."%' and posttype='news'";
        $total_news  = $db->sql_numrows($sql_news);
        $sql_art     = "SELECT * FROM ".POSTS_TABLE." WHERE `status`='1' AND `title` LIKE '%".$text."%' and posttype='article'";
        $total_art   = $db->sql_numrows($sql_art);
        $template->assign_vars(array(
            'TOTAL_SEARCH_ART'    => $total_art,
            'TOTAL_SEARCH_NEWS'   => $total_news,
        ));
    }
    /*--------------------------------------------------------------------------------------------*/
    public function sendemail($data, $type, $to, $usersend = true, $adminsend = false)
    {
        global $db, $config, $template, $session;
        $rowheader  = $db->sql_fetchrow($db->sql_query("SELECT `content` FROM `emailtemplates` WHERE `name`='header' LIMIT 1"));
        $rowcontent = $db->sql_fetchrow($db->sql_query("SELECT `content` FROM `emailtemplates` WHERE `name`='".$type."' LIMIT 1"));
        $rowfooter  = $db->sql_fetchrow($db->sql_query("SELECT `content` FROM `emailtemplates` WHERE `name`='footer' LIMIT 1"));
        $ex_template['header']['content']  = $rowheader['content'];
        $ex_template['content']['content'] = $rowcontent['content'];
        $ex_template['footer']['content']  = $rowfooter['content'];
        if(isset($data['contact']))
        {
           $data['contact']         = nl2br(str_replace('\r\n', '<br />', $data['contact'])); 
        }
        foreach($data as $key => $value)
        {
            $data['{$time}']        = date("F j, Y, g:i a", time());
        	$data['{$'. $key . '}'] = $data[$key] ;
        	unset($data[$key]);
        }
        if($type == 'contact')                  { $title = 'contact'; }
        if($usersend)
        {
            $keys	     = array_keys($data);
            $value	     = array_values($data);
            $header	     = str_replace($keys, $value, $ex_template['header']['content']);
            $content     = str_replace($keys, $value, $ex_template['content']['content']);
            $footer      = str_replace($keys, $value, $ex_template['footer']['content']);
            $message     = $header .  $content . $footer;
            $from        = $config['sitemail'];
            $subject     = $title . ' - ' . $config['sitename'];
            $headers     = 'MIME-Version: 1.0' . "\r\n";
            $headers    .= 'Content-type: text/html; charset=utf8' . "\r\n";
            $headers    .= 'From: '.$config['sitename'].' <'.htmlentities($from).'>'."\r\n";
            @mail($to, $subject, $message, $headers);
        }
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
            return false;
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
                return str_replace("_"," ",$varname);
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