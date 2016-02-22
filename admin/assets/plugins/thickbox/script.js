

$(document).on('click','#btn-upload', function(){
    var field = $(this).attr('data-id');
    window.restore_send_to_editor  = window.send_to_editor;
    window.restore_send_to_gallery = window.send_to_gallery;
    tb_show('', 'media-upload.php?referer='+field+'&type=image&tab=type&TB_iframe=true');
    mega_set_send_img(field);
});


//
$(document).on('click','.del-img', function(){
    var field = $(this).attr('data-id');
    $(this).parent().fadeOut(function() {
		$(this).hide();
		$(this).parent().find('input[id="'+field+'"]').attr('value', '' );
        $('.upload_'+field+'_button').show();
	});
});
// image Uploader Functions #######################################
function mega_set_uploader(field) {
	var button = "#upload_"+field+"_button";
	$(button).click(function() {
		window.restore_send_to_editor  = window.send_to_editor;
        window.restore_send_to_gallery = window.send_to_gallery;
        tb_show('', 'media-upload.php?referer='+field+'&type=image&tab=type&TB_iframe=true');
	    mega_set_send_img(field);
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
		$('#'+field).val(imgurl);
		$('#'+field+'-preview').show();
		$('#'+field+'-preview img').attr("src",imgurl);
        $('.upload_'+field+'_button').hide();
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






$(document).on('click','#set-upload', function(){
    $("#async_upload").click();
});
$(document).ready(function() {
    $('body').on('change', '#async_upload', function(){
        $('#image-form').submit();
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
		else {document.getElementById('status_img').innerHTML = '<img src="assets/plugins/thickbox/no.png" alt="" />';
        document.getElementById('preloadImg').src = "";
        }
	},
	updateImageData : function() {
		var t = addExtImage;
		t.width = t.preloadImg.width;
		t.height = t.preloadImg.height;
		document.getElementById('status_img').innerHTML = '<img src="assets/plugins/thickbox/yes.png" alt="" />';
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
		document.getElementById('status_img').innerHTML = '<img src="assets/plugins/thickbox/loading.gif" alt="" width="16" />';
		t.preloadImg = new Image();
		t.preloadImg.onload = t.updateImageData;
		t.preloadImg.onerror = t.resetImageData;
		t.preloadImg.src = src;
	}
}













mega_set_picture_uploader();

function mega_set_picture_uploader() {
	$("#insert-picture-button").click(function() {
		window.restore_send_to_editor  = window.send_to_editor;
        window.restore_send_to_gallery = window.send_to_gallery;
        tb_show('Add Picture', 'media-upload.php?referer=picture&type=image&tab=type&TB_iframe=true');
        window.send_to_editor = function(html) {
    		tb_remove();
            tinymce.activeEditor.selection.setContent(html);
    		window.send_to_editor = window.restore_send_to_editor;
    	}
		return false;
	});
}



mega_set_youtube_uploader();


function mega_set_youtube_uploader() {
	$("#insert-youtube-button").click(function() {
		window.restore_send_to_editor  = window.send_to_editor;
        tb_show('Add Youtube', 'shortcode.php?referer=youtube&type=youtube&TB_iframe=true&height=250&width=400');
        window.send_to_editor = function(html) {
    		tb_remove();
            tinymce.activeEditor.selection.setContent(html);
    		window.send_to_editor = window.restore_send_to_editor;
    	}
		return false;
	});
}

