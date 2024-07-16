<?php 
function nama_fungsi($parameter1, $parameter2, $paramater3){
    $hasil = $parameter1+$paramater3+$parameter2;
    return $hasil; // opsional
}

function sapa($nama) {
    return "Halo, $nama!";
}

echo sapa("Budi"); // Output: Halo, Budi!
function hitungLuasPersegiPanjang($panjang, $lebar) {
    $luas = $panjang * $lebar;
    return $luas;
}

$hasilLuas = hitungLuasPersegiPanjang(5, 3);


$teks = "Halo, Dunia!";


$angka = [3, 1, 4, 1, 5, 9];
sort($angka);
print_r($angka); // Output: Array ( [0] => 1 [1] => 1 [2] => 3 [3] => 4 [4] => 5 [5] => 9 )

echo "Luas persegi panjang: $hasilLuas"; // Output: Luas persegi panjang: 15
echo strlen($teks); // Output: 12
echo date("Y-m-d H:i:s"); // Output: format tanggal dan waktu saat ini

?>
