<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'FlowerController@index')->name('home');
Route::get('flor/criar', 'FlowerController@create')->name('flower.create');
Route::post('flor', 'FlowerController@store')->name('flower.store');

Route::get('abelha/criar', 'BeeController@create')->name('bee.create');
Route::post('abelha', 'BeeController@store')->name('bee.store');
// Route::post('flower', 'FlowerController@store');
