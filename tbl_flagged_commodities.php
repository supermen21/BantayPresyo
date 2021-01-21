<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$mdate = $_REQUEST['DATE'];
$mcode = $_REQUEST['AM'];
$encoder = $rowUserInfo['USERID'];
   $getCommodities = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND ENCODER = '$encoder' AND STATUS='Flagged'");
?>
    
<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Flagged Prices per Commodities</h3>
      <hr 999/>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
    <table id="" class="table table-striped table-bordered table-responsive dataTable no-footer text-xs" style="width:100%">
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
            <td><?php echo $rowCommodities['DATE']; ?></td>
            <td><?php 
               // $marketcode = $rowCommodities['MARKET_CODE'];
               // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
            //   $getMarketName = $dbConn->query("SELECT * FROM tbl_nw_prices");
              // while($rowMarketName = mysqli_fetch_array($getMarketName)){ 
                echo $rowCommodities['ASSIGNED_MARKET']; 
               //} ?></td>
            <td><?php 
               $commcode = $rowCommodities['COMMODITY_CODE'];
               $getCommName = $dbConn->query("SELECT COMMODITY_CODE, COMMODITY FROM ref_commodities WHERE COMMODITY_CODE = '$commcode'");
               while($rowCommName = mysqli_fetch_array($getCommName)){ echo $rowCommName['COMMODITY']; 
               } ?></td>
            <td><?php 
               $catcode = $rowCommodities['CATEGORY_CODE'];
               $getCatName = $dbConn->query("SELECT CATEGORY_CODE, CATEGORY FROM ref_category WHERE CATEGORY_CODE = '$catcode'");
               while($rowCatName = mysqli_fetch_array($getCatName)){ echo $rowCatName['CATEGORY']; 
               } ?></td>
            <td><?php echo $rowCommodities['RESP_1']; ?></td>
            <td><?php echo $rowCommodities['RESP_2']; ?></td>
            <td><?php echo $rowCommodities['RESP_3']; ?></td>
            <td><?php echo $rowCommodities['RESP_4']; ?></td>
            <td><?php echo $rowCommodities['RESP_5']; ?></td>
            <td><?php echo $rowCommodities['VERIFIER_REMARKS']; ?></td>
            <input type="hidden" name="sid" value="<?php echo $sid = $rowCommodities['SID']; ?>">
            <td><a data-toggle="modal" data-target="#updateprices<?=$sid;?>" href="#" class="btn btn-outline-primary form-control" >Update</a>
            <?php include('modal_flag_prices.php');?>
            </td>
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
</div>

<!-- MODAL APPROVED -->
<!-- MODAL APPROVED -->


<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var Id = $(this).data('id');
     $(".modal-body #sid").val( Id );
});
</script>

<?php include('footer.html'); ?>
</body>

</html>

