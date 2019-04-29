<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
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
    <div class="body">
        <?php include("side-bar.php"); ?>
        <div class="main-content">
            <div class="products-block">
                <div class="block-title">
                    <p class="block-title-text">
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
                <div class="products-area">
                    <div class="product-detail">
                        <img src=".<?php echo $image ?>" class="product-image" alt="Shirt">
                        <div class="product-detail-text">
                            <span class="product-detail-text-heading"><?php echo $name ?></span><br>
                            <span class="product-detail-text-price">Rs <?php echo $productPrice ?></span> <br>
                            <span class="product-detail-text-information"><?php echo $description ?></span>
                            <button class="addToCart">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>