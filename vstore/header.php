    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
        	<div class="span12n">
                <ul class="menu">
                <?php if(isset($_SESSION['id_user'])){ 
                		$nama=$_SESSION['nm_lengkap'];
                		$akses=$_SESSION['akses'];
                	?>
                	<li style="color:#fff;">Selamat datang, <?php echo $nama; ?> [<?php echo $akses; ?>]</li>
                    <li>
                    	<a href="logout.php" class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                <?php }else{ ?>
                    <li><a href="login.php" class="btn btn-primary">Login</a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- *** TOP BAR END *** -->
    
	<!--start: Header -->
	<header class="navbarr">
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row-nav">
					
				<!--start: Logo -->
				<div class="logo span3n">
						
					<a class="brand" href="#"><img src="img/logo.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span10n">
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li class=""><a href="index.php">Beranda</a></li>
			              			<li class="dropdown">
									<a href="" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
										<?php include 'kategori.php'; ?>		
									</li>
			              			<li><a href="kontak.php">Tentang Kami</a></li>
			              			<?php if(isset($_SESSION['id_user'])){ ?>
			              				<li><a href="riwayat.php">Riwayat Transaksi</a></li>
			              				<li><a href="keranjang.php"><span class="icon-shopping-cart"></span> Keranjang [ 
			              				<?php
	                                    include 'koneksi.php'; 
	                                    $id_user=$_SESSION['id_user'];
							          	$qcek=mysqli_query($koneksi,"SELECT * from keranjang where id_user='$id_user'");
							          	$cek=mysqli_num_rows($qcek); 
							          	if ($cek=="0") {
							          		echo "0";
							          	}else {
							          	echo $cek;
							          	}
							            ?> ]</a></li>
			              			<?php } ?>
                                    
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
				</div>
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->