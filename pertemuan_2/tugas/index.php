<?php

namespace tugas;
require_once "buku.php";
require_once "perpustakaan.php";
require_once "anggota.php";
require_once "buku_pelajaran.php";

// Membuat objek perpustakaan
$perpustakaan = new Perpustakaan();

// Menambah buku ke perpustakaan
$buku1 = new buku("Buku A", "Penulis A", "123456");
$buku2 = new buku_pelajaran("Buku B", "Penulis B", "654321", "Matematika");
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);

// Mendaftarkan anggota baru
$anggota1 = new anggota("anggota 1", "001");
$perpustakaan->daftarkanAnggota($anggota1);

// Mengembalikan buku
$perpustakaan->kembalikanBuku("123456");

?>
