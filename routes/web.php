<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NagelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('start');
});

Auth::routes([
    'register' => true,
    'verify' => true,
    ]);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/nagel', [NagelController::class, 'index'])->name('nagel');
Route::post('/nagel/raschet', [NagelController::class, 'raschet'])->name('nagel.raschet');
