<?php 

class Hewan {
    public $nama;
    public $jenis;
    
    public function __construct($nama, $jenis) {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }
    
    public function getInfo() {
        return "Hewan ini adalah $this->nama, jenis $this->jenis.";
    }
}

$hewan1 = new Hewan("Kucing", "Mamalia");
echo $hewan1->getInfo();  // Output: Hewan ini adalah Kucing, jenis Mamalia.


?>