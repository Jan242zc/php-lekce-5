<?php
interface TrojrozmernyObrazec
{
    public function ziskejObjem();
    public function ziskejPovrch();
}

class Kvadr implements TrojrozmernyObrazec
{
    private $a;
    private $b;
    private $c;
    
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    
    public function ziskejObjem()
    {
        return $this->a * $this->b * $this->c;
    }
    
    public function ziskejPovrch()
    {
        return 2 * ($this->a * $this->b + $this->a * $this->c + $this->b * $this->c);
    }
    
}

class Krychle implements TrojrozmernyObrazec
{
    private $a;
    
    public function __construct($a)
    {
        $this->a = $a;
    }
    
    public function ziskejObjem()
    {
        return $this->a ** 3;
    }
    
    public function ziskejPovrch()
    {
        return $this->a ** 2 * 6;
    }
    
}

class Koule implements TrojrozmernyObrazec
{
    private $r;
    
    public function __construct($r){
        $this->r = $r;
    }
    
    public function ziskejObjem()
    {
        return 4 / 3 * M_PI * $this->r ** 3;
    }
    
    public function ziskejPovrch()
    {
        return 4 * M_PI * $this->r ** 2;
    }
}

class Jehlan implements TrojrozmernyObrazec //Pardon, nechal jsem se unést a udělal to pro maximálně šestihraný pravidelný jehlan
{
    public $a; //délka strany podstavce
    public $s; //délka boční hrany
    public $n; //počet stran
    
    public function __construct($a, $s, $n)
    {
        $this->a = $a;
        $this->s = $s;
        $this->n = $n;
    }
    
    public function ziskejPovrch()
    {
        if (($this->n < 3) || ($this->n > 6)){ //jesti se opravdu jedná o jehlan a nemá moc velký počet hran
            return " <i> Zadaný objekt není jehlan nebo jej nelze touto třídou vytvořit </i>.";
        } elseif (($this->n >= 3) && ($this->n <= 6)) {
            return $this->povrchPodstavy() + $this->povrchPlaste();
        }
    }
    
    private function povrchPlaste() // pomocná funkce pro výpočet povrchu jehlanu, v této části je spočten povrch pláště
    {
        $vyska = sqrt(($this->s ** 2) - (($this->a / 2) ** 2)); //výpočet výšky jednoho trojúhelníku tvořícího plášť Pythagorovou větou
        $obsahkusuplaste = $this->a * $vyska / 2; //výpočet obsahu jednoho trojúhelníku
        return $obsahkusuplaste * $this->n;
    }
    
    private function povrchPodstavy() // pomocná funkce pro výpočet povrchu jehlanu, tady je vypočítám povrch podstavy
    {
        switch($this->n) { //výpočet povrchu podstavy se liší v závislosti na počtu stran jehlanu
            case 3:{ //pokud je počet stran nižší než 3, není tato pomocná funkce vůbec použita - viz ziskejPovrch()
                $vyska = sqrt(($this->a ** 2) - (($this->a / 2) ** 2)); //dopočet výšky trojúhelníku tvořícího podstavu
                return $this->a * $vyska / 2; //výpočet povrchu podstavy - standardní vzorec pro výpočet obsahu trojúhelníku
            }
            case 4:{
                return $this->a ** 2; //výpočet obsahu čtverce
            }
            case 5:{
                return ($this->a ** 2) * (sqrt(25 + 10 * sqrt(5))/ 4); //vzorec pro výpočet obsahu pětiúhelníku
            }
            case 6:{ 
                return ($this->a ** 2) * ((3 * sqrt(3))/ 2);   //vzorec pro výpočet obsahu šestiúhelníku
            }          //pokud je počet stran vyšší než 6, není tato pomocná funkce vůbec použita - viz ziskejPovrch()
        }
    }
    
    public function ziskejObjem()
    {
        if (($this->n < 3) || ($this->n > 6))
        {
            return " <i> Zadaný objekt není jehlan nebo jej nelze touto třídou vytvořit </i>.";            
        } elseif (($this->n >=3) && ($this->n <= 6)) {
        $r = $this->zjistiR(); //vzdálenost od bodu do středu podstavy
        $vyskajehlanu = sqrt(($this->s ** 2) - ($r ** 2)); //dopočet výšky jehlanu Pythagorovou větou
        return $this->povrchPodstavy() * $vyskajehlanu / 3; //vzorec pro výpočet objemu jehlanu
        }
    }
    
    private function zjistiR() // výpočet vzdálenosti mezi středem podstavy a bodem
    {
        switch ($this->n) {
            case 3:{ //výpočet ramena jednoho ze tří rovnoramenných trojúhelníků vzniklých rozdělením rovnostranného trojúhelníku tvořícího podstavu
                return $this->a * (sin(deg2rad(30))/sin(deg2rad(120))); 
            }
            case 4:{
                return sqrt((($this->a / 2) ** 2) * 2); // polovina úhlopříčky čtverce dopočtená Pythagorovou větou
            }
            case 5:{
                return (sqrt(50 + 10 * sqrt(5)) / 10) * $this->a; // vzdálenost mezi středem pětiúhelníku a bodem
            }
            case 6:{
                return $this->a; // vzdálenost mezi středem šestiúhelníku a bodem
            }
        }
    }
}

function vypisObjemObsah(TrojrozmernyObrazec $obrazec)
{
    echo 'Obrazec: ' . get_class($obrazec) . '<br>';
    echo 'Objem: ' . $obrazec->ziskejObjem($obrazec). '<br>';
    echo 'Povrch: ' . $obrazec->ziskejPovrch($obrazec) . '<hr>';
}

$kvadr = new Kvadr(2, 3, 7);
$krychle = new Krychle(5);
$koule = new Koule(6);
$jehlan = new Jehlan(3, 4, 4);

vypisObjemObsah($kvadr);
vypisObjemObsah($krychle);
vypisObjemObsah($koule);
vypisObjemObsah($jehlan);