<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION["id_user"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location = 'login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
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
                  <!-- start: Page Title -->
  <div id="page-title">

    <div id="page-title-inner">

      <!-- start: Container -->
      <div class="container">

        <h2><span>Riwayat Belanja</span></h2>

      </div>
      <!-- end: Container  -->

    </div>  

  </div>
  <!-- end: Page Title -->
    <section class="riwayat">
        <div class="container">


          <table class="table table-stiped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $nomor=1;
                $id_user = $_SESSION["id_user"];
                $query = mysqli_query($koneksi, "SELECT * FROM checkout WHERE id_user='$id_user' && total_byr>=1");
                while ($data  = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $data["kd_checkout"]; ?></td>
                  <td><?php echo $data["tgl_order"];?></td>
                  <td>
                    <?php echo $data["status_beli"] ?> <br>
                    <?php if (!empty($data['no_resi'])): ?>
                        No Resi : <?php echo $data['no_resi']; ?>
                    <?php endif; ?>
                  </td>
                  <td>Rp. <?php echo number_format($data["total_byr"]) ?></td>
                  <td>
                  <?php 
                  $status=$data['status_beli'];
                  if ($status=="proses pengecekan") {?>
                    <a href="nota.php?id=<?php echo $data['kd_checkout']?>" class="btn btn-info">Nota</a> 
                  <?php } elseif ($status=="belum bayar") {?>
                    <a href="nota.php?id=<?php echo $data['kd_checkout']?>" class="btn btn-info">Nota</a> 
                    <a href="pembayaran.php?id=<?php echo $data['kd_checkout'] ?>" class="btn btn-success">Pembayaran</a>
                  <?php } 
                  ?>
                    
                  </td>
                </tr>
              <?php $nomor++; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </section>
<?php include 'footer.php'; ?>