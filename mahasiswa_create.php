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
						<a class="nav-link" href="">
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
						Form Tambah Data Mahasiswa
					</div>
					<div class="card-body">
					<form method="post" action="mahasiswa_createproses.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>NPM</label>
                            <input type="text" name="npm" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_mhs" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <select name="prodi" class="form-control" required>
								<option selected>--Pilih Prodi--</option>
                                <option name="nama_prodi">oasandasgibatewrtfaeyfraesurf</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dosen</label>
							<select name="wali_dosen" class="form-control" required>
								<option selected>--Pilih Dosen--</option>
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
                            <label>Foto Mahasiswa</label>
                            <input type="file" name="foto_mhs" class="form-control" required>
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