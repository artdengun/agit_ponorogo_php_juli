<?php

namespace tugas;
require_once 'buku.php';
require_once 'buku_pelajaran.php';
require_once 'anggota.php';

class perpustakaan {
    private $daftarBuku = [];
    private $daftarAnggota = [];

    public function tambahBuku(buku $buku) {
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

    public function pinjamBuku(buku $buku) {
        $this->pinjamBuku($buku);
    }

    public function kembalikanBuku(Anggota $anggota, buku $buku) {
        $anggota->kembalikanBuku($buku);
    }

}