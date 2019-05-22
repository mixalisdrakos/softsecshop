<?php
class SecureDB {
	private $host = "localhost";
	private $user = "user";
	private $password = "password";
	private $database = "db";
	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function fetchProducts($item){
		$query = 'SELECT * FROM products WHERE code LIKE "%' .$item. '%"';
		//$query = "SELECT * FROM products WHERE code LIKE '%" . $sku . "%'";
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$results[] = $row;
		}
		return $results;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}


}
?>
