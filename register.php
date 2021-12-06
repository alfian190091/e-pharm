
<?php
    require "koneksi.php";
	require 'validasi.php';
    //Set error dengan kosong
    $nama=$nama_err=$email=$email_err=$notelp=$notelp_err=$alamat=$alamat_err=$wilayah=$wilayah_err=$password=$password_err="";
    //Jumlah Validasi yang berhasil dilewati
    $a="";

    //ketika tombol register di klik
	if(isset($_POST['register'])){
       
           
           
            //Validasi
            if (empty($_POST['nama'])) {
                $nama_err = "*Nama Harus diisi";
            } elseif (!validateName($_POST, 'nama')) {
                $nama_err = "*Nama Harus Huruf!";
            } 
            else {
                $nama=$_POST['nama'];
                $a++;
            }
            if (empty($_POST['email'])) {
                $email_err = "*EMAIL Harus diisi";
            } elseif (!is_email_valid($_POST['email'])) {
                $email_err = "*Format Email Salah!";
            }
            else {
                $a++;
            }
            if (empty($_POST['notelp'])) {
                $notelp_err = "*NOHP Harus diisi";
            } elseif (!is_numeric($_POST['notelp'])) {
                $notelp_err = "*Harus Angka!";
            } elseif (strlen($_POST['notelp'])<11 || strlen($_POST['notelp'])>12) {
                $notelp_err = "*NOHP Harus 11 sampai 12 digit!";
            }
            else {
                $notelp=$_POST['notelp'];
                $a++;
            }

            if (empty($_POST['alamat'])) {
                $alamat_err = "*Alamat Harus diisi";
            }
            else {
                $alamat=$_POST['alamat'];
                $a++;
            }
            
            if (empty($_POST['pass'])) {
                $password_err = "*PASSWORD Harus diisi";
            } elseif (!validateNameDanAngka($_POST, 'pass')) {
                $password_err = "*PASSWORD Harus Huruf atau angka!";
            } elseif (strlen($_POST['pass'])<8) {
                $password_err = "*PASSWORD Harus lebih dari 7 karakter";
            }
            else {
                $password=$_POST['pass'];
                $a++;
            }
            
            
            
            
           
            //Ketika Validasi sudah 5 atau benar semua
            if ($a == 5){
            
                function registrasi($data){
                    global $conn;
                    $id_akses="2";
                    $nama = $data["nama"];
                    $alamat = $data["alamat"];
                    $wilayah = $data["id_wilayah"];
                    $notelp = $data["notelp"];
                    $email = $data["email"];
                    $pass = $data["pass"];

                mysqli_query($conn, "INSERT INTO account VALUES('', '$id_akses','$nama', '$alamat', '$wilayah','$notelp', '$email', '$pass' )");
                return mysqli_affected_rows($conn);
                }

                if(registrasi($_POST)>0){
                    $error=false; 

                }
            
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
            <form method="POST" action="">
                <?php if(isset($error)):?>
                    <h3 style='color:green; font-style:italic;'>*Data user berhasil ditambahkan</h3>
                <?php endif; ?>
                <label>NAMA</label>
				<span><?php echo $nama_err; ?></span>
                <input type="text" name="nama" value="<?php if(isset($_POST['nama'])){echo $_POST['nama'];} ?>">
                <br>
                <label>E-Mail</label>
				<span><?php echo $email_err; ?></span>
                <input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                <br>
                <label>NOHP</label>
				<span><?php echo $notelp_err; ?></span>
                <input type="text" name="notelp" value="<?php if(isset($_POST['notelp'])){echo $_POST['notelp'];} ?>">
                <br>
                <label>Alamat Lengkap</label>
				<span><?php echo $alamat_err; ?></span>
                <input type="text" name="alamat" value="<?php if(isset($_POST['alamat'])){echo $_POST['alamat'];} ?>">
                <br>
                <label for="cars">Wilayah</label><br>
                <select id="cars" name="id_wilayah">
                <option value="0">Pilih</option>
                <option value="1">Bangkalan</option>
                <option value="2">Labang</option>
                <option value="3">Kamal</option>
                <option value="4">Burneh</option>
                <option value="5">Socah</option>
                <option value="6">Arosbaya</option>
                
                </select>

                <br>
                <label>Password</label>
				<span><?php echo $password_err; ?></span>
                <input type="password" name="pass" value="<?php if(isset($_POST['PASSWORD'])){echo $_POST['PASSWORD'];} ?>">
                <br>
                <button type="submit" name="register">Register</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
