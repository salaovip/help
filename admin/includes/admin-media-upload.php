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

class admin_media_upload
{
    public function set_header()
    {
        
        echo '
        <!DOCTYPE html>
        <!--[if IE 8]>
        <html xmlns="http://www.w3.org/1999/xhtml" class="ie8 "  lang="en-US">
        <![endif]-->
        <!--[if !(IE 8) ]><!-->
        <html xmlns="http://www.w3.org/1999/xhtml" class=""  lang="en-US">
        <!--<![endif]-->
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="assets/plugins/thickbox/bootstrap3.min.css" />
    	<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css"  />
    	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/plugins/thickbox/style-upload.css" />
        <link rel="stylesheet" href="assets/plugins/imgareaselect/imgareaselect.css" />
        <script src="assets/js/jquery.min.js"></script> 
        <script src="assets/plugins/thickbox/bootstrap3.min.js"></script> 
        <script src="assets/js/jquery.ui.custom.js"></script> 
        <script src="assets/plugins/thickbox/thickbox.min.js"></script>
        <script src="assets/plugins/thickbox/script.js"></script> 
        <script src="assets/plugins/thickbox/jquery.MultiFile.js"></script>
        <script src="assets/plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
        <script src="assets/plugins/plupload/moxie.min.js"></script>
        <script src="assets/plugins/plupload/plupload.full.min.js"></script>
        </head>
        <body style="background: #fff;">
        <div id="media-upload-header">
            <ul id="sidemenu">
            	'.$this->tabs().'
            </ul>
        </div>
        <div id="box_upload">
        ';
    }
    /*---------------------------------------------------------------------------*/
    public function set_footer()
    {
        echo '</div></body></html>';
    }
    /*---------------------------------------------------------------------------*/
    private function tabs()
    {
        global $referer;
        $tabs['type']       = 'From Computer';
        $tabs['url']        = 'From URL';
        $tabs['library']    = 'Media Library';
        if($referer == 'gallery')
        {
            $tabs['gallery']    = 'Gallery';
        }
        $html = '';
        foreach($tabs as $key => $val)
        {
            if( $_REQUEST['tab'] == $key ){ $class = 'class="current"'; }else{ $class = ''; }
            $html .= '<li><a href="media-upload.php?referer='.$referer.'&amp;type=image&amp;tab='.$key.'" '.$class.'>'.$val.'</a></li>';
        }
        return $html;
    }
    /*---------------------------------------------------------------------------*/
    public function media_upload_library() {
    	if ( !empty($_POST) ) {
    		$return = $this->media_upload_form_handler();
    	}
    }
    /*---------------------------------------------------------------------------*/
    public function media_upload_form_handler() {
        if ( isset($_POST['send']) ) {
    		$keys = array_keys($_POST['send']);
    		$send_id = (int) array_shift($keys);
    	}
    	if ( isset($send_id) ) {
            $result = mysql_query("SELECT * FROM ".ATTACHMENT_TABLE." WHERE `id`='".$send_id."'");
            $row = mysql_fetch_array($result);
    		return $this->media_send_to_editor('<img src="'.$row['url'].'" alt="'.$row['title'].'" class="" data-toggle="'.$send_id.'">');
    	}
    }
    /*---------------------------------------------------------------------------*/
    public function media_send_to_editor($html) {
    ?>
    <script type="text/javascript">
    /* <![CDATA[ */
    var win = window.dialogArguments || opener || parent || top;
    win.tb_remove();
    win.send_to_editor('<?php echo addslashes($html); ?>');
    /* ]]> */
    </script>
    <?php
    }
    /*---------------------------------------------------------------------------*/
}

?>