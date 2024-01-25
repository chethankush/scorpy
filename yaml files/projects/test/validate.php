<?php
$servername = "sql-service:3306";
$username = "root";
$password = "password";
$dbname = "testdb";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get values from the form
$loginID = "chethan";
$password = "chethan123";

$sql = "INSERT INTO users (loginID, password) VALUES ('$loginID', '$password')";

$result = $conn->query($sql);

// Close connection
$conn->close();


?>
