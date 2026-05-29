<?php

session_start();

include 'db.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM FOOD_ITEM
            WHERE name LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM FOOD_ITEM";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Inventory</title>

    <link rel="stylesheet" href="style.css">

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

    <h2>Food Inventory</h2>

    <form method="GET">

        <input type="text"
               name="search"
               placeholder="Search Food Item">

        <button type="submit">
            Search
        </button>

    </form>

    <br><br>

    <table border="1" cellpadding="10">

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Expiry Date</th>
            <th>Actions</th>

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
                <?php echo $row['quantity']; ?>
            </td>

            <td>
                <?php echo $row['unit']; ?>
            </td>

            <td>
                <?php echo $row['expiry_date']; ?>
            </td>

            <td>

                <a href="edit_food.php?id=<?php echo $row['item_id']; ?>">

                    Edit

                </a>

                |

                <a href="delete_food.php?id=<?php echo $row['item_id']; ?>">

                    Delete

                </a>

            </td>

        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>

</html>