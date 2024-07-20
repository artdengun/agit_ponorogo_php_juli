<?php

// Definisi kelas
class Mobil {
    // Property
    public $warna;
    public $merk;

    // Method
    public function jalan() {
        echo "Mobil sedang berjalan";
    }
}

// Membuat objek dari kelas Mobil
$mobilSaya = new Mobil();
// Menetapkan nilai untuk property
$mobilSaya->warna = "Merah";
$mobilSaya->merk = "Toyota";
// Mengakses property
echo "Warna Mobil: " . $mobilSaya->warna . "<br>";
echo "Merk Mobil: " . $mobilSaya->merk . "<br>";
// Memanggil method
$mobilSaya->jalan(); // Output: Mobil sedang berjalan