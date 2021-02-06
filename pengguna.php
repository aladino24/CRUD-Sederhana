<?php 



$koneksi = mysqli_connect("localhost","root","","game_seru")or die(mysqli_error($koneksi));





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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <title>Halaman Admin</title>
  </head>
  <body>
    <h3 class="judul text-center">Halaman Admin</h3>
    <div class="container">
      <div class="card mt-3" >
        <div class="nama-header card-header bg-primary text-white">
          Daftar Mahasiswa
        </div>
        <div class="card-body">
        <div class="tambah-data">
          <a href="index.php">Tambahkan Data Mahasiswa</a>
        </div>

        <div class="card">
          <div class="card-body">
            <form action="" method="POST">
           
                <label for="cari">Cari Data Mahasiswa</label>
                <input class="form-control" type="text" name="keyword" id="cari" placeholder="Cari data..." autocomplete="off" required>
              <button class="btn btn-outline-success mt-2" type="submit" name="cari">Cari</button>
    
            </form>
          </div>
       
        
        
        
        
        
       





          <table class="table table-bordered table-striped">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Edit</th>
            </tr>

            <?php 
            $no=1;
            $data = "SELECT * FROM user ORDER BY id DESC";              
            if (isset($_POST["cari"])) { 
              $nim =  $_POST['keyword'];
              $nama =  $_POST['keyword'];
              $alamat =  $_POST['keyword'];
              $jurusan =  $_POST['keyword'];
              $data = "SELECT * FROM maba WHERE 
              nama LIKE '%$nama%' OR
              username LIKE '%$username%'"; 
            }
            $tampil = mysqli_query($koneksi,$data) or die( mysqli_error($koneksi));
            while($data_mhs= mysqli_fetch_array($tampil)) :
            ?>



            <tr>
              <td><?= $no++; ?></td>
              <td><?= htmlspecialchars($data_mhs['nama']) ?></td>
              <td><?= htmlspecialchars($data_mhs['username']) ?></td>
              <td>
                <a href="ubah.php?id= <?php echo $data_mhs['id']; ?>" class="btn btn-warning">Edit</a> |
                <a href="hapus.php?id= <?php echo $data_mhs['id']; ?>" onclick="return confirm('Apakah Kamu Yakin')" class="btn btn-danger">Hapus</a>

              </td>
            </tr>
            <?php endwhile; ?>
          </table>
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