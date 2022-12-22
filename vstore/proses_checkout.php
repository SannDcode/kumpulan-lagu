<?php
include"koneksi.php";
session_start();
if (!isset($_SESSION["id_user"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location = 'login.php';</script>";
}
$id_user=$_SESSION['id_user'];
$kd_checkout = $_POST['kd_checkout'];
$penerima = $_POST['penerima'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$pos = $_POST['pos'];
$desa = $_POST['desa'];
$nm_perum=$_POST['nm_perum'];
$tgl_order = $_POST['tgl'];
$telpon = $_POST['telpon'];
$qry_prov = mysqli_query($koneksi,"SELECT * from provinsi where nm_provinsi='$provinsi'");
$data_prov = mysqli_fetch_assoc($qry_prov);
$tarif = $data_prov['tarif'];
$qttlb = mysqli_query($koneksi,"SELECT SUM(total_harga) as total_bayar from pembelian where kd_checkout='$kd_checkout'");
$byr = mysqli_fetch_assoc($qttlb);
$b = $byr['total_bayar'];
$qrydis=mysqli_query($koneksi,"SELECT * from checkout where kd_checkout='$kd_checkout'");
$data_dis=mysqli_fetch_assoc($qrydis);
$diskonhrg=$data_dis['diskon'];
$tot_akhir=$b-$diskonhrg;
$total_bayar=$tot_akhir+$tarif;
mysqli_query($koneksi,"INSERT into tujuan set kd_checkout='$kd_checkout',nm_penerima='$penerima',provinsi='$provinsi',kabupaten='$kabupaten',kecamatan='$kecamatan',desa='$desa',nm_perum='$nm_perum',kd_pos='$pos',tlp='$telpon',tarif='$tarif'");
mysqli_query($koneksi,"DELETE from keranjang where id_user='$id_user'");
$qrypenerima=mysqli_query($koneksi,"SELECT * from tujuan where kd_checkout='$kd_checkout'");
$data_tu=mysqli_fetch_assoc($qrypenerima);
$id_tujuan=$data_tu['id_tujuan'];
mysqli_query($koneksi,"UPDATE checkout set id_tujuan='$id_tujuan',total_byr='$total_bayar',tgl_order='$tgl_order' where kd_checkout='$kd_checkout'");

echo "<script>location = 'nota.php?id=$kd_checkout';</script>";
?>