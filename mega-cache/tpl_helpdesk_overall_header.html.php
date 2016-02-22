<?php if (!defined('IN_MEGABUGS')) exit; ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo (isset($this->_rootref['SITE_DESCRIPTION'])) ? $this->_rootref['SITE_DESCRIPTION'] : ''; ?>"/>
    <meta name="keywords" content="<?php echo (isset($this->_rootref['SITE_KEYWORDS'])) ? $this->_rootref['SITE_KEYWORDS'] : ''; ?>"/>
    <?php if ($this->_rootref['FAVICON']) {  ?>
    <link rel="shortcut icon" href="<?php echo (isset($this->_rootref['FAVICON'])) ? $this->_rootref['FAVICON'] : ''; ?>"/>
    <?php } else { ?>
    <link rel="icon" href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/favicon.ico" />
    <?php } ?>
    <title><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?> - <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
    <!-- Bootstrap -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,700&subset=latin,cyrillic,cyrillic-ext,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/lavish-bootstrap.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/font_icon/flaticon.css" rel="stylesheet" />
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/jquery.Jcrop.min.css" rel="stylesheet" />
    <?php if ($this->_rootref['IS_PROFILE']) {  ?><link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/profile.css" rel="stylesheet"><?php } if ($this->_rootref['IS_EDIT_PROFILE']) {  ?><link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/profile-editor.css" rel="stylesheet"><?php } ?><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery-ui-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/autosize-textarea.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.Jcrop.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.dotdotdot.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.browser.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.uniform.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/tooltip.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/global.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/vote.js"></script>
    <?php if ($this->_rootref['OPTION_COVER_BACKGROUND_HEADER']) {  ?>
    <style type="text/css">
    #support-header.index {
        background-image: url("<?php echo (isset($this->_rootref['OPTION_COVER_BACKGROUND_HEADER'])) ? $this->_rootref['OPTION_COVER_BACKGROUND_HEADER'] : ''; ?>");background-position: center 50%;background-size: cover;
    }
    </style>
    <?php } ?>
</head>
<body>
<div id="loading-bar" style="width: 0px; display: none;"><dd></dd><dt></dt></div>
<?php if ($this->_rootref['USER_STATUS'] == ('0') && $this->_rootref['IS_USER']) {  ?>
<div class="top_notes"><?php echo (isset($this->_rootref['LANG_PLEASE_ACTIVATE_YOUR_ACCOUNT'])) ? $this->_rootref['LANG_PLEASE_ACTIVATE_YOUR_ACCOUNT'] : ''; ?></div>
<?php } ?>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="row">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"><?php echo (isset($this->_rootref['LANG_TOGGLE_NAVIGATION'])) ? $this->_rootref['LANG_TOGGLE_NAVIGATION'] : ''; ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <?php if ($this->_rootref['IS_USER']) {  ?>
    <ul class="nav navbar-nav navbar-left phone">
    <li class="nav-item nav-user-toggle">
        <a href="users.php?mode=profile">
            <img class="avatar-image avatar-30" src="<?php echo (isset($this->_rootref['USER_IMG30'])) ? $this->_rootref['USER_IMG30'] : ''; ?>"> 
            <i class="fa fa-angle-down"></i> 
        </a>
        <ul class="nav-user-menu ballon-sm-top-left">
            <li><a href="users.php?mode=profile"><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['USER_FNAME'])) ? $this->_rootref['USER_FNAME'] : ''; ?> <?php echo (isset($this->_rootref['USER_LNAME'])) ? $this->_rootref['USER_LNAME'] : ''; ?></a></li>
            <li><a href="users.php?mode=editprofile"><i class="fa fa-cog"></i> <?php echo (isset($this->_rootref['LANG_EDIT_PROFILE'])) ? $this->_rootref['LANG_EDIT_PROFILE'] : ''; ?></a></li>
            <li class="break"></li>
            <li><a href="users.php?mode=logout" onclick="return confirm('<?php echo (isset($this->_rootref['LANG_DOYOU_LOGOUT'])) ? $this->_rootref['LANG_DOYOU_LOGOUT'] : ''; ?>');"><i class="fa fa-power-off"></i> <?php echo (isset($this->_rootref['LANG_LOGOUT'])) ? $this->_rootref['LANG_LOGOUT'] : ''; ?></a></li>
        </ul>
    </li>
    </ul>
    <?php } else { ?>
    <ul class="nav navbar-nav navbar-left phone register-login">
    <li><a href="users.php?mode=register"><i class="fa fa-user-plus"></i> <?php echo (isset($this->_rootref['LANG_REGISTER'])) ? $this->_rootref['LANG_REGISTER'] : ''; ?></a></li>
    <li><a href="users.php?mode=login"><i class="fa fa-sign-in"></i> <?php echo (isset($this->_rootref['LANG_LOGIN'])) ? $this->_rootref['LANG_LOGIN'] : ''; ?></a></li>
    </ul>
    <?php } ?>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li class="<?php if ($this->_rootref['IS_CRR_HOME']) {  ?>active<?php } ?>"><a href="index.php"><i class="fa fa-home"></i> <?php echo (isset($this->_rootref['LANG_HOME'])) ? $this->_rootref['LANG_HOME'] : ''; ?></a></li>
        <li class="<?php if ($this->_rootref['IS_CRR_KNOW']) {  ?>active<?php } ?>"><a href="index.php?mode=knowledgebase"><i class="fa fa-file-text-o"></i> <?php echo (isset($this->_rootref['LANG_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_KNOWLEDGE_BASE'] : ''; ?></a></li>
        <li class="<?php if ($this->_rootref['IS_CRR_NEWS']) {  ?>active<?php } ?>"><a href="index.php?mode=news"><i class="fa fa-bullhorn"></i> <?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?></a></li>
        <li class="<?php if ($this->_rootref['IS_CRR_FAQ']) {  ?>active<?php } ?>"><a href="index.php?mode=faq"><i class="fa fa-life-ring"></i> <?php echo (isset($this->_rootref['LANG_FAQ'])) ? $this->_rootref['LANG_FAQ'] : ''; ?></a></li>
        <?php if ($this->_rootref['SHOW_PAGE_USERS']) {  ?>
        <li class="<?php if ($this->_rootref['IS_CRR_USER']) {  ?>active<?php } ?>"><a href="users.php"><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['LANG_USERS'])) ? $this->_rootref['LANG_USERS'] : ''; ?></a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right ">
        <?php if ($this->_rootref['IS_USER']) {  ?>
        <li class="nav-item nav-user-toggle">
            <a href="users.php?mode=profile">
                <img class="avatar-30" src="<?php echo (isset($this->_rootref['USER_IMG30'])) ? $this->_rootref['USER_IMG30'] : ''; ?>"> 
                <i class="fa fa-angle-down"></i> 
            </a>
            <ul class="nav-user-menu ballon-sm-top-left">
                <li><a href="users.php?mode=profile"><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['USER_FNAME'])) ? $this->_rootref['USER_FNAME'] : ''; ?> <?php echo (isset($this->_rootref['USER_LNAME'])) ? $this->_rootref['USER_LNAME'] : ''; ?></a></li>
                <li><a href="users.php?mode=editprofile"><i class="fa fa-cog"></i> <?php echo (isset($this->_rootref['LANG_EDIT_PROFILE'])) ? $this->_rootref['LANG_EDIT_PROFILE'] : ''; ?></a></li>
                <li class="break"></li>
                <li><a href="users.php?mode=logout" onclick="return confirm('Do you want to log out?');"><i class="fa fa-power-off"></i> <?php echo (isset($this->_rootref['LANG_LOGOUT'])) ? $this->_rootref['LANG_LOGOUT'] : ''; ?></a></li>
            </ul>
        </li>
        <?php } else { ?>
        <li><a href="users.php?mode=register"><i class="fa fa-user-plus"></i> <?php echo (isset($this->_rootref['LANG_REGISTER'])) ? $this->_rootref['LANG_REGISTER'] : ''; ?></a></li>
        <li><a href="users.php?mode=login"><i class="fa fa-sign-in"></i> <?php echo (isset($this->_rootref['LANG_LOGIN'])) ? $this->_rootref['LANG_LOGIN'] : ''; ?></a></li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div>
  </div>
</nav>
<?php if ($this->_rootref['IS_CRR_HOME']) {  ?>
<div id="support-header" class="index">
  <div class="container">
    <h1 style="color: <?php echo (isset($this->_rootref['OPTION_TITLE_HEADER_COLOR'])) ? $this->_rootref['OPTION_TITLE_HEADER_COLOR'] : ''; ?>!important;"><?php if ($this->_rootref['OPTION_TITLE_HEADER']) {  echo (isset($this->_rootref['OPTION_TITLE_HEADER'])) ? $this->_rootref['OPTION_TITLE_HEADER'] : ''; } else { echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; } ?><br />
    <span style="color: <?php echo (isset($this->_rootref['OPTION_TAGLINE_HEADER_COLOR'])) ? $this->_rootref['OPTION_TAGLINE_HEADER_COLOR'] : ''; ?>!important;"><?php if ($this->_rootref['OPTION_TAGLINE_HEADER']) {  echo (isset($this->_rootref['OPTION_TAGLINE_HEADER'])) ? $this->_rootref['OPTION_TAGLINE_HEADER'] : ''; } else { echo (isset($this->_rootref['SITE_TAGLINE'])) ? $this->_rootref['SITE_TAGLINE'] : ''; } ?></span></h1>
    <?php if ($this->_rootref['OPTION_SEARCH_SHOW_HEADER']) {  ?>
    <div id="search-form">
      <form action="index.php" method="get" id="support-search" class="support-search-big">
        <div class="inner">
          <input type="text" id="q" name="search" maxlength="100" value="" placeholder="<?php echo (isset($this->_rootref['OPTION_SEARCH_PLACEHOLDER_HEADER'])) ? $this->_rootref['OPTION_SEARCH_PLACEHOLDER_HEADER'] : ''; ?>" class="ui-autocomplete-input" role="textbox">
          <input type="submit" id="support-search-submit" value="<?php echo (isset($this->_rootref['LANG_SEARCH'])) ? $this->_rootref['LANG_SEARCH'] : ''; ?>">
        </div>
      </form>
    </div>
    <?php } ?>
  </div>
</div>
<?php } else { ?>
<div id="support-header">
<div class="container">
    <div class="logo">
        <a href="index.php"><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?></a>
    </div>
    <?php if ($this->_rootref['OPTION_SEARCH_SHOW_HEADER']) {  ?>
    <form action="index.php" method="get" id="support-search" class="support-search-small">
      <div>
        <input id="q" maxlength="100" name="search" type="text" value="" placeholder="<?php echo (isset($this->_rootref['OPTION_SEARCH_PLACEHOLDER_HEADER'])) ? $this->_rootref['OPTION_SEARCH_PLACEHOLDER_HEADER'] : ''; ?>" class="ui-autocomplete-input" role="textbox">
        <input id="support-search-submit" type="submit" value="<?php echo (isset($this->_rootref['LANG_SEARCH'])) ? $this->_rootref['LANG_SEARCH'] : ''; ?>">
      </div>
    </form>
    <?php } ?>
    <div class="clearfix"></div>
    <div id="breadcrumbs">
        <span class="crumb"><a href="index.php"><?php echo (isset($this->_rootref['LANG_HOME'])) ? $this->_rootref['LANG_HOME'] : ''; ?></a></span>
        <?php if ($this->_rootref['CRUMB_NEWS']) {  ?>
        / <span class="crumb"><a href="index.php?mode=news"><?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?></a></span>
        <?php } else if ($this->_rootref['CRUMB_KNOW']) {  ?>
        / <span class="crumb"><a href="index.php?mode=knowledgebase"><?php echo (isset($this->_rootref['LANG_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_KNOWLEDGE_BASE'] : ''; ?></a></span>
        <?php } ?>
        / <span class="crumb"><a href="#"><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></a></span> 
      </div>
  </div>
</div>
<?php } ?>
<div class="container">
<div class="row">
<div id="tab-container">