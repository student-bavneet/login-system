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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../partials/_sidebar.html -->
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
        <!-- partial:../partials/_navbar.html -->
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
            <div class="page-header">
              <h3 class="page-title"> Manage Users</h3>
              
            </div>
            <div class="row">
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code> -->
                    <!-- </p> -->
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> First Name </th>
                            <th> Last name </th>
                            <th> Email Address</th>
                            <th> Contact Number </th>
                            <th> Reg. Date </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql="SELECT * FROM users WHERE is_deleted=0";
                            $qry=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($qry))
                            {
                          ?>
                        <tr>
                          <td><?php echo $row['fname'] ?></td>
                          <td><?php echo $row['lname'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['contact_no'] ?></td>
                          <td><?php echo $row['posting_date'] ?></td>
                          <td>
                            <a href="edit_user.php?edit_user=<?php echo $row['id'] ?>" class="btn btn-primary"><i class=" mdi mdi-table-edit"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="delete_user.php?del_user=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="mdi mdi-delete-forever"></i></a>
                          </td>
                        </tr>
                        <?php 
                          }
                        ?>               
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> 
              
              
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>