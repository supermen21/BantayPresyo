<?php require_once('config/database_connection.php'); ?>
<?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>


<?php 

$mdate = $_REQUEST['DATE'];
$mcode = $_REQUEST['AM'];
$verifier = $rowUserInfo['USERID'];
$get_newprices = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE STATUS ='Approved' ORDER BY `DATE` DESC");

    $get = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND STATUS ='Approved'");
      $row=mysqli_fetch_assoc($get);
       ?>

<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Approved Prices per Commodities</h3>
      <hr 999/>
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
        <table id="" class="display table table-striped table-bordered dataTable no-footer text-xs">
            <thead style="background-color: #4f98ca;color:white;">
                <tr>
                      <!--   <th><center><b>DATE</b></center></th>
                        <th><center><b>MARKET</b></center></th> -->
                        <th><center><b>COMMODITY</b></center></th>
                        <th><center><b>CATERGORY</b></center></th>
                        <th><center><b>SPECIFICATIONS</b></center></th>
                        <th><center><b>RESPONDENT 1</b></center></th>
                        <th><center><b>RESPONDENT 2</b></center></th>
                        <th><center><b>RESPONDENT 3</b></center></th>
                        <th><center><b>RESPONDENT 4</b></center></th>
                        <th><center><b>RESPONDENT 5</b></center></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_prices = mysqli_fetch_assoc($get_newprices)){?>
                    <tr>

                     <!--    <td class="d-sm-table-cell" style="width: 10%" >
                        <?php //echo $row_prices['DATE'];?>
                        </td>
                        <td class="d-sm-table-cell" style="width: 30%" >
                        <?php 
                        //echo $row_prices['ASSIGNED_MARKET'];
                        //$getmcode = $dbConn->query("SELECT * FROM ref_markets WHERE MARKET_CODE = '$mrktcde' ");
                        //$resultmcode = mysqli_fetch_assoc($getmcode);
                        ?>
                        </td> -->
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
                        <?php echo $row_prices['RESP_1'];?>
                        </td>
                        <td class="d-sm-table-cell" style="width: 10%" >
                        <?php echo $row_prices['RESP_2'];?>
                        </td>
                        <td class="d-sm-table-cell" style="width: 10%" >
                        <?php echo $row_prices['RESP_2'];?>
                        </td>
                        <td class="d-sm-table-cell" style="width: 10%" >
                        <?php echo $row_prices['RESP_4'];?>
                        </td>
                        <td class="d-sm-table-cell" style="width: 10%" >
                        <?php echo $row_prices['RESP_5'];?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
              <!--       <th><center><b>DATE</b></center></th>
                    <th><center><b>MARKET</b></center></th> -->
                    <th><center><b>COMMODITY</b></center></th>
                    <th><center><b>CATERGORY</b></center></th>
                    <th><center><b>SPECIFICATIONS</b></center></th>
                    <th><center><b>RESPONDENT 1</b></center></th>
                    <th><center><b>RESPONDENT 2</b></center></th>
                    <th><center><b>RESPONDENT 3</b></center></th>
                    <th><center><b>RESPONDENT 4</b></center></th>
                    <th><center><b>RESPONDENT 5</b></center></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

    <?php include('footer.html');?>
</body>