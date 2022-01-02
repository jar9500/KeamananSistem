<?php
include 'koneksi.php';

$id_dosen=$_POST['id_dosen'];
$nidn=$_POST['nidn'];
$nama_dosen=$_POST['nama_dosen'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$status=$_POST['status'];

$query=mysqli_query($koneksi,"INSERT INTO dosen (id_dosen,nidn,nama_dosen,jenis_kelamin,status) 
VALUES('$id_dosen','$nidn','$nama_dosen','$jenis_kelamin','$status')")
or die(mysqli_error($koneksi));

if($query){
    header('location: dosen.php');
}else{
    echo"Gagal Input";
}

?>