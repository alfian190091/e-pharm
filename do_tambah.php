<?php
    session_start();
    require "koneksi.php";
   

    $id_obat = $_GET["id_obat"];
    $sql = "SELECT * FROM obat WHERE id_obat=".$id_obat;
    $query = mysqli_query($conn, $sql);
    $hasil = mysqli_fetch_object($query);
    $data_obat = mysqli_fetch_assoc($query);
    $_SESSION['id_obat']= $data_obat['id_obat'];
    //$id_obat = $val["id_obat"];
    $_SESSION["cart"][$id_obat] = [
        "id_obat" => $hasil->id_obat,
        "nmobat" => $hasil->nmobat,
        "deskripsi" => $hasil->deskripsi,
        "harga" => $hasil->harga
    ];



    $id_account=$_SESSION['id_account'];
                                // var_dump($id_account);
                                // var_dump($id_obat);
    $bnyk_obat="1";
    $total_harga=$hasil->harga;
    $cek=mysqli_query($conn, "INSERT INTO `keranjang` (`id_keranjang`, `id_account`, `id_obat`, `bnyk_obat`, `total_harga`) 
                                VALUES (NULL, '$id_account', '$id_obat', '$bnyk_obat', '$total_harga')");
                           
    if($cek > 0){
         $error=false;
    }
    
  

   
    
    header("location:keranjang.php");
   
?>