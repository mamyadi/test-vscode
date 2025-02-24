<?php
include 'database.php';

// Ambil parameter nomor dari URL
$nomor = $_GET['nomor'] ?? null;

if (!$nomor) {
  echo "<div class='alert alert-danger'>Parameter nomor tidak valid!</div>";
  exit;
}

// Query untuk mendapatkan data project berdasarkan nomor
$sql = "SELECT * FROM project WHERE nomor = '$nomor'";
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
  <title>Detail Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Detail Project</h1>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <td><?= $row['nomor'] ?></td>
      </tr>
      <tr>
        <th>Project</th>
        <td><?= $row['project'] ?></td>
      </tr>
      <tr>
        <th>Keterangan</th>
        <td><?= $row['keterangan'] ?></td>
      </tr>
      <tr>
        <th>Image</th>
        <td>
          <a href="assets/images/<?= $row['foto'] ?>" target="_blank">
          <img src="assets/images/<?= $row['foto'] ?>" alt="Foto" width="150" style="cursor: pointer;">
        </td>
      </tr>
      <tr>
        <th>Link Project</th>
        <td><a href="<?= $row['link_project'] ?>" target="_blank"><?= $row['link_project'] ?></a></td>
      </tr>
    </table>
    <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
  </div>
</body>
</html>
