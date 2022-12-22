<h2>Tambah Stok Produk</h2>

<?php
$ambil = $koneksi->query("SELECT *FROM barang WHERE id_barang='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>


<form method="post">
  <div class="form-group">
    <label>Tambah Stok</label>
    <input type="number" class="form-control" name="stok" min="1" required>
  </div>
  <button class="btn btn-primary" name="tambah">Tambah</button>
</form>

<?php

if (isset($_POST['tambah']))
{
    $koneksi->query("UPDATE barang SET stok=stok + '$_POST[stok]'
      WHERE id_barang='$_GET[id]'");

echo "<script>alert('Stok produk sudah di tambah')</script>";
echo "<script>location = 'index.php?halaman=produk'</script>";
}
?>
