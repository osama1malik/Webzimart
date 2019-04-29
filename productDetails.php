<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include("header.php");
    require_once("connection.php");
    $id = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_GET['id'])) {
            echo "id is not set";
            return;
        } else if (empty($_GET['id'])) {
            echo "id is empty";
            return;
        } else {
            $sid = $_GET['id'];
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }

            $sql = "SELECT * FROM productinformation WHERE id=$sid";

            $result = mysqli_query($connection, $sql);

            if (mysqli_error($connection)) {
                die("Something went wrong! Check your Database");
            }
            mysqli_close($connection);

            $row = mysqli_fetch_assoc($result);

            $name = $row['productName'];
            $categoryId = $row['productCategoryId'];
            $description = $row['productDescription'];
            $image = $row['productImage'];
            $quantity = $row['productQuantity'];
            $productPrice = $row['productPrice'];
            $productDateAdded = $row['dateAdded'];
        }
    }
    ?>
    <div class="d-flex" id="wrapper">
        <?php include("side-bar.php"); ?>
        <div class="container">
            <div class="">
                <div class="row">
                    <p class="display-4">
                        <?php
                        $sql = "SELECT category FROM productcategory WHERE id = $categoryId ORDER BY category";
                        $result = mysqli_query($connection, $sql);
                        $select = "";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $select .=  $row['category'];
                        }
                        echo $select;
                        ?>
                    </p>
                </div>
                <div class="row">
                    <div class="product-detail">
                        <img src=".<?php echo $image ?>" class="col-lg-6 rounded mx-auto d-block" alt="Shirt">
                        <div class="col-lg-12">
                            <span class="h3"><?php echo $name ?></span><br>
                            <span class="h4">Rs <?php echo $productPrice ?></span> <br>
                            <span class="lead"><?php echo $description ?></span><br>
                            <button class="btn btn-outline-secondary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
