<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?>        
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <?php if ($this->_rootref['ACTION_TOKEN']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
			<p>
                <i class="icon-ok"></i> <?php echo (isset($this->_rootref['ACTION_TOKEN'])) ? $this->_rootref['ACTION_TOKEN'] : ''; ?>
			</p>
		</div>
        <?php } ?>
        <a href="categorys.php?mode=new&catetype=article" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a> 
        
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th><?php echo (isset($this->_rootref['LANG_CP_CATEGORY_ITEMS'])) ? $this->_rootref['LANG_CP_CATEGORY_ITEMS'] : ''; ?></th>
					<th style="width: 150px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_TYPE'])) ? $this->_rootref['LANG_CP_TYPE'] : ''; ?></th>
                    <th style="width: 20px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ITEMS'])) ? $this->_rootref['LANG_CP_ITEMS'] : ''; ?></th>
                    <th style="width: 20px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ORDER'])) ? $this->_rootref['LANG_CP_ORDER'] : ''; ?></th>
					<th style="width: 95px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ACTION'])) ? $this->_rootref['LANG_CP_ACTION'] : ''; ?></th>
				</tr>
			</thead>
            <tbody>
            <?php $_admin_loop_category_art_count = (isset($this->_tpldata['admin_loop_category_art'])) ? sizeof($this->_tpldata['admin_loop_category_art']) : 0;if ($_admin_loop_category_art_count) {for ($_admin_loop_category_art_i = 0; $_admin_loop_category_art_i < $_admin_loop_category_art_count; ++$_admin_loop_category_art_i){$_admin_loop_category_art_val = &$this->_tpldata['admin_loop_category_art'][$_admin_loop_category_art_i]; ?>
                <tr>
					<td><?php echo $_admin_loop_category_art_val['NAME']; ?></td>
                    <td style="text-align: center;"><?php echo $_admin_loop_category_art_val['CATETYPE']; ?></td>
					<td style="text-align: center;"><?php echo $_admin_loop_category_art_val['NUMPOSTS']; ?></td>
                    <td style="text-align: center;"><?php echo $_admin_loop_category_art_val['ORDERS']; ?></td>
					<td style="text-align: center;">
						<?php if ($_admin_loop_category_art_val['STATUS'] == (1)) {  ?>
                        <a href="categorys.php?action=activ&status=disable&id=<?php echo $_admin_loop_category_art_val['ID']; ?>" class="btn btn-mini btn-success tooltip-success" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_DISABLE'])) ? $this->_rootref['LANG_CP_DISABLE'] : ''; ?>">
							<i class="icon-ok bigger-120"></i>
						</a>
                        <?php } else { ?>
                        <a href="categorys.php?action=activ&status=enable&id=<?php echo $_admin_loop_category_art_val['ID']; ?>" class="btn btn-mini btn-danger tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_ENABLE'])) ? $this->_rootref['LANG_CP_ENABLE'] : ''; ?>">
							<i class="icon-ok bigger-120"></i>
						</a>
                        <?php } ?>

						<a href="categorys.php?action=edit&id=<?php echo $_admin_loop_category_art_val['ID']; ?>" class="btn btn-mini btn-info tooltip-info" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?>">
							<i class="icon-edit bigger-120"></i>
						</a>

						<a href="categorys.php?action=delete&id=<?php echo $_admin_loop_category_art_val['ID']; ?>&token=<?php echo (isset($this->_rootref['TOKEN'])) ? $this->_rootref['TOKEN'] : ''; ?>" class="btn btn-mini btn-danger tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_DELETE'])) ? $this->_rootref['LANG_CP_DELETE'] : ''; ?>">
							<i class="icon-trash bigger-120"></i>
						</a>
					</td>
				</tr>
            <?php }} ?>
            </tbody>
        </table>
        
        <hr />
        <a href="categorys.php?mode=new&catetype=news" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a> 
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th><?php echo (isset($this->_rootref['LANG_CP_CATEGORY_ITEMS'])) ? $this->_rootref['LANG_CP_CATEGORY_ITEMS'] : ''; ?></th>
					<th style="width: 150px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_TYPE'])) ? $this->_rootref['LANG_CP_TYPE'] : ''; ?></th>
                    <th style="width: 20px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ITEMS'])) ? $this->_rootref['LANG_CP_ITEMS'] : ''; ?></th>
                    <th style="width: 20px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ORDER'])) ? $this->_rootref['LANG_CP_ORDER'] : ''; ?></th>
					<th style="width: 95px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_ACTION'])) ? $this->_rootref['LANG_CP_ACTION'] : ''; ?></th>
				</tr>
			</thead>
            <tbody>
            <?php $_admin_loop_category_new_count = (isset($this->_tpldata['admin_loop_category_new'])) ? sizeof($this->_tpldata['admin_loop_category_new']) : 0;if ($_admin_loop_category_new_count) {for ($_admin_loop_category_new_i = 0; $_admin_loop_category_new_i < $_admin_loop_category_new_count; ++$_admin_loop_category_new_i){$_admin_loop_category_new_val = &$this->_tpldata['admin_loop_category_new'][$_admin_loop_category_new_i]; ?>
                <tr>
					<td><?php echo $_admin_loop_category_new_val['NAME']; ?></td>
                    <td style="text-align: center;"><?php echo $_admin_loop_category_new_val['CATETYPE']; ?></td>
					<td style="text-align: center;"><?php echo $_admin_loop_category_new_val['NUMPOSTS']; ?></td>
                    <td style="text-align: center;"><?php echo $_admin_loop_category_new_val['ORDERS']; ?></td>
					<td style="text-align: center;">
						<?php if ($_admin_loop_category_new_val['STATUS'] == (1)) {  ?>
                        <a href="categorys.php?action=activ&status=disable&id=<?php echo $_admin_loop_category_new_val['ID']; ?>" class="btn btn-mini btn-success tooltip-success" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_DISABLE'])) ? $this->_rootref['LANG_CP_DISABLE'] : ''; ?>">
							<i class="icon-ok bigger-120"></i>
						</a>
                        <?php } else { ?>
                        <a href="categorys.php?action=activ&status=enable&id=<?php echo $_admin_loop_category_new_val['ID']; ?>" class="btn btn-mini btn-danger tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_ENABLE'])) ? $this->_rootref['LANG_CP_ENABLE'] : ''; ?>">
							<i class="icon-ok bigger-120"></i>
						</a>
                        <?php } ?>

						<a href="categorys.php?action=edit&id=<?php echo $_admin_loop_category_new_val['ID']; ?>" class="btn btn-mini btn-info tooltip-info" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?>">
							<i class="icon-edit bigger-120"></i>
						</a>

						<a href="categorys.php?action=delete&id=<?php echo $_admin_loop_category_new_val['ID']; ?>&token=<?php echo (isset($this->_rootref['TOKEN'])) ? $this->_rootref['TOKEN'] : ''; ?>" class="btn btn-mini btn-danger tooltip-error" data-rel="tooltip" data-placement="top" title="" data-original-title="<?php echo (isset($this->_rootref['LANG_CP_DELETE'])) ? $this->_rootref['LANG_CP_DELETE'] : ''; ?>">
							<i class="icon-trash bigger-120"></i>
						</a>
					</td>
				</tr>
            <?php }} ?>
            </tbody>
        </table>

    </div>
    
</div>    
                   
                   
                            
<?php $this->_tpl_include('footer.html'); ?>