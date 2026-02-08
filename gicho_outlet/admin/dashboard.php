 <?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    text-align:center;
    background:#f4f6f8;
}

h1{
    margin-top:30px;
}

a{
    display:block;
    width:250px;
    margin:10px auto;
    padding:10px;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

a:hover{
    background:#0b5ed7;
}

.logout{
    background:#dc3545;
}

.logout:hover{
    background:#bb2d3b;
}
</style>
</head>

<body>

<h1>Welcome to Dashboard 🎉</h1>

<a href="currencies.php">💱 Update Exchange Rates</a>

<a href="../history.php">📄 View Transactions</a>

<a href="../calculator.php">🧮 Open Calculator</a>

<a href="logout.php" class="logout">🚪 Logout</a>

</body>
</html>