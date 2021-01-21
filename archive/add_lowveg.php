<?php require_once('config/database_connection.php'); ?>
<?php include('head.html'); ?>
<?php include('session.php');?>
<body>
<?php include('sidebar.php');?>
<?php include('menu.php');?>

<?php 
    $pid     = $_REQUEST['PID']; 
    $market     = $_REQUEST['MARKET'];
    $date     = $_REQUEST['DATEE'];

    $query1 = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE PRICES_ID = '$pid'");
    $row1   = mysqli_fetch_assoc($query1);

    if(isset($_POST['submitFish'])) { 
        // $count_row = count($_POST['txtCat']);
                $cat      = $_POST['txtCat'];
        
             $comm     = $_POST['txtCommodity'];
             $respone  = $_POST['txtRespOne'];
             $resptwo  = $_POST['txtRespTwo'];
             $resptri  = $_POST['txtRespThree'];
             $resppor  = $_POST['txtRespFour'];
             $respfive = $_POST['txtRespFive'];

        if(!empty($cat)){
            // echo "<script type='text/javascript'>alert('cat is not null')</script>";
            for($k = 0; $k < count($cat); $k++){
                // $markett = $market;
                // $pricesid = $priceid;
                // $datee = $date;
                // echo "<script type='text/javascript'>alert('$k')</script>";
                if(!empty($respone) || !empty($resptwo) ||!empty($resptri) ||!empty($resppor) ||!empty($respfive) ){
                    $commcomm = $comm[$k];
                    $catcat = $cat[$k];
                    $markett = $market;
                    $respone1 = $respone[$k];
                    $resptwo2 = $resptwo[$k];
                    $resptri3 = $resptri[$k];
                    $respfive5 = $respfive[$k];
                    
                    $resppor4 = $resppor[$k];
                    
                    //echo "<script type='text/javascript'>alert('$catcat')</script>";
                    $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, DATE, MARKET_CODE, COMMODITY_CODE, CATEGORY_CODE, RESP_1, RESP_2, RESP_3, RESP_4, RESP_5) 
                    VALUES ("' . $pid. '", "' . $date. '", "' . $market. '", "' . $commcomm . '", "' . $catcat . '", "' . $respone1 . '", "' . $resptwo2 . '", "' . $resptri3 . '", "' . $resppor4 . '", "' . $respfive5 . '") ');
               
                    //echo "<script type='text/javascript'>alert('stop 2')</script>";
                }
                echo "<script>window.location.href='add_highveg.php?PID=$pid&MARKET=$market&DATEE=$date';</script>";
            }
        }
        
    }

    $getCategory = $dbConn->query("SELECT * FROM ref_category WHERE CATEGORY = 'LOWLAND VEGETABLES' GROUP BY CATEGORY_CODE");

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
                            <!-- HIDE -->
                            <input type="hidden"  class="form-control form-control-sm" name="PRICES_ID" value="<?php echo $row1['PRICES_ID'] ?>"/>
                            <input type="hidden"  class="form-control form-control-sm" name="txtMarket" value="<?php echo $row1['DATE'] ?>"/>
                            <input type="hidden"  class="form-control form-control-sm" name="txtDate" value="<?php echo $row1['MARKET_CODE'] ?>"/>
                            <!-- HIDE -->

                            <?php while($rowCategory = mysqli_fetch_assoc($getCategory)) { $cat_cde = $rowCategory['CATEGORY_CODE']; $getCommodities = $dbConn->query("SELECT * FROM ref_commodities WHERE CATEGORY_CODE LIKE '$cat_cde'"); ?>
                            
                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                          <a data-toggle="collapse" href="#collapseOne" style="font-size:24px;color:gray;text-decoration:none;" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i  class="ml-1 caret fas fa-caret-right"></i>
                                        <b><?php echo $rowCategory['CATEGORY']; ?></b>
                                        </a>
                                    </h5>
                                    </div>

                                    <?php while($rowCom = mysqli_fetch_assoc($getCommodities)) { ?>

                                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                        <div class="card-body">
                                        <div class="form-row">                  
                                            <div class="form-group px-3 row ml-2 mt-1">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="<?php echo $rowCategory['CATEGORY_CODE'] ?>" hidden/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="<?php echo $rowCom['COMMODITY_CODE'] ?>" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                                            
                                            <div class="form-group px-3 row ml-2 mt-1">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                                            
                                            <div class="form-group px-3 row ml-2 mt-1">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>

                                                            
                                            <div class="form-group px-3 row ml-2 mt-1">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            
                                                            
                                            <div class="form-group px-3 row ml-2 mt-1">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs"><?php echo $rowCom['COMMODITY'] ?> 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                        </div>  
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" name="submitFish" class="btn btn-sm btn-primary mt-3">
                        <i class="fas fa-save fa-xs"></i>
                        Save / Next
                    </button>
            </form>
    </div>
</div>
<?php include('footer.html'); ?>
</body>