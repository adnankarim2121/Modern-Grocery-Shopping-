<?php

	session_start();
	include 'DatabaseController.php';

	$email = $_POST["username"];
	$name = $_POST["fname"];
	$type = $_POST["userType"];
	$password1 = $_POST["password"];
	$password2 = $_POST["password2"];

	$_SESSION['signupEmailError'] = "";
	$_SESSION['signupNameError'] = "";
	$_SESSION['signupPass1Error'] = "";
	$_SESSION['signupPass2Error'] = "";
	$_SESSION['passwordMismatchError'] = "";
	$_SESSION['signupError'] = "";
	$invalidInputOccured = False;

// VALIDATE USER INPUTS

	if (trim($email) === "") { 
		$_SESSION['signupEmailError'] = "enter a username";
		$invalidInputOccured = True;
	}

	if (trim($name) === "") { 
		$_SESSION['signupNameError'] = "enter your name";
		$invalidInputOccured = True;
	}

	if (trim($password1) === "") { 
		$_SESSION['signupPass1Error'] = "enter a password";
		$invalidInputOccured = True;
	}

	if (trim($password2) === "") { 
		$_SESSION['signupPass2Error'] = "re-enter your password";
		$invalidInputOccured = True;
	}

	if (strcmp($password1, $password2) != 0) {
		$_SESSION['passwordMismatchError'] = "passwords do not match";
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) {
		header( 'Location:/login.php' );
		exit;
	}

	else {
		$userTypeString = "";
		if ($type == 1) { $userTypeString = "customer"; }
		if ($type == 2) { $userTypeString = "manager"; }
		if ($type == 3) { $userTypeString = "supplier"; }

		if (!createUser($email, $name, $password1, $userTypeString)) {
			$_SESSION['signupError'] = "could not create account";
		 	header( 'Location:/login.php' );
		 	exit;
		}

		else {
			$result = authenticateUser($email, $password1);
			$_SESSION['user_id'] = $result['user_id'];
 			$_SESSION['name'] = $result['name'];
 			$_SESSION['userType'] = $result['type'];

		 	if ($result['type'] === 'customer') { header( 'Location:customer/mainCustomer.php' ); }
 			else if ($result['type'] === 'manager') { header( 'Location:/manager/mainManager.php' ); }
 			else if ($result['type'] === 'supplier') { header( 'Location:/supplier/mainSupplier.php' ); }
 			//else if ($result['type'] === 'admin') { header( 'Location:/admin/mainAdmin.php' ); }
		 	exit;
		}
	}
?>