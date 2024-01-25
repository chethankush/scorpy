<?php
$servername = "localhost";
$username = "chethan";
$password = "chethan123";
$dbname = "testdb";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get values from the form
/*$loginID = "chethan";
$password = "chethan123";*/
$loginID = $_POST["name"];
$password = $_POST["email"];

$sql = "INSERT INTO users (loginID, password)
VALUES ('$loginID', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
