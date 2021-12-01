<?php
if(isset($_POST['Login'])){
    //mengambil nilai username dan password dari form
    $USERNAME=$_POST['USERNAME'];
    $PASSWORD=$_POST['PASSWORD'];
    //Function checkPassword untuk mengecek username dan password
    function checkPassword($USERNAME, $PASSWORD){
        require "koneksi.php";
        $statement=$kon->prepare("SELECT*FROM user WHERE USERNAME=:USERNAME and PASSWORD=:PASSWORD");
        $statement->bindValue(':USERNAME', $USERNAME);
        $statement->bindValue(':PASSWORD', $PASSWORD);
        $statement->execute();
        foreach($statement as $data){
          $IDUSER = $data[0];
        }
        //Mengecek jumlah baris
        return $statement->rowCount()>0;
    }
    //Jika hasil true
    if(checkPassword($USERNAME, $PASSWORD)==true){
        //mulai session
        require "koneksi.php";
        //Mengset session diberikan nilai true
        $statement=$kon->prepare("SELECT*FROM user WHERE USERNAME=:USERNAME and PASSWORD=:PASSWORD");
        $statement->bindValue(':USERNAME', $USERNAME);
        $statement->bindValue(':PASSWORD', MD5($PASSWORD));
        $statement->execute();
        foreach($statement as $data){
          $IDUSER = $data[0];
          $IDEVEL = $data[2];
        }
        $_SESSION['IDUSER']=$IDUSER;
        $_SESSION['USERNAME']=$USERNAME;
        $_SESSION['IDLEVEL']=$IDEVEL;
        //Alihkan ke halaman beranda.php
        header('Location:beranda.php');
    }
    //Jika False
    $errorlogin=true;
  }
  //Ketika tombol DaftarAdmin diklik
  if(isset($_POST['DaftarAdmin'])){
    //Jika kodeAdminnya benar maka akan diarahkan ke halaman registerAdmin
    if($_POST['kodeAdmin']=="AdminkuFoodie"){
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
            <form>
                <label>Username</label><br>
                <input type="text"><br>
                <label>Password</label><br>
                <input type="password"><br>
                <button type="submit" name="Login">Log in</button>
                <p> Belum punya akun?
                  <a href="register.php">Register di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
