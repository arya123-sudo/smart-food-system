<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
}

if(isset($_POST['add_waste']))
{
    $item_id = $_POST['item_id'];
    $quantity_wasted = $_POST['quantity_wasted'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO WASTE_LOG
            (item_id, quantity_wasted, reason)
            VALUES
            ('$item_id','$quantity_wasted','$reason')";

    if(mysqli_query($conn, $sql))
    {
        echo "Waste Logged Successfully";
    }
    else
    {
        echo "Error";
    }
}

$items = mysqli_query($conn,
         "SELECT * FROM FOOD_ITEM");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Waste Log</title>
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

<h2>Waste Log System</h2>

<form method="POST">

<select name="item_id" required>

<option value="">
Select Food Item
</option>

<?php

while($row = mysqli_fetch_assoc($items))
{
?>

<option value="<?php echo $row['item_id']; ?>">

<?php echo $row['name']; ?>

</option>

<?php
}
?>

</select>

<br><br>

<input type="number"
       step="0.01"
       name="quantity_wasted"
       placeholder="Quantity Wasted"
       required>

<br><br>

<input type="text"
       name="reason"
       placeholder="Reason"
       required>

<br><br>

<button type="submit"
        name="add_waste">

Log Waste

</button>

</form>

</body>
</html>