<?php session_start(); ?>

<?php 
	$_SESSION['user_id'] = null;
	$_SESSION['username'] = null;
	$_SESSION['user_address'] = null;
	$_SESSION['user_phone_no'] = null;
	$_SESSION['email'] = null;
	$_SESSION['password'] = null;
	$_SESSION['user_role'] = null;
	
	header('Location:login.php');
 ?>