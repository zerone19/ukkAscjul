<?php
include "koneksi.php";
if(!isset($_SESSION['user'])){
	header('location:login.php');
}
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Aplikasi Perpus Digital</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar bg-primary">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">Perpus Digital</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-white">
						<b>Home</b>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php">
              <i class="align-middle text-white" data-feather="home"></i><span class="align-middle">Beranda</span>
            </a>
					</li>

					<li class="sidebar-header text-white">
						<b>Menu</b>
					</li>

					<?php
					if($_SESSION['user']['level'] !='peminjam'){
					?>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=kategori">
              <i class="align-middle text-white" data-feather="table"></i> <span class="align-middle">Kategori</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=buku">
              <i class="align-middle text-white" data-feather="book"></i> <span class="align-middle">Buku</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=laporan">
              <i class="align-middle text-white" data-feather="bar-chart-2"></i> <span class="align-middle">Laporan</span>
            </a>
					</li>

					<?php
					}else{
					?>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=peminjaman">
              <i class="align-middle text-white" data-feather="user"></i> <span class="align-middle">Peminjaman</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=koleksi_pribadi">
              <i class="align-middle text-white" data-feather="bookmark"></i> <span class="align-middle">Koleksi Pribadi</span>
            </a>
					</li>

					<?php
					}
					?>

<?php
					if($_SESSION['user']['level'] !='petugas'){
					?>
					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=ulasan">
              <i class="align-middle text-white" data-feather="twitter"></i> <span class="align-middle">Ulasan</span>
            </a>
					</li>
					<?php
					}
					?>

					<?php
					if($_SESSION['user']['level'] =='admin'): ?>
					<li class="sidebar-item">
						<a class="sidebar-link bg-primary text-white" href="index.php?page=user">
              <i class="align-middle text-white" data-feather="users"></i> <span class="align-middle">Pengguna</span>
            </a>
					</li>
					<?php endif; ?>

					<li class="sidebar-header">
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<b>Login Sebagai :</b>
                <img src="img/avatars/profile.jpg" class="avatar img-fluid rounded me-1"/> <span class="text-dark"><b><?php echo $_SESSION['user']['nama'];?></b></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
							<?php
					if($_SESSION['user']['level'] =='admin'): ?>
							<a class="dropdown-item" href="register_admin.php"><i class="align-middle me-1" data-feather="user-plus"></i> Admin registrasi</a>
								<div class="dropdown-divider"></div>
								<?php endif; ?>
								<a class="dropdown-item" href="logout.php" onclick="alert('Anda Yakin Untuk Log Out ?')">
								<i class="align-middle me-2" data-feather="power"></i> <span class="align-middle">Log Out</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<?php
					$page = isset($_GET['page']) ? $_GET['page'] : 'home';
					if(file_exists($page . '.php')){
						include $page . '.php';
					}else{
						include '404.php';
					}
					?>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Perpus Digital</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>&copy; 2024 PT. Karya Digital</strong></a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>