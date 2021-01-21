<?php require_once('config/database_connection.php'); ?>
<?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>


<?php
    $query = $dbConn->query("SELECT * FROM tbl_nw_prices");
    $row   = mysqli_fetch_assoc($query);

    $get_newprices = $dbConn->query("SELECT * FROM tbl_nw_prices GROUP BY DATE DESC");
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
                                        <th style="color: white !important;"><center><b>DATE</b></center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row_prices = mysqli_fetch_assoc($get_newprices)){?>
                                <tr>

                                    <td class="d-sm-table-cell" style="width: 10%" >
                                    <a href="tbl_mm_markets.php?DATE=<?php echo $row_prices['DATE']; ?>">
                                     <?php echo $row_prices['DATE'];?>
                                    </a>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot class="bg-accent text-sm">
                                <tr style="background-color: #49657b;">
                                        <th style="color: white !important;"><center><b>DATE</b></center></th>
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