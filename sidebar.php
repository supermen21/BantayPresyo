<?php include('head.html'); ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-bantaypresyo2 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <br>
      <a class="sidebar-brand d-flex align-items-center justify-content-center logo" href="#">
        <div class="sidebar-brand-icon " >
          <!-- <i class="fas fa-ruble-sign"></i> -->
          <img id="bp_logo" src="img/bp-logo.png" alt="bantay presyo logo">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Bantay Presyo</div> -->
      </a>
      <br>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($rowUserInfo['ACCESSLEVEL'] == 'ENCODER' || $accesslvl=='ADMINISTRATOR'){?>
      <li class="nav-item">
        <a class="nav-link" href="add_MM_prices.php">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Encode Prices</span></a>
      </li>
      <?php }?>

       <!-- Nav Item - Pages Collapse Menu -->
      <?php if($rowUserInfo['ACCESSLEVEL'] == 'ENCODER'){?>
      <li class="nav-item">
        <a class="nav-link" href="tbl_encodepermarket.php">
          <i class="fas fa-fw fa-table"></i>
          <span></span>List of Prices</a>
      </li>
      <?php }?>
      
      <?php
        $getVer = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE STATUS='For Verification' GROUP BY `DATE`");
        $cntVer = mysqli_num_rows($getVer);
       if($rowUserInfo['ACCESSLEVEL'] == 'VERIFIER' || $rowUserInfo['ACCESSLEVEL'] == 'ADMINISTRATOR'){?>
      <li class="nav-item">
        <a class="nav-link" href="frm_verifier.php">
          <i class="fas fa-fw fa-table"></i>
          <b>Verify Prices</b> <span class="badge badge-danger text-xs"><?php echo $cntVer;?></span></a>
          
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
          <i class="fas fa-fw fa-folder"></i>
          <span>Reports</span>
        </a>
        <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <?php 
            $getApp = $dbConn->query("SELECT * FROM tbl_nw_prices WHERE STATUS ='Approved' GROUP BY `DATE`");
            $cntApp = mysqli_num_rows($getApp);
            ?>
            <!-- <a class="collapse-item" href="tbl_approved.php">Approved Prices <span class="badge badge-success text-xs"><?php //echo $cntApp;?></span></a> -->
            <a class="collapse-item" href="tbl_approved_date.php">Approved Prices</a>
            <a class="collapse-item" href="tbl_bp_prices.php">High, Low and Prevailing</a>
          </div>
        </div>
      </li>
      <?php }?>
      
      <?php 
      $assignedmrkt =$rowUserInfo['ASSIGNED_MARKET'];
      $getFlag =$dbConn->query("SELECT * FROM tbl_nw_prices WHERE STATUS ='Flagged' AND ASSIGNED_MARKET = '$assignedmrkt' GROUP BY `DATE`");
      $cntFlag = mysqli_num_rows($getFlag);
      if($rowUserInfo['ACCESSLEVEL'] == 'ENCODER' || $accesslvl=='ADMINISTRATOR'){?>
        <li class="nav-item">
        <a class="nav-link" href="tbl_flagged.php">
          <i class="fas fa-fw fa-table"></i>
          <b>Flagged Prices</b> <span class="badge badge-danger text-xs"><?php echo $cntFlag;?></span></a>
          
      </li>
      <?php }?>
      <?php if($accesslvl=='ADMINISTRATOR'){?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="tbl_user.php">
          <i class="fas fa-fw fa-file"></i>
          <span>User Management</span></a>
      </li>
    <?php } ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="coll apse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
     <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> 

    </ul>
    <!-- End of Sidebar -->

  <script src="js/bp_logo.js"></script>
