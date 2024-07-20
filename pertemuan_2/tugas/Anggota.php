<?php

namespace tugas;

require_once "PeminjamanBuku.php";

class Anggota implements PeminjamanBuku {
    private $nama;
    private $nomorAnggota;
    private $daftarBukuDipinjam = [];

    public function __construct($nama, $nomorAnggota) {
        $this->nama = $nama;
        $this->nomorAnggota = $nomorAnggota;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getNomorAnggota() {
        return $this->nomorAnggota;
    }

    public function getDaftarBukuDipinjam() {
        return $this->daftarBukuDipinjam;
    }

    public function pinjamBuku(Buku $buku) {
        $this->daftarBukuDipinjam[] = $buku;
    }

    public function kembalikanBuku(Buku $buku) {
        foreach ($this->daftarBukuDipinjam as $key => $dipinjam) {
            if ($dipinjam->getIsbn() === $buku->getIsbn()) {
                unset($this->daftarBukuDipinjam[$key]);
                $this->daftarBukuDipinjam = array_values($this->daftarBukuDipinjam);
                break;
            }
        }
    }
}