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
ob_start();
require_once('./acp-load.php');
if( ! defined('IN_MEGATPL_CP')) exit();
$acp_session->get_sessioncp();

include(INCPATHACP.'admin-media-upload.php');
$admin_media_upload = new admin_media_upload();
define('THIS_SCRIPT', 'media-upload.php');
$admin_media_upload->media_upload_library();

if(!isset($_REQUEST['action']))
{
    $token = securitytokenadmincp();
    $_SESSION['securitytokenadmincp'] = $token;
    $template->assign_vars(array( 
        'TOKEN' => $token,
    )); 
}



if(isset($_REQUEST['tab']))
    {
        if($_REQUEST['tab'] == 'type')
        {
            $li_library = '';
            $li_url     = '';
            $li_type    = ' class="current"';
        }
        elseif($_REQUEST['tab'] == 'url')
        {
            $li_library = '';
            $li_url     = ' class="current"';
            $li_type    = '';
        }
        elseif($_REQUEST['tab'] == 'library')
        {
            $li_library = ' class="current"';
            $li_url     = '';
            $li_type    = '';
        }
        else
        {
            $li_library = '';
            $li_url     = '';
            $li_type    = ' class="current"';
        }
        $tab = $_REQUEST['tab'];
    }
    else
    {
        $tab = 'type';
        $li_library = '';
        $li_url     = '';
        $li_type    = ' class="current"';
    }



$admin_media_upload->set_header();




if(isset($_POST['save']) and $_POST['save'] == 'save')
{

    $nimg = $_FILES["async_upload"]["name"];
    @$filename = $_FILES["async_upload"]["name"];
 	@$filetype = $_FILES["async_upload"]['type'];
 	@$filesize = $_FILES["async_upload"]['size']/1000;
 	@$filetmp  = $_FILES["async_upload"]['tmp_name'] ;
    if($filename != '' OR $filetype != '' OR $filesize != '' OR $filetmp != '')
    {
        $imagesname = preg_replace('/[^\w\._]+/', '_', $_FILES["async_upload"]["name"]);
        $images = $imagesname;
        $type  = strrchr(strtolower($images) ,'.');
		$fileext  = str_replace(".","",$type);
		$fileext  =  strtolower($fileext);
        move_uploaded_file($_FILES['async_upload']['tmp_name'], '../uploads/site/' . $images );
        $imgname  = $imagesname;
        $imgname  = str_replace(".".$fileext,"",$imagesname);
        $imgurl   = $config['siteurl'].'uploads/site/'.$images;
        $imgsize  = $_FILES['async_upload']['size'];
        $imgtype  = $_FILES['async_upload']['type'];
        $default  = 1;
        $orders   = 1;
        $image_info = getimagesize('../uploads/site/'.$images);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        $dimensions = ''.$image_width.' × '.$image_height.'';
        $sql_ins2 = array(
            'id'             => (int)'',
            'title'          => $imgname,
            'typepost'       => 'site',
            'url'            => $imgurl,
            'thumbimage'     => $imgurl,
           	'time'           => (int)time(), 
            'size'           => (int)$imgsize, 
            'type'           => $imgtype,    
            'dimensions'     =>  $dimensions,
            'orders'         => (int)$orders,
            'status'         => (int)'1'
        );
        $sql     = 'INSERT INTO ' . ATTACHMENT_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins2, false);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
        $id = $db->sql_nextid();
        $idarray  = $id;
        $new_file = '../uploads/site/' . $images;
        $stat = stat( dirname( $new_file ));
    	$perms = $stat['mode'] & 0000666;
    	@ chmod( $new_file, $perms );
    }
    


    $idarray = explode(',',$idarray);
    
    $result = mysql_query("SELECT * FROM ".ATTACHMENT_TABLE."");
    echo '<form enctype="multipart/form-data" method="post" action="media-upload.php?type=image&#038;tab=library" class="media-upload-form validate" id="library-form">
    <div class="accordion-group widget-box">';
    while($row = mysql_fetch_array($result))
    {
        if(in_array($row['id'],$idarray))
        {
            
            echo '
                <div class="accordion-heading">
                  <a data-parent="#collapse-group" href="#collapse'.$row['id'].'" data-toggle="collapse"><div class="widget-title"><img src="'.$row['url'].'" alt="" class="thumbnail_s"><h5>'.$row['title'].'</h5></div></a>
                </div>
                <div class="collapse accordion-body" id="collapse'.$row['id'].'">
                  <div class="widget-content">
                      <img src="'.$row['url'].'" alt="" id="img'.$row['id'].'" class="thumbnail_x">
                      <div class="delete-tihs">
                            <a href="media-upload.php?referer=image&amp;type=image&amp;tab=library&amp;action=delete&amp;id='.$row['id'].'" class="btn btn-danger">Delete Image</a>
                      </div>
                      <div class="info">
                          <strong>File name</strong>: '.$row['title'].'<br />
                          <strong>File type</strong>: '.$row['type'].'<br />
                          <strong>File Size</strong>: '.round(($row['size']/1024),0).' KB<br />
                          <strong>Dimensions</strong>: '.$row['dimensions'].'<br />
                          <strong>Upload date</strong>: '.date('j F Y',$row['time']).'<br />
                          <input type="submit"  name="send['.$row['id'].']" id="send['.$row['id'].']" class="btn btn-info" style="margin-top:6px" value="Use this image">
                      </div>
                      <div style="clear:both;"></div>
                  </div>
                </div>
            ';
        }
            
    }
    @mysql_free_result($result);
    echo '</div></form>'.close_tb();
}
else
{
    if($tab == 'type')
    {
        get_type();
    }
    elseif($tab == 'url')
    {
        gt_url('url');
    }
    elseif($tab == 'library')
    {
        gt_library('library');
    }
}

$admin_media_upload->set_footer();







function gt_url($typein = '')
{
    echo '
    <form enctype="multipart/form-data" method="post" action="media-upload.php?referer=portfolio&type=image&tab=url" class="media-upload-form type-form validate" id="image-form">
        <h3 class="media-title">Insert media from another website</h3>
        <div id="media-items">
            <div class="media-item media-blank">
            	<table class="describe ">
                <tbody>
            		<tr>
            			<th scope="row" class="label" style="width:130px;">
            				<label for="src"><span class="alignleft">URL</span></label>
            				<span class="alignright"><abbr id="status_img" title="required" class="required">*</abbr></span>
            			</th>
            			<td class="field"><input id="src" name="src" value="" type="text" aria-required="true" class="multi form-control" onblur="addExtImage.getImageData()"></td>
            		</tr>
                    <tr class="not-image">
            			<td colspan="2" style="padding: 5px"></td>
            		</tr>
            		<tr>
            			<th scope="row" class="label">
            				<label for="title"><span class="alignleft">Title</span></label>
            				<span class="alignright"><abbr title="required" class="required">*</abbr></span>
            			</th>
            			<td class="field"><input id="title" name="title" value="" type="text" class="multi form-control" aria-required="true"></td>
            		</tr>
            		<tr class="not-image">
            			<td colspan="2" style="padding: 5px">
            			</td>
            		</tr>
                    <tr class="not-image">
            			<td></td>
            			<td>
            				<input type="hidden" name="get_url" value="get_url">
                            <input type="submit" name="insertonlybutton" id="insertonlybutton" class="btn btn-info" value="Use this image">
            			</td>
            		</tr>
                    <tr class="not-image">
            			<td></td>
            			<td>
                            <img src="" id="preloadImg" />
            			</td>
            		</tr>
            	</tbody></table>
            </div>
        </div>
    </form>
    ';
}


function gt_library($typein = '')
{
    global $db, $config;
    if(isset($_REQUEST['action']))
    {
        if($_REQUEST['action'] == 'delete' && is_numeric($_GET['id']))
        {
            $result1 = $db->sql_query("SELECT * FROM ".ATTACHMENT_TABLE." WHERE `id`='".intval($_GET['id'])."'");
            $row = $db->sql_fetchrow($result1);
            $url =  $row['url'];
            @unlink($url);
            $result = $db->sql_query("DELETE FROM " . ATTACHMENT_TABLE . "  WHERE `id`='".$row['id']."'");
            $db->sql_freeresult($result1);
            $db->sql_freeresult($result);
        }
        if($_REQUEST['action'] == 'edit' && is_numeric($_GET['id']))
        {
            get_form_edit(intval($_GET['id']));
        }
        else
        {
            get_while($typein);
        }
    }
    else
    {
        get_while($typein);
    }
        
        
    
}

function gat_name_only($url,$mode = '')
{
    if($mode == 'type')
    {
        $fileext  = str_replace("upload/","",$url);
        $type  = strrchr(strtolower($fileext) ,'.');
        $type  = str_replace(".","",$type);
        return $type;
    }
    else
    {
        $fileext  = str_replace("upload/","",$url);
        $type  = strrchr(strtolower($fileext) ,'.');
        $type  = str_replace(".","",$type);
        $name  = str_replace(".".$type,"",$fileext);
        return $name;
    }
}

function get_while($typein = '')
{
    global $db;
    $page       = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$limit      = PER_PAGE;
	$startpoint = ($page * $limit) - $limit;
    $sql        = "SELECT * FROM ".ATTACHMENT_TABLE." WHERE `typepost`='site' ORDER BY `id` DESC";
    $result     = $db->sql_query_limit($sql,$limit,$startpoint);
    $pagesbar   = pagination(ATTACHMENT_TABLE." WHERE `typepost`='site'",$limit,$page,'media-upload.php?type=image&#038;tab=library&#038;');
    $numrow     = $db->sql_numrows($sql);;
    if($numrow)
    {
        if($typein == 'library')
        {
            get_while_library($result,$pagesbar);
        }
        elseif($typein == 'gallery')
        {
            get_while_gallery();
        }
        else
        {
            get_while_library($result,$pagesbar);
        }
    }
    else
    {
        get_type();
    }
}

function get_while_library($result,$pagesbar)
{
    
    echo '
    <form enctype="multipart/form-data" method="post" action="media-upload.php?type=image&#038;tab=library" id="library-form">
        <div>
            <ul class="pagination pagination-sm flaotright">
              '.$pagesbar.'
            </ul>
        </div>
    <div class="accordion" id="collapse-group">
    ';
    while($row = mysql_fetch_array($result))
    {
        echo '
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <a data-parent="#collapse-group" href="#collapse'.$row['id'].'" data-toggle="collapse"><div class="widget-title"><img src="'.$row['url'].'" alt="" class="thumbnail_s"><h5>'.$row['title'].'</h5></div></a>
            </div>
            <div class="collapse accordion-body" id="collapse'.$row['id'].'">
              <div class="widget-content">
                  <img src="'.$row['url'].'" alt="" id="img'.$row['id'].'" class="thumbnail_x">
                  <div class="delete-tihs">
                        <a href="media-upload.php?referer=image&amp;type=image&amp;tab=library&amp;action=delete&amp;id='.$row['id'].'" class="btn btn-danger">Delete Image</a>
                  </div>
                  <div class="info">
                      <strong>File name</strong>: '.$row['title'].'<br />
                      <strong>File type</strong>: '.$row['type'].'<br />
                      <strong>File Size</strong>: '.round(($row['size']/1024),0).' KB<br />
                      <strong>Dimensions</strong>: '.$row['dimensions'].'<br />
                      <strong>Upload date</strong>: '.date('j F Y',$row['time']).'<br />
                      <input type="submit"  name="send['.$row['id'].']" id="send['.$row['id'].']" class="btn btn-info" style="margin-top:6px" value="Use this image">
                  </div>
                  <div style="clear:both;"></div>
              </div>
            </div>
          </div>
        ';
    }
    echo '
    </div>
    </form>
    ';
    @mysql_free_result($result);  
}


function get_type()
{
    ?>
    <h3 class="media-title">Add media files from your computer</h3>
    <div id="html-upload-ui">
        <p id="async_upload-wrap">
            <div id="browser-file">
                <form enctype="multipart/form-data" method="post" action="media-upload.php?type=image&#038;tab=type" class="media-upload-form type-form validate" id="image-form">
                <input type="hidden" name="save" id="save" class="save" value="save"  />
                    
                    <div class="formarea">
                        <div class="inputs">
                            <div id="uploadform">
                                <div class="uploadinput">
                                    <div class="controls">                 
                                        <input type="button" id="set-upload" class="btn btn-lg" value="Select Files"  />
                                        <input type="file" name="async_upload" id="async_upload" accept="<?php echo ACCEPT; ?>"  class="form-control" style="display: none;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </p>
    </div>          
<?php
}

function close_tb()
{
    return '<div class="buttom"><input type="button" onClick="self.parent.tb_remove();" class="btn btn-danger" value="Close"></div>';
}

function get_url()
{
    $url = 'http://'.$_SERVER['SERVER_NAME'].str_replace('install', '', dirname($_SERVER['SCRIPT_NAME'])).'/';
    $url = str_replace(" ","%20",$url);
    return $url;
}
?>