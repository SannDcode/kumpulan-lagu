<h2>Data Pembelian</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Tanggal</th>
      <th>Status Pembayaran</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <body>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT *FROM checkout JOIN user ON checkout.id_user=user.id_user where checkout.total_byr>0"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) {?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nm_lengkap']; ?></td>
      <td><?php echo $pecah['tgl_order']; ?></td>
      <td><?php echo $pecah['status_beli'] ?></td>
      <td>Rp. <?php echo number_format($pecah['total_byr'],0,",","."); ?></td>
      <td>
      <a href="index.php?halaman=detail&id=<?php echo $pecah['kd_checkout'];?>" class="btn-info btn">DETAIL</a>
      <?php if ($pecah['status_beli']=='proses pengecekan') { ?>
        <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['kd_checkout'] ?>" class="btn btn-success">PEMBAYARAN</a>
      <?php } ?>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </body>
</table>
