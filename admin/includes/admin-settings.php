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
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}

class admin_settings
{
    /*---------------------------------------------------------------------------*/
    /* index.php                                                                 */
    /*---------------------------------------------------------------------------*/
    // General
    public function index_general()
    {
        global $template, $db, $config;
        if(isset($_POST['query']) and $_POST['query'] == 'savesetting')
        {
            set_config('sitename',@$_POST['sitename']);
            set_config('description',@$_POST['description']);
            set_config('siteurl',@$_POST['siteurl']);
            set_config('sitemail',@$_POST['sitemail']);
            set_config('per_page',@$_POST['per_page']);
            set_config('per_popular',@$_POST['per_popular']);
            set_config('sitekey',@$_POST['sitekey']);
            set_config('sitedesc',@$_POST['sitedesc']);
            set_config('timezone_string',@$_POST['timezone_string']);
            set_config('dateformat',@$_POST['dateformat']);
            set_config('timeformat',@$_POST['timeformat']);
            set_config('gzip_compress',admin_get_form_status(@$_POST['gzip_compress']));
            header("Location:settings.php?mode=general&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'                => (intval(@$_GET['save'])) ? true : false ,
            'GET_DATEFORMAT'            => date($config['dateformat']),
            'GET_TIMEFORMAT'            => date($config['timeformat']),
            'ADMIN_LOCAL_TZONE'         => date('Y-m-d H:i:s'),
            'ADMIN_SITE_NAME'           => $config['sitename'],
            'ADMIN_SITE_TAGLINE'        => $config['description'],
            'ADMIN_SITE_URL'            => $config['siteurl'],
            'ADMIN_SITE_EMAIL'          => $config['sitemail'],
            'ADMIN_PER_PAGE'            => $config['per_page'],
            'ADMIN_PER_POPULAR'         => $config['per_popular'],
            'ADMIN_SITEKEY'             => $config['sitekey'],
            'ADMIN_SITEDESC'            => $config['sitedesc'],
            'ADMIN_TIMEZONE_OPTIONS'    => timezone_list($config['timezone_string']),
            'ADMIN_IS_TZONE'            => date('Y-m-d H:i:s'),
            'ADMIN_DATEFORMAT'          => $config['dateformat'],
            'ADMIN_TIMEFORMAT'          => $config['timeformat'],
            'ADMIN_GZIP_COMPRESS'       => $config['gzip_compress'],
            
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGG' => ' class="active"',
        ));
        page_header(get_admin_languages('general_setting'));
        $template->set_filename('settings/settings_general.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function index_socials()
    {
        global $template, $db, $config;
        if(isset($_POST['query']) and $_POST['query'] == 'savesetting')
        {
            set_config('facebook',@$_POST['facebook']);
            set_config('twitter',@$_POST['twitter']);
            set_config('googleplus',@$_POST['googleplus']);
            set_config('instagram',@$_POST['instagram']);
            set_config('youtube',@$_POST['youtube']);
            set_config('facebook_status',admin_get_form_status(@$_POST['facebook_status']));
            set_config('twitter_status',admin_get_form_status(@$_POST['twitter_status']));
            set_config('google_status',admin_get_form_status(@$_POST['google_status']));
            set_config('instagram_status',admin_get_form_status(@$_POST['instagram_status']));
            set_config('youtube_status',admin_get_form_status(@$_POST['youtube_status']));
            header("Location:settings.php?mode=socials&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'                => (intval(@$_GET['save'])) ? true : false ,
            'ADMIN_FACEBOOK'            => $config['facebook'],
            'ADMIN_TWITTER'             => $config['twitter'],
            'ADMIN_GOOGLE'              => $config['googleplus'],
            'ADMIN_INSTAGRAM'           => $config['instagram'],
            'ADMIN_YOUTUBE'             => $config['youtube'],
            'ADMIN_STATUS_FACEBOOK'     => $config['facebook_status'],
            'ADMIN_STATUS_TWITTER'      => $config['twitter_status'],
            'ADMIN_STATUS_GOOGLE'       => $config['google_status'],
            'ADMIN_STATUS_INSTAGRAM'    => $config['instagram_status'],
            'ADMIN_STATUS_YOUTUBE'      => $config['youtube_status'],
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGS' => ' class="active"',
        ));
        page_header(get_admin_languages('socials_setting'));
        $template->set_filename('settings/settings_socials.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function index_users()
    {
        global $template, $db, $config;
        if(isset($_POST['query']) and $_POST['query'] == 'savesetting')
        {
            set_config('userper_page',@$_POST['userper_page']);
            set_config('registration_status',admin_get_form_status(@$_POST['registration_status']));
            set_config('registration_activation',admin_get_form_status(@$_POST['registration_activation']));
            header("Location:settings.php?mode=users&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'                        => (intval(@$_GET['save'])) ? true : false ,
            'ADMIN_USERP_PER_PAGE'              => $config['userper_page'],
            'ADMIN_REGISTRATION_STATUS'         => $config['registration_status'],
            'ADMIN_REGISTRATION_ACTIVATION'     => $config['registration_activation']
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGU' => ' class="active"',
        ));
        page_header(get_admin_languages('users_setting'));
        $template->set_filename('settings/settings_users.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function index_emailtemplate()
    {
        global $template, $db, $config;
        if(isset($_POST['query']) and $_POST['query'] == 'update')
        {
            set_config($_POST['template'],stripslashes(sanitize_text(@$_POST['content'])));
            header("Location:settings.php?mode=emailtemplate&save=1");
        }
        $exmailer = 'mailer_';
        $mailer_templates = array(
            'header'                => 'Header',
            'footer'                => 'Footer',
            'contact'               => 'Contact Request',
            'register'              => 'Register Welcome',
            'register_activation'   => 'Register Activation',
            'forget_password'       => 'Forget Password',
            'forget_sucess'         => 'Forget Password sucess',
            'update_password'       => 'Update Password',
            
        );
        foreach( $mailer_templates as $key => $value)
        {
            $template->assign_block_vars('admin_loop_templates', array(
                'TITLE' => $value,
                'TEMPLATE' => $exmailer.$key
            ));
        }
        $template->assign_vars(array(
            'CLASS_SETTINGET' => ' class="active"',
            'THE_YEAR'       => date('Y'),
            'THE_TIME'       => date("F j, Y, g:i a", time()),
        ));
        if(isset($_REQUEST['action']) and isset($_REQUEST['template']))
        {
            $template->assign_vars(array(
                'CONTENT'  => $config[$_REQUEST['template']],
                'TEMPLATE' => $_REQUEST['template'],
            ));
            page_header(get_admin_languages('email_templates').' - '.$_REQUEST['template']);
            $template->set_filename('settings/settings_emailtemplate_form.html');
            page_footer();
        }
        else
        {
            page_header(get_admin_languages('email_templates'));
            $template->set_filename('settings/settings_emailtemplate.html');
            page_footer();
        }
    }
    /*---------------------------------------------------------------------------*/
    public function index_pages()
    {
        global $template, $db, $config;
        if(isset($_POST['query']) and $_POST['query'] == 'savesetting')
        {
            set_config('pagecontact',@$_POST['pagecontact']);
            set_config('pageabout',@$_POST['pageabout']);
            set_config('pageprivacy',@$_POST['pageprivacy']);

            set_config('pageknowledgebase',@$_POST['pageknowledgebase']);
            set_config('pagenews',@$_POST['pagenews']);
            set_config('pagefaq',@$_POST['pagefaq']);
            set_config('showpageusers',@$_POST['showpageusers']);
            set_config('showprofileusers',@$_POST['showprofileusers']);
            header("Location:settings.php?mode=pages&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'            => (intval(@$_GET['save'])) ? true : false ,
            'ADMIN_OPTIONS_PAGE_CONTACT'    => $this->get_option_pages($config['pagecontact']),
            'ADMIN_OPTIONS_PAGE_ABOUT'      => $this->get_option_pages($config['pageabout']),
            'ADMIN_OPTIONS_PAGE_PRIVACY'    => $this->get_option_pages($config['pageprivacy']),
            'ADMIN_PAGE_KNOW'               => $config['pageknowledgebase'],
            'ADMIN_PAGE_NEWS'               => $config['pagenews'],
            'ADMIN_PAGE_FAQ'                => $config['pagefaq'],
            'ADMIN_SHOW_PAGE_USERS'         => $config['showpageusers'],
            'ADMIN_SHOW_PROFILE_USERS'      => $config['showprofileusers'],
            
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGP' => ' class="active"',
        ));
        page_header(get_admin_languages('pages_setting'));
        $template->set_filename('settings/settings_pages.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    public function get_option_pages($id = '')
    {
        global $db;
        $result     = $db->sql_query("SELECT * FROM ".POSTS_TABLE." WHERE `post_type`='pages' ORDER BY id ASC");
        $option = '';
        while ($row = $db->sql_fetchrow($result)) 
        {
            if($id == $row['id'])
            {
                $sel = 'selected="selected"';
            }
            else
            {
                $sel = '';
            }
            $option .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['post_title'].'</option>';
        }
        return $option;
    }
    /*---------------------------------------------------------------------------*/
    public function getTemplates($dir, $site)
    {
      $getDir = dir($dir);
      $html = '';
      while (false !== ($templDir = $getDir->read())) {
          if ($templDir != "." && $templDir != ".." && $templDir != "index.php") {
              $selected = ($site == $templDir) ? " selected=\"selected\"" : "";
              $html .= "<option value=\"{$templDir}\"{$selected}>{$templDir}</option>\n";
          }
      }
      return $html;
      $getDir->close();
    }
    /*---------------------------------------------------------------------------*/
    public function defaultcat($id = '',$catetype ='news')
    {
        global $db;
        $result = $db->sql_query("SELECT * FROM ".TERMS_TABLE." WHERE type='".$catetype."' ORDER BY id ASC");
        $html  = '';
        if ($id == false)
        {
            $html .= '<option value="0" selected="selected">none</option>';
        }
        else
        {
            $html .= '<option value="0" >none</option>';
        }   
        while( $row = $db->sql_fetchrow($result) )
        {   
            if (!is_null($id) && $row['id'] == $id)
            {
                $sel = ' selected="selected" ';
            }
            else{
                $sel = '';
            }
    		$html .= '<option  value="'.$row['id'].'" '.$sel.'>'.$row['name'].'</option>';
        }
        return $html;
    }
    /*---------------------------------------------------------------------------*/
    public function get_themes($dir, $site)
    {
      global $config,$token;
      $getDir = dir($dir);
      $html = '';
      while (false !== ($templDir = $getDir->read())) {
          if ($templDir != "." && $templDir != ".." && $templDir != "index.php" && $templDir != "index.html") {
              $selected = ($site == $templDir) ?  1 : 0 ;
              $name = str_replace("_"," ",$templDir);
              $name = str_replace("-"," ",$name);
              $html .= '<li>';
              $html .= '<img src="../themes/'.$templDir.'/screenshot.png" class="" title="'.$name.'">';
              if($selected)
              {
                $html .= '
                <div class="theme-actions activate">
            		<strong>'.get_admin_languages('activate').'</strong>: '.$name.'
                ';
                $optionscolors;
                if(file_exists('../themes/'.$templDir.'/info_theme.php'))
                {
                    include('../themes/'.$templDir.'/info_theme.php');
                    $optionscolors = '<select name="themecolor" style="float: right;width: 100px;margin-top: -5px">';
                    foreach($arraycolor as $key => $value)
                    {
                        //
                        if(($config['themecolor'] == $key))
                        {
                            $optionscolors .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
                        }
                        else
                        {
                            $optionscolors .= '<option value="'.$key.'">'.$value.'</option>';
                        }
                            
                    }
                    $optionscolors .= '</select>';
                    
                    $html .= $optionscolors;
                }
                $html .= '</div>';
              }
              else
              {
                $html .= '
                <div class="theme-actions ">
            		<a class="btn btn-primary btn-small activate" href="settings.php?mode=themes&action=activate&themes='.$templDir.'&token='.$token.'">'.get_admin_languages('activate').'</a>
                    <p>'.$name.'</p>
            	</div>
                ';
              }
              $html .= '</li>';
              
          }
      }
      return $html;
      $getDir->close();
    }
    /*---------------------------------------------------------------------------*/
    public function index_themes()
    {
        global $template, $db, $config;
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'activate' && isset($_REQUEST['themes']))
        {
            if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
            {
                set_config('sitethemes',trim($_REQUEST['themes']));
                header("Location:settings.php?mode=themes&savetheme=1");
            }
        }
        $template->assign_vars(array(
            'ADMIN_SAVETHEME'       => (intval(@$_GET['savetheme'])) ? true : false ,
            'THEMENAME'             => $config['sitethemes'],
            'ADMIN_SITE_THEME'      => $this->get_themes('../themes/',$config['sitethemes']),
        ));
        if(isset($_POST['query']) and $_POST['query'] == 'savesetting')
        {
            set_config('themecolor',@$_POST['themecolor']);
            set_config('bg_color',@$_POST['bg_color']);
            set_config('bg_image',@$_POST['bg_image']);
            set_config('bg_logo',@$_POST['bg_logo']);
            set_config('bg_favicon',@$_POST['bg_favicon']);
            header("Location:settings.php?mode=themes&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'            => (intval(@$_GET['save'])) ? true : false ,
            'ADMIN_BG_COLOR'        => $config['bg_color'],
            'ADMIN_BG_IMAGE'        => $config['bg_image'],
            'ADMIN_BG_LOGO'         => $config['bg_logo'],
            'ADMIN_BG_FAVICON'      => $config['bg_favicon'],
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGT' => ' class="active"',
        ));
        page_header(get_admin_languages('themes_setting'));
        $template->set_filename('settings/settings_themes.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
    
}    
?>