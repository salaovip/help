<?php if (!defined('IN_MEGABUGS')) exit; ?><a class="menu-toggler" id="menu-toggler" href="#">
	<span class="menu-text"></span>
</a>
<div class="sidebar" id="sidebar">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a href="../" target="_blank" class="btn btn-small btn-success">
				<i class="icon-home"></i>
			</a>
			<a href="index.php" class="btn btn-small btn-info">
				<i class="icon-dashboard"></i>
			</a>
			<a href="index.php?mode=profile" class="btn btn-small btn-warning">
				<i class="icon-user"></i>
			</a>
			<a href="settings.php?mode=general" class="btn btn-small btn-danger">
				<i class="icon-cogs"></i>
			</a>
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div><!--#sidebar-shortcuts-->
	<ul class="nav nav-list">
		<li <?php echo (isset($this->_rootref['CLASS_DASHBOARD'])) ? $this->_rootref['CLASS_DASHBOARD'] : ''; ?>><a href="index.php"><i class="icon-dashboard"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_DASHBOARD'])) ? $this->_rootref['LANG_CP_DASHBOARD'] : ''; ?> </span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_CATE'])) ? $this->_rootref['CLASS_CATE'] : ''; ?>><a href="categorys.php"><i class="icon-tag"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_MANAGE_CATEGORYS'])) ? $this->_rootref['LANG_CP_MANAGE_CATEGORYS'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_ARTICLE'])) ? $this->_rootref['CLASS_ARTICLE'] : ''; ?>><a href="article.php"><i class="icon-lightbulb"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_MANAGE_ARTICLE'])) ? $this->_rootref['LANG_CP_MANAGE_ARTICLE'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_NEWS'])) ? $this->_rootref['CLASS_NEWS'] : ''; ?>><a href="news.php"><i class="icon-bullhorn"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_MANAGE_NEWS'])) ? $this->_rootref['LANG_CP_MANAGE_NEWS'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_FAQ'])) ? $this->_rootref['CLASS_FAQ'] : ''; ?>><a href="faq.php"><i class="icon-book"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_MANAGE_FAQ'])) ? $this->_rootref['LANG_CP_MANAGE_FAQ'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_PAGES'])) ? $this->_rootref['CLASS_PAGES'] : ''; ?>><a href="pages.php"><i class="icon-file"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_MANAGE_PAGES'])) ? $this->_rootref['LANG_CP_MANAGE_PAGES'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_SETTINGG'])) ? $this->_rootref['CLASS_SETTINGG'] : ''; ?>><a href="settings.php?mode=general"><i class="icon-cog"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_GENERAL_SETTING'])) ? $this->_rootref['LANG_CP_GENERAL_SETTING'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_SETTINGT'])) ? $this->_rootref['CLASS_SETTINGT'] : ''; ?>><a href="settings.php?mode=themes"><i class="icon-desktop"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_THEMES_SETTING'])) ? $this->_rootref['LANG_CP_THEMES_SETTING'] : ''; ?></span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_LANG'])) ? $this->_rootref['CLASS_LANG'] : ''; ?>><a href="language.php"><i class="icon-fire"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE_SETTINGS'])) ? $this->_rootref['LANG_CP_LANGUAGE_SETTINGS'] : ''; ?></span></a></li>
	</ul><!--/.nav-list-->
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>