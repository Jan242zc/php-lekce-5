<?php
abstract class GeometrickyUtvar
{
    private $pocetStran;
    public function __construct($pocetStran)
    {
        $this->pocetStran = $pocetStran;
    }
    public function ziskejPocetStran()
    {
        return $this->pocetStran;
    }
}

interface IGeometrickyUtvarInterface
{
    public function ziskejPocetStran(); 
    public function ziskejObvod();
}

function vypisDetail(IGeometrickyUtvarInterface $objekt){
    return get_class($objekt);
}

class Ctverec extends GeometrickyUtvar implements IGeometrickyUtvarInterface
{
    private $a;
    public function __construct($a)
    {
        $this->a = $a;
        parent::__construct(4);
    }
    public function ziskejObvod()
    {
        return $this->a * $this->ziskejPocetStran();
    }
}
class Trojuhelnik extends GeometrickyUtvar implements IGeometrickyUtvarInterface
{
    private $a;
    private $b;
    private $c;
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        parent::__construct(3);
    }
    public function ziskejObvod()
    {
        return $this->a + $this->b + $this->c;
    }
}
$ctverec = new Ctverec(3);
//echo '<h3>Ctverec</h3>';
echo "<h2>" . vypisDetail($ctverec) . "</h2>";
echo 'Pocet stran: ' . $ctverec->ziskejPocetStran() . '<br>';
echo 'Obvod: ' . $ctverec->ziskejObvod() . '<br><br>';
//echo '<h3>Trojuhelnik</h3>';
$trojuhelnik = new Trojuhelnik(2, 4, 5);
echo "<h2>" . vypisDetail($trojuhelnik) . "</h2>";
echo 'Pocet stran: ' . $trojuhelnik->ziskejPocetStran() . '<br>';
echo 'Obvod: ' . $trojuhelnik->ziskejObvod() . '<br>';
