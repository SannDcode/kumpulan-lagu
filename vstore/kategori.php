<?php include 'koneksi.php'; 
										$querykat=mysqli_query($koneksi,"select * from kategori") or die(mysql_error()); ?>
										<ul class="dropdown-menu">
										<?php while ($kategori = mysqli_fetch_assoc($querykat)) {
											?>
											<li><a href="index.php?kategori=<?php echo $kategori['id_kategori'] ?>"><span class="glyphicon glyphicon-list"></span> <?php echo $kategori['nama_kat'] ?></a></li>
										<?php } ?>
										</ul>