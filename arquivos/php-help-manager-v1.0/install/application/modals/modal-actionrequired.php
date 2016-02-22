<div class="modal fade modal-actionrequired" tabindex="-1" role="dialog" data-show="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel"><?php echo $lang['actionrequired']['title'];?></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="infobox">
                    <?php echo sprintf($lang['actionrequired']['msg'],IN_SCRIPT_NAME); ?>
                    </div>
                 </div>
              <div class="buttonact">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="send_yes_actionrequired" aria-label="Close"><span aria-hidden="true"><?php echo $lang['actionrequired']['yes'];?></span></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="send_no_actionrequired" aria-label="Close"><span aria-hidden="true"><?php echo $lang['actionrequired']['no'];?></span></button>
              </div>  
            </div>
        </div>
    </div>
</div>