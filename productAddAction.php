<?php
    require_once("connection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['name']) 
            && isset($_POST['category']) 
            && isset($_POST['price']) 
            && isset($_POST['quantity']) 
            && isset($_POST['description']) 
            && isset($_POST['image'])) {
                $name = $_POST['name'];
                $category = $_POST['category'];
                $quantity = $_POST['quantity'];
                $description = $_POST['description'];
                $image = $_POST['image'];
                $price = $_POST['price'];
                $date = date("Y-m-d");

             $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }

            $sql = "INSERT INTO productinformation (productName, productCategoryId , productDescription , productImage , productQuantity, productPrice, dateAdded)
                    VALUES ('$name', '$category', '$description' ,  '$image', '$quantity', '$price',  '$date' )";
            mysqli_query($connection, $sql);
            if(mysqli_error($connection)) {
                // die("Something went wrong! Check your Database" . mysqli_connect_error());
            }
            mysqli_close($connection);
        }
    }
    header("Location: addProduct.php"); /* Redirect browser */
    exit();
    ?>