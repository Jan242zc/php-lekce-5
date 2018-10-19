<?php
/*CVIČNÝ SOUBOR NA PROCVIČENÍ LÁTKY ZE CVIČENÍ*/
interface IZvire
{
    public function vydejZvuk();
    public function jez();
}

interface IHospodarskeZvire
{
    public function dejProdukt();
}

abstract class Zvire
{
    //public $jmeno;
    public $zvuk;
    public $potrava;
    
    public function __construct($zvuk, $potrava) //$jmeno
    {
        //$this->jmeno = $jmeno;
        $this->zvuk = $zvuk;
        $this->potrava = $potrava;
    }
    
    public function vydejZvuk()
    {
        return $this->zvuk;
    }
    
    public function jez()
    {
        return "<i> * Jí $this->potrava. * </i>";
    }
    
}

class Pes extends Zvire implements IZvire
{
    
    private $jmeno;
    
    public function __construct($jmeno)
    {
        $this->jmeno = $jmeno;
        parent::__construct('Haf Haf', 'kapsička');
    }
    
    public function prozradJmeno()
    {
        return $this->jmeno;
    }
}

class Andulka extends Zvire implements IZvire
{
    public $jmeno;
    
    public function __construct($jmeno)
    {
        $this->jmeno = $jmeno;
        parent::__construct("<i> * Nerozluštitelný pískot * <i/>", 'slunečnicová semínka');
    }
}

class Krava extends Zvire implements IZvire, IHospodarskeZvire
{
    public $jmeno;
    public $produkt;
    
    public function __construct($jmeno, $produkt)
    {
        $this->produkt = $produkt;
        $this->jmeno = $jmeno;
        parent::__construct('BŮŮŮŮůůůů', 'seno');
    }
    
    public function dejProdukt()
    {
        return "Dává $this->produkt.";
    }
}

function charakterizujZvire(IZvire $zvire){
    echo get_class($zvire) . "<br>";
    echo $zvire->prozradJmeno() . "<br>";
    echo $zvire->potrava . "<br>";
    echo $zvire->zvuk . "<br>";
}

$punta = new Pes('Punťa');

charakterizujZvire($punta);

//echo "Punťo, papej! <br>";
//echo $punta->vydejZvuk() . "<br>";
//echo $punta->jez() . "<hr>";

//$maruska = new Andulka('Maruška');
//echo "Maruško, papej! <br>";
//echo $maruska->vydejZvuk() . "<br>";
//echo $maruska->jez() . "<hr>";

//$kvetoslava = new Krava('Květoslava', 'mléko');
//echo "Květoslavo, papej! <br>";
//echo $kvetoslava->vydejZvuk() . "<br>";
//echo $kvetoslava->jez() . "<br>";
//echo "Květoslavo, dej mléko! <br>";
//echo $kvetoslava->dejProdukt() . "<hr>";