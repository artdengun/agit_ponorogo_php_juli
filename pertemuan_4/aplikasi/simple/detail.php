<?php
include 'db.php';

$id = $_GET['id'];
$query = $pdo->prepare("SELECT berita.*, kategori_berita.nama_kategori FROM berita JOIN kategori_berita ON berita.id_kategori = kategori_berita.id WHERE berita.id = ?");
$query->execute([$id]);
$berita = $query->fetch(PDO::FETCH_ASSOC);

if (!$berita) {
    die("Berita tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($berita['judul']) ?> - Website Berita Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Berita Sederhana</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                </ul>
            </div>
        </nav>
        <h1 class="my-4"><?= htmlspecialchars($berita['judul']) ?></h1>
        <p class="text-muted"><?= htmlspecialchars($berita['tanggal']) ?> | <?= htmlspecialchars($berita['nama_kategori']) ?></p>
        <div class="content">
            <img src="uploads/<?= htmlspecialchars($berita['gambar']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($berita['judul']) ?>">
            <br>
            <?= nl2br(htmlspecialchars($berita['konten'])) ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
