<?php require_once('config/database_connection.php'); ?>
<!-- APPROVE -->
<?php 
if(isset($_POST['actionApprove'])){
  		$sid		= $_POST['sid'];
  		$verifier_id = $_POST['verifier'];
  		$mdate = $_REQUEST['DATE'];
        $mcode = $_REQUEST['CODEE'];
        $remarks = $_REQUEST['remarks'];
        $PID = $_REQUEST['PID'];
        
	  	$dbConn->query("UPDATE tbl_nw_prices SET STATUS='Approved', VERIFIER ='$verifier_id', DATE_VERIFIED = NOW() WHERE SID = '$sid'");

        $getCommDetails = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE SID = '$sid'");
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
        $comcode = $rowCommDetails['COMMODITY_CODE'];
        $catcode = $rowCommDetails['CATEGORY_CODE'];
        $unit = $rowCommDetails['UNIT'];
        $high = max($arr_comm);
        $low  = min($arr_comm);
        $prev = $prevailing[0];
        $remarks = $rowCommDetails['REMARKS'];
        $encoder = $rowCommDetails['ENCODER'];
        $dateenc = $rowCommDetails['DATE_ENCODED'];
        $verifier = $_POST['verifier'];
    
    $dbConn->query("INSERT INTO tbl_bp_prices(`DATE`,`COMMODITY_CODE`,`CATEGORY_CODE`,`UNIT`,`HIGH`,`LOW`,`PREVAILING`,`REMARKS`,`ENCODER`,`DATE_ENCODED`,`VERIFIER`,`DATE_VERIFIED`, `ASSIGNED_MARKET`)VALUES('$date','$comcode','$catcode','$unit','$high','$low','$prev','$remarks','$encoder','$dateenc','$verifier',NOW(),'$marcode')");

    echo "<script>window.location ='frm_commodities.php?DATE=$mdate&AM=$mcode&PID=$PID';</script>";
	}
?>

<?php 
if(isset($_POST['actionFlag'])){
  		$sid		= $_POST['sid'];
  		$verifier_id = $_POST['verifier'];
  		$mdate = $_REQUEST['DATE'];
        $mcode = $_REQUEST['CODEE'];
        $remarks = $_REQUEST['remarks'];
        $PID = $_REQUEST['PID'];

	  	$dbConn->query("UPDATE tbl_nw_prices SET STATUS='Flagged', VERIFIER_REMARKS = '$remarks', VERIFIER ='$verifier_id', DATE_VERIFIED = NOW() WHERE SID = '$sid'");
		
		echo "<script>window.location = 'frm_commodities.php?DATE=$mdate&AM=$mcode&PID=$PID';</script>";
	}
?>

<?php 
if(isset($_POST['actionSave'])){
        $sid        = $_POST['sid'];
        $verifier_id = $_POST['verifier'];
        $mdate = $_REQUEST['DATE'];
        $mcode = $_REQUEST['CODEE'];
        $resp1 = $_REQUEST['resp1'];
        $resp2 = $_REQUEST['resp2'];
        $resp3 = $_REQUEST['resp3'];
        $resp4 = $_REQUEST['resp4'];
        $resp5 = $_REQUEST['resp5'];

        $dbConn->query("UPDATE tbl_nw_prices SET STATUS = 'For Verification', RESP_1 = '$resp1', RESP_2 = '$resp2', RESP_3 = '$resp3', RESP_4 = '$resp4', RESP_5 = '$resp5', VERIFIER='$verifier_id' WHERE SID = '$sid'");
        
        echo "<script>window.location = 'tbl_flagged_commodities.php?DATE=$mdate&AM=$mcode';</script>";
    }
?>

<?php 

if(isset($_POST['updatePrice'])){
        $sid        = $_POST['sid'];
        // $verifier_id = $_POST['verifier'];
        $mdate = $_POST['DATE'];
        $mcode = $_POST['AM'];
        $resp1 = $_REQUEST['resp1'];
        $resp2 = $_REQUEST['resp2'];
        $resp3 = $_REQUEST['resp3'];
        $resp4 = $_REQUEST['resp4'];
        $resp5 = $_REQUEST['resp5'];
        $PID   = $_REQUEST['PID'];

        $dbConn->query("UPDATE tbl_nw_prices SET RESP_1 = '$resp1', RESP_2 = '$resp2', RESP_3 = '$resp3', RESP_4 = '$resp4', RESP_5 = '$resp5' WHERE SID = '$sid'");
        
        echo "<script>window.location = 'tbl_encode_prices.php?DATE=$mdate&AM=$mcode&PID=$PID';</script>";
    }
?>