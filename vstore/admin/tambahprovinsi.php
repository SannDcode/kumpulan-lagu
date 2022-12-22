<h2>Tambah Provinsi</h2>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama Provinsi</label>
    <input type="text" class="form-control" name="nama">
  </div>
  <div class="form-group">
    <label>Tarif</label>
    <input type="number" min="0" class="form-control" name="tarif">
  </div>
  <button class="btn btn-primary" name="save">SIMPAN</button>
</form>
<?php
if (isset($_POST['save']))
{
  $koneksi->query("INSERT INTO provinsi
    (nama,tarif)
    VALUES($_POST[nama]','$_POST[tarif]')");

echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=provinsi'>";
}
?>
