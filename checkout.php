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
    <?php
		require "navbar.php";
	?>
<br><br><br>
<div class="checkout">
    <h3>Pesanan Anda</h3><br><br><br>
    <table>
            <tr>
                <th>
                    <center>Tanggal</center>
                </th>
                <th>
                    <center>Total Barang</center>
                </th>
                <th>
                    <center>Total Harga</center>
                </th>
                <th>
                    <center>Opsi</center>
                </th>
            </tr>
            <tr>
                <td>
                    <center>23 - 09 - 01</center>
                </td>
                <td>
                    <center>5 pcs</center>
                </td>
                <td>
                    <center>Rp 10000</center>
                </td>
                <td>
                <button><b>Batal</b></button>
                <button><b>Bukti</b></button>
                <a href="detail.php"><button><b>Detail</b></button></a>
                </td>
            </tr>
        </table><br><br>
    <br><br>

  
    <br><br><br>
</div>
</body>
</html>