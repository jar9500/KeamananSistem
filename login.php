<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body style ="background-color: #800000">
<div class="container">
	<div class="row m-5">
		<div class="col-sm"></div>
			<div class="col-sm">
				<div class="alert alert-light">
					<form action="login_proses.php" method="post">
					<div class="form-group">
						<h2>Login</h2>
					    <label for="exampleInputEmail1">Username</label>
					    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
					</div>
					<div class="form-group mt-3">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="row">
						<div class="col-sm mt-3">
							<button type="submit" class="btn btn-warning">Login</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class="col-sm"></div>
		</div>
	</div>
</div>
</body>
</html>