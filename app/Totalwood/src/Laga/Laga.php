<?php


namespace App\Totalwood\src\Laga;


use App\Totalwood\src\Pilmat\Pilmat;

class Laga
{


    /*пиломатериал*/
    public $pilmat;

    /*комната*/
    public $shirinaPoOsyam;
    public $shirinaVNutri;

    public $dlinaPoOsyam;
    public $dlinaVNutri;

    /*стены*/
    public $tolshina1;
    public $tolshina2;

    /*отступ от стены*/
    public $gelaemiyOtstup=40;
    public $raschetnyOtstup;

    /*отступ от оси стены*/
    public $gelaemiyOtstupOs;
    public $raschetnyOtstupOs;

    /*флаги*/
    public $terassa=false;

    /*шаг между лагами*/
    public $shag=580;

    /*Установка размеров комнаты по осям*/
    public function setOs($shirinaPoOsyam, $dlinaPoOsyam, $tolshina1, $tolshina2, Pilmat $pilmat){
        $this->shirinaPoOsyam=$shirinaPoOsyam;
        $this->dlinaPoOsyam=$dlinaPoOsyam;
        $this->tolshina1=$tolshina1;
        $this->tolshina2=$tolshina2;
        $this->pilmat=$pilmat;
        return $this;
    }
    /*Установка размеров комнаты по внутренним размерам*/
    public function setV($shirinaVNutri, $dlinaVNutri, Pilmat $pilmat){
        $this->shirinaVNutri=$shirinaVNutri;
        $this->dlinaVNutri=$dlinaVNutri;
        $this->pilmat=$pilmat;
        return $this;
    }





}
