
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
            <?php
                if(!empty($_SESSION["cart"])){
                    include "koneksi.php";
                    // $id_obat = $_SESSION["id_obat"];
                    $id_account=$_SESSION['id_account'];
                    //             // var_dump($id_account);
                    //              var_dump($id_obat);
                    // $bnyk_obat="1";
                    // $total_harga=$val["harga"];
                    // $cek=mysqli_query($conn, "INSERT INTO `keranjang` (`id_keranjang`, `id_account`, `id_obat`, `bnyk_obat`, `total_harga`) 
                    //             VALUES (NULL, '$id_account', '$id_obat', '$bnyk_obat', '$total_harga')");
                           
                    // if($cek > 0){
                    //     $error=false;
                    // }
                    
                 
                        
                     
                            $no=1;
                            $jml=1;
                           
                           foreach($_SESSION["cart"] as $cart => $val) :
                                $query  = mysqli_query($conn, "SELECT * FROM obat, keranjang WHERE obat.id_obat=keranjang.id_obat AND id_account='$id_account';");
                                $hasil =  mysqli_fetch_assoc($query);

                                // $jumlah_harga = $hasil['harga'] * $val;
                                // $total += $jumlah_harga;
                                // $no = 1;
                            ?>   
                                    <tr>
                                        <td>
                                            <center><?php echo $no;?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $hasil["nmobat"];?></center>
                                        </td>
                                        <td>
                                            <!-- <form method="POST"> -->
                                            <center><?php echo $jml;?></center>
                                            <!-- </form> -->
                                        </td>
                                        <td>
                                            <center><?php echo $hasil["harga"];?></center>
                                        </td>
                                        
                                        <td>
                                        
                                        <a href="hapus.php?id_keranjang=<?php echo $hasil['id_keranjang']; ?>"><button><b>Hapus</b></button></a>
                                        
                                       
                                        </td>
                                        
                                        
                                    </tr>
                             
                                <?php
                            endforeach;
                        ?>
                    <?php
                   
                }else{
                    echo "<p style='color:red; font-style:italic;font-style:bold;'>*belum ada barang yang dipilih</p>";
                }

               
            ?>
            
        </table><br><br>
                                    
        <h3>Total Belanja Anda : </h3><br><br>
        <a href="checkout.php"><button><b>Checkout</b></button></a>
        <br><br><br>
    </div>                      
</body>
</html>

