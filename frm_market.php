<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$mdate = $_REQUEST['DATE'];
if($rowUserInfo['ACCESSLEVEL']=='VERIFIER'){
  $getMarket = $dbConn->query("SELECT `DATE`, ASSIGNED_MARKET, PRICES_ID FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND STATUS ='For Verification' GROUP BY ASSIGNED_MARKET"); 
}
?>

<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Markets per Date</h3>
      <hr 999/>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
    <table id="" class="display table-striped table-bordered no-footer dataTable text-xs" style="width:100%">
      <thead style="background-color: #006a71;color:white;">
          <tr>
              <th>DATE</th>
              <th>MARKET</th>
          </tr>
      </thead>
      <tbody>
        <?php while($rowMarket = mysqli_fetch_array($getMarket)){ 

                 // $marketcode = $rowMarket['MARKET_CODE'];
                 // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
                 // while($rowMarketName = mysqli_fetch_array($getMarketName)){
        ?> 
          <tr>
              <td><?php echo $rowMarket['DATE']; ?></td>
              <td><a href="frm_commodities.php?DATE=<?php echo $rowMarket['DATE']; ?>&AM=<?php echo $rowMarket['ASSIGNED_MARKET']; ?>&PID=<?php echo $rowMarket['PRICES_ID'];?>"><?php echo $rowMarket['ASSIGNED_MARKET']; ?></a></td>
              <?php //} ?> 
          </tr>
        <?php } ?> 
      </tbody>
      <tfoot>
          <tr>
              <th>DATE</th>
              <th>MARKET</th>
          </tr>
      </tfoot>
    </table>  
  </div>
</div>
<?php include('footer.html'); ?>
</body>

</html>

