<?php
class komputer {
    private $jenis_processor = "intel core i7-4790 3.6Ghz"; 
    public function tampilkan_processor() {
        return $this->jenis_processor; 
    }

    public function getprocessor(){
        echo $this->jenis_processor;
    }
}

$komputer_baru = new komputer ();

echo $komputer_baru->tampilkan_processor(); 
echo "<br>";
echo $komputer_baru->getprocessor();
?>
