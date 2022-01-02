<?php

include 'koneksi.php';

    $npm=$_GET['npm'];

    $query=mysqli_query($koneksi,"DELETE from mahasiswa where npm='$npm' ")
    or die(mysqli_error($koneksi));

    if($query){
        header('location: mahasiswa.php');
    }else{
        echo"Gagal";
    }

?>