<?php

	session_start();
	include 'DatabaseController.php';
	
	$email = $_POST["usernameL"];
	$password = $_POST["passwordL"];


// VALIDATE INPUTS:

	$_SESSION['usernameEmptyError'] = "";
	$_SESSION['passwordEmptyError'] = "";
	$_SESSION['loginError'] = "";
	$_SESSION['userType'] = "ds";
	$_SESSION['tabState1'] = "active gtco-first";
	$_SESSION['tabState2'] = "gtco-second";
	$_SESSION['name'] = "";
	$invalidInputOccured = False;

	if (trim($email) === "") { 
		$_SESSION['usernameEmptyError'] = "enter your username";
		$invalidInputOccured = True;
	}
	if (trim($password) === "") { 
		$_SESSION['passwordEmptyError'] = "enter your password";
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) { 
		$_SESSION['tabState1'] = "gtco-second";
		$_SESSION['tabState2'] = "active gtco-first";
		header('Location:/login.php');
		exit;
	}

 $queryUser = authenticateUser($email, $password);
 $queryUser1 = authenticateUser($email, $password);

 if (mysqli_num_rows($queryUser) == 0 ) {
 	$_SESSION['loginError'] = "username/password is incorrect";
 	header('Location:login.php');
 	exit;
 }

 else if(mysqli_num_rows($queryUser) == 1) {
 	$rowTitle = mysqli_fetch_array($queryUser1);

 	$_SESSION['user_id'] = $rowTitle['user_id'];
 	$_SESSION['name'] = $rowTitle['name'];
 	$_SESSION['userType'] = $rowTitle['type'];

 	if ($rowTitle['type'] === 'customer') { header( 'Location:customer/mainCustomer.php' ); }
 	else if ($rowTitle['type'] === 'manager') { header( 'Location:/manager/mainManager.php' ); }
 	else if ($rowTitle['type'] === 'supplier') { header( 'Location:/supplier/mainSupplier.php' ); }
 	//else if ($rowTitle['type'] === 'admin') { header( 'Location:/admin/mainAdmin.php' ); }
 	exit;
 }

?>


