<?php

namespace tugas;

class BukuPelajaran extends Buku {
    private $mataPelajaran;

    public function __construct($judul, $penulis, $isbn, $mataPelajaran) {
        parent::__construct($judul, $penulis, $isbn);
        $this->mataPelajaran = $mataPelajaran;
    }

    public function getMataPelajaran() {
        return $this->mataPelajaran;
    }
}