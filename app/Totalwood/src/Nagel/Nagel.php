<?php


namespace App\Totalwood\src\Nagel;


class Nagel
{

    public $dlinaZagotovki;

    public $shag;
    /**
     * @var int
     */
    public $visotaBrevna;
    /**
     * @var int
     */
    public $dlinaSteni;
    /**
     * @var int
     */
    public $dlina;
    /**
     * @var int
     */
    public $colvo;
    /**
     * @var int
     */
    public $colvoVzag;
    /**
     * @var int
     */
    public $colvoCherencov;
    /**
     * @var bool
     */
    public $celoe=false;
    /**
     * @var int
     */
    public $vPachke=0;
    /**
     * @var float|int
     */
    public $pachek=0;
    /**
     * @var float|int
     */
    public $metrovPogon;


    public function set(int $visotaBrevna, int $dlinaSteni, int $dlinaZagotovki=2400, int $shag=1500)
    {
        $this->visotaBrevna=$visotaBrevna;
        $this->dlinaSteni=$dlinaSteni;
        $this->dlinaZagotovki=$dlinaZagotovki;
        $this->shag=$shag;
        return $this;
    }
    public function setCeloe($set=true){
        $this->celoe=$set;
        return $this;
    }
    /*сколько заготовок в пачке что бы получить целое*/
    public  function packa(){
        $dlinaZagotovki=$this->dlinaZagotovki/1000;
        $dlina=$this->dlinaZagotovki/1000;
        for ($i = 1; $i <= 100; $i++) {
            if(ctype_digit(strval($dlina))){
                $this->vPachke=$i;
                return $this->vPachke;
                }
            $dlina=$dlina+$dlinaZagotovki;
        }
            return $this->vPachke='Невозможно округлить';
    }
    /*кол-во пачек*/
    private function pachek(){
        return $this->pachek=$this->colvoCherencov/$this->vPachke;
    }
    /*длина нагеля*/
    public function dlina(){
        return round ($this->visotaBrevna*2/3+$this->visotaBrevna-20);
    }
    /*длина погонных метров нагеля*/
    public function metrovPogon(){
        return $this->metrovPogon=$this->dlinaZagotovki*$this->colvoCherencov/1000;
    }


    /*кол-во установленных нагелей*/
    public function colvo(){
        return $this->colvo = ceil($this->dlinaSteni*1000/$this->shag);
    }
    /*кол-во нагелей нагелей в одной заготовке*/
    public function colvoVzag(){
        // кол-во в заготовке
        $this->colvoVzag=round ($this->dlinaZagotovki/($this->dlina()+3));
        //уточненный размер длины
        $this->dlina = round ($this->dlinaZagotovki/$this->colvoVzag);
        //округление до целого
        return $this->colvoVzag;
    }
    /*кол-во заготовки*/
    public function colvoCherencov(){
        return $this->colvoCherencov= ceil($this->colvo()/$this->colvoVzag());
    }
    /*заполняем все значения*/
    public function all(){
         $this->colvoCherencov= ceil($this->colvo()/$this->colvoVzag());
         if ($this->celoe){
             $this->packa();
             $this->colvoCherencov=ceil($this->colvoCherencov/$this->vPachke)*$this->vPachke;
             $this->pachek();

         }
        $this->metrovPogon();
        return $this;
    }




}
