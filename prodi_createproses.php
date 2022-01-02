<?php
include 'koneksi.php';

$id_prodi=$_POST['id_prodi'];
$nama_prodi=$_POST['nama_prodi'];
$jenjang=$_POST['jenjang'];

$query=mysqli_query($koneksi,"INSERT INTO prodi (id_prodi,nama_prodi,jenjang) 
VALUES('$id_prodi','$nama_prodi','$jenjang')")
or die(mysqli_error($koneksi));

if($query){
    header('location: prodi.php');
}else{
    echo"Gagal Input";
}

?>