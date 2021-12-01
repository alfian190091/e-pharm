<?php
    require "koneksi.php";
?>
<html>
	<head>
			<title>Home</title>
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
	<br>
	<div class="kategori">
		<h2>Kategori</h2>
		<br><br>
		<table>
			<tr>
				<td><h3>Jantung</h3></td>
			</tr>
			<tr>
				<td><h3>Jantung</h3></td>
			</tr>
			<tr>
				<td><h3>Jantung</h3></td>
			</tr>
		</table>
	</div>
	
	<div class="containerbarang">
	<h2>Produk Kami</h2><br><br>
			<table>
				<tr>
					<td>
						<h3>Nama Produk</h3><br>
						<img src="img/bg1.jpg" alt=""><br>
						<p>Deskripsi Produk</p><br>
						<h4>Rp. 10.000</h4><br>
						<button>Beli</button>
						<button>Keranjang</button>
					</td>
					<td>
						<h3>Nama Produk</h3><br>
						<img src="img/bg1.jpg" alt=""><br>
						<p>Deskripsi Produk</p><br>
						<h4>Rp. 10.000</h4><br>
						<button>Beli</button>
						<button>Keranjang</button>
					</td>
					<td>
						<h3>Nama Produk</h3><br>
						<img src="img/bg1.jpg" alt=""><br>
						<p>Deskripsi Produk</p><br>
						<h4>Rp. 10.000</h4><br>
						<button>Beli</button>
						<button href="keranjang.php">Keranjang</button>
					</td>
				</tr>
				

			</table>

	</div>
	
	</body>
</html>