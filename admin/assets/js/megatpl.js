$(function(){$("[data-rel=tooltip]").tooltip(),$("[data-rel=popover]").popover({html:!0}),$(".select_plugin li").click(function(){$(this).parent("ol").find("li").removeClass("selectd"),$(this).addClass("selectd"),$(this).find("input").attr("checked","checked")}),$(".select_plugin li a").click(function(a){a.preventDefault(a)})});