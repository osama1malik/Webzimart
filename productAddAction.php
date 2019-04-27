<?php
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['name'])
        && isset($_POST['category'])
        && isset($_POST['price'])
        && isset($_POST['quantity'])
        && isset($_POST['description'])
        && isset($_POST['fileToUpload'])
    ) {

        $name = $_POST['name'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $date = date("Y-m-d");

        // $target_dir = "uploads/";
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // // Check if image file is a actual image or fake image
        // if (isset($_POST["submit"])) {
        //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //     if ($check !== false) {
        //         echo "File is an image - " . $check["mime"] . ".";
        //         $uploadOk = 1;
        //     } else {
        //         echo "File is not an image.";
        //         $uploadOk = 0;
        //     }
        // }
        // // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
        // // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        //     echo "Sorry, your file was not uploaded.";
        //     // if everything is ok, try to upload file
        // } else {
        //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //         echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        //     } else {
        //         echo "Sorry, there was an error uploading your file.";
        //     }
        // }
        $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
        if (mysqli_connect_error()) {
            die(mysqli_connect_error());
        }
        $target_file = "Will set this error later";
        $sql = "INSERT INTO productinformation (productName, productCategoryId , productDescription , productImage , productQuantity, productPrice, dateAdded)
                    VALUES ('$name', '$category', '$description' ,  '$target_file', '$quantity', '$price',  '$date' )";
        mysqli_query($connection, $sql);
        if (mysqli_error($connection)) {
            die("Something went wrong! Check your Database");
        }
        mysqli_close($connection);
    }
}
header("Location: addProduct.php"); /* Redirect browser */
exit();
