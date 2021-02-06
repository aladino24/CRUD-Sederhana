<?php 

$koneksi = mysqli_connect("localhost","root","","game_seru")or die(mysqli_error($koneksi));


$id= $_GET["id"];
if(hapus($id) > 0){
    echo "<script>
            alert ('Data Berhasil Dihapus');
            document.location.href='pengguna.php';
          </script>";
}else {
    echo mysqli_error($koneksi);
}



function hapus($id){
    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM user WHERE id=$id");
    
    return mysqli_affected_rows($koneksi);
}

  







?>