<?php
session_start();
if(isset($_POST['Login'])){
    //mengambil nilai username dan password dari form
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    //Function checkPassword untuk mengecek username dan password
    function checkPassword($email, $pass){
        require "koneksi.php";
        $statement=$kon->prepare("SELECT*FROM account WHERE email=:email and pass=:pass");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        foreach($statement as $data){
          $id_account = $data[0];
        }
        //Mengecek jumlah baris
        return $statement->rowCount()>0;
    }
    //Jika hasil true
    if(checkPassword($email, $pass)==true){
        //mulai session
        require "koneksi.php";
        //Mengset session diberikan nilai true
        $statement=$kon->prepare("SELECT*FROM account WHERE email=:email and pass=:pass");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        foreach($statement as $data){
          $id_account = $data[0];
          $id_akses = $data[1];
          $nama=$data[2];
          $id_wilayah= $data[4];

        }
        $_SESSION['id_account']=$id_account;
        $_SESSION['nama']=$nama;
        $_SESSION['id_akses']=$id_akses;
        $_SESSION['id_wilayah']=$id_wilayah;
        //Alihkan ke halaman beranda.php
        header('Location:produk.php');
    }
    //Jika False
    $errorlogin=true;
  }
  //Ketika tombol DaftarAdmin diklik
  if(isset($_POST['DaftarAdmin'])){
    //Jika kodeAdminnya benar maka akan diarahkan ke halaman registerAdmin
    if($_POST['kodeAdmin']=="adminku"){
        header('Location:registerAdmin.php');
        $_SESSION['KodeAdmin']=$_POST['kodeAdmin'];
    }
    //Menampilkan pesan Kode Salah
    $erroradmin=true;
  }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
          <h1 align="center">Login</h1>
            <form method="POST">
                <?php if(isset($errorlogin)):?>
                  <h4 style='color:red; font-style:italic;'>*Username atau password salah</h4>
                <?php endif; ?>
                <label>E-mail</label><br>
                <input type="text" name="email"><br>
                <label>Password</label><br>
                <input type="password" name="pass"><br>
                <button type="submit" name="Login">Log in</button>
                <p> Belum punya akun?
                  <a href="register.php">Register di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
