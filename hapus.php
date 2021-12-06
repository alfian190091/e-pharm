<?php
session_start();
include "koneksi.php";
    $id_keranjang = $_GET["id_keranjang"];
    $id_account=$_SESSION['id_account'];

    function hapus($id_keranjang){
        global $conn;
        mysqli_query($conn, "DELETE FROM keranjang where id_keranjang=".$id_keranjang );
        return mysqli_affected_rows($conn);
    }
    if(hapus($id_keranjang) > 0){
        echo "<script>
                alert('data berhasil dihapus!');
                header('location:keranjang.php');
            </script>";
    } else {
        echo "gagal";
    }
?>