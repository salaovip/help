<?php if (!defined('IN_MEGABUGS')) exit; ?><div class="box-search">
    <form role="search" method="get" id="searchform" class="nav-search-form" action="index.php">
        <input type="text" name="search" id="search" class="form-control"  placeholder="<?php echo (isset($this->_rootref['LANG_SEARCH_THE_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_SEARCH_THE_KNOWLEDGE_BASE'] : ''; ?>" value="" />
        <button type="submit" class="btn btn-primary nav-search-submit" value="search" name="submit"><i class="fa fa-search"></i> <?php echo (isset($this->_rootref['LANG_SEARCH'])) ? $this->_rootref['LANG_SEARCH'] : ''; ?></button>
    </form>
</div>