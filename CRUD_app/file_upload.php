<?php 


//print_r($_FILES["uploadfile"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] == 0){

        //check if file has been selected
        if(!empty($_FILES["uploadfile"]["name"])){
            $filename =  $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];

            $folder = "images/" . $filename;
            //echo $folder;

            //moving file from temporary location to image folder
            if(move_uploaded_file($tempname, $folder)){
            echo"<img src='$folder' height='100px' width='100px'>";
            }
            else{
            echo "No file chosen. Please select a file.";
            }
        }
        else{
            echo "No file chosen. Please select a file";
        }
    }
    else{
        echo "File upload failed. Please check your file and try again";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile"> <br> <br>
        <input type="submit" name="submit" id="fileInput" value="Upload File">
    </form>

    <script>
        document.getElementById("fileInput").addEventListener("change", function() {
            var input = this;
            var imagePreview = document.getElementById("imagePreview");

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.src = "";
                imagePreview.style.display = "none";
            }
        });

        // Disable the submit button until a file is chosen
        document.getElementById("fileInput").addEventListener("change", function() {
            document.getElementById("fileInput").disabled = false;
        });
    </script>

</body>

</html>