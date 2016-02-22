<h2 id="install"><i class="fa fa-database"></i> MySQL database configuration</h2>
<?php echo ($msg) ?  "<div class=\"error\">{$msg}</div>" : '';?>
<form action="install.php?step=2" method="post">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td class="item-desc">
      Below you should enter your database connection details. If you’re not sure about these, contact your host.
      </td>
    </tr>
    <tr>
      <td><table width="100%" class="form-table">
          <tr>
            <th width="200">Database Host:</th>
            <td><input type="text" name="dbhost" size="30" value="<?php echo isset($_POST['dbhost']) ? sanitize($_POST['dbhost']) : 'localhost'; ?>" id="t1" /></td>
            <td><div class="err" id="err1">You should be able to get this info from your web host, if localhost does not work.</div></td>
          </tr>
          <tr>
            <th>User Name:</th>
            <td><input type="text" name="dbuser" size="30" value="<?php echo isset($_POST['dbuser']) ? sanitize($_POST['dbuser']) : ''; ?>" id="t2" /></td>
            <td><div class="err" id="err2">Please input correct MySQL username.</div></td>
          </tr>
          <tr>
            <th>Password:</th>
            <td><input type="password" name="dbpwd" size="30" value="" /></td>
            <td>&nbsp;your MySQL password</td>
          </tr>
          <tr>
            <th>Database Name:</th>
            <td><input type="text" name="dbname" size="30" value="<?php echo isset($_POST['dbname']) ? sanitize($_POST['dbname']) : ''; ?>" id="t3"/></td>
            <td><div class="err" id="err3">The name of the database</div></td>
          </tr>
          <tr>
            <th>Table Prefix:</th>
            <td><input type="text" name="prefix" size="30" value="<?php echo isset($_POST['prefix']) ? sanitize($_POST['prefix']) : ''; ?>" id="t3"/></td>
            <td><div class="err" id="err3">If you want to run multiple Script installations in a single database, change this.</div></td>
          </tr>
        </table>
        <input type="hidden" name="db_action" id="db_action" value="1" /></td>
    </tr>
  </table>
  <div class="btn lgn">
    <button type="submit" name="next" class="button button-large">Submit</button>
  </div>
</form>