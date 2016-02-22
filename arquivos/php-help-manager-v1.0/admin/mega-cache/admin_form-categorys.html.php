<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>

<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?>&nbsp;&nbsp;
        <a href="categorys.php" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_BACK'])) ? $this->_rootref['LANG_CP_BACK'] : ''; ?></a>
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <form action="categorys.php" method="post" name="form" class="form-horizontal">
            <input type="hidden" name="query" value="<?php echo (isset($this->_rootref['QUERY'])) ? $this->_rootref['QUERY'] : ''; ?>" />
            <input type="hidden" name="id" value="<?php echo (isset($this->_rootref['ID'])) ? $this->_rootref['ID'] : ''; ?>" />
            <input type="hidden" name="oldname" value="<?php echo (isset($this->_rootref['NAME'])) ? $this->_rootref['NAME'] : ''; ?>" />  
            <div class="control-group">
				<label class="control-label" for="form-field-name"><?php echo (isset($this->_rootref['LANG_CP_NAME'])) ? $this->_rootref['LANG_CP_NAME'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-name" name="name" placeholder="<?php echo (isset($this->_rootref['LANG_CP_NAME'])) ? $this->_rootref['LANG_CP_NAME'] : ''; ?>" value="<?php echo (isset($this->_rootref['NAME'])) ? $this->_rootref['NAME'] : ''; ?>" class="span4" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-name"><?php echo (isset($this->_rootref['LANG_CP_TYPE'])) ? $this->_rootref['LANG_CP_TYPE'] : ''; ?></label>
				<div class="controls">
					<select name="catetype">
                        <option value="article" <?php if ($this->_rootref['CATETYPE'] == ('article')) {  ?>selected="selected"<?php } ?>>Knowledge Base</option>
                        <option value="news" <?php if ($this->_rootref['CATETYPE'] == ('news')) {  ?>selected="selected"<?php } ?>>News</option>
                    </select>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-orders"><?php echo (isset($this->_rootref['LANG_CP_ORDER'])) ? $this->_rootref['LANG_CP_ORDER'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-orders" name="orders" value="<?php echo (isset($this->_rootref['ORDERS'])) ? $this->_rootref['ORDERS'] : ''; ?>"  class="" style="text-align: center;" />
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label" for="form-field-status"><?php echo (isset($this->_rootref['LANG_CP_STATUS'])) ? $this->_rootref['LANG_CP_STATUS'] : ''; ?></label>
				<div class="controls">
					<label style="width: 60px;">
						<input name="status"  class="ace-switch ace-switch-3" type="checkbox" <?php if ($this->_rootref['STATUS']) {  ?>checked=""<?php } ?> />
						<span class="lbl"></span>
					</label>
				</div>
			</div>
            <div class="form-actions">
				<button class="btn btn-small btn-success">
					 <?php if ($this->_rootref['QUERY'] == ('edit')) {  echo (isset($this->_rootref['LANG_CP_UPDATE'])) ? $this->_rootref['LANG_CP_UPDATE'] : ''; } else { echo (isset($this->_rootref['LANG_CP_ADD'])) ? $this->_rootref['LANG_CP_ADD'] : ''; } ?>
					<i class="icon-arrow-right icon-on-right bigger-110"></i>
				</button>
				&nbsp; &nbsp; &nbsp;
				<button class="btn btn-small btn-danger" type="reset">
					<i class="icon-undo bigger-110"></i>
					<?php echo (isset($this->_rootref['LANG_CP_RESET'])) ? $this->_rootref['LANG_CP_RESET'] : ''; ?>
				</button>
			</div>
        </form>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>