<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><i class="fa fa-television"></i> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h1>
</div>       
<div class="row-fluid">
    <div class="span12">
        <?php if ($this->_rootref['ADMIN_SAVETHEME']) {  ?>
        <div class="alert alert-block alert-success">
        	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
        	<p><strong><i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['LANG_CP_WELL_DONE'])) ? $this->_rootref['LANG_CP_WELL_DONE'] : ''; ?> </strong> <?php echo (isset($this->_rootref['LANG_CP_THEME_ACTIVATED_SUCCESSFULLY'])) ? $this->_rootref['LANG_CP_THEME_ACTIVATED_SUCCESSFULLY'] : ''; echo (isset($this->_rootref['THEMENAME'])) ? $this->_rootref['THEMENAME'] : ''; ?></p>
        </div>
        <?php } ?>
        <ol class="box_layout_list"><?php echo (isset($this->_rootref['ADMIN_SITE_THEME'])) ? $this->_rootref['ADMIN_SITE_THEME'] : ''; ?></ol>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>