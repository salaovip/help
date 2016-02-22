
function checkAll(ele) {
 var checkboxes = document.getElementsByTagName('input');
 if (ele.checked) {
     for (var i = 0; i < checkboxes.length; i++) {
         if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = true;
         }
     }
 } else {
     for (var i = 0; i < checkboxes.length; i++) {
         console.log(i)
         if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = false;
         }
     }
 }
}





$(document).ready(function() { 
    
    $.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default
    $.mCustomScrollbar.defaults.axis="y"; //enable 2 axis scrollbars by default
    //------------------------------------------------------------------
    //-------------------------------------------------- function progress
    $.progress = function(step,bar,time){
        var status_step = $('#status_step').val();
        setTimeout(function(){
            $('#progress-bar').html(bar+'%');
            $('#progress-bar').css('width',bar+'%');
            $('#progress-bar').attr('aria-valuenow',bar);
            if(step < 6)
            {
                $('#progressmessage').html(status_step.replace('%s', step));
                $('#statusmessage').html(status_step.replace('%s', step));
            }
        }, time);
        $(".mCSB_container").css('top','-500px');
        $(".mCSB_dragger").css('top','500px');
        $("#mainmessage").scrollTop($("#mainmessage").scrollTop() + 10000);
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- step 1
    $.step1 = function(){
        $.ajax({type: "get",url: "step-install.php?step=1", cache: false,async: false,data:'',beforeSend: function(){},success: function(data){
                var obj = jQuery.parseJSON(data);
                $('.list_no_decoration').append(obj.html);
                if(obj.contents == 'yes')
                {
                    $('.modal-actionrequired').modal('show');
                    return false;
                }
                else
                {
                    if(obj.error == 'yes')
                    {
                        $('#upgradeprogress').addClass('hidden');
                        $.progress(1,0,200);
                        $('#checkinstall').removeClass('hidden');
                    }
                    else
                    {
                        $.progress(1,16,200);
                        setTimeout(function(){$.step2();}, 300);
                    }
                }
            },error: function(){}
        });
        
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- step 2
    $.step2 = function()
    {
        $.ajax({type: "get",url: "step-install.php?step=2",data:'',beforeSend: function(){},success: function(data){
                var obj = jQuery.parseJSON(data);
                $('.list_no_decoration').append(obj.html);
                if(obj.error == 'yes')
                {
                    $('#upgradeprogress').addClass('hidden');
                    $.progress(2,33,200);
                }
                else
                {
                    $.progress(2,33,200);
                    setTimeout(function(){$.step3();}, 300);
                }
            },error: function(){}
        });
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- step 3
    $.step3 = function()
    {
        $.ajax({type: "get",url: "step-install.php?step=3",data:'',beforeSend: function(){},success: function(data){
                var obj = jQuery.parseJSON(data);
                $('.list_no_decoration').append(obj.html);
                if(obj.error == 'yes')
                {
                    $('#upgradeprogress').addClass('hidden');
                    $.progress(3,50,200);
                }
                else
                {
                    $.progress(3,50,200);
                    setTimeout(function(){$('.modal-general-settings').modal('show');}, 400);
                }
            },error: function(){}
        });
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- set site info
    $('form.modal-step3').ajaxForm({
		beforeSubmit: function(a,f,o) {
			o.dataType = 'json'; // json, xml
		},
		success: function(data) {
			$('.modal-general-settings').modal('hide');
			$('.list_no_decoration').append(data.html);
            if(data.error == 'yes')
            {
                $('#upgradeprogress').addClass('hidden');
                $.progress(4,66,200);
            }
            else
            {
                $.progress(4,66,200);
                setTimeout(function(){$('.modal-administrator').modal('show');}, 400);
            }
		}
	});
    //------------------------------------------------------------------
    //-------------------------------------------------- set admin info
    $('form.modal-step4').ajaxForm({
		beforeSubmit: function(a,f,o) {
			o.dataType = 'json'; // json, xml
		},
		success: function(data) {
			$('.modal-administrator').modal('hide');
			$('.list_no_decoration').append(data.html);
            if(data.error == 'yes')
            {
                $('#upgradeprogress').addClass('hidden');
                $.progress(5,85,200);
            }
            else
            {
                $.progress(5,85,200);
                setTimeout(function(){$.step6();}, 300);
            }
		}
	});
    //------------------------------------------------------------------
    //-------------------------------------------------- step 6
    $.step6 = function()
    {
        var done_step   = $('#done_step').val();
        $.ajax({type: "get",url: "step-install.php?step=6",data:'',beforeSend: function(){},success: function(data){
                var obj = jQuery.parseJSON(data);
                $('.list_no_decoration').append(obj.html);
                if(obj.error == 'yes')
                {
                    $('#upgradeprogress').addClass('hidden');
                    $.progress(6,100,200);
                }
                else
                {
                    $.progress(6,100,200);
                    setTimeout(function(){
                        $('#upgradeprogress').addClass('hidden');
                        $('.status-done').removeClass('hidden');
                        $('#progressmessage').html(done_step);
                        $('#statusmessage').html(done_step);
                    }, 300);
                        
                }
            },error: function(){}
        });
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- delete database
    $('#send_delete_resetdatabase').click(function(){
        $.ajax({type: "post",url: "step-install.php?do=deletedatabase",data:'',beforeSend: function(){},success: function(data){
             setTimeout(function(){$.step2();}, 300);
            },error: function(){}
        });
    });
    //------------------------------------------------------------------
    //-------------------------------------------------- begin install
    $('#begininstall').on('click',function() {
        $('#forminstall').addClass('hidden');
        $('#progresssection').removeClass('hidden');
        $('#upgradeprogress').removeClass('hidden');
        $('#detailbox').removeClass('hidden');
        $.step1();
        return false;
    });
    //------------------------------------------------------------------
    //-------------------------------------------------- check install
    $('#checkinstall').on('click',function() {
        location.reload();
        return false;
    });
    //------------------------------------------------------------------
    //-------------------------------------------------- show details
    $('#showdetails').on('click',function() {
        $('#showdetails').addClass('hidden');
        $('#detailbox').removeClass('hidden');
        $('#hidedetails').removeClass('hidden');
    });
    //------------------------------------------------------------------
    //-------------------------------------------------- hide details
    $('#hidedetails').on('click',function() {
        $('#hidedetails').addClass('hidden');
        $('#detailbox').addClass('hidden');
        $('#showdetails').removeClass('hidden');
    });
    //------------------------------------------------------------------
    $('#send_yes_actionrequired').click(function(){
        setTimeout(function(){
            $('.modal-resetdatabase').modal('show');
                    return false;
        }, 300);
    });
    //
});