<!DOCTYPE html>
<?php
	
session_start();
include "koneksi.php";
$jumlah_siswa=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM mahasiswa"));
$jumlah_dosen=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM dosen"));

?>
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
        <a class="navbar-brand h1">
            <span class="navbar-brand mb-0 h1">FASILKOM UNSIKA</span>
        </a>
    </div>
</nav>
<div class="container-fluid">
	<div class="row">
		<!-- Sidebar -->
		<div class="col-md-2 d-none d-md-block bg-light sidebar" style="height: 100vh">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
                    <li class="nav-item mt-2 active">
						<a class="nav-link" href="index.php">
							Dashboard
						</a>
					</li>
                    <div class="dropdown-divider"></div>
					<li class="nav-item mt-2 active">
						<a class="nav-link" href="mahasiswa.php">
							Mahasiswa
						</a>
					</li>
					<div class="dropdown-divider"></div>
					<li class="nav-item mt-2">
						<a class="nav-link" href="dosen.php">
							Dosen
						</a>
					</li>
					<div class="dropdown-divider"></div>
					<li class="nav-item mt-2">
						<a class="nav-link" href="prodi.php">
							Prodi
						</a>
					</li>
				</ul>
			</div>
		</div>
<!-- Body -->
<!--  Mahasiswa  -->
        <div class="col-xl-3 col-md-2">
            <div class="card bg-success shadow h-10 py-2 my-5">
                <a href="mahasiswa.php" style="text-decoration:none;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="text-xs text-light text-uppercase mb-1">Jumlah Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-light"><?= $jumlah_siswa?> (Mahasiswa)</div>
                    </div>
                </div>
                </a>
            </div>
        </div>
<!-- Akhir  Mahasiswa -->
<!--  Dosen  -->
        <div class="col-xl-3 col-md-2">
            <div class="card bg-info shadow h-10 py-2 my-5">
                <a href="dosen.php" style="text-decoration:none;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="text-xs text-light text-uppercase mb-1">Jumlah Dosen</div>
                        <div class="h5 mb-0 font-weight-bold text-light"><?= $jumlah_dosen?> (Dosen)</div>
                    </div>
                </div>
                </a>
            </div>
        </div>
<!-- Akhir  Dosen -->
<!--  Prodi  -->
<div class="col-xl-3 col-md-2">
        <div class="card bg-warning shadow h-10 py-2 my-5">
            <a href="prodi.php" style="text-decoration:none;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="text-xs text-light text-uppercase mb-1">Jumlah Prodi</div>
                        <div class="h5 mb-0 font-weight-bold text-light"> (Prodi)</div>
                    </div>
                </div>
                </a>
            </div>
        </div>
<!-- Akhir  Prodi -->
    </div>
</div>
</body>
</html>