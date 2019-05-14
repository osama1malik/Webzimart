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

    <div class="d-flex" id="wrapper">
        <?php include("side-bar.php") ?>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <p class="display-4"> <?php echo $category ?> </p>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM productinformation WHERE productCategoryId=$sid";
                    $result = mysqli_query($connection, $sql);
                    $select = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $select .= '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">';
                        $select .= '<a href="./productDetails.php?id=' . $row['id'] . '">';
                        $select .= '<img src=".' . $row['productImage'] . '" class="product-image rounded mx-auto d-block" alt="Shirt">';
                        $select .= '<p class="text-center text-dark">' . $row['productName'] . '</p>';
                        $select .= '<p class="text-center text-dark"> Rs. ' . $row['productPrice'] . '</p>';
                        $select .= '</a></div>';
                    }
                    echo $select;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>
    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
