<?php if (!defined('IN_MEGABUGS')) exit; ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo (isset($this->_rootref['SITE_DESCRIPTION'])) ? $this->_rootref['SITE_DESCRIPTION'] : ''; ?>"/>
    <meta name="keywords" content="<?php echo (isset($this->_rootref['SITE_KEYWORDS'])) ? $this->_rootref['SITE_KEYWORDS'] : ''; ?>"/>
    <link rel="icon" href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/favicon.ico" />
    <title><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?> - <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
    <!-- Bootstrap -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,700&subset=latin,cyrillic,cyrillic-ext,vietnamese,latin-ext' rel='stylesheet' type='text/css'>
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/lavish-bootstrap.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.uniform.js"></script>
    <script type="text/javascript" src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/js/jquery.form.js"></script>
</head>
<body class="bare">
<div class="simple-logo"><a href="index.php"><?php echo (isset($this->_rootref['SITE_NAME'])) ? $this->_rootref['SITE_NAME'] : ''; ?></a></div>