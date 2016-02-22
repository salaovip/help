<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>
<div class="container">
    <div class="row">   
        <div class="col-md-4">
            <div class="jumbotron sidebar_contact">
                <ul>
                    <li class="facebook"><a href="<?php echo (isset($this->_rootref['URL_FACEBOOK'])) ? $this->_rootref['URL_FACEBOOK'] : ''; ?>" target="_blank"><i class="fa fa-facebook"></i> <?php echo (isset($this->_rootref['LANG_FOLLOW_US_ON_FACEBOOK'])) ? $this->_rootref['LANG_FOLLOW_US_ON_FACEBOOK'] : ''; ?></a></li>
                    <li class="twitter"><a href="<?php echo (isset($this->_rootref['URL_TWITTER'])) ? $this->_rootref['URL_TWITTER'] : ''; ?>" target="_blank"><i class="fa fa-twitter"></i> <?php echo (isset($this->_rootref['LANG_FOLLOW_US_ON_TWITTER'])) ? $this->_rootref['LANG_FOLLOW_US_ON_TWITTER'] : ''; ?></a></li>
                    <li class="google"><a href="<?php echo (isset($this->_rootref['URL_GOOGLE'])) ? $this->_rootref['URL_GOOGLE'] : ''; ?>" target="_blank"><i class="fa fa-google"></i> <?php echo (isset($this->_rootref['LANG_FOLLOW_US_ON_GOOGLE'])) ? $this->_rootref['LANG_FOLLOW_US_ON_GOOGLE'] : ''; ?></a></li>
                    <li class="email"><a href="mailto:<?php echo (isset($this->_rootref['SITE_EMAIL'])) ? $this->_rootref['SITE_EMAIL'] : ''; ?>" target="_blank"><i class="fa fa-envelope-o"></i> <?php echo (isset($this->_rootref['SITE_EMAIL'])) ? $this->_rootref['SITE_EMAIL'] : ''; ?></a></li>
                </ul>
            </div>
            <div class="col-contact">
                <?php if ($this->_rootref['MSGSEND']) {  ?>
                    <div class="alert alert-success" role="alert"><?php echo (isset($this->_rootref['LANG_SEND_YOUR_MESSAGE_HAS_BEEN_SUCCESSFULLY'])) ? $this->_rootref['LANG_SEND_YOUR_MESSAGE_HAS_BEEN_SUCCESSFULLY'] : ''; ?></div>
                <?php } ?>
                            
                <form name="loginform" id="loginform" class="contact" action="index.php?page=contact" method="post">
                <input type="hidden" name="action" value="contact">
                    <div class="form-group">
                        <label for="username">
                            <?php echo (isset($this->_rootref['LANG_USERNAME'])) ? $this->_rootref['LANG_USERNAME'] : ''; ?>
                            <?php if ($this->_rootref['ERROR_USERNAME']) {  ?>
                            <div class="alert alert-danger" role="alert"><?php echo (isset($this->_rootref['LANG_USERNAME_IS_REQUIRED'])) ? $this->_rootref['LANG_USERNAME_IS_REQUIRED'] : ''; ?></div>
                            <?php } ?>
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo (isset($this->_rootref['LANG_ENTER_USERNAME'])) ? $this->_rootref['LANG_ENTER_USERNAME'] : ''; ?>" value="<?php echo (isset($this->_rootref['VAL_USERNAME'])) ? $this->_rootref['VAL_USERNAME'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <?php echo (isset($this->_rootref['LANG_EMAIL_ADDRESS'])) ? $this->_rootref['LANG_EMAIL_ADDRESS'] : ''; ?>
                            <?php if ($this->_rootref['ERROR_EMAIL']) {  ?>
                            <div class="alert alert-danger" role="alert"><?php echo (isset($this->_rootref['LANG_EMAIL_ADDRESS_IS_REQUIRED'])) ? $this->_rootref['LANG_EMAIL_ADDRESS_IS_REQUIRED'] : ''; ?></div>
                            <?php } ?>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo (isset($this->_rootref['LANG_ENTER_EMAIL_ADDRESS'])) ? $this->_rootref['LANG_ENTER_EMAIL_ADDRESS'] : ''; ?>" value="<?php echo (isset($this->_rootref['VAL_EMAIL'])) ? $this->_rootref['VAL_EMAIL'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="subject">
                            <?php echo (isset($this->_rootref['LANG_SUBJECT'])) ? $this->_rootref['LANG_SUBJECT'] : ''; ?>
                            <?php if ($this->_rootref['ERROR_SUBJECT']) {  ?>
                            <div class="alert alert-danger" role="alert"><?php echo (isset($this->_rootref['LANG_SUBJECT_IS_REQUIRED'])) ? $this->_rootref['LANG_SUBJECT_IS_REQUIRED'] : ''; ?></div>
                            <?php } ?>
                        </label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="<?php echo (isset($this->_rootref['LANG_ENTER_SUBJECT'])) ? $this->_rootref['LANG_ENTER_SUBJECT'] : ''; ?>" value="<?php echo (isset($this->_rootref['VAL_SUBJECT'])) ? $this->_rootref['VAL_SUBJECT'] : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">
                            <?php echo (isset($this->_rootref['LANG_MESSAGE'])) ? $this->_rootref['LANG_MESSAGE'] : ''; ?>
                            <?php if ($this->_rootref['ERROR_MESSAGE']) {  ?>
                            <div class="alert alert-danger" role="alert"><?php echo (isset($this->_rootref['LANG_MESSEGE_IS_REQUIRED'])) ? $this->_rootref['LANG_MESSEGE_IS_REQUIRED'] : ''; ?></div>
                            <?php } ?>
                        </label>
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="<?php echo (isset($this->_rootref['LANG_ENTER_MESSAGE'])) ? $this->_rootref['LANG_ENTER_MESSAGE'] : ''; ?>"><?php echo (isset($this->_rootref['VAL_MESSAGE'])) ? $this->_rootref['VAL_MESSAGE'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="<?php echo (isset($this->_rootref['LANG_SEND_MESSAGE'])) ? $this->_rootref['LANG_SEND_MESSAGE'] : ''; ?>" class="btn btn-primary" />
                    </div>
                </form>
            </div>
            
        </div>
        <div class="col-md-8">
            <div class="col-contact">
                <p><?php echo (isset($this->_rootref['CONTENT'])) ? $this->_rootref['CONTENT'] : ''; ?></p>
            </div>
        </div>
    </div>
</div>
<?php $this->_tpl_include('footer.html'); ?>