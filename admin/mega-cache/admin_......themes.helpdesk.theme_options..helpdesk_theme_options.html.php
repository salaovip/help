<?php if (!defined('IN_MEGABUGS')) exit; $this->_tpl_include('header.html'); ?>

<script src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/checkbox.min.js"></script>
<script src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/colorpicker.js"></script>
<script src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/custom.js"></script>
<script src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/scripts.js"></script>
<link href="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/css/custome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/css/colorpicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/css/main.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo (isset($this->_rootref['THEME_OPTION_URL'])) ? $this->_rootref['THEME_OPTION_URL'] : ''; ?>assets/js/jquery.tmpl.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#setting_form').submit(function() {
                $('.mega_save i').removeClass('fa-save').addClass('fa-spinner fa-pulse');
            	var str = $("form").serialize();
            	$.ajax({
            	  url: 'themes.php?page=theme_options.php&do=submit',
            	  data: str,
            	  type: 'POST',
            	  success: function(data){
            	    if(data == '#message_success')
            	    {
                       $('.mega_save i').removeClass('fa-spinner fa-pulse').addClass('fa-save');
                       $('#message_success').show().delay(250).fadeIn(600).fadeOut(600);
            	    }
            	    else
            	    {
            			$('.mega_save i').removeClass('fa-spinner fa-pulse').addClass('fa-save');
                        $('#message_error').show().delay(250).fadeIn(600).fadeOut(600);
            	    }
            	  }
            	});
              return false;
            });
            
            
            
            
            
            $('.colorSelector').each(function(){
        		var Othis = this; //cache a copy of the this variable for use inside nested function
        		var initialColor = $(Othis).next('input').attr('value');
        		$(this).ColorPicker({
            		color: initialColor,
            		onShow: function (colpkr) {
            		$(colpkr).fadeIn(500);
            		return false;
            		},
            		onHide: function (colpkr) {
            		$(colpkr).fadeOut(500);
            		return false;
            		},
            		onChange: function (hsb, hex, rgb) {
            		$(Othis).children('div').css('backgroundColor', '#' + hex);
            		$(Othis).next('input').attr('value','#' + hex);
            	}
            	});
        	}); //end color picker
    
        mega_set_uploader("cover_background_header");
        });
        
        
        $(document).on("click", ".del-img" , function(){
        	$(this).parent().fadeOut(function() {
        		$(this).hide();
        		$(this).parent().find('input[id="cover_background_header"]').attr('value', '' );
                $('#upload_cover_background_header_button').show();
        	});
        });	

        
</script>
<div id="message_success" style="display:none;" class="notification fade"><span class="notification_icon"></span> Saved Successfully. </div>
<div id="message_error" style="display:none;" class="notification mega_alert fade"><span class="notification_icon"></span> Saved Error. </div>
<form name="" id="setting_form" action="themes.php?page=theme_options.php&do=submit" method="post">
    <div class="mega_panel ">
        <div class="mega_header">
            <div class="mega_logo"><div class=" logo"></div></div>
            <button type="submit" name="save" class="btn btn-small mega_save"><i class="fa fa-save"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVE_CHANGES'])) ? $this->_rootref['LANG_CP_SAVE_CHANGES'] : ''; ?></button>
        </div>
        <div class="mega_panel_tabs">
            <ul>
                <li class=""><a href="#home_settings"><i class="fa fa-home"></i>Home Page Settings</a></li>
                <li class=""><a href="#header_settings"><i class="fa fa-arrow-up"></i>Header Settings</a></li>
            </ul>
        </div>
        <div class="mega_panel_tabs_bg"></div>
        <div class="mega_panel_content">
            <div class="box_tabs_container" id="home_settings" style="display: none;">
                <h1>Home Page</h1>
                <div class="tab_content">
                    <!--https://fortawesome.github.io/Font-Awesome/icons/-->
                    <div class="mega_item postbox">
                        <h3 class="hndle">Box 1</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Icon Box1 ex: fa-faq"></a>
                            <span class="label">icon Fortawesome</span>
                            <input type="text" id="iconbox1" name="iconbox1" value="<?php echo (isset($this->_rootref['ICONBOX1'])) ? $this->_rootref['ICONBOX1'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Box1"></a>
                            <span class="label">Title</span>
                            <input type="text" id="titlebox1" name="titlebox1" value="<?php echo (isset($this->_rootref['TITLEBOX1'])) ? $this->_rootref['TITLEBOX1'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Link Box1"></a>
                            <span class="label">Link</span>
                            <input type="text" id="linkbox1" name="linkbox1" value="<?php echo (isset($this->_rootref['LINKBOX1'])) ? $this->_rootref['LINKBOX1'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Link Box1"></a>
                            <span class="label">Title Link</span>
                            <input type="text" id="titlelinkbox1" name="titlelinkbox1" value="<?php echo (isset($this->_rootref['TITLELINKBOX1'])) ? $this->_rootref['TITLELINKBOX1'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Background Color Box1"></a>
                            <span class="label">Background Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['BGCOLORBOX1'])) ? $this->_rootref['BGCOLORBOX1'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="bgcolorbox1" type="text" name="bgcolorbox1" value="<?php echo (isset($this->_rootref['BGCOLORBOX1'])) ? $this->_rootref['BGCOLORBOX1'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Color Box1"></a>
                            <span class="label">Text Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['TEXTCOLORBOX1'])) ? $this->_rootref['TEXTCOLORBOX1'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="textcolorbox1" type="text" name="textcolorbox1" value="<?php echo (isset($this->_rootref['TEXTCOLORBOX1'])) ? $this->_rootref['TEXTCOLORBOX1'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Box1"></a>
                            <span class="label">Text</span>
                            <textarea id="textbox1" class="textarea_full" name="textbox1" rows="5"><?php echo (isset($this->_rootref['TEXTBOX1'])) ? $this->_rootref['TEXTBOX1'] : ''; ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="mega_item postbox">
                        <h3 class="hndle">Box 2</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Icon Box2 ex: fa-faq"></a>
                            <span class="label">icon Fortawesome</span>
                            <input type="text" id="iconbox2" name="iconbox2" value="<?php echo (isset($this->_rootref['ICONBOX2'])) ? $this->_rootref['ICONBOX2'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Box2"></a>
                            <span class="label">Title</span>
                            <input type="text" id="titlebox2" name="titlebox2" value="<?php echo (isset($this->_rootref['TITLEBOX2'])) ? $this->_rootref['TITLEBOX2'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Link Box2"></a>
                            <span class="label">Link</span>
                            <input type="text" id="linkbox2" name="linkbox2" value="<?php echo (isset($this->_rootref['LINKBOX2'])) ? $this->_rootref['LINKBOX2'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Link Box2"></a>
                            <span class="label">Title Link</span>
                            <input type="text" id="titlelinkbox2" name="titlelinkbox2" value="<?php echo (isset($this->_rootref['TITLELINKBOX2'])) ? $this->_rootref['TITLELINKBOX2'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Background Color Box2"></a>
                            <span class="label">Background Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['BGCOLORBOX2'])) ? $this->_rootref['BGCOLORBOX2'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="bgcolorbox2" type="text" name="bgcolorbox2" value="<?php echo (isset($this->_rootref['BGCOLORBOX2'])) ? $this->_rootref['BGCOLORBOX2'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Color Box2"></a>
                            <span class="label">Text Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['TEXTCOLORBOX2'])) ? $this->_rootref['TEXTCOLORBOX2'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="textcolorbox2" type="text" name="textcolorbox2" value="<?php echo (isset($this->_rootref['TEXTCOLORBOX2'])) ? $this->_rootref['TEXTCOLORBOX2'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Box2"></a>
                            <span class="label">Text</span>
                            <textarea id="textbox2" class="textarea_full" name="textbox2" rows="5"><?php echo (isset($this->_rootref['TEXTBOX2'])) ? $this->_rootref['TEXTBOX2'] : ''; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="mega_item postbox">
                        <h3 class="hndle">Box 3</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Icon Box3 ex: fa-faq"></a>
                            <span class="label">icon Fortawesome</span>
                            <input type="text" id="iconbox3" name="iconbox3" value="<?php echo (isset($this->_rootref['ICONBOX3'])) ? $this->_rootref['ICONBOX3'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Box3"></a>
                            <span class="label">Title</span>
                            <input type="text" id="titlebox3" name="titlebox3" value="<?php echo (isset($this->_rootref['TITLEBOX3'])) ? $this->_rootref['TITLEBOX3'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Link Box3"></a>
                            <span class="label">Link</span>
                            <input type="text" id="linkbox3" name="linkbox3" value="<?php echo (isset($this->_rootref['LINKBOX3'])) ? $this->_rootref['LINKBOX3'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Link Box3"></a>
                            <span class="label">Title Link</span>
                            <input type="text" id="titlelinkbox3" name="titlelinkbox3" value="<?php echo (isset($this->_rootref['TITLELINKBOX3'])) ? $this->_rootref['TITLELINKBOX3'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Background Color Box3"></a>
                            <span class="label">Background Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['BGCOLORBOX3'])) ? $this->_rootref['BGCOLORBOX3'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="bgcolorbox3" type="text" name="bgcolorbox3" value="<?php echo (isset($this->_rootref['BGCOLORBOX3'])) ? $this->_rootref['BGCOLORBOX3'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Color Box3"></a>
                            <span class="label">Text Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['TEXTCOLORBOX3'])) ? $this->_rootref['TEXTCOLORBOX3'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="textcolorbox3" type="text" name="textcolorbox3" value="<?php echo (isset($this->_rootref['TEXTCOLORBOX3'])) ? $this->_rootref['TEXTCOLORBOX3'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Text Box3"></a>
                            <span class="label">Text</span>
                            <textarea id="textbox3" class="textarea_full" name="textbox3" rows="5"><?php echo (isset($this->_rootref['TEXTBOX3'])) ? $this->_rootref['TEXTBOX3'] : ''; ?></textarea>
                        </div>
                    </div>

                    
                </div>
            </div>
    
    
            
            
            <div class="box_tabs_container" id="header_settings" style="display: none;">
                <h1>Header Settings</h1>
                <div class="tab_content">
                    
                    
                    <div class="mega_item postbox">
                        <h3 class="hndle">Cover Background Header</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Cover Background Header"></a>
                            <span class="label">Image</span>
                            
                            
                            
                            <input type="text" name="cover_background_header" class="img-path form-control span10" value="<?php echo (isset($this->_rootref['COVER_BACKGROUND_HEADER'])) ? $this->_rootref['COVER_BACKGROUND_HEADER'] : ''; ?>" id="cover_background_header" />
                            <input id="upload_cover_background_header_button" type="button" class="btn btn-small btn-info" value="Upload" style="margin-left: -52px; padding: 0px 5px 0px 5px; margin-top: 2px;display:<?php if ($this->_rootref['COVER_BACKGROUND_HEADER']) {  ?>none<?php } ?>"/>
                            <div style="clear:both;"></div>
                            <div id="cover_background_header-preview" class="img-preview" style="display:<?php if ($this->_rootref['COVER_BACKGROUND_HEADER']) {  ?>block<?php } else { ?>none<?php } ?>;">
                                <img src="<?php if ($this->_rootref['COVER_BACKGROUND_HEADER']) {  echo (isset($this->_rootref['COVER_BACKGROUND_HEADER'])) ? $this->_rootref['COVER_BACKGROUND_HEADER'] : ''; } else { ?>assets/images/spacer.png<?php } ?>" alt="" style="width: 150px;height: 130px;" />
                                <a class="del-img" title="Delete"></a>
                            </div>
                            <div style="clear:both;"></div>
                                
                                
                        </div>
                    </div>
                    
                    
                    <div class="mega_item postbox">
                        <h3 class="hndle">Title</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Title Header"></a>
                            <span class="label">Title</span>
                            <input type="text" id="title_header" name="title_header" value="<?php echo (isset($this->_rootref['TITLE_HEADER'])) ? $this->_rootref['TITLE_HEADER'] : ''; ?>" />
                        </div>
                        
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Color Title Header"></a>
                            <span class="label">Color</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['TITLE_HEADER_COLOR'])) ? $this->_rootref['TITLE_HEADER_COLOR'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="title_header_color" type="text" name="title_header_color" value="<?php echo (isset($this->_rootref['TITLE_HEADER_COLOR'])) ? $this->_rootref['TITLE_HEADER_COLOR'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="mega_item postbox">
                        <h3 class="hndle">Tagline</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Tagline Header"></a>
                            <span class="label">Tagline</span>
                            <input type="text" id="tagline_header" name="tagline_header" value="<?php echo (isset($this->_rootref['TAGLINE_HEADER'])) ? $this->_rootref['TAGLINE_HEADER'] : ''; ?>" />
                        </div>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Color Tagline Header"></a>
                            <span class="label">Color Tagline</span>
                            <div class="pp-background-color">
                                <div id="backgroundcolorselect" class="colorSelector pp-color"><div style="background-color:<?php echo (isset($this->_rootref['TAGLINE_HEADER_COLOR'])) ? $this->_rootref['TAGLINE_HEADER_COLOR'] : ''; ?>"></div></div>
                            	<input class="pp-input-text" id="tagline_header_color" type="text" name="tagline_header_color" value="<?php echo (isset($this->_rootref['TAGLINE_HEADER_COLOR'])) ? $this->_rootref['TAGLINE_HEADER_COLOR'] : ''; ?>"/>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mega_item postbox">
                        <h3 class="hndle">Search Box</h3>
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Search Box Header"></a>
                            <span class="label">Search Box</span>
                            <label style="width: 60px;display: inline-block;">
        						<input name="Search_show_header" id="Search_show_header" type="checkbox" <?php if ($this->_rootref['SEARCH_SHOW_HEADER']) {  ?>checked=""<?php } ?> />
        						<span class="lbl"></span>
        					</label>
                        </div>
                        
                        <div class="mega_option_item">
                            <a class="mega_help" original-title="Search Box Placeholder"></a>
                            <span class="label">Search Box Placeholder</span>
                            <input type="text" id="Search_placeholder_header" name="Search_placeholder_header" value="<?php echo (isset($this->_rootref['SEARCH_PLACEHOLDER_HEADER'])) ? $this->_rootref['SEARCH_PLACEHOLDER_HEADER'] : ''; ?>" />
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            
            
            
            
            
     
        <div class="mega_footer">
            <button type="submit" name="save" class="btn btn-small mega_save"><i class="fa fa-save"></i> <?php echo (isset($this->_rootref['LANG_CP_SAVE_CHANGES'])) ? $this->_rootref['LANG_CP_SAVE_CHANGES'] : ''; ?></button>
        </div>

        </div>

    <div class="clear"></div>
    </div>
</form>

<?php $this->_tpl_include('footer.html'); ?>