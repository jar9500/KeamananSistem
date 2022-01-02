<?php

include 'koneksi.php';

    $id_dosen=$_GET['id_dosen'];

    $query=mysqli_query($koneksi,"DELETE from dosen where id_dosen='$id_dosen' ")
    or die(mysqli_error($koneksi));

    if($query){
        header('location: dosen.php');
    }else{
        echo"Gagal";
    }

?>