<?php
include 'database.php';

$nomor = $_GET['nomor'];

// Hapus foto jika ada
$sql_project = "SELECT foto FROM project WHERE nomor = '$nomor'";
$result_project = $conn -> query($sql_project);
$row = $result_project -> fetch_assoc();
$foto = $row['foto'];
unlink("assets/images/$foto");

// Hapus data dari database
$sql_project = "DELETE FROM project WHERE nomor = '$nomor'";
if ($conn -> query($sql_project) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $conn -> error;
}

$conn->close();
?>