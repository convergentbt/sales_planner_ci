<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dabur";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$location = "http://localhost/dabur_sa/index.php/Admin/all_products";
//echo "Connected successfully";exit;

?>
