<?php
class Laptop
{
    public 
        $pemilik,
        $merek;

    public function __construct()
    {
        echo "Ini berasal dari construct laptop";
    }

    public function hidupkan_laptop()
    {
        return "hidupkan laptop lenovo $this->merek punya Andi $this->pemilik";
    }

    public function __destruct()
    {
        echo "ini berasal dari destructor laptop objek telah di ancurkan" ;
    }
}

$laptop_bar = new Laptop();

echo "<br>";
echo $laptop_bar->hidupkan_laptop();
echo "<br>";