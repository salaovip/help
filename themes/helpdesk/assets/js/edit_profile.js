﻿function initJcrop(){var a=$("#uploadtype").val(),b=$("#tempstatus .imgw").val(),c=$("#tempstatus .imgh").val();if("avatar"==a)var d=256,e=256;if("cover"==a)var d=1190,e=260;var f=$(".profile-"+a+"-crop .popup-content").width(),g=$(".profile-"+a+"-crop .popup-content").height();$(".profile-"+a+"-crop .popup-content img").Jcrop({onSelect:saveCoords,boxWidth:f,boxHeight:g,trueSize:[b,c],allowSelect:!1,minSize:[d,e],aspectRatio:d/e},function(){jcrop_api=this}),$(".profile-"+a+"-crop").center(!0),jcrop_api.animateTo(getRandom())}function getRandom(){var a=jcrop_api.getBounds();return[Math.round(Math.random()*a[0]),Math.round(Math.random()*a[1]),Math.round(Math.random()*a[0]),Math.round(Math.random()*a[1])]}function saveCoords(a){$("#cropx").val(Math.round(a.x)),$("#cropy").val(Math.round(a.y)),$("#cropx2").val(Math.round(a.x2)),$("#cropy2").val(Math.round(a.y2)),$("#cropw").val(Math.round(a.w)),$("#croph").val(Math.round(a.h)),$("#").val(Math.round(a.x)+","+Math.round(a.y)+","+Math.round(a.x2)+","+Math.round(a.y2))}function chkname(){var a=$("#first-name").val(),b=$("#last-name").val();a?($(".firstnamemsg").addClass("hidden"),$("#first-name").removeClass("error")):($(".firstnamemsg").removeClass("hidden"),$("#first-name").addClass("error")),b?($(".lastnamemsg").addClass("hidden"),$("#last-name").removeClass("error")):($(".lastnamemsg").removeClass("hidden"),$("#last-name").addClass("error"))}function website(){var a=$("#website").val();a=a.replace("http://",""),a=a.replace("https://",""),$("#website").val(a)}$(".upload-avatar-button").click(function(){$("body").animate({scrollTop:"0"}),$("#uploadtype").val("avatar"),$(".avatarupload").click()}),$(".upload-cover-button").click(function(){$("body").animate({scrollTop:"0"}),$("#uploadtype").val("cover"),$(".coverupload").click()}),$("#avatarupload,#coverupload").change(function(){{var a=$("#uploadtype").val(),b=$("."+a+"-image-wrap"),c=b.find(".bar"),d=b.find(".percent"),e=$("#tempstatus"),f=b.find(".upb-loading"),g=b.find(".process-warp"),h=$(this).parent().find(".messege-text");$("#uploadingavatar").val()}$("."+a+"error").addClass("hidden"),h.html(""),$("#profileform").ajaxForm({target:"#tempstatus",beforeSend:function(){$("#avatarupload").removeClass("avatarupload"),$("#coverupload").removeClass("coverupload");var a="0%";c.width(a),d.html(a)},uploadProgress:function(a,b,e,f){var g=f+"%";c.width(g),d.html(g)},success:function(){var a="100%";c.width(a),d.html(a)},complete:function(b){$("#avatarupload").addClass("avatarupload"),$("#coverupload").addClass("coverupload");b.responseText;e.html($(b.responseText));var d=$(e).find("span");$(h).html(d),$(f).addClass("hidden");var i=$(h).children(".error").length;if(i)$("."+a+"error").removeClass("hidden");else{$(g).removeClass("hidden");var j=$(e).find("img.attachment-full,img.attachment-thumbnail"),k=j.attr("src");j.attr("src",k+"?timestamp="+(new Date).getTime()),jcrop_api&&jcrop_api.destroy(),$(".profile-"+a+"-crop .popup-content").children("img").remove(),$(".profile-"+a+"-crop .popup-content").append(j),$(".profile-"+a+"-crop .popup-content > img").imagesLoaded(function(){$(".profile-"+a+"-crop, .popup-overlay").removeClass("hidden"),$(g).addClass("hidden"),initJcrop(),$(".profile-"+a+"-crop").center(!0)})}$("#avatarupload").val(""),$("#coverupload").val("")}}),$("#profileform").submit(),$(this).parent().find(".upb-loading").removeClass("hidden")});var jcrop_api;website(),$(document).ready(function(){$(".dual-input-warp > .rh-delete ").on("click",function(){$(this).closest(".social-input").children(".dual-input-warp").children("input").attr("value",""),$(this).closest(".social-input").children(".social-add-label").show(),$(this).closest(".social-input").children(".dual-input-warp").hide(),$("#profileform").ajaxForm({success:function(){$("li.save").removeClass("c_me_b-loading")}}),$("#profileform").submit()}),$(".social-input > .social-add-label ").on("click",function(){$(this).closest(".social-input").children(".dual-input-warp").show(),$(this).closest(".social-input").find("input").focus(),$(this).hide()}),$(".dual-input-warp input ").each(function(){$(this).val()&&($(this).closest(".social-input").children(".dual-input-warp").show(),$(this).closest(".social-input").children(".social-add-label").hide())}),$(".dual-input-warp input ").on("blur",function(){$(this).val()||($(this).closest(".social-input").children(".dual-input-warp").hide(),$(this).closest(".social-input").children(".social-add-label").show())})}),$(".crop-popup .micon-inline-accept").on("click",function(){var a=$("#uploadtype").val(),b=this,c=$("."+a+"-image-wrap"),d=$("#tempstatus");$(this).addClass("form-button-loading"),$("#crop"+a).val("1"),$("#profileform").ajaxForm({target:"#tempstatus",success:function(){$("#crop"+a).val("0");var f=$(d).find("img");$(c).children("img").remove(),$(c).append(f);var g=$(c).children("img").attr("src");$(b).removeClass("form-button-loading"),$(".profile-"+a+"-crop").addClass("hidden"),$(".popup-overlay").addClass("hidden"),$(c).children("img").attr("src",g+"?timestamp="+(new Date).getTime())}}),$("#profileform").submit()}),$(".crop-popup .micon-inline-cancel").on("click",function(){var a=$("#uploadtype").val(),b=this,d=($("."+a+"-image-wrap"),"ajax.php?do=cancelprofileupload&type="+a);$(b).addClass("form-button-loading"),a&&$.get(d,function(){$(b).removeClass("form-button-loading"),$(b).parents(".popup").addClass("hidden"),$(".popup-overlay").addClass("hidden"),$("#crop"+a).val("0")})}),$(".popup-overlay").on("click",function(){var a=$("#uploadtype").val();$(".profile-"+a+"-crop .micon-inline-cancel").click()}),$(".autosave").on("change",function(){$(this).parent().addClass("input-loading"),$(this).parent(".dual-input-warp").addClass("input-loading"),$("#profileform").ajaxForm({success:function(){$(".input-loading").removeClass("input-loading"),chkname()}}),$("#profileform").submit()}),$(document).ready(function(){$(".desktop-mode .activity-noti-toggle,.pad-mode .activity-noti-toggle").on("click",function(){$(".noti-popup").hide(),$(".activity-noti-popup").toggle()}),$(".mobile-mode .activity-noti-toggle").on("click",function(){$(".noti-popup").hide(),$(".activity-noti-popup").toggle(),$(".activity-noti-popup").show(),$("#tab-content").hide(),$("html").addClass("popup-active")}),$(".desktop-mode .pm-noti-toggle,.pad-mode .pm-noti-toggle").on("click",function(){$(".noti-popup").hide(),$(".pm-noti-popup").toggle()}),$(".mobile-mode .pm-noti-toggle").on("click",function(){$(".noti-popup").hide(),$(".pm-noti-popup").toggle(),$(".pm-noti-popup").show(),$("#tab-content").hide(),$("html").addClass("popup-active")}),$(".activity-noti-popup .close-action").click(function(){$(".activity-noti-popup").hide(),$("#tab-content").show(),$("html").removeClass("popup-active")}),$(".tab-popup-filter .close-action").click(function(){$(".tab-popup-filter").hide(),$("#tab-content").show()})});