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

  <?php include 'header.php'; ?>

  <div id="wrapper">
    <div class="container">

        <!--nota -->
        <h2>Nota Pembelian</h2>

        <?php
        $qrykd = mysqli_query($koneksi,"SELECT * FROM checkout JOIN tujuan ON checkout.kd_checkout=tujuan.kd_checkout WHERE checkout.kd_checkout='$_GET[id]'");
        $data_kd = mysqli_fetch_assoc($qrykd);
        $kd_checkout=$data_kd['kd_checkout'];
        $id_id_user_beli = $data_kd['id_user'];
$id_id_user_login = $_SESSION['id_user'];

if ($id_id_user_beli!==$id_id_user_login)
{
  echo "<script>alert ('Maaf data tidak cocok');</script>";
  echo "<script>location ='riwayat.php';</script>";
}
        ?>

         
          <div class="row">
            <div class="col-md-4">
              <h3>Transaksi</h3>
              <strong>Kode Transaksi : <?php echo $data_kd['kd_checkout'];; ?></strong> <br>
              <p>Tanggal : <?php echo $data_kd['tgl_order']; ?> <br>
              Total : Rp <?php echo number_format($data_kd['total_byr']);?><br>
              Status : <?php echo $data_kd['status_beli']; ?>
              </p>
            </div>
            <div class="col-md-7">
              <h3>Alamat Pengiriman</h3>
              <strong>Nama Penerima : <?php echo $data_kd['nm_penerima'] ?></strong> <br>
              Alamat :  <br>
              <?php echo $data_kd['nm_perum']." ".$data_kd['desa']; ?><br>
              <?php echo $data_kd['kecamatan']." ".$data_kd['kabupaten']." ".$data_kd['provinsi']." ".$data_kd['kd_pos'];?><br>
              No. Telepon : <?php echo $data_kd['tlp']; ?><br>
            </div>
          </div>

          <table class="table table-stiped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal harga</th>
              </tr>
            </thead>
              <?php 
              $nomor=1;
              $qrypem =mysqli_query($koneksi,"SELECT *FROM pembelian WHERE kd_checkout='$_GET[id]'");
              $qrysum=mysqli_query($koneksi,"SELECT SUM(total_harga) as tot_h from pembelian WHERE kd_checkout='$_GET[id]'");
              $data_sum=mysqli_fetch_assoc($qrysum);
              while ($data_pem= mysqli_fetch_assoc($qrypem)) {?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $data_pem['nama_brg']; ?></td>
                  <td><?php echo $data_pem['qty']; ?></td>
                  <td>Rp <?php echo number_format($data_pem['harga']); ?></td>
                  <td>Rp <?php echo number_format($data_pem['total_harga']); ?></td>
                </tr>
                <?php 
                $nomor++;
                } ?>
                <tr>
                  <td colspan="4" style="text-align:center;">
                    <b>Total Harga</b>
                  </td>
                  <td>Rp <?php echo number_format($data_sum['tot_h'],0,",","."); ?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:center;">
                    <b>Diskon</b>
                  </td>
                  <td>Rp <?php echo number_format($data_kd['diskon'],0,",","."); ?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:center;">
                    <b>Ongkos Kirim</b>
                  </td>
                  <td>Rp <?php echo number_format($data_kd['tarif'],0,",","."); ?></td>
                </tr>
                <tr>
                <td colspan="4" style="text-align:center;">
                    <b>Total Pembayaran</b>
                  </td>
                  <td>Rp <?php echo number_format($data_kd['total_byr'],0,",","."); ?></td>
                </tr>                
              </body>
            </table>

            <div class="row">
              <div class="col-md-7">
                <div class="alert alert-info">
                  <p>
                    Silahkan melakukan pembayaran Rp <?php echo number_format($data_kd['total_byr']); ?>
                    ke <br>
                    <strong>BANK MANDIRI 0884-6213-5 A/N Rizky Nugraha Pratama</strong>
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <a href="pembayaran.php?id=<?php echo $data_kd['kd_checkout'] ?>" class="btn btn-success">Kirim Bukti Pembayaran</a>
              </div>
            </div>

          </div>
        </div>
<?php include 'footer.php';?>
