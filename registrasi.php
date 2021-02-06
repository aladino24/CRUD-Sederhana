<?php 


$koneksi = mysqli_connect("localhost","root","","game_seru")or die(mysqli_error($koneksi));
if (isset($_POST["submit"])) {
    
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert ('Data berhasil dikirim');   
                document.location.href = 'login.php';
        </script>";
        
    } else {
        echo mysqli_error($koneksi);
    }

}

function registrasi($data){
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($koneksi,$data["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);


    //cek ketersediaan username
    $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert ('Terdapat username yang sama');
        </script>";
        return false;
    }

    // Cek apakah konfirmasi password sudah sama
    if ($password !== $password2) {
        echo "<script>
        alert ('Konfirmasi password tidak sesuai !');
        </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    // Input ke dalam database
    $input = "INSERT INTO user VALUES('','$nama','$username','$password')";
    mysqli_query($koneksi,$input);

    return mysqli_affected_rows($koneksi);

}


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Registrasi</title>
  </head>
  <body>
   <h2 class="judul text-center">Sign Up</h2>

   <div class="container">
   <div class="card">
  <div class="card-header bg-info text-white">
    SIGN UP
  </div>
  <div class="card-body">
    
    <form action="" method="POST">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input class="form-control" type="text" name="nama" placeholder="Masukkan nama..." id="nama" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="username" placeholder="Masukkan username..." id="username" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Masukkan password..." id="password" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="konfirmasi">Konfirmasi Password</label>
        <input class="form-control" type="password" name="password2" placeholder="Masukkan Konfirmasi Password..." id="konfirmasi" required autocomplete="off">
      </div>
      
  
     <button type="submit" class="btn btn-warning" name="submit">Daftar</button>
     <button type="reset" class="btn btn-danger">Reset</button>
    </form>




    
    
  </div>
</div>
</div>














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>