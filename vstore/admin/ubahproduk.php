<h2>Edit Produk</h2>

<?php
$ambil = $koneksi->query("SELECT *FROM barang WHERE id_barang='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_brg'] ?>" required>
  </div>
  <div class="form-group">
    <label>Harga (Rp)</label>
    <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga'] ?>" required>
  </div>
  <div class="form-group">
    <label>satuan</label>
    <input type="text" class="form-control" name="berat" value="<?php echo $pecah['satuan'] ?>" required>
  </div>
  <div class="form-group">
      <label>Stok</label>
      <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok'] ?>" required>
  </div>
  <div class="form-group">
    <label>Keterangan</label>
    <textarea class="form-control" name="deskripsi" rows="10" required><?php echo $pecah['ket'] ?></textarea>
  </div>
  <div class="from-group">
    <img src="../<?php echo $pecah['gambar']; ?>" width="200">
  </div>
  <div class="form-group">
    <label>Ubah Foto</label>
    <input type="file" class="form-control" name="foto" required>
  </div>
<button class="btn btn-primary" name="ubah">UBAH</button>
</form>
<?php
if (isset($_POST['ubah']))
{
  $nama = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  //jika foto dirubah
  if (!empty($lokasi))
  {
    move_uploaded_file($lokasi, "../gambar/$nama");
    $koneksi->query("UPDATE barang SET nama_brg='$_POST[nama]',harga='$_POST[harga]',
      satuan='$_POST[berat]',stok='$_POST[stok]',gambar='$nama',ket='$_POST[deskripsi]'
      WHERE id_barang='$_GET[id]'");
  }
  else
  {
    $koneksi->query("UPDATE barang SET nama_brg='$_POST[nama]',harga='$_POST[harga]',
      satuan='$_POST[berat]',stok='$_POST[stok]',ket='$_POST[deskripsi]'
      WHERE id_barang='$_GET[id]'");
  }

echo "<div class='alert alert-info'>Data Telah Di Ubah</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
