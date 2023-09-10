<?php

require "config.php";
require "check_login.php";

// handle password change form submission
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id=$_SESSION['id'];
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];

    // validate old password
    $sql="SELECT password FROM users WHERE id = $id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    if(!password_verify($currentPassword,$row['password']))
    {
      echo "<script>alert('current password is incorrect')</script>";
      echo "<script>window.location.href='change_password.php';</script>";
    }
    else
    {
            // update password
            $hashed_pass=password_hash($newPassword,PASSWORD_DEFAULT);
            $update_sql="UPDATE users SET password='$hashed_pass' WHERE id=$id";
            $qry=mysqli_query($conn,$update_sql);
            if($qry)
            {
              echo "<script>alert('update successful')</script>";
              echo "<script>window.location.href='change_password.php';</script>";
            }
            else{
              echo "<script>alert('Unable to update password')</script>";
              echo "<script>window.location.href='change_password.php';</script>";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management System with Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <script>
        function validatePassword()
        {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            if(newPassword != confirmPassword)
            {
                document.getElementById('error').innerHTML = "New Password does not match with Confirm Password";
                return false;
            }
            else
            {
                document.getElementById('error').innerHTML = "";
                return true;
            }
        }
    </script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-white" href="index.php" style="text-decoration: none;">USER PANEL</a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><h1 class="text-white">UP</h1></a>
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
            <a class="nav-link" href="view_profile.php">
              <span class="menu-icon">
                <i class="mdi mdi-face-profile"></i>
              </span>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="change_password.php">
              <span class="menu-icon">
                <i class="mdi mdi-key-change"></i>
              </span>
              <span class="menu-title">Change Password</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="log_out.php">
              <span class="menu-icon">
                <i class="mdi mdi-logout"></i>
              </span>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></p>
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
              <h3 class="page-title"> Change Password</h3>
            </div>
            <div class="row">
             
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title text-danger" id="error"></h4>
                    <form method="post"  onsubmit="return validatePassword()" class="forms-sample" >
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="currentPassword" placeholder="Current Password" name="currentPassword">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="newPassword" placeholder="New Password" name="newPassword">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword">
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary" name="change" value="Change">
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>