<h1>Success!</h1>
<p>Php Help Manager v2.0 has been installed.</p>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td><h3>Installation log:</h3></td>
  </tr>
  <tr>
    <td class="item-desc">
    A copy of the configuration file will be downloaded to your computer when you click the button 'Download mega.config.php'. 
    You should upload this file to the same directory where you have Php Help Manager v2.0. 
    Once this is done you should log in using the admin credentials you provided on the previous form and configure the software according to your needs.
      <p style="font-weight: bold;">Thank you for choosing Php Help Manager v2.0.</p></td>
  </tr>
  <tr>
    <td><table width="100%" class="inner-content">
        <tr>
          <td class="elem">Configuration File</td>
          <td align="left"><span class="yes">Available for download</span><br />
            If there was a problem creating config file, you MUST save mega.config.php file to your local PC and then upload to Php Help Manager v2.0 <strong>mega-system</strong> directory. <a href="javascript:void(0);" onclick="if (document.getElementById('file_content').style.display=='block') { document.getElementById('file_content').style.display='none';} else {document.getElementById('file_content').style.display='block'}">Click here</a> to view the content of mega.config.php file.<br />
            <div style="margin: 10px 0; text-align: center;">
              <input type="button" class="button button-large" onclick="document.location.href='safe_config.php?h=<?php echo $_POST['dbhost'].'&u='.$_POST['dbuser'].'&p='.$_POST['dbpwd'].'&n='.$_POST['dbname'].'&pr='.$_POST['prefix'];?>';" value="Download mega.config.php" />
            </div></td>
        </tr>
        <tr>
          <td colspan="2"><div style="display:none;border: 1px solid #777; width: 96%; height: 400px; background-color: #ededed; padding:2%;overflow:auto;" id="file_content">
              <?php if (is_callable("highlight_string")):?>
              <?php highlight_string(safeConfig($_POST['dbhost'] , $_POST['dbuser'], $_POST['dbpwd'], $_POST['dbname'], $_POST['prefix']));?>
              <?php endif;?>
          </div></td>
        </tr>
        <tr>
          <td colspan="2"><div class="remove_install">Now you MUST completely remove 'setup' directory from your server.</div>
            <br />
          <div class="remove_install">Please for security reasons chmod your /mega-system/ directory to 0755.</div></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="btn lgn">
  <button type="button" class="button button-large" onclick="document.location.href='../admin/';" name="next" tabindex="3">Admin</button>
</div>