<?php
require_once("connection.php");
$connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if (mysqli_connect_error()) {
    die(mysqli_connect_error());
} else { }
?>
<div class="sidebar">
    <h4 class="sidebar-heading">Categories</h4>
    <ul>
        <?php
        $sql = "SELECT * FROM productcategory ORDER BY category";
        $result = mysqli_query($connection, $sql);
        $select = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $select .= '<li><a href="./categoryDisplay.php?id='. $row['id'] . '&category='. $row['category'] .'">' . $row['category'] . '</a></li>';
        }
        echo $select;
        ?>
    </ul>
</div>
<div class="clear"></div>