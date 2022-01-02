<?php
include 'koneksi.php';

$id_dosenlama=$_GET['id_dosen'];
$id_dosen=$_POST['id_dosen'];
$nidn=$_POST['nidn'];
$nama_dosen=$_POST['nama_dosen'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$status=$_POST['status'];

$query=mysqli_query($koneksi,"UPDATE dosen SET id_dosen='$id_dosen', nidn='$nidn', 
nama_dosen='$nama_dosen', jenis_kelamin='$jenis_kelamin', status='$status'
WHERE id_dosen='$id_dosenlama' ")
or die(mysqli_error($koneksi));

if($query){
    header('location: dosen.php');
}else{
    echo"Gagal Input";
}

?>