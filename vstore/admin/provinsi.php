<h2>Data Provinsi</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Tarif</th>
      <th>aksi</th>
    </tr>
  </thead>
  <body>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT *FROM provinsi"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) {?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nm_provinsi']; ?></td>
      <td><?php echo $pecah['tarif']; ?></td>
      <td>
      <a href="index.php?halaman=hapusprovinsi&id=<?php echo $pecah['id_provinsi']; ?>" class="btn-danger btn">HAPUS</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </body>
</table>

<a href="index.php?halaman=tambahprovinsi" class="btn btn-primary">Tambah Pelanggan</a>
