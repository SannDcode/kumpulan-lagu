<?php 
require_once("koneksi.php");
session_start();
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
    
	<!--start: Header -->
	<?php include 'header.php'; ?>
	<!--end: Header-->
	
	<?php
@$aksi = $_GET['aksi'];
$tanggal = date("d-m-Y");
if($aksi=="checkout")
{?>
  <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Checkout</b>
</div><br>
<form action="proses_checkout.php" method="post">
<label>Nama Penerima</label>
<input type="text" name="nama" placeholder="Nama Anda" class="form-control">
<label>Alamat Lengkap</label>
<input type="text" name="alamat" placeholder="jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
<label>Nomor Telepon</label>
<input type="text" name="tlp" placeholder="Nomor Telepon Anda" class="form-control"><br>
<label>Tanggal</label>
<input type="text" name="tanggal"  class="form-control" value="<?php echo $tanggal; ?>" readonly>
<input type="submit" class="btn btn-info" value="selesai">
</form> 
 <?php }else{
    @$hal = $_GET['hal'];
    if($hal=="keranjang"){
      include("keranjang.php");
      include 'footer.php';
    } elseif ($hal=="checkout"){
    	include 'checkout.php';
    	include 'footer.php';
    } else {?>

<!--start: Wrapper-->
<div id="wrapper">
			
	<!--start: Container -->
	<div class="container"> 

    	<!-- start: Row -->
  		<div class="row">
			<?php   
            include 'koneksi.php';               
			$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$_GET[kd]'");
			$data  = mysqli_fetch_array($query);
			?>
    		<div class="col-md-3" style="margin:30px;">
        		<img src="gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
      		</div>
      		<div class="col-md-6" style="margin-left:10px ; margin-top:30px;">
		        <table>
		          <tr>
		            <td><h4><b>Nama</b></td></h4>   <td><h4>: <?php echo $data['nama_brg']; ?></td></h4>
		          </tr>

		          <tr>
		            <td><h4><b>Satuan</b></td></h3>    <td><h4>: <?php echo $data['satuan']; ?></td></h4>
		          </tr>

		          <tr>
		            <td><h4><b>Harga</b></td></h4>   <td><h4>: Rp <?php echo number_format($data['harga'],0,",",".");?></td></h4>
		          </tr>

		          <tr>
		            <td><h4><b>Stok</b></td></h4>    <td><h4>: <?php echo $data['stok']; ?></td></h4>
		          </tr>

		          <tr>
		            <td><h4><b>Keterangan</b></td></h4>    <td><h4>: <?php echo $data['ket']; ?></td></h4>
		          </tr>

		        </table><br><br>

		      	<?php if(isset($_SESSION['id_user'])){ ?>
	        	<form action="tambah_keranjang.php" method="post" >

	              <input type="number" name='qty' value="0" min="0" max="<?php echo $data['stok']; ?>" style="width:63px; height:20px; margin-bottom:0px;">
	              <input type="hidden" name='harga' value="<?php echo $data['harga'];?>">
	              <input type="hidden" name='nama_brg' value="<?php echo $data['nama_brg'];?>">
	              <?php if($data['stok']==0){ ?>
	                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
	                <?php }else{?>
	         		<button type="submit" class="btn btn-success">Beli</button>
	         	<?php } 
	         	} else { ?>
	         		<a href="login.php" class="btn btn-warning">Login untuk membeli</button></a>
	         	<?php } ?>
	         	</form>
        	</div>
  		</div>
		<!--end: Row-->
	</div>
	<!--end: Container-->	
	
</div>
<!--end: Wrapper-->
<!-- start: Footer -->
<?php include 'footer.php'; 



    	}}?>

