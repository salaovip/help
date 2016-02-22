<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="page-header position-relative">
	<h1><i class="fa fa-dashboard"></i> <?php echo (isset($this->_rootref['LANG_CP_DASHBOARD'])) ? $this->_rootref['LANG_CP_DASHBOARD'] : ''; ?></h1>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="center">
            <ul class="stat-boxes2">
              <li>
                <div class="left peity_bar_color1"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_KNOWLEDGE_PER'])) ? $this->_rootref['DASH_COUNT_KNOWLEDGE_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_KNOWLEDGE'])) ? $this->_rootref['DASH_COUNT_KNOWLEDGE'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_CP_KNOWLEDGE_BASE'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color2"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_NEWS_PER'])) ? $this->_rootref['DASH_COUNT_NEWS_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_NEWS'])) ? $this->_rootref['DASH_COUNT_NEWS'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color3"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_FAQS_PER'])) ? $this->_rootref['DASH_COUNT_FAQS_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_FAQS'])) ? $this->_rootref['DASH_COUNT_FAQS'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color4"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span>100%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_USERS'])) ? $this->_rootref['DASH_COUNT_USERS'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_USERS'])) ? $this->_rootref['LANG_CP_USERS'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color6"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span>100%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VOTE'])) ? $this->_rootref['DASH_COUNT_VOTE'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VOTING'])) ? $this->_rootref['LANG_CP_VOTING'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color8"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_VOTEUP_PER'])) ? $this->_rootref['DASH_COUNT_VOTEUP_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VOTEUP'])) ? $this->_rootref['DASH_COUNT_VOTEUP'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VOTING_UP'])) ? $this->_rootref['LANG_CP_VOTING_UP'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color9"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_VOTEDOWN_PER'])) ? $this->_rootref['DASH_COUNT_VOTEDOWN_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VOTEDOWN'])) ? $this->_rootref['DASH_COUNT_VOTEDOWN'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VOTING_DOWN'])) ? $this->_rootref['LANG_CP_VOTING_DOWN'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color5"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span>100%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VISITS_YEAR'])) ? $this->_rootref['DASH_COUNT_VISITS_YEAR'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VISITS_THE_YEAR'])) ? $this->_rootref['LANG_CP_VISITS_THE_YEAR'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color5"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_VISITS_MONTH_PER'])) ? $this->_rootref['DASH_COUNT_VISITS_MONTH_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VISITS_MONTH'])) ? $this->_rootref['DASH_COUNT_VISITS_MONTH'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VISITS_THE_MONTH'])) ? $this->_rootref['LANG_CP_VISITS_THE_MONTH'] : ''; ?> </div>
              </li>
              <li>
                <div class="left peity_bar_color5"><span><span style="display: none;">2,4,9,7,12,10,12</span>
                  <canvas width="50" height="24"></canvas>
                  </span><?php echo (isset($this->_rootref['DASH_COUNT_VISITS_DAY_PER'])) ? $this->_rootref['DASH_COUNT_VISITS_DAY_PER'] : ''; ?>%</div>
                <div class="right"> <strong><?php echo (isset($this->_rootref['DASH_COUNT_VISITS_DAY'])) ? $this->_rootref['DASH_COUNT_VISITS_DAY'] : ''; ?></strong> <?php echo (isset($this->_rootref['LANG_CP_VISITS_THE_DAY'])) ? $this->_rootref['LANG_CP_VISITS_THE_DAY'] : ''; ?> </div>
              </li>
            </ul>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span6 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header">
				<h5><i class="fa fa-bar-chart"></i> <?php echo (isset($this->_rootref['LANG_CP_POSTS_CHART'])) ? $this->_rootref['LANG_CP_POSTS_CHART'] : ''; ?></h5>
			</div>
			<div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
    				<div class="widget-main">
                        <div class="chart-caption"><?php echo (isset($this->_rootref['LANG_CP_STATISTICS'])) ? $this->_rootref['LANG_CP_STATISTICS'] : ''; ?> <?php echo (isset($this->_rootref['STATISTICS_YEAR'])) ? $this->_rootref['STATISTICS_YEAR'] : ''; ?></div> 
						<table class="chart-barsmulti-posts" style="width : 100%;"> 
							<thead> 
								<tr> 
									<th></th> 
									<th style="color : #308EEF;"><?php echo (isset($this->_rootref['LANG_CP_KNOWLEDGE'])) ? $this->_rootref['LANG_CP_KNOWLEDGE'] : ''; ?> </th> 
									<th style="color : #71A100;"><?php echo (isset($this->_rootref['LANG_CP_NEWS'])) ? $this->_rootref['LANG_CP_NEWS'] : ''; ?></th> 
                                    <th style="color : #FF8000;"><?php echo (isset($this->_rootref['LANG_CP_FAQ'])) ? $this->_rootref['LANG_CP_FAQ'] : ''; ?></th> 
								</tr> 
							</thead> 
							<tbody> 
                                <?php $_posts_loop_counter_count = (isset($this->_tpldata['posts_loop_counter'])) ? sizeof($this->_tpldata['posts_loop_counter']) : 0;if ($_posts_loop_counter_count) {for ($_posts_loop_counter_i = 0; $_posts_loop_counter_i < $_posts_loop_counter_count; ++$_posts_loop_counter_i){$_posts_loop_counter_val = &$this->_tpldata['posts_loop_counter'][$_posts_loop_counter_i]; ?>
                                <tr> 
									<th><?php echo $_posts_loop_counter_val['MONTH']; ?></th><td><?php echo $_posts_loop_counter_val['KNOWLEDGE']; ?></td><td><?php echo $_posts_loop_counter_val['NEWS']; ?></td><td><?php echo $_posts_loop_counter_val['FAQS']; ?></td> 
								</tr> 
                                <?php }} ?>
							</tbody> 
						</table>
    				</div>
    			</div>
            </div>
		</div>
	</div>
    <div class="span6 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header">
				<h5><i class="fa fa-bar-chart"></i> <?php echo (isset($this->_rootref['LANG_CP_VISITORS_CHART'])) ? $this->_rootref['LANG_CP_VISITORS_CHART'] : ''; ?></h5>
			</div>
			<div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
    				<div class="widget-main">
                        <div class="chart-caption"><?php echo (isset($this->_rootref['LANG_CP_STATISTICS'])) ? $this->_rootref['LANG_CP_STATISTICS'] : ''; ?> <?php echo (isset($this->_rootref['STATISTICS_YEAR'])) ? $this->_rootref['STATISTICS_YEAR'] : ''; ?></div> 
						<table class="chart-barsmulti-visitors" style="width : 100%;"> 
							<thead> 
								<tr> 
									<th></th> 
									<th style="color : #0099ca;"><?php echo (isset($this->_rootref['LANG_CP_UNIQUE_VISITORS'])) ? $this->_rootref['LANG_CP_UNIQUE_VISITORS'] : ''; ?></th> 
									<th style="color : #73bc00;"><?php echo (isset($this->_rootref['LANG_CP_PAGE_VIEWS'])) ? $this->_rootref['LANG_CP_PAGE_VIEWS'] : ''; ?></th> 
								</tr> 
							</thead> 
							<tbody>
                                <?php $_visits_loop_counter_count = (isset($this->_tpldata['visits_loop_counter'])) ? sizeof($this->_tpldata['visits_loop_counter']) : 0;if ($_visits_loop_counter_count) {for ($_visits_loop_counter_i = 0; $_visits_loop_counter_i < $_visits_loop_counter_count; ++$_visits_loop_counter_i){$_visits_loop_counter_val = &$this->_tpldata['visits_loop_counter'][$_visits_loop_counter_i]; ?>
                                <tr> 
									<th><?php echo $_visits_loop_counter_val['MONTH']; ?></th><td><?php echo $_visits_loop_counter_val['UNIQUE']; ?></td><td><?php echo $_visits_loop_counter_val['VIEWS']; ?></td> 
								</tr> 
                                <?php }} ?>
							</tbody> 
						</table>
    				</div>
    			</div>
            </div>
		</div>
	</div>
</div>
<div class="clear_5"></div>
<div class="clear_5"></div>
<div class="clear_5"></div>
<div class="row-fluid">
    <div class="span6 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header">
				<h5><i class="fa fa-bar-chart"></i> <?php echo (isset($this->_rootref['LANG_CP_USERS_CHART'])) ? $this->_rootref['LANG_CP_USERS_CHART'] : ''; ?></h5>
			</div>
			<div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
    				<div class="widget-main">
                        <div class="chart-caption"><?php echo (isset($this->_rootref['LANG_CP_STATISTICS'])) ? $this->_rootref['LANG_CP_STATISTICS'] : ''; ?> <?php echo (isset($this->_rootref['STATISTICS_YEAR'])) ? $this->_rootref['STATISTICS_YEAR'] : ''; ?></div> 
						<table class="chart-barsmulti-users" style="width : 100%;"> 
							<thead> 
								<tr> 
									<th></th> 
									<th style="color : #0099ca;"><?php echo (isset($this->_rootref['LANG_CP_USERS'])) ? $this->_rootref['LANG_CP_USERS'] : ''; ?></th> 
								</tr> 
							</thead> 
							<tbody>
                                <?php $_users_loop_counter_count = (isset($this->_tpldata['users_loop_counter'])) ? sizeof($this->_tpldata['users_loop_counter']) : 0;if ($_users_loop_counter_count) {for ($_users_loop_counter_i = 0; $_users_loop_counter_i < $_users_loop_counter_count; ++$_users_loop_counter_i){$_users_loop_counter_val = &$this->_tpldata['users_loop_counter'][$_users_loop_counter_i]; ?>
								<tr> 
									<th><?php echo $_users_loop_counter_val['MONTH']; ?></th><td><?php echo $_users_loop_counter_val['USERS']; ?></td>
								</tr>
                                <?php }} ?>
							</tbody> 
						</table>
    				</div>
    			</div>
            </div>
		</div>
	</div>
    <div class="span6 widget-container-span ui-sortable">
		<div class="widget-box">
			<div class="widget-header">
				<h5><i class="fa fa-bar-chart"></i> <?php echo (isset($this->_rootref['LANG_CP_VOTING_CHART'])) ? $this->_rootref['LANG_CP_VOTING_CHART'] : ''; ?></h5>
			</div>
			<div class="widget-body">
                <div class="widget-body-inner" style="display: block;">
    				<div class="widget-main">
                        <div class="chart-caption"><?php echo (isset($this->_rootref['LANG_CP_STATISTICS'])) ? $this->_rootref['LANG_CP_STATISTICS'] : ''; ?> <?php echo (isset($this->_rootref['STATISTICS_YEAR'])) ? $this->_rootref['STATISTICS_YEAR'] : ''; ?></div> 
						<table class="chart-barsmulti-voting" style="width : 100%;"> 
							<thead> 
								<tr> 
									<th></th> 
									<th style="color : #0099ca;"><?php echo (isset($this->_rootref['LANG_CP_UP'])) ? $this->_rootref['LANG_CP_UP'] : ''; ?></th> 
									<th style="color : #CC1313;"><?php echo (isset($this->_rootref['LANG_CP_DOWN'])) ? $this->_rootref['LANG_CP_DOWN'] : ''; ?></th> 
								</tr> 
							</thead> 
							<tbody>
                                <?php $_vote_loop_counter_count = (isset($this->_tpldata['vote_loop_counter'])) ? sizeof($this->_tpldata['vote_loop_counter']) : 0;if ($_vote_loop_counter_count) {for ($_vote_loop_counter_i = 0; $_vote_loop_counter_i < $_vote_loop_counter_count; ++$_vote_loop_counter_i){$_vote_loop_counter_val = &$this->_tpldata['vote_loop_counter'][$_vote_loop_counter_i]; ?>
                                <tr> 
									<th><?php echo $_vote_loop_counter_val['MONTH']; ?></th><td><?php echo $_vote_loop_counter_val['VOTEUP']; ?></td><td><?php echo $_vote_loop_counter_val['VOTEDOWN']; ?></td> 
								</tr>  
                                <?php }} ?>
							</tbody> 
						</table>
    				</div>
    			</div>
            </div>
		</div>
	</div>
</div>