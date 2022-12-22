<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION["id_user"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location = 'login.php';</script>";
}
$id_user=$_SESSION['id_user'];
@$aksi = $_GET['aksi'];
$query_cek_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
$cek_keranjang = mysqli_num_rows($query_cek_keranjang);

$qrykd =mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && id_tujuan=0");
		$data_kd = mysqli_fetch_array($qrykd);
		$kd_checkout = $data_kd['kd_checkout'];

if($aksi=="hapus")
{

	$idker = $_GET['id'];
	$qryker =mysqli_query($koneksi,"SELECT * from keranjang where id_keranjang='$idker'");
	$data_ker=mysqli_fetch_array($qryker);
	$qty1 = $data_ker['qty'];
	$nama_brg=$data_ker['nama_brg'];
	$qrystok =mysqli_query($koneksi,"SELECT * from barang where nama_brg='$nama_brg'");
	$data_stok = mysqli_fetch_array($qrystok);
	$qty2 = $data_stok['stok'];
	$stokakhir = $qty1+$qty2;

	mysqli_query($koneksi,"UPDATE barang set stok='$stokakhir' where nama_brg='$nama_brg'");
	mysqli_query($koneksi,"DELETE from keranjang where id_keranjang='$idker'");
	mysqli_query($koneksi,"DELETE from pembelian where id_keranjang='$idker'");
	$query_cek_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
	$cek_keranjang = mysqli_num_rows($query_cek_keranjang);
	if ($cek_keranjang==0) {
		// $qrykd =mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && id_tujuan=0");
		// $data_kd = mysqli_fetch_array($qrykd);
		// $kd_checkout = $data_kd['kd_checkout'];
		mysqli_query($koneksi,"DELETE from checkout where kd_checkout='$kd_checkout'");
	}

}


$qrykeranjang = mysqli_query($koneksi,"SELECT * from keranjang where nama_brg='$nama_brg'");
$qryttl = mysqli_fetch_array($qrykeranjang);
$ttl_harga = $qryttl['total_harga'];

$qry = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>VS | VeithaKumaira</title> 
	<meta name="description" content="Toko, Bekasi, terlengkap, information, pakaian, kaoskaki, baru, murah"/>
	<meta name="keywords" content="Kaoskaki, Muslim, cewek, Murah, Bekasi, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="M"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
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
<?php include 'header.php';?>
              <!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><span>Keranjang Belanja</span></h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
  <!-- end: Page Title -->
<div class="container">
<table class="table table-stiped">
<th>Nama produk</th>
<th><center>Harga</center></th>
<th><center>Qty</center></th>
<th><center>Subtotal harga</center></th>
<th><center>Aksi</center></th>
<?php
 while($isi_keranjang = mysqli_fetch_array($qry)){ ?>
<tr>
	<td><?php $nama_brg = $isi_keranjang['nama_brg']; 
		$qrybrg=mysqli_query($koneksi,"SELECT * from barang where nama_brg='$nama_brg'")or die (mysql_error());
		$data_barang=mysqli_fetch_array($qrybrg);
		$nama_brg = $data_barang['nama_brg'];
		echo $nama_brg;?></td>
	<td><center>Rp.<?php echo number_format($isi_keranjang['harga'],0,",","."); ?>,-</center></td>
	<td><center><?php echo $isi_keranjang['qty'];  ?></center></td>
	<td><center>Rp.<?php echo number_format($isi_keranjang['total_harga'],0,",",".");  ?>,-</center></td>
	<td><center>
	<a href="keranjang.php?aksi=hapus&id=<?php echo $isi_keranjang['id_keranjang']; ?>"><span class="glyphicon glyphicon-remove"></span></a></center></td>
</tr>
<?php } 
$qttlb = mysqli_query($koneksi,"SELECT SUM(total_harga) as total_bayar from keranjang where id_user='$id_user'");
$byr = mysqli_fetch_array($qttlb);
$b = $byr['total_bayar'];
$qryakses=mysqli_query($koneksi,"SELECT * from user where id_user='$id_user'");
$data_akses=mysqli_fetch_assoc($qryakses);
$akses=$data_akses['akses'];
if ($akses="reseller") {
	$diskon=10/100;
} elseif ($akses="agen") {
	$diskon=15/100;
} elseif ($akses="distributor") {
	$diskon=20/100;
}
$diskonhrg=$b*$diskon;
$tot_akhir=$b-$diskonhrg;
mysqli_query($koneksi,"UPDATE checkout set diskon='$diskonhrg' where id_user='$id_user' && kd_checkout='$kd_checkout'");
?>
<tr>
	<td colspan="2" style="text-align:center;"><b>Diskon</b> [Rp <?php echo number_format($diskonhrg,0,",","."); ?>]</td><td><center><b>Total</b> </center></td><td><center>Rp.<?php echo number_format($tot_akhir,0,",","."); ?>,-</center></td>
	<td><center><a href="index.php" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
	<?php if ($cek_keranjang>=1) { ?>
	<a href="checkout.php" class="btn btn-primary"><span class="glyphicon glyphicon-paste"> Checkout</span></a></center></td>	
	<?php } ?>
	
</tr>
</table>
</div>
<?php include 'footer.php'; ?>