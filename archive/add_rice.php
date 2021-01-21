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
            // if(!empty($respone)){
                //  $dbConn->query('INSERT INTO tbl_prices (DATE_TODAY, MARKET_LOCATION, COMMODITY, CATEGORY, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');     
               $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, DATE, MARKET_CODE, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $prices_id . '","' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');
            // }
            echo "<script>window.location.href='add_fish.php?PID=$prices_id&MARKET=$market&DATEE=$date';</script>";
}
}
?>

<form method="post">
<div class="form-row">
            <div class="col-lg-12">
                <div style="font-size: 1rem;">
                    <div class="form-row mt-3 border">
                        <div class="col-lg-2 bg-label p-2">
                            DATE
                        </div>

                        <div class="col-lg-3 p-2">
                            <input type="date" name="txtDate"/>
                        </div>

                        <div class="col-lg-2 bg-label p-2">
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
                        <!-- <input type="text"  class="form-control form-control-sm" name="txtMarket[$k]" value="MARIKINA PUBLIC MARKET"/> -->
                        </div>
                    </div>
                </div>
<div id="accordion" role="tablist">
  <div class="card  mt-4">
        <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;"  href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
            <i class="ml-1 caret fas fa-caret-right"></i>
                                <b> R I C E </b>
            </a>
        </h5>
        </div>
        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
            <div class="card-body">
            <div class="form-row">
                <div class="form-group px-3 row ml-4 mt-4">
                    <div class="col-lg-12">
                        <label class="custom-label">
                            <font class="text-xs">NFA 1</font>
                        </label>
                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="1" hidden=""/>
                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                    </div>
                </div>
                                
                <div class="form-group px-3 row ml-4 mt-4">
                    <div class="col-lg-12">
                        <label class="custom-label">
                            <font class="text-xs">NFA 2</font>
                        </label>
                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                    </div>
                </div>
                                
                <div class="form-group px-3 row ml-4 mt-4">
                    <div class="col-lg-12">
                        <label class="custom-label">
                            <font class="text-xs">NFA 3</font>
                        </label>
                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                    </div>
                </div>

                                
                <div class="form-group px-3 row ml-4 mt-4">
                    <div class="col-lg-12">
                        <label class="custom-label">
                            <font class="text-xs">NFA 4</font>
                        </label>
                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                    </div>
                </div>
                
                                
                <div class="form-group px-3 row ml-4 mt-4">
                    <div class="col-lg-12">
                        <label class="custom-label">
                            <font class="text-xs">NFA 5</font>
                        </label>
                        <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                    </div>
                </div>       
            </div>           
            </div>
        </div>
    </div>
</div>

<!-- CI -->
    <div class="card">
        <div class="card-header" role="tab" id="HCI">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#CI" aria-expanded="false" aria-controls="CI" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>COMMERCIAL RICE (IMPORTED)</b>
            </a>
        </h5>
        </div>

        <div id="CI" class="collapse" role="tabpanel" aria-labelledby="HCI" style="">
            <div class="card-body">
            <div class="form-row">
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Regular Milled 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="3" hidden=""/>
                            <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Regular Milled 2</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Regular Milled 3</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Regular Milled 4</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Regular Milled 5</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Premium (Yellow Tagged) 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="2" hidden=""/>
                            <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Premium (Yellow Tagged) 2</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Premium (Yellow Tagged) 3</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Premium (Yellow Tagged) 4</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Premium (Yellow Tagged) 5</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Special (Blue Tagged) 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="4" hidden=""/>
                            <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Special (Blue Tagged) 2</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Special (Blue Tagged) 3</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Special (Blue Tagged) 4</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Special (Blue Tagged) 5</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Well Milled 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="5" hidden=""/>
                            <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Well Milled 2</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Well Milled 3</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Well Milled 4</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                        </div>
                    </div>
                    <div class="form-group px-3 row ml-4 mt-4">
                        <div class="col-lg-12">
                            <label class="custom-label">
                                <font class="text-xs">Well Milled 5</font>
                            </label>
                            <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <!-- END CI -->
   <!-- CL -->
   <div class="card">
        <div class="card-header" role="tab" id="HCL">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#CL" aria-expanded="false" aria-controls="CL" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>COMMERCIAL RICE (LOCAL)</b>
            </a>
        </h5>
        </div>

        <div id="CL" class="collapse" role="tabpanel" aria-labelledby="HCL" style="">
            <div class="card-body">
            <div class="form-row">
            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="7" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Premium (Yellow Tagged) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="6" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Premium (Yellow Tagged) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Premium (Yellow Tagged) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Premium (Yellow Tagged) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Premium (Yellow Tagged) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Special (Blue Tagged) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="8" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Special (Blue Tagged) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Special (Blue Tagged) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Special (Blue Tagged) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Special (Blue Tagged) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Well Milled 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="9" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Well Milled 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Well Milled 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Well Milled 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Well Milled 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                </div>
            </div>
        </div>
   </div>
   <!-- END CI -->
  <button type="submit" name="submit" class="btn btn-sm btn-primary ml-3 mt-2">
   <i class="fas fa-save fa-xs"></i> 
   Save / Next
</button>
</form>

</div>
   </div>
<?php include('footer.html'); ?>
</body>

