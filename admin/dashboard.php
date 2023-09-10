<?php

require "../config.php";
require "check_login.php";



?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management System with Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-white" href="index.php" style="text-decoration: none;">ADMIN PANEL</a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><h1 class="text-white">AP</h1></a>
        </div>
        <ul class="nav">
         
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-view-dashboard"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="manage_users.php">
              <span class="menu-icon">
                <i class="mdi mdi-nature-people"></i>
              </span>
              <span class="menu-title">Manage Users</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="btw_dates_report.php">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-text"></i>
              </span>
              <span class="menu-title">B/w Dates Report</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="sign_out.php">
              <span class="menu-icon">
                <i class="mdi mdi-logout"></i>
              </span>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100 pt-3">
              <li class="nav-item w-100">
              <form action="search_results.php" method="post" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search"  >
                  <div class="form-group">
                    <div class="input-group">
                      <input type="search" name="srch_res" id="" placeholder="Search User by name, email,contact no."  class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-sm btn-primary" name="search" >Search</button>
                      </div>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['a_username'] ?></p>
                  </div>
                </a>
                
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <a href="manage_users.php" style="text-decoration: none;color:white">
                  <div class="card">
                    <div class="card-body">
                      <h5>Total Registered Users</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                            $sql="SELECT * FROM users WHERE is_deleted=0";
                            $qry=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($qry);
                          ?>
                            <h2 class="mb-0"><?php echo $count ?> Users</h2>
                          </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-nature-people text-primary ml-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4 grid-margin">
                <a href="yes_reg.php" style="text-decoration: none;color:white">
                  <div class="card">
                    <div class="card-body">
                      <h5>Yesterday Registered Users</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                            $sql2="SELECT * FROM users WHERE date(posting_date)=CURRENT_DATE()-1";
                            $qry2=mysqli_query($conn,$sql2);
                            $count2=mysqli_num_rows($qry2);
                          ?>
                            <h2 class="mb-0"><?php echo $count2 ?> Users</h2>
                          </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-human-child text-primary ml-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4 grid-margin">
                <a href="last_7_days.php" style="text-decoration: none;color:white">
                  <div class="card">
                    <div class="card-body">
                      <h5>Last 7 Days Registered Users</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                            $sql3="select * from users where date(posting_date)>=now() - INTERVAL 7 day";
                            $qry3=mysqli_query($conn,$sql3);
                            $count3=mysqli_num_rows($qry3);
                          ?> 
                          <h2 class="mb-0"><?php echo $count3 ?> Users</h2>
                          </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-human-greeting text-primary ml-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-sm-4 grid-margin">
                <a href="last_30_days.php" style="text-decoration: none;color:white">
                  <div class="card">
                    <div class="card-body">
                      <h5>Last 30 Days Registered Users</h5>
                      <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                          <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <?php
                            $sql4="select * from users where date(posting_date)>=CURRENT_DATE()-30";
                            $qry4=mysqli_query($conn,$sql4);
                            $count4=mysqli_num_rows($qry4);
                          ?>  
                          <h2 class="mb-0"><?php echo $count4 ?> Users</h2>
                          </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                          <i class="icon-lg mdi mdi-human-male-female text-primary ml-auto"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © user management system <?php echo date('Y') ?></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>