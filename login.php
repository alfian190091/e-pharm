<?php
session_start();
require "koneksi.php";

if(isset($_POST["Login"])){
  $email=$_POST["email"];
  $pass =$_POST["pass"];

  $result=mysqli_query($conn, "SELECT * FROM account where email='$email' AND pass='$pass'");
  if(mysqli_num_rows($result) === 1 ){
      $_SESSION['login']=true;
      header("Location:produk.php");
      exit;
  }
  $errorlogin=true;
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
