<?php
session_start();

include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM USER
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0){
    $_SESSION['email'] = $email;

    header("Location: dashboard.php");
}
    else
    {
        echo "Invalid Email or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
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

<h2>User Login</h2>

<form method="POST">

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
            name="login">
        Login
    </button>

</form>

</body>
</html>