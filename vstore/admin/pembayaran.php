<h2>Data Pembayaran</h2>

<?php
$kd_checkout = $_GET['id'];

$ambil = $koneksi->query("SELECT *FROM pembayaran WHERE kd_checkout = '$kd_checkout'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<div class="row">
  <div class="col-md-6">
    <table class="table">
      <tr>
        <th>Nama</th>
        <td><?php echo $pecah['nama'] ?></td>
      </tr>
      <tr>
        <th>Bank</th>
        <td><?php echo $pecah['bank'] ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td><?php echo $pecah['jumlah'] ?></td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><?php echo $pecah['tgl_pembayaran'] ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <img src="../bukti_tf/<?php echo $pecah['bukti_pembayaran'] ?>" class="img-responsive">
  </div>
</div>


<form method="post">
  <!-- <div class="form-group">
    <label>No Resi Pengiriman</label>
    <input type="text" class="form-control" name="resi" required>
  </div> -->
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <option value="">Pilih Status</option>
      <option value="proses pengecekan">Proses Pengecekan</option>
      <option value="sedang dikirim">Dikirim</option>
      <option value="batal">Batal</option>
    </select>
  </div>
  <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST['proses']))
{
  $koneksi->query("UPDATE checkout SET status_beli='$_POST[status]'
    WHERE kd_checkout='$kd_checkout'");

  echo "<script>alert('data pembelian telah di update');</script>";
  echo "<script>location = 'index.php?halaman=pembelian';</script>";
}
?>
