<?php


namespace App\Totalwood\src\Pilmat;


class Pilmat
{
    /*заготовка*/
    public $visota;
    public $tolshina;
    public $dlina;
    public $plotnost=700;

    /*объем 1 пилмата*/
    public $obemOne;

    /*Имя*/
    public $name;

    public function set(int $visota, int $tolshina, int $dlina)
    {
        $this->visota=$visota;
        $this->tolshina=$tolshina;
        $this->dlina=$dlina;
        return $this;
    }
    public function obemOne(){
        $this->obemOne=$this->visota*$this->tolshina*$this->dlina;
        return $this;
    }
    public function name(){
        $this->name=$this->visota.'х'.$this->tolshina.'х'.$this->dlina.' мм';
        return $this;
    }

}
