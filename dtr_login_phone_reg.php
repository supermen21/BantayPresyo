
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

    $g_imei = $_POST['INFO_IMEI'];
    $g_pin  = $_POST['INFO_PIN'];
    $g_id   = $_POST['INFO_ID'];

    $getUser = $conn->query("UPDATE `users` SET user_imei = '$g_imei', user_pin = '$g_pin' WHERE `id`  = '$g_id'"); 
  //  $rowUser = mysqli_fetch_assoc($getUser);

    $getDetails = $conn->query("SELECT * FROM `users` WHERE `id`  = '$g_id'"); 
    $rowDetails = mysqli_fetch_assoc($getDetails);

    $_SESSION['office'] = $rowDetails['office'];
    $_SESSION['id'] = $rowDetails['id'];

  ?>

  </head>
  <body>
  <div class="container-fluid">

    <br>
    <center>
      <h5>Congratulations!</h5>
      <br>
      <p>Your phone is now registered to our database!</p>
      <p>Kindly click the scan button to start scanning documents.</p>
    </center>
            
  </div>

</body>

</html>