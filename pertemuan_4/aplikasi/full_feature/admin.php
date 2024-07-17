<?php
include 'db.php';

$target_dir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $id_kategori = $_POST['id_kategori'];
    $tanggal = $_POST['tanggal'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $target_file = $target_dir . basename($gambar);

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            if (isset($_POST['id'])) {
                // Update news
                $id = $_POST['id'];
                // Get the old image to delete it
                $stmt = $pdo->prepare("SELECT gambar FROM berita WHERE id = ?");
                $stmt->execute([$id]);
                $old_image = $stmt->fetchColumn();
                if ($old_image && file_exists($target_dir . $old_image)) {
                    unlink($target_dir . $old_image);
                }

                $stmt = $pdo->prepare("UPDATE berita SET judul = ?, konten = ?, id_kategori = ?, tanggal = ?, gambar = ? WHERE id = ?");
                $stmt->execute([$judul, $konten, $id_kategori, $tanggal, $gambar, $id]);
            } else {
                // Add news
                $stmt = $pdo->prepare("INSERT INTO berita (judul, konten, id_kategori, tanggal, gambar) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$judul, $konten, $id_kategori, $tanggal, $gambar]);
            }
        }
    } else {
        if (isset($_POST['id'])) {
            // Update news without changing the image
            $id = $_POST['id'];
            $stmt = $pdo->prepare("UPDATE berita SET judul = ?, konten = ?, id_kategori = ?, tanggal = ? WHERE id = ?");
            $stmt->execute([$judul, $konten, $id_kategori, $tanggal, $id]);
        }
    }
}

// Handle form submission for deleting news
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Get the image to delete it
    $stmt = $pdo->prepare("SELECT gambar FROM berita WHERE id = ?");
    $stmt->execute([$id]);
    $image = $stmt->fetchColumn();
    if ($image && file_exists($target_dir . $image)) {
        unlink($target_dir . $image);
    }

    $stmt = $pdo->prepare("DELETE FROM berita WHERE id = ?");
    $stmt->execute([$id]);
}

// Fetch all categories
$categories = $pdo->query("SELECT * FROM kategori_berita")->fetchAll(PDO::FETCH_ASSOC);

// Fetch all news
$news = $pdo->query("SELECT berita.id, berita.judul, berita.tanggal, berita.gambar, kategori_berita.nama_kategori FROM berita JOIN kategori_berita ON berita.id_kategori = kategori_berita.id ORDER BY berita.tanggal DESC")->fetchAll(PDO::FETCH_ASSOC);

// Fetch news for editing
$edit_news = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM berita WHERE id = ?");
    $stmt->execute([$id]);
    $edit_news = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Website Berita Sederhana</title>
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
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                </ul>
            </div>
        </nav>
        <h1 class="my-4">Admin Panel</h1>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="konten" class="form-label">Konten</label>
                <textarea class="form-control" id="konten" name="konten" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select class="form-select" id="id_kategori" name="id_kategori" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <h2 class="my-4">Daftar Berita</h2>
        <div class="list-group">
            <?php foreach ($news as $item): ?>
                <div class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="uploads/<?= htmlspecialchars($item['gambar']) ?>" class="img-fluid" alt="<?= htmlspecialchars($item['judul']) ?>">
                        </div>
                        <div class="col-md-8">
                            <a href="detail.php?id=<?= $item['id'] ?>"><h5 class="mb-1"><?= htmlspecialchars($item['judul']) ?></h5></a>
                            <small><?= htmlspecialchars($item['tanggal']) ?> | <?= htmlspecialchars($item['nama_kategori']) ?></small>
                            <br>
                            <a href="edit.php?edit=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="admin.php?delete=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus berita ini?');">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
