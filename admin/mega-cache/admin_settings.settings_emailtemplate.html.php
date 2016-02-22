<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><i class="fa fa-user"></i> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <?php if ($this->_rootref['ADMIN_SAVE']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
			<p><i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'])) ? $this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'] : ''; ?></p>
		</div>
        <?php } ?>
        <table id="jq-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
                    <th><?php echo (isset($this->_rootref['LANG_CP_TITLE'])) ? $this->_rootref['LANG_CP_TITLE'] : ''; ?></th>
                    <th style="width: 60px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?></th>
				</tr>
			</thead>
            <tbody>
            <?php $_admin_loop_templates_count = (isset($this->_tpldata['admin_loop_templates'])) ? sizeof($this->_tpldata['admin_loop_templates']) : 0;if ($_admin_loop_templates_count) {for ($_admin_loop_templates_i = 0; $_admin_loop_templates_i < $_admin_loop_templates_count; ++$_admin_loop_templates_i){$_admin_loop_templates_val = &$this->_tpldata['admin_loop_templates'][$_admin_loop_templates_i]; ?>
                <tr >
                    <td><strong><?php echo $_admin_loop_templates_val['TITLE']; ?></strong></td>
                    <td style="text-align: center;"><a href="settings.php?mode=emailtemplate&action=edit&template=<?php echo $_admin_loop_templates_val['TEMPLATE']; ?>"><?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?></a></td>
				</tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div> 
<?php $this->_tpl_include('footer.html'); ?>