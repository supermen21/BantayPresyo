<?php include('head.html'); ?>
<?php include('session.php');?>
<body>  
<?php include('sidebar.php');?>
<?php include('menu.php');?>
<?php 
if(isset($_POST['submit'])) {

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
            if(!empty($respone)){
                //  $dbConn->query('INSERT INTO tbl_prices (DATE_TODAY, MARKET_LOCATION, COMMODITY, CATEGORY, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');
               $dbConn->query('INSERT INTO tbl_nw_prices (DATE, MARKET_CODE, COMMODITY_CODE, CATEGORY_CODE, RESP_1,RESP_2,RESP_3,RESP_4,RESP_5) VALUES ("' . $date . '", "' . $market . '", "' . $comm . '", "' . $cat . '", "' . $respone . '", "' . $resptwo . '", "' . $resptri . '", "' . $resppor . '", "' . $respfive . '") ');          
             }
}
}
?>
<style>
  

.clickme {
    background-color: #eee;
    border-radius: 4px;
    color: #666;
    display: block;
    margin-bottom: 5px;
    padding: 5px 10px;
    text-decoration: none;
}

.clickme:hover {
    text-decoration: underline;
}

.box {
    background-color: #ccc;
    border-radius: 4px;
    color: #333;
    margin: 5px 0;
    padding: 5px 10px;
    width: auto;
}

</style>


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
         
                  <!-- START -->
                  <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#"  class="" role="button" style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                               <b> R I C E </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div class="">
                        <div class="form-row">                  
                        <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="44" hidden=""/>
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
                    
                            <div class="col-lg-12 mt-2">
                                <h6 class="ml-4 text-gray-800"><b>COMMERCIAL (IMPORTED)</b></h6>
                            </div>   
                        </div> 
                        
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="2" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="1" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="3" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="1" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="4" hidden=""/>
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
                       
                    
                            <div class="col-lg-12 mt-2">
                                <h6 class="ml-4 text-gray-800"><b>COMMERCIAL (LOCAL)</b></h6>
                            </div>   
                  
                        
                     
                        <div class="form-row">    
                           <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">Regular Milled 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="2" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="6" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="5" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="7" hidden=""/>
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
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="8" hidden=""/>
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
                   <!--end burger  -->
                </div>
                <!-- END --> 

                <!--START FISH  -->
                <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#" onclick="myFunction(this)" id="hamburger" role="button" class="     " style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                            <b> F I S H </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div class="">
                        <!-- BANGUS form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BANGUS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="10" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BANGUS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BANGUS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BANGUS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BANGUS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end BANGUS form-row -->
                            <!-- TILAPIA form-row -->
                            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TILAPIA 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="13" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TILAPIA 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TILAPIA 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TILAPIA 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TILAPIA 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end TILAPIA form-row -->
                        <!-- GALUNGGONG (LOCAL) form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (LOCAL) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="12" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (LOCAL) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (LOCAL) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (LOCAL) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (LOCAL) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end GALUNGGONG (LOCAL) form-row -->
                        <!-- GALUNGGONG (IMPORTED) form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (IMPORTED) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="11" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (IMPORTED) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (IMPORTED) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (IMPORTED) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">GALUNGGONG (IMPORTED) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end GALUNGGONG (IMPORTED) form-row -->
                        <!-- ALUMAHAN form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ALUMAHAN 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="3" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="9" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ALUMAHAN 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ALUMAHAN 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ALUMAHAN 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ALUMAHAN 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end ALUMAHAN form-row -->
                    </div>
                    <!-- end burger -->
                </div>    
                <!-- END FISH -->
                <!--START MEAT AND POULTRY  -->
                <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#" onclick="myFunction(this)" id="hamburger" role="button" class=" hamburger" style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                            <b> MEAT AND POULTRY </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div id="navbar--middle">
                        <!-- BANGUS form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF RUMP 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="34" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF RUMP 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF RUMP 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF RUMP 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF RUMP 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end BEEF RUMP form-row -->
                            <!-- BEEF BRISKET form-row -->
                            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF BRISKET 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="33" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF BRISKET 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF BRISKET 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF BRISKET 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BEEF BRISKET 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end BEEF BRISKET form-row -->
                        <!-- KASIM form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KASIM 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="36" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KASIM 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KASIM 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KASIM 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KASIM 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end KASIM form-row -->
                        <!-- LIEMPO form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">LIEMPO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="37" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">LIEMPO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">LIEMPO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">LIEMPO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">LIEMPO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end LIEMPO form-row -->
                        <!-- WHOLE CHICKEN form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">WHOLE CHICKEN 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="38" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">WHOLE CHICKEN 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">WHOLE CHICKEN 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">WHOLE CHICKEN 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">WHOLE CHICKEN 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end WHOLE CHICKEN form-row -->
                         <!-- EGG form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">EGG (medium) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="7" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="35" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">EGG (medium) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">EGG (medium) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">EGG (medium) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">EGG (medium) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end EGG form-row -->
                    </div>
                    <!-- end burger -->
                </div>    
                <!-- END MEAT AND POULTRY -->      
                   <!--START LOWLAND VEGETABLES  -->
                   <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#" onclick="myFunction(this)" id="hamburger" role="button" class=" hamburger" style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                            <b> LOWLAND VEGETABLES </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div id="navbar--middle">
                        <!-- AMARGOSO form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">AMARGOSO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="26" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">AMARGOSO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">AMARGOSO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">AMARGOSO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">AMARGOSO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end AMARGOSO form-row -->
                            <!-- SITAO form-row -->
                            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SITAO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="30" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SITAO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SITAO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SITAO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SITAO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end SITAO form-row -->
                        <!-- PECHAY TAGALOG form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY TAGALOG 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="29" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY TAGALOG 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY TAGALOG 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY TAGALOG 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY TAGALOG 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end PECHAY TAGALOG form-row -->
                        <!-- KALABASA form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KALABASA 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="28" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KALABASA 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KALABASA 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KALABASA 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">KALABASA 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end KALABASA form-row -->
                        <!-- TALONG form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TALONG 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="31" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TALONG 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TALONG 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TALONG 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TALONG 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end TALONG form-row -->
                         <!-- TOMATO form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TOMATO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="6" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="32" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TOMATO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TOMATO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TOMATO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">TOMATO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end TOMATO form-row -->
                    </div>
                    <!-- end burger -->
                </div>    
                <!-- END LOWLAND VEGETABLES -->       
                <!--START HIGHLAND VEGETABLES  -->
                   <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#" onclick="myFunction(this)" id="hamburger" role="button" class=" hamburger" style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                            <b> HIGHLAND VEGETABLES </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div id="navbar--middle">
                        <!-- CABBAGE form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CABBAGE 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="20" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CABBAGE 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CABBAGE 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CABBAGE 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CABBAGE 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end CABBAGE form-row -->
                            <!-- CARROTS form-row -->
                            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="21" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end SITAO form-row -->
                        <!-- BAGUIO BEANS form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="19" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end BAGUIO BEANS form-row -->
                        <!-- PECHAY BAGUIO form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="24" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end PECHAY BAGUIO form-row -->
                        <!-- SAYOTE form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="25" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end SAYOTE form-row -->
                         <!-- HABICHUELAS form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="22" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end HABICHUELAS form-row -->
                         <!-- PATATAS form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" na3me="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="23" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end PATATAS form-row -->
                    </div>
                    <!-- end burger -->
                </div>    
                <!-- END HIGHLAND VEGETABLES -->             
                 <!--START SPICES VEGETABLES  -->
                 <div  class="form-row mt-3 border">
                    <div class="col-lg-12">
                        <h3 class="mb-2 text-gray-800">
                            <a href="#" onclick="myFunction(this)" id="hamburger" role="button" class=" hamburger" style="color:black;text-decoration:none;color:gray;">
                                <i style="font-size:24px;color:black;" class="ml-1 caret fas fa-caret-right"></i>
                            <b> SPICES </b>
                            </a>
                        </h3>
                    </div>
                    <!-- burger -->
                    <div id="navbar--middle">
                        <!-- ONION RED (LOCAL) form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ONION RED (LOCAL) 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="20" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ONION RED (LOCAL) 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ONION RED (LOCAL) 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ONION RED (LOCAL) 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">ONION RED (LOCAL) 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end ONION RED (LOCAL) form-row -->
                            <!-- CARROTS form-row -->
                            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="21" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">CARROTS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end SITAO form-row -->
                        <!-- BAGUIO BEANS form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="19" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">BAGUIO BEANS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end BAGUIO BEANS form-row -->
                        <!-- PECHAY BAGUIO form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="24" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PECHAY BAGUIO 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end PECHAY BAGUIO form-row -->
                        <!-- SAYOTE form-row -->
                        <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="25" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">SAYOTE 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end SAYOTE form-row -->
                         <!-- HABICHUELAS form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="22" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">HABICHUELAS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end HABICHUELAS form-row -->
                         <!-- PATATAS form-row -->
                         <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" na3me="txtCat[]" value="5" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="23" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>                
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">PATATAS 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                        </div>
                        <!-- end PATATAS form-row -->
                    </div>
                    <!-- end burger -->
                </div>    
                <!-- END HIGHLAND VEGETABLES -->          
            </div>
        
        </div>
    </div>
</div>

<button type="submit" name="submit" class="btn btn-sm btn-success ml-3 mt-2">
   <i class="fas fa-save fa-xs"></i> 
   Save
</button>
</form>

<?php include('footer.html'); ?>
</body>
<script>
// Hide all the elements in the DOM that have a class of "box"
$('.box').hide();

// Make sure all the elements with a class of "clickme" are visible and bound
// with a click event to toggle the "box" state
$('.clickme').each(function() {
    $(this).show(0).on('click', function(e) {
        // This is only needed if your using an anchor to target the "box" elements
        e.preventDefault();
        
        // Find the next "box" element in the DOM
        $(this).next('.box').slideToggle('fast');
    });
});
</script>