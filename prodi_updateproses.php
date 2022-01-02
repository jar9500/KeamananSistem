<?php
include 'koneksi.php';

$id_prodilama=$_GET['id_prodi'];
$id_prodi=$_POST['id_prodi'];
$nama_prodi=$_POST['nama_prodi'];
$jenjang=$_POST['jenjang'];

$query=mysqli_query($koneksi,"UPDATE prodi SET id_prodi='$id_prodi', nama_prodi='$nama_prodi', jenjang='$jenjang'
WHERE id_prodi='$id_prodilama' ")
or die(mysqli_error($koneksi));

if($query){
    header('location: prodi.php');
}else{
    echo"Gagal Input";
}

?>