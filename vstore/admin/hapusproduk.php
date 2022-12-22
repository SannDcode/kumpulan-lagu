<?php
$ambil = $koneksi->query("SELECT *FROM barang WHERE id_barang='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../$gambar"))
{
  unlink("../$gambar");
}

$koneksi->query("DELETE FROM barang WHERE id_barang='$_GET[id]'");

echo "<script> alert('barang Terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>
