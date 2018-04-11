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

		// TODO: DEBUG
		function createUser($email, $name, $password, $userType) { 
			$con = getConnection();
			$query = "INSERT INTO user (email, name, password, type) VALUES ('".$email."','".$name."','".$password."','".$userType."')";
			$result = mysqli_query($con, $query);
			return $result;
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

		function getMarketItems($managerID) {
			$con = getConnection();
			$query = "SELECT * FROM products, Market WHERE Market.manager_id = '".$managerID."' AND Market.market_id = products.market_id";
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

		// TODO
		function getProductSuppliers($productID) {
			$con = getConnection();
			$query = "";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO
		function getSupplierProducts($supplierID) {
			$con = getConnection();
			$query = "";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO
		function updateProductQuantity($productID, $quantityAdded) {
			$con = getConnection();
			$query = "";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO: CHECK IF WORKS
		function addProduct($name, $aisle, $dept, $quantity) {
			$con = getConnection();
			$query = "INSERT INTO products (product_name, aisle_id, department_id, quantity) VALUES ('".$name."','".$aisle."', '".$dept."', '".$quantity."')";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO
		function deleteProduct($productID, $marketID) {
			$con = getConnection();
			$query = "";
			$result = mysqli_query($con, $query);
			return $result;
		}

		// TODO
		function editProductPrice($productID, $newPrice) {
			$con = getConnection();
			$query = "";
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
			$con.= getConnection();
			$query = "INSERT INTO Reviews(user_id, f_name, email, subject, message) VALUES ('".$userID."', '".$name."', '".$email."', '".$subject."', '".$message."'";
			$result = mysqli_query($con, $query);
			return $query;
		}

?>