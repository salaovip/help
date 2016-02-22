<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('overall_header.html'); ?>
<div class="col-md-12 main-content">
    <div class="row question-filter" id="question_filter">
        <div class="col-md-12 current-category">
            <span><i class="fa fa-lightbulb-o"></i> <?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?></span>
        </div> 
    </div>
    <div class="col-md-2  main-content left-sidebar">
        <div class="widget widget-statistic">
        	<p class="questions-count">
        		<span><?php echo (isset($this->_rootref['COUNT_POSTS'])) ? $this->_rootref['COUNT_POSTS'] : ''; ?></span><br>
                <?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?>
        	</p>
        	<p class="members-count">
        		<span><?php echo (isset($this->_rootref['COUNT_TERMS'])) ? $this->_rootref['COUNT_TERMS'] : ''; ?></span><br>
                <?php echo (isset($this->_rootref['LANG_CATEGORIES'])) ? $this->_rootref['LANG_CATEGORIES'] : ''; ?>     		
        	</p>
        </div>
        <div class="widget widget-menus">
            <div class="menu-left-menu-container">
                <ul id="menu-left-menu-1" class="menu">
                    <li class="<?php if ($this->_rootref['THIS_TERM_ID'] == 0) {  ?>active<?php } ?>"><a href="index.php?mode=news"><i class="fa fa-tags"></i> <?php echo (isset($this->_rootref['LANG_ALL_NEWS'])) ? $this->_rootref['LANG_ALL_NEWS'] : ''; ?></a></li>
                    <?php $_loop_terms_count = (isset($this->_tpldata['loop_terms'])) ? sizeof($this->_tpldata['loop_terms']) : 0;if ($_loop_terms_count) {for ($_loop_terms_i = 0; $_loop_terms_i < $_loop_terms_count; ++$_loop_terms_i){$_loop_terms_val = &$this->_tpldata['loop_terms'][$_loop_terms_i]; ?>
                    <li class="<?php if ($_loop_terms_val['TERM_ID'] == $this->_rootref['THIS_TERM_ID']) {  ?>active<?php } ?>">
                        <a href="index.php?mode=news&term_id=<?php echo $_loop_terms_val['TERM_ID']; ?>"><i class="fa fa-tag"></i> <?php echo $_loop_terms_val['TERM_NAME']; ?></a>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-10  main-content">
        <div class="main-questions-list">
        <?php if ($this->_rootref['IS_NEWS_USERS_ONLY']) {  $this->_tpl_include('msg_members_only.html'); } else { ?>
            <ul id="main_questions_list">
                <?php $_loop_news_count = (isset($this->_tpldata['loop_news'])) ? sizeof($this->_tpldata['loop_news']) : 0;if ($_loop_news_count) {for ($_loop_news_i = 0; $_loop_news_i < $_loop_news_count; ++$_loop_news_i){$_loop_news_val = &$this->_tpldata['loop_news'][$_loop_news_i]; ?>
                <li class="question type-question status-publish hentry question-item" data-id="<?php echo $_loop_news_val['POST_ID']; ?>">
                    <div class="col-md-8 col-xs-8 q-left-content">
                        <div class="q-ltop-content">
                            <a href="index.php?post_id=<?php echo $_loop_news_val['POST_ID']; ?>" class="question-title"><?php echo $_loop_news_val['POST_TITLE']; ?></a>
                        </div>
                        <div class="q-lbtm-content">
                            <div class="question-cat">
                                <div class="clearfix"></div>                                  
                                <span class="question-time"><?php echo $_loop_news_val['POST_TIME_AGO']; ?> <?php echo (isset($this->_rootref['LANG_IN'])) ? $this->_rootref['LANG_IN'] : ''; ?></span>
                                <span class="question-category">
                                    <a href="index.php?mode=news&term_id=<?php echo $_loop_news_val['POST_TERM_ID']; ?>"><?php echo $_loop_news_val['POST_TERM_NAME']; ?></a>
                                </span>
                            </div>   
                        </div>
                        <div class="q-lbtm-content">
                            <div class="question-cat">
                                <div class="clearfix"></div>                
                                <a href="users.php?username=<?php echo $_loop_news_val['POST_AUTHOR']; ?>">
                                    <span class="author-avatar"><img src="<?php echo $_loop_news_val['AUTHOR_AVATER']; ?>" class="avatar" alt="<?php echo $_loop_news_val['POST_AUTHOR']; ?>"></span>
                                    <span class="author-name"><?php echo $_loop_news_val['POST_AUTHOR']; ?></span>
                                </a>                    
                                <span title="<?php echo $_loop_news_val['AUTHOR_GROUP_NAME']; ?>" class="user-badge" style="background: <?php echo $_loop_news_val['AUTHOR_GROUP_COLOR']; ?>;"><?php echo $_loop_news_val['AUTHOR_GROUP_NAME']; ?></span>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 q-right-content">
                        <ul class="question-statistic">
                            <li><span class="question-views"><?php echo $_loop_news_val['POST_VIEW']; ?></span><?php echo (isset($this->_rootref['LANG_VIEWS'])) ? $this->_rootref['LANG_VIEWS'] : ''; ?></li>
                            <li class=""><span class="question-comments" style="color: <?php if ($_loop_news_val['VOTE_COLOR']) {  ?>#208ACA<?php } else { ?>red<?php } ?> ;"><?php echo $_loop_news_val['POST_VOTE']; ?></span> <?php echo (isset($this->_rootref['LANG_VOTING'])) ? $this->_rootref['LANG_VOTING'] : ''; ?></li>
                        </ul>
                    </div>                   
                </li>
                <?php }} ?>                                                               
            </ul>
            <?php } ?>
        </div>
        <?php if ($this->_rootref['IS_NEWS_USERS_ONLY']) {  } else { if ($this->_rootref['SHOW_PAGINATION']) {  ?>
                <ul class="pagination pagination-sm">
                    <?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?>
                </ul>
            <?php } } ?>
    </div>
</div>
<?php $this->_tpl_include('overall_footer.html'); ?>