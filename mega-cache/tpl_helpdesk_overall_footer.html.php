<?php if (!defined('IN_MEGABUGS')) exit; ?></div>
        <div class="clearfix"></div>
    </div>
</div>
<footer class="footer">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
                <h2><?php echo (isset($this->_rootref['LANG_POPULAR_KNOWLEDGEBASE'])) ? $this->_rootref['LANG_POPULAR_KNOWLEDGEBASE'] : ''; ?></h2>
                <ul>
                    <?php $_loop_popularknow_count = (isset($this->_tpldata['loop_popularknow'])) ? sizeof($this->_tpldata['loop_popularknow']) : 0;if ($_loop_popularknow_count) {for ($_loop_popularknow_i = 0; $_loop_popularknow_i < $_loop_popularknow_count; ++$_loop_popularknow_i){$_loop_popularknow_val = &$this->_tpldata['loop_popularknow'][$_loop_popularknow_i]; ?>
                    <li><a href="index.php?post_id=<?php echo $_loop_popularknow_val['POST_ID']; ?>"><?php echo $_loop_popularknow_val['POST_TITLE']; ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
            <div class="col-sm-4">
                <h2><?php echo (isset($this->_rootref['LANG_POPULAR_NEWS'])) ? $this->_rootref['LANG_POPULAR_NEWS'] : ''; ?></h2>
                <ul>
                    <?php $_loop_popularnews_count = (isset($this->_tpldata['loop_popularnews'])) ? sizeof($this->_tpldata['loop_popularnews']) : 0;if ($_loop_popularnews_count) {for ($_loop_popularnews_i = 0; $_loop_popularnews_i < $_loop_popularnews_count; ++$_loop_popularnews_i){$_loop_popularnews_val = &$this->_tpldata['loop_popularnews'][$_loop_popularnews_i]; ?>
                    <li><a href="index.php?post_id=<?php echo $_loop_popularnews_val['POST_ID']; ?>"><?php echo $_loop_popularnews_val['POST_TITLE']; ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
            <div class="col-sm-4 center">
                <?php if ($this->_rootref['IS_USER']) {  ?>
                <br /><br />
                <?php } else { ?>
                <h3><?php echo (isset($this->_rootref['LANG_SIGN_UP_FOR_YOUR_FREE'])) ? $this->_rootref['LANG_SIGN_UP_FOR_YOUR_FREE'] : ''; ?></h3>
                <a href="users.php?mode=register" class="section-btn form-button form-button-green"><?php echo (isset($this->_rootref['LANG_JOIN_NEW'])) ? $this->_rootref['LANG_JOIN_NEW'] : ''; ?></a>
                <?php } ?>
                <ul class="social-icons">
                <?php if ($this->_rootref['GET_STATUS_FACEBOOK']) {  ?>
                    <li><a href="<?php echo (isset($this->_rootref['GET_URL_FACEBOOK'])) ? $this->_rootref['GET_URL_FACEBOOK'] : ''; ?>" class="ttip" data-toggle="tooltip" target="_blank" title="Facebook"><img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/facebook.png" alt="" /></a></li>
                <?php } if ($this->_rootref['GET_STATUS_TWITTER']) {  ?>
                    <li><a href="<?php echo (isset($this->_rootref['GET_URL_TWITTER'])) ? $this->_rootref['GET_URL_TWITTER'] : ''; ?>" class="ttip" data-toggle="tooltip" target="_blank" title="twitter"><img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/twitter.png" alt="" /></a></li>
                <?php } if ($this->_rootref['GET_STATUS_YOUTUBE']) {  ?>
                    <li><a href="<?php echo (isset($this->_rootref['GET_URL_YOUTUBE'])) ? $this->_rootref['GET_URL_YOUTUBE'] : ''; ?>" class="ttip" data-toggle="tooltip" target="_blank" title="youtube"><img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/youtube.png" alt="" /></a></li>
                <?php } if ($this->_rootref['GET_STATUS_GOOGLE']) {  ?>
                    <li><a href="<?php echo (isset($this->_rootref['GET_URL_GOOGLE'])) ? $this->_rootref['GET_URL_GOOGLE'] : ''; ?>" class="ttip" data-toggle="tooltip" target="_blank" title="google+"><img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/google.png" alt="" /></a></li>
                <?php } if ($this->_rootref['GET_STATUS_INSTAGRAM']) {  ?>
                    <li><a href="<?php echo (isset($this->_rootref['GET_URL_INSTAGRAM'])) ? $this->_rootref['GET_URL_INSTAGRAM'] : ''; ?>" class="ttip" data-toggle="tooltip" target="_blank" title="instagram"><img src="<?php echo (isset($this->_rootref['T_TEMPLATE_PATH'])) ? $this->_rootref['T_TEMPLATE_PATH'] : ''; ?>/assets/images/instagram.png" alt="" /></a></li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<footer class="footer-bottom">
    <div class="container">
        <div class="row">
        	<div class="col-sm-8 copyright"><?php echo (isset($this->_rootref['COPYRIGHT'])) ? $this->_rootref['COPYRIGHT'] : ''; ?></div>
            <div class="col-sm-4">
                <ul>
                    <li><a href="index.php?page=about"><?php echo (isset($this->_rootref['LANG_ABOUT_US'])) ? $this->_rootref['LANG_ABOUT_US'] : ''; ?></a></li>
                    <li><a href="index.php?page=contact"><?php echo (isset($this->_rootref['LANG_CONTACT'])) ? $this->_rootref['LANG_CONTACT'] : ''; ?></a></li>
                    <li><a href="index.php?page=privacy"><?php echo (isset($this->_rootref['LANG_PRIVACY'])) ? $this->_rootref['LANG_PRIVACY'] : ''; ?></a></li>
                </ul>
            </div>
        </div>
    </div> 
</footer>
</body>
</html>