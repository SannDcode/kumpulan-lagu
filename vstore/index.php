<?php
require_once "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>VS | Viethahumaira.store</title>
	<meta name="description" content="Toko, Bekasi, terlengkap, information, pakaian, kaoskaki, baru, murah" />
	<meta name="keywords" content="Kaoskaki, Muslim, cewek, Murah, Bekasi, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="M" />
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<!-- end: Facebook Open Graph -->

	<!-- start: CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<link rel="shortcut icon" href="favicon.png">
	<!-- end: CSS -->

</head>

<body>
	<?php include 'header.php'; ?>
	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<div class="da-img"><img src="img/parallax-slider/theboy.jpg" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<!-- <h2>Komik</h2>
				<p>Kami memiliki banyak koleksi komik mulai dari fantasi, romantic dan masih banyak lagi.</p>
				<a href="#" class="da-link">Lihat Produk</a> -->
				<div class="da-img"><img src="img/slider/slider2.jpg" alt="image02" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>

	</div>
	<!-- end: Slider -->

	<!--start: Wrapper-->
	<div id="wrapper">

		<!--start: Container -->
		<div class="container content">
			<div class="row">
				<div class="carikiri">
					<form action="index.php" method="get" style="margin-bottom:0;">
						<input type="text" name="nama" placeholder="Cari nama barang yang anda inginkan disini.." class="cari">
						<button type="submit" name="cari" value="cari" class="btn tombolcari"><span class="glyphicon glyphicon-search"></span></button>
					</form>

					<?php
					@$cari = $_GET['cari'];
					if ($cari) {
						$nama = $_GET['nama'];
						$qry_cari_brg = mysqli_query($koneksi, "SELECT * from barang where nama_brg like '%$nama%'");
						while ($data = mysqli_fetch_array($qry_cari_brg)) {
					?>
							<div class="span2n">
								<div class="icons-box"><a href="detailproduk.php?kd=<?php echo $data['id_barang']; ?>">
										<div class="title">
											<h4><?php echo $data['nama_brg']; ?></h4>
										</div>
										<img src="gambar/<?php echo $data['gambar']; ?>" />
									</a>
									<div>
										<h5>Rp.<?php echo number_format($data['harga'], 0, ",", "."); ?></h5>
									</div>
									<div>
										<h5><?php if ($data['stok'] >= 1) {
												echo '<strong style="color: blue;">In Stock</strong>';
											} else {
												echo '<strong style="color: red;">Out Of Stock</strong>';
											}; ?></h5>
									</div>
									<div class="clear">
									</div>
								</div>
							</div>
						<?php }
					} else {
						?>
				</div>
			</div>

			<!-- start: Row -->
			<div class="row">
				<?php
						@$id_kategori = $_GET['kategori'];

						// Cek apakah terdapat data page pada URL
						$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
						$limit = 7; // Jumlah data per halamannya

						// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
						$limit_start = ($page - 1) * $limit;

						$query = mysqli_query($koneksi, "select * from barang LIMIT $limit_start, $limit") or die(mysql_error);
						$sql = mysqli_query($koneksi, "SELECT * FROM barang where id_kategori='$id_kategori' limit $limit_start, $limit");



						if ($id_kategori == 0) {
							while ($data = mysqli_fetch_array($query)) {
				?>
						<div class="span2n">
							<div class="icons-box"><a href="detailproduk.php?kd=<?php echo $data['id_barang']; ?>">
									<div class="title">
										<h4><?php echo $data['nama_brg']; ?></h4>
									</div>
									<img src="gambar/<?php echo $data['gambar']; ?>" />
								</a>
								<div>
									<h5>Rp.<?php echo number_format($data['harga'], 0, ",", "."); ?></h5>
								</div>
								<div>
									<h5><?php if ($data['stok'] >= 1) {
											echo '<strong style="color: blue;">In Stock</strong>';
										} else {
											echo '<strong style="color: red;">Out Of Stock</strong>';
										}; ?></h5>
								</div>
								<div class="clear">
								</div>
							</div>
						</div>
					<?php }
						} else {
							while ($data = mysqli_fetch_array($sql)) {
					?>
						<div class="span2n">
							<div class="icons-box"><a href="detailproduk.php?kd=<?php echo $data['id_barang']; ?>">
									<div class="title">
										<h4><?php echo $data['nama_brg']; ?></h4>
									</div>
									<img src="gambar/<?php echo $data['gambar']; ?>" />
								</a>
								<div>
									<h5>Rp.<?php echo number_format($data['harga'], 0, ",", "."); ?></h5>
								</div>
								<div>
									<h5><?php if ($data['stok'] >= 1) {
											echo '<strong style="color: blue;">In Stock</strong>';
										} else {
											echo '<strong style="color: red;">Out Of Stock</strong>';
										}; ?></h5>
								</div>
								<div class="clear">
								</div>
							</div>
						</div>

				<?php }
						} ?>
			</div>
			<?php
						if ($id_kategori == 0) { ?>
				<div class="row">
					<div class="center">
						<div class="pagination">
							<ul>
								<?php include 'pagination1.php'; ?>
							</ul>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="row">
					<div class="center">
						<div class="pagination">
							<ul>
								<?php include 'pagination2.php'; ?>
							</ul>
						</div>
					</div>
				</div>;
		<?php }
					} ?>



		<!-- end: Row -->
		</div>
		<!--end: Container-->

	</div>
	<!-- end: Wrapper  -->
	<?php include 'footer.php'; ?>