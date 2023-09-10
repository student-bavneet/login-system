<?php

require "../config.php";
require "check_login.php";
$del=$_GET['del_user'];
$delete="UPDATE users SET is_deleted=1 WHERE id='$del'";
$qry=mysqli_query($conn,$delete);
if($qry)
{
    echo "<script>alert('delete successful')</script>";
    echo "<script>window.location.href='manage_users.php';</script>";
}
else
{
    echo "<script>alert('unable to delete the user')</script>";
    echo "<script>window.location.href='manage_users.php';</script>";
}






?>