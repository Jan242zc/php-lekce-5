<?php
class GeometrickyUtvar{
    
    private $pocetStran;
    
    public function __construct($pocetStran){
        $this->pocetStran = $pocetStran;
    }

    public function ziskejPocetStran(){
        return $this->pocetStran;
    }

}

class Ctverec extends GeometrickyUtvar{
    
    private $delkaStrany;
    
    public function __construct($delkaStrany){
        $this->delkaStrany = $delkaStrany;
        parent::__construct(4);
    }
    
    public function ziskejObvod(){
        return $this->delkaStrany * $this->ziskejPocetStran();
    }
    
}

class Trojuhelnik extends GeometrickyUtvar{
    
    public $a;
    public $b;
    public $c;
    
    public function __construct($a, $b, $c){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        parent::__construct(3);
    }
    
    public function ziskejObvod(){
        return $this->a + $this->b + $this->c;
    }
    
}

$ctverec = new Ctverec(3);
$trojuhelnik = new Trojuhelnik(2, 4, 5);
echo $ctverec->ziskejPocetStran() . " " . $ctverec->ziskejObvod() . "<br>";
echo $trojuhelnik->ziskejPocetStran() . " " . $trojuhelnik->ziskejObvod();
