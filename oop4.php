<?php

class Toko
{
    protected function beli()
    {
        return "yey beli baru!";
    }

    public function beli_publik()
    {
        return $this->beli();
    }
}

class Laptop extends Toko
{
    public function beli_laptop()
    {
        return $this->beli_publik();
    }
}

class Komputer extends Laptop
{
    public function beli_komputer()
    {
        return $this->beli_laptop();
    }
}

$laptop_baru = new Laptop();
$toko = new Toko();
$komputer = new Komputer();

echo $laptop_baru->beli_laptop();
echo "<br>";
echo $toko->beli_publik();

?>
