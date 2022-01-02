<?php
include 'koneksi.php';

$npm=$_POST['npm'];
$nama_mhs=$_POST['nama_mhs'];
$prodi=$_POST['prodi'];
$wali_dosen=$_POST['wali_dosen'];
$foto_mhs = $_FILES['foto_mhs']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($foto_mhs != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto_mhs); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto_mhs']['tmp_name'];   
    $angka_acak  = rand(1,999); //angka acak untuk menghindari kesamaan nama gambar
    $foto_mhs_baru = $angka_acak.'-'.$foto_mhs; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
        move_uploaded_file($file_tmp, 'img/ftmhs/'.$foto_mhs_baru); //memindah file gambar ke folder gambar

        $query="INSERT INTO mahasiswa (npm,nama_mhs,prodi,wali_dosen,foto_mhs) 
        VALUES('$npm','$nama_mhs','$prodi','$wali_dosen','$foto_mhs_baru')";
        $sql = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if(!$sql){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
            } else {
            //Jika berhasil kembali kehalaman awal
            header('location:mahasiswa.php');
        }
    } else {     
    //jika file ekstensi tidak jpg dan png maka akan disuruh menginput kembali
    header('location:mahasiswa_create.php');
    }
}
?>