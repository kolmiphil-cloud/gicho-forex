<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM currencies WHERE id='$id'");
}

header("Location: currencies.php");
exit();
