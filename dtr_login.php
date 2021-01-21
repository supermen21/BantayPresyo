<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">


  <?php include('connections/conn.php'); session_start();   

    if(isset($_GET['imei'])){ $g_imei = $_GET['imei']; }else{ $g_imei = ""; }
    

    $getUser = $conn->query("SELECT * FROM tbl_user WHERE `INFO_IMEI`  = '$g_imei'"); 
    $numUser = mysqli_num_rows($getUser); 
    $rowUser = mysqli_fetch_assoc($getUser);

    if(isset($_SESSION['id'])){

    ?>

      <br>
      <center>
        <h5>Welcome Back!</h5>
      <br>

    <?php
    
    }else{

    ?>
    <br>
    <center>
      <img src="assets/img/logo.png" style="width: 300px;" class="img-fluid">
      <h5>Welcome New User!</h5>
      <p>You phone is currently not logged in. kindly fill-in your credentials to continue.</p>
    </center>
      <form action="dtr_login_go.php" method="post">
      <input type="hidden" name="INFO_IMEI" value="<?php echo $g_imei; ?>">

      <div class="form-group row">
        <small>
          <label class="col-sm-4 control-label"><b>Username: </b></label>
        </small>
        <div class="col-sm-8">
          <input type="text" class="form-control input-sm col-sm-8" name="INFO_USERNAME">
        </div>
      </div>

      <div class="form-group row">
        <small>
          <label class="col-sm-4 control-label"><b>Password: </b></label>
        </small>
        <div class="col-sm-8">
          <input type="password" class="form-control input-sm col-sm-8" name="INFO_PASSWORD">
        </div>
      </div>
      <?php if( isset($_GET['err']) ){ ?> 
      <div class="form-group row">
        <div class="col-sm-12">
          <span>Invalid username or password.</span>
        </div>
      </div>
      <?php } ?>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-icon btn-primary btn-xs mr-1 col-sm-12">
        </div>
      </div>

      </form>

    <?php
    }   
    ?>

            
  </div>

</body>

</html>