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
    <title>Data Dosen</title>
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
		<div class="col-md-2 d-none d-md-block bg-light sidebar" style="height: 100vh">
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
				<h1>Input Data</h1>
				<div class="card mt-3">
					<div class="card-header bg-secondary text-white">
						Form Update Data Dosen
					</div>
                    <?php
                        include 'koneksi.php';
                        $nidn=$_GET['nidn'];
                        $data=mysqli_query($koneksi,"SELECT * from dosen where nidn='$nidn' ") or die(mysqli_error($koneksi));
                        $dosen=mysqli_fetch_array($data);
                    ?>
					<div class="card-body">
					<form method="post" action="dosen_updateproses.php?nidn=<?php echo $nidn?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" name="nidn" class="form-control" value="<?php echo $dosen['nidn']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" value="<?php echo $dosen['nama_dosen']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control" required>
								<option selected value="<?php echo $dosen['jenis_kelamin']?>"><?php echo $dosen['jenis_kelamin']?></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
							<select name="status" class="form-control" required>
								<option selected value="<?php echo $dosen['status']?>"><?php echo $dosen['status']?></option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
						<button type="submit" class="btn btn-success mt-3" name="simpan">Simpan</button>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>