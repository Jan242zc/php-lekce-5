<?php

class Auto
{
    public $rokVyroby;
    
    public function __construct($rokVyroby){
        $this->rokVyroby = $rokVyroby;
    }
    
    public function spocitejVek(){
    return date('Y') - $this->rokVyroby;    
    }
    
    public function nastavVek($novyVek){
        $this->rokVyroby = $novyVek;
    }
    
}

$skodaFabia = new Auto(2001);
echo $skodaFabia->spocitejVek();
echo "<br>";
$skodaFabia->nastavVek(2015);
echo $skodaFabia->spocitejVek();

//$skodaFabia->rokVyroby = 2015;