<div class="modal fade modal-administrator" tabindex="-1" role="dialog" data-show="true" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel"><?php echo $lang['modal-step4']['title']; ?></h4>
        </div>
        <div class="modal-body">
            <form action="step-install.php?step=5" method="post" class="modal-step4">
                <div class="form-horizontal">
                <!-- You can change from here -->
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step4']['adminname']; ?></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="admin_name" placeholder="<?php echo $lang['modal-step4']['adminname']; ?>" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step4']['adminpassowrd']; ?></label>
                        <div class="col-sm-7">
                          <input type="Password" class="form-control" name="admin_password" placeholder="<?php echo $lang['modal-step4']['adminpassowrd']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><?php echo $lang['modal-step4']['adminemail']; ?></label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="admin_email" placeholder="<?php echo $lang['modal-step4']['adminemail']; ?>" value="">
                        </div>
                    </div>
                <!-- END change from here -->
              </div>
              <div class="buttonact">
                <input type="submit" value="<?php echo $lang['modal-step4']['submit']; ?>" class="btn btn-primary">
              </div>  
            </form>
        </div>
  </div>
  </div>
</div>