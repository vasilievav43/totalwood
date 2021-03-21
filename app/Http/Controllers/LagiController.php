<?php

namespace App\Http\Controllers;


use App\Facades\Pilmat;
use Illuminate\Http\Request;

class LagiController extends Controller
{
    public function index()
    {
        return view('stena.lagi');
    }
    public function raschet(Request $request){
        $this->validate($request,[
            'visota'=>'required|integer',
            'tolshina'=>'required|integer',
            'dlina'=>'required|integer',
        ]);


        $laga=Pilmat::set($request->visota,$request->tolshina,$request->dlina);
        $room=array();




        foreach ($request->dlina_room as $key=>$value)
        {

            $room[]=['dlina'=>$value , 'shirina' =>'','tolshina1' =>'','tolshina2' =>''];

        }




        return view('stena.lagi', compact('room'));
    }
}
