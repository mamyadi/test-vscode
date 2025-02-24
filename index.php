<?php
// Konfigurasi Database
$host = "localhost";
$user = "root";
$password = "";
$database = "cvimam";

// Membuat Koneksi ke Database
$conn = new mysqli($host, $user, $password, $database);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk tabel users
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

// Query untuk tabel riwayat pendidikan
$sql_riwayat_pendidikan = "SELECT * FROM riwayat_pendidikan";
$result_riwayat_pendidikan = $conn->query($sql_riwayat_pendidikan);

// Query untuk tabel project
$sql_project = "SELECT * FROM project";
$result_project = $conn->query($sql_project);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="backend/assets/images/favicon.png" />
    <title>CV - IMAM RIYADI</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#22030100054_IMAM RIYADI_B"><b>2203010054 IMAM RIYADI B</b></a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home"><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#education"><b>EDUCATION</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#project"><b>PROJECT</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"><b>CONTACT</b></a></li>
                    <li class="nav-item">
                        <button class="btn hire-btn"><a href="mailto:2203010054@unper.ac.id"><b>HIRE ME</b></a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <?php while ($row = $result_users->fetch_assoc()): ?>
                    <div class="col-md-6 hero-content">
                        <h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
                        <p class="my-3"><?= $row['deskripsi'] ?></p>
                        <a href="backend/assets/documents/cvimam.pdf" class="btn btn-custom" download><b>Download CV</b></a>
                    </div>
                    <div class="col-md-6 text-center hero-image">
                        <img src="backend/assets/images/<?= $row['foto'] ?>" alt="Foto" width="350">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-5">
        <div class="container">
            <h2 class="text-center"><b>EDUCATION</b></h2>
            <p class="text-center">Berikut ini adalah beberapa riwayat pendidikan yang telah saya tempuh.</p>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pendidikan</th>
                        <th>Tahun</th>
                        <th>Nama Sekolah / Kampus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result_riwayat_pendidikan->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['nomor'] ?></td>
                            <td><?= $row['pendidikan'] ?></td>
                            <td><?= $row['tahun'] ?></td>
                            <td><?= $row['sekolah_kampus'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Project Section -->
    <section id="project" class="py-5">
        <div class="container">
            <h2 class="text-center"><b>PROJECT</b></h2>
            <p class="text-center">Berikut ini adalah beberapa riwayat project yang telah saya buat.</p>
            <div class="row mt-4">
                <?php while ($row = $result_project->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="backend/assets/images/<?= $row['foto'] ?>" class="card-img-top" alt="Project Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['project'] ?></h5>
                                <p class="card-text"><?= substr($row['keterangan'], 0, 170) . '...' ?></p>
                                <a href="<?= $row['link_project'] ?>" class="btn btn-primary">LIHAT</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-left mb-4"><b>Contact</b></h2>
            <p class="text-left"><b>Address:</b><a class="address" href="https://maps.app.goo.gl/Rkn72zx4Yk7KNsy86"><br> Jl. Sukasenang, Banyuresmi <br> Kec. Sukahening, Kabupaten Tasikmalaya <br> Jawa Barat 46155, Indonesia</a></p>
            <div class="text-left mt-4">
            <a href="https://wa.me/625156615886" class="mx-2"><img src="backend/assets/images/whatsapp.png" alt="WhatsApp"></a>
            <a href="https://github.com/mamyadi" class="mx-2"><img src="backend/assets/images/github.png" alt="GitHub"></a>
            <a href="https://www.instagram.com/imamriyadi_/" class="mx-2"><img src="backend/assets/images/instagram.png" alt="Instagram"></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; 2024 Imam Riyadi Website. All rights reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#privacypolicy">Privacy Policy</a><a href="#tos">Terms of Service</a></p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
