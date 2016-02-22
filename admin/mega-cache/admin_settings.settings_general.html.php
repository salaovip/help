<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><i class="fa fa-cog"></i> <?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></h1>
</div>
<div class="row-fluid">
	<div class="span12">
        <?php if ($this->_rootref['ADMIN_SAVE']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
			<p><i class="fa fa-chevron-circle-down"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'])) ? $this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'] : ''; ?></p>
		</div>
        <?php } ?>
        <form action="settings.php?mode=general" method="post" name="form" class="form-horizontal checkbox_form">
            <input type="hidden" name="query" value="savesetting" />
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-sitename"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_NAME'])) ? $this->_rootref['LANG_CP_WEBSITE_NAME'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" id="form-field-sitename" name="sitename" placeholder="<?php echo (isset($this->_rootref['LANG_CP_WEBSITE_NAME'])) ? $this->_rootref['LANG_CP_WEBSITE_NAME'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITE_NAME'])) ? $this->_rootref['ADMIN_SITE_NAME'] : ''; ?>" class="span5" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-description"><?php echo (isset($this->_rootref['LANG_CP_TAGLINE'])) ? $this->_rootref['LANG_CP_TAGLINE'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" id="form-field-description" name="description" placeholder="<?php echo (isset($this->_rootref['LANG_CP_TAGLINE'])) ? $this->_rootref['LANG_CP_TAGLINE'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITE_TAGLINE'])) ? $this->_rootref['ADMIN_SITE_TAGLINE'] : ''; ?>" class="span5" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-siteurl"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_URL'])) ? $this->_rootref['LANG_CP_WEBSITE_URL'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" id="form-field-siteurl" name="siteurl" placeholder="<?php echo (isset($this->_rootref['LANG_CP_WEBSITE_URL'])) ? $this->_rootref['LANG_CP_WEBSITE_URL'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITE_URL'])) ? $this->_rootref['ADMIN_SITE_URL'] : ''; ?>" class="span5" dir="ltr" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-sitemail"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_EMAIL'])) ? $this->_rootref['LANG_CP_WEBSITE_EMAIL'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" id="form-field-sitemail" name="sitemail" placeholder="<?php echo (isset($this->_rootref['LANG_CP_WEBSITE_EMAIL'])) ? $this->_rootref['LANG_CP_WEBSITE_EMAIL'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITE_EMAIL'])) ? $this->_rootref['ADMIN_SITE_EMAIL'] : ''; ?>" class="span5" dir="ltr" />
				</div>
			</div>

            <div class="control-group">
				<label class="control-label control-label2" for="form-field-sitekey"><?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" class="span12" id="sitekey" name="sitekey" placeholder="<?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITEKEY'])) ? $this->_rootref['ADMIN_SITEKEY'] : ''; ?>" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-sitedesc"><?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'] : ''; ?></label>
				<div class="controls controls2">
					<input type="text" class="span12" id="sitedesc" name="sitedesc" placeholder="<?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_SITEDESC'])) ? $this->_rootref['ADMIN_SITEDESC'] : ''; ?>" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-per_page"><?php echo (isset($this->_rootref['LANG_CP_ITEMS_PER_PAGE'])) ? $this->_rootref['LANG_CP_ITEMS_PER_PAGE'] : ''; ?></label>
				<div class="controls controls2">
					<input type="number" class="input-mini span2" id="per_page" name="per_page" value="<?php echo (isset($this->_rootref['ADMIN_PER_PAGE'])) ? $this->_rootref['ADMIN_PER_PAGE'] : ''; ?>" style="text-align: center;" />
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-per_popular"><?php echo (isset($this->_rootref['LANG_CP_ITEMS_PER_POPULAR'])) ? $this->_rootref['LANG_CP_ITEMS_PER_POPULAR'] : ''; ?></label>
				<div class="controls controls2">
					<input type="number" class="input-mini span2" id="per_popular" name="per_popular" value="<?php echo (isset($this->_rootref['ADMIN_PER_POPULAR'])) ? $this->_rootref['ADMIN_PER_POPULAR'] : ''; ?>" style="text-align: center;" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-per_page"><?php echo (isset($this->_rootref['LANG_CP_TIMEZONE'])) ? $this->_rootref['LANG_CP_TIMEZONE'] : ''; ?></label>
				<div class="controls controls2">
                    <select id="timezone_string" name="timezone_string" aria-describedby="timezone-description"  class="span5"><?php echo (isset($this->_rootref['ADMIN_TIMEZONE_OPTIONS'])) ? $this->_rootref['ADMIN_TIMEZONE_OPTIONS'] : ''; ?></select>
                    <?php echo (isset($this->_rootref['LANG_CP_UTC_TIME_IS'])) ? $this->_rootref['LANG_CP_UTC_TIME_IS'] : ''; ?><span class="label label-info"><?php echo (isset($this->_rootref['ADMIN_IS_TZONE'])) ? $this->_rootref['ADMIN_IS_TZONE'] : ''; ?></span> <?php echo (isset($this->_rootref['LANG_CP_LOCAL_TIME_IS'])) ? $this->_rootref['LANG_CP_LOCAL_TIME_IS'] : ''; ?> <span class="label label-success"><?php echo (isset($this->_rootref['ADMIN_LOCAL_TZONE'])) ? $this->_rootref['ADMIN_LOCAL_TZONE'] : ''; ?></span>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-date-format"><?php echo (isset($this->_rootref['LANG_DATE_FORMAT'])) ? $this->_rootref['LANG_DATE_FORMAT'] : ''; ?></label>
				<div class="controls controls2">
				    <input type="text" id="form-field-date-format" name="dateformat" placeholder="<?php echo (isset($this->_rootref['LANG_DATE_FORMAT'])) ? $this->_rootref['LANG_DATE_FORMAT'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_DATEFORMAT'])) ? $this->_rootref['ADMIN_DATEFORMAT'] : ''; ?>" class="span3" />
                    <span class="example"> <?php echo (isset($this->_rootref['GET_DATEFORMAT'])) ? $this->_rootref['GET_DATEFORMAT'] : ''; ?></span>
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-time-format"><?php echo (isset($this->_rootref['LANG_TIME_FORMAT'])) ? $this->_rootref['LANG_TIME_FORMAT'] : ''; ?></label>
				<div class="controls controls2">
				    <input type="text" id="form-field-time-format" name="timeformat" placeholder="><?php echo (isset($this->_rootref['LANG_TIME_FORMAT'])) ? $this->_rootref['LANG_TIME_FORMAT'] : ''; ?>" value="<?php echo (isset($this->_rootref['ADMIN_TIMEFORMAT'])) ? $this->_rootref['ADMIN_TIMEFORMAT'] : ''; ?>" class="span3" />
                    <span class="example"> <?php echo (isset($this->_rootref['GET_TIMEFORMAT'])) ? $this->_rootref['GET_TIMEFORMAT'] : ''; ?></span>
				</div>
			</div>
            <div class="control-group">
				<label class="control-label control-label2" for="form-field-gzip_compress"><?php echo (isset($this->_rootref['LANG_CP_GZIP_COMPRESS'])) ? $this->_rootref['LANG_CP_GZIP_COMPRESS'] : ''; ?></label>
				<div class="controls controls2">
					<label><input name="gzip_compress" type="checkbox" <?php if ($this->_rootref['ADMIN_GZIP_COMPRESS']) {  ?>checked=""<?php } ?> /></label>
				</div>
			</div>
            <div class="form-actions">
				<button class="btn btn-small btn-success"><i class="fa fa-save"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVE_CHANGES'])) ? $this->_rootref['LANG_CP_SAVE_CHANGES'] : ''; ?></button>
			</div>
        </form>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
   var ajaxurl = 'admin_ajax.php';
	$("input[name='dateformat'], input[name='timeformat']").change( function() {
		var format = $(this);
        format.siblings('.example').html('<i class="fa fa-spinner fa-pulse"></i>');
		$.post(ajaxurl, {
				action: 'dateformat' == format.attr('name') ? 'dateformat' : 'timeformat',
				date : format.val()
			}, function(d) { format.siblings('.example').text(d); } );
	});
});
</script>
<?php $this->_tpl_include('footer.html'); ?>