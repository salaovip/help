<?php if (!defined('IN_MEGABUGS')) exit; if ($this->_rootref['NAV_CAT_ART']) {  ?>
    <div class="jumbotron sidebar_info">
        <i class="fa fa-lightbulb-o"></i>
        <br />
        <?php echo (isset($this->_rootref['TOTAL_ART'])) ? $this->_rootref['TOTAL_ART'] : ''; ?> <?php echo (isset($this->_rootref['LANG_ARTICLES'])) ? $this->_rootref['LANG_ARTICLES'] : ''; ?>
    </div>
    <ul class="nav nav-pills nav-stacked ticket-nav">     
        <?php $_loop_category_article_count = (isset($this->_tpldata['loop_category_article'])) ? sizeof($this->_tpldata['loop_category_article']) : 0;if ($_loop_category_article_count) {for ($_loop_category_article_i = 0; $_loop_category_article_i < $_loop_category_article_count; ++$_loop_category_article_i){$_loop_category_article_val = &$this->_tpldata['loop_category_article'][$_loop_category_article_i]; ?>
        <li <?php if ($this->_rootref['CATEIDSET'] == $_loop_category_article_val['ID']) {  ?> class="active"<?php } ?>>
            <a href="index.php?catid=<?php echo $_loop_category_article_val['ID']; ?>">
                <?php if ($this->_rootref['CATEIDSET'] == $_loop_category_article_val['ID']) {  ?>
                <i class="fa fa-folder-open-o"></i>
                <?php } else { ?>
                <i class="fa fa-folder-o"></i>
                <?php } ?>
                <span class="badge pull-right"><?php echo $_loop_category_article_val['TOTAL']; ?></span> <?php echo $_loop_category_article_val['NAME']; ?>
            </a>
        </li>
        <?php }} ?>
    </ul>
<?php } if ($this->_rootref['NAV_CAT_NEW']) {  ?>
    <div class="jumbotron sidebar_info">
        <i class="fa fa-bullhorn"></i>
        <br />
        <?php echo (isset($this->_rootref['TOTAL_POST'])) ? $this->_rootref['TOTAL_POST'] : ''; ?> <?php echo (isset($this->_rootref['LANG_INFOPOSTS'])) ? $this->_rootref['LANG_INFOPOSTS'] : ''; ?>
    </div>
    <ul class="nav nav-pills nav-stacked ticket-nav">
        <?php $_loop_category_news_count = (isset($this->_tpldata['loop_category_news'])) ? sizeof($this->_tpldata['loop_category_news']) : 0;if ($_loop_category_news_count) {for ($_loop_category_news_i = 0; $_loop_category_news_i < $_loop_category_news_count; ++$_loop_category_news_i){$_loop_category_news_val = &$this->_tpldata['loop_category_news'][$_loop_category_news_i]; ?>
        <li <?php if ($this->_rootref['CATEIDSET'] == $_loop_category_news_val['ID']) {  ?> class="active"<?php } ?>>
            <a href="index.php?catid=<?php echo $_loop_category_news_val['ID']; ?>">
                <?php if ($this->_rootref['CATEIDSET'] == $_loop_category_news_val['ID']) {  ?>
                <i class="fa fa-folder-open-o"></i>
                <?php } else { ?>
                <i class="fa fa-folder-o"></i>
                <?php } ?>
                <span class="badge pull-right"><?php echo $_loop_category_news_val['TOTAL']; ?></span> <?php echo $_loop_category_news_val['NAME']; ?>
            </a>
        </li>
        <?php }} ?>
    </ul> 
<?php } ?>