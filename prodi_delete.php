<?php

include 'koneksi.php';

    $id_prodi=$_GET['id_prodi'];

    $query=mysqli_query($koneksi,"DELETE from prodi where id_prodi='$id_prodi' ")
    or die(mysqli_error($koneksi));

    if($query){
        header('location: prodi.php');
    }else{
        echo"Gagal";
    }

?>