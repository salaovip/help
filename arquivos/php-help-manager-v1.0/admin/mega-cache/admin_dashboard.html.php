<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['LANG_CP_DASHBOARD'])) ? $this->_rootref['LANG_CP_DASHBOARD'] : ''; ?>
	</h1>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="icon-lightbulb"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (isset($this->_rootref['ADMIN_TOTAL_CAT_ART'])) ? $this->_rootref['ADMIN_TOTAL_CAT_ART'] : ''; ?></span>
				<div class="infobox-content"><strong><?php echo (isset($this->_rootref['LANG_CP_INFOCATEGORYS'])) ? $this->_rootref['LANG_CP_INFOCATEGORYS'] : ''; ?></strong></div>
			</div>
		</div>
        <div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="icon-lightbulb"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (isset($this->_rootref['ADMIN_TOTAL_ART'])) ? $this->_rootref['ADMIN_TOTAL_ART'] : ''; ?></span>
				<div class="infobox-content"><strong><?php echo (isset($this->_rootref['LANG_CP_ARTICLES'])) ? $this->_rootref['LANG_CP_ARTICLES'] : ''; ?></strong></div>
			</div>
		</div>
        
        
        <div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="icon-bullhorn"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (isset($this->_rootref['ADMIN_TOTAL_CAT_POST'])) ? $this->_rootref['ADMIN_TOTAL_CAT_POST'] : ''; ?></span>
				<div class="infobox-content"><strong><?php echo (isset($this->_rootref['LANG_CP_INFOCATEGORYS'])) ? $this->_rootref['LANG_CP_INFOCATEGORYS'] : ''; ?></strong></div>
			</div>
		</div>
        <div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="icon-bullhorn"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (isset($this->_rootref['ADMIN_TOTAL_POST'])) ? $this->_rootref['ADMIN_TOTAL_POST'] : ''; ?></span>
				<div class="infobox-content"><strong><?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?></strong></div>
			</div>
		</div>
        
        
        <div class="infobox infobox-green">
			<div class="infobox-icon">
				<i class="icon-book"></i>
			</div>
			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo (isset($this->_rootref['ADMIN_TOTAL_FAQ'])) ? $this->_rootref['ADMIN_TOTAL_FAQ'] : ''; ?></span>
				<div class="infobox-content"><?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?></div>
			</div>
		</div>
        
	</div>     
    
    
</div>
<hr />
<div class="row-fluid">       
    <div class="span3 dashbox">
        <h3><?php echo (isset($this->_rootref['LANG_CP_MANAGE_CATEGORYS'])) ? $this->_rootref['LANG_CP_MANAGE_CATEGORYS'] : ''; ?></h3>
        <a class="btn btn-info" href="categorys.php?mode=new"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a>
	</div>
    
    <div class="span3 dashbox">
        <h3><?php echo (isset($this->_rootref['LANG_CP_MANAGE_ARTICLE'])) ? $this->_rootref['LANG_CP_MANAGE_ARTICLE'] : ''; ?></h3>
        <a class="btn btn-info" href="article.php?mode=new"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a>
	</div>
    
    <div class="span3 dashbox">
        <h3><?php echo (isset($this->_rootref['LANG_CP_MANAGE_NEWS'])) ? $this->_rootref['LANG_CP_MANAGE_NEWS'] : ''; ?></h3>
        <a class="btn btn-info" href="news.php?mode=new"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a>
	</div>
    
    <div class="span3 dashbox">
        <h3><?php echo (isset($this->_rootref['LANG_CP_MANAGE_FAQ'])) ? $this->_rootref['LANG_CP_MANAGE_FAQ'] : ''; ?></h3>
        <a class="btn btn-info" href="faq.php?mode=new"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a>
	</div>
    
</div>
<hr />
<?php $this->_tpl_include('footer.html'); ?>