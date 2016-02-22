<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><i class="fa fa-language"></i> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <?php if ($this->_rootref['ACTION_TOKEN']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
			<p><i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['ACTION_TOKEN'])) ? $this->_rootref['ACTION_TOKEN'] : ''; ?></p>
		</div>
        <?php } ?>
        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th style="width: 50px;text-align: center;">ID</th>
                    <th><?php echo (isset($this->_rootref['LANG_CP_PACKAGE_NAME'])) ? $this->_rootref['LANG_CP_PACKAGE_NAME'] : ''; ?></th>
					<th style="width: 400px;text-align: center;"><?php echo (isset($this->_rootref['LANG_CP_OPTIONS'])) ? $this->_rootref['LANG_CP_OPTIONS'] : ''; ?></th>
				</tr>
			</thead>
            <tbody>
            <?php $_admin_loop_language_count = (isset($this->_tpldata['admin_loop_language'])) ? sizeof($this->_tpldata['admin_loop_language']) : 0;if ($_admin_loop_language_count) {for ($_admin_loop_language_i = 0; $_admin_loop_language_i < $_admin_loop_language_count; ++$_admin_loop_language_i){$_admin_loop_language_val = &$this->_tpldata['admin_loop_language'][$_admin_loop_language_i]; ?>
                <tr>
					<td style="text-align: center;"><?php echo $_admin_loop_language_val['ID']; ?></td>
                    <td><?php echo $_admin_loop_language_val['NAME']; ?> (<?php echo $_admin_loop_language_val['CODE']; ?>) 
                    <?php if ($_admin_loop_language_val['DEFAULT']) {  ?>
                    <span style="color: #cccccc"><?php echo (isset($this->_rootref['LANG_CP_AS_DEFAULT_LANGUAGE'])) ? $this->_rootref['LANG_CP_AS_DEFAULT_LANGUAGE'] : ''; ?></span>
                    <?php } ?>
                    </td>
					<td style="text-align: center;line-height: 14px;">
                        <a href="language.php?edit_language=<?php echo $_admin_loop_language_val['ID']; ?>" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_EDIT_PHRASES'])) ? $this->_rootref['LANG_CP_EDIT_PHRASES'] : ''; ?></a>
                        <a href="language.php?download=<?php echo $_admin_loop_language_val['ID']; ?>" target="_blank" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_EXPORT'])) ? $this->_rootref['LANG_CP_EXPORT'] : ''; ?></a>
                        <a href="language.php?make_default=<?php echo $_admin_loop_language_val['ID']; ?>" class="btn btn-mini btn-success"><?php echo (isset($this->_rootref['LANG_CP_MAKE_DEFAULT'])) ? $this->_rootref['LANG_CP_MAKE_DEFAULT'] : ''; ?></a>
                        <?php if ($_admin_loop_language_val['ACTIVE'] == (1)) {  ?>
                        <a href="language.php?action=activ&status=disable&id=<?php echo $_admin_loop_language_val['ID']; ?>" class="btn btn-mini btn-success">
							<i class="icon-ok bigger-120"></i> <?php echo (isset($this->_rootref['LANG_CP_DEACTIVATE'])) ? $this->_rootref['LANG_CP_DEACTIVATE'] : ''; ?>
						</a>
                        <?php } else { ?>
                        <a href="language.php?action=activ&status=enable&id=<?php echo $_admin_loop_language_val['ID']; ?>" class="btn btn-mini btn-danger">
							<i class="icon-ok bigger-120"></i> <?php echo (isset($this->_rootref['LANG_CP_ACTIVATE'])) ? $this->_rootref['LANG_CP_ACTIVATE'] : ''; ?>
						</a>
                        <?php } ?>
						<a href="language.php?action=delete&id=<?php echo $_admin_loop_language_val['ID']; ?>&token=<?php echo (isset($this->_rootref['TOKEN'])) ? $this->_rootref['TOKEN'] : ''; ?>" onclick="confirm('Are you sure you want to delete \'<?php echo $_admin_loop_language_val['NAME']; ?>\' pack');" class="btn btn-mini btn-danger">
							<i class="icon-trash bigger-120"></i> <?php echo (isset($this->_rootref['LANG_CP_DELETE'])) ? $this->_rootref['LANG_CP_DELETE'] : ''; ?>
						</a>
					</td>
				</tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['LANG_CP_ADD_NEW_PHRASE'])) ? $this->_rootref['LANG_CP_ADD_NEW_PHRASE'] : ''; ?>
	</h1>
</div>
<form name="form1" method="post" action="language.php">
    <fieldset class="fieldset">
        <div class="row-fluid">
            <div class="span6">
                <label for="prasecode"><?php echo (isset($this->_rootref['LANG_CP_PHRASE_CODE'])) ? $this->_rootref['LANG_CP_PHRASE_CODE'] : ''; ?></label>
                <input type="text" name="varname" id="prasecode" class="span8" />
            </div>
            <div class="span6">
                <label for="language"><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE'])) ? $this->_rootref['LANG_CP_LANGUAGE'] : ''; ?></label>
                <select name="lang_code" id="language" class="span8">
                    <?php $_admin_loop_language_count = (isset($this->_tpldata['admin_loop_language'])) ? sizeof($this->_tpldata['admin_loop_language']) : 0;if ($_admin_loop_language_count) {for ($_admin_loop_language_i = 0; $_admin_loop_language_i < $_admin_loop_language_count; ++$_admin_loop_language_i){$_admin_loop_language_val = &$this->_tpldata['admin_loop_language'][$_admin_loop_language_i]; ?>
                    <option value="<?php echo $_admin_loop_language_val['CODE']; ?>"><?php echo $_admin_loop_language_val['NAME']; ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <label for="phrasetext"><?php echo (isset($this->_rootref['LANG_CP_PHRASE_TEXT'])) ? $this->_rootref['LANG_CP_PHRASE_TEXT'] : ''; ?></label>
                <textarea name="text" class="span12" id="text" rows="3"></textarea>
            </div>
        </div>
    </fieldset>
    <div class="row-fluid">
        <div class="span2">
            <input type="hidden" name="addlang" value="1" />
            <input type="submit" name="add_phrase" id="add_phrase" value="<?php echo (isset($this->_rootref['LANG_CP_ADD_PHRASE'])) ? $this->_rootref['LANG_CP_ADD_PHRASE'] : ''; ?>" class="btn btn-primary btn-sm" />
        </div>
        <div class="span10">
            <p class="alert alert-info"><?php echo (isset($this->_rootref['LANG_CP_INFO_ADD_NEWPHRASE'])) ? $this->_rootref['LANG_CP_INFO_ADD_NEWPHRASE'] : ''; ?></p>
        </div>
    </div>
</form>
<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['LANG_CP_ADD_NEW_LANGUAGE'])) ? $this->_rootref['LANG_CP_ADD_NEW_LANGUAGE'] : ''; ?>
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <form action="language.php?import" method="post" enctype="multipart/form-data" name="import_language" id="import_language">
            <h4><?php echo (isset($this->_rootref['LANG_CP_UPLOAD_FILE'])) ? $this->_rootref['LANG_CP_UPLOAD_FILE'] : ''; ?></h4>
            <table>
            <tbody>
                <tr>
                    <td style="width: 350px;"><?php echo (isset($this->_rootref['LANG_CP_INF_UPLOAD_LANGUAGE'])) ? $this->_rootref['LANG_CP_INF_UPLOAD_LANGUAGE'] : ''; ?></td>
                    <td style="text-align: center;">
                        <input type="file" name="lang_file" id="lang_file" class="marginBottomLarge">
                    </td>
                    <td style="text-align: center;width: 100px">
                        <input type="submit" name="add_language" id="add_language" value="<?php echo (isset($this->_rootref['LANG_CP_ADD_LANGUAGE'])) ? $this->_rootref['LANG_CP_ADD_LANGUAGE'] : ''; ?>" class="btn btn-primary">
                    </td>
                </tr>
            </tbody>
            </table>
        </form>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>