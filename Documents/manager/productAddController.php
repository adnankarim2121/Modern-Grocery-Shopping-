<?php

// TODO: FIX -> DOESNT WORK

	session_start();
	include '../DatabaseController.php';

	$newProduct = $_POST["newProductName"];
	$newProductAisleID = $_POST["newProductAisleID"];
	$newProductDepartmentID = $_POST["newProductDepartmentID"];
	$newProductQuantity = $_POST["newProductQuantity"];

// VALIDATE INPUTS:

	$_SESSION['newProductNamerError'] = "";
	$_SESSION['newProductAisleIDError'] = "";
	$_SESSION['newProductDepartmentIDError'] = "";
	$_SESSION['newProductQuantityError'] = "";
	$_SESSION['addProductError'] = "";
	$invalidInputOccured = False;

	if (trim($newProduct) === "") { 
		$_SESSION['newProductNameError'] = "please enter the product's name";
		$invalidInputOccured = True;
	}

	if (trim($newProductAisleID) === "") { 
		$_SESSION['newProductAisleIDError'] = "please enter the aisle number";
		$invalidInputOccured = True;
	}

	if (trim($newProductDepartmentID) === "") { 
		$_SESSION['newProductDepartmentIDError'] = "please enter the department number";
		$invalidInputOccured = True;
	}

	if (trim($newProductQuantity) === "") { 
		$_SESSION['newProductQuantityError'] = "please enter a quantity for this product";
		$invalidInputOccured = True;
	}

	if ($invalidInputOccured) { 
		header('Location:../tryAgainManagerAdd.html');
		exit;
	}

	else {
		$managedMarket = getMarket($_SESSION['managerKey']);
		
		$data;
		while($temp = mysqli_fetch_array($managedMarket))
			{
				$data = $temp['market_id'];
									
			}
		$marketID = $data;
		if (!addProduct($newProduct, $newProductAisleID, $newProductDepartmentID, $newProductQuantity, $marketID)) {
			$_SESSION['addProductError'] = "could not add this product";

		}
		else {
			//$_SESSION['addProductError'] = "successfully added this product";
			header( 'Location:../managerAddRemoveSuccess.html' );
		}
		//header( 'Location:/manager/productInfo.php' );
		exit;
	}
?>