<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('simple_header.html'); ?>
<script type="text/javascript">
$(document).ready(function () {
    var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $("#email");
    var password = $("#password");    
    $(".submit").on('click',function(){
        if(regex.test(email.val()) && email.val().length > 5 && password.val().length > 5 )
        {
            email.removeClass('error');
            password.removeClass('error');
            $("#loginform").submit();
        }
        else
        {
            if(!regex.test(email.val()) || email.val().length < 5){email.addClass('error');}
            else{email.removeClass('error'); }
            if(password.val().length < 5){password.addClass('error');}
            else{password.removeClass('error'); }
        }
    });
});
</script>
    <div class="login-form-warp border-box c-fix default-box">
        <div class="section-content">
            <form  name="loginform" id="loginform" class="form-horizontal" role="form" action="users.php?mode=login" method="post">
                <input type="hidden" name="action" value="login" />
                <input type="hidden" name="token" value="<?php echo (isset($this->_rootref['TOKEN'])) ? $this->_rootref['TOKEN'] : ''; ?>" />
                <div class="form-group">
                    <label class="col-sm-12" for="email"><?php echo (isset($this->_rootref['LANG_EMAIL_ADDRESS'])) ? $this->_rootref['LANG_EMAIL_ADDRESS'] : ''; ?></label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo (isset($this->_rootref['LANG_EMAIL_ADDRESS'])) ? $this->_rootref['LANG_EMAIL_ADDRESS'] : ''; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 link-simple" for="password"><?php echo (isset($this->_rootref['LANG_PASSWORD'])) ? $this->_rootref['LANG_PASSWORD'] : ''; ?> <a href="users.php?mode=forget"><?php echo (isset($this->_rootref['LANG_FORGET_PASSWORD'])) ? $this->_rootref['LANG_FORGET_PASSWORD'] : ''; ?></a></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo (isset($this->_rootref['LANG_PASSWORD'])) ? $this->_rootref['LANG_PASSWORD'] : ''; ?>">
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="col-sm-12 align-center">
                        <a type="submit" class="btn-block section-btn form-button form-button-green submit"><?php echo (isset($this->_rootref['LANG_LOGIN'])) ? $this->_rootref['LANG_LOGIN'] : ''; ?></a>
                    </div>
                </div>
                <div class="simple-messeges">
                <?php echo (isset($this->_rootref['LANG_IF_YOU_DONT_HAVE_ACCOUNT'])) ? $this->_rootref['LANG_IF_YOU_DONT_HAVE_ACCOUNT'] : ''; ?> <a href="users.php?mode=register"><?php echo (isset($this->_rootref['LANG_REGISTER'])) ? $this->_rootref['LANG_REGISTER'] : ''; ?></a>
                </div>
            </form>
        </div>
        <?php if ($this->_rootref['IS_LOGOUT']) {  ?>
        <div class="email-error form-messeges alert light"><div class="messege-warp"><span class="messege-text"><?php echo (isset($this->_rootref['LANG_LOGGED_OUT'])) ? $this->_rootref['LANG_LOGGED_OUT'] : ''; ?></span></div></div>
        <?php } else if ($this->_rootref['IS_FIELDLOGIN']) {  ?>
        <div class="email-error form-messeges error light">
            <div class="messege-warp">
                <span class="messege-text"><i class="fa fa-exclamation-circle"></i> <?php echo (isset($this->_rootref['LANG_PLEASE_COMPLETE_THE_FIELDS'])) ? $this->_rootref['LANG_PLEASE_COMPLETE_THE_FIELDS'] : ''; ?></span>
            </div>
        </div>
        <?php } else if ($this->_rootref['IS_NOTLOGIN']) {  ?>
        <div class="email-error form-messeges error light">
            <div class="messege-warp">
                <span class="messege-text"><i class="fa fa-error"></i><i class="fa fa-exclamation-circle"></i> <?php echo (isset($this->_rootref['LANG_EMAIL_OR_PASSWORD_IS_INCORRECT'])) ? $this->_rootref['LANG_EMAIL_OR_PASSWORD_IS_INCORRECT'] : ''; ?></span>
            </div>
        </div>
        <?php } ?>
    </div>
<?php $this->_tpl_include('simple_footer.html'); ?>