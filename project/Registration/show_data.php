
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

$sql = "SELECT * FROM Persons";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
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
            width: 80%;
            max-width: 900px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #667eea;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .btn {
            padding: 12px;
            margin-top: 15px;
            border-radius: 5px;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background: #c82333;
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
    <h2>Persons Data</h2>
    <form action="delete.php" method="POST">
        <table>
            <tr>
                <th>Select</th>
                <th>PersonID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Address</th>
                <th>City</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='radio' name='delete_id' value='".$row["PersonID"]."'></td>
                            <td>" . $row["PersonID"] . "</td>
                            <td>" . $row["LastName"] . "</td>
                            <td>" . $row["FirstName"] . "</td>
                            <td>" . $row["Address"] . "</td>
                            <td>" . $row["City"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found.</td></tr>";
            }
            ?>
        </table>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="index.php" class="btn btn-secondary">Back to Main Page</a>
    </form>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
