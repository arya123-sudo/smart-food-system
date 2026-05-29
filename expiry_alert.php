<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}

$sql = "SELECT *
        FROM FOOD_ITEM
        WHERE expiry_date <= DATE_ADD(CURDATE(), INTERVAL 3 DAY)";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Expiry Alerts</title>
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

<h2>Expiry Alerts</h2>

<table border="1" cellpadding="10">

<tr>

    <th>ID</th>
    <th>Food Name</th>
    <th>Category</th>
    <th>Expiry Date</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td>
<?php echo $row['item_id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['category']; ?>
</td>

<td>
<?php echo $row['expiry_date']; ?>
</td>

</tr>

<?php
}
?>

</table>

</body>
</html>