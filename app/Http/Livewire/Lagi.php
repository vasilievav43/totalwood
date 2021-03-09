<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Lagi extends Component
{

    public $room = [];

    public function mount()
    {
        $this->room=[
            ['dlina'=>'' , 'shirina' =>'']
        ];
    }

    public function addRoom(){
        $this->room[]=['dlina'=>'' , 'shirina' =>''];
    }
    public function removeRoom($key){
        unset($this->room[$key]);
        array_values($this->room);
    }


    public function render()
    {
        return view('livewire.lagi');
    }
}
