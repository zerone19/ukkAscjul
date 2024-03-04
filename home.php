<?php
require_once 'graph.php';

$senin = date('Y-m-d', strtotime('monday this week'));
$minggu = date('Y-m-d', strtotime('sunday this week'));

$row = graph($senin, $minggu);

?>
<h1 class="h3 mb-3"><strong>Beranda</strong></h1>

<div class="row">
    <?php
    if($_SESSION['user']['level'] != 'peminjam'){
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                ?>
                Total Kategori Buku</div>
            <div class="card-footer bg-light d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="?page=kategori">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                ?>
                Total Buku</div>
            <div class="card-footer bg-light d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="?page=buku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM peminjaman"));
                ?>
                Total Peminjaman</div>
            <div class="card-footer bg-light d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="?page=peminjaman">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

<?php
    if($_SESSION['user']['level'] != 'petugas'){
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                ?>
                Total Ulasan</div>
            <div class="card-footer bg-light d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="?page=ulasan">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <?php
    if($_SESSION['user']['level'] == 'peminjam'){
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi"));
                ?>
                Total Koleksi pribadi</div>
            <div class="card-footer bg-light d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="?page=koleksi_pribadi">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    ?>
<?php if ($_SESSION['user']['level'] =='admin'): ?>
<div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white mb-4">
        <div class="card-body">
            <?php
            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
            ?>
            Total User</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-dark stretched-link" href="?page=user">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
        
        <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['nama']; ?></td>
            </tr>
            <tr>
                <td width="200">Kelas</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="200">Tanggal Login</td>
                <td width="1">:</td>
                <td><?php echo date('d-m-Y'); ?></td>
            </tr>

        </table>
    </div>
</div>
<?php
if($_SESSION['user']['level'] == 'admin'): ?>
<h3><b>Grafik Statistic Penggunjung</b></h3>
<div class="row">
						<div class="card mt-3">
							<div class="card-body">
								<div class="card-header">
									<h5 class="card-title">Aktivitas Peminjaman</h5>
									<h6 class="card-subtitle text-muted">Statistik ini Berdasarkan Aktivitas Tahun 2024</h6>
								</div>
								<div class="card-body">
									<div class="chart">
										<canvas id="chartjs-line"></canvas>
									</div>
								</div>
							</div>
						</div>
                        <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Line chart
			new Chart(document.getElementById("chartjs-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Peminjaman",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.primary,
						data: [2115, 1562, 1588, 1892, 1487, 2223, 2966, 2448, 2024, 3838, 2917, 3327]
					}, {
						label: "Pengembalian",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.success,
						data: [958, 724, 629, 889, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
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
								color: "rgba(0,0,0,0.05)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 500
							},
							display: true,
							borderDash: [5, 5],
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>
    <?php
endif;
?>