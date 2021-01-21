<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$encoder = $rowUserInfo['USERID'];
$mdate = $_REQUEST['DATE'];
   $getMarket = $dbConn->query("SELECT `DATE`, ASSIGNED_MARKET FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND STATUS='Flagged' AND ENCODER = '$encoder' GROUP BY ASSIGNED_MARKET");
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
    <table id="" class="display" style="width:100%">
      <thead class="bg-market text-sm">
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
              <td><a href="tbl_flagged_commodities.php?DATE=<?php echo $rowMarket['DATE']; ?>&AM=<?php echo $rowMarket['ASSIGNED_MARKET']; ?>"><?php echo $rowMarket['ASSIGNED_MARKET']; ?></a></td>
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

