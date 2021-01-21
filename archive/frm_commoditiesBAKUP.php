<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<!-- SQL -->
<?php
$mdate = $_REQUEST['DATE'];
$mcode = $_REQUEST['AM'];

$PID =$_REQUEST['PID'];
   $getCommodities = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND STATUS ='For Verification'");
    if(isset($_POST['submitall'])){


//      $verifier = $_POST['verifier'];
//        $remarks = $_REQUEST['remarks'];

        $verifier = $userid;
        $countdata = $dbConn->query("UPDATE tbl_nw_prices SET STATUS='Approved', VERIFIER = '$verifier' WHERE PRICES_ID = '$PID'");

        $getCommCount = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE PRICES_ID = '$PID'");
        $rowCommCount = mysqli_fetch_array($getCommCount);
        $rowcd=mysqli_num_rows($getCommCount);

/*        $getCommDetails = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE PRICES_ID = '$PID'");
        $rowCommDetails = mysqli_fetch_array($getCommDetails);
        $rowcount=mysqli_num_rows($getCommDetails);*/

        do {
        
        $rowins = $rowCommCount['SID'];
        
        $getCommDetails = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE PRICES_ID = '$PID' AND SID = '$rowins'");
        $rowCommDetails = mysqli_fetch_array($getCommDetails);

        $arr_comm =array();
                                                                   
        $arr_comm[] = $rowCommDetails['RESP_1']; 
        $arr_comm[] = $rowCommDetails['RESP_2']; 
        $arr_comm[] = $rowCommDetails['RESP_3']; 
        $arr_comm[] = $rowCommDetails['RESP_4']; 
        $arr_comm[] = $rowCommDetails['RESP_5']; 

        $values = array_count_values($arr_comm);
        arsort($values);

        $prevailing = array_slice(array_keys($values), 0, 5, true);
        
        $date = $rowCommDetails['DATE'];
        $marcode = $rowCommDetails['ASSIGNED_MARKET'];
        $macode = $rowCommDetails['MARKET_CODE'];
        $comcode = $rowCommDetails['COMMODITY_CODE'];
        $catcode = $rowCommDetails['CATEGORY_CODE'];
        $unit = $rowCommDetails['UNIT'];
        $high = max($arr_comm);
        $low  = min($arr_comm);
        $prev = $prevailing[0];
        $remarks = $rowCommDetails['REMARKS'];
        $encoder = $rowCommDetails['ENCODER'];
        $dateenc = $rowCommDetails['DATE_ENCODED'];
        $verifier = $userid;
    
    $dbConn->query("INSERT INTO tbl_bp_prices(`DATE`,`COMMODITY_CODE`,`CATEGORY_CODE`,`UNIT`,`HIGH`,`LOW`,`PREVAILING`,`REMARKS`,`ENCODER`,`DATE_ENCODED`,`VERIFIER`,`DATE_VERIFIED`, `ASSIGNED_MARKET`, `MARKET_CODE`)VALUES('$date','$comcode','$catcode','$unit','$high','$low','$prev','$remarks','$encoder','$dateenc','$verifier',NOW(),'$marcode', '$macode')");


      } while ($rowCommCount = mysqli_fetch_array($getCommCount));

      echo '<script language="javascript">alert("Approved Successfully!")</script>';
      echo "<script>window.location.href='frm_verifier.php';</script>"; 
   }
     $get = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE `DATE` = '$mdate' AND ASSIGNED_MARKET = '$mcode' AND STATUS ='For Verification'");
      $row=mysqli_fetch_assoc($get);
?>

<div class="col-lg-12 bg-white border p-3">
  <div class="form-row">
    <div class="col-lg-11">
      <!-- Page Heading -->
      <h3 class="text-gray-800">List of Prices per Commodities for Approval</h3>
      <hr 999/>
    </div>
     <div class="col-lg-1">
      <form method="POST"><button class="btn btn-sm btn-info text-xs" type="submit" name="submitall"><i class="far fa-check-circle"></i> Approved All</button></form>
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
    <table id="" class="display table-striped table-bordered table-responsive text-xs">
      <thead class="bg-accent text-sm">
          <tr>
             <!--  <th>DATE</th>
              <th>MARKET</th> -->
              <th>COMMODITY</th>
              <th>CATEGORY</th>
              <th>SPECIFICATIONS</th>
              <th>RESPONDENT 1</th>
              <th>RESPONDENT 2</th>
              <th>RESPONDENT 3</th>
              <th>RESPONDENT 4</th>
              <th>RESPONDENT 5</th>
              <th>ACTION</th>
          </tr>
      </thead>
      <tbody>
        <?php while($rowCommodities = mysqli_fetch_array($getCommodities)){ ?> 
          <tr>
      <!--         <td><?php //echo $rowCommodities['DATE']; ?></td>
              <td><?php 
                 // $marketcode = $rowCommodities['MARKET_CODE'];
                 // $getMarketName = $dbConn->query("SELECT MARKET_CODE, MARKET FROM ref_markets WHERE MARKET_CODE = '$marketcode'");
                 // while($rowMarketName = mysqli_fetch_array($getMarketName)){ echo $rowMarketName['MARKET']; 
                 // }
                 //echo $rowCommodities['ASSIGNED_MARKET']; ?></td> -->
              <td><?php 
                 $commcode = $rowCommodities['COMMODITY_CODE'];
                 $getCommName = $dbConn->query("SELECT COMMODITY_CODE, COMMODITY FROM ref_commodities WHERE COMMODITY_CODE = '$commcode'");
                 while($rowCommName = mysqli_fetch_array($getCommName)){ echo $rowCommName['COMMODITY']; 
                 } ?></td>
              <td><?php 
                 $catcode = $rowCommodities['CATEGORY_CODE'];
                 $getCatName = $dbConn->query("SELECT CATEGORY_CODE, CATEGORY FROM ref_category WHERE CATEGORY_CODE = '$catcode'");
                 while($rowCatName = mysqli_fetch_array($getCatName)){ echo $rowCatName['CATEGORY']; 
                 } ?></td>
             <td><?php 
                 $commodity = $rowCommodities['COMMODITY_CODE'];
                $getSpec = $dbConn->query("SELECT * FROM ref_commodities WHERE COMMODITY_CODE = '$commodity'");
                while($rowSpec = mysqli_fetch_array($getSpec)){
                    echo $rowSpec['SPECIFICATION']; }?></td>
              <td><?php echo $rowCommodities['RESP_1']; ?></td>
              <td><?php echo $rowCommodities['RESP_2']; ?></td>
              <td><?php echo $rowCommodities['RESP_3']; ?></td>
              <td><?php echo $rowCommodities['RESP_4']; ?></td>
              <td><?php echo $rowCommodities['RESP_5']; ?></td>
              <input type="hidden" name="sid" value="<?php echo $sid = $rowCommodities['SID']; ?>">
              <td><a data-toggle="modal" data-target="#approved<?=$sid;?>" href="#" class="btn btn-outline-primary form-control">Approve</a><br/>
              <a data-toggle="modal" data-target="#flagged<?=$sid;?>" href="#" class="btn btn-outline-danger form-control mt-1">Flag</a>
                     <?php include('modal_app_flag.php');?>
              </td>
          </tr>
        <?php } ?> 
      </tbody>
      <tfoot>
          <tr>
              <!-- <th>DATE</th>
              <th>MARKET</th> -->
              <th>COMMODITY</th>
              <th>CATEGORY</th>
              <th>SPECIFICATIONS</th>
              <th>RESPONDENT 1</th>
              <th>RESPONDENT 2</th>
              <th>RESPONDENT 3</th>
              <th>RESPONDENT 4</th>
              <th>RESPONDENT 5</th>
              <th>ACTION</th>
          </tr>
      </tfoot>
    </table>  
  </div>
</div>



<?php include('footer.html'); ?>
<?php include('func_action.php');?>
</body>

</html>

