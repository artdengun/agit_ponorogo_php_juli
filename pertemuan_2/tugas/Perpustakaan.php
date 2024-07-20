<?php

namespace tugas;
require_once 'Buku.php';
require_once 'BukuPelajaran.php';
require_once 'Anggota.php';

class Perpustakaan {
    private $daftarBuku = [];
    private $daftarAnggota = [];

    public function tambahBuku(Buku $buku) {
        $this->daftarBuku[] = $buku;
    }

    public function daftarBuku() {
        return $this->daftarBuku;
    }

    public function daftarAnggota() {
        return $this->daftarAnggota;
    }

    public function daftarkanAnggota(Anggota $anggota) {
        $this->daftarAnggota[] = $anggota;
    }

    public function pinjamBuku(Anggota $anggota, Buku $buku) {
        $anggota->pinjamBuku($buku);
    }

    public function kembalikanBuku(Anggota $anggota, Buku $buku) {
        $anggota->kembalikanBuku($buku);
    }
}

// Contoh penggunaan

// Membuat beberapa buku
$buku1 = new Buku("Pemrograman PHP", "John Doe", "123456789");
$buku2 = new BukuPelajaran("Matematika Dasar", "Jane Doe", "987654321", "Matematika");

// Membuat perpustakaan
$perpustakaan = new Perpustakaan();
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);

// Mendaftarkan anggota baru
$anggota1 = new Anggota("Alice", "001");
$perpustakaan->daftarkanAnggota($anggota1);

// Meminjam buku
$perpustakaan->pinjamBuku($anggota1, $buku1);

// Daftar buku yang dipinjam oleh anggota
print_r($anggota1->getDaftarBukuDipinjam());

// Mengembalikan buku
$perpustakaan->kembalikanBuku($anggota1, $buku1);

// Daftar buku yang dipinjam setelah dikembalikan
print_r($anggota1->getDaftarBukuDipinjam());
?>