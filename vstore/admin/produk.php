<h2>Data barang</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Satuan</th>
      <th>Stok</th>
      <th>Keterangan</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <body>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT *FROM barang"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) {?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_brg']; ?></td>
      <td><?php echo $pecah['id_kategori']; ?></td>
      <td>Rp <?php echo number_format($pecah['harga'],0,",","."); ?></td>
      <td><?php echo $pecah['satuan']; ?></td>
      <td><?php echo $pecah['stok']; ?></td>
      <td><?php echo $pecah['ket'] ?></td>
      <td>
          <img src="../gambar/<?php echo $pecah['gambar']; ?>" />
      </td>
      <td>
      <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_barang']; ?>" class="btn-danger btn">HAPUS</a>
      <br> <br> <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_barang']; ?>" class="btn-warning btn">UBAH</a>
      <br> <br> <a href="index.php?halaman=stok&id=<?php echo $pecah['id_barang']; ?>" class="btn btn-primary">Tambah Stok</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </body>
</table>

<a href="index.php?halaman=tambahbarang" class="btn btn-primary">Tambah Data</a>
