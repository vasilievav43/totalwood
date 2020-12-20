<?php

namespace App\Http\Controllers;

use App\Facades\Nagel;
use Illuminate\Http\Request;

class NagelController extends Controller
{
    public function index()
    {
        return view('stena.nagel');
    }
    public function raschet(Request $request){
        $this->validate($request,[
            'visota'=>'required|integer',
            'dlina'=>'required|integer',
            'shag'=>'required|integer',
            'dlina_z'=>'required|integer',
        ]);

        $celoe=false;
        if($request->celoe){
            $celoe=true;
        }
       $nagel=Nagel::set($request->visota, $request->dlina, $request->dlina_z, $request->shag)->setCeloe($celoe)->all();

        //dd($nagel);


        return view('stena.nagel', compact('nagel'));
    }


}
