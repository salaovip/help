






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
                $('#progressmessage').html('Status: upgrade Step 1');
                $('#statusmessage').html('Status: upgrade Step 1');
            }
        }, time);
        $(".mCSB_container").css('top','-500px');
        $(".mCSB_dragger").css('top','500px');
        $("#mainmessage").scrollTop($("#mainmessage").scrollTop() + 10000);
    }
    //------------------------------------------------------------------
    //-------------------------------------------------- step 1
    $.step1 = function(){
        $.ajax({type: "get",url: "step-update1.php?step=1", cache: false,async: false,data:'',beforeSend: function(){},success: function(data){
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
                        $.progress(1,100,600);
                        
                        setTimeout(function(){
                            $('#upgradeprogress').addClass('hidden');
                            $('.status-done').removeClass('hidden');
                            $('#progressmessage').html('done upgrade');
                            $('#statusmessage').html('done upgrade');
                        }, 300);
                    
                    }
                }
            },error: function(){}
        });
        
    }
    
    //------------------------------------------------------------------
    //-------------------------------------------------- begin update
    $('#beginupdate').on('click',function() {
        $('#formupdate').addClass('hidden');
        $('#progresssection').removeClass('hidden');
        $('#upgradeprogress').removeClass('hidden');
        $('#detailbox').removeClass('hidden');
        $.step1();
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