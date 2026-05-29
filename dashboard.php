<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}

$total_food = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM FOOD_ITEM")
);

$expiry_count = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM FOOD_ITEM
     WHERE expiry_date <= DATE_ADD(CURDATE(), INTERVAL 3 DAY)")
);

?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="style.css">

<title>Dashboard</title>

<style>

body{
    font-family: Arial;
}

.card{
    width: 250px;
    padding: 20px;
    margin: 20px;
    background: lightgreen;
    display: inline-block;
    border-radius: 10px;
}

a{
    text-decoration: none;
}

</style>

</head>
<link rel="stylesheet" href="style.css">
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

<h1>Smart Food Intelligence System</h1>

<h3>
Welcome
<?php echo $_SESSION['email']; ?>
</h3>

<div class="card">

<h2>Total Food Items</h2>

<h1>
<?php echo $total_food; ?>
</h1>

</div>

<div class="card">

<h2>Expiry Alerts</h2>

<h1>
<?php echo $expiry_count; ?>
</h1>

</div>

<br><br>

<a href="add_food.php">Add Food</a>

<br><br>

<a href="inventory.php">View Inventory</a>

<br><br>

<a href="expiry_alert.php">Expiry Alerts</a>

<br><br>

<a href="logout.php">Logout</a>

</body>
</html>