<?php

require "config.php";

if(isset($_POST['register']))
{
    extract($_POST);

    $sql="SELECT id FROM users WHERE email='$email'";
    $qry=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($qry);
    if($count>0)
    {
        echo "<script>alert('email already exist')</script>";
    }
    else
    {
        $hashed_pass=password_hash($password,PASSWORD_DEFAULT);
        $insert="INSERT INTO users(fname,lname,email,contact_no,password) VALUES('$fname','$lname','$email','$contact_no','$hashed_pass')";
        $qry2=mysqli_query($conn,$insert);
        if($qry2)
        {
            echo "<script>alert('registered successfully')</script>";
            // echo "<script>window.location.href='login.php';</script>";
        }
        else
        {
            echo "<script>alert('unable to register')</script>";
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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <script>
        function validatePassword()
        {
            var Password = document.getElementById("Password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            if(Password != confirmPassword)
            {
                document.getElementById('error').innerHTML = "Password does not match with Confirm Password";
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="post" onsubmit="return validatePassword()">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" name="contact_no" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control p_input" id="Password">
                  </div>
                  <p class="card-description text-danger" id="error"></p>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="c_password" class="form-control p_input" id="confirmPassword">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-end">
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="register" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms"><a href="index.php"> Back To Home Page</a></p>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>