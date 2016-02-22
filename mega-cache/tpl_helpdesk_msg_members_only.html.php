<?php if (!defined('IN_MEGABUGS')) exit; ?><div class="col-sm-12 align-center member-messeges">
<strong><?php echo (isset($this->_rootref['LANG_CONTENT_IS_AVAILABLE_TO_MEMBERS_ONLY'])) ? $this->_rootref['LANG_CONTENT_IS_AVAILABLE_TO_MEMBERS_ONLY'] : ''; ?></strong>
<br /><br />
<?php echo (isset($this->_rootref['LANG_IF_YOU_ALREADY_HAVE_AN_ACCOUNT'])) ? $this->_rootref['LANG_IF_YOU_ALREADY_HAVE_AN_ACCOUNT'] : ''; ?>  <a href="users.php?mode=login"><?php echo (isset($this->_rootref['LANG_CLICK_HERE_TO_LOGIN'])) ? $this->_rootref['LANG_CLICK_HERE_TO_LOGIN'] : ''; ?></a>
<br /><br />
    <div class="member-messeges">
   <?php echo (isset($this->_rootref['LANG_IF_YOU_DONT_HAVE_ACCOUNT'])) ? $this->_rootref['LANG_IF_YOU_DONT_HAVE_ACCOUNT'] : ''; ?> <a href="users.php?mode=register"><?php echo (isset($this->_rootref['LANG_SIGN_UP'])) ? $this->_rootref['LANG_SIGN_UP'] : ''; ?></a>
    </div>
</div>