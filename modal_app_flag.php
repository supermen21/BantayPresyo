
<!-- MODAL APPROVED -->
<div class="modal fade" id="approved<?=$sid;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <!-- MODAL HEADER - START -->
      <div class="modal-header"><h4 class="modal-title info-name">Approve this commodity?</h4></div>           
      <!-- MODAL HEADER - END -->
      <!-- MODAL BODY - START -->
        <div class="modal-body modal-bg">
            <div class="row justify-content-center">        
                <div class="col-sm-12 form-group">
                      <form method="post">
                        <input type="hidden" id="sid" name="sid" value="<?php echo $sid;?>">
                        <input type="hidden" id="verifier" name="verifier" value="<?php echo $rowUserInfo['USERID'];?>">
                        <input type="hidden" id="DATE" name="DATE" value="<?php echo $mdate;?>">
                        <input type="hidden" id="CODEE" name="CODEE" value="<?php echo $mcode;?>">
                </div>
            </div>
        </div> 
        <!-- MODAL BODY - END -->
        <!-- MODAL FOOTER - START -->
        <div class="modal-footer">
          <div class="form-group">
                        <button type="submit" id="actionApprove" name="actionApprove" class="btn btn-success"><span class="fas fa-save mr-2"  ></span>Approve</button>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-close mr-2"></span>Close</button>
                      </form>
          </div>
        </div> <!-- end of modal-footer       -->
    </div>     <!-- end of modal-content      -->
  </div>       <!-- end of modal-dialog       -->
</div>         <!-- end of modal-suspended    -->
<!-- MODAL APPROVED -->

<!-- MODAL FLAGGED -->
<div class="modal fade" id="flagged<?=$sid;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <!-- MODAL HEADER - START -->
      <div class="modal-header"><h4 class="modal-title info-name">Flag this commodity?</h4></div>           
      <!-- MODAL HEADER - END -->
      <!-- MODAL BODY - START -->
        <div class="modal-body modal-bg">
            <div class="row justify-content-center">        
                <div class="col-sm-12 form-group">
                    <label class="font-weight-bold">Add Remarks:</label>
                    <form method="post">
                        <input type="text" id="remarks" name="remarks" class="form-control" required>
                        <input type="hidden" id="sid" name="sid" value="<?php echo $sid;?>">
                        <input type="hidden" id="verifier" name="verifier" value="<?php echo $rowUserInfo['USERID'];?>">
                        <input type="hidden" id="DATE" name="DATE" value="<?php echo $mdate;?>">
                        <input type="hidden" id="CODEE" name="CODEE" value="<?php echo $mcode;?>">
                </div>
            </div>
        </div> 
        <!-- MODAL BODY - END -->
        <!-- MODAL FOOTER - START -->
        <div class="modal-footer">
          <div class="form-group">
                      <button type="submit" id="actionFlag" name="actionFlag" class="btn btn-danger"><span class="fas fa-save mr-2"  ></span>Flag</button>
                      <button type="submit" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-close mr-2"></span>Close</button>
                    </form>
          </div>
        </div> <!-- end of modal-footer       -->
    </div>     <!-- end of modal-content      -->
  </div>       <!-- end of modal-dialog       -->
</div>         <!-- end of modal-suspended    -->
<!-- MODAL FLAGGED -->