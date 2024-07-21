<?php

namespace tugas;

require_once "peminjaman_buku.php";

class anggota implements peminjaman_buku {
    private $nama;
    private $id;

    public function __construct($nama, $id) {
        $this->nama = $nama;
        $this->id = $id;
    }

    public function pinjamBuku($anggotaId, $bukuId) {
        // Implementation of borrowing a book
    }

    public function kembalikanBuku($anggotaId, $bukuId) {
        // Implementation of returning a book
    }
}
?>
