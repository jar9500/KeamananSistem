<?php
	
session_start();
include "koneksi.php";

if( !isset($_SESSION['username']) )
{
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-dark bg-danger flex-md-nowrap p-2 shadow col-12">
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <div class="p-2"><img src="img/Logo_Unsika.png" width="25"></div>
            <div class="p-2"><span class="navbar-brand">FASILKOM UNSIKA</span></div>
        </div>
        <span class="navbar-brand mb-0 float-right">Selamat Datang, <?php echo $_SESSION["username"] ?></span>
    </div>
</nav>
<div class="container-fluid">
	<div class="row">
		<!-- Sidebar -->
		<div class="col-md-2 d-none d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
                    <li class="nav-item mt-2 active">
						<a class="nav-link" href="index.php">
                        <img src="img/home.png" width="20" height="20" class="d-inline-block align-top">
							Dashboard
						</a>
					</li>
                    <div class="dropdown-divider"></div>
					<li class="nav-item mt-2 active">
						<a class="nav-link" href="mahasiswa.php">
                        <img src="img/student-with-graduation-cap.png" width="20" height="20" class="d-inline-block align-top">
							Mahasiswa
						</a>
					</li>
					<div class="dropdown-divider"></div>
					<li class="nav-item mt-2">
						<a class="nav-link" href="dosen.php">
                        <img src="img/lecture.png" width="20" height="20" class="d-inline-block align-top">
							Dosen
						</a>
					</li>
					<div class="dropdown-divider"></div>
					<li class="nav-item mt-2">
						<a class="nav-link" href="prodi.php">
                        <img src="img/pencil.png" width="20" height="20" class="d-inline-block align-top">
							Prodi
						</a>
					</li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item mt-2">
						<a class="nav-link" href="logout.php">
                        <img src="img/logout.png" width="20" height="20" class="d-inline-block align-top">
							Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
<!-- Body -->
        <div class="col-10">
            <div class="container-fluid mt-3">
            <h1 class="text-center">Daftar Mahasiswa</h1>
                <div class="dropdown-divider"></div>
                <div class="car mt-3">
                    <!-- Header -->
                    <div class="card-header bg-light text-dark d-flex justify-content-between">
                        <h5>Data Mahasiswa</h5>
                        <form action="mahasiswa.php" method="get">
                            <label>Cari :</label>
                            <input type="text" name="search">
                            <input type="submit" value="search">
                        </form>
                    </div>
                    <!-- table -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">NPM</th>
                                <th class="text-center">Foto Mahasiswa</th>
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">Prodi</th>
                                <th class="text-center">Wali Dosen</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            <?php 
                            include 'koneksi.php';
                            if(isset($_GET['search'])){
                                $search = $_GET['search'];
                                $data = mysqli_query($koneksi,"SELECT * FROM mahasiswa where nama_mhs like '%".$search."%'
                                OR npm like '%".$search."%' OR prodi like '%".$search."%' OR wali_dosen like '%".$search."%'") or die(mysqli_error($koneksi));				
                            }else{
                                $data = mysqli_query($koneksi,"SELECT * FROM mahasiswa ORDER BY npm ASC") or die(mysqli_error($koneksi));		
                            }
                            $no = 1;
                            while($mahasiswa = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?php echo $mahasiswa['npm'];?></td>
                                <td class="text-center"><img class="thumbnail img-responsive" style="width: 50px "; alt="Gambar" 
                                src="img/ftmhs/<?php echo $mahasiswa['foto_mhs']; ?>"></td>
                                <td><?php echo $mahasiswa['nama_mhs'];?></td>
                                <td><?php echo $mahasiswa['prodi'];?></td>
                                <td><?php echo $mahasiswa['wali_dosen'];?></td>
                                <td>
                                    <a href="mahasiswa_delete.php?npm=<?php echo $mahasiswa['npm']?>" class="btn btn-danger" onclick="return confirm('Anda akan menghapus data ini ?')">Hapus</a> 
                                    <a href="mahasiswa_update.php?npm=<?php echo $mahasiswa['npm']?>" class="btn btn-warning">Edit</a>
                                </td>
							</tr>
							<?php };?>
                        </table>
                        <a class="btn btn-success my-4" href="mahasiswa_create.php" >Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>