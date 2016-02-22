<?php if (!defined('IN_MEGABUGS')) exit; ?><!DOCTYPE html>
<html lang="<?php echo (isset($this->_rootref['LANG_LANG'])) ? $this->_rootref['LANG_LANG'] : ''; ?>" dir="<?php echo (isset($this->_rootref['LANG_DIR'])) ? $this->_rootref['LANG_DIR'] : ''; ?>">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo (isset($this->_rootref['SITE_DESCRIPTION'])) ? $this->_rootref['SITE_DESCRIPTION'] : ''; ?>"/>
    <meta name="keywords" content="<?php echo (isset($this->_rootref['SITE_KEYWORDS'])) ? $this->_rootref['SITE_KEYWORDS'] : ''; ?>"/>
    <?php if ($this->_rootref['FAVICON']) {  ?>
    <link rel="shortcut icon" href="<?php echo (isset($this->_rootref['FAVICON'])) ? $this->_rootref['FAVICON'] : ''; ?>"/>
    <?php } else { ?>
    <link rel="icon" href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/favicon.ico" />
    <?php } ?>
    <title><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?> - <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/fontawesome.css" rel="stylesheet" />
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]><script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/ie-emulation-modes-warning.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/script.js"></script>
    <?php if ($this->_rootref['COVER_BACKGROUND']) {  ?>
    <style type="text/css">
        .intro-cover {background-image: url("<?php echo (isset($this->_rootref['COVER_BACKGROUND'])) ? $this->_rootref['COVER_BACKGROUND'] : ''; ?>");background-position: center 50%;background-size: cover;}
        .intro-cover h2, .intro-cover .intro-description{color: <?php echo (isset($this->_rootref['COVER_COLOR'])) ? $this->_rootref['COVER_COLOR'] : ''; ?>;}
    </style>
    <?php } if ($this->_rootref['LANG_DIR'] == ('rtl')) {  ?>
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/rtl.css" rel="stylesheet" />
    <?php } ?>
  </head>
  <body>
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <nav class="navbar" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php" title="<?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?>">
                        <img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/logo.png" alt="<?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?>" />
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only"><?php echo (isset($this->_rootref['LANG_TOGGLE_NAVIGATION'])) ? $this->_rootref['LANG_TOGGLE_NAVIGATION'] : ''; ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php echo (isset($this->_rootref['NAV_HOME'])) ? $this->_rootref['NAV_HOME'] : ''; ?>><a href="index.php"><?php echo (isset($this->_rootref['LANG_HOME'])) ? $this->_rootref['LANG_HOME'] : ''; ?></a></li>
                        <li <?php echo (isset($this->_rootref['NAV_KNOW'])) ? $this->_rootref['NAV_KNOW'] : ''; ?>><a href="index.php?page=knowledgebase"><?php echo (isset($this->_rootref['LANG_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_KNOWLEDGE_BASE'] : ''; ?></a></li>
                        <li <?php echo (isset($this->_rootref['NAV_NEWS'])) ? $this->_rootref['NAV_NEWS'] : ''; ?>><a href="index.php?page=news"><?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?></a></li>
                        <li <?php echo (isset($this->_rootref['NAV_FAQ'])) ? $this->_rootref['NAV_FAQ'] : ''; ?>><a href="index.php?page=faq"><?php echo (isset($this->_rootref['LANG_FAQ'])) ? $this->_rootref['LANG_FAQ'] : ''; ?></a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li <?php echo (isset($this->_rootref['NAV_CONTACT'])) ? $this->_rootref['NAV_CONTACT'] : ''; ?>><a href="index.php?page=contact"><?php echo (isset($this->_rootref['LANG_CONTACT'])) ? $this->_rootref['LANG_CONTACT'] : ''; ?></a></li>
                        <li <?php echo (isset($this->_rootref['NAV_PRIVACY'])) ? $this->_rootref['NAV_PRIVACY'] : ''; ?>><a href="index.php?page=privacy"><?php echo (isset($this->_rootref['LANG_PRIVACY'])) ? $this->_rootref['LANG_PRIVACY'] : ''; ?></a></li>
                        <li <?php echo (isset($this->_rootref['NAV_ABOUT'])) ? $this->_rootref['NAV_ABOUT'] : ''; ?>><a href="index.php?page=about"><?php echo (isset($this->_rootref['LANG_ABOUT_US'])) ? $this->_rootref['LANG_ABOUT_US'] : ''; ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
                </nav>
        </div>
    </div>
</div>
<div class="intro-cover">
    <div class="container">
    	<div class="intro-cover-content">
    		<h2><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?></h2>
    		<div class="intro-description"><?php echo (isset($this->_rootref['SITE_TAGLINE'])) ? $this->_rootref['SITE_TAGLINE'] : ''; ?></div>
            <?php $this->_tpl_include('sidebar_search.html'); ?>
    	</div>
    </div>
</div>