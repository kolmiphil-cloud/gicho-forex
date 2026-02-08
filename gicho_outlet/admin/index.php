<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Admin Panel</h1>
<br><br>

<a href="dashboard.php">Go to Dashboard</a>
<br><br>
<a href="logout.php">Logout</a>
