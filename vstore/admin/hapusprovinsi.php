<?php

$koneksi->query("DELETE FROM provinsi WHERE id_provinsi='$_GET[id]'");

echo "<script> alert('provinsi Terhapus');</script>";
echo "<script>location='index.php?halaman=provinsi';</script>";

?>
