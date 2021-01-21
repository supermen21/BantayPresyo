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
$PID =$_REQUEST['PID'];
   $getCommodities = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND ENCODER = '$encoder' AND STATUS is NULL");

     if(isset($_POST['submitall'])){

      $dbConn->query("UPDATE tbl_nw_prices SET STATUS='For Verification' WHERE PRICES_ID = '$PID'");

      echo '<script language="javascript">alert("Prices verified successfully!")</script>';
      echo "<script>window.location.href='tbl_encodepermarket.php';</script>"; 
   }
    $get = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND STATUS ='For Verification'");
    $row=mysqli_fetch_assoc($get);
?>
    
<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Encoded Prices</h3>
      <hr 999/>
    </div>
      <div class="col-lg-1">
      <form method="POST"><button class="btn btn-sm btn-info" type="submit" name="submitall"><i class="far fa-check-circle"></i> Verify All</button></form>
    </div>
  </div>
   <div style="font-size: 1rem;">
    <div class="form-row mt-3 ">
      <div class="col-lg-2 bg-label ml-2 p-2">
        <label class="ml-4">DATE</label>
      </div>
      <div class="col-lg-3 p-2">
          <input type="text" class="form-control text-xs" value="<?php echo $row['DATE'];?>" readonly/>
      </div>

      <div class="col-lg-2 bg-label p-2">
          MARKET
      </div>

      <div class="col-lg-3 p-2">   
        <input type="text"  class="form-control form-control-sm" name="txtMarket" value="<?php echo $row['ASSIGNED_MARKET'];?>" readonly/>
      </div>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
    <table id="" class="table-bordered table-responsive display text-xs" style="width:100%">
      <thead class="bg-comm text-sm">
        <tr>
            <!-- <th>DATE</th>
            <th>MARKET</th> -->
            <th>COMMODITY</th>
            <th>CATEGORY</th>
            <th>SPECIFICATION</th>
            <th>RESPONDENT 1</th>
            <th>RESPONDENT 2</th>
            <th>RESPONDENT 3</th>
            <th>RESPONDENT 4</th>
            <th>RESPONDENT 5</th>
            <!-- <th>VERIFIER REMARKS</th> -->
            <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php while($rowCommodities = mysqli_fetch_array($getCommodities)){ ?> 
          <tr>
           <!--  <td><?php //echo $rowCommodities['DATE']; ?></td>
            <td><?php 
               // $marketcode = $rowCommodities['MARKET_CODE'];
               // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
            //   $getMarketName = $dbConn->query("SELECT * FROM tbl_nw_prices");
              // while($rowMarketName = mysqli_fetch_array($getMarketName)){ 
               // echo $rowCommodities['ASSIGNED_MARKET']; 
               //} ?></td> -->
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
            <td><?php 
             $speccode = $rowCommodities['COMMODITY_CODE'];
             $getSpec = $dbConn->query("SELECT * FROM ref_commodities WHERE COMMODITY_CODE = '$commcode'");
             while($rowSpec = mysqli_fetch_array($getSpec)){ echo $rowSpec['SPECIFICATION']; 
             } ?></td>
            <td><?php echo $rowCommodities['RESP_1']; ?></td>
            <td><?php echo $rowCommodities['RESP_2']; ?></td>
            <td><?php echo $rowCommodities['RESP_3']; ?></td>
            <td><?php echo $rowCommodities['RESP_4']; ?></td>
            <td><?php echo $rowCommodities['RESP_5']; ?></td>
            <!-- <td><?php //echo $rowCommodities['VERIFIER_REMARKS']; ?></td> -->
            <input type="hidden" name="sid" value="<?php echo $sid = $rowCommodities['SID']; ?>">
            <td><a data-toggle="modal" data-target="#updateprices<?=$sid;?>" href="#" class="btn btn-outline-primary form-control" >Update</a>
            <?php include('modal_check_prices.php');?>
            </td>
          </tr>


        <?php } ?> 
      </tbody>
      <tfoot>
          <tr>
        <!--     <th>DATE</th>
            <th>MARKET</th> -->
            <th>COMMODITY</th>
            <th>CATEGORY</th>
            <th>SPECIFICATION</th>
            <th>RESPONDENT 1</th>
            <th>RESPONDENT 2</th>
            <th>RESPONDENT 3</th>
            <th>RESPONDENT 4</th>
            <th>RESPONDENT 5</th>
            <!-- <th>VERIFIER REMARKS</th> -->
            <th>ACTION</th>
          </tr>
      </tfoot>
    </table>  
  </div>
</div>


<?php include('footer.html'); ?>
</body>

</html>

