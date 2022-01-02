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
        <a class="navbar-brand h1">
            <img src="img/Logo_Unsika.png" width="25">
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
                        $id_dosen=$_GET['id_dosen'];
                        $data=mysqli_query($koneksi,"SELECT * from dosen where id_dosen='$id_dosen' ") or die(mysqli_error($koneksi));
                        $dosen=mysqli_fetch_array($data);
                    ?>
					<div class="card-body">
					<form method="post" action="dosen_updateproses.php?id_dosen=<?php echo $id_dosen?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Dosen</label>
                            <input type="text" name="id_dosen" class="form-control" value="<?php echo $dosen['id_dosen']?>" required>
                        </div>
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
								<option selected>--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
							<select name="status" class="form-control" required>
								<option selected>--Pilih Status--</option>
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