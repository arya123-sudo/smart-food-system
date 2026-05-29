<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "smart_food_db",
    3307
);

if(!$conn){
    die("Connection Failed");
}

?>