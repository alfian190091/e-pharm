<?php
    require "koneksi.php";
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
    <br><br><br>
    <div class="keranjang">
        <h3>Keranjang Anda</h3><br><br>
        <table>
            <tr>
                <th>
                    <center>No</center>
                </th>
                <th>
                    <center>Item</center>
                </th>
                <th>
                    <center>Quantity</center>
                </th>
                <th>
                    <center>Sub Total</center>
                </th>
                <th>
                    <center>Opsi</center>
                </th>
            </tr>
            <tr>
                <td>
                    <center>1</center>
                </td>
                <td>
                    <center>Obat Batuk</center>
                </td>
                <td>
                    <center>1pcs</center>
                </td>
                <td>
                    <center>Rp 20.000</center>
                </td>
                <td>
                <button><b>Hapus</b></button><button><b>+</b></button><button><b>-</b></button>
                </td>
            </tr>
        </table><br><br>
        <h3>Total Belanja Anda :</h3><br><br>
        <a href="checkout.php"><button><b>Checkout</b></button></a>
        <br><br><br>
    </div>                      
</body>
</html>