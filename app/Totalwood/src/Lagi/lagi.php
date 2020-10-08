<?php


namespace App\Totalwood\src\Lagi;


class lagi
{
    /*заготовка*/
    public $zagotovkaDlina;
    public $zagotovkaVisota;
    public $zagotovkaTolshina;

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

    /**/
    public $shag;

    public function setOs($shirinaPoOsyam, $dlinaPoOsyam){
        $this->shirinaPoOsyam=$shirinaPoOsyam;
        $this->dlinaPoOsyam=$dlinaPoOsyam;
    }



}
