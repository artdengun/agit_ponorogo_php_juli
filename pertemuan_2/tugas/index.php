<?php
namespace tugas;

require_once "perpustakaan.php";

// Membuat objek perpustakaan
$perpustakaan = new perpustakaan();

// Menambah buku ke perpustakaan
$buku1 = new buku("Buku A", "Penulis A", "123456");
$buku2 = new buku_pelajaran("Buku B", "Penulis B", "654321", "Matematika");
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);

// Mendaftarkan anggota baru
$anggota1 = new Anggota("Anggota 1", "001");
$perpustakaan->daftarAnggotaBaru($anggota1);

// Meminjam buku
$perpustakaan->pinjamBuku("001", "123456");

// Mengembalikan buku
$perpustakaan->kembalikanBuku("001", "123456");
echo json_encode($buku2);

?>
