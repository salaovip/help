<div class="modal fade modal-resetdatabase" tabindex="-1" role="dialog" data-show="true" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel"><?php echo $lang['resetdatabase']['title'];?></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="infobox">
                    <?php echo $lang['resetdatabase']['msg1'];?>
                    <br />
                    <br />
                    <?php echo $lang['resetdatabase']['msg2'];?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                          <input type="checkbox" value="" name="" onchange="checkAll(this)" checked="checked" /> <?php echo $lang['resetdatabase']['selectall'];?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                        echo get_tables_name();
                        ?>
                    </div>
                 </div>
              <div class="buttonact">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="send_delete_resetdatabase" aria-label="Close"><span aria-hidden="true"><?php echo $lang['resetdatabase']['deleteselect'];?></span></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="send_cancel_resetdatabase" aria-label="Close"><span aria-hidden="true"><?php echo $lang['resetdatabase']['cancel'];?></span></button>
              </div>  
            </div>
      </div>
      </div>
    </div>