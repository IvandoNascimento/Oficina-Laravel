<?php

use App\Http\Controllers\EstoqueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::controller(EstoqueController::class)->group(function (){
    Route::get('/estoque','index')->name('estoque.index');
    Route::get('/estoque/create','create')->name('estoque.create');
    Route::post('/estoque/create','store');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
