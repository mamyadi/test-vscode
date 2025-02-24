<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomor = $_POST['nomor'];
  $project = $_POST['project'];
  $keterangan = $_POST['keterangan'];
  $link_project = $_POST['link_project'];

  // Upload Foto
  $foto = $_FILES['foto']['name'];
  $target_dir = "assets/images/";
  $target_file = $target_dir . basename($foto);
  move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

  $sql_project = "INSERT INTO project (nomor, project, keterangan, foto, link_project)
          VALUES ('$nomor', '$project', '$keterangan', '$foto', '$link_project')";

  if ($conn -> query($sql_project) === TRUE) {
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
  <title>Tambah Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Tambah Project</h1>
    <form action="create_project.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nomor" class="form-label">No</label>
        <input type="text" class="form-control" id="nomor" name="nomor" required>
      </div>
      <div class="mb-3">
        <label for="project" class="form-label">Project</label>
        <input type="text" class="form-control" id="project" name="project" required>
      </div>
      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
      </div>
      <!-- <div class="mb-3">
        <label for="project" class="form-label">Project</label>
        <select class="form-control" id="project" name="project" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Diri</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
      </div> -->
      <div class="mb-3">
        <label for="foto" class="form-label">Image</label>
        <input type="file" class="form-control" id="foto" name="foto" required>
      </div>
      <div class="mb-3">
        <label for="link_project" class="form-label">Link Project</label>
        <input type="text" class="form-control" id="link_project" name="link_project" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</body>
</html>

<?php $conn -> close(); ?>