<?php
class Uzivatel
{
    private $jmeno;
    private $heslo;
    
    public function __construct($jmeno, $heslo)
    {
        $this->jmeno = $jmeno;
        $this->heslo = $heslo;
    }
    
    public function overeni($jmeno, $heslo)
    {
        if (($this->jmeno == $jmeno) && ($this->heslo == $heslo)){
            return (true);
        }
    }

    public function ziskejJmeno()
    {
        return $this->jmeno;
    }

}

class Prihlasovani
{
    public $prihlaseniUzivatele = [];
    
    public function prihlas($uzivatel, $jmeno, $heslo)
    {
        if ($uzivatel->overeni($jmeno, $heslo)){
            $this->prihlaseniUzivatele[] = $uzivatel->ziskejJmeno();
        }
    }

    public function zobrazPrihlaseniUzivatele()
    {
        echo "Přihlášení uživatelé: ";
        foreach ($this->prihlaseniUzivatele as $uzivatel){
            echo "$uzivatel, ";
        }
        echo "<br>";
    }
}

$josef = new Uzivatel('josef', 'josef1234');
$prihl = new Prihlasovani;
$prihl->zobrazPrihlaseniUzivatele();
$prihl->prihlas($josef, 'josef', 'josef1234');
$prihl->zobrazPrihlaseniUzivatele();
$petko = new Uzivatel('peťko', 'innsbruck');
$prihl->prihlas($petko, 'peťko', 'majstersveta');
$prihl->prihlas($petko, 'peťko', 'innsbruck');
$prihl->zobrazPrihlaseniUzivatele();