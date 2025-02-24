<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomor = $_POST['nomor'];
  $pendidikan = $_POST['pendidikan'];
  $tahun = $_POST['tahun'];
  $sekolah_kampus = $_POST['sekolah_kampus'];

  $sql_riwayat_pendidikan = "INSERT INTO riwayat_pendidikan (nomor, pendidikan, tahun, sekolah_kampus)
          VALUES ('$nomor', '$pendidikan', '$tahun', '$sekolah_kampus')";

  if ($conn -> query($sql_riwayat_pendidikan) === TRUE) {
    header('Location: index.php');
  } else {
    echo "Error: " . $conn -> error;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Riwayat Pendidikan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Tambah Riwayat Pendidikan</h1>
    <form action="create_riwayat_pendidikan.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nomor" class="form-label">No</label>
        <input type="text" class="form-control" id="nomor" name="nomor" required>
      </div>
      <div class="mb-3">
        <label for="pendidikan" class="form-label">Pendidikan</label>
        <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
      </div>
      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" >
      </div>
      <div class="mb-3">
        <label for="sekolah_kampus" class="form-label">Nama Sekolah/Kampus</label>
        <input type="text" class="form-control" id="sekolah_kampus" name="sekolah_kampus" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</body>
</html>

<?php $conn -> close(); ?>