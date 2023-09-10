<?php

require "../config.php";
session_start();
if(isset($_SESSION['login_status']))
{
    header('location:dashboard.php'); 
}

if(isset($_POST['a_login']))
{
    extract($_POST);
    $sql="SELECT * FROM admin WHERE a_username='$a_username' and a_password='$a_password'";
    $qry=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($qry);
    if($count>0)
    {
        $row=mysqli_fetch_array($qry);
        $_SESSION['login_status']=true;
        $_SESSION['a_id']=$row['a_id'];
        $_SESSION['a_username']=$row['a_username'];
        echo "<script>alert('login successful')</script>";
        echo "<script>window.location.href='dashboard.php';</script>";
    }
    else
    {
        echo "<script>alert('Invalid login details')</script>";
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Admin Login</h3>
                <form method="post">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="a_username" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="a_password" class="form-control p_input">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-end">
    
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="a_login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  
                  <p class="terms"><a href="../index.php"> Back To Home Page</a></p>

                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
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
  </body>
</html>