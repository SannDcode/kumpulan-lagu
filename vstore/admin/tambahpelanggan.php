<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama">
  </div>
  <div class="form-group">
    <label>E-mail</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
    <label>No Telepone</label>
    <input type="number" class="form-control" name="notelp">
  </div>
  <div class="form-group">
    <label>Akses</label>
    <select class="form-control" name="akses">
      <option value="">Pilih Status</option>
      <option value="reseller">Reseller</option>
      <option value="agen">Agen</option>
      <option value="distributor">Distributor</option>
    </select>
  </div>
  <button class="btn btn-primary" name="save">SIMPAN</button>
</form>
<?php
if (isset($_POST['save']))
{
  $koneksi->query("INSERT INTO user
    (email,password,nm_lengkap,tlp,username,akses)
    VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[notelp]','$_POST[username]','$_POST[akses]')");

echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>
