<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
   $getDate = $dbConn->query("SELECT DISTINCT(`DATE`) FROM tbl_nw_prices WHERE STATUS ='For Verification'");
?>

          <div class="container-fluid mb-3 mt-3">
            <div class="form-row mb-2">
                <div class="col-lg-11">
                    <!-- Page Heading -->
                    <h1 class="h5 mb-2 text-gray-800">List of Dates for Verification</h1>
                </div>
            </div>
            <hr 999/>
          <table id="" class="display table-striped table-bordered text-xs">
                  <thead class="bg-accent text-sm">
                      <tr>
                          <th>DATE</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($rowDate = mysqli_fetch_array($getDate)){ ?> 
                      <tr>
                          <th><a href="frm_market.php?DATE=<?php echo $rowDate['DATE']; ?>"><?php echo $rowDate['DATE']; ?></th>
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
<?php include('footer.html'); ?>
</body>

</html>

