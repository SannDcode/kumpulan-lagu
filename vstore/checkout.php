<?php
include 'koneksi.php';
session_start();
$id_user=$_SESSION['id_user'];
if (!isset($_SESSION["id_user"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location = 'login.php';</script>";
}
$qcek=mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
$cek=mysqli_num_rows($qcek); 
if ($cek=="0") {
    echo "<script>alert('maaf keranjang anda kosong');</script>";
    echo "<script>location = 'index.php';</script>";
}
$tanggal = date('Y-m-d');
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
<?php include 'header.php';
$query_kd_checkout = mysqli_query($koneksi,"SELECT * from checkout where id_user='$id_user' && status_beli='belum bayar' && total_byr=0");
$data_kd_checkout = mysqli_fetch_array($query_kd_checkout);
$kd_checkout = $data_kd_checkout['kd_checkout'];
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Check Out Pembelian</h2>
<form action="proses_checkout.php" method="post" style="margin-bottom:0;">
</div>
<div class="col-md-4">
    <div class="form-group" style="margin-top:10px;">
        <label for="">Kode Pembelian Anda</label>
        <input type="text" name="kd_checkout" value="<?php echo $kd_checkout; ?>"  class="form-control" readonly/>
    </div>
    <div class="form-group">
        <label for="Modal Name">Tanggal Pembelian</label>
        <input type="text" name="tgl" value="<?php echo $tanggal; ?>" class="form-control" readonly>
    </div>
    <div class="form-group" >
        <label for="">Nama Penerima*</label>
        <input type="text" name="penerima"  class="form-control" required />
    </div>
    <div class="form-group">
        <label for="Modal Name">No Telpon*</label>
        <input type="number" min="0" name="telpon"  class="form-control" required />
    </div>
</div>
<div class="col-md-4">
    <div class="form-group" style="margin-top:10px;">
        <label for="Modal Name">Alamat*</label>
        <textarea rows="4" name="nm_perum" placeholder="nama perumahan/jalan/blok/rt&rw" class="form-control" required></textarea>
    </div>
    <div class="form-group">
    <label for="Modal Name">Provinsi*</label>
    <select class="form-control" name="provinsi" required>
        <option value="">--pilih provinsi--</option>
        <?php
        $qryprov = mysqli_query($koneksi,"SELECT * from provinsi");
        while($dataprov = mysqli_fetch_assoc($qryprov)){
        ?>
        <option value="<?php echo $dataprov['nm_provinsi']; ?>">
            <?php echo $dataprov['nm_provinsi']; ?> [Rp <?php echo $dataprov['tarif']; ?>]
        </option>
        <?php } ?>
    </select>
    </div>
    <div class="form-group">
        <label for="Modal Name">Kabupaten*</label>
        <input type="text" name="kabupaten"  class="form-control" required />
    </div>
</div>
<div class="col-md-3">
    <div class="form-group" style="margin-top:10px;">
        <label for="Modal Name">Kecamatan*</label>
        <input type="text" name="kecamatan"  class="form-control" required />
    </div>
        <div class="form-group">
        <label for="Modal Name">Desa*</label>
        <input type="text" name="desa"  class="form-control" required />
    </div>
    <div class="form-group">
        <label for="Modal Name">Kode Pos*</label>
        <input type="number" min="0" name="pos"  class="form-control" required />
    </div>
    <div class="form-group" style="margin-top:23px; margin-left:33px ;">
    <button class="btn btn-primary">Lanjut Pembayaran</button>
</div>
</form>    
</div>
</div>
</div>
<?php include 'footer.php'; ?>