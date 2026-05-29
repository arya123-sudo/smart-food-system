<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$total_waste = mysqli_query($conn,
"SELECT SUM(quantity_wasted) AS total
 FROM WASTE_LOG");

$data = mysqli_fetch_assoc($total_waste);

$most_waste = mysqli_query($conn,

"SELECT FOOD_ITEM.name,
SUM(WASTE_LOG.quantity_wasted) AS waste

FROM WASTE_LOG

JOIN FOOD_ITEM
ON FOOD_ITEM.item_id = WASTE_LOG.item_id

GROUP BY FOOD_ITEM.name

ORDER BY waste DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Analytics</title>

<link rel="stylesheet" href="style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<h1>Analytics Dashboard</h1>

<div class="card">

<h2>Total Waste</h2>

<h1>

<?php echo $data['total']; ?>

</h1>

</div>

<h2>Most Wasted Food Items</h2>

<table>

<tr>

<th>Food Item</th>
<th>Total Waste</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($most_waste))
{
?>

<tr>

<td>

<?php echo $row['name']; ?>

</td>

<td>

<?php echo $row['waste']; ?>

</td>

</tr>

<?php
}
?>

</table>

<br><br>

<h2>Waste Analytics Chart</h2>

<canvas id="wasteChart"></canvas>

</div>

<script>

const ctx =
document.getElementById('wasteChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: [

<?php

$chart_query = mysqli_query($conn,

"SELECT FOOD_ITEM.name,
SUM(WASTE_LOG.quantity_wasted) AS waste

FROM WASTE_LOG

JOIN FOOD_ITEM
ON FOOD_ITEM.item_id = WASTE_LOG.item_id

GROUP BY FOOD_ITEM.name");

while($chart = mysqli_fetch_assoc($chart_query))
{
    echo "'" . $chart['name'] . "',";
}

?>

],

datasets: [{

label: 'Food Waste',

data: [

<?php

$chart_query2 = mysqli_query($conn,

"SELECT FOOD_ITEM.name,
SUM(WASTE_LOG.quantity_wasted) AS waste

FROM WASTE_LOG

JOIN FOOD_ITEM
ON FOOD_ITEM.item_id = WASTE_LOG.item_id

GROUP BY FOOD_ITEM.name");

while($chart2 = mysqli_fetch_assoc($chart_query2))
{
    echo "'" . $chart2['waste'] . "',";
}

?>

],

borderWidth: 1

}]

},

options: {

responsive: true

}

});

</script>

</body>

</html>