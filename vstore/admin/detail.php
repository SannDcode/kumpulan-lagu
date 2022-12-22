<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM checkout JOIN user
  ON checkout.id_user=user.id_user
  WHERE checkout.kd_checkout='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
<p>
  <?php echo $detail['telpon_pelanggan']; ?><br>
  <?php echo $detail['email_pelanggan']; ?>
</p>

<p>
  Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
  Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Subtotal</th>
    </tr>
  </thead>

  <body>
    <?php $nomor = 1; ?>
    <?php $ambil = $koneksi->query("SELECT *FROM pembelian_produk JOIN produk
        ON pembelian_produk.id_produk=produk.id_produk
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama_produk']; ?></td>
        <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
        <td><?php echo $pecah['jumlah']; ?></td>
        <td>Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?></td>
      </tr>
      <?php $nomor++; ?>
    <?php } ?>
  </body>
</table>