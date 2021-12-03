<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
		require "navbar.php";
	?>
	<br><br><br><br>
	<div class="kategori">
		<h2>Kategori</h2>
		<br><br>
		
		<?php
			require "koneksi.php";
			$statement=$kon->prepare("SELECT*FROM penyakit");
			$statement->execute();
			foreach($statement as $data){
				$id_penyakit=$data[0];
				$nama_kategori = $data[1];
				
			?>
				
				<a href="produk.php?&id_penyakit=<?php echo $data['id_penyakit']; ?>"><button><?php echo $nama_kategori; ?></button></a>
				
			<?php
			}
			?>
	
	</div>
	
	<div class="containerbarang">
	<h2>Produk Kami</h2><br><br>
			
			<table align="center" id="filter">
				
				<tr>
					<?php
					require "koneksi.php";
					if($id_penyakit = $_GET['id_penyakit']){
						//Query Menampilkan user berdasarkan IDUSER yang dipilih
						$statement=$kon->prepare("SELECT*FROM obat, penyakit WHERE obat.id_penyakit=penyakit.id_penyakit AND id_penyakit='$id_penyakit'");
						$statement->execute();
						//Menampilkan User berdasarkan Query
						foreach($statement as $dataProduk){
							$nama_obat = $dataProduk[2];
							$deskripsi = $dataProduk[3];
							$harga = $dataProduk[4];
						
						}

						
					}
					?>
					<td>
						<h3><?php echo $nama_obat ?></h3><br>
						<img src="produk/batuk/benadrly.jpg" alt=""><br>
						<p><?php echo $deskripsi ?></p><br>
						<h4><?php echo $harga ?></h4><br>
						<button>Beli</button>
						<button>Keranjang</button>
					
					</td>
				
					<td>
						<h3>Nama Produk</h3><br>
						<img src="produk/batuk/siladex.jpg" alt=""><br>
						<p>Deskripsi Produk</p><br>
						<h4>Rp. 10.000</h4><br>
						<button>Beli</button>
						<button>Keranjang</button>
					</td>
					<td>
						<h3>Nama Produk</h3><br>
						<img src="produk/bg1.jpg" alt=""><br>
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