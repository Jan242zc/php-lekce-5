<?php
class DopravniProstredek{
      
      public $rokvyroby;
      
      public function __construct($rokVyroby){
        $this->rokVyroby = $rokVyroby;
    }
}

class Auto extends DopravniProstredek{   
    
    public function __construct($rokVyroby){
        parent::__contruct($rokVyroby); // pokud mám i něco, co rodič nemá - ZKUSIT!!!
    }
}

class Tramvaj extends DopravniProstredek{
    
    public $pocetMistKeStani;
    
    public function vypisRokVyroby(){
        echo $this->rokVyroby;
    }
}

$skoda = new Auto(2001);
