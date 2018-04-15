<?php 
	
	static $con;

	function getConnection() {
		if (!$con) { $con = mysqli_connect("35.188.41.213","root","cpsc471","saVegan"); }
		if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
		return $con;
	}

	// LOGIN/SIGN-UP QUERIES

		function authenticateUser($email, $password) {
			$con = getConnection();
			$authenticatedUser = mysqli_query($con,"SELECT * FROM user WHERE email='".$email."' AND password='".$password."'");
			return $authenticatedUser;
		}

		function createUserCustomer($email, $name, $password, $userType, $managerKey) { 
			$con = getConnection();
			if($userType === 'customer')
			{


			$query = "INSERT INTO user (email, name, password, type, mKEY) VALUES ('".$email."','".$name."','".$password."','".$userType."', 0)";
			$result = mysqli_query($con, $query);
			return $result;

			}

			else
			{
					//$con = getConnection();
					$query1 = "SELECT * FROM Market WHERE Market.KEY = '".$managerKey."'";
					$result1 = mysqli_query($con, $query1);
					if(mysqli_num_rows($result1) == 0 )
						{
							return $result1;
						}
					$query = "INSERT INTO user (email, name, password, type, mKEY) VALUES ('".$email."','".$name."','".$password."','".$userType."',
					'".$managerKey."')";
					$result = mysqli_query($con, $query);
					return $result;
			}
		}


	// QUERIES FOR CUSTOMERS

		//TODO: function getProducts() { }

		//TODO: function getPurchasedItems() { }

		function getReceipts($customerID) {
			$con = getConnection();
			$query = "SELECT * FROM receipt where receipt.user_id='".$customerID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

	// QUERIES FOR MANAGERS

		function getAllMarketItems() {
			$con = getConnection();
			$result = mysqli_query($con, "SELECT * FROM products");
			return $result;
		}

		function getMarketItems($managerKey) {
			$con = getConnection();
			$query = "SELECT * FROM products, Market WHERE  Market.market_id = products.market_id
			AND Market.KEY ='".$managerKey."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		function getMarket($managerKey) {
			$con = getConnection();
			$query = "SELECT * FROM Market WHERE Market.KEY= '".$managerKey."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		function getSupplierList() {
			$con = getConnection();
			$query = "SELECT * FROM supplier";
			$result = mysqli_query($con, $query);
			return $result; 
		}

		function getCustomerList() {
			$con = getConnection();
			$query = "SELECT user_id, name FROM user WHERE type = 'customer'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function getProductSuppliers($productID) {
			$con = getConnection();
			$query =  "SELECT * FROM supplier, Supplied_By WHERE supplier.supplier_id = Supplied_By.supplier_id AND Supplied_By.product_id = '".$productID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function getSupplierProducts($supplierID) {
			$con = getConnection();
			$query = "SELECT * FROM products, Supplied_By WHERE Supplied_By.product_id = products.product_id AND Supplied_By.supplier_id = '".$supplierID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function updateProductQuantity($productID, $newQuantity) {
			$con = getConnection();
			$query = "UPDATE products SET quantity = '".$newQuantity."' WHERE products.product_id = '".$productID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function addProduct($name, $aisle, $dept, $quantity, $marketID) {
			$con = getConnection();
			$query = "INSERT INTO products (product_name, aisle_id, department_id, quantity, market_id) VALUES ('".$name."','".$aisle."', '".$dept."', '".$quantity."', '".$marketID."')";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function deleteProduct($productID, $marketID) {
			$con = getConnection();
			$query = "DELETE FROM products WHERE product_id = '".$productID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function editProductPrice($productID, $newPrice) {
			$con = getConnection();
			$query = "UPDATE products SET price = '".$newPrice."' WHERE products.product_id = '".$productID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

	// QUERIES FOR SUPPLIERS

		function getWarehouseItems($supplierID) {
			$con = getConnection();
			$query = "SELECT * FROM products WHERE products.product_id IN (SELECT Supplied_By.product_id FROM Supplied_By WHERE Supplied_By.supplier_id = '".$supplierID."')";
			$result = mysqli_query($con, $query);
			return $result;
		}

	// GENERAL UTILITY QUERIES

		// TODO: DEBUG
		function saveReview($userID, $name, $email, $subject, $message) {
			$con = getConnection();
			$query = "INSERT INTO Reviews(user_id, f_name, email, subject, message) VALUES ('".$userID."', '".$name."', '".$email."', '".$subject."', '".$message."')";
			$result = mysqli_query($con, $query);
			return $result;
		}


		function updateUsername($userID, $newUsername) {
			$con = getConnection();
			$query = "UPDATE user SET email = '".$newUsername."' WHERE user.user_id = '".$userID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}

		function updatePassword($userID, $newPassword) {
			$con = getConnection();
			$query = "UPDATE user SET password = '".$newPassword."' WHERE user.user_id = '".$userID."'";
			$result = mysqli_query($con, $query);
			return $result;
		}


?>