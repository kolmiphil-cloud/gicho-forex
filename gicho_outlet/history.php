
<?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Transactions History</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f8;
    text-align:center;
}

h2{
    background:#0d6efd;
    color:white;
    padding:12px;
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

tr:hover{
    background:#f1f1f1;
}

.btn{
    text-decoration:none;
    padding:6px 10px;
    background:#198754;
    color:white;
    border-radius:4px;
}

.back{
    display:inline-block;
    margin-top:15px;
    padding:8px 12px;
    background:#6c757d;
    color:white;
    text-decoration:none;
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
        <a class="btn" href="receipt.php?id=<?php echo $row['id']; ?>" target="_blank">
            View
        </a>
    </td>
</tr>
<?php } ?>

</table>

<br>
<a class="back" href="index.php">⬅ Back Home</a>

</body>
</html>
