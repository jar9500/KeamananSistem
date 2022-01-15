<?php
include 'koneksi.php';

$nidnlama=$_GET['nidn'];
$nidn=$_POST['nidn'];
$nama_dosen=$_POST['nama_dosen'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$status=$_POST['status'];

$query=mysqli_query($koneksi,"UPDATE dosen SET nidn='$nidn', 
nama_dosen='$nama_dosen', jenis_kelamin='$jenis_kelamin', status='$status' WHERE nidn='$nidnlama' ")
or die(mysqli_error($koneksi));

if($query){
    header('location: dosen.php');
}else{
    echo"Gagal Input";
}

?>