<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM currencies");
?>

<h2>All Currencies</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Currency</th>
    <th>Buy Rate</th>
    <th>Sell Rate</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['currency']; ?></td>
    <td><?php echo $row['buy_rate']; ?></td>
    <td><?php echo $row['sell_rate']; ?></td>
    <td>
        <a href="edit_currency.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete_currency.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>
