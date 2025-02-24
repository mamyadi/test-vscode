<?php
include 'database.php';

$nomor = $_GET['nomor'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomor = $_POST['nomor'];
  $pendidikan = $_POST['pendidikan'];
  $tahun = $_POST['tahun'];
  $sekolah_kampus = $_POST['sekolah_kampus'];

  $sql_riwayat_pendidikan = "UPDATE riwayat_pendidikan SET nomor = '$nomor', pendidikan = '$pendidikan', tahun = '$tahun', sekolah_kampus = '$sekolah_kampus' WHERE nomor = '$nomor'";

  if ($conn -> query($sql_riwayat_pendidikan) === TRUE) {
    header('Location: index.php');
  } else {
    echo "Error: " . $conn -> error;
  }
}

// Ambil data untuk diedit
$sql_riwayat_pendidikan = "SELECT * FROM riwayat_pendidikan WHERE nomor = '$nomor'";
$result_riwayat_pendidikan = $conn -> query($sql_riwayat_pendidikan);
$row = $result_riwayat_pendidikan -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Riwayat Pendidikan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Edit Riwayat Pendidikan</h1>
    <form action="edit_riwayat_pendidikan.php?nomor=<? $row['nomor'] ?>" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nomor" class="form-label">No</label>
        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $row['nomor'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="pendidikan" class="form-label">Pendidikan</label>
        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $row['pendidikan'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $row['tahun'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="sekolah_kampus" class="form-label">Nama Sekolah/Kampus</label>
        <input type="text" class="form-control" id="sekolah_kampus" name="sekolah_kampus" value="<?= $row['sekolah_kampus'] ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</body>
</html>

<?php $conn -> close(); ?>