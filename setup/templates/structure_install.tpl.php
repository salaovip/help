<form action="install.php?step=3" method="post">
    <p>All right, If you are ready, time now</p>
    <input type="hidden" name="dbhost" value="<?php echo sanitize($_POST['dbhost']); ?>" />
    <input type="hidden" name="dbuser" value="<?php echo sanitize($_POST['dbuser']); ?>" />
    <input type="hidden" name="dbpwd"  value="<?php echo sanitize($_POST['dbpwd']);  ?>" />
    <input type="hidden" name="dbname" value="<?php echo sanitize($_POST['dbname']); ?>" />
    <input type="hidden" name="prefix" value="<?php echo sanitize($_POST['prefix']); ?>" />
    <input type="hidden" name="db_action" id="db_action" value="1" />
    <div class="btn lgn">
    <button type="submit" name="next" class="button button-large">Run the install</button>
  </div>
</form>