<?php

namespace tugas;
require_once 'Buku.php';

interface  PeminjamanBuku{
    public function pinjamBuku(Buku $buku);
    public function kembalikanBuku(Buku $buku);
}