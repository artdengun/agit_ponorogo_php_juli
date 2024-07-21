<?php

namespace tugas;
require_once 'buku.php';
require_once 'buku_pelajaran.php';
require_once 'anggota.php';

class perpustakaan {
    private $daftarBuku = array();
    private $daftarAnggota = array();

    public function tambahBuku(Buku $buku) {
        $this->daftarBuku[] = $buku;
    }

    public function daftarBuku() {
        return $this->daftarBuku;
    }

    public function daftarAnggota() {
        return $this->daftarAnggota;
    }

    public function daftarAnggotaBaru(Anggota $anggota) {
        $this->daftarAnggota[] = $anggota;
    }

    public function pinjamBuku($nomorAnggota, $isbn) {
        foreach ($this->daftarAnggota as $anggota) {
            if ($anggota->getNomorAnggota() == $nomorAnggota) {
                foreach ($this->daftarBuku as $key => $buku) {
                    if ($buku->getIsbn() == $isbn) {
                        $anggota->pinjamBuku($buku);
                        unset($this->daftarBuku[$key]);
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function kembalikanBuku($nomorAnggota, $isbn) {
        foreach ($this->daftarAnggota as $anggota) {
            if ($anggota->getNomorAnggota() == $nomorAnggota) {
                $bukuDipinjam = $anggota->getBukuDipinjam();
                foreach ($bukuDipinjam as $buku) {
                    if ($buku->getIsbn() == $isbn) {
                        $anggota->kembalikanBuku($buku);
                        $this->tambahBuku($buku);
                        return true;
                    }
                }
            }
        }
        return false;
    }

}