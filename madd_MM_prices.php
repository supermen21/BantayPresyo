<?php include('head.html'); ?>
<?php  include('connections/conn.php'); session_start(); 
    if(isset($_SESSION['id'])){ }else{ header('Location: dtr_login.php'); }?>
<body>  
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
               $dbConn->query('INSERT INTO tbl_nw_prices (PRICES_ID, DATE, MARKET_CODE, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $prices_id . '","' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');

            echo '<script language="javascript">alert("Prices save successfully!")</script>';
           }
}
?>
<form method="post">
<div class="form-row">
            <div class="col-lg-12">
                <div style="font-size: 1rem;">
                    <div class="form-row mt-3 border">
                        <div class="col-2 bg-label ml-2 p-2">
                            DATE
                        </div>

                        <div class="col-lg-3 p-2">
                            <input type="date" placeholder="Date" class="form-control text-xs" name="txtDate"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">NFA</font>
                            </label>
                            <input type="text" class="form-control" name="txtCat[]" value="1" hidden=""/>
                            <input type="text" class="form-control" name="txtCommodity[]" value="1" hidden=""/>
                            <input type="number" placeholder="Respondent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                    <div class="col-xs-2">
                        <label class="custom-label col-12">
                                <font class="text-xs">Regular Milled</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="3" hidden=""/>
                            <input type="number"  placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                    <div class="col-xs-2">
                        <label class="custom-label col-12">
                                <font class="text-xs">Premium (Yellow Tagged)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="2" hidden=""/>
                            <input type="number"  placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                    <div class="col-xs-2">
                        <label class="custom-label col-12">
                                <font class="text-xs">Special (Blue Tagged)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="4" hidden=""/>
                            <input type="number"  placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                    <div class="col-xs-2">
                        <label class="custom-label col-12">
                                <font class="text-xs">Well Milled</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="5" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Regular Milled</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="7" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                    <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Premium (Yellow Tagged)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="6" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Special (Blue Tagged)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="8" hidden=""/>
                            <input type="number" placeholder="Respodent1"  class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Well Milled</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="9" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                       <div class="col-xs-2">
                              <label class="custom-label col-12">
                                <font class="text-xs">Alumahan</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="10" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Bangus</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="11" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Galunggong (Imported)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="12" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Galunggong (Local) 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="13" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
               </div>
               <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Tilapia</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="4" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="14" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                       <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Beef Brisket</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="34" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Beef Rump</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="35" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Pork Kasim</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="37" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Pork Liempo</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="38" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Whole Chicken</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="39" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Egg (Medium)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="8" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="36" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Calamansi</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="15" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Lakatan</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="16" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Latundan</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="17" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Mangga</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="18" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Papaya</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="19" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Amargoso</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="27" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Sitao</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="31" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Pechay Tagalog</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="30" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Kalabasa</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="29" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
               </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Talong</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="32" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Tomato</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="33" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Baguio Beans</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="20" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
               <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Cabbage</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="21" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Carrots</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="22" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Habichuelas</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="23" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
               </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Patatas</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="24" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Pechay Baguio</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="25" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Sayote</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="26" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Garlic (Imported)</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="40" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                       <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Garlic (Native)</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="41" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Luya</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="42" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Onion Red</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="43" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                       </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Onion Red (Imported)</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="44" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Onion White</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="45" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Onion White (Imported)</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="46" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                        <font class="text-xs">Sili Labuyo</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="47" hidden=""/>
                                    <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                                    <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                                    <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                                    <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                                    <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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
            <div class="form-group px-1 row ml-2 mt-1">
                <div class="col-xs-2">
                    <label class="custom-label col-12">
                                <font class="text-xs">Sugar Brown</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="50" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                   <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Sugar Washed 1</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="51" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
               </div>
                <div class="form-row">    
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Sugar White</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="52" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Mantika (350 ml)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="49" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
                        </div>
                    </div>
                </div>      
                <div class="form-row">
                    <div class="form-group px-1 row ml-2 mt-1">
                        <div class="col-xs-2">
                            <label class="custom-label col-12">
                                <font class="text-xs">Mantika (1 Liter)</font>
                            </label>
                            <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="10" hidden=""/>
                            <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="48" hidden=""/>
                            <input type="number" placeholder="Respodent1" class="form-control col-4 float-left ml-2 mt-2" name="txtRespOne[]"/>
                            <input type="number" placeholder="Respondent2" class="form-control col-4 float-left ml-2 mt-2" name="txtRespTwo[]"/>
                            <input type="number" placeholder="Respondent3" class="form-control col-4 float-left ml-2 mt-2" name="txtRespThree[]"/>
                            <input type="number" placeholder="Respondent4" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFour[]"/>
                            <input type="number" placeholder="Respondent5" class="form-control col-4 float-left ml-2 mt-2" name="txtRespFive[]"/>
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

