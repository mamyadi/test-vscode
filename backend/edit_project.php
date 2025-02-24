<?php
include 'database.php';

$nomor = $_GET['nomor'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomor = $_POST['nomor'];
  $project = $_POST['project'];
  $keterangan = $_POST['keterangan'];
  $link_project = $_POST['link_project'];

  // Cek jika ada foto baru yang diupload
  if ($_FILES['foto']['name'] != '') {
    $foto = $_FILES['foto']['name'];
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
  } else {
    // Jika foto tidak diubah, biarkan foto lama
    $sql_project = "SELECT foto FROM project WHERE nomor = '$nomor'";
    $result_project = $conn -> query($sql_project);
    $row = $result_project -> fetch_assoc();
    $foto = $row['foto'];
  }

  $sql_project = "UPDATE project SET nomor = '$nomor', project = '$project', keterangan = '$keterangan', foto = '$foto', link_project = '$link_project' WHERE nomor = '$nomor'";

  if ($conn -> query($sql_project) === TRUE) {
    header('Location: index.php');
  } else {
    echo "Error: " . $conn -> error;
  }
}

// Ambil data untuk diedit
$sql_project = "SELECT * FROM project WHERE nomor = '$nomor'";
$result_project = $conn -> query($sql_project);
$row = $result_project -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Tambah Project</h1>
    <form action="edit_project.php?nomor=<?= $row['nomor'] ?>" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nomor" class="form-label">No</label>
        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $row['nomor'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="project" class="form-label">Project</label>
        <input type="text" class="form-control" id="project" name="project" value="<?= $row['project'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $row['keterangan'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Image</label>
        <input type="file" class="form-control" id="foto" name="foto" required>
        <img src="assets/images/<?= $row['foto'] ?>" width="100">
      </div>
      <div class="mb-3">
        <label for="link_project" class="form-label">Link Project</label>
        <input type="text" class="form-control" id="link_project" name="link_project" value="<?= $row['link_project'] ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</body>
</html>

<?php $conn -> close(); ?>