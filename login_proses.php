<?php

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password=md5('$password')")
or die(mysqli_error($koneksi));

// cek apakah username dan password di temukan pada database
if ($data=mysqli_fetch_array($query)){
    $_SESSION["username"]=$data["username"];
    $_SESSION["alert"]="BERHASIL LOGIN";
    header("Location:index.php");
}else{
	echo "<script>alert('Nama atau Password Tidak Terdaftar !')
	history.back(self)</script>";
}

?>