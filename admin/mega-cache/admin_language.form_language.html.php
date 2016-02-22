<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1>
		<i class="fa fa-language"></i> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?>&nbsp;&nbsp;
        <a href="language.php" class="btn btn-mini btn-success"><i class="fa fa-angle-left"></i> <?php echo (isset($this->_rootref['LANG_CP_BACK'])) ? $this->_rootref['LANG_CP_BACK'] : ''; ?></a>
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <?php if ($this->_rootref['ACTION_TOKEN']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
			<p>
				<i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['ACTION_TOKEN'])) ? $this->_rootref['ACTION_TOKEN'] : ''; ?> <?php echo (isset($this->_rootref['LANG_POST_SUCCESSFULLY'])) ? $this->_rootref['LANG_POST_SUCCESSFULLY'] : ''; ?>
			</p>
		</div>
        <?php } ?>
    </div>  
</div>
        
<div class="form-group">
    <form id="form1" name="form1" method="post" action="">
        <input type="hidden" name="id" value="<?php echo (isset($this->_rootref['ID'])) ? $this->_rootref['ID'] : ''; ?>" />
        <div class="row-fluid">
            <div class="span4">
                <div class="form-group">
                    <label for=""><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE_NAME'])) ? $this->_rootref['LANG_CP_LANGUAGE_NAME'] : ''; ?></label>
                    <input name="name" type="text" class="span12 form-control" id="name" value="<?php echo (isset($this->_rootref['NAME'])) ? $this->_rootref['NAME'] : ''; ?>" />
                </div>
            </div>
            <div class="span4">
                <div class="form-group">
                    <label for=""><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE_CODE'])) ? $this->_rootref['LANG_CP_LANGUAGE_CODE'] : ''; ?></label>
                    <input name="code" type="text" class="span12 form-control" id="code" value="<?php echo (isset($this->_rootref['CODE'])) ? $this->_rootref['CODE'] : ''; ?>"/>
                </div>
            </div>
            <div class="span4">
                <div class="form-group">
                    <label for=""><?php echo (isset($this->_rootref['LANG_CP_LANGUAGE_REGEX'])) ? $this->_rootref['LANG_CP_LANGUAGE_REGEX'] : ''; ?></label>
                    <input name="regex" type="text" class="span12 form-control" id="regex" value="<?php echo (isset($this->_rootref['REGEX'])) ? $this->_rootref['REGEX'] : ''; ?>"/>
                </div>
            </div>
        </div>
        <input type="submit" name="update_language" class="btn btn-primary" value="<?php echo (isset($this->_rootref['LANG_CP_UPDATE'])) ? $this->_rootref['LANG_CP_UPDATE'] : ''; ?>" id="update_language"/>
    </form>
</div>



<h2><?php echo (isset($this->_rootref['LANG_CP_EDITING'])) ? $this->_rootref['LANG_CP_EDITING'] : ''; ?> (<?php echo (isset($this->_rootref['NAME'])) ? $this->_rootref['NAME'] : ''; ?>) <?php echo (isset($this->_rootref['LANG_CP_PHRASE'])) ? $this->_rootref['LANG_CP_PHRASE'] : ''; ?></h2>
<div class="row-fluid">
	<div class="span12">
        <table id="jq-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
                    <th style="text-align: left;"><?php echo (isset($this->_rootref['LANG_CP_PHRASE_CODE'])) ? $this->_rootref['LANG_CP_PHRASE_CODE'] : ''; ?></th>
                    <th style="text-align: left;"><?php echo (isset($this->_rootref['LANG_CP_PHRASE'])) ? $this->_rootref['LANG_CP_PHRASE'] : ''; ?></th>
                    <th style="text-align: center;width: 60px;"><?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?></th>
				</tr>
			</thead>
            <tbody>
            <?php $_admin_loop_phrase_count = (isset($this->_tpldata['admin_loop_phrase'])) ? sizeof($this->_tpldata['admin_loop_phrase']) : 0;if ($_admin_loop_phrase_count) {for ($_admin_loop_phrase_i = 0; $_admin_loop_phrase_i < $_admin_loop_phrase_count; ++$_admin_loop_phrase_i){$_admin_loop_phrase_val = &$this->_tpldata['admin_loop_phrase'][$_admin_loop_phrase_i]; ?>
                <tr>
                    <td style="text-align: left;"><?php echo $_admin_loop_phrase_val['VARNAME']; ?></td>
					<td style="text-align: left;">
                    <div id="<?php echo $_admin_loop_phrase_val['ID']; ?>"><?php echo $_admin_loop_phrase_val['TEXT']; ?></div>
                    
                        <div id="divinput-<?php echo $_admin_loop_phrase_val['ID']; ?>" style="width: 100%;max-width: 500px;display: none;">
                            <input type="text" class="form-control span12" id="input-<?php echo $_admin_loop_phrase_val['ID']; ?>" name="pk" value="<?php echo $_admin_loop_phrase_val['TEXT']; ?>" style=""/>
                            <br />
                            <span class="btn btn-mini btn-success add_phrase" id="ok-<?php echo $_admin_loop_phrase_val['ID']; ?>" data-id="<?php echo $_admin_loop_phrase_val['ID']; ?>" style="display: inline-block;"><i class="fa fa-floppy-o"></i> Save</span>
                            <span class="btn btn-mini btn-danger remove_phrase" id="remove-<?php echo $_admin_loop_phrase_val['ID']; ?>" data-id="<?php echo $_admin_loop_phrase_val['ID']; ?>" style="display: inline-block;"><i class="fa fa-lock"></i> Cencel</span>
                        </div>
					</td>
                    <td style="text-align: center;">
                        <span  id="edit-<?php echo $_admin_loop_phrase_val['ID']; ?>" data-id="<?php echo $_admin_loop_phrase_val['ID']; ?>" class="btn btn-mini btn-success edit_phrase"><i class="fa fa-edit"></i> <?php echo (isset($this->_rootref['LANG_CP_EDIT'])) ? $this->_rootref['LANG_CP_EDIT'] : ''; ?></span>
                    </td>
				</tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>    




<script type="text/javascript">
$(document).ready(function(){

    $('.edit_phrase').on("click",function(){
        var _this = $(this);
        var id = _this.data('id');
        console.log('yes');
        $('#divinput-'+id).show();
    });

    $('.remove_phrase').on("click",function(){
        var _this = $(this);
        var id = _this.data('id');
        $('#divinput-'+id).hide();
    });

    $('.add_phrase').on("click",function(){
        var _this = $(this);
        var id = _this.data('id');
        var value = $('#input-'+id).val();
        var pk = id;
        console.log('value==>'+value);
        console.log('id==>'+id);
        $.ajax({
            url: "admin_ajax.php?do=setlang",
            type: "post",
            data: { pk: pk, value: value},
            success : function()
            {
                $('#'+id).html(value);
                $('#divinput-'+id).hide();
            }
        });
    });
})


</script>

<script type="text/javascript">
	$(function() {
		var oTable1 = $('#jq-table').dataTable( {
		"aoColumns": [
	      { "bSortable": false },
	      null,
		  { "bSortable": false }
		] } );
        $('.actionselect').remove();
	})
</script>


<?php $this->_tpl_include('footer.html'); ?>