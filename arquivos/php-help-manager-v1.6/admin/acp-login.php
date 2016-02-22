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
ob_start();
session_start();
require_once('./acp-load.php');
$acp_session->get_sessioncp(true);


if(@$_REQUEST['do']=="logout")
{
	$acp_session->unset_session();
}
if(@$_POST['do']=="login")
{
    $username    = $_POST['username'];
    $password    = md5($_POST['password']);
    $sqladmin    = "SELECT * FROM ".ADMIN_TABLE." WHERE `username`='".$username."' and `password`='".$password."'";
    if($db->sql_numrows($sqladmin)){
        $result   = $db->sql_query($sqladmin);
        $date     = $db->sql_fetchrow($result);
        $acp_session->set_session('31',$date['id'],'admincp');
        @header("Location:".$_POST['redirect_to']);
        $showform = 'style="display:none;"';
	 }
     else{
        $msg = '<p class="message">'.get_admin_languages('login_error').'</p>';
     }
}
else
{
    $msg = '';
}

    if(isset($_SESSION['redirect_to']))
    {
        $redirect_to = $_SESSION['redirect_to'];
    }
    else
    {
        $redirect_to = 'index.php';
    }
?>
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $config['sitename']; ?> | <?php echo get_admin_languages('login_admin'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <!-- bootstrap 3.0.2 -->
    <link href="assets/css/bootstrap.min2.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php
    if(get_admin_languages('dir') == 'rtl')
    {
        ?>
        <style>
        body {font-family: Tahoma;}
        </style>
        <?php
    }
    ?>
</head>
<body dir="<?php echo get_admin_languages('dir'); ?>">
<div id="wrap">
	<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well_l" style="margin-top: 10%;">
			<legend><?php echo get_admin_languages('login_admin'); ?></legend>
            <?php echo $msg; ?>
			<form id="loginform"   method="post">
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control align-left" placeholder="<?php echo get_admin_languages('username'); ?>" />
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control align-left" placeholder="<?php echo get_admin_languages('password'); ?>" /> 
				</div>
				<button type="submit" class="btn btn-primary"> <?php echo get_admin_languages('login'); ?> </button>
                <input type="hidden" name="do" value="login" />
                <input type="hidden" name="redirect_to" value="<?php echo $redirect_to;?>" />
                <input type="hidden" name="testcookie" value="1" />
			</form>
		</div>
	</div>
</div>
<!-- /container -->
  </div>
    <!-- jQuery 2.0.2 -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>        
    </body>
</html>