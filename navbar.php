<?php
  session_start();
  if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
		<h1>E-Pharm</h1>
		<h3><a href="login.php">Log in</a></h3>
        <h3><a href="checkout.php">Checkout</a></h3>
		<h3><a href="keranjang.php">Keranjang</a></h3>
		<h3><a href="produk.php">Produk</a></h3>
		<h3><a href="index.php">Home</a></h3>
	</nav>
</body>
</html>
