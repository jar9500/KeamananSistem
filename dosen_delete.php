<?php

include 'koneksi.php';

    $nidn=$_GET['nidn'];

    $query=mysqli_query($koneksi,"DELETE from dosen where nidn='$nidn' ")
    or die(mysqli_error($koneksi));

    if($query){
        header('location: dosen.php');
    }else{
        echo"Gagal";
    }

?>