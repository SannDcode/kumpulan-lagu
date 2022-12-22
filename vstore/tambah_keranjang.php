<?php
include"koneksi.php";
session_start();
if (!isset($_SESSION["id_user"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location = 'login.php';</script>";
}
$id_user=$_SESSION['id_user'];
$query_cek_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
$cek_keranjang = mysqli_num_rows($query_cek_keranjang);
$nama_brg = $_POST['nama_brg'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$total_harga = $qty*$harga;

$query_stok = mysqli_query($koneksi,"SELECT * from barang where nama_brg='$nama_brg'");
$data_stok = mysqli_fetch_array($query_stok);
$stok = $data_stok['stok'];
$stok_ubah = $stok-$qty;
mysqli_query($koneksi,"UPDATE barang set stok='$stok_ubah' where nama_brg='$nama_brg'");


$query_nama_brg = mysqli_query($koneksi,"SELECT * FROM keranjang where id_user='$id_user' && nama_brg='$nama_brg'");
$data_nama_brg = mysqli_fetch_array($query_nama_brg);
$nmbrg = $data_nama_brg['nama_brg'];
$tanggal = date("dmY");
$kode1 = rand();
$kode=$tanggal.$kode1;
if($cek_keranjang>=1)
{
	if($nama_brg==$nmbrg)
	{
	$query_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user' && nama_brg='$nama_brg'");
	$data_keranjang = mysqli_fetch_array($query_keranjang);
	$qty_asli = $data_keranjang['qty'];
	$qty_ubah = $qty_asli+$qty;
	$total_harga_ubah = $harga*$qty_ubah;
	mysqli_query($koneksi,"UPDATE keranjang set qty='$qty_ubah',total_harga='$total_harga_ubah' where nama_brg='$nama_brg'");
	mysqli_query($koneksi,"UPDATE pembelian set qty='$qty_ubah',total_harga='$total_harga_ubah' where nama_brg='$nama_brg'");
	header("location:keranjang.php");
	}
	else{
		$qcek_kd_checkout=mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && total_byr=0");
		$cek_kd_checkout = mysqli_num_rows($qcek_kd_checkout);
		if ($cek_kd_checkout==0) {
			mysqli_query($koneksi,"INSERT into checkout set kd_checkout='$kode',id_user='$id_user'");
			$data_checkout=mysqli_fetch_array($qcek_kd_checkout);
			$kd_checkout=$data_checkout['kd_checkout'];

		} elseif ($cek_kd_checkout>=1) {
			$data_checkout=mysqli_fetch_array($qcek_kd_checkout);
			$kd_checkout=$data_checkout['kd_checkout'];
		}
	
	mysqli_query($koneksi,"INSERT into keranjang set id_user='$id_user',nama_brg='$nama_brg',qty='$qty',harga='$harga',total_harga='$total_harga'");
	$query_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user' && nama_brg='$nama_brg'");
	$data_keranjang = mysqli_fetch_array($query_keranjang);
	$id_keranjang=$data_keranjang['id_keranjang'];
	mysqli_query($koneksi,"INSERT into pembelian set kd_checkout='$kd_checkout',id_keranjang='$id_keranjang',id_user='$id_user',nama_brg='$nama_brg',qty='$qty',harga='$harga',total_harga='$total_harga'");
	header("location:keranjang.php");
	}
}else if($cek_keranjang==0){
	$qcek_kd_checkout=mysqli_query($koneksi,"SELECT * from checkout where kd_checkout='$kd_checkout'");
		$cek_kd_checkout = mysqli_num_rows($qcek_kd_checkout);
		if ($cek_kd_checkout==0) {
			mysqli_query($koneksi,"INSERT into checkout set kd_checkout='$kode',id_user='$id_user'");
			$qcek_kd_checkout=mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && total_byr=0");
			$data_checkout=mysqli_fetch_array($qcek_kd_checkout);
			$kd_checkout=$data_checkout['kd_checkout'];

		} elseif ($cek_kd_checkout>=1) {
			$qcek_kd_checkout=mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && total_byr=0");
			$data_checkout=mysqli_fetch_array($qcek_kd_checkout);
			$kd_checkout=$data_checkout['kd_checkout'];
		}
	
	mysqli_query($koneksi,"INSERT into keranjang set id_user='$id_user',nama_brg='$nama_brg',qty='$qty',harga='$harga',total_harga='$total_harga'");
	$query_keranjang = mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user' && nama_brg='$nama_brg'");
	$data_keranjang = mysqli_fetch_array($query_keranjang);
	$id_keranjang=$data_keranjang['id_keranjang'];
	mysqli_query($koneksi,"INSERT into pembelian set kd_checkout='$kd_checkout',id_keranjang='$id_keranjang',id_user='$id_user',nama_brg='$nama_brg',qty='$qty',harga='$harga',total_harga='$total_harga'");
	header("location:keranjang.php");
}
?>