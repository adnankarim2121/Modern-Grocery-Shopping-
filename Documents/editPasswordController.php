<?php

session_start();
include 'DatabaseController.php';

$newPass1 = $_POST["newPass1"];
$newPass2 = $_POST["newPass2"];

$_SESSION['editPasswordError1'] = "";
$_SESSION['editPasswordError2'] = "";
$_SESSION['passwordMismatchError'] = "";
$_SESSION['changePasswordError'] = "";
$invalidInputOccured = False;

// VALIDATE INPUTS

	if (trim($newPass1) === "") { 
		$_SESSION['editPasswordError1'] = "enter the new password"; 
		$invalidInputOccured = True;
	}

	if (trim($newPass2) === "") { 
		$_SESSION['editPasswordError2'] = "re-enter the new password"; 
		$invalidInputOccured = True;
	}

	if (($newPass1 != $newPass2)) {
		$_SESSION['passwordMismatchError'] = "passwords do not match";
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) {
		header('Location:/editUserInfo.php');
		exit;
	}

if (!$invalidInputOccured) {
	$result = updatePassword($_SESSION['user_id'], $newPass1);
	
	if ($result) {
		$_SESSION['changePasswordError'] = "changed password successfully";
	}
	else {
		$_SESSION['changePasswordError'] = "could not change password";
	}

	header('Location:/editUserInfo.php');
	exit;
}

?>