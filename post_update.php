<?php 



//Insert to du$g_region = $_SESSION['userdata']['region'];
    include('connections/conn.php'); session_start();   
    date_default_timezone_set('Asia/Manila');
    $upload_user    = $_SESSION['id'];
    $g_n_date = date("Y-m-d");

    if( isset($_POST['SID']) && $_POST['SID']!="" )
    {
        $g_sid = $_POST['SID'];        
    }else{
        $g_sid = "";                                               
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

    if( isset($_POST['DATE_ENCODED']) && $_POST['DATE_ENCODED']!="" )
    {
        $g_encoded = $_POST['DATE_ENCODED'];        
    }else{
        $g_encoded = "";                                               
    }

    $sql = "UPDATE tbl_bp_prices SET `DATE`='$g_n_date',HIGH='$g_high',LOW='$g_low',PREVAILING='$g_prevailing',REMARKS='$g_remarks', DATE_ENCODED='$g_encoded' WHERE SID = '$g_sid'";
        //echo $sql;
      //echo $sql;

    $sql = stripcslashes($sql);

    if (!$conn->query( preg_replace('/Â–/', '-',  preg_replace('/Â±/', 'n', preg_replace('/Ã±/', 'n', $sql) ) ) ) ) {
      echo $sql;
    }

    header('Location: frm_list.php');
