<div class="modal fade" id="updateprices<?=$sid;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <!-- MODAL HEADER - START -->
      <div class="modal-header"><h4 class="modal-title info-name">Commodity Details:</h4></div>           
      <!-- MODAL HEADER - END -->
      <!-- MODAL BODY - START -->

      <?php 
          $getUpdateDetails = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE SID = '$sid'");
          $rowUpdDetails = mysqli_fetch_array($getUpdateDetails);

          // $marketcode = $rowUpdDetails['MARKET_CODE'];
          // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
          // $rowMarketName = mysqli_fetch_array($getMarketName);

          $commcode = $rowUpdDetails['COMMODITY_CODE'];
          $getCommName = $dbConn->query("SELECT COMMODITY_CODE, COMMODITY FROM ref_commodities WHERE COMMODITY_CODE = '$commcode'");
          $rowCommName = mysqli_fetch_array($getCommName);
      ?>
        <div class="modal-body modal-bg">
            <div class="row justify-content-center">        
                <div class="col-sm-12 form-group">

                    <label class="text-lg-left font-weight-bold">Market Name: <?php echo strtoupper($rowUpdDetails['ASSIGNED_MARKET']); ?></label>
                    </br>
                    <label class="text-md-left font-weight-bold">Commodity Name: <?php echo strtoupper($rowCommName['COMMODITY']); ?></label>
                    </br>
                    <label class="text-md-left font-weight-bold">Date: <?php echo $rowUpdDetails['DATE']; ?></label>
                    </br>
                    <label class="font-weight-bold">Remarks:</label>&nbsp;<label class="font-weight-bold text-warning"><?php echo $rowUpdDetails['VERIFIER_REMARKS']; ?></label>
                    </br>
                    </br>
                    </br>
                      <form method="post" action="func_action.php">
                        <label class="text-lg-left font-weight-bold">RESPONDENT 1:</label><input class="form-control-sm" type="number" id="resp1" name="resp1" value="<?php echo $rowUpdDetails['RESP_1']; ?>">
                        </br>
                        <label class="text-lg-left font-weight-bold">RESPONDENT 2:</label><input class="form-control-sm" type="number" id="resp2" name="resp2" value="<?php echo $rowUpdDetails['RESP_2']; ?>">
                        </br>
                        <label class="text-lg-left font-weight-bold">RESPONDENT 3:</label><input class="form-control-sm" type="number" id="resp3" name="resp3" value="<?php echo $rowUpdDetails['RESP_3']; ?>">
                        </br>
                        <label class="text-lg-left font-weight-bold">RESPONDENT 4:</label><input class="form-control-sm" type="number" id="resp4" name="resp4" value="<?php echo $rowUpdDetails['RESP_4']; ?>">
                        </br>
                        <label class="text-lg-left font-weight-bold">RESPONDENT 5:</label><input class="form-control-sm" type="number" id="resp5" name="resp5" value="<?php echo $rowUpdDetails['RESP_5']; ?>">
                        <input type="hidden" id="sid" name="sid" value="<?php echo $sid;?>" readonly>
                        <input type="hidden" id="verifier" name="verifier" value="<?php echo $rowUserInfo['USERID'];?>" readonly>
                        <input type="hidden" id="DATE" name="DATE" value="<?php echo $mdate;?>" readonly>
                        <input type="hidden" id="AM" name="AM" value="<?php echo $mcode;?>" readonly>
                        <input type="hidden" id="PID" name="PID" value="<?php echo $PID;?>" readonly>

                </div>
            </div>
        </div> 
        <!-- MODAL BODY - END -->
        <!-- MODAL FOOTER - START -->
        <div class="modal-footer">
          <div class="form-group">
                        <button type="submit" id="updatePrice" name="updatePrice" class="btn btn-success"><span class="fas fa-save mr-2"  ></span>Update</button>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-close mr-2"></span>Close</button>
                      </form>
          </div>
        </div> <!-- end of modal-footer       -->
    </div>     <!-- end of modal-content      -->
  </div>       <!-- end of modal-dialog       -->
</div>         <!-- end of modal-suspended    -->