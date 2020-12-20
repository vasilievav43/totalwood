<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LagiController extends Controller
{
    public function index()
    {
        return view('stena.lagi');
    }
}
