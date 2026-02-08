<?php
include("db.php");
$result = mysqli_query($conn, "SELECT * FROM currencies");
?>
<!DOCTYPE html>
<html>
<head>
<title>Gicho Outlet Malaba</title>

<style>
*{box-sizing:border-box}
body{
 margin:0;
 font-family:Arial,Helvetica,sans-serif;
 background:#0f172a;
 color:#e5e7eb;
 text-align:center;
}

/* HERO */
.hero{
 background:linear-gradient(120deg,#1e3a8a,#7c3aed);
 padding:45px 15px;
 animation:fadeIn 1s ease-in-out;
}
.hero h1{margin:5px 0;font-size:32px}

/* CARDS */
.section{
 background:#111827;
 width:85%;
 margin:20px auto;
 padding:20px;
 border-radius:12px;
 box-shadow:0 0 15px rgba(0,0,0,.4);
 transition:.3s;
 animation:slideUp .6s ease;
}
.section:hover{
 transform:translateY(-5px);
 box-shadow:0 0 20px rgba(124,58,237,.6);
}

/* TABLE */
table{
 margin:15px auto;
 border-collapse:collapse;
 width:85%;
}
th{
 background:#2563eb;
 padding:10px;
}
td{
 padding:8px;
 border-bottom:1px solid #333;
}

/* STATUS */
.green{color:#22c55e;font-weight:bold}
.orange{color:#f59e0b;font-weight:bold}

/* BUTTONS */
.btn{
 display:inline-block;
 margin:10px;
 padding:12px 18px;
 border-radius:8px;
 text-decoration:none;
 color:white;
 background:#334155;
 transition:.3s;
}
.calc{background:#16a34a;}
.admin{background:#2563eb;}
.btn:hover{
 transform:scale(1.08);
 opacity:.9;
}

/* CONTACT */
.contact{margin:15px;font-size:14px;color:#cbd5e1}
.contact a{color:#93c5fd;text-decoration:none;}
.contact a:hover{text-decoration:underline;}

/* FOOTER */
footer{
 margin-top:25px;
 padding:15px;
 background:#1e3a8a;
}

/* ANIMATIONS */
@keyframes fadeIn{
 from{opacity:0}
 to{opacity:1}
}
@keyframes slideUp{
 from{opacity:0; transform:translateY(15px)}
 to{opacity:1; transform:translateY(0)}
}
</style>
</head>

<body>

<div class="hero">
<h1>Gicho Outlet Malaba</h1>
<p>Fast • Secure • Reliable Forex & Money Services</p>
</div>

<div class="section">
<h2>Live Exchange Rates 💱</h2>
<table>
<tr><th>Currency</th><th>Buy</th><th>Sell</th></tr>
<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['currency']; ?></td>
<td><?= $row['buy_rate']; ?></td>
<td><?= $row['sell_rate']; ?></td>
</tr>
<?php } ?>
</table>
</div>

<div class="section">
<h2>Our Services 🚀</h2>
Currency Exchange • M-Pesa • MTN • Airtel Uganda • East Africa Transfers • Corporate Payments
</div>

<div class="section">
<h2>Live Status</h2>
<span class="green">M-Pesa — Online</span><br>
<span class="green">MTN — Online</span><br>
<span class="orange">Airtel — Limited</span><br>
<span class="green">Transfers — Active</span>
</div>

<div class="section">
<h2>Customer Reviews ⭐</h2>
“Best rates in Malaba.” • “Fast & reliable.” • “Professional service.”
</div>

<!-- MAIN ACTION BUTTONS -->
<a href="calculator.php" class="btn calc">Open Calculator</a>
<a href="admin/login.php" class="btn admin">Admin Login</a>

<br><br>

<!-- NEW PAGES -->
<a href="about.php" class="btn">About Us</a>
<a href="faq.php" class="btn">FAQ</a>
<a href="news.php" class="btn">News</a>
<a href="branches.php" class="btn">Branches</a>
<a href="rates.pdf" class="btn">Download Rates</a>

<br><br>

<!-- WHATSAPP -->
<a href="https://wa.me/254722973973" class="btn">WhatsApp Us</a>

<div class="contact">
📍 <a href="https://www.google.com/maps/search/?api=1&query=OSF+Second+Gate+Malaba" target="_blank">
Exit OSF Second Gate from Customs
</a><br>
📞 +254722973973 / +254703903212 / +256770372179<br>
✉️ josephkarobiagichohi@gmail.com | kolmiphil@gmail.com
</div>

<footer>
© <?= date("Y"); ?> Gicho Outlet Malaba
</footer>

</body>
</html>
