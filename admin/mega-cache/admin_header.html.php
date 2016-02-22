<?php if (!defined('IN_MEGABUGS')) exit; ?><!DOCTYPE html>
<html lang="<?php echo (isset($this->_rootref['LANG_CP_LANG'])) ? $this->_rootref['LANG_CP_LANG'] : ''; ?>">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?> | <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/themearabia.min.css" />
	<link rel="stylesheet" href="assets/css/themearabia-responsive.min.css" />
	<link rel="stylesheet" href="assets/css/themearabia-skins.min.css" />
    <link rel="stylesheet"href="assets/css/bootstrap-custom.css" />
    <link rel="stylesheet" href="assets/css/megatpl.css" />
    <link rel="stylesheet" href="assets/css/charts.css" />
    <?php if ($this->_rootref['LANG_CP_DIR'] == ('rtl')) {  ?>
    <link href="assets/css/mega-rtl.css" rel="stylesheet" type="text/css" />
    <?php } ?>
    <!--[if lte IE 8]>
	  <link rel="stylesheet" href="assets/css/themearabia-ie.min.css" />
	<![endif]-->
	<script src="assets/js/jquery.min.js"></script> 
    <script src="assets/js/jquery.ui.custom.js"></script> 
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/themearabia-elements.min.js"></script>
	<script src="assets/js/themearabia.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
    <script src="assets/js/megatpl.js"></script>
    <script type="text/javascript">function resetMenu() {document.gomenu.selector.selectedIndex = 2;}</script>
    <!-- plugins thickbox -->
    <link rel="stylesheet" href="assets/plugins/thickbox/thickbox.min.css" />
    <script src="assets/plugins/thickbox/thickbox.min.js"></script>
    <!-- plugins colorpicker -->
    <link rel="stylesheet" href="assets/plugins/colorpicker/colorpicker.min.css" />
    <script src="assets/plugins/colorpicker/colorpicker.min.js"></script>
    <!-- plugins checkbox -->
    <link rel="stylesheet" href="assets/plugins/checkbox/checkbox.min.css" />
    <script src="assets/plugins/checkbox/checkbox.min.js"></script>
    <script src="assets/plugins/checkbox/iphone-style-checkboxes.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script> 
    <link rel="stylesheet" href="assets/plugins/jcrop/jquery.Jcrop.min.css" />
    <script src="assets/plugins/jcrop/jquery.Jcrop.min.js"></script> 
    <script src="assets/js/jquery.form.js"></script> 
    <script src="assets/js/edit_profile.js"></script> 
    <script src="assets/js/jquery.tipsy.js"></script> 
    <script src="assets/js/jquery.flot.js"></script> 
    <script src="assets/js/jquery.graphtable-0.2.js"></script> 
    <script src="assets/js/jquery.peity.min.js"></script> 
    <script src="assets/js/dashboard.js"></script> 
</head>
<body dir="<?php echo (isset($this->_rootref['LANG_CP_DIR'])) ? $this->_rootref['LANG_CP_DIR'] : ''; ?>">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
                <ul class="nav themearabia-nav">
                    <li>
						<a href="#"><i class="fa fa-coffee"></i></a>
						<ul class="user-menu dropdown-menu dropdown-caret dropdown-closer">
							<li><a href="http://codecanyon.net/user/themearabia" target="_blank">Codecanyon</a></li>
                            <li><a href="http://themearabia.net" target="_blank">themearabia.net</a></li>
						</ul>
					</li>
                    <li>
						<a href="../index.php"><i class="fa fa-home"></i> <span class="notphone"><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?></span></a>
						<ul class="user-menu dropdown-menu dropdown-caret dropdown-closer">
							<li><a href="../index.php" target="_blank"><?php echo (isset($this->_rootref['LANG_CP_VISIT_SITE'])) ? $this->_rootref['LANG_CP_VISIT_SITE'] : ''; ?></a></li>
						</ul>
					</li>
                    <li>
						<a href="users.php?mode=profile">
							<i class="fa fa-plus"></i> <span class="notphone"><?php echo (isset($this->_rootref['LANG_CP_NEW'])) ? $this->_rootref['LANG_CP_NEW'] : ''; ?></span>
						</a>
						<ul class="user-menu dropdown-menu dropdown-caret dropdown-closer">
							<li><a href="posts.php?post_type=knowledgebase&mode=new"><i class="fa fa-file-text-o"></i> <?php echo (isset($this->_rootref['LANG_CP_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_CP_KNOWLEDGE_BASE'] : ''; ?></a></li>
                            <li><a href="posts.php?post_type=news&mode=new"><i class="fa fa-bullhorn"></i> <?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?></a></li>
                            <li><a href="posts.php?post_type=faq&mode=new"><i class="fa fa-life-ring"></i> <?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?></a></li>
                            <li><a href="posts.php?post_type=pages&mode=new"><i class="fa fa-file-text-o"></i> <?php echo (isset($this->_rootref['LANG_CP_PAGES'])) ? $this->_rootref['LANG_CP_PAGES'] : ''; ?></a></li>
                            <li><a href="users.php?mode=new"><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['LANG_CP_USERS'])) ? $this->_rootref['LANG_CP_USERS'] : ''; ?></a></li>
						</ul>
					</li>
                    <?php echo (isset($this->_rootref['ADMIN_NAVTOP_BAR'])) ? $this->_rootref['ADMIN_NAVTOP_BAR'] : ''; ?>
				</ul>
                <ul class="nav themearabia-nav pull-right">
                    <li>
						<a href="#">
							<span class="user-info"><?php echo (isset($this->_rootref['LANG_CP_HOWDY'])) ? $this->_rootref['LANG_CP_HOWDY'] : ''; ?> <?php echo (isset($this->_rootref['ADMIN_USERNAME'])) ? $this->_rootref['ADMIN_USERNAME'] : ''; ?></span>
                            <img class="nav-user-photo" src="<?php echo (isset($this->_rootref['ADMIN_AVATAR'])) ? $this->_rootref['ADMIN_AVATAR'] : ''; ?>" alt="<?php echo (isset($this->_rootref['ADMIN_USERNAME'])) ? $this->_rootref['ADMIN_USERNAME'] : ''; ?>" />
						</a>
						<ul class="user-menu pull-right dropdown-menu dropdown-caret dropdown-closer">
                            <img class="nav-user-photo" src="<?php echo (isset($this->_rootref['ADMIN_AVATAR'])) ? $this->_rootref['ADMIN_AVATAR'] : ''; ?>" alt="<?php echo (isset($this->_rootref['ADMIN_USERNAME'])) ? $this->_rootref['ADMIN_USERNAME'] : ''; ?>" />
							<li><a href="index.php?mode=profile"><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['LANG_CP_PROFILE'])) ? $this->_rootref['LANG_CP_PROFILE'] : ''; ?></a></li>
							<li><a href="acp-login.php?do=logout"><i class="fa fa-power-off"></i> <?php echo (isset($this->_rootref['LANG_CP_LOGOUT'])) ? $this->_rootref['LANG_CP_LOGOUT'] : ''; ?></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="main-container container-fluid">
    <?php $this->_tpl_include('sidebar.html'); ?>
		<div class="main-content">
			<div class="page-content">