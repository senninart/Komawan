<?php
include_once("../functions.php")
?>

<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		::-webkit-scrollbar {
			width: 8px;
		}

		::-webkit-scrollbar-track {
			background: #f1f1f1
		}

		::-webkit-scrollbar-thumb {
			background: #DCDCDC;
		}

		::-webkit-scrollbar-thumb:hover {
			background: #999;
		}
	</style>
	<link href="https://fonts.googleapis.com/css?family=montserrat:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-4">
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-5">
				<div class="login-wrap p-4 p-md-5">
					<img width="40%" height="40%" src="../assets/logo.png" class="img-fluid mx-auto d-block">
					<h2 class="text-center mb-4 mt-4">
						<font color="#008080"><b>Login</b></font>
					</h2>
					<hr>
					<form method="post" action="formlogin.php" class="login-form">
						<div class="form-group">Usename
							<input name="username" type="text" class="form-control rounded-left" placeholder="" required>
						</div>
						<div class="form-group">
							Password
							<input name="pass" type="password" class="form-control rounded-left" placeholder="" required>
						</div>
						<div class="form-group d-md-flex">
							<!-- <div class="w-50 text-md-left">
								<a href="lupa_password.php">
									<font face="montserrat" color="#008080"><u>Lupa Password?</u></font>
								</a>
							</div> -->
							<div class="w-100 text-md-right">
								<button type="submit" name="TblLogin" class="btn btn-primary rounded p-2 px-4">Masuk</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6 text-center mb-4">
		</div>
	</div>

	<?php
	if (isset($_GET["error"])) {
		$error = $_GET["error"];
		if ($error == 1) {
			showErrorSalahPassword();
		} else
			if ($error == 2) {
			showErrorDatabase();
		} else
			if ($error == 3) {
			showErrorKoneksi();
		} else
			if ($error == 4) {
			showErrorBelumLogin();
		} else {
			showErrorUnknown();
		}
	}
	?>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	<a href="../index.html" class="btn btn-outline-secondary floating-btn">Kembali</a>

</body>

</html>