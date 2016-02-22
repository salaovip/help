jQuery(document).ready(function() {
	
jQuery(".box_tabs_container").hide();
jQuery(".mega_panel_tabs ul li:first").addClass("active").show();
jQuery(".box_tabs_container:first").show(); 
jQuery(".mega_panel_tabs ul li").click(function() {
	jQuery(".mega_panel_tabs ul li").removeClass("active");
	jQuery(this).addClass("active");
	jQuery(".box_tabs_container").hide();
	var activeTab = jQuery(this).find("a").attr("href");
	jQuery(activeTab).fadeIn();
	return false;
});
// End tabs

jQuery('.mega_option_item a , .titlebuilder a, .navbuilder a').tipsy({
fade: true, 
gravity: 's'
});
//tooltip
jQuery('.mega_panel input:checkbox:not([safari]), .mega_itemega_panel input:checkbox:not([safari]), .check_radio_content input:radio:not([safari])  , .rwmb-input input:checkbox:not([safari])').checkbox();
jQuery('.mega_panel input[safari]:checkbox, .mega_itemega_panel input[safari]:checkbox, .check_radio_content input[safari]:radio  , .rwmb-input input[safari]:checkbox').checkbox({cls:'jquery-safari-checkbox'});
jQuery('.mega_panel :checkbox, .mega_itemega_panel :checkbox, .check_radio_content :radio  , .rwmb-input :checkbox').checkbox();
//checkbox





});



// All custom JS not relating to theme options goes here

jQuery(document).ready(function($) {

/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

    /* Grab our vars ---------------------------------------------------------------*/
	var audioOptions = $('#mega-metabox-post-audio'),
    	audioTrigger = $('#post-format-audio'),
    	videoOptions = $('#mega-metabox-post-video'),
    	videoTrigger = $('#post-format-video'),
    	galleryOptions = $('#mega-metabox-post-image'),
    	galleryTrigger = $('#post-format-gallery'),
    	linkOptions = $('#mega-metabox-post-link'),
    	linkTrigger = $('#post-format-link'),
    	quoteOptions = $('#mega-metabox-post-quote'),
    	quoteTrigger = $('#post-format-quote'),
    	group = $('#post-formats-select input');

    /* Hide and show sections as needed --------------------------------------------*/
    megaHideAll(null);	

	group.change( function() {
	    $that = $(this);
	    
        megaHideAll(null);

        if( $that.val() == 'audio' ) {
			audioOptions.css('display', 'block');
		} else if( $that.val() == 'video' ) {
			videoOptions.css('display', 'block');
		} else if( $that.val() == 'gallery' ) {
		    galleryOptions.css('display', 'block');
		} else if( $that.val() == 'link' ) {
		    linkOptions.css('display', 'block');
		} else if( $that.val() == 'quote' ) {
		    quoteOptions.css('display', 'block');
		}

	});

	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');

	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');

    if(galleryTrigger.is(':checked'))
        galleryOptions.css('display', 'block');

    if(linkTrigger.is(':checked'))
        linkOptions.css('display', 'block');

    if(quoteTrigger.is(':checked'))
        quoteOptions.css('display', 'block');

    function megaHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
    }
    
    
});