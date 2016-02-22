<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="container">
<?php $this->_tpl_include('state_overview.html'); ?>
    <div class="row">   
        <div class="col-md-6">
            <h3><?php echo (isset($this->_rootref['LANG_POPULAR_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_POPULAR_KNOWLEDGE_BASE'] : ''; ?></h3>
            <?php if ($this->_rootref['NOTFOUND_ART']) {  ?>
                <ul class="nav nav-pills nav-stacked ticket-nav-details">
                    <?php $_loop_popular_article_count = (isset($this->_tpldata['loop_popular_article'])) ? sizeof($this->_tpldata['loop_popular_article']) : 0;if ($_loop_popular_article_count) {for ($_loop_popular_article_i = 0; $_loop_popular_article_i < $_loop_popular_article_count; ++$_loop_popular_article_i){$_loop_popular_article_val = &$this->_tpldata['loop_popular_article'][$_loop_popular_article_i]; ?>		
                    <li class="all">
                        <div class="ticket-wrap">
                            <div class="ticket-info ticket-all">
                                <span><i class="fa fa-lightbulb-o"></i></span>
                                <h4 class=""><a href="index.php?viewid=<?php echo $_loop_popular_article_val['ID']; ?>"><?php echo $_loop_popular_article_val['TITLE']; ?></a></h4>
                            </div>
                        </div>
                    </li>
                    <?php }} ?>
                </ul>
            <?php } else { ?>
                <div class="notfound-wrap">
                    <div class="icon"><i class="fa fa-coffee"></i></div>
                    <div class="text"><?php echo (isset($this->_rootref['LANG_PUBLISHNOW'])) ? $this->_rootref['LANG_PUBLISHNOW'] : ''; ?></div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <h3><?php echo (isset($this->_rootref['LANG_POPULAR_NEWS'])) ? $this->_rootref['LANG_POPULAR_NEWS'] : ''; ?></h3>
            <?php if ($this->_rootref['NOTFOUND_NEWS']) {  ?>
                <ul class="nav nav-pills nav-stacked ticket-nav-details">
                    <?php $_loop_popular_news_count = (isset($this->_tpldata['loop_popular_news'])) ? sizeof($this->_tpldata['loop_popular_news']) : 0;if ($_loop_popular_news_count) {for ($_loop_popular_news_i = 0; $_loop_popular_news_i < $_loop_popular_news_count; ++$_loop_popular_news_i){$_loop_popular_news_val = &$this->_tpldata['loop_popular_news'][$_loop_popular_news_i]; ?>		
                    <li class="all">
                        <div class="ticket-wrap">
                            <div class="ticket-info ticket-all">
                                <span><i class="fa fa-bullhorn"></i></span>
                                <h4 class=""><a href="index.php?viewid=<?php echo $_loop_popular_news_val['ID']; ?>"><?php echo $_loop_popular_news_val['TITLE']; ?></a></h4>
                            </div>
                        </div>
                    </li>
                    <?php }} ?>
                </ul>
            <?php } else { ?>
                <div class="notfound-wrap">
                    <div class="icon"><i class="fa fa-coffee"></i></div>
                    <div class="text"><?php echo (isset($this->_rootref['LANG_PUBLISHNOW'])) ? $this->_rootref['LANG_PUBLISHNOW'] : ''; ?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>