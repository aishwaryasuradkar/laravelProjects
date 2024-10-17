<?php include 'logo.php' ?>
<?php 
    $errorMessage = "";
    $successMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testproject2";  

    //creating a connection with the db
    $connection = new mysqli($servername, $username, $password, $database);

    //check the connection
    if($connection->connect_error){
        die("Connection Failed". $connection->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET' && ISSET($_GET['id'])){
        $id = $_GET['id'];


    
    // Prepare and execute the delete query
    $sql = "DELETE FROM `testproject2`.`custo` WHERE id = ?";
    $result = $connection->prepare($sql);

    if ($result) {
        //deletion was successful
        $successMessage = "Client Deleted Successfully";

        // Bind the parameter and execute the statement
        $result->bind_param("i", $id);
        $result->execute();
    } else {
        //deletion was failed
        $errorMessage = "Error Deleting Client";
    }

    //redirect to index.php after deletion
    // header("location: index.php");
    // exit;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <?php if(isset($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
            <?php endif; ?>


            <?php if(isset($errorMessage)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
                <?php endif; ?>

            <a class="btn btn-primary" href="index.php" role="button" style="color: #33b5fd">Back To List</a>  
    </div>
</body>
</html>