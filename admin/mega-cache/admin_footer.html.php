<?php if (!defined('IN_MEGABUGS')) exit; ?></div>
		</div>
	</div>
    <script type="text/javascript" src="assets/js/mega.js"></script>
    <script src="assets/plugins/thickbox/script.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script type="text/javascript">
		$(function() {
			$('table th input:checkbox').on('click' , function(){
				var that = this;
				$(this).closest('table').find('tr > td:first-child input:checkbox')
				.each(function(){
					this.checked = that.checked;
					$(this).closest('tr').toggleClass('selected');
				});	
			});
		})
	</script>
</body>
</html>