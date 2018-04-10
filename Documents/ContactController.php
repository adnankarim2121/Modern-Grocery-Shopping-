<?php

session_start();
include 'DatabaseController.php';

$name = $_POST["rname"];
$email = $_POST["remail"];
$subject = $_POST["rsubject"];
$message = $_POST["rmessage"];

$_SESSION['nameError'] = "";
$_SESSION['emailError'] = "";
$_SESSION['subjectError'] = "";
$_SESSION['messageError'] = "";
$_SESSION['reviewError'] = "";
$invalidInputOccured = False;

// VALIDATE INPUTS

	if (trim($name) === "") { 
		$_SESSION['nameError'] = "please enter your name"; 
		$invalidInputOccured = True;
	}

	if (trim($email) === "") { 
		$_SESSION['emailError'] = "please enter your email"; 
		$invalidInputOccured = True;
	}

	if (trim($subject) === "") { 
		$_SESSION['subjectError'] = "please enter the subject of this review"; 
		$invalidInputOccured = True;
	}

	if (trim($message) === "") { 
		$_SESSION['messageError'] = "please enter a message"; 
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) {
		header('Location:/contact.php');
		exit;
	}

if (!$invalidInputOccured) {
	$result = saveReview($_SESSION['user_id'], $name, $email, $subject, $message);
	
	if ($result) {
		header('Location:/thankYou.php');
		exit;
	}
	else {
		$_SESSION['reviewError'] = "Could not save your review. Please try again later.";
		header('Location:/contact.php');
		exit;
	}
}

?>