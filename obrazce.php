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

class Jehlan implements TrojrozmernyObrazec //Čtyřboký pravidelný jehlan. Nevím, jak vám vyšel povrch 15 :(
{
    private $strana; //délka strany podstavy
    private $vyska; //výška jehlanu
    
    public function __construct($strana, $vyska)
    {
        $this->strana = $strana;
        $this->vyska = $vyska;
    }
    
    public function ziskejPovrch()
    {
        //podstava + plášť; podstava je čtverec, čili její povrch = strana * strana
        return $this->strana ** 2 + $this->povrchPlaste(); 
    }
    
    private function povrchPlaste() // pomocná funkce pro výpočet povrchu pláště
    {
        //výpočet výšky jednoho trojúhelníku tvořícího plášť
        $vyskaKusuPlaste = sqrt((($this->strana / 2) ** 2) + ($this->vyska ** 2));
        //výpočet povrchu jednoho trojúhelníku tvořícího plášť
        $obsahKusuPlaste = $this->strana * $vyskaKusuPlaste / 2;
        return $obsahKusuPlaste * 4;
    }
        
    public function ziskejObjem()
    {
        //vzorec pro výpočet objemu jehlanu = povrch podstavy * výška jehlanu / 3
        return ($this->strana ** 2) * $this->vyska / 3; 
    }
}
    

function vypisObjemObsah(TrojrozmernyObrazec $obrazec)
{
    echo get_class($obrazec) . ' má objem ' . $obrazec->ziskejObjem($obrazec) . '<br>';
    echo get_class($obrazec) . ' má povrch ' . $obrazec->ziskejPovrch($obrazec) . '<br>';
}

$kvadr = new Kvadr(2, 3, 7);
$krychle = new Krychle(5);
$koule = new Koule(6);
$jehlan = new Jehlan(3, 4);

vypisObjemObsah($krychle);
vypisObjemObsah($kvadr);
vypisObjemObsah($koule);
vypisObjemObsah($jehlan);