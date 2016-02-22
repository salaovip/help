<div class="modal fade modal-general-settings" tabindex="-1" role="dialog" data-show="true" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel"><?php echo $lang['modal-step3']['title']; ?></h4>
        </div>
        <div class="modal-body">
            <form action="step-install.php?step=4" method="post" class="modal-step3">
                <div class="form-horizontal">
                <!-- You can change from here -->
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step3']['sitename']; ?></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="site_name" placeholder="<?php echo $lang['modal-step3']['sitename']; ?>" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step3']['siteurl']; ?></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="site_url" placeholder="<?php echo $lang['modal-step3']['siteurl']; ?>" value="http://<?php echo $temp['URL']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step3']['siteemail']; ?></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="site_email" placeholder="<?php echo $lang['modal-step3']['siteemail']; ?>" value="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Site Theme</label>
                        <div class="col-sm-7">
                          <select name="sitethemes" id="sitethemes" class="form-control">
                            <option value="helpdesk-default">Default</option>
                            <option value="helpdesk-blue">Blue</option>
                            <option value="helpdesk-green">Green</option>
                            <option value="helpdesk-red">Red</option>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Site languages</label>
                        <div class="col-sm-7">
                          <select name="sitetlang" id="sitetlang" class="form-control">
                            <option value="en">English</option>
                            <option value="ar">العربية</option>
                          </select>
                        </div>
                    </div>
                    
                    
                    
                <!-- END change from here -->
              </div>
              <div class="buttonact">
                <input type="submit" value="<?php echo $lang['modal-step3']['submit']; ?>" class="btn btn-primary">
              </div>
          </form>
        </div>
  </div>
  </div>
</div>