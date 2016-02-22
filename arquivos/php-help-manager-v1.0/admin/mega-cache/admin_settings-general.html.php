<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>

<div class="page-header position-relative">
	<h1>
		<?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?>
	</h1>
</div>
<div class="row-fluid">
	<div class="span12">
    
        <?php if ($this->_rootref['ADMIN_SAVE']) {  ?>
        <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
			<p>
				<i class="icon-ok"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'])) ? $this->_rootref['LANG_CP_SAVED_SUCCESSFULLY'] : ''; ?>
			</p>
		</div>
        <?php } ?>
        <form action="settings.php?mode=general" method="post" name="form" class="form-horizontal">
            <input type="hidden" name="query" value="savesetting" />
            <div class="control-group">
				<label class="control-label" for="form-field-sitename"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_NAME'])) ? $this->_rootref['LANG_CP_WEBSITE_NAME'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-sitename" name="sitename" placeholder="Website Name" value="<?php echo (isset($this->_rootref['ADMIN_SITE_NAME'])) ? $this->_rootref['ADMIN_SITE_NAME'] : ''; ?>" class="span5" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-description"><?php echo (isset($this->_rootref['LANG_CP_TAGLINE'])) ? $this->_rootref['LANG_CP_TAGLINE'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-description" name="description" placeholder="Tagline" value="<?php echo (isset($this->_rootref['ADMIN_SITE_TAGLINE'])) ? $this->_rootref['ADMIN_SITE_TAGLINE'] : ''; ?>" class="span5" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-siteurl"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_URL'])) ? $this->_rootref['LANG_CP_WEBSITE_URL'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-siteurl" name="siteurl" placeholder="Website URL" value="<?php echo (isset($this->_rootref['ADMIN_SITE_URL'])) ? $this->_rootref['ADMIN_SITE_URL'] : ''; ?>" class="span5" dir="ltr" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-sitemail"><?php echo (isset($this->_rootref['LANG_CP_WEBSITE_EMAIL'])) ? $this->_rootref['LANG_CP_WEBSITE_EMAIL'] : ''; ?></label>
				<div class="controls">
					<input type="text" id="form-field-sitemail" name="sitemail" placeholder="Website Email" value="<?php echo (isset($this->_rootref['ADMIN_SITE_EMAIL'])) ? $this->_rootref['ADMIN_SITE_EMAIL'] : ''; ?>" class="span5" dir="ltr" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="defaultcatarticle"><?php echo (isset($this->_rootref['LANG_CP_DEFAULT_ITEMS_CATEGORY_ARTICLE'])) ? $this->_rootref['LANG_CP_DEFAULT_ITEMS_CATEGORY_ARTICLE'] : ''; ?></label>
				<div class="controls">
					<select name="defaultcatarticle" id="defaultcatarticle" class="span5">
                    <?php echo (isset($this->_rootref['ADMIN_DEFAULTCAT_ART'])) ? $this->_rootref['ADMIN_DEFAULTCAT_ART'] : ''; ?>
                    </select>
				</div>
			</div>
            
            <div class="control-group">
				<label class="control-label" for="defaultcatnews"><?php echo (isset($this->_rootref['LANG_CP_DEFAULT_ITEMS_CATEGORY_NEWS'])) ? $this->_rootref['LANG_CP_DEFAULT_ITEMS_CATEGORY_NEWS'] : ''; ?></label>
				<div class="controls">
					<select name="defaultcatnews" id="defaultcatnews" class="span5">
                    <?php echo (isset($this->_rootref['ADMIN_DEFAULTCAT_NEW'])) ? $this->_rootref['ADMIN_DEFAULTCAT_NEW'] : ''; ?>
                    </select>
				</div>
			</div>
            
            
            <div class="control-group">
				<label class="control-label" for="form-field-per_page"><?php echo (isset($this->_rootref['LANG_CP_ITEMS_PER_PAGE'])) ? $this->_rootref['LANG_CP_ITEMS_PER_PAGE'] : ''; ?></label>
				<div class="controls">
					<input type="number" class="input-mini" id="per_page" name="per_page" value="<?php echo (isset($this->_rootref['ADMIN_PER_PAGE'])) ? $this->_rootref['ADMIN_PER_PAGE'] : ''; ?>" style="text-align: center;" />
				</div>
			</div>
            
            
            <div class="control-group">
				<label class="control-label" for="form-field-facebook"><?php echo (isset($this->_rootref['LANG_CP_FACEBOOK'])) ? $this->_rootref['LANG_CP_FACEBOOK'] : ''; ?></label>
				<div class="controls">
                    <input type="text" id="form-field-facebook" name="facebook" placeholder="Facebook URL" value="<?php echo (isset($this->_rootref['ADMIN_FACEBOOK'])) ? $this->_rootref['ADMIN_FACEBOOK'] : ''; ?>" class="span5" dir="ltr" />
                </div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-twitter"><?php echo (isset($this->_rootref['LANG_CP_TWITTER'])) ? $this->_rootref['LANG_CP_TWITTER'] : ''; ?></label>
				<div class="controls">
                    <input type="text" id="form-field-twitter" name="twitter" placeholder="Twitter URL" value="<?php echo (isset($this->_rootref['ADMIN_TWITTER'])) ? $this->_rootref['ADMIN_TWITTER'] : ''; ?>" class="span5" dir="ltr" />
                </div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-google"><?php echo (isset($this->_rootref['LANG_CP_GOOGLE'])) ? $this->_rootref['LANG_CP_GOOGLE'] : ''; ?></label>
				<div class="controls">
                    <input type="text" id="form-field-google" name="googleplus" placeholder="Google+ URL" value="<?php echo (isset($this->_rootref['ADMIN_GOOGLE'])) ? $this->_rootref['ADMIN_GOOGLE'] : ''; ?>" class="span5" dir="ltr" />
                </div>
			</div>

            <div class="control-group">
				<label class="control-label" for="form-field-sitekey"><?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_KEYWORDS'] : ''; ?></label>
				<div class="controls">
					<input type="text" class="span12" id="sitekey" name="sitekey" value="<?php echo (isset($this->_rootref['ADMIN_SITEKEY'])) ? $this->_rootref['ADMIN_SITEKEY'] : ''; ?>" />
				</div>
			</div>
            <div class="control-group">
				<label class="control-label" for="form-field-sitedesc"><?php echo (isset($this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'])) ? $this->_rootref['LANG_CP_SITE_WIDE_META_DESCRIPTION'] : ''; ?></label>
				<div class="controls">
					<input type="text" class="span12" id="sitedesc" name="sitedesc" value="<?php echo (isset($this->_rootref['ADMIN_SITEDESC'])) ? $this->_rootref['ADMIN_SITEDESC'] : ''; ?>" />
				</div>
			</div>

            <div class="control-group">
				<label class="control-label" for="form-field-gzip_compress"><?php echo (isset($this->_rootref['LANG_CP_GZIP_COMPRESS'])) ? $this->_rootref['LANG_CP_GZIP_COMPRESS'] : ''; ?></label>
				<div class="controls">
					<label style="width: 60px;">
						<input name="gzip_compress"  class="ace-switch ace-switch-3" type="checkbox" <?php if ($this->_rootref['ADMIN_GZIP_COMPRESS']) {  ?>checked=""<?php } ?> />
						<span class="lbl"></span>
					</label>
				</div>
			</div>
            <div class="form-actions">
				<button class="btn btn-small btn-success">
					 <?php echo (isset($this->_rootref['LANG_CP_SAVE_CHANGES'])) ? $this->_rootref['LANG_CP_SAVE_CHANGES'] : ''; ?>
					<i class="icon-arrow-right icon-on-right bigger-110"></i>
				</button>
			</div>
        </form>
    </div>
</div>


<?php $this->_tpl_include('footer.html'); ?>