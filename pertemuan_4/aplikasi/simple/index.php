<?php
include 'db.php';

$query = $pdo->query("SELECT berita.id, berita.judul, berita.tanggal, berita.gambar, kategori_berita.nama_kategori FROM berita JOIN kategori_berita ON berita.id_kategori = kategori_berita.id ORDER BY berita.tanggal DESC");
$berita = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Website Berita Sederhana</title>
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
        <h1 class="my-4">Berita Terbaru</h1>
        <div class="list-group">
            <?php foreach ($berita as $item): ?>
                <a href="detail.php?id=<?= $item['id'] ?>" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="uploads/<?= htmlspecialchars($item['gambar']) ?>" class="img-fluid" alt="<?= htmlspecialchars($item['judul']) ?>">
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-1"><?= htmlspecialchars($item['judul']) ?></h5>
                            <small><?= htmlspecialchars($item['tanggal']) ?> | <?= htmlspecialchars($item['nama_kategori']) ?></small>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
