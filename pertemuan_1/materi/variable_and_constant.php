<?php
/*=============== VARIABLE  ===============*/
// Mendeklarasikan variabel
$nama = "John";
$umur = 25;
$tinggi = 1.75;
// Menampilkan nilai variabel
echo "Nama: " . $nama . "\n"; // Output: Nama: John
echo "Umur: " . $umur . "\n"; // Output: Umur: 25
echo "Tinggi: " . $tinggi . " meter\n"; // Output: Tinggi: 1.75


/*=============== CONSTANT  ===============*/
// Mendeklarasikan constant
define("SITE_NAME", "Belajar PHP");
define("MAX_USERS", 100);
// Menampilkan nilai constant
echo "Nama Situs: " . SITE_NAME . "<br>"; // Output: Nama
echo "Maksimal Pengguna: " . MAX_USERS; // Output: Mak
?>