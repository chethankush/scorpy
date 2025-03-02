<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $sql = "INSERT INTO Persons (Lastname, Firstname, Address, City) VALUES ('$lastname', '$firstname', '$address', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            text-align: center;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }
        input {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #5a67d8;
        }
        .btn-secondary {
            background: #28a745;
            color: white;
        }
        .btn-secondary:hover {
            background: #218838;
        }
        .logout-btn {
                position: absolute;
                top: 10px;
                right: 20px;
                padding: 10px 15px;
                background-color: #dc3545;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
        }
        .logout-btn:hover {
                background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Person Details</h2>
    <form method="POST">
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="city" placeholder="City" required>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="show_data.php" class="btn btn-secondary">Show Data</a>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>
