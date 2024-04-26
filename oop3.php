<?php
class Laptop {
    protected $pemilik = "fachril";

    public function akses_pemilik() {
        return $this->pemilik;
    }

    public function paksa_hidup() {
        return $this->hidupkan_laptop();
    }

    protected function hidupkan_laptop() {
        return "Hidupkan laptop";
    }

    public function get_pemilik() {
        return $this->pemilik;
    }

    public function hidupkan() {
        return $this->hidupkan_laptop();
    }
}

$laptop_fachril = new Laptop();
echo $laptop_fachril->akses_pemilik();
echo "<br>";
echo $laptop_fachril->get_pemilik(); 
echo "<br>";
echo $laptop_fachril->hidupkan();
echo "<br>";
echo $laptop_fachril->hidupkan();
