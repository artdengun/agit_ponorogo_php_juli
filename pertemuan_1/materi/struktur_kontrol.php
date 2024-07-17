<?php 

$perbandingan = 10;

if ($perbandingan == 3) {
   echo "perbandingan";
} elseif ($perbandingan == 10) {
    echo "testing";
} else {
    // kode jika semua kondisi salah
}

switch ($perbandingan) {
    case 1:
        echo "data muncul";
        break;
    case 2:
        echo "data tidak muncul";
        break;
    default:
        // kode
}

?>