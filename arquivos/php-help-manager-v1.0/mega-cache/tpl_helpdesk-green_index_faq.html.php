<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="container">
<?php $this->_tpl_include('state_overview.html'); ?>
    <div class="row">   
        <div class="col-md-3">
            <div class="jumbotron sidebar_info">
                <i class="fa fa-life-ring"></i>
                <br />
                <?php echo (isset($this->_rootref['TOTAL_FAQ'])) ? $this->_rootref['TOTAL_FAQ'] : ''; ?> FAQ
            </div>
        </div>
        <div class="col-md-9">
            <?php if ($this->_rootref['NOTFOUND']) {  ?>
                <div class="panel-group" id="accordion">
                    <?php $_loop_faq_count = (isset($this->_tpldata['loop_faq'])) ? sizeof($this->_tpldata['loop_faq']) : 0;if ($_loop_faq_count) {for ($_loop_faq_i = 0; $_loop_faq_i < $_loop_faq_count; ++$_loop_faq_i){$_loop_faq_val = &$this->_tpldata['loop_faq'][$_loop_faq_i]; ?>	
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_loop_faq_val['ID']; ?>">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-life-ring"></i> <?php echo $_loop_faq_val['TITLE']; ?></h4>
                            </div>
                        </a>
                        <div id="collapse<?php echo $_loop_faq_val['ID']; ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="pull-left">
                                    <div class="voting_wrapper" id="<?php echo $_loop_faq_val['ID']; ?>">
                                        <div class="voting_btn">
                                            <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
                                        </div>
                                        <div class="voting_btn">
                                            <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear10"></div>
                                <p><?php echo $_loop_faq_val['CONTENT']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            <?php } else { $this->_tpl_include('index_notfound.html'); } ?>
        </div>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>