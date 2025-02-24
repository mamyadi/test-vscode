<?php
include 'database.php';

// Ambil parameter nomor dari URL
$nomor = $_GET['nomor'] ?? null;

if (!$nomor) {
  echo "<div class='alert alert-danger'>Parameter nomor tidak valid!</div>";
  exit;
}

// Query untuk mendapatkan data riwayat pendidikan berdasarkan nomor
$sql = "SELECT * FROM riwayat_pendidikan WHERE nomor = '$nomor'";
$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
  $row = $result -> fetch_assoc();
} else {
  echo "<div class='alert alert-warning'>Data tidak ditemukan!</div>";
  exit;
}

$conn -> close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Riwayat Pendidikan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Detail Riwayat Pendidikan</h1>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <td><?= $row['nomor'] ?></td>
      </tr>
      <tr>
        <th>Pendidikan</th>
        <td><?= $row['pendidikan'] ?></td>
      </tr>
      <tr>
        <th>Tahun</th>
        <td><?= $row['tahun'] ?></td>
      </tr>
      <tr>
        <th>Nama Sekolah/Kampus</th>
        <td><?= $row['sekolah_kampus'] ?></td>
      </tr>
    </table>
    <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
  </div>
</body>
</html>
