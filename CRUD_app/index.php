<?php include 'logo.php' ?>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "testproject2";

// Creating connection with the database 
$connection = new mysqli($servername, $username, $password, $database);

// Checking the connection
if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}
$sql = "";
// Read all rows from db
$sql = "SELECT * FROM `testproject2`.`custo`";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid Query: " . $connection->error);
}

// Retrieve the image parameter from the URL
$existingImage = isset($_GET['image']) ? $_GET['image'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Customers</h2>
        <a class="btn btn-primary" href="create.php" role="button"> New Customer</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Nationality</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "testproject2";  

                // Creating connection with the database 
                $connection = new mysqli($servername, $username, $password, $database);

                // Checking the connection
                if ($connection->connect_error) {
                    die("Connection Failed: " . $connection->connect_error);
                }

                // Read all rows from db
                $sql = "SELECT * FROM `testproject2`.`custo`";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query: " . $connection->error);
                }

                // Reading data of each row
                while ($row = $result->fetch_assoc()) {
                    // Use isset to check if "image" index is defined
                    $displayImage = isset($row['image']) ? $row['image'] : "No Image";
                
                    $displayName = !empty($row['name']) ? $row['name'] : "No Name";
                
                    // Echo - allows us to print table from HTML
                    // Display the image for each row
                    echo "<tr>
                    <td>$row[id]</td>
                    <td><img src='$row[cust_image]' height='100px' width='100px'></td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[nationality]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-primary btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
