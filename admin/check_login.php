<?php

session_start();

if (!isset($_SESSION['login_status']))
 {
	header("location:admin_login.php");
}




?>