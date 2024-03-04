<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Registrasi Perpus Digital</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body class="img js-fullheight" style="background-image: url(img/background/bga.jpg);">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2" style="color:#FFFFFF"><b>Ayo Mulai Menjelajahi Dunia</b></h1>
							<p class="lead" style="color:#FFFFFF">
								<b>Mulailah menciptakan pengalaman pengguna terbaik Untuk Anda.</b>
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
                                <?php
                                    if(isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $username = $_POST['username'];
                                        $level = $_POST['level'];
                                        $password = $_POST['password'];

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,username,password,level)VALUES('$nama','$email','$alamat','$username','$password','$level')");

                                        if($insert){
                                            echo'<script>alert("Selamat! Registrasi Anda Berhasil, Silakan Anda Login"); location.href="login.php"</script>';
                                        }else{
                                            echo'<script>alert("Maaf Registrasi Anda Gagal, Silakan Anda Coba Lagi");</script>';
                                        }
                                    }
                                    ?>
									<form method="post">
										<div class="mb-3">
											<label class="form-label">Nama Lengkap</label>
											<input class="form-control form-control-lg" type="text" name="nama" placeholder="Masukkan Nama Anda" />
										</div>
                                        <div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Masukkan Email Anda" />
										</div>
                                        <div class="mb-3">
											<label class="form-label">Alamat</label>
											<textarea name="alamat" rows="5" class="form-control form-control-lg"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan Username Anda" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Masukkan Password Anda" />
										</div>
                                      <input type="hidden" value="peminjam" name="level">
										<div class="d-grid gap-2 mt-3">
											<button class="btn btn-lg btn-success" type="submit" name="register" value="register">Registrasi</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3" style="color:#FFFFFF">
							<b>Sudah Punya Akun?</b><a href="login.php" style="color:#00D4FF"> <b>Login</b></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>