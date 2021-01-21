<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$mdate = $_REQUEST['DATE'];
$mcode = $_REQUEST['ASSIGNED_MARKET'];
$encoder = $rowUserInfo['USERID'];
   $getCommodities = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND ENCODER = '$encoder' AND STATUS='Flagged'");
?>

          <div class="container-fluid mb-3 mt-3">
          <table id="example" class="table table-striped table-bordered table-responsive dataTable no-footer text-xs" style="width:100%">
                  <thead class="bg-accent text-sm">
                      <tr>
                          <th>DATE</th>
                          <th>MARKET</th>
                          <th>COMMODITY</th>
                          <th>CATEGORY</th>
                          <th>RESPONDENT 1</th>
                          <th>RESPONDENT 2</th>
                          <th>RESPONDENT 3</th>
                          <th>RESPONDENT 4</th>
                          <th>RESPONDENT 5</th>
                          <th>VERIFIER REMARKS</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($rowCommodities = mysqli_fetch_array($getCommodities)){ ?> 
                      <tr>
                          <th><?php echo $rowCommodities['DATE']; ?></th>
                          <th><?php 
                             // $marketcode = $rowCommodities['MARKET_CODE'];
                             // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
                             $getMarketName = $dbConn->query("SELECT * FROM tbl_nw_prices");
                             while($rowMarketName = mysqli_fetch_array($getMarketName)){ echo $rowMarketName['ASSIGNED_MARKET']; 
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
                          <th><?php echo $rowCommodities['RESP_1']; ?></th>
                          <th><?php echo $rowCommodities['RESP_2']; ?></th>
                          <th><?php echo $rowCommodities['RESP_3']; ?></th>
                          <th><?php echo $rowCommodities['RESP_4']; ?></th>
                          <th><?php echo $rowCommodities['RESP_5']; ?></th>
                          <th><?php echo $rowCommodities['VERIFIER_REMARKS']; ?></th>
                          <input type="hidden" name="sid" value="<?php echo $sid = $rowCommodities['SID']; ?>">
                          <th><a data-toggle="modal" data-id="<?php echo $sid; ?>" class="open-AddBookDialog" title="Update this commodity?" href="#update"><button type="button" class="btn btn-outline-primary form-control form-control-sm  btn-sm">Update</button></a>
                          </th>
                      </tr>
                    <?php } ?> 
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>DATE</th>
                          <th>MARKET</th>
                          <th>COMMODITY</th>
                          <th>CATEGORY</th>
                          <th>RESPONDENT 1</th>
                          <th>RESPONDENT 2</th>
                          <th>RESPONDENT 3</th>
                          <th>RESPONDENT 4</th>
                          <th>RESPONDENT 5</th>
                          <th>VERIFIER REMARKS</th>
                          <th>ACTION</th>
                      </tr>
                  </tfoot>
           </table>  
          </div>

<!-- MODAL APPROVED -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <button type="submit" id="actionSave" name="actionSave" class="btn btn-success"><span class="fas fa-save mr-2"  ></span>Update</button>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal"><span class="fas fa-close mr-2"></span>Close</button>
                      </form>
          </div>
        </div> <!-- end of modal-footer       -->
    </div>     <!-- end of modal-content      -->
  </div>       <!-- end of modal-dialog       -->
</div>         <!-- end of modal-suspended    -->
<!-- MODAL APPROVED -->


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

