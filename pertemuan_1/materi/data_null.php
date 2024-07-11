<?php 
// membuat variable dengan nilai null 
$variable = NULL;
// menampilkan nilai variable 
var_dump($variable); // outpunya nul

// cara melakukan pengecekan nilai kondisi null
if(is_null($variable)){
    echo "Variable bernilai NULL\n";
}else { 
    echo "Variable tidak bernilai NULL\n";
}

// membuat, menghapus variable 

$buatVariable = "Hello Variable";
// menghapus variable 
unset($buatVariable);
// mengecek apakah variable tidak null 
if(isset($buatVariable)){
    echo "Variable memiliki nilai dan tidak null";
} else { 
    echo "Variable tidak ada atau nilainya NULL";
}
?>