<?php

include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM FOOD_ITEM
        WHERE item_id='$id'";

mysqli_query($conn, $sql);

header("Location: inventory.php");

?>