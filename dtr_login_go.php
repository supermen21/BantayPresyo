
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Bootstrap core CSS-->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=19472395a2969da78c8a4c707e72123a">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">

  <?php include('connections/conn.php'); session_start();   


    $g_user = $_POST['INFO_USERNAME'];
    $g_pass = $_POST['INFO_PASSWORD'];
    $g_imei = $_POST['INFO_IMEI'];


    $getUser = $conn->query("SELECT * FROM tbl_user WHERE `INFO_USERNAME`  = '$g_user'"); 
    $numUser = mysqli_num_rows($getUser); 
    $rowUser = mysqli_fetch_assoc($getUser);

  ?>

  </head>
  <body>
  <div class="container-fluid">

    <?php

        if($rowUser['INFO_PASSWORD'] == $g_pass){
            $g_id = $rowUser['ID'];
            $getUser = $conn->query("UPDATE tbl_user SET INFO_IMEI = '$g_imei' WHERE `id`  = '$g_id'"); 
            $_SESSION['id'] = $rowUser['USERID'];
            header('Location: mindex.php');
        
        }
        else
        {

            header('Location: dtr_login.php?err=1');

        }


    ?>

            
  </div>

</body>

</html>