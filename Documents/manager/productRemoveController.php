<?php

// TODO: FIX -> DOESNT WORK

	session_start();
	include '../DatabaseController.php';

	$productID = $_POST["removeProductID"];

// VALIDATE INPUTS:

	$_SESSION['deleteProductIDError'] = "";
	$_SESSION['deleteProductError'] = "";

	if (trim($productID) === "") {
		
		header( 'Location:../tryAgainManagerAdd.html' );
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
		if (!deleteProduct($productID, $marketID)) {
		 	header( 'Location:../tryAgainManagerRemove.html' );
		}
		else {
			header( 'Location:../managerAddRemoveSuccess.html' );
		}
		//header( 'Location:productInfo.php' );
		exit;
	}
?>