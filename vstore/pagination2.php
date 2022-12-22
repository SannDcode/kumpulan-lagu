<!-- LINK FIRST AND PREV -->
<?php
include 'koneksi.php';
@$kategori = $_GET['kategori'];


if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
?>
  <li class="disabled"><a href="#">First</a></li>
  <li class="disabled"><a href="#">&laquo;</a></li>
<?php
}else{ // Jika page bukan page ke 1
  $link_prev = ($page > 1)? $page - 1 : 1;
?>
  <li><a href="index.php?page=1&kategori=<?php echo $kategori;?>">First</a></li>
  <li><a href="index.php?page=<?php echo $link_prev; ?>&kategori=<?php echo $kategori;?>">&laquo;</a></li>
<?php
}
?>

<!-- LINK NUMBER -->
<?php
// Buat query untuk menghitung semua jumlah data

$sql2 = mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM barang where id_kategori='$id_kategori'");
$get_jumlah = mysqli_fetch_array($sql2);

$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
$jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

for($i = $start_number; $i <= $end_number; $i++){
  $link_active = ($page == $i)? ' class="active"' : '';
?>
  <li<?php echo $link_active; ?>><a href="index.php?page=<?php echo $i; ?>&kategori=<?php echo $kategori;?>"><?php echo $i; ?></a></li>
<?php
}
?>

<!-- LINK NEXT AND LAST -->
<?php
// Jika page sama dengan jumlah page, maka disable link NEXT nya
// Artinya page tersebut adalah page terakhir 
if($page == $jumlah_page){ // Jika page terakhir
?>
  <li class="disabled"><a href="#">&raquo;</a></li>
  <li class="disabled"><a href="#">Last</a></li>
<?php
}else{ // Jika Bukan page terakhir
  $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
?>
  <li><a href="index.php?page=<?php echo $link_next; ?>&kategori=<?php echo $kategori;?>">&raquo;</a></li>
  <li><a href="index.php?page=<?php echo $jumlah_page; ?>&kategori=<?php echo $kategori;?>">Last</a></li>
<?php
}

?>