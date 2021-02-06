<?php 
// session_start();
// if (isset($_SESSION["login"])) {
//   header("Location: index.php");
//   exit;
// }

// $koneksi = mysqli_connect("localhost","root","","game_seru")or die(mysqli_error($koneksi));
// if (isset($_POST["login"])) {
//   //tangkap data dari user
//   $username = $_POST["username"];
//   $password = $_POST["password"];

//   //login
// $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
// if (mysqli_num_rows($result) === 1) { 
//   $row= mysqli_fetch_assoc($result);
//   if(password_verify($password, $row["password"])){
//     //set session
//     $_SESSION["login"] = true;
//     header("Location: index.php");
//     exit;
//    }
//  }
//  $error = true;
// }


session_start();
if (isset($_SESSION["login"])) {
    header("Location: game/index.php");
    exit;
}

$koneksi = mysqli_connect("localhost","root","","game_seru")or die(mysqli_error($koneksi));
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //setting session
            $_SESSION["login"] = true;
            header("Location: game/index.php");
            exit;
        }
    }
    $error = true;

}







?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Login</title>
  <style>
    center h6{
      color: #228B22;
      font-size: 30px;
      font-family:'Acme', sans-serif;
    }
  </style>
</head>
<body>



<div class="container mt-5">
  <div class="card">
    <center><h6>Mainkan Game</h6></center>
    <div class="card-header bg-info text-white">
      <h2 class="judul">Login</h2>
      </div>
        <div class="card-body">
          <?php if(isset($error)): ?>
              <p style="color : red; font-style : italic; ">Username/password Anda salah</p>
            <?php endif; ?>
        <form class="mt-4" action="" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="username" placeholder="Masukkan username..." id="username" required autocomplete="off">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" placeholder="Masukkan password..." id="password" required autocomplete="off">
            </div>

            <button type="submit" class="tombol_login btn btn-success" name="login">Login</button>
            <a href="registrasi.php">
            <div class="tombol-daftar btn btn-primary mt-1">
             Daftar
            </div>
            </a>
            <br>
        </form>
        <center><a class="link" href="https://www.google.com">Kembali</a></center>
        </div> 
      <div class="card-footer bg-light text-white mt-3">
        <p>Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> Aladino Zulmar</p>
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