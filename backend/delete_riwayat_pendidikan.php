<?php
include 'database.php';

$nomor = $_GET['nomor'];

// Hapus data dari database
$sql_riwayat_pendidikan = "DELETE FROM riwayat_pendidikan WHERE nomor = '$nomor'";
if ($conn -> query($sql_riwayat_pendidikan) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $conn -> error;
}

$conn->close();
?>