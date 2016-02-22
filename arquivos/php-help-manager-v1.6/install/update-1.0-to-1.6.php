<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
include('system/global-install.php');
?>
<!DOCTYPE html>
<html lang="<?php echo $lang['global']['lang']; ?>" dir="<?php echo $lang['global']['dir']; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="theme/images/favicon.ico">
    <title>PHP Help Manager Update v1.0 to v1.6 System</title>
    <link rel="stylesheet" href="theme/css/jquery.mCustomScrollbar.css">
    <link href="theme/css/bootstrap-modal.css" rel="stylesheet" />
    <link href="theme/css/<?php echo IN_THEME;?>-bootstrap.css" rel="stylesheet">
    <link href="theme/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="theme/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="theme/js/ie-emulation-modes-warning.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="theme/js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
    if($lang['global']['dir']=='rtl'){echo '<link href="theme/css/style-rtl.css" rel="stylesheet">';}
    ?>
    <script src="theme/js/jquery.min.js"></script>
    <script src="theme/js/bootstrap.min.js"></script>
    <script src="theme/js/bootstrap-modalmanager.js"></script>
    <script src="theme/js/bootstrap-modal.js"></script>
    <script src="theme/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="theme/js/jquery.form.js"></script>
  </head>
  <body id="<?php echo IN_THEME;?>">
  <input type="hidden" id="status_step" value="<?php echo $lang['global']['status_step']; ?>" />
  <input type="hidden" id="done_step" value="<?php echo $lang['global']['done_step']; ?>" />
  <?php if(IN_SHOW_NAVBAR){ ?>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <h3>PHP Help Manager Update v1.0 to v1.6 System</h3>
          <small>(Please be patient as some parts may take some time)</small>
    </div>
  </div>
  <?php } ?>
    <div class="container">
      <div class="jumbotron" id="progressbox">
        <?php if(!IN_SHOW_NAVBAR){ ?>
        <h4><?php echo sprintf($lang['global']['title'],IN_SCRIPT_NAME); ?></h4>
        <?php } ?>
        <div class="hidden" id="progresssection">
			<div id="progressmessage"><?php echo sprintf($lang['global']['status_step'],1); ?></div>
            <div class="progress">
              <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
			<div id="progressnotice"></div>
			<div class="buttons floatcontainer">
				<img id="upgradeprogress" class="hidden" src="theme/images/progress.gif" alt="">
				<input class="btn btn-xs btn-success hidden" type="button" id="showdetails" tabindex="1" name="" value="<?php echo $lang['global']['show_details'];?>">
				<input class="btn btn-xs btn-warning " type="button" id="hidedetails" tabindex="1" name="" value="<?php echo $lang['global']['hide_details'];?>">
                <?php
                echo $button_show;
                ?>
			</div>
		</div>
        <hr class="hidden" id="brhr" />
        <div id="detailbox" class="tborder hidden">
			<div class="navbody messageheader"><?php echo $lang['global']['install_progress'];?></div>
			<div id="mainmessage" class="messagebody logincontrols">
                <ul class="list_no_decoration"></ul>
            </div>
			<div class="status">
				<span id="statusmessage">Status: upgrade Step 1</span>
			</div>
		</div>      
        <form action="update-1.0-to-1.6.php" method="post" id="formupdate">
            <p>Press the button below to begin the Update of PHP Help Manager</p>
			<input class="btn btn-sm btn-primary" type="button" id="beginupdate" tabindex="1" name="" value="begin Update">
		</form>
      </div>
    </div>
    <script src="theme/js/update1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() { 
            $("#mainmessage").mCustomScrollbar({theme:"<?php echo IN_SCROLLBAR_THEME;?>"});
        });
    </script>
  </body>
</html>
