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

class admin_pages
{
    /*---------------------------------------------------------------------------*/
    /* pages.php                                                             */
    /*---------------------------------------------------------------------------*/
    // pages
    public function index_pages()
    {
        global $template, $db, $config, $token;
        $template->assign_vars(array(
            'CLASS_PAGES'   => ' class="active"',
        ));
        page_header(get_admin_languages('manage_pages'));
        $template->set_filename('pages.html');
        page_footer();
        
    }
    /*---------------------------------------------------------------------------*/
    // form pages
    public function form_pages()
    {
        global $template, $db, $config;
        if(isset($_REQUEST['page']) and $_REQUEST['page'] == 'contact')
        {
            $template->assign_vars(array( 
                'PAGE'     => 'contact',
                'CONTENT'  => $config['pagecontact'], 
            )); 
            $title_page = get_admin_languages('edit').' '.get_admin_languages('contact');
        }
        elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'about')
        {
            $template->assign_vars(array( 
                'PAGE'     => 'about',
                'CONTENT'  => $config['pageabout'], 
            )); 
            $title_page = get_admin_languages('edit').' '.get_admin_languages('about_us');
        }
        elseif(isset($_REQUEST['page']) and $_REQUEST['page'] == 'privacy')
        {
            $template->assign_vars(array( 
                'PAGE'     => 'privacy',
                'CONTENT'  => $config['pageprivacy'], 
            )); 
            $title_page = get_admin_languages('edit').' '.get_admin_languages('privacy');
        }
        else
        {
            @header("Location:pages.php");
        }
        $template->assign_vars(array(
            'CLASS_PAGES' => ' class="active"',
        ));
        page_header($title_page);
        $template->set_filename('form-pages.html');
        page_footer();
    }
    /*---------------------------------------------------------------------------*/
}    
?>