
<?php include 'logo.php' ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testproject2";  

 //Creating connection with the database 
 $connection = new mysqli($servername, $username, $password, $database);

 // Check connection
 if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
 }
 
 

$name = "";
$email =  "";
$phone = "";
$address = "";
$existingImage = ""; // Variable to store existing image name
$nationality = "";

$errorMessage = "";
$successMessage = "";

//lets see if data has been trasmitted using post method
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    //$image = $_FILES["uploadfile"]["name"];
    $image = "";
    $nationality = $_POST["nationality"];

    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Phone: $phone <br>";
    echo "Address: $address <br>";
    echo "Address: $nationality <br>";
    

    // Check if the "uploadfile" index is set in the $_FILES array
    if (isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] == 0) {
        $image = $_FILES["uploadfile"]["name"];
        echo "File Name: " . $image . "<br>";
    }
    

    do{
        if(empty($image) || empty($name) || empty($email) || empty($phone) || empty($address) || empty($image) || empty($nationality)){
            $errorMessage = "All the Fields are required";
            exit;
    }
        // Insert new customer into the db
            $sql = "INSERT INTO `testproject2`.`custo` (cust_image,name, email, phone, address) " .
            "VALUES ('$image', '$name', '$email', '$phone', '$address', '$nationality')";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid Query: " . $connection->error;
                // Print or log the error message
            } else {
                // Successfully inserted the new customer
                $successMessage = "New customer added successfully!";
            }





        $name = "";
        $email =  "";
        $phone = "";
        $address = "";

        $successMessage = "Client added correctly";

        header("location: index.php");
        exit;
                
    }   while  (false);
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Customers</h2>

        <?php 
            if(!empty($errorMessage)){      
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btm-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";  
            }
        ?>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div>
                <div class="row mb-3" >
                    <label class="col sm-3 col-form-label">Upload New Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="uploadfile">
                        <!-- Display the existing image -->
                        <?php if (!empty($existingImage)) : ?>
                            <div>Existing Image: <?php echo $existingImage; ?></div>
                            <img src="images/<?php echo $existingImage; ?>" alt="Existing Image" height="100px" width="100px">
                        <?php endif; ?>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col sm-3 col-form-label"> Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col sm-3 col-form-label"> Email </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col sm-3 col-form-label"> Phone Number </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div> 
                </div>

                <div class="row mb-3">
                    <label class="col sm-3 col-form-label"> Address </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"> Nationality </label>
                    <div class="col-sm-6 form-check">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="nationality" id="indian" value="Indian" <?php echo ($nationality == 'Indian') ? "checked" : ""; ?>>
                            <label class="form-check-label" for="indian"> Indian </label>
                            
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="nationality" id="non-indian" value="Non-Indian" <?php echo ($nationality == 'Non-Indian') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="non-indian"> Non-Indian </label>
                        </div>
                    </div>
                </div>
            </div>

            <?php  
                if(!empty($successMessage)){
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
                    <button type="submit" class="btn btn-primary">Submit</button> <br>
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>