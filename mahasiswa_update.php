<!DOCTYPE html>
<?php
	
session_start();
include "koneksi.php";

if( !isset($_SESSION['username']) )
{
    header('location:login.php');
    exit();
}
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
						Form Tambah Data Mahasiswa
					</div>
					<div class="card-body">
                    <?php
                        include 'koneksi.php';
                        $npm=$_GET['npm'];
                        $data=mysqli_query($koneksi,"SELECT * from mahasiswa where npm='$npm' ") or die(mysqli_error($koneksi));
                        $mahasiswa=mysqli_fetch_array($data);
                    ?>
					<form method="post" action="mahasiswa_updateproses.php?npm=<?php echo $npm?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>NPM</label>
                            <input type="text" name="npm" class="form-control" value="<?php echo $mahasiswa['npm']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_mhs" class="form-control" value="<?php echo $mahasiswa['nama_mhs']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <select name="prodi" class="form-control" required>
								<option selected value="<?php echo $mahasiswa['prodi'];?>"><?php echo $mahasiswa['prodi'];?></option>
                                <?php
								include 'koneksi.php';
								$data=mysqli_query($koneksi,"SELECT * FROM prodi") or die(mysqli_error($koneksi));
								foreach($data as $prodi) : ?>
								<option value="<?php echo $prodi['nama_prodi'];?>"><?php echo $prodi['nama_prodi'];?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dosen</label>
							<select name="wali_dosen" class="form-control" required>
								<option selected value="<?php echo $mahasiswa['wali_dosen'];?>"><?php echo $mahasiswa['wali_dosen'];?></option>
                                <!-- masukkan nama dosen ke combo box dosen -->
							<?php
								include 'koneksi.php';
								$data=mysqli_query($koneksi,"SELECT * FROM dosen") or die(mysqli_error($koneksi));
								foreach($data as $dosen) : ?>
								<option value="<?php echo $dosen['nama_dosen'];?>"><?php echo $dosen['nama_dosen'];?></option>
								<?php endforeach; ?>
							</select>
                        </div>
						<div class="form-group">
                            <label>Foto Mahasiswa</label><br>
                            <img src="img/ftmhs/<?php echo $mahasiswa['foto_mhs']; ?>" style="width: 50px;float: left;margin-bottom: 5px;">
                            <input type="file" name="foto_mhs" class="form-control">
                            <p class="text-success">*Kosongkan jika tidak merubah gambar</p>
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