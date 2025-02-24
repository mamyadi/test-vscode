<?php
include 'database.php';

// Ambil parameter id dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
  echo "<div class='alert alert-danger'>Parameter ID tidak valid!</div>";
  exit;
}

// Query untuk mendapatkan data identitas berdasarkan ID
$sql = "SELECT * FROM users WHERE id = '$id'";
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
  <title>Detail Identitas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Detail Identitas Diri</h1>
    <table class="table table-bordered">
      <tr>
        <th>Nama</th>
        <td><?= $row['nama'] ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td><?= $row['jenis_kelamin'] ?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><?= $row['alamat'] ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <td><?= $row['deskripsi'] ?></td>
      </tr>
      <tr>
        <th>Foto</th>
        <td>
          <a href="assets/images/<?= $row['foto'] ?>" target="_blank">
          <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="150" style="cursor: pointer;">
        </td>
      </tr>
    </table>
    <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
  </div>
</body>
</html>
