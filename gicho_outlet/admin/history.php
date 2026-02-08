<?php
session_start();
include("../db.php");

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Transactions</title>
<style>
body{
    font-family:Arial;
    background:#f4f6f8;
    text-align:center;
}
table{
    margin:auto;
    border-collapse:collapse;
    width:95%;
    background:white;
}
th{
    background:#0d6efd;
    color:white;
    padding:10px;
}
td{
    padding:8px;
    border-bottom:1px solid #ddd;
}
a{
    text-decoration:none;
    padding:5px 8px;
    background:#198754;
    color:white;
    border-radius:4px;
}
</style>
</head>

<body>

<h2>Transactions History</h2>

<table>
<tr>
    <th>ID</th>
    <th>Customer</th>
    <th>From</th>
    <th>To</th>
    <th>Amount</th>
    <th>Result</th>
    <th>Date</th>
    <th>Receipt</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer']; ?></td>
    <td><?php echo $row['amount']." ".$row['from_currency']; ?></td>
    <td><?php echo number_format($row['result'],2)." ".$row['to_currency']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo number_format($row['result'],2); ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td>
        <a href="../receipt.php?id=<?php echo $row['id']; ?>" target="_blank">
            View
        </a>
    </td>
</tr>
<?php } ?>

</table>

<br><br>
<a href="dashboard.php">⬅ Back</a>

</body>
</html>
