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

    $SID = $rowPrices['SID'];
    $market2 = $rowPrices['ASSIGNED_MARKET'];
    $date2   =$rowPrices['DATE'];
 
    $getPrices = $rowPrices['SID'] + 1;
    $prices_id = 'PRICES'.'-'.'10'.$month. rand(1,100);
    $count_row = count($_POST['txtCat']);

    
    $encoder = $rowUserInfo['USERID'];
    $market = $_POST['txtMarket'];
    $marketcode = $_POST['txtMarketcode'];
    // $date = $_POST['txtDate'];
    $date = date('Y-D-M');
    // $status = 'For Verification';
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
               // $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, `DATE`, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5, ENCODER, ASSIGNED_MARKET) VALUES ("' . $prices_id . '","' . $date . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '", "' . $encoder . '", "' . $market . '")');
                $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, `DATE`, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5, ENCODER, ASSIGNED_MARKET, MARKET_CODE) VALUES ("' . $prices_id . '",NOW(), "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '", "' . $encoder . '", "' . $market . '", "' . $marketcode . '")');
            // } 

echo '<script language="javascript">alert("Prices save successfully!")</script>';
echo "<script>window.location.href='tbl_encodepermarket.php';</script>"; 
}
}
?>
   <div class="container-fluid mb-3 mt-3 border p-2">
            <div class="form-row mb-2">
                <div class="col-lg-11">
                    <!-- Page Heading -->
                    <h1 class="h5 mb-2 text-gray-800">Encode Prices</h1>
                </div>
            </div>
            <hr 999/>
<form method="post">
<div class="form-row">

            <div class="col-lg-12">
                <div style="font-size: 1rem;">
                    <div class="form-row mt-3 ">
                        <div class="col-lg-2 bg-label ml-2 p-2">
                            DATE
                        </div>

                        <div class="col-lg-3 p-2">
                            <input type="text" class="form-control text-xs" name="txtDate" value="<?php echo date("Y-m-d");?>" readonly/>
                        </div>

                        <div class="col-lg-2 bg-label p-2">
                            MARKET
                        </div>

                        <div class="col-lg-3 p-2">
                           <!--  <select name="txtMarket" id="reg" placeholder="Market" class="form-control text-xs" required>
                                <option value="">SELECT MARKET</option>
                                <?php //while($rowMarket = mysqli_fetch_assoc($getMarket)) { ?>
                                <option value="<?php //echo $rowMarket['MARKET_CODE']; ?>">
                                <?php //echo $rowMarket['MARKET']; ?>
                                </option>
                                <?php //} ?>
                            </select> -->
                        <input type="text"  class="form-control form-control-sm" name="txtMarket" value="<?php echo $rowUserInfo['ASSIGNED_MARKET'];?>" readonly/>
                        <input type="hidden"  class="form-control form-control-sm" name="txtMarketcode" value="<?php echo $rowUserInfo['MARKET_CODE'];?>" readonly/>
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
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">NFA 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="1" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                                
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">NFA 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                                
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">NFA 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>

                                                
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">NFA 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                
                                                
                                <div class="form-group px-3 row ml-2 mt-4">
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
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Regular Milled 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="3" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Regular Milled 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Regular Milled 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Regular Milled 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Regular Milled 5</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">    
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Premium (Yellow Tagged) 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="2" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Premium (Yellow Tagged) 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Premium (Yellow Tagged) 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Premium (Yellow Tagged) 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Premium (Yellow Tagged) 5</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">    
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Special (Blue Tagged) 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="4" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Special (Blue Tagged) 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Special (Blue Tagged) 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Special (Blue Tagged) 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Special (Blue Tagged) 5</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">    
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Well Milled 1</font>
                                        </label>
                                        <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                                        <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="5" hidden=""/>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Well Milled 2</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Well Milled 3</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
                                    <div class="col-lg-12">
                                        <label class="custom-label">
                                            <font class="text-xs">Well Milled 4</font>
                                        </label>
                                        <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                    </div>
                                </div>
                                <div class="form-group px-3 row ml-2 mt-4">
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
                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Regular Milled 1</font>
                                                </label>
                                                <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                                <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="7" hidden=""/>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Regular Milled 2</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Regular Milled 3</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Regular Milled 4</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Regular Milled 5</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">    
                                       <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Premium (Yellow Tagged) 1</font>
                                                </label>
                                                <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                                <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="6" hidden=""/>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Premium (Yellow Tagged) 2</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Premium (Yellow Tagged) 3</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Premium (Yellow Tagged) 4</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Premium (Yellow Tagged) 5</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">    
                                       <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Special (Blue Tagged) 1</font>
                                                </label>
                                                <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                                <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="8" hidden=""/>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Special (Blue Tagged) 2</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Special (Blue Tagged) 3</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Special (Blue Tagged) 4</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Special (Blue Tagged) 5</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">    
                                       <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Well Milled 1</font>
                                                </label>
                                                <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                                <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="9" hidden=""/>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Well Milled 2</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Well Milled 3</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
                                            <div class="col-lg-12">
                                                <label class="custom-label">
                                                    <font class="text-xs">Well Milled 4</font>
                                                </label>
                                                <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                            </div>
                                        </div>
                                        <div class="form-group px-3 row ml-2 mt-4">
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
                   <!-- FISH -->
                   <div class="card">
                        <div class="card-header" role="tab" id="FISH">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#ffish" aria-expanded="false" aria-controls="ffish" class="collapsed">
                            <i  class="ml-1 caret fas fa-caret-right"></i>
                                                <b>FISH</b>
                            </a>
                        </h5>
                        </div>

                               <div id="ffish" class="collapse" role="tabpanel" aria-labelledby="FISH" style="">
                                   <div class="card-body">
                                   <div class="form-row">
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Alumahan 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="10" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Alumahan 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Alumahan 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Alumahan 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Alumahan 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-row">
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Bangus 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="11" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Bangus 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Bangus 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Bangus 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Bangus 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">    
                                           <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Imported) 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="12" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Imported) 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Imported) 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Imported) 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Imported) 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">    
                                           <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Local) 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="13" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Local) 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Local) 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Local) 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Galunggong (Local) 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="form-row">    
                                           <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Tilapia 1</font>
                                                    </label>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="14" hidden=""/>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Tilapia 2</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Tilapia 3</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Tilapia 4</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                                </div>
                                            </div>
                                            <div class="form-group px-3 row ml-2 mt-4">
                                                <div class="col-lg-12">
                                                    <label class="custom-label">
                                                        <font class="text-xs">Tilapia 5</font>
                                                    </label>
                                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                                </div>
                                            </div>
                                        </div>
                                      
                            </div>
                        </div>
                   </div>
                   <!-- END FISH -->
    <!-- MEAT AND POULTRY -->
    <div class="card">
        <div class="card-header" role="tab" id="MEAT">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#meatpoultry" aria-expanded="false" aria-controls="meatpoultry" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>MEAT AND POULTRY</b>
            </a>
        </h5>
        </div>

               <div id="meatpoultry" class="collapse" role="tabpanel" aria-labelledby="MEAT" style="">
                   <div class="card-body">
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Brisket 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="34" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Brisket 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Brisket 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Brisket 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Brisket 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Rump 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="35" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Rump 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Rump 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Rump 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Beef Rump 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Kasim 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="37" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Kasim 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Kasim 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Kasim 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Kasim 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Liempo 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="38" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Liempo 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Liempo 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Liempo 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pork Liempo 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Whole Chicken 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="39" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Whole Chicken 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Whole Chicken 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Whole Chicken 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Whole Chicken 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Egg (Medium) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="36" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Egg (Medium) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Egg (Medium) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Egg (Medium) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Egg (Medium) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                      
            </div>
        </div>
   </div>
   <!-- END MEAT AND POULTRY -->
   <!-- FRUITS -->
   <div class="card">
        <div class="card-header" role="tab" id="FRUITS">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#ffruits" aria-expanded="false" aria-controls="ffruits" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>FRUITS</b>
            </a>
        </h5>
        </div>

               <div id="ffruits" class="collapse" role="tabpanel" aria-labelledby="FRUITS" style="">
                   <div class="card-body">
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Calamansi 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="15" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Calamansi 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Calamansi 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Calamansi 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Calamansi 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Lakatan 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="16" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Lakatan 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Lakatan 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Lakatan 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Lakatan 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Latundan 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="17" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Latundan 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Latundan 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Latundan 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Latundan 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mangga 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="18" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mangga 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mangga 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mangga 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mangga 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Papaya 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="19" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Papaya 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Papaya 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Papaya 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Papaya 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                      
            </div>
        </div>
   </div>
   <!-- END FRUITS -->
   <!-- LOWLAND -->
   <div class="card">
        <div class="card-header" role="tab" id="LOWLAND">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#llowland" aria-expanded="false" aria-controls="llowland" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>LOWLAND VEGETABLES</b>
            </a>
        </h5>
        </div>

               <div id="llowland" class="collapse" role="tabpanel" aria-labelledby="LOWLAND" style="">
                   <div class="card-body">
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Amargoso 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="27" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Amargoso 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Amargoso 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Amargoso 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Amargoso 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sitao 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="31" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sitao 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sitao 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sitao 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sitao 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Tagalog 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="30" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Tagalog 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Tagalog 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Tagalog 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Tagalog 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="29" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Talong 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="32" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Talong 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Talong 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Talong 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Talong 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Tomato 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="33" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Tomato 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Tomato 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Tomato 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Tomato 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                      
            </div>
        </div>
   </div>
   <!-- END LOWLAND -->
   <!-- HIGHLAND -->
   <div class="card">
        <div class="card-header" role="tab" id="HIGHLAND">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#hhighland" aria-expanded="false" aria-controls="hhighland" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>HIGHLAND VEGETABLES</b>
            </a>
        </h5>
        </div>

               <div id="hhighland" class="collapse" role="tabpanel" aria-labelledby="HIGHLAND" style="">
                   <div class="card-body">
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Baguio Beans 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="20" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Baguio Beans 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Baguio Beans 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Baguio Beans 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Baguio Beans 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Cabbage 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="21" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Cabbage 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Cabbage 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Cabbage 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Cabbage 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Carrots 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="22" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Carrots 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Carrots 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Carrots 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Carrots 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Habichuelas 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="23" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Kalabasa 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Habichuelas 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Habichuelas 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Habichuelas 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Patatas 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="24" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Patatas 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Patatas 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Patatas 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Patatas 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Baguio 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="25" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Baguio 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Baguio 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Baguio 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Pechay Baguio 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sayote 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="26" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sayote 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sayote 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sayote 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sayote 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                      
            </div>
        </div>
   </div>
   <!-- END HIGHLAND -->
   
   <!-- SPICES -->
   <div class="card">
        <div class="card-header" role="tab" id="SPICES">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#sspices" aria-expanded="false" aria-controls="sspices" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>SPICES</b>
            </a>
        </h5>
        </div>

               <div id="sspices" class="collapse" role="tabpanel" aria-labelledby="SPICES" style="">
                   <div class="card-body">
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Imported) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="40" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Imported) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Imported) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Imported) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Imported) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Native) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="41" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Native) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Native) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Native) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Garlic (Native) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Luya 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="42" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Luya 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Luya 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Luya 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Luya 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="43" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red (Imported) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="44" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red (Imported) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red (Imported) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red (Imported) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion Red (Imported) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="45" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White (Imported) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="46" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White (Imported) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White (Imported) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White (Imported) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Onion White (Imported) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sili Labuyo 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="47" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sili Labuyo 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sili Labuyo 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sili Labuyo 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sili Labuyo 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                      
            </div>
        </div>
   </div>
   <!-- END SPICES -->
   
   <!-- OTHER COMMODITIES -->
   <div class="card">
        <div class="card-header" role="tab" id="OTHER">
        <h5 class="mb-0">
            <a data-toggle="collapse" style="font-size:24px;color:gray;text-decoration:none;" href="#OC" aria-expanded="false" aria-controls="OC" class="collapsed">
            <i  class="ml-1 caret fas fa-caret-right"></i>
                                <b>OTHER COMMODITIES</b>
            </a>
        </h5>
        </div>

               <div id="OC" class="collapse" role="tabpanel" aria-labelledby="OTHER" style="">
                   <div class="card-body">
                   <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Brown 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="50" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Brown 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Brown 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Brown 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Brown 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Washed 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="51" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Washed 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Washed 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Washed 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar Washed 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar White 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="52" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar White 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar White 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar White 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Sugar White 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (350 ml) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="49" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (350 ml) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (350 ml) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (350 ml) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (350 ml) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>      
                   <div class="form-row">
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (1 Liter) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="48" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (1 Liter) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (1 Liter) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (1 Liter) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                            <div class="form-group px-3 row ml-2 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Mantika (1 Liter) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                                      
            </div>
        </div>
   </div>
</div>
   <!-- END OTHER COMMODITIES -->
  <button type="submit" name="submit" class="btn btn-sm btn-primary ml-3 mt-2">
   <i class="fas fa-save fa-xs"></i> 
   Save
</button>
</form>

</div>
   </div>
<?php include('footer.html'); ?>
</body>

