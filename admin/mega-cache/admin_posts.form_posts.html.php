<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?> &nbsp;<?php echo (isset($this->_rootref['POST_TYPE'])) ? $this->_rootref['POST_TYPE'] : ''; ?>&nbsp;
    <?php if ($this->_rootref['QUERY'] == ('update')) {  ?>
        <a href="<?php echo (isset($this->_rootref['THIS_SCRIPT'])) ? $this->_rootref['THIS_SCRIPT'] : ''; ?>?post_type=<?php echo (isset($this->_rootref['POST_TYPE'])) ? $this->_rootref['POST_TYPE'] : ''; ?>&mode=new" class="btn btn-mini btn-success"><i class="fa fa-plus-circle"></i> <?php echo (isset($this->_rootref['LANG_CP_ADD_NEW'])) ? $this->_rootref['LANG_CP_ADD_NEW'] : ''; ?></a>
    <?php } ?>
    </h1>
</div>
<?php if ($this->_rootref['ACTION_TOKEN']) {  ?>
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
	<p><i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['ACTION_TOKEN'])) ? $this->_rootref['ACTION_TOKEN'] : ''; ?></p>
</div>
<?php } ?>      
<form action="<?php echo (isset($this->_rootref['THIS_SCRIPT'])) ? $this->_rootref['THIS_SCRIPT'] : ''; ?>?post_type=<?php echo (isset($this->_rootref['POST_TYPE'])) ? $this->_rootref['POST_TYPE'] : ''; ?>" method="post" name="form" class="checkbox_form">
<input type="hidden" name="query" value="<?php echo (isset($this->_rootref['QUERY'])) ? $this->_rootref['QUERY'] : ''; ?>" />
<input type="hidden" name="id" value="<?php echo (isset($this->_rootref['POST_ID'])) ? $this->_rootref['POST_ID'] : ''; ?>" />
<input type="hidden" name="oldtitle" value="<?php echo (isset($this->_rootref['TITLE'])) ? $this->_rootref['TITLE'] : ''; ?>" /> 
    <div class="row-fluid">
    	<div class="span9">
            <div class="control-group">
				<div class="controls">
					<input type="text" id="form-field-title" name="title" placeholder="<?php echo (isset($this->_rootref['LANG_CP_ENTER_TITLE_HERE'])) ? $this->_rootref['LANG_CP_ENTER_TITLE_HERE'] : ''; ?>" value="<?php echo (isset($this->_rootref['POST_TITLE'])) ? $this->_rootref['POST_TITLE'] : ''; ?>" class="span12" />
				</div>
			</div>
            <div class="control-group">
                <div style="margin: 5px 0;">
                    <div class="span8">
                        <a href="javascript:void(0)" id="insert-picture-button" class="btn btn-small btn-primary" data-editor="content" title="<?php echo (isset($this->_rootref['LANG_ADD_PICTURE'])) ? $this->_rootref['LANG_ADD_PICTURE'] : ''; ?>">
                            <i class="fa fa-picture-o"></i> <?php echo (isset($this->_rootref['LANG_ADD_PICTURE'])) ? $this->_rootref['LANG_ADD_PICTURE'] : ''; ?>
                        </a>
                    </div>
                    <div class="span4" style="text-align: right;">
                        <?php if ($this->_rootref['QUERY'] == ('update')) {  ?>
                        <a href="../index.php?post_id=<?php echo (isset($this->_rootref['POST_ID'])) ? $this->_rootref['POST_ID'] : ''; ?>" target="_blank" id="insert-picture-button" class="btn btn-small btn-inverse" title="<?php echo (isset($this->_rootref['LANG_CP_VIEW_POST'])) ? $this->_rootref['LANG_CP_VIEW_POST'] : ''; ?>">
                        <i class="fa fa-eye"></i> <?php echo (isset($this->_rootref['LANG_CP_VIEW_POST'])) ? $this->_rootref['LANG_CP_VIEW_POST'] : ''; ?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="clear"></div>
				<div class="controls">
                    <textarea class="wp-editor-area" style="height: 300px" autocomplete="off" cols="40" name="content" id="content"><?php echo (isset($this->_rootref['POST_CONTENT'])) ? $this->_rootref['POST_CONTENT'] : ''; ?></textarea>
				</div>
			</div>
        </div>
        <div class="span3">
            <div class="widget-box">
				<div class="widget-header">
					<h5 class="smaller"><?php echo (isset($this->_rootref['LANG_CP_PUBLISH'])) ? $this->_rootref['LANG_CP_PUBLISH'] : ''; ?></h5>
				</div>
				<div class="widget-body">
					<div class="widget-main padding-6">
                        <span class="span12" style="min-height: 0;"></span>
                        <label class="control-label span4"><?php echo (isset($this->_rootref['LANG_CP_STATUS'])) ? $this->_rootref['LANG_CP_STATUS'] : ''; ?></label>
        				<div class="controls span6">
        					<label><input name="status" type="checkbox" <?php if ($this->_rootref['POST_STATS']) {  ?>checked=""<?php } ?> /></label>
        				</div>
                        <div class="clear"></div>
                        <label class="control-label span4"><?php echo (isset($this->_rootref['LANG_CP_PIN_POST'])) ? $this->_rootref['LANG_CP_PIN_POST'] : ''; ?></label>
        				<div class="controls span6">
        					<label><input name="pin_post" type="checkbox" <?php if ($this->_rootref['POST_PIN_POST']) {  ?>checked=""<?php } ?> /></label>
        				</div>
                        <div class="clear"></div>
                        <label class="control-label span4"><?php echo (isset($this->_rootref['LANG_CP_USER_ONLY'])) ? $this->_rootref['LANG_CP_USER_ONLY'] : ''; ?></label>
        				<div class="controls span6">
        					<label><input name="user_only" type="checkbox" <?php if ($this->_rootref['POST_USER_ONLY']) {  ?>checked=""<?php } ?> /></label>
        				</div>
                        <div class="clear"></div>
                        <div class="widget-actions">
            				<button class="btn btn-small btn-success"><?php if ($this->_rootref['QUERY'] == ('update')) {  echo (isset($this->_rootref['LANG_CP_UPDATE'])) ? $this->_rootref['LANG_CP_UPDATE'] : ''; } else { echo (isset($this->_rootref['LANG_CP_PUBLISH'])) ? $this->_rootref['LANG_CP_PUBLISH'] : ''; } ?></button>
            			</div>              
					</div>
				</div>
			</div>
            <div class="clear_20"></div>
            <div class="widget-box">
				<div class="widget-header">
					<h5 class="smaller"><?php echo (isset($this->_rootref['LANG_CP_CATEGORIES'])) ? $this->_rootref['LANG_CP_CATEGORIES'] : ''; ?></h5>
				</div>
				<div class="widget-body">
					<div class="widget-main padding-6">
                        <select class="span12" name="term_id"><?php echo (isset($this->_rootref['OPTION_TERMS'])) ? $this->_rootref['OPTION_TERMS'] : ''; ?></select>
					</div>
				</div>
			</div>
            <div class="clear_20"></div>
        </div>
    </div>
</form>
<script src="assets/plugins/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea#content",
    plugins: [
         "code,charmap,colorpicker,hr,lists,media,paste,tabfocus,textcolor,fullscreen,wordcount,link,autolink,image,imagetools"
    ],
    resize:false,menubar:false,indent:false,relative_urls:false,remove_script_host:false,convert_urls:false,browser_spellcheck:true,
    fix_list_elements:true,entities:"38,amp,60,lt,62,gt",entity_encoding:"raw",keep_styles:false,
    toolbar1:"bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright",
    toolbar2:"link,unlink,image,media,code,formatselect,underline,alignjustify",
    toolbar3:"forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo",
    toolbar4:"",
 }); 
</script>
<?php $this->_tpl_include('footer.html'); ?>