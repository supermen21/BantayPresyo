<?php 



//Insert to du$g_region = $_SESSION['userdata']['region'];
    include('connections/conn.php'); session_start();   
    date_default_timezone_set('Asia/Manila');
    $upload_user    = $_SESSION['id'];
    $g_n_date = date("Y-m-d H:i:s");

    if( isset($_GET['SID']) && $_GET['SID']!="" )
    {
        $g_sid = $_GET['SID'];        
    }else{
        $g_sid = "";                                               
    }


    $sql = "DELETE FROM tbl_bp_prices WHERE SID = '$g_sid'";

      //echo $sql;

    $sql = stripcslashes($sql);

    if (!$conn->query( preg_replace('/Â–/', '-',  preg_replace('/Â±/', 'n', preg_replace('/Ã±/', 'n', $sql) ) ) ) ) {
      echo $sql;
    }

    header('Location: frm_list.php');
