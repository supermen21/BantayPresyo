<?php require_once('config/database_connection.php'); ?>            
<?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>


<?php $get_newprices = $dbConn->query("SELECT * FROM tbl_bp_prices ORDER BY `DATE` DESC");?>
  

<div class="col-lg-12 bg-white border p-3">
    <div class="form-row">
        <div class="col-lg-11">
          <!-- Page Heading -->
          <h3 class="text-gray-800">List of High, Low and Prevailing Prices</h3>
          <hr 999/>
        </div>
   </div>
   <div class="container-fluid mb-3 mt-3">
        <table id="" class="display table table-striped table-bordered dataTable no-footer text-xs">
            <thead class="bg-accent text-sm">
                <tr style="background-color: #49657b;">
                    <th style="color: white !important;"><center><b>DATE</b></center></th>
                    <th style="color: white !important;"><center><b>MARKET</b></center></th>
                    <th style="color: white !important;"><center><b>COMMODITY</b></center></th>
                    <th style="color: white !important;"><center><b>CATERGORY</b></center></th>
                    <th style="color: white !important;"><center><b>SPECIFICATIONS</b></center></th>
                    <th style="color: white !important;"><center><b>HIGH</b></center></th>
                    <th style="color: white !important;"><center><b>LOW</b></center></th>
                    <th style="color: white !important;"><center><b>PREVAILING</b></center></th>
                </tr>
            </thead>
            <tbody>
            <?php while($row_prices = mysqli_fetch_assoc($get_newprices)){?>
                <tr>

                   
                    <td class="d-sm-table-cell" style="width: 10%" >
                    <?php echo $row_prices['DATE'];?>
                    </td>
                    <td class="d-sm-table-cell" style="width: 30%" >
                    <?php 
                    $mrktcde = $row_prices['MARKET_CODE'];
                    $getmcode = $dbConn->query("SELECT * FROM ref_markets WHERE MARKET_CODE = '$mrktcde' ");
                    $resultmcode = mysqli_fetch_assoc($getmcode);
                    ?>
                    <?php echo $resultmcode['MARKET'];?>
                    </td>
                    <td class="d-sm-table-cell" style="width: 30%" >
                    <?php 
                    $ccode = $row_prices['COMMODITY_CODE'];
                    $getccde = $dbConn->query("SELECT * FROM ref_commodities WHERE COMMODITY_CODE = '$ccode' ");
                    $resultccode = mysqli_fetch_assoc($getccde);
                    ?>
                    <?php echo $resultccode['COMMODITY'];?>
                    </td>
                    <td class="d-sm-table-cell" style="width: 30%" >
                    <?php 
                    $catcode = $row_prices['CATEGORY_CODE'];
                    $getcat = $dbConn->query("SELECT * FROM ref_category WHERE CATEGORY_CODE = '$catcode' ");
                    $resultcat = mysqli_fetch_assoc($getcat);
                    ?>
                    <?php echo $resultcat['CATEGORY'];?>
                    </td>
                    <td><?php echo $resultccode['SPECIFICATION'];?></td>
                    <td class="d-sm-table-cell" style="width: 10%" >
                    <?php echo $row_prices['HIGH'];?>
                    </td>
                    <td class="d-sm-table-cell" style="width: 10%" >
                    <?php echo $row_prices['LOW'];?>
                    </td>
                    <td class="d-sm-table-cell" style="width: 10%" >
                    <?php echo $row_prices['PREVAILING'];?>
                    </td>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
            <tfoot class="bg-accent text-sm">
                <tr style="background-color: #49657b;">
                    <th style="color: white !important;"><center><b>DATE</b></center></th>
                    <th style="color: white !important;"><center><b>MARKET</b></center></th>
                    <th style="color: white !important;"><center><b>COMMODITY</b></center></th>
                    <th style="color: white !important;"><center><b>CATERGORY</b></center></th>
                    <th style="color: white !important;"><center><b>SPECIFICATIONS</b></center></th>
                    <th style="color: white !important;"><center><b>HIGH</b></center></th>
                    <th style="color: white !important;"><center><b>LOW</b></center></th>
                    <th style="color: white !important;"><center><b>PREVAILING</b></center></th>
                </tr>
            </tfoot>
        </table>
   </div>
</div>
    <?php include('footer.html');?>
</body>