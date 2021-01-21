<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$mdate = $_REQUEST['DATE'];
$mcode = $_REQUEST['CODEE'];
   $getCommodities = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND MARKET_CODE = '$mcode' AND STATUS is NULL");
?>

          <div class="container-fluid mb-3 mt-3">
          <table id="example" class="table table-striped table-bordered table-responsive dataTable no-footer text-xs" style="width:100%">
                  <thead class="bg-comm text-sm">
                      <tr>
                          <th>DATE</th>
                          <th>MARKET</th>
                          <th>CATEGORY</th>
                          <th>COMMODITY</th>
                          <th>SPECIFICATION</th>
                          <th>RESPONDENT 1</th>
                          <th>RESPONDENT 2</th>
                          <th>RESPONDENT 3</th>
                          <th>RESPONDENT 4</th>
                          <th>RESPONDENT 5</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($rowCommodities = mysqli_fetch_array($getCommodities)){ ?> 
                      <tr>
                          <th><?php echo $rowCommodities['DATE']; ?></th>
                          <th><?php 
                             $marketcode = $rowCommodities['MARKET_CODE'];
                             $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
                             while($rowMarketName = mysqli_fetch_array($getMarketName)){ echo $rowMarketName['MARKET']; 
                             } ?></th>
                          <th><?php 
                             $commcode = $rowCommodities['COMMODITY_CODE'];
                             $getCommName = $dbConn->query("SELECT COMMODITY_CODE, COMMODITY FROM ref_commodities WHERE COMMODITY_CODE = '$commcode'");
                             while($rowCommName = mysqli_fetch_array($getCommName)){ echo $rowCommName['COMMODITY']; 
                             } ?></th>
                          <th><?php 
                             $catcode = $rowCommodities['CATEGORY_CODE'];
                             $getCatName = $dbConn->query("SELECT CATEGORY_CODE, CATEGORY FROM ref_category WHERE CATEGORY_CODE = '$catcode'");
                             while($rowCatName = mysqli_fetch_array($getCatName)){ echo $rowCatName['CATEGORY']; 
                             } ?></th>
                          <th><?php 
                                    $commspec = $rowCommodities['COMMODITY_CODE'];
                                    $getspec = $dbConn->query("SELECT COMMODITY_CODE, COMMODITY, SPECIFICATION FROM ref_commodities WHERE COMMODITY_CODE = '$commspec'");
                                    while($rowspec = mysqli_fetch_array($getspec)){ echo $rowspec['SPECIFICATION']; 
                                } ?></th>
                          <th><?php echo $rowCommodities['RESP_1']; ?></th>
                          <th><?php echo $rowCommodities['RESP_2']; ?></th>
                          <th><?php echo $rowCommodities['RESP_3']; ?></th>
                          <th><?php echo $rowCommodities['RESP_4']; ?></th>
                          <th><?php echo $rowCommodities['RESP_5']; ?></th>
                          <input type="hidden" name="sid" value="<?php echo $sid = $rowCommodities['SID']; ?>">
                          <th><a data-toggle="modal" data-id="<?php echo $sid; ?>"  class="open-AddBookDialog" title="Approve this commodity?" href="#approved"><button type="button" class="btn btn-outline-success form-control form-control-sm  btn-sm">Approve</button></a>
                          <a data-toggle="modal" data-id="<?php echo $sid; ?>"  class="open-AddBookDialog" title="Flag this commodity?" href="#flagged"><button type="button" class="btn btn-outline-danger form-control form-control-sm  btn-sm">Flag</button></a>
                          </th>
                      </tr>
                    <?php } ?> 
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>DATE</th>
                          <th>MARKET</th>
                          <th>CATEGORY</th>
                          <th>COMMODITY</th>
                          <th>SPECIFICATION</th>
                          <th>RESPONDENT 1</th>
                          <th>RESPONDENT 2</th>
                          <th>RESPONDENT 3</th>
                          <th>RESPONDENT 4</th>
                          <th>RESPONDENT 5</th>
                          <th>ACTION</th>
                      </tr>
                  </tfoot>
           </table>  
          </div>

<!-- MODAL APPROVED -->
<div class="modal fade" id="approved" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" role="document">
    <div class="modal-content">
      <!-- MODAL HEADER - START -->
      <div class="modal-header"><h4 class="modal-title info-name">Approve this commodity?</h4></div>           
      <!-- MODAL HEADER - END -->
      <!-- MODAL BODY - START -->
        <div class="modal-body modal-bg">
            <div class="row justify-content-center">        
                <div class="col-sm-12 form-group">
                      <form method="post" action="func_action.php">
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
<div class="modal fade" id="flagged" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form method="post" action="func_action.php">
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

<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var Id = $(this).data('id');
     $(".modal-body #sid").val( Id );
});
</script>

<script>
  $(document).ready(function() {
    $('#example').DataTable({ordering:false});
  } );
</script>
<?php include('footer.html'); ?>
</body>

</html>

