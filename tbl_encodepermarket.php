<?php include('head.html'); ?>  
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$encoder = $rowUserInfo['USERID'];
// $mdate = $_REQUEST['DATE'];

   $getMarket = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE STATUS is NULL AND ENCODER = '$encoder' GROUP BY `DATE`");
 
?>

<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
        <!-- Page Heading -->
        <h3 class="text-gray-800">List of Encoded Prices</h3>
        <hr 999/>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
   <table id="" class="display" style="width:100%">
      <thead class="bg-comm text-sm" style="color:white;">
          <tr>
              <th>DATE</th>
              <th>MARKET</th>
              <th>ACTIONS</th>
          </tr>
      </thead>
      <tbody>
        <?php 
        
        while($rowMarket = mysqli_fetch_array($getMarket)){ 
          
                 // $marketcode = $rowMarket['MARKET_CODE'];
                 // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
                 // while($rowMarketName = mysqli_fetch_array($getMarketName)){
        ?> 
          <tr>
              <td><?php echo $rowMarket['DATE']; ?></td>
              <td><?php echo $rowMarket['ASSIGNED_MARKET']; ?></td>
              <td><a class="btn btn-outline-info float-right form-control-sm" href="tbl_encode_prices.php?DATE=<?php echo $rowMarket['DATE']; ?>&AM=<?php echo $rowMarket['ASSIGNED_MARKET']; ?>&PID=<?php echo $rowMarket['PRICES_ID'];?>"><i class="fas fa-eye fa-xs fa-white"></i> View</a></td>
           
              <!-- 
              <td><form method="POST"><button class="btn btn-sm btn-primary" type="submit" name="submitall">APPROVED ALL</button></form></td> -->
              
          </tr>
        <?php } ?> 
      </tbody>
      <tfoot>
          <tr>
              <th>DATE</th>
              <th>MARKET</th>
              <th>ACTIONS</th>
          </tr>
      </tfoot>
    </table>  
  </div>
</div>
<?php include('footer.html'); ?>
</body>

</html>

