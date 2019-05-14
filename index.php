<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    include("header.php");
    require_once("connection.php");
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    } else { }

    ?>
    <div class="d-flex" id="wrapper">
        <?php include("side-bar.php") ?>
        <div class="container-fluid">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 1</div>
                    <img src="./images/slider-1.jpg">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">2 / 2</div>
                    <img src="./images/slider-2.jpg">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <div class="products-block">
                <div class="block-title">
                    <p class="display-4"> Shirts </p>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT id, productName, productPrice, productImage, productCategoryId FROM productinformation WHERE productCategoryId=1 ORDER BY dateAdded";
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

            <div class="products-block">
                <div class="block-title">
                    <p class="display-4"> Pents </p>
                </div>
                <div class="row">
                    <?php
                    $sql = "SELECT id, productName, productPrice, productImage, productCategoryId FROM productinformation WHERE productCategoryId=2 ORDER BY dateAdded";
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
    <?php include("footer.php"); ?>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
</body>

</html>
