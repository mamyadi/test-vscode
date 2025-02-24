<?php
include 'database.php';

// Query untuk mengambil semua data dari tabel users
$sql_users = "SELECT * FROM users";
$result_users = $conn -> query($sql_users); // Eksekusi query

if ($result_users -> num_rows <= 0) {
  echo "<div class='alert alert-warning'>Data Identitas tidak ditemukan</div>";
}

// Query untuk mengambil semua data dari tabel riwayat pendidikan
$sql_riwayat_pendidikan = "SELECT * FROM riwayat_pendidikan";
$result_riwayat_pendidikan = $conn -> query($sql_riwayat_pendidikan); // Eksekusi query

if ($result_riwayat_pendidikan -> num_rows <= 0) {
  echo "<div class='alert alert-warning'>Data Riwayat Pendidikan tidak ditemukan</div>";
}

// Query untuk mengambil semua data dari tabel users
$sql_project = "SELECT * FROM project";
$result_project = $conn -> query($sql_project); // Eksekusi query

if ($result_project -> num_rows <= 0) {
  echo "<div class='alert alert-warning'>Data Project tidak ditemukan</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="assets/images/favicon.png" />
  <title>CV - IMAM RIYADI (CRUD)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-4">
    <h1 class="mb-2">Data Identitas Diri</h1>
    <a href="create.php" class="btn btn-primary mb-2">Tambah Identitas</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Deskripsi</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result_users -> fetch_assoc()): ?>
          <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['deskripsi'] ?></td>
            <td>
              <a href="assets/images/<?= $row['foto'] ?>" target="_blank">
              <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="150" style="cursor: pointer;">
            </td>
            <td>
              <!-- Tombol Edit dan Hapus -->
               <div class="d-flex gap-2">
                <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Lihat</a>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
               </div>
            </td>
          </tr>
          <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="container mt-4">
    <h1 class="mb-2">Data Riwayat Pendidikan</h1>
    <a href="create_riwayat_pendidikan.php" class="btn btn-primary mb-2">Tambah Riwayat Pendidikan</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Pendidikan</th>
            <th>Tahun</th>
            <th>Nama Sekolah / Kampus</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result_riwayat_pendidikan -> fetch_assoc()): ?>
            <tr>
              <td><?= $row['nomor'] ?></td>
              <td><?= $row['pendidikan'] ?></td>
              <td><?= $row['tahun'] ?></td>
              <td><?= $row['sekolah_kampus'] ?></td>
              <td>
                <!-- Tombol Edit dan Hapus -->
                <div class="d-flex gap-2">
                  <a href="view_riwayat_pendidikan.php?nomor=<?= $row['nomor'] ?>" class="btn btn-info btn-sm">Lihat</a>
                  <a href="edit_riwayat_pendidikan.php?nomor=<?= $row['nomor'] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="delete_riwayat_pendidikan.php?nomor=<?= $row['nomor'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
      </table>
  </div>
  <div class="container mt-4">
    <h1 class="mb-2">Data Project</h1>
    <a href="create_project.php" class="btn btn-primary mb-2">Tambah Project</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Project</th>
            <th>Keterangan</th>
            <th>Image</th>
            <th>Link Project</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result_project -> fetch_assoc()): ?>
            <tr>
              <td><?= $row['nomor'] ?></td>
              <td><?= $row['project'] ?></td>
              <td><?= $row['keterangan'] ?></td>
              <td>
                <a href="assets/images/<?= $row['foto'] ?>" target="_blank">
                <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="150" style="cursor: pointer;">
              </td>
              <td><a href="<?= $row['link_project'] ?>" ><?= $row['link_project'] ?></a></td>
              <td>
                <!-- Tombol Edit dan Hapus -->
                <div class="d-flex gap-2">
                  <a href="view_project.php?nomor=<?= $row['nomor'] ?>" class="btn btn-info btn-sm">Lihat</a>
                  <a href="edit_project.php?nomor=<?= $row['nomor'] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="delete_project.php?nomor=<?= $row['nomor'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
              </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
      </table>
  </div>
</body>
</html>

<?php $conn -> close(); ?>