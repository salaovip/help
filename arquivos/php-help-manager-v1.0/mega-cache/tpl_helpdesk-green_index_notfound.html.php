<?php if (!defined('IN_MEGABUGS')) exit; ?><div class="notfound-wrap">
    <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
    <div class="text"><?php echo (isset($this->_rootref['LANG_NO_RESULT'])) ? $this->_rootref['LANG_NO_RESULT'] : ''; ?>
    <br />
    <small><?php echo (isset($this->_rootref['LANG_SEARCH_THE_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_SEARCH_THE_KNOWLEDGE_BASE'] : ''; ?></small>
    </div>
    <?php $this->_tpl_include('sidebar_search.html'); ?>
</div>