<?php
require_once("connection.php");
$connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if (mysqli_connect_error()) {
    die(mysqli_connect_error());
} else { }
?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Categories</div>
    <div class="list-group list-group-flush">
        <?php
        $sql = "SELECT * FROM productcategory ORDER BY category";
        $result = mysqli_query($connection, $sql);
        $select = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $select .= '<a class="list-group-item list-group-item-action bg-light" href="./categoryDisplay.php?id='. $row['id'] . '&category='. $row['category'] .'">' . $row['category'] . '</a>';
        }
        echo $select;
        ?>
    </div>
</div>
