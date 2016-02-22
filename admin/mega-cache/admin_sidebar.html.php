<?php if (!defined('IN_MEGABUGS')) exit; ?><a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>
<div class="sidebar" id="sidebar">
	<ul class="nav nav-list">
    	<li <?php echo (isset($this->_rootref['CLASS_DASHBOARD'])) ? $this->_rootref['CLASS_DASHBOARD'] : ''; ?>><a href="index.php"><i class="fa fa-dashboard"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_DASHBOARD'])) ? $this->_rootref['LANG_CP_DASHBOARD'] : ''; ?> </span></a></li>
        <li <?php echo (isset($this->_rootref['CLASS_KNOWLEDGEBASE'])) ? $this->_rootref['CLASS_KNOWLEDGEBASE'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-file-text-o"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_CP_KNOWLEDGE_BASE'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_KNOWLEDGEBASE)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_KNOWLEDGEBASE_LEVEL'])) ? $this->_rootref['CLASS_KNOWLEDGEBASE_LEVEL'] : ''; ?>><a href="posts.php?post_type=knowledgebase"><i class="fa fa-file-text-o"></i></i><?php echo (isset($this->_rootref['LANG_CP_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_CP_KNOWLEDGE_BASE'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_KNOWLEDGEBASE_ADDNEW'])) ? $this->_rootref['CLASS_KNOWLEDGEBASE_ADDNEW'] : ''; ?>><a href="posts.php?post_type=knowledgebase&mode=new"><i class="fa fa-plus-circle"></i></i><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_KNOWLEDGEBASE_CATE'])) ? $this->_rootref['CLASS_KNOWLEDGEBASE_CATE'] : ''; ?>><a href="categories.php?taxonomy=knowledgebase"><i class="fa fa-tags"></i></i><?php echo (isset($this->_rootref['LANG_CP_CATEGORIES'])) ? $this->_rootref['LANG_CP_CATEGORIES'] : ''; ?></a></li>
    		</ul>
    	</li>
        <li <?php echo (isset($this->_rootref['CLASS_NEWS'])) ? $this->_rootref['CLASS_NEWS'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-bullhorn"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_NEWS)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_NEWS_LEVEL'])) ? $this->_rootref['CLASS_NEWS_LEVEL'] : ''; ?>><a href="posts.php?post_type=news"><i class="fa fa-bullhorn"></i></i><?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_NEWS_ADDNEW'])) ? $this->_rootref['CLASS_NEWS_ADDNEW'] : ''; ?>><a href="posts.php?post_type=news&mode=new"><i class="fa fa-plus-circle"></i></i><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_NEWS_CATE'])) ? $this->_rootref['CLASS_NEWS_CATE'] : ''; ?>><a href="categories.php?taxonomy=news"><i class="fa fa-tags"></i></i><?php echo (isset($this->_rootref['LANG_CP_CATEGORIES'])) ? $this->_rootref['LANG_CP_CATEGORIES'] : ''; ?></a></li>
    		</ul>
    	</li>
        <li <?php echo (isset($this->_rootref['CLASS_FAQ'])) ? $this->_rootref['CLASS_FAQ'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-life-ring"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_FAQ)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_FAQ_LEVEL'])) ? $this->_rootref['CLASS_FAQ_LEVEL'] : ''; ?>><a href="posts.php?post_type=faq"><i class="fa fa-life-ring"></i></i><?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_FAQ_ADDNEW'])) ? $this->_rootref['CLASS_FAQ_ADDNEW'] : ''; ?>><a href="posts.php?post_type=faq&mode=new"><i class="fa fa-plus-circle"></i></i><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_FAQ_CATE'])) ? $this->_rootref['CLASS_FAQ_CATE'] : ''; ?>><a href="categories.php?taxonomy=faq"><i class="fa fa-tags"></i></i><?php echo (isset($this->_rootref['LANG_CP_CATEGORIES'])) ? $this->_rootref['LANG_CP_CATEGORIES'] : ''; ?></a></li>
    		</ul>
    	</li>
        <li <?php echo (isset($this->_rootref['CLASS_PAGES'])) ? $this->_rootref['CLASS_PAGES'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-file-text-o"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_PAGES'])) ? $this->_rootref['LANG_CP_PAGES'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_PAGES)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_PAGES_LEVEL'])) ? $this->_rootref['CLASS_PAGES_LEVEL'] : ''; ?>><a href="posts.php?post_type=pages"><i class="fa fa-file-text-o"></i></i><?php echo (isset($this->_rootref['LANG_CP_PAGES'])) ? $this->_rootref['LANG_CP_PAGES'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_PAGES_ADDNEW'])) ? $this->_rootref['CLASS_PAGES_ADDNEW'] : ''; ?>><a href="posts.php?post_type=pages&mode=new"><i class="fa fa-plus-circle"></i></i><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a></li>
    		</ul>
    	</li>
        
        <li <?php echo (isset($this->_rootref['CLASS_THEMES'])) ? $this->_rootref['CLASS_THEMES'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-paint-brush"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_APPEARANCE'])) ? $this->_rootref['LANG_CP_APPEARANCE'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_THEMES)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_THEMES_LEVEL'])) ? $this->_rootref['CLASS_THEMES_LEVEL'] : ''; ?>><a href="themes.php"><i class="fa fa-television"></i><?php echo (isset($this->_rootref['LANG_CP_THEMES_SETTING'])) ? $this->_rootref['LANG_CP_THEMES_SETTING'] : ''; ?></a></li>
                <?php echo (isset($this->_rootref['ADMIN_NAVSID_BAR'])) ? $this->_rootref['ADMIN_NAVSID_BAR'] : ''; ?>
    		</ul>
    	</li>
        <li <?php echo (isset($this->_rootref['CLASS_SETTING'])) ? $this->_rootref['CLASS_SETTING'] : ''; ?>>
    		<a href="#" class="dropdown-toggle"><i class="fa fa-sliders"></i><span class="menu-text"> <?php echo (isset($this->_rootref['LANG_CP_SETTINGS'])) ? $this->_rootref['LANG_CP_SETTINGS'] : ''; ?> </span><b class="arrow fa fa-angle-down"></b></a>
    		<ul class="submenu" style="display: <?php if ((!CLASS_SETTING)) {  ?>none<?php } ?>;">
    			<li <?php echo (isset($this->_rootref['CLASS_SETTINGG'])) ? $this->_rootref['CLASS_SETTINGG'] : ''; ?>><a href="settings.php?mode=general"><i class="fa fa-cog"></i><?php echo (isset($this->_rootref['LANG_CP_GENERAL_SETTING'])) ? $this->_rootref['LANG_CP_GENERAL_SETTING'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_SETTINGS'])) ? $this->_rootref['CLASS_SETTINGS'] : ''; ?>><a href="settings.php?mode=socials"><i class="fa fa-share-alt"></i><?php echo (isset($this->_rootref['LANG_CP_SOCIALS_SETTING'])) ? $this->_rootref['LANG_CP_SOCIALS_SETTING'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_SETTINGU'])) ? $this->_rootref['CLASS_SETTINGU'] : ''; ?>><a href="settings.php?mode=users"><i class="fa fa-user"></i><?php echo (isset($this->_rootref['LANG_CP_USERS_SETTING'])) ? $this->_rootref['LANG_CP_USERS_SETTING'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_SETTINGP'])) ? $this->_rootref['CLASS_SETTINGP'] : ''; ?>><a href="settings.php?mode=pages"><i class="fa fa-file-text-o"></i><?php echo (isset($this->_rootref['LANG_CP_PAGES_SETTING'])) ? $this->_rootref['LANG_CP_PAGES_SETTING'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_SETTINGET'])) ? $this->_rootref['CLASS_SETTINGET'] : ''; ?>><a href="settings.php?mode=emailtemplate"><i class="fa fa-envelope-o"></i><?php echo (isset($this->_rootref['LANG_CP_EMAIL_TEMPLATES'])) ? $this->_rootref['LANG_CP_EMAIL_TEMPLATES'] : ''; ?></a></li>
                <li <?php echo (isset($this->_rootref['CLASS_LANGUAGE'])) ? $this->_rootref['CLASS_LANGUAGE'] : ''; ?>><a href="language.php"><i class="fa fa-language"></i><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE_SETTINGS'])) ? $this->_rootref['LANG_CP_LANGUAGE_SETTINGS'] : ''; ?></a></li>
    		</ul>
    	</li>
        <li <?php echo (isset($this->_rootref['CLASS_USERS'])) ? $this->_rootref['CLASS_USERS'] : ''; ?>><a href="users.php"><i class="fa fa-user"></i><span class="menu-text"><?php echo (isset($this->_rootref['LANG_CP_USERS'])) ? $this->_rootref['LANG_CP_USERS'] : ''; ?> </span></a></li>
	</ul>
</div>