<?php
require_once 'koneksi.php';
session_start();
if(isset($_SESSION['user'])){
header('Location:/index.php');
};

//for regist

if(isset($_POST['daftar'])){
$nama=$_POST['nm_lengkap'];
$username=$_POST['nm_usr'];
$password=$_POST['pas_usr'];
$email=$_POST['email_usr'];
$alamat=$_POST['almt_usr'];
$telepon=$_POST['tlp'];


include 'koneksi.php';
$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE nm_usr='".$username."'")or die(mysql_error());
if(mysqli_num_rows($cek) > 0){
  echo("<script>alert('Maaf, username telah digunakan!');</script>");
}else{

$query = mysqli_query($koneksi,"INSERT INTO user VALUES
('', '$nama', '$username', '$password','$email', '$alamat', '$telepon')") or die(mysql_error());

if($query){
  echo("<script>alert('Daftar Berhasil.');</script>");
  
}else{
  echo("<script>alert('Daftar Gagal.');</script>");
}
}
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

    <div id="all">

        <div id="content">
            <div class="container">
                <div class="box-reg center">
                    <h1>AKUN BARU</h1>

                    <p class="lead">Not our registered customer yet?</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="kontak.php">contact us</a>, our customer service center is working for you 24/7.</p>

                    <hr>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="nm_lengkap" class="form-control" id="name" required="Silahkan lengkapi" >
                        </div>
                        <div class="form-group">
                            <label for="nm_usr">Username</label>
                            <input type="text" name="nm_usr" class="form-control" id="nm_usr" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="pas_usr" class="form-control" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email_usr" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telephone</label>
                            <input type="text" name="tlp" class="form-control" id="telepon" required>
                        </div>
                        
                        <div class="input-group">
                        <label>Address</label>
                        <textarea name="almt_usr" cols="65" class="form-control" id="alamat" required></textarea>
                        </div>

                        
                        <div class="text-center">
                            <button type="submit" name= "daftar" class="btn btn-primary" ><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER *** -->
        <?php include 'footer.php'; ?>