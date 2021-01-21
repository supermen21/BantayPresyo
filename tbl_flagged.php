<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
   $encoder = $rowUserInfo['USERID'];  
  $assignedmrkt =$rowUserInfo['ASSIGNED_MARKET'];

if($rowUserInfo['ACCESSLEVEL']=='ENCODER'){
   $getDate = $dbConn->query("SELECT DISTINCT(`DATE`) FROM tbl_nw_prices WHERE STATUS='Flagged' AND ENCODER = '$encoder' AND ASSIGNED_MARKET = '$assignedmrkt'");
 } elseif($rowUserInfo['ACCESSLEVEL']=='ADMINISTRATOR'){
   $getDate = $dbConn->query("SELECT DISTINCT(`DATE`) FROM tbl_nw_prices WHERE STATUS='Flagged'");
 }
?>

    
<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Flagged Prices per Date</h3>
      <hr 999/>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
    <table id="" class="table-bordered display text-xs" style="width:100%;">
      <thead class="text-sm" style="color:white;background-color: #af2d2d;">
        <tr>
            <th>DATE</th>
        </tr>
      </thead>
      <tbody>
        <?php while($rowDate = mysqli_fetch_array($getDate)){ ?> 
          <tr>
              <th><a href="tbl_flagged_market.php?DATE=<?php echo $rowDate['DATE']; ?>"><?php echo $rowDate['DATE']; ?></a></th>
          </tr>
        <?php } ?> 
      </tbody>
      <tfoot>
        <tr>
           <th>DATE</th>
        </tr>
      </tfoot>
    </table>  
  </div>
</div>
<?php include('footer.html'); ?>
</body>

</html>

