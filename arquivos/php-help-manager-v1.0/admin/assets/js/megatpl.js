



$(function() {
    $('[data-rel=tooltip]').tooltip();
	$('[data-rel=popover]').popover({html:true});
    
    $('#per_page').change()
    {
        //val()
    }
	$('#spinner3').ace_spinner({value:3,min:3,max:36,step:6, icon_up:'icon-plus', icon_down:'icon-minus', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
    
    $('#tab-videoy').click(function(){
       $('div#featured-box').hide(); 
       $('#gallery_type').val("videoy");
    });
    $('#tab-videov').click(function(){
       $('div#featured-box').hide(); 
       $('#gallery_type').val("videov");
    });
    $('#tab-sound').click(function(){
       $('div#featured-box').hide(); 
       $('#gallery_type').val("sound");
    });
    $('#tab-gallery').click(function(){
       $('div#featured-box').show(); 
       $('#gallery_type').val("photo");
    });
    
    
    
    
    
    
    
 

	//$(".select_plugin li input").css('display','none');

	$(".select_plugin li").click(function()
	{
		$(this).parent('ol').find('li').removeClass('selectd');
		$(this).addClass('selectd');
		$(this).find('input').attr('checked','checked');
	});

	$(".select_plugin li a").click(function(event)
	{
		event.preventDefault(event);
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
    
    
    $.save_widget = function(dataString,url)
    {
        $.ajax({
             type: 'post',
             url: url,
             data: dataString,
             beforeSend: function()
             {
                
             },
             success: function(data){},
             error: function(){}
        });
    }
    
    
    $('#widget_categories_save').click(function(){
        var show       = $("#widget_categories");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_categories_title").val();
        var dataString = "status="+ status + "&title=" + title;
        var url        = 'ajax-widget.php?action=categories_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_tabs_save').click(function(){
        var show       = $("#widget_tabs");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var first      = $("#widget_tabs_first").val();
        var second     = $("#widget_tabs_second").val();
        var third      = $("#widget_tabs_third").val();
        var dataString = 'status='+ status + '&first=' + first+ '&second=' + second+ '&third=' + third;
        var url        = 'ajax-widget.php?action=tabs_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_pictures_save').click(function(){
        var show       = $("#widget_pictures");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title       = $("#widget_pictures_title").val();
        var number      = $("#widget_pictures_number").val();
        var dataString  = 'status='+ status + '&title=' + title+ '&number=' + number;
        var url         = 'ajax-widget.php?action=pictures_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    
    $('#widget_fvideo_save').click(function(){
        var showy       = $("#widget_fvideoy");
        if(showy.is(':checked')){var statusy = 1;}else{var statusy = 0;}
        var showv       = $("#widget_fvideov");
        if(showy.is(':checked')){var statusv = 1;}else{var statusv = 0;}
        var idy       = $("#widget_fvideoy_id").val();
        var idv       = $("#widget_fvideov_id").val();
        
        var dataString  = 'statusy='+ statusy + '&statusv=' + statusv+ '&idy=' + idy+ '&idv=' + idv;
        var url         = 'ajax-widget.php?action=fvideo_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_text_save').click(function(){
        var show       = $("#widget_text");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_text_title").val();
        var text       = $("#widget_text_text").val();
        var dataString = 'status='+ status + '&title=' + title+ '&text=' + text;
        var url        = 'ajax-widget.php?action=text_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    
    $('#widget_facebook_save').click(function(){
        var show       = $("#widget_facebook");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_facebook_title").val();
        var url        = $("#widget_facebook_url").val();
        var dataString = 'status='+ status + '&title=' + title+ '&url=' + url;
        var url        = 'ajax-widget.php?action=facebook_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_twitter_save').click(function(){
        var show       = $("#widget_twitter");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_twitter_title").val();
        var id         = $("#widget_twitter_id").val();
        var dataString = 'status='+ status + '&title=' + title+ '&id=' + id;
        var url        = 'ajax-widget.php?action=twitter_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_google_save').click(function(){
        var show       = $("#widget_google");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_google_title").val();
        var url        = $("#widget_google_url").val();
        
        var dataString = 'status='+ status + '&title=' + title+ '&url=' + $("#widget_google_url").val();
        var url        = 'ajax-widget.php?action=google_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    $('#widget_flickr_save').click(function(){
        var show       = $("#widget_flickr");
        if(show.is(':checked')){var status = 1;}else{var status = 0;}
        var title      = $("#widget_flickr_title").val();
        var id         = $("#widget_flickr_id").val();
        var dataString = 'status='+ status + '&title=' + title+ '&id=' + id;
        var url        = 'ajax-widget.php?action=flickr_save';
        $.ajax({type: 'post',url: url,data: dataString,beforeSend: function(){$('#widget_save').fadeIn(200);$('#widget_save').delay(1000).fadeOut(200);},success: function(data){},error: function(){}});
        return false;
    });
    
    
    
});




