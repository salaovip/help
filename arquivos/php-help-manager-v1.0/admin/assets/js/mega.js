// image Uploader Functions #######################################
	function mega_set_uploader(field) {
		var button = "#upload_"+field+"_button";
		$(button).click(function() {
			window.restore_send_to_editor  = window.send_to_editor;
            window.restore_send_to_gallery = window.send_to_gallery;
            tb_show('', 'media-upload.php?referer='+field+'&type=image&TB_iframe=true');
		    mega_set_send_img(field);
            mega_set_send_gallery(field);
			return false;
		});
		$('#'+field).change(function(){
			$('#'+field+'-preview').show();
            $('#upload_'+field+'_button').hide();
			$('#'+field+'-preview img').attr("src",$('#'+field).val());
		});
	}
// set Preview Image ##############################################
	function mega_set_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = $('img',html).attr('src');
			tb_remove();
			if(typeof imgurl == 'undefined') // Bug fix By Fouad Badawy
				imgurl = $(html).attr('src');
			$('#'+field).val(imgurl.replace("../", ""));
			$('#'+field+'-preview').show();
			$('#'+field+'-preview img').attr("src",imgurl);
            $('#upload_'+field+'_button').hide();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
// Del Preview Image ##############################################
	$(document).on("click", ".del-img" , function(){
		$(this).parent().fadeOut(function() {
			$(this).hide();
			$(this).parent().find('input[id="featured"]').attr('value', '' );
            $('#upload_featured_button').show();
		});
	});	
// Del Preview logo Image #########################################
	$(document).on("click", ".del-img" , function(){
		$(this).parent().fadeOut(function() {
			$(this).hide();
			$(this).parent().find('input[id="logo"]').attr('value', '' );
            $('#upload_logo_button').show();
		});
	});	
// Del Preview favicon Image #########################################
	$(document).on("click", ".del-img" , function(){
		$(this).parent().fadeOut(function() {
			$(this).hide();
			$(this).parent().find('input[id="favicon"]').attr('value', '' );
            $('#upload_favicon_button').show();
		});
	});	
// button Image upload ############################################
    mega_set_uploader("featured");
    mega_set_uploader("logo");
    mega_set_uploader("favicon");
    

$(document).ready(function(){

		// Color Picker
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
	
	// === Sidebar navigation === //
	
	$('.submenu > a').click(function(e)
	{
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenu.slideUp();
			} else {
				submenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				submenus.slideUp();			
				submenu.slideDown();
			} else {
				submenus.fadeOut(250);			
				submenu.fadeIn(250);
			}
			submenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	
	var ul = $('#sidebar > ul');
	
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});
	
	// === Resize window related === //
	$(window).resize(function()
	{
		if($(window).width() > 479)
		{
			ul.css({'display':'block'});	
			$('#content-header .btn-group').css({width:'auto'});		
		}
		if($(window).width() < 479)
		{
			ul.css({'display':'none'});
			fix_position();
		}
		if($(window).width() > 768)
		{
			$('#user-nav > ul').css({width:'auto',margin:'0'});
            $('#content-header .btn-group').css({width:'auto'});
		}
	});
	
	if($(window).width() < 468)
	{
		ul.css({'display':'none'});
		fix_position();
	}
	
	if($(window).width() > 479)
	{
	   $('#content-header .btn-group').css({width:'auto'});
		ul.css({'display':'block'});
	}
	
	// === Tooltips === //
	$('.tip').tooltip();	
	$('.tip-left').tooltip({ placement: 'left' });	
	$('.tip-right').tooltip({ placement: 'right' });	
	$('.tip-top').tooltip({ placement: 'top' });	
	$('.tip-bottom').tooltip({ placement: 'bottom' });	
	
	
	// === Fixes the position of buttons group in content header and top user navigation === //
	function fix_position()
	{
		var uwidth = $('#user-nav > ul').width();
		$('#user-nav > ul').css({width:uwidth,'margin-left':'-' + uwidth / 2 + 'px'});
        
        var cwidth = $('#content-header .btn-group').width();
        $('#content-header .btn-group').css({width:cwidth,'margin-left':'-' + uwidth / 2 + 'px'});
	}
	
    
  
	
    $("#browser-uploader").click(function(){
        $("#multi-file").hide();
        $("#browser-file").show();
        return false;
    });
    
    $("#multi-file-uploader").click(function(){
        $("#browser-file").hide();
        $("#multi-file").show();
        return false;
    });

    
	
});
















var addExtImage = {

	width : '',
	height : '',
	align : 'alignnone',

	insert : function() {
		var t = this, html, f = document.forms[0], cls, title = '', alt = '', caption = '';

		if ( '' == f.src.value || '' == t.width )
			return false;

		if ( f.alt.value )
			alt = f.alt.value.replace(/'/g, '&#039;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

		if ( f.caption.value ) {
			caption = f.caption.value.replace(/\r\n|\r/g, '\n');
			caption = caption.replace(/<[a-zA-Z0-9]+( [^<>]+)?>/g, function(a){
				return a.replace(/[\r\n\t]+/, ' ');
			});

			caption = caption.replace(/\s*\n\s*/g, '<br />');
		}

		cls = caption ? '' : ' class="'+t.align+'"';

		html = '<img alt="'+alt+'" src="'+f.src.value+'"'+cls+' width="'+t.width+'" height="'+t.height+'" />';

		if ( f.url.value ) {
			url = f.url.value.replace(/'/g, '&#039;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
			html = '<a href="'+url+'">'+html+'</a>';
		}

		if ( caption )
			html = '[caption id="" align="'+t.align+'" width="'+t.width+'"]'+html+caption+'[/caption]';

		var win = window.dialogArguments || opener || parent || top;
		win.send_to_editor(html);
		return false;
	},

	resetImageData : function() {
		var t = addExtImage;
		t.width = t.height = '';
		if ( ! document.forms[0].src.value ){document.getElementById('status_img').innerHTML = '*';}
		else {document.getElementById('status_img').innerHTML = '<img src="assets/img/no.png" alt="" />';
        document.getElementById('preloadImg').src = "";
        }
        
        
        
	},

	updateImageData : function() {
		var t = addExtImage;
		t.width = t.preloadImg.width;
		t.height = t.preloadImg.height;
		document.getElementById('status_img').innerHTML = '<img src="assets/img/yes.png" alt="" />';
        document.getElementById('preloadImg').src = document.getElementById('src').value;
	},

	getImageData : function() {
		if ( jQuery('table.describe').hasClass('not-image') )
			return;

		var t = addExtImage, src = document.forms[0].src.value;

		if ( ! src ) {
			t.resetImageData();
			return false;
		}

		document.getElementById('status_img').innerHTML = '<img src="assets/img/loading.gif" alt="" width="16" />';
		t.preloadImg = new Image();
		t.preloadImg.onload = t.updateImageData;
		t.preloadImg.onerror = t.resetImageData;
		t.preloadImg.src = src;
	}
}









































