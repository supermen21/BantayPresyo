<?php 



//Insert to du$g_region = $_SESSION['userdata']['region'];
    include('connections/conn.php'); session_start();   
    date_default_timezone_set('Asia/Manila');
    $upload_user    = $_SESSION['id'];
    $g_n_date = date("Y-m-d");
    //$g_n_date = date("Y-m-d H:i:s");

    if( isset($_POST['MARKET_CODE']) && $_POST['MARKET_CODE']!="" )
    {
        $g_market = $_POST['MARKET_CODE'];        
    }else{
        $g_market = "";                                               
    }

    if( isset($_POST['CATEGORY_CODE']) && $_POST['CATEGORY_CODE']!="" )
    {
        $g_category = $_POST['CATEGORY_CODE'];        
    }else{
        $g_category = "";                                               
    }

    if( isset($_POST['COMMODITY_CODE']) && $_POST['COMMODITY_CODE']!="" )
    {
        $g_commodity = $_POST['COMMODITY_CODE'];        
    }else{
        $g_commodity = "";                                               
    }

    if( isset($_POST['UNIT']) && $_POST['UNIT']!="" )
    {
        $g_unit = $_POST['UNIT'];        
    }else{
        $g_unit = "";                                               
    }

    if( isset($_POST['HIGH']) && $_POST['HIGH']!="" )
    {
        $g_high = $_POST['HIGH'];        
    }else{
        $g_high = "";                                               
    }

    if( isset($_POST['LOW']) && $_POST['LOW']!="" )
    {
        $g_low = $_POST['LOW'];        
    }else{
        $g_low = "";                                               
    }

    if( isset($_POST['PREVAILING']) && $_POST['PREVAILING']!="" )
    {
        $g_prevailing = $_POST['PREVAILING'];        
    }else{
        $g_prevailing = "";                                               
    }

    if( isset($_POST['REMARKS']) && $_POST['REMARKS']!="" )
    {
        $g_remarks = $_POST['REMARKS'];        
    }else{
        $g_remarks = "";                                               
    }
    if( isset($_POST['DATE_DATA']) && $_POST['DATE_DATA']!="" )
    {
        $g_date = $_POST['DATE_DATA'];        
    }else{
        $g_date = "";                                               
    }

    $sql = 'INSERT INTO tbl_bp_prices (`DATE`,MARKET_CODE,COMMODITY_CODE,CATEGORY_CODE,UNIT,HIGH,LOW,PREVAILING,REMARKS,ENCODER,DATE_ENCODED) VALUES ("' .$g_date.'","'.utf8_decode(trim($g_market)).'","'.utf8_decode(trim($g_commodity)).'","'.utf8_decode(trim($g_category)).'","'.utf8_decode(trim($g_unit)).'","'.utf8_decode(trim($g_high)).'","'.utf8_decode(trim($g_low)).'","'.utf8_decode(trim($g_prevailing)).'","'.utf8_decode(trim($g_remarks)).'","'.utf8_decode(trim($upload_user)).'","'.utf8_decode(trim($g_n_date)).'")';

      //echo $sql;

    $sql = stripcslashes($sql);

    if (!$conn->query( preg_replace('/Â–/', '-',  preg_replace('/Â±/', 'n', preg_replace('/Ã±/', 'n', $sql) ) ) ) ) {
      echo $sql;
    }

    header('Location: mindex.php');
