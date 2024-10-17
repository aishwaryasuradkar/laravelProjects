<?php include 'logo.php'; ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "testproject2";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email =  "";
$phone = "";
$address = "";
$targetFile = "";
$nationality = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location:index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM testproject2.custo WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
    
    $existingImage = "images/" . basename($row["cust_image"]);
} 
else {
    $id = $_POST["id"];
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : "";

    if (isset($_FILES['uploadfile']) && $_FILES['uploadfile']['error'] == 0) {
        $targetFile = "images/" . uniqid() . basename($_FILES["uploadfile"]["name"]);

        if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $targetFile)) {
            // Handle file upload success
        } else {
            echo "Move uploaded file failed with error code: " . $_FILES["uploadfile"]["error"] . "<br>";
        }
    }

    if (!empty($id)) {
        // Update existing record
        $updateQuery = "UPDATE testproject2.custo 
                        SET cust_image = ?, name = ?, email = ?, phone = ?, address = ?, nationality = ?
                        WHERE id = ?";
        $stmtUpdate = $connection->prepare($updateQuery);
        // // Debug output
        // echo "Debug Output:";
        // echo "targetFile: $targetFile, name: $name, email: $email, phone: $phone, address: $address, nationality: $nationality, id: $id";
        $stmtUpdate->bind_param("ssssssi", $targetFile, $name, $email, $phone, $address, $nationality, $id);



        $executeResult = $stmtUpdate->execute();

        if (!$executeResult) {
            $errorMessage = "Update failed: " . $stmtUpdate->error;
        } else {
            $successMessage = "Record updated successfully!";
        }
    } else {
        // Insert new record
        $insertQuery = "INSERT INTO testproject2.custo (cust_image, name, email, phone, address, nationality) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmtInsert = $connection->prepare($insertQuery);
        $stmtInsert->bind_param("ssssss", $targetFile, $name, $email, $phone, $address, $nationality);

        $executeResult = $stmtInsert->execute();

        if (!$executeResult) {
            $errorMessage = "Insert failed: " . $stmtInsert->error;
        } else {
            $successMessage = "Record inserted successfully!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Customers</h2>

        <?php 
            if (!empty($errorMessage)) {      
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btm-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";  
            }
        ?>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Upload a New Image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="uploadfile">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="nationality" id="indian" value="Indian" <?php echo ($nationality == 'Indian') ? "checked":"";?>>
                        <label class="form-check-label" for="indian"> Indian </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="nationality" id="non-indian" value="Non-Indian" <?php echo($nationality== 'Non-Indian') ? 'checked':''?>>
                        <label class="form-check-label" for="non-indian">Non-Indian</label>
                        
                    </div>
                </div>
            </div>

            <?php  
                if (!empty($successMessage)) {
                    echo "<div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
                        </div>
                    </div>
                </div>
                ";
                }
            ?>

            <div class="row mb-3">
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                    <br>
                    <a class="btn btn-outline-primary" href="index.php" role="button" >Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

<?php
$connection->close();
?>
</html>
