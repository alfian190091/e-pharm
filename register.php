<?php
    require "koneksi.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Register</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
          <h1 align="center">Register</h1>
            <form>
                <label>Username</label>
                <br>
                <input type="text">
                <br>
                <label>Email</label>
                <br>
                <input type="text">
				<br>
                <label for="cars">Alamat</label><br>
                <select id="cars" name="cars">
                <option value="volvo">Pilih</option>
                <option value="volvo">Bangkalan</option>
                <option value="saab">Sumenep</option>
                <option value="fiat">Sampang</option>
                <option value="audi">Pamekasan</option>
                </select>

                <br>
                <label>Password</label>
                <br>
                <input type="password">
                <br>
                <button>Register</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
