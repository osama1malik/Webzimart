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
            $category = $_GET['category'];
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }

            if (mysqli_error($connection)) {
                die("Something went wrong! Check your Database");
            }
            mysqli_close($connection);
        }
    }
    ?>
    <div class="body">
        <?php include("side-bar.php") ?>
        <div class="main-content">
            <div class="products-block">
                <div class="block-title">
                    <p class="block-title-text"> <?php echo $category ?> </p>
                </div>
                <div class="products-area">
                    <?php
                    $sql = "SELECT * FROM productinformation WHERE productCategoryId=$sid";
                    $result = mysqli_query($connection, $sql);
                    $select = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $select .= '<div class="product">';
                        $select .= '<a href="./productDetails.php?id=' . $row['id'] . '">';
                        $select .= '<img src=".' . $row['productImage'] . '" class="product-image" alt="Shirt"><br>';
                        $select .= '<span>' . $row['productName'] . '</span><br>';
                        $select .= '<span> Rs. ' . $row['productPrice'] . '</span><br>';
                        $select .= '</a></div>';
                    }
                    echo $select;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>