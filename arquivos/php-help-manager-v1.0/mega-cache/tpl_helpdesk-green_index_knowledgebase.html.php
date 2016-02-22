<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="container">
<?php $this->_tpl_include('state_overview.html'); ?>
    <div class="row">   
        <div class="col-md-3">
            <?php $this->_tpl_include('sidebar.html'); ?>
        </div>
        <div class="col-md-9">
            <?php if ($this->_rootref['NOTFOUND']) {  ?>
                <ul class="nav nav-pills nav-stacked ticket-nav-details">
                    <?php $_loop_article_count = (isset($this->_tpldata['loop_article'])) ? sizeof($this->_tpldata['loop_article']) : 0;if ($_loop_article_count) {for ($_loop_article_i = 0; $_loop_article_i < $_loop_article_count; ++$_loop_article_i){$_loop_article_val = &$this->_tpldata['loop_article'][$_loop_article_i]; ?>		
                    <li>
                        <div class="ticket-wrap">
                            <div class="ticket-info">
                                <span><i class="fa fa-lightbulb-o"></i></span>
                                <h4 class=""><a href="index.php?viewid=<?php echo $_loop_article_val['ID']; ?>"><?php echo $_loop_article_val['TITLE']; ?></a></h4>
                                <p><a href="index.php?catid=<?php echo $_loop_article_val['CATID']; ?>"><?php echo $_loop_article_val['CATENAME']; ?></a></p>
                            </div>
                            <div class="ticket-status">
                                
                                <div class="voting_wrapper" id="<?php echo $_loop_article_val['ID']; ?>">
                                    <div class="voting_btn">
                                        <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
                                    </div>
                                    <div class="voting_btn">
                                        <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
                                    </div>
                                </div>
                                <br />
                                <i class="fa fa-eye"></i> <?php echo $_loop_article_val['VIEWS']; ?>
                                
                                
                            </div>
                            <div class="ticket-date all-tickets">
                                <?php echo $_loop_article_val['MODIFIED']; ?>
                            </div>
                        </div>
                    </li>
                    <?php }} ?>
                </ul>
                <?php if ($this->_rootref['SHOW_PAGINATION']) {  ?>
                    <ul class="pagination pagination-sm">
                        <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?>
                    </ul>
                <?php } } else { $this->_tpl_include('index_notfound.html'); } ?>
        </div>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>