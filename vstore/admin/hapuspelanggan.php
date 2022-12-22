<?php

$koneksi->query("DELETE FROM user WHERE id_user='$_GET[id]'");

echo "<script> alert('Produk Terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>
