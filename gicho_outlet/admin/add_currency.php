<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['save'])) {
    $currency = $_POST['currency'];
    $buy = $_POST['buy_rate'];
    $sell = $_POST['sell_rate'];

    $sql = "INSERT INTO currencies (currency, buy_rate, sell_rate)
            VALUES ('$currency', '$buy', '$sell')";

    mysqli_query($conn, $sql);

    echo "Currency added";
}
?>

<h2>Add Currency</h2>

<form method="POST">
    <input type="text" name="currency" placeholder="Currency name" required><br><br>
    <input type="text" name="buy_rate" placeholder="Buy rate" required><br><br>
    <input type="text" name="sell_rate" placeholder="Sell rate" required><br><br>
    <button type="submit" name="save">Save</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>
