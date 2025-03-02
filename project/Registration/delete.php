<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db_connect.php';

// Check if a record ID was selected
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = $_POST["delete_id"];

    // Prepare delete query
    $stmt = $conn->prepare("DELETE FROM Persons WHERE PersonID = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Redirect back with success message
        header("Location: show_data.php?deleted=1");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
