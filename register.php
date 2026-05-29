<?php

include 'db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO USER(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn, $sql))
    {
        echo "Registration Successful";
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
    <title>Register</title>
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

<h2>User Registration</h2>

<form method="POST">

    <input type="text"
           name="name"
           placeholder="Enter Name"
           required>

    <br><br>

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>

    <br><br>

    <button type="submit"
            name="register">
        Register
    </button>

</form>

</body>
</html>