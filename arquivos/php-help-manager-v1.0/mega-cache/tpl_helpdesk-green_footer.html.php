<?php if (!defined('IN_MEGABUGS')) exit; ?><div class="margin-30"></div>  
    <div id="footer">
      <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
        	 <?php echo (isset($this->_rootref['LANG_COPYRIGHT'])) ? $this->_rootref['LANG_COPYRIGHT'] : ''; ?>
        	</div>
            <div class="col-md-6">
                <ul class="social">
                    <li class="facebook"><a href="<?php echo (isset($this->_rootref['URL_FACEBOOK'])) ? $this->_rootref['URL_FACEBOOK'] : ''; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="<?php echo (isset($this->_rootref['URL_TWITTER'])) ? $this->_rootref['URL_TWITTER'] : ''; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="google"><a href="<?php echo (isset($this->_rootref['URL_GOOGLE'])) ? $this->_rootref['URL_GOOGLE'] : ''; ?>" target="_blank"><i class="fa fa-google"></i></a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>