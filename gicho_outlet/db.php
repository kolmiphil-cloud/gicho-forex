<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "gicho_outlet";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed");
}
?>
