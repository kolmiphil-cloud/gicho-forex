<?php
include("db.php");

if(!isset($_GET['id'])){
    die("Receipt not found");
}

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM transactions WHERE id='$id'")
);

if(!$data){
    die("Invalid receipt");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Receipt</title>

<style>
body{
    font-family:Arial, Helvetica, sans-serif;
    text-align:center;
}

.receipt{
    width:350px;
    margin:auto;
    border:1px solid #000;
    padding:15px;
}

h2{
    margin:5px 0;
}

hr{
    border:1px dashed #000;
}

button{
    margin-top:15px;
    padding:8px 12px;
}
</style>

<script>
function printReceipt(){
    window.print();
}
</script>

</head>

<body>

<div class="receipt">
    <h2>Gicho Forex Bureau</h2>
    <small>Official Receipt</small>
    <hr>

    <p><b>Customer:</b> <?php echo $data['customer']; ?></p>

    <p>
    <b>From:</b> <?php echo $data['amount']." ".$data['from_currency']; ?>
    </p>

    <p>
    <b>To:</b> <?php echo number_format($data['result'],2)." ".$data['to_currency']; ?>
    </p>

    <p><b>Rate:</b> <?php echo $data['rate']; ?></p>

    <hr>

    <p><small><?php echo $data['created_at']; ?></small></p>

    <button onclick="printReceipt()">Print</button>
</div>

</body>
</html>
