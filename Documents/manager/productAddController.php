<?php

// TODO: ERROR MESSAGES

	session_start();
	include '../DatabaseController';

	$newProduct = $_POST["newProductName"];
	$newProductAisleID = $_POST["newProductAisleID"];
	$newProductDepartmentID = $_POST["newProductDepartmentID"];
	$newProductQuantity = $_POST["newProductQuantity"];

// VALIDATE INPUTS:

	if (empty($newProduct) || empty($newProductAisleID) || empty($newProductDepartmentID)) {
		header( 'Location:/tryAgainManagerAdd.html' );
	}

	else {
		if (!addProduct($newProduct, $newProductAisleID, $newProductDepartmentID, $newProductQuantity)) {
		 	header( 'Location:/productInfo.php' );
		 	//failure message
		 	exit;
		}
		else {
			//success message
		}
		header( 'Location:/productInfo.php' );
		exit;
	}
?>