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
            set_config('defaultcatarticle',@$_POST['defaultcatarticle']);
            set_config('defaultcatnews',@$_POST['defaultcatnews']);
            set_config('per_page',@$_POST['per_page']);
            set_config('facebook',@$_POST['facebook']);
            set_config('twitter',@$_POST['twitter']);
            set_config('googleplus',@$_POST['googleplus']);
            set_config('sitekey',@$_POST['sitekey']);
            set_config('sitedesc',@$_POST['sitedesc']);
            set_config('gzip_compress',$this->get_form_status(@$_POST['gzip_compress']));
            header("Location:settings.php?mode=general&save=1");
        }
        $template->assign_vars(array(
            'ADMIN_SAVE'            => (intval(@$_GET['save'])) ? true : false ,
            'ADMIN_SITE_NAME'       => $config['sitename'],
            'ADMIN_SITE_TAGLINE'    => $config['description'],
            'ADMIN_SITE_URL'        => $config['siteurl'],
            'ADMIN_SITE_EMAIL'      => $config['sitemail'],
            'ADMIN_DEFAULTCAT_ART'  => $this->defaultcat($config['defaultcatarticle'],'article'),
            'ADMIN_DEFAULTCAT_NEW'  => $this->defaultcat($config['defaultcatnews'],'news'),
            'ADMIN_PER_PAGE'        => $config['per_page'],
            'ADMIN_SITEKEY'         => $config['sitekey'],
            'ADMIN_SITEDESC'        => $config['sitedesc'],
            'ADMIN_DATEFORMAT'      => $config['dateformat'],
            'ADMIN_FACEBOOK'        => $config['facebook'],
            'ADMIN_TWITTER'         => $config['twitter'],
            'ADMIN_GOOGLE'          => $config['googleplus'],
            'ADMIN_GZIP_COMPRESS'   => $config['gzip_compress'],
        ));
        $template->assign_vars(array(
            'CLASS_SETTINGG' => ' class="active"',
        ));
        page_header(get_admin_languages('general_setting'));
        $template->set_filename('settings-general.html');
        page_footer();
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
    public function defaultcat($id = '',$catetype ='article')
    {
        global $db;
        $result = $db->sql_query("SELECT * FROM ".CATEGORIES_TABLE." WHERE catetype='".$catetype."' ORDER BY id ASC");
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
          if ($templDir != "." && $templDir != ".." && $templDir != "index.php") {
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
        $template->set_filename('settings-themes.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
}    
?>