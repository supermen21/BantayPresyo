<?php require_once('config/database_connection.php'); ?>
<?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>


<?php
 $DATE   = $_REQUEST['DATE'];
 $get_newprices = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` ='$DATE' GROUP BY MARKET_CODE");
 

 if(isset($_POST['actionApprove'])){
           $sid		= $_POST['SID'];
           $verifier_id = $_POST['USER_ID'];
           $dbConn->query("UPDATE tbl_nw_prices SET PRICES_STATUS='Approved', VERIFIED_BY='$verified_by', PREVAILING='', HIGH='', LOW ='' WHERE SID='$sid'");
         echo "<script>window.location = 'tbl_nw_prices.php?SID=$sid';</script>";
 
         //GENERATE HIGH LOW PREVAILING CODE
     }



// $query_val= 'SELECT DISTINCT "MARKET_NAME", "'.$commodity . '_1","'.$commodity . '_2","'.$commodity . '_3","'.$commodity . '_4","'.$commodity . '_5", "TODAY"  FROM "odk_prod"."COMMODITY_RETAIL_PRICES_CORE" WHERE "MARKET_NAME" = ' . "'" . $get_market . "'" . ' ORDER BY "TODAY" DESC LIMIT 1'; 
        
// // ECHO $query_val;
// $result_val = pg_query($query_val) or die('Query failed: ' . pg_last_error());
// $row_val=pg_fetch_assoc($result_val);   

// $concat_comm =array();

// $uri = $row_val['_URI'];                                           
// $concat_comm[] = $row_val[$commodity . "_1"]; //prices push to array
// $concat_comm[] = $row_val[$commodity . "_2"]; //prices push to array 
// $concat_comm[] = $row_val[$commodity . "_3"]; //prices push to array
// $concat_comm[] = $row_val[$commodity . "_4"]; //prices push to array
// $concat_comm[] = $row_val[$commodity . "_5"]; //Prices push to array

// $values = array_count_values($concat_comm);
// arsort($values);


// $popular = array_slice(array_keys($values), 0, 5, true);
 ?>
 
<script>
$(document).ready(function() {
$('#example').DataTable({ordering:false});
} );
</script>



<div class="container-fluid px-3 py-0">
	<div class="col-lg-12 bg-white border p-3">
        <div class="form-row">
            <div class="col-lg-12">
                    <!-- Data Table -->
                <div class="form-row mt-2">
                    <div class="col-lg-12">
                    <!-- Data Table -->
                        <table id="example" class="table table-striped table-bordered table-responsive dataTable no-footer text-xs">
                            <thead class="bg-accent text-sm">
                                <tr style="background-color: #49657b;">
                                        <th style="color: white !important;"><center><b>MARKET</b></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row_prices = mysqli_fetch_assoc($get_newprices)){?>
                                <tr>
                                    <td class="d-sm-table-cell" style="width: 30%" >
                                    <?php 
                                    $mrktcde = $row_prices['MARKET_CODE'];
                                    $getmcode = $dbConn->query("SELECT * FROM ref_markets WHERE MARKET_CODE = '$mrktcde'");
                                    $resultmcode = mysqli_fetch_assoc($getmcode);
                                    ?>
                                     <a href="tbl_nw_prices.php?DATE=<?php echo $row_prices['DATE']?>&& SID=<?php echo $row_prices['SID']; ?>">
                                      <?php echo $resultmcode['MARKET'];?>
                                     </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot class="bg-accent text-sm">
                                <tr style="background-color: #49657b;">
                                        <th style="color: white !important;"><center><b>MARKET</b></center></th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>      
                </div>
            </div>
        </div>        
    </div>
</div>    
    <?php include('footer.html');?>
</body>