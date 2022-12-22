<h2>Data Pelanggan</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>E-mail</th>
      <th>Telepone</th>
      <th>Akses</th>
      <th>aksi</th>
    </tr>
  </thead>
  <body>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT *FROM user"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) {?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nm_lengkap']; ?></td>
      <td><?php echo $pecah['email']; ?></td>
      <td><?php echo $pecah['tlp']; ?></td>
      <td><?php echo $pecah['akses']; ?></td>
      <td>
      <a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_user']; ?>" class="btn-danger btn">HAPUS</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </body>
</table>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Pelanggan</a>
