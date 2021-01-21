
 <?php require_once('config/database_connection.php'); ?>
 <?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<?php 
if(isset($_POST['submit'])) {
   
    $getID= $dbConn->query('SELECT * FROM tbl_nw_prices order by SID DESC LIMIT 1');
    $rowPrices = mysqli_fetch_array($getID);
    $month = date('m');
    $day =date('d');
    $year = date('Y');
 
    $getPrices = $rowPrices['SID'] + 1;
    $prices_id = 'PRICES'.'-'.'10'.$month. $day. $year. $getPrices;
    $count_row = count($_POST['txtCat']);

    
    $market = $_POST['txtMarket'];
    $date = $_POST['txtDate'];
    for($k=0; $k<$count_row; $k++){
        
             $cat = $_POST['txtCat'][$k];
             $comm = $_POST['txtCommodity'][$k];
             $respone = $_POST['txtRespOne'][$k];
             $resptwo = $_POST['txtRespTwo'][$k];
             $resptri = $_POST['txtRespThree'][$k];
             $resppor = $_POST['txtRespFour'][$k];
             $respfive = $_POST['txtRespFive'][$k];

            //  if($respone==''&&$resptwo==''&&$resptri==''&&$resppor==''&&$respfive==''){

            //  }else{
                $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, DATE, MARKET_CODE, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $prices_id . '","' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');
            //  }

    }

    // $market = $_POST['txtMarket'];
    // $datee = $_POST['txtDate'];
    // $cat = $_POST['txtCat'];
    // $comm = $_POST['txtCommodity'];
    // $respone = $_POST['txtRespOne'];
    // $resptwo = $_POST['txtRespTwo'];
    // $resptri = $_POST['txtRespThree'];
    // $resppor = $_POST['txtRespFour'];
    // $respfive = $_POST['txtRespFive'];  

    echo "<script>window.location.href='add_fish.php?PID=$prices_id&MARKET=$market&DATEE=$date';</script>";

// $dbConn->query("INSERT INTO tbl_prices (DATE_TODAY, MARKET_LOCATION, COMMODITY, CATERGORY, RESP_1,RESP_2,RESP_3, RESP_4, RESP_5) VALUES ('$datee','$market', '$comm', '$cat', '$respone', '$resptwo', '$resptri', '$resppor','$respfive')");

}

$getCategory = $dbConn->query("SELECT * FROM ref_category WHERE CATEGORY = 'RICE' OR CATEGORY = 'COMMERCIAL (IMPORTED)' OR CATEGORY = 'COMMERCIAL (LOCAL)' GROUP BY CATEGORY_CODE");

?>


<div class="container-fluid px-3 py-0">
	<div class="col-lg-12 bg-white border p-3">
       <div class="form-row">
            <div class="col-lg-12">
	         <!-- Page Heading -->
	         <h3 class="mb-2 text-gray-800">Encode Prices</h3>
       	    </div>
     	</div>
        
         <form method="post">
        <div class="form-row">
            <div class="col-lg-12">
                <div style="font-size: 0.7rem;">
                    <div class="form-row mt-3 border">
                        <div class="col-lg-2 bg-label p-2">
                            DATE
                        </div>

                        <div class="col-lg-2 p-2">
                            <input type="date" name="txtDate"/>
                        </div>

                        <div class="form-row col-lg-2 bg-label p-2">
                            MARKET
                        </div>
                        <?php $getMarket = $dbConn->query("SELECT * FROM ref_markets ");?>

                        <div class="col-lg-3 p-2">
                        <select name="txtMarket" id="reg" placeholder="Market" class="form-control text-xs" required>
                            <option value="">SELECT MARKET</option>
                            <?php while($rowMarket = mysqli_fetch_assoc($getMarket)) { ?>
                            <option value="<?php echo $rowMarket['MARKET_CODE']; ?>">
                            <?php echo $rowMarket['MARKET']; ?>
                            </option>
                            <?php } ?>
                         </select>
                        <!-- <input type="text"  class="form-control form-control-sm" name="txtMarket" value="MARIKINA PUBLIC MARKET"/> -->
                        </div>
                    </div>
                    
                    <?php while($rowCategory = mysqli_fetch_assoc($getCategory)) { $cat_cde = $rowCategory['CATEGORY_CODE']; $getCommodities = $dbConn->query("SELECT * FROM ref_commodities WHERE CATEGORY_CODE LIKE '$cat_cde'"); ?>
                    
                    <div  class="form-row mt-3 border">
                        <div class="col-lg-12">
                            <h3 class="mb-2 text-gray-800">
                                <a href="#"  class="" role="button" style="color:black;text-decoration:none;color:gray;">
                                    <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                                    <b><?php echo $rowCategory['CATEGORY']; ?></b>
                                </a>
                            </h3>
                        </div>

                            <?php while($rowCom = mysqli_fetch_assoc($getCommodities)) { ?>

                            <div class="form-row">                  
                                <div class="form-group px-3 row ml-4 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="<?php echo $rowCategory['CATEGORY_CODE'] ?>" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="<?php echo $rowCom['COMMODITY_CODE'] ?>" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                                
                                <div class="form-group px-3 row ml-4 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                                
                                <div class="form-group px-3 row ml-4 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>

                                                
                                <div class="form-group px-3 row ml-4 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                
                                                
                                <div class="form-group px-3 row ml-4 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 5</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                    </div>
                                </div>
                            </div> 

                            <?php } ?>
                        
                    </div>

                    <?php } ?>

                </div>
            
            </div>
        
        </div> 

        <button type="submit" name="submit" class="btn btn-sm btn-primary mt-3">
            <i class="fas fa-save fa-xs"></i>
            Save / Next
        </button>
        </form>
    </div>
</div>



<?php include('footer.html'); ?>
</body>
<script>
function openNav() {
    document.getElementById("navbar--middle").style.display = "block";
}

function closeNav() {
    document.getElementById("navbar--middle").style.display = "none";
}

function myFunction(x) {
    x.classList.toggle("change");
    if(x.classList.contains("change")) {
    	openNav();
    } else {
    	closeNav();
    }
}
</script>