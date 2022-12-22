<?php 
include 'koneksi.php';
session_start();
if (!isset($_SESSION['id_user']))
{
  echo "<script>alert ('Silahkan login terlebih dahulu');</script>";
  echo "<script>location = 'login.php';</script>";
}

$kd_checkout = $_GET["id"];
$qrykd =mysqli_query($koneksi,"SELECT *FROM checkout WHERE kd_checkout ='$kd_checkout'");
$data_kd = mysqli_fetch_assoc($qrykd);

$id_id_user_beli = $data_kd['id_user'];
$id_id_user_login = $_SESSION['id_user'];

if ($id_id_user_beli!==$id_id_user_login)
{
  echo "<script>alert ('Maaf data tidak cocok');</script>";
  echo "<script>location ='nota.php?id=$kd_checkout';</script>";
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <?php include 'header.php'; ?>

  <div class="container">
    <h2>Konfirmasi pembayaran</h2>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="alert alert-info"> Total tagihan anda
      <strong>Rp. <?php echo number_format($data_kd['total_byr']) ?></strong>
    </div>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Penyetor</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="form-group">
        <label>Bank</label>
        <input type="text" class="form-control" name="bank" required>
      </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="number" min="1" class="form-control" name="jumlah" required>
      </div>
      <div class="form-group">
        <label>Foto Bukti Pembayaran</label>
        <input type="file" class="form-control" name="bukti" required>
        <p class="text-danger">Foto bukti maksimal 2MB</p>
      </div>
      <button class="btn btn-primary" name="kirim">Kirim</button>
    </form>
  </div>


  <?php
  if (isset($_POST['kirim']))
  {
    $nama = $_FILES['bukti']['name'];
    $lokasi = $_FILES['bukti']['tmp_name'];
    $namabukti = date("YmdHis").$nama ;
    move_uploaded_file($lokasi, "bukti_tf/$namabukti");

    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date("Y-m-d");

    mysqli_query($koneksi,"INSERT INTO pembayaran
      (kd_checkout,nama,bank,jumlah,tgl_pembayaran,bukti_pembayaran)
      VALUES ('$kd_checkout','$nama','$bank','$jumlah','$tanggal','$namabukti')");

      mysqli_query($koneksi,"UPDATE checkout SET status_beli='proses pengecekan'
        WHERE kd_checkout='$kd_checkout'");

        echo "<script>alert ('Terima kasih telah mengirimkan bukti pembayaran');</script>";
        echo "<script>location ='riwayat.php';</script>";
      }
      ?>

      <?php include 'footer.php';?>
