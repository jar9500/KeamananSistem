<?php
session_start();
 
# check apakah ada akses post dari halaman login?, jika tidak kembali kehalaman depan
if( !isset($_POST['username']) ) { header('location:index.php'); exit(); }
 
# set nilai default dari error,
$error = '';
 
require ( 'koneksi.php' );
 
$username = trim( $_POST['username'] );
$Password = trim( $_POST['password'] );
 
if( strlen($Nama) < 2 )
{
    # jika ada error dari kolom username yang kosong
    $error = 'Username tidak boleh kosong';
}else if( strlen($Password) < 2 )
{
    # jika ada error dari kolom password yang kosong
    $error = 'Password Tidak boleh kosong';
}else{
 
    # Escape String, ubah semua karakter ke bentuk string
    $username = $koneksi->escape_string($username);
    $Password = $koneksi->escape_string($Password);
 
    # hash dengan md5
    $Password = ($Password);
 
    # SQL command untuk memilih data berdasarkan parameter $username dan $password yang
    # di inputkan
    $sql = "SELECT username, hak_akses FROM user
            WHERE username='$username'
            AND Password='$Password' LIMIT 1";
 
    # melakukan perintah
    $query = $koneksi->query($sql);
 
    # check query
    if( !$query )
    {
        die( 'Oops!! Database gagal '. $koneksi->error );
    }
 
    # check hasil perintah
    if( $query->num_rows == 1 )
    {    
        # jika data yang dimaksud ada
        # maka ditampilkan
        $row =$query->fetch_assoc();
        
        # data nama disimpan di session browser
        $_SESSION['nama_user'] = $row['username'];
        $_SESSION['akses']     = $row['hak_akses'];
 
        if( $row['hak_akses'] == 'admin')
        {
            # data hak Admin di set
            $_SESSION['saya_admin']= 'TRUE';
        }
 
        # menuju halaman sesuai hak akses
        header('location:'.$url.'/'.$_SESSION['akses'].'/');
        exit();
 
    }else{
        
        # jika data yang dimaksud tidak ada
        $error = 'Username dan Password Tidak ditemukan';
    }
 
}
 
if( !empty($error) )
{
    # simpan error pada session
    $_SESSION['error'] = $error;
    header('location:'.$url.'/login.php');
    exit();
}
?>