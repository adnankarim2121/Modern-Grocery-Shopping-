<?php

session_start();
include 'DatabaseController.php';

$newUsername1 = $_POST["newUsername1"];
$newUsername2 = $_POST["newUsername2"];

$_SESSION['editUsernameError1'] = "";
$_SESSION['editUsernameError2'] = "";
$_SESSION['editUsernameMismatchError'] = "";
$_SESSION['changeUsernameError'] = "";
$_SESSION['changedUsername'] = False;
$_SESSION['changeUsernameError'] = False;
$invalidInputOccured = False;

// VALIDATE INPUTS

	if (trim($newUsername1) === "") { 
		$_SESSION['editUsernameError1'] = "enter the new username"; 
		$invalidInputOccured = True;
	}

	if (trim($newUsername2) === "") { 
		$_SESSION['editUsernameError2'] = "re-enter the new username"; 
		$invalidInputOccured = True;
	}

	if ($newUsername1 != $newUsername2) {
		$_SESSION['editUsernameMismatchError'] = "usernames do not match";
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) {
		//$_SESSION['usernameInputErrorOccurred'] = True;
		header('Location:/editUserInfo.php');
		exit;
	}

if (!$invalidInputOccured) {
	$result = updateUsername($_SESSION['user_id'], $newUsername1);
	
	if ($result) {
		$_SESSION['changeUsernameError'] = "changed username successfully";
		$_SESSION['changedUsername'] = True;
	}
	else {
		$_SESSION['changeUsernameError'] = "could not change username";
		$_SESSION['changeUsernameError'] = True;
	}

	header('Location:/editUserInfo.php');
	exit;
}

?>