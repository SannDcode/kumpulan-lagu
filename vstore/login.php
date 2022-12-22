<?php
@$pesan = $_GET['pesan'];
if($pesan=="gagal")
{
echo"<script type='text/javascript'>
  alert('Username or password not valid');
</script>";
}
else if($pesan=="berhasil")
{
echo"<script type='text/javascript'>
  alert('anda berhasil mendaftar, silahkan login');
</script>";

 }
else if($pesan=="a")
{
echo"<script type='text/javascript'>
  alert('Anda harus melakukan LOGIN terlebih dahulu sebelum melakukan pemesanan');
</script>";

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

<?php include 'header.php' ; ?>

        <div id="wrapper">
            <div class="container">
                <div class="box-login center">
                        <div class="title-login"><h1>LOGIN</h1></div>
                        <!-- <p class="text-muted">Silahkan masukkan username dan password anda!</p> -->
                        <!-- <hr> -->

                        <form action="login_act.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" placeholder="Username" class="form-control" id="username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                        <hr>
                        <p>Belum mempunyai akun? silahkan daftar <a href="register.php">disini</a></p>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->

    <?php include 'footer.php'; ?>
