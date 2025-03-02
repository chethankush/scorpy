<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db_connect.php';

// Check if data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Persons (lastname, firstname, address, city) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $lastname, $firstname, $address, $city);

    // Execute and confirm insertion
    if ($stmt->execute()) {
        // Redirect back to the form after successful insertion
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
