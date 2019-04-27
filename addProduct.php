<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include("header.php");
    include_once("connection.php");
    $connection =  mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    } else { }
    ?>
    <div class="body">
        <div class="container col-md-5">
            <form action="productAddAction.php" method="post">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                </div>
                <!-- display category dropdown -->
                <div class="form-group">
                    <label for="category">Product Category</label>
                    <?php
                    $sql = "SELECT * FROM productcategory";
                    $result = mysqli_query($connection, $sql);
                    $select = '<select class="form-control" name="category"> placeholder="Select Category"';
                    $select .= '<option value="" disabled selected> Select Category </option>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $select .= '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                    }
                    $select .= '</select>';
                    echo $select;
                    ?>
                </div>
                <div class="form-group">
                    <label for="price"> Price </label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Rs. 2000">
                </div>
                <div class="form-group">
                    <label for="quantity"> Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="10">
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea name="description" class="form-control" id="description" rows="5" col="10" placeholder="Enter Descrpition for your product here"> </textarea>
                </div>
                <label for="fileToUpload">Product Image</label>
                <div class="form-group">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <!-- <input type="file" name="productImage" class="custom-file-input" id="productImage" aria-describedby="inputGroupFileAddon01"> -->
                    <!-- <label class="custom-file-label" for="productImage">Choose file</label> -->
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>

</html>