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
						<a class="nav-link" href="prodi.php">
							Prodi
						</a>
					</li>
				</ul>
			</div>
		</div>
<!-- Body -->
        <div class="col-10">
            <div class="container-fluid mt-3">
                <marquee scrollamount="10" direction="right"><h1>Daftar Wali Dosen</h1></marquee>
                <div class="dropdown-divider"></div>
                <div class="car mt-3">
                    <!-- Header -->
                    <div class="card-header bg-light text-dark">
                        <h5 class="text-center">Data Dosen</h5>
                    </div>
                    <!-- table -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">NIDN</th>
                                <th class="text-center">Nama Dosen</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            <?php
                            include 'koneksi.php';
                            $data=mysqli_query($koneksi,"SELECT * FROM dosen") or die(mysqli_error($koneksi));
                            foreach($data as $dosen){?>
                            <tr>
                                <td><?php echo $dosen['id_dosen'];?></td>
                                <td><?php echo $dosen['nidn'];?></td>
                                <td><?php echo $dosen['nama_dosen'];?></td>
                                <td><?php echo $dosen['jenis_kelamin'];?></td>
                                <td><?php echo $dosen['status'];?></td>
                                <td>
                                    <a href="dosen_delete.php?id_dosen=<?php echo $dosen['id_dosen']?>" class="btn btn-danger" onclick="return confirm('Anda akan menghapus data ini ?')">Hapus</a> 
                                    <a href="dosen_update.php?id_dosen=<?php echo $dosen['id_dosen']?>" class="btn btn-warning">Edit</a>
                                </td>
							</tr>
							<?php };?>
                        </table>
                        <a class="btn btn-success my-4" href="dosen_create.php" >Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>