<?php
include 'db.php';

// Handle form submission for adding or updating category
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];

    if (isset($_POST['id'])) {
        // Update category
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE kategori_berita SET nama_kategori = ? WHERE id = ?");
        $stmt->execute([$nama_kategori, $id]);
    } else {
        // Add category
        $stmt = $pdo->prepare("INSERT INTO kategori_berita (nama_kategori) VALUES (?)");
        $stmt->execute([$nama_kategori]);
    }
}

// Handle form submission for deleting category
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM kategori_berita WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all categories
$categories = $pdo->query("SELECT * FROM kategori_berita ORDER BY nama_kategori ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Website Berita Sederhana</title>
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
        <h1 class="my-4">Kategori Berita</h1>
        <form action="kategori.php" method="post">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <h2 class="my-4">Daftar Kategori</h2>
        <div class="list-group">
            <?php foreach ($categories as $category): ?>
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            <?= htmlspecialchars($category['nama_kategori']) ?>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="kategori.php?delete=<?= $category['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
