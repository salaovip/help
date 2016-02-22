<?php if (!defined('IN_MEGABUGS')) exit; ?><!DOCTYPE html>
<html lang="<?php echo (isset($this->_rootref['LANG_CP_LANG'])) ? $this->_rootref['LANG_CP_LANG'] : ''; ?>">
	<head>
		<meta charset="utf-8" />
		<title><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?> | <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="assets/js/thickbox/thickbox.css" />
        <link rel="stylesheet" href="assets/css/colorpicker.css" />
        <link rel="stylesheet" href="assets/css/summernote.css" />
        <link rel="stylesheet" href="assets/css/megatpl.css" />
		<link href="assets/css/bootstrap-custom.css" rel="stylesheet" type="text/css" />
        <?php if ($this->_rootref['LANG_CP_DIR'] == ('rtl')) {  ?>
        <link href="assets/css/mega-rtl.css" rel="stylesheet" type="text/css" />
        <?php } ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
	<body dir="<?php echo (isset($this->_rootref['LANG_CP_DIR'])) ? $this->_rootref['LANG_CP_DIR'] : ''; ?>">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?></small>
					</a><!--/.brand-->
					<ul class="nav ace-nav pull-right">
                        <li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="assets/images/avatar.jpg" alt="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" />
								<span class="user-info"><small><?php echo (isset($this->_rootref['LANG_CP_WELCOME'])) ? $this->_rootref['LANG_CP_WELCOME'] : ''; ?>,</small><?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?></span>
								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li><a href="index.php?mode=profile"><i class="icon-user"></i> <?php echo (isset($this->_rootref['LANG_CP_PROFILE'])) ? $this->_rootref['LANG_CP_PROFILE'] : ''; ?></a></li>
								<li class="divider"></li>
								<li><a href="acp-login.php?do=logout"><i class="icon-off"></i> <?php echo (isset($this->_rootref['LANG_CP_LOGOUT'])) ? $this->_rootref['LANG_CP_LOGOUT'] : ''; ?></a></li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		<div class="main-container container-fluid">
        <?php $this->_tpl_include('sidebar.html'); ?>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
				</div>
				<div class="page-content">