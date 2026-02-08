<?php
include("db.php");
$currencies = mysqli_query($conn, "SELECT * FROM currencies");
?>

<!DOCTYPE html>
<html>
<head>
<title>Exchange Calculator</title>

<style>
body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f6f8;
    text-align:center;
}

.box{
    background:white;
    width:450px;
    margin:40px auto;
    padding:20px;
    border-radius:8px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.result{
    margin-top:15px;
    padding:10px;
    background:#e7f1ff;
    border-radius:5px;
    font-weight:bold;
    color:#000;
}

.select, input{
    width:90%;
    padding:10px;
    margin:10px 0;
}

button{
    padding:10px 15px;
    margin:5px;
    background:#0d6efd;
    color:white;
    border:none;
    cursor:pointer;
}

button:hover{
    background:#0b5ed7;
}

.print{
    background:#198754;
}

.print:hover{
    background:#157347;
}
</style>

<script>
function swapCurrencies(){
    var from = document.getElementById("from");
    var to = document.getElementById("to");
    var temp = from.value;
    from.value = to.value;
    to.value = temp;
}

function printResult(){
    window.print();
}
</script>

</head>

<body>

<h2>Currency Calculator 💱</h2>

<div class="box">
<form method="POST">

    <p><b>Convert FROM:</b></p>
    <select name="from_id" id="from" required>
        <option value="">Select Currency</option>
        <?php 
        mysqli_data_seek($currencies, 0);
        while($row = mysqli_fetch_assoc($currencies)) { ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['currency']; ?>
            </option>
        <?php } ?>
    </select>

    <input type="number" step="any" name="amount" placeholder="Enter Amount" required>

    <p><b>Convert TO:</b></p>
    <select name="to_id" id="to" required>
        <option value="">Select Currency</option>
        <?php 
        mysqli_data_seek($currencies, 0);
        while($row = mysqli_fetch_assoc($currencies)) { ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['currency']; ?>
            </option>
        <?php } ?>
    </select>

    <br>

    <button type="button" onclick="swapCurrencies()">🔄 Swap</button>
    <button type="submit" name="calc">Calculate</button>
</form>

<?php
if(isset($_POST['calc'])){
    $from = $_POST['from_id'];
    $to = $_POST['to_id'];
    $amount = $_POST['amount'];

    // 🚫 prevent same currency
    if($from == $to){
        echo "<div class='result'>Choose different currencies</div>";
        return;
    }

    $fromData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT currency, buy_rate FROM currencies WHERE id='$from'")
    );

    $toData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT currency, sell_rate FROM currencies WHERE id='$to'")
    );

    $kes = $amount * $fromData['buy_rate'];
    $total = $kes / $toData['sell_rate'];

    $totalFormatted = number_format($total, 2);
    $rateUsed = number_format($toData['sell_rate'], 2);

    // save transaction
    mysqli_query($conn, "INSERT INTO transactions 
    (customer, from_currency, to_currency, amount, result, rate)
    VALUES (
    'Walk-in Customer',
    '{$fromData['currency']}',
    '{$toData['currency']}',
    '$amount',
    '$total',
    '{$toData['sell_rate']}'
    )");

    echo "<div class='result'>";
    echo "$amount {$fromData['currency']} = $totalFormatted {$toData['currency']}<br>";
    echo "Rate used: $rateUsed";
    echo "<br><br>";
    $last_id = $conn->insert_id;
   echo "<br><br>";
   echo "<a class='print' target='_blank' href='receipt.php?id=".$last_id."'>🧾 Receipt</a>";

    echo "</div>";
}
?>

</div>

<br>
<a href="index.php">⬅ Back Home</a>

</body>
</html>
