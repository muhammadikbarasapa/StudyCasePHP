<?php
//latihan 1

// class Web
// {
//     public static $title = "my page1";
//     public function changeTitle()
//     {
//         self::$title = "my page 2";
//         return self::$title;
//     }
//     public function changeTitle2()
//     {
//         return self::$title;
//     }
// }
// class YourWeb extends Web
// {
//     public function changeTitle()
//     {
//         self::$title = "your page3";
//         return self::$title;
//     }
// }
// echo Web::$title . '<br>';
// $myweb = new WEB;
// echo $myweb->changeTitle() . "<br>" .
//     $myweb->changeTitle2();
// echo "<br>";
// $YourWeb = new YourWeb;
// echo $YourWeb->changeTitle() . "<br>" .
//     $myweb->changeTitle2();

// latihan 2 

// class cuy {
//     public static $title ="first page";

//     public static function getTitlePage() {
//         return "tolong jangan buka hamalan ini '" . self::$title . "'";
//     }    
// }
// echo cuy::$title;
// echo"<br>";
// echo cuy::getTitlePage();

// latihan 3 

// class cay {
// protected static $title = "frist page ";

// protected static function getTitlePage() {
//     echo "jangan buka halaman ini '" . self::$title . ".";
// }
// }
// class Other2Web extends cay {
//     public function __construct(){
//         cay::getTitlePage();
//     }
// }
// new Other2Web;
 
// latihan 4 

interface Hewan {
    public function suara();
    public function makanan();
    
}
class MakhlukHidup {
    public function intro(){
        return "termasuk MakhlukHidup";
    }
}
 
class Buaya extends MakhlukHidup implements Hewan {

    public function suara() {
        return "aku sayang izzan";
    }
    public function makanan() {
        return "Daging";
    }   
}
$Buaya = new Buaya;
echo $Buaya->suara();
echo "<br>";
echo $Buaya->makanan();
echo "<br>";
echo $Buaya->intro();
echo "<br>";

// latihan 5


?>