<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('overall_header.html'); ?>
<div class="col-md-12 main-content">
    <div class="row question-filter" id="question_filter">
        <div class="col-md-12 current-category">
            <span><i class="fa fa-life-ring"></i> <?php echo (isset($this->_rootref['LANG_FAQ'])) ? $this->_rootref['LANG_FAQ'] : ''; ?></span>
        </div> 
    </div>
    <div class="col-md-2  main-content left-sidebar">
        <div class="widget widget-statistic">
        	<p class="questions-count">
        		<span><?php echo (isset($this->_rootref['COUNT_POSTS'])) ? $this->_rootref['COUNT_POSTS'] : ''; ?></span><br>
                <?php echo (isset($this->_rootref['LANG_FAQ'])) ? $this->_rootref['LANG_FAQ'] : ''; ?>
        	</p>
        	<p class="members-count">
        		<span><?php echo (isset($this->_rootref['COUNT_TERMS'])) ? $this->_rootref['COUNT_TERMS'] : ''; ?></span><br>
                <?php echo (isset($this->_rootref['LANG_CATEGORIES'])) ? $this->_rootref['LANG_CATEGORIES'] : ''; ?>
        	</p>
        </div>
        <div class="widget widget-menus">
            <div class="menu-left-menu-container">
                <ul id="menu-left-menu-1" class="menu">
                    <li class="<?php if ($this->_rootref['THIS_TERM_ID'] == 0) {  ?>active<?php } ?>"><a href="index.php?mode=faq"><i class="fa fa-tags"></i> <?php echo (isset($this->_rootref['LANG_ALL_FAQ'])) ? $this->_rootref['LANG_ALL_FAQ'] : ''; ?></a></li>
                    <?php $_loop_terms_count = (isset($this->_tpldata['loop_terms'])) ? sizeof($this->_tpldata['loop_terms']) : 0;if ($_loop_terms_count) {for ($_loop_terms_i = 0; $_loop_terms_i < $_loop_terms_count; ++$_loop_terms_i){$_loop_terms_val = &$this->_tpldata['loop_terms'][$_loop_terms_i]; ?>
                    <li class="<?php if ($_loop_terms_val['TERM_ID'] == $this->_rootref['THIS_TERM_ID']) {  ?>active<?php } ?>">
                        <a href="index.php?mode=faq&term_id=<?php echo $_loop_terms_val['TERM_ID']; ?>"><i class="fa fa-tag"></i> <?php echo $_loop_terms_val['TERM_NAME']; ?></a>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-10 ">
    <?php if ($this->_rootref['IS_FAQ_USERS_ONLY']) {  $this->_tpl_include('msg_members_only.html'); } else { ?>
        <div class="panel-group" id="accordion">
       	    <?php $_loop_faq_count = (isset($this->_tpldata['loop_faq'])) ? sizeof($this->_tpldata['loop_faq']) : 0;if ($_loop_faq_count) {for ($_loop_faq_i = 0; $_loop_faq_i < $_loop_faq_count; ++$_loop_faq_i){$_loop_faq_val = &$this->_tpldata['loop_faq'][$_loop_faq_i]; ?>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_loop_faq_val['POST_ID']; ?>" class="collapsed">
                    <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-life-ring"></i> <?php echo $_loop_faq_val['POST_TITLE']; ?></h4>
                    </div>
                </a>
                <div id="collapse<?php echo $_loop_faq_val['POST_ID']; ?>" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <div class="faq-head">
                            <div class="row">
                                <div class="col-md-8 col-xs-8 question-cat">
                                    <a href="users.php?username=<?php echo $_loop_faq_val['POST_AUTHOR']; ?>">
                                        <span class="author-avatar"><img src="<?php echo $_loop_faq_val['AUTHOR_AVATER']; ?>" class="avatar" alt="<?php echo $_loop_faq_val['POST_AUTHOR']; ?>"></span>
                                        <span class="author-name"><?php echo $_loop_faq_val['POST_AUTHOR']; ?></span>
                                    </a>
                                    <span title="<?php echo $_loop_faq_val['AUTHOR_GROUP_NAME']; ?>" class="user-badge" style="background: <?php echo $_loop_faq_val['AUTHOR_GROUP_COLOR']; ?>;"><?php echo $_loop_faq_val['AUTHOR_GROUP_NAME']; ?></span>                        
                                    <span class="question-time"><?php echo $_loop_faq_val['POST_TIME_AGO']; ?> <?php echo (isset($this->_rootref['LANG_IN'])) ? $this->_rootref['LANG_IN'] : ''; ?></span>
                                    <span class="question-category">
                                        <a href="index.php?mode=faq&term_id=<?php echo $_loop_faq_val['POST_TERM_ID']; ?>"><?php echo $_loop_faq_val['POST_TERM_NAME']; ?></a>
                                    </span>
                                </div>
                                <div class="col-md-4 col-xs-4 question-control">
                                    <?php if ($this->_rootref['IS_USER']) {  ?>
                                    <div class="vote" id="voting" data-postid="<?php echo $_loop_faq_val['POST_ID']; ?>">
                                        <div class="vote-span"><!-- voting-->
                            				<i class="voteset vote-up <?php if ($_loop_faq_val['VOTE_UP']) {  ?>disabled<?php } ?>" data-action="up" title="Vote up"></i>
                            				<div class="vote-score" style="color: <?php if ($_loop_faq_val['VOTE_COLOR']) {  ?>#208ACA<?php } else { ?>red<?php } ?> ;"><?php echo $_loop_faq_val['POST_VOTE']; ?></div>
                            				<i class="voteset vote-down <?php if ($_loop_faq_val['VOTE_DOWN']) {  ?>disabled<?php } ?>" data-action="down" title="Vote down"></i>
                            			</div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="vote">
                                        <div class="vote-span"><!-- voting-->
                            				<i class="vote-up ttipupleft" data-action="up" title="<?php echo (isset($this->_rootref['LANG_VOTE_USERS_ONLY'])) ? $this->_rootref['LANG_VOTE_USERS_ONLY'] : ''; ?>"></i>
                            				<div class="vote-score" style="color: <?php if ($_loop_faq_val['VOTE_COLOR']) {  ?>#208ACA<?php } else { ?>red<?php } ?> ;"><?php echo $_loop_faq_val['POST_VOTE']; ?></div>
                            				<i class="vote-down ttipdownleft" data-action="down" title="<?php echo (isset($this->_rootref['LANG_VOTE_USERS_ONLY'])) ? $this->_rootref['LANG_VOTE_USERS_ONLY'] : ''; ?>"></i>
                            			</div>
                                    </div>
                                    <?php } ?>
                                </div>                 
                            </div>
                        </div>
                        <div class="clear10"></div>
                        <p><?php echo $_loop_faq_val['POST_CONTENT']; ?></p>
                    </div>
                </div>
            </div>
            <?php }} ?>	
        </div>
        <?php if ($this->_rootref['SHOW_PAGINATION']) {  ?>
            <ul class="pagination pagination-sm">
                <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?>
            </ul>
        <?php } } ?>
    </div>
</div>
<?php $this->_tpl_include('overall_footer.html'); ?>