<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$today = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(result) as total FROM transactions WHERE DATE(created_at)=CURDATE()"));

$week = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(result) as total FROM transactions WHERE YEARWEEK(created_at)=YEARWEEK(NOW())"));
?>

<h2>Reports</h2>

<p><b>Today Total:</b> <?php echo number_format($today['total'] ?? 0,2); ?></p>
<p><b>This Week Total:</b> <?php echo number_format($week['total'] ?? 0,2); ?></p>

<br>
<a href="dashboard.php">Back</a>
