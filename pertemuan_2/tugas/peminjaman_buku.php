<?php
namespace tugas;

interface peminjaman_buku {
    public function pinjamBuku($anggotaId, $bukuId);
    public function kembalikanBuku($anggotaId, $bukuId);
}
?>
