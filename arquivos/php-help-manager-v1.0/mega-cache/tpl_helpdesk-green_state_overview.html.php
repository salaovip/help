<?php if (!defined('IN_MEGABUGS')) exit; ?><div class="row state-overview">
        <div class="col-lg-4 col-sm-12">
            <section class="panel">
                <div class="ticket-sign-left"></div>
                <div class="ticket-sign-right"></div>
                <div class="symbol blue">
                    <i class="fa fa-lightbulb-o"></i>
                </div>
                <div class="value">
                    <h3><a href="index.php?page=knowledgebase"><?php echo (isset($this->_rootref['LANG_KNOWLEDGE_BASE'])) ? $this->_rootref['LANG_KNOWLEDGE_BASE'] : ''; ?></a></h3>
                    <p> <?php echo (isset($this->_rootref['TOTAL_ART'])) ? $this->_rootref['TOTAL_ART'] : ''; ?> <?php echo (isset($this->_rootref['LANG_ARTICLES'])) ? $this->_rootref['LANG_ARTICLES'] : ''; ?> / <?php echo (isset($this->_rootref['TOTAL_CAT_ART'])) ? $this->_rootref['TOTAL_CAT_ART'] : ''; ?> <?php echo (isset($this->_rootref['LANG_INFOCATEGORYS'])) ? $this->_rootref['LANG_INFOCATEGORYS'] : ''; ?></p>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-sm-12">
            <section class="panel">
                <div class="ticket-sign-left"></div>
                <div class="ticket-sign-right"></div>
                <div class="symbol green">
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="value">
                    <h3><a href="index.php?page=news"><?php echo (isset($this->_rootref['LANG_NEWS'])) ? $this->_rootref['LANG_NEWS'] : ''; ?></a></h3>
                    <p> <?php echo (isset($this->_rootref['TOTAL_POST'])) ? $this->_rootref['TOTAL_POST'] : ''; ?> <?php echo (isset($this->_rootref['LANG_INFOPOSTS'])) ? $this->_rootref['LANG_INFOPOSTS'] : ''; ?> / <?php echo (isset($this->_rootref['TOTAL_CAT_POST'])) ? $this->_rootref['TOTAL_CAT_POST'] : ''; ?> <?php echo (isset($this->_rootref['LANG_INFOCATEGORYS'])) ? $this->_rootref['LANG_INFOCATEGORYS'] : ''; ?></p>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-sm-12">
            <section class="panel">
                <div class="ticket-sign-left"></div>
                <div class="ticket-sign-right"></div>
                <div class="symbol red">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="value">
                    <h3><a href="index.php?page=faq"><?php echo (isset($this->_rootref['LANG_FAQ'])) ? $this->_rootref['LANG_FAQ'] : ''; ?></a></h3>
                    <p><?php echo (isset($this->_rootref['LANG_FREQUENTLY_ASKED_QUESTIONS'])) ? $this->_rootref['LANG_FREQUENTLY_ASKED_QUESTIONS'] : ''; ?></p>
                </div>
            </section>
        </div>
    </div>