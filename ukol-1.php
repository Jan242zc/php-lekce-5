<?php
class Ctverec{
    
    public $delkastrany;
    private $barva;
    
    public function __construct($delkaStrany, $barva){
        $this->delkaStrany = $delkaStrany;
        $this->barva = $barva;
    }
    
    public function spocitejObsah(){
        return $this->delkaStrany ** 2;
    }
    
    public function zmenBarvu($novaBarva){
        $this->barva = $novaBarva;
    }
    public function zjistiBarvu(){
        return $this->barva;
    }
}

$ctverec1 = new Ctverec(6, 'modrý');
echo 'Obsah čtverce o délce strany ' . $ctverec1->delkaStrany . ' je ' . $ctverec1->spocitejObsah() . '.';
echo "<br> Čtverec je $ctverec1->barva. <br>";
$ctverec1->zmenBarvu('žlutý');
echo "Čtverec je teď $ctverec1->barva. <br>";

$ctverec2 = new Ctverec(3, 'hnědý');
$obsahctverce2 = $ctverec2->spocitejObsah();
$barva2 = ctverec2->zjistiBarvu();
echo "Obsah čtverce 2 je $obsahctverce2, je $barva2.";