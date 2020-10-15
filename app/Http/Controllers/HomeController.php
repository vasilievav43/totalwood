<?php

namespace App\Http\Controllers;



use App\Facades\Laga;
use App\Facades\Pilmat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $Laga=Pilmat::set(200,50,6000);


        $lagi=Laga::setOs(4000,6000, 200, 1000, $Laga );

        dd($lagi);

        return view('home');
    }
}
