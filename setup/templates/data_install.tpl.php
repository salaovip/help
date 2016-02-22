<form id="setup" method="post" action="install.php?step=4" novalidate="novalidate">
<h1>Information needed</h1>
<p>Please provide the following information. Don’t worry, you can always change these settings later.</p>

	<table class="form-table">
		<tbody>
        <tr>
			<th scope="row"><label for="web_title">Site Title</label></th>
			<td><input name="web_title" type="text" id="web_title" size="25" value=""></td>
		</tr>
        <tr>
			<th scope="row"><label for="web_email">Site E-mail</label></th>
			<td><input name="web_email" type="text" id="web_email" size="25" value=""></td>
		</tr>
        <tr>
			<th scope="row"><label for="web_tagline">Site Tagline</label></th>
			<td><input name="web_tagline" type="text" id="web_tagline" size="25" value=""></td>
		</tr>
        <tr>
            <td><br /></td>
        </tr>
		<tr>
			<th scope="row"><label for="firstname">First Name</label></th>
			<td><input name="firstname" type="text" id="firstname" size="25" value=""></td>
		</tr>
        <tr>
			<th scope="row"><label for="lastname">Last Name</label></th>
			<td><input name="lastname" type="text" id="lastname" size="25" value=""></td>
		</tr>
        <tr>
			<th scope="row"><label for="username">Username</label></th>
			<td><input name="username" type="text" id="username" size="25" value=""></td>
		</tr>
		<tr>
			<th scope="row"><label for="pass1">Password</label></th>
			<td><input name="password" type="password" id="password" size="25" value=""></td>
		</tr>
		<tr>
			<th scope="row"><label for="admin_email">Your E-mail</label></th>
			<td><input name="email" type="email" id="email" size="25" value=""></td>
		</tr>
	</tbody>
    </table>
	

<input type="hidden" name="dbhost" value="<?php echo sanitize($_POST['dbhost']); ?>" />
<input type="hidden" name="dbuser" value="<?php echo sanitize($_POST['dbuser']); ?>" />
<input type="hidden" name="dbpwd"  value="<?php echo sanitize($_POST['dbpwd']);  ?>" />
<input type="hidden" name="dbname" value="<?php echo sanitize($_POST['dbname']); ?>" />
<input type="hidden" name="prefix" value="<?php echo sanitize($_POST['prefix']); ?>" />
<input type="hidden" name="db_action" id="db_action" value="1" />
<p class="step"><input type="submit" name="Submit" value="Submit" class="button button-large"></p>
</form>