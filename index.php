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
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    } else { }

    ?>
    <div class="body">
        <?php include("side-bar.php") ?>
        <div class="main-content">
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
                    <p class="block-title-text"> Shirts </p>
                </div>
                <div class="products-area">

                    <?php
                    $sql = "SELECT productName, productPrice, productImage, productCategoryId FROM productinformation WHERE productCategoryId=1 ORDER BY dateAdded";
                    $result = mysqli_query($connection, $sql);
                    $select = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $select .= '<div class="product">';
                        $select .= '<a href="./shirt-detail-1.php">';
                        $select .= '<img src=".'. $row['productImage'] .'" class="product-image" alt="Shirt"><br>';
                        $select .= '<span>' . $row['productName'] . '</span><br>';
                        $select .= '<span> Rs. ' . $row['productPrice'] . '</span><br>';
                        $select .= '</a></div>';
                    }
                    echo $select;
                    ?>
                </div>
            </div>
            <div class="products-block">
                <div class="block-title">
                    <p class="block-title-text"> Pents </p>
                </div>
                <div class="products-area">
                    <?php
                    $sql = "SELECT productName, productPrice, productImage, productCategoryId FROM productinformation WHERE productCategoryId=2 ORDER BY dateAdded";
                    $result = mysqli_query($connection, $sql);
                    $select = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $select .= '<div class="product">';
                        $select .= '<a href="./shirt-detail-1.php">';
                        $select .= '<img src=".'. $row['productImage'] .'" class="product-image" alt="Shirt"><br>';
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