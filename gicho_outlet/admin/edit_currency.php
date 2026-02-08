<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

// get current data
$result = mysqli_query($conn, "SELECT * FROM currencies WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $currency = $_POST['currency'];
    $buy = $_POST['buy_rate'];
    $sell = $_POST['sell_rate'];

    mysqli_query($conn, "UPDATE currencies 
                         SET currency='$currency', buy_rate='$buy', sell_rate='$sell'
                         WHERE id='$id'");

    header("Location: currencies.php");
    exit();
}
?>

<h2>Edit Currency</h2>

<form method="POST">
    <input type="text" name="currency" value="<?php echo $row['currency']; ?>" required><br><br>
    <input type="text" name="buy_rate" value="<?php echo $row['buy_rate']; ?>" required><br><br>
    <input type="text" name="sell_rate" value="<?php echo $row['sell_rate']; ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>

<br>
<a href="currencies.php">Back</a>
