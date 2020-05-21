<?php

use Illuminate\Support\Facades\Route;
use App\Month;
use App\Bee;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $months = Month::all();
    $bees = Bee::all();
    return view('register_flower', compact('months', 'bees'));
});
