<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$encoder = $rowUserInfo['USERID'];
$mdate = $_REQUEST['DATE'];
   $getMarket = $dbConn->query("SELECT `DATE`, ASSIGNED_MARKET FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND STATUS='Approved' GROUP BY ASSIGNED_MARKET");
?>

<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Approved Prices per Market</h3>
      <hr 999/>
    </div>
  </div>
  <div class="container-fluid mb-3 mt-3">
    <table id="" class="display table-striped table-bordered no-footer dataTable text-xs">
      <thead class="text-sm" style="background-color: #4f98ca;color:white;">
          <tr>
            <th>DATE</th>
            <th>MARKET</th>
          </tr>
      </thead>
      <tbody>
        <?php while($rowMarket = mysqli_fetch_array($getMarket)){ ?> 
          <tr>
              <td><?php echo $rowMarket['DATE']; ?></td>
              <td><a href="tbl_approved.php?DATE=<?php echo $rowMarket['DATE']; ?>&AM=<?php echo $rowMarket['ASSIGNED_MARKET']; ?>"><?php echo $rowMarket['ASSIGNED_MARKET']; ?></a></td>
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

