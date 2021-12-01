<?php
    require "koneksi.php";
	require 'validasi.php';
    //Set error dengan kosong
    $EMAIL = $EMAIL_err = $USERNAME = $USERNAME_err =  $PASSWORD = $PASSWORD_err =  $NOHP = $NOHP_err = $ALAMAT = $ALAMAT_err = "";
    //Jumlah Validasi yang berhasil dilewati
    $a="";

    //ketika tombol SUBMIT di klik
	if(isset($_POST['SUBMIT'])){
        try{
            $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Validasi
            if (empty($_POST['EMAIL'])) {
                $EMAIL_err = "*EMAIL Harus diisi";
            } elseif (!is_email_valid($_POST['EMAIL'])) {
                $EMAIL_err = "*Format Email Salah!";
            }
            else {
                $a++;
            }
            if (empty($_POST['USERNAME'])) {
                $USERNAME_err = "*USERNAME Harus diisi";
            } elseif (!validateNameDanAngka($_POST, 'USERNAME')) {
                $USERNAME_err = "*USERNAME Harus Huruf atau angka!";
            } elseif (strlen($_POST['USERNAME'])<8) {
                $USERNAME_err = "*USERNAME Harus lebih dari 7 huruf atau angka!";
            }
            else {
                $USERNAME=$_POST['USERNAME'];
                $a++;
            }
            if (empty($_POST['PASSWORD'])) {
                $PASSWORD_err = "*PASSWORD Harus diisi";
            } elseif (!validateNameDanAngka($_POST, 'PASSWORD')) {
                $PASSWORD_err = "*PASSWORD Harus Huruf atau angka!";
            } elseif (strlen($_POST['PASSWORD'])<8) {
                $PASSWORD_err = "*PASSWORD Harus lebih dari 7 karakter";
            }
            else {
                $PASSWORD=$_POST['PASSWORD'];
                $a++;
            }
            
            if (empty($_POST['ALAMAT'])) {
                $ALAMAT_err = "*Alamat Harus diisi";
            }
            else {
                $ALAMAT=$_POST['ALAMAT'];
                $a++;
            }
            if (empty($_POST['NOHP'])) {
                $NOHP_err = "*NOHP Harus diisi";
            } elseif (!is_numeric($_POST['NOHP'])) {
                $NOHP_err = "*Harus Angka!";
            } elseif (strlen($_POST['NOHP'])<11 || strlen($_POST['NOHP'])>12) {
                $NOHP_err = "*NOHP Harus 11 sampai 12 digit!";
            }
            else {
                $NOHP=$_POST['NOHP'];
                $a++;
            }
           
            //Ketika Validasi sudah 7 atau benar semua
            if ($a == 5){
                //Query untuk menambahkan USER
                $statement=$kon->prepare("INSERT INTO user ( USERNAME, EMAIL, ALAMAT, NOHP, PASSWORD) VALUES (:USERNAME, :EMAIL, :ALAMAT, :NOHP, :PASSWORD)");
                $statement->bindValue(':USERNAME', $_POST['USERNAME']);
                $statement->bindValue(':PASSWORD', $_POST['PASSWORD']);
                $statement->bindValue(':ALAMAT', $_POST['ALAMAT']);
                $statement->bindValue(':EMAIL', $_POST['EMAIL']);
                $statement->bindValue(':NOHP', $_POST['NOHP']);
                $statement->execute();
                
                //Menampilkan pesan berhasil
                $error=false;
            
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }	
    }	
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
            <form method="POST">
                <?php if(isset($error)):?>
                    <h3 style='color:green; font-style:italic;'>*Data user berhasil ditambahkan</h3>
                <?php endif; ?>
                <label>USERNAME</label>
				<span><?php echo $USERNAME_err; ?></span>
                <input type="text" name="USERNAME" value="<?php if(isset($_POST['USERNAME'])){echo $_POST['USERNAME'];} ?>">
                <br>
                <label>E-Mail</label>
				<span><?php echo $EMAIL_err; ?></span>
                <input type="text" name="EMAIL" value="<?php if(isset($_POST['EMAIL'])){echo $_POST['EMAIL'];} ?>">
                <br>
                <label>NOHP</label>
				<span><?php echo $NOHP_err; ?></span>
                <input type="text" name="NOHP" value="<?php if(isset($_POST['NOHP'])){echo $_POST['NOHP'];} ?>">
                <br>
                <label for="cars">Alamat</label><br>
                <select id="cars" name="ALAMAT">
                <option value="volvo">Pilih</option>
                <option value="volvo">Bangkalan</option>
                <option value="saab">Sumenep</option>
                <option value="fiat">Sampang</option>
                <option value="audi">Pamekasan</option>
                </select>

                <br>
                <label>Password</label>
				<span><?php echo $PASSWORD_err; ?></span>
                <input type="text" name="PASSWORD" value="<?php if(isset($_POST['PASSWORD'])){echo $_POST['PASSWORD'];} ?>">
                <br>
                <button type="submit" name="SUBMIT">Register</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
