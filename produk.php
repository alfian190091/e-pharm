<?php

require "koneksi.php";
$id_penyakit = isset($_GET['id_penyakit']) ? $_GET['id_penyakit'] : '';


$query  = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY id_penyakit ASC");
$query3 = mysqli_query($conn, "SELECT  *
							   FROM obat, penyakit
							   WHERE obat.id_penyakit	= penyakit.id_penyakit	
							   AND obat.id_penyakit = '$id_penyakit'
							   ORDER BY id_obat ASC");
$query4 = mysqli_query($conn, "SELECT  *
								FROM obat, penyakit
								WHERE obat.id_penyakit	= penyakit.id_penyakit	
								ORDER BY id_obat ASC");
//menambah data ke keranjang
if(isset($_POST['keranjang'])){
	function keranjang($row_ast){
		global $conn;
		
		$id_account = '1';
		$id_obat = $row_ast["id_obat"];
		$bnyk_obat = '1';
		$total_harga = $row_ast["harga"];
		

	mysqli_query($conn, "INSERT INTO keranjang VALUES('','$id_account', '$id_obat', '$bnyk_obat','$total_harga')");
	return mysqli_affected_rows($conn);
	}

	if(keranjang($_POST)>0){
		$error=false; 

	}
}
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
					<?php if(mysqli_num_rows($query)) { ?>
						
						<?php while($row_jnsk = mysqli_fetch_array($query)) { ?>
							
							<a href="produk.php?&id_penyakit=<?php echo $row_jnsk['id_penyakit']; ?>"><button><?php echo $row_jnsk['nmpenyakit']; ?></button></a>
						<?php }?>
						
					<?php }?>
		
				
	
	</div>
	
	<div class="containerbarang">
	<h2>Produk Kami</h2><br><br>
			
			
				
			
				<?php if(mysqli_num_rows($query3)) { ?>
						<?php while($row_ast = mysqli_fetch_array($query3)) { ?>
							
					<div class="produk">
						<form method="POST" action="">
						<h3><?php echo $row_ast["nmobat"] ?></h3><br>
						<img src="produk/batuk/benadrly.jpg" alt=""><br>
						<p><?php echo $row_ast["deskripsi"] ?></p><br>
						<h4>Rp. <?php echo $row_ast["harga"] ?></h4><br>
						<button>Beli</button>
						<a href="keranjang.php?&id_obat=<?php echo $row_jnsk['id_obat']; ?>"><button>Keranjang</button></a>

						<!-- <button type="submit" name="keranjang">Keranjang</button> -->
						<?php if(isset($error)):?>
							<h3 style='color:green; font-style:italic;'>*Data berhasil ditambahkan</h3>
						<?php endif; ?>
						</form>
					
					</div>
					
				
					<?php }?>
						
				<?php }
				//jika tidak memilih kategori
				else if(mysqli_num_rows($query4)) { ?>
						<?php while($row_ast = mysqli_fetch_array($query4)) { ?>
					
					<div class="produk">
						<h3><?php echo $row_ast["nmobat"] ?></h3><br>
						<img src="produk/batuk/benadrly.jpg" alt=""><br>
						<p><?php echo $row_ast["deskripsi"] ?></p><br>
						<h4>Rp. <?php echo $row_ast["harga"] ?></h4><br>
						<button>Beli</button>
						<a href="keranjang.php?&id_obat=<?php echo $row_jnsk['id_obat']; ?>"><button>Keranjang</button></a>

					
					</div>
					
				
					<?php }?>
						
				<?php }?>
			

	</div>
	</body>
</html>