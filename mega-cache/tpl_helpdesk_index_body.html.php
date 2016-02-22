<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('overall_header.html'); ?>
<div class="container home_default">
    <div class="row">
        <div class="col-md-4 intro-item">
            <div class="intro-icon">
        		<span class="fa-stack fa-3x">
                    <i class="fa fa-circle fa-stack-2x" style="color:<?php echo (isset($this->_rootref['OPTION_BGCOLORBOX1'])) ? $this->_rootref['OPTION_BGCOLORBOX1'] : ''; ?>;"></i>
                    <i class="fa <?php echo (isset($this->_rootref['OPTION_ICONBOX1'])) ? $this->_rootref['OPTION_ICONBOX1'] : ''; ?> fa-stack-1x fa-inverse"></i>
                </span>
            </div>
            <div class="intro-title">
                <h2 class="block-title"><?php echo (isset($this->_rootref['OPTION_TITLEBOX1'])) ? $this->_rootref['OPTION_TITLEBOX1'] : ''; ?></h2>
            </div>
            <div class="intro-text"><?php echo (isset($this->_rootref['OPTION_TEXTBOX1'])) ? $this->_rootref['OPTION_TEXTBOX1'] : ''; ?></div>
            <div class="intro-button"><a class="section-btn form-button" style="background: <?php echo (isset($this->_rootref['OPTION_BGCOLORBOX1'])) ? $this->_rootref['OPTION_BGCOLORBOX1'] : ''; ?>!important;color:<?php echo (isset($this->_rootref['OPTION_TEXTCOLORBOX1'])) ? $this->_rootref['OPTION_TEXTCOLORBOX1'] : ''; ?>;" href="<?php echo (isset($this->_rootref['OPTION_LINKBOX1'])) ? $this->_rootref['OPTION_LINKBOX1'] : ''; ?>"><?php echo (isset($this->_rootref['OPTION_TITLELINKBOX1'])) ? $this->_rootref['OPTION_TITLELINKBOX1'] : ''; ?></a></div>
        </div>
        <div class="col-md-4 intro-item">
            <div class="intro-icon">
        		<span class="fa-stack fa-3x">
                    <i class="fa fa-circle fa-stack-2x" style="color:<?php echo (isset($this->_rootref['OPTION_BGCOLORBOX2'])) ? $this->_rootref['OPTION_BGCOLORBOX2'] : ''; ?>;"></i>
                    <i class="fa <?php echo (isset($this->_rootref['OPTION_ICONBOX2'])) ? $this->_rootref['OPTION_ICONBOX2'] : ''; ?> fa-stack-1x fa-inverse"></i>
                </span>
            </div>
            <div class="intro-title">
                <h2 class="block-title"><?php echo (isset($this->_rootref['OPTION_TITLEBOX2'])) ? $this->_rootref['OPTION_TITLEBOX2'] : ''; ?></h2>
            </div>
            <div class="intro-text"><?php echo (isset($this->_rootref['OPTION_TEXTBOX2'])) ? $this->_rootref['OPTION_TEXTBOX2'] : ''; ?></div>
            <div class="intro-button"><a class="section-btn form-button" style="background: <?php echo (isset($this->_rootref['OPTION_BGCOLORBOX2'])) ? $this->_rootref['OPTION_BGCOLORBOX2'] : ''; ?>!important;color:<?php echo (isset($this->_rootref['OPTION_TEXTCOLORBOX2'])) ? $this->_rootref['OPTION_TEXTCOLORBOX2'] : ''; ?>;" href="<?php echo (isset($this->_rootref['OPTION_LINKBOX2'])) ? $this->_rootref['OPTION_LINKBOX2'] : ''; ?>"><?php echo (isset($this->_rootref['OPTION_TITLELINKBOX2'])) ? $this->_rootref['OPTION_TITLELINKBOX2'] : ''; ?></a></div>
        </div>
        <div class="col-md-4 intro-item">
            <div class="intro-icon">
        		<span class="fa-stack fa-3x">
                    <i class="fa fa-circle fa-stack-2x" style="color:<?php echo (isset($this->_rootref['OPTION_BGCOLORBOX3'])) ? $this->_rootref['OPTION_BGCOLORBOX3'] : ''; ?>;"></i>
                    <i class="fa <?php echo (isset($this->_rootref['OPTION_ICONBOX3'])) ? $this->_rootref['OPTION_ICONBOX3'] : ''; ?> fa-stack-1x fa-inverse"></i>
                </span>
            </div>
            <div class="intro-title">
                <h2 class="block-title"><?php echo (isset($this->_rootref['OPTION_TITLEBOX3'])) ? $this->_rootref['OPTION_TITLEBOX3'] : ''; ?></h2>
            </div>
            <div class="intro-text"><?php echo (isset($this->_rootref['OPTION_TEXTBOX3'])) ? $this->_rootref['OPTION_TEXTBOX3'] : ''; ?></div>
            <div class="intro-button"><a class="section-btn form-button" style="background: <?php echo (isset($this->_rootref['OPTION_BGCOLORBOX3'])) ? $this->_rootref['OPTION_BGCOLORBOX3'] : ''; ?>!important;color:<?php echo (isset($this->_rootref['OPTION_TEXTCOLORBOX3'])) ? $this->_rootref['OPTION_TEXTCOLORBOX3'] : ''; ?>;" href="<?php echo (isset($this->_rootref['OPTION_LINKBOX3'])) ? $this->_rootref['OPTION_LINKBOX3'] : ''; ?>"><?php echo (isset($this->_rootref['OPTION_TITLELINKBOX3'])) ? $this->_rootref['OPTION_TITLELINKBOX3'] : ''; ?></a></div>
        </div>
    </div>
</div>
<?php $this->_tpl_include('overall_footer.html'); ?>