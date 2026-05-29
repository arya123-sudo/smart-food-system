<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}

if(isset($_POST['add_food']))
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO FOOD_ITEM
            (name, category, quantity, unit, expiry_date)
            VALUES
            ('$name','$category','$quantity','$unit','$expiry_date')";

    if(mysqli_query($conn, $sql))
    {
        echo "Food Item Added Successfully";
    }
    else
    {
        echo "Error";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Food Item</title>
</head>
<body>
    <div class="navbar">

<a href="dashboard.php">Dashboard</a>

<a href="add_food.php">Add Food</a>

<a href="inventory.php">Inventory</a>

<a href="expiry_alert.php">Expiry Alerts</a>

<a href="waste_log.php">Waste Log</a>

<a href="analytics.php">Analytics</a>

<a href="logout.php">Logout</a>

</div>

<div class="container">

<h2>Add Food Item</h2>

<form method="POST">

    <input type="text"
           name="name"
           placeholder="Food Name"
           required>

    <br><br>

    <input type="text"
           name="category"
           placeholder="Category"
           required>

    <br><br>

    <input type="number"
           step="0.01"
           name="quantity"
           placeholder="Quantity"
           required>

    <br><br>

    <input type="text"
           name="unit"
           placeholder="Unit (kg/litre)"
           required>

    <br><br>

    <input type="date"
           name="expiry_date"
           required>

    <br><br>

    <button type="submit"
            name="add_food">
        Add Food
    </button>

</form>

</body>
</html>