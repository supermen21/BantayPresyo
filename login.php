<!DOCTYPE html>
<html lang="en">
<?php
  require_once('config/database_connection.php');
  include('head.html'); 
?> 

<?php
// SUBMIT - CREDENTIALS
if(isset($_POST['btnLogin'])){
	// POST VALUES FROM LOGIN FORM
		$dataUsername = $_POST['username'];
		$dataPassword = $_POST['password'];
	// CHECK DATABASE FOR USER CREDENTIALS
		$getUserLogin = $dbConn->query("SELECT * FROM tbl_user WHERE INFO_USERNAME='$dataUsername' AND INFO_PASSWORD ='$dataPassword' AND INFO_STATUS ='ACTIVE'");
		$cntUserLogin = mysqli_num_rows($getUserLogin);
	// CHECK IF USER EXIST
		if($cntUserLogin!=0){
			session_start();
			$_SESSION['sess_user'] = $dataUsername;
			// header('Location:tbl_profca.php');
      echo "<script>window.location.href='add_MM_prices.php'</script>";
		}
		else{
			$prompt = "Incorrect Username and/or Password";
      header('Location:index.php?warning=1');
      // echo '<script>alert("Incorrect Username and/or Password")</script>';
		}	
}
?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>  
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                   
                    <button class="btn btn-primary btn-user btn-block w-100 " name="btnLogin" value="btnLogin">Login
                    </button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
