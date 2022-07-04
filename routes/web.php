<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
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
    Route::delete('estoque/remove/{id}','remove')->name('estoque.remove');
    Route::get('estoque/{id}','show')->name('estoque.show');
    Route::get('estoque/edit/{id}','edit')->name('estoque.edit');
});
Route::controller(ProdutoController::class)->group(function (){
    Route::get('estoque/{id}/produto','index')->name('produto.index');
    //Route::get('/produto/{id}','show')->name('produto.show');
    Route::get('/produto/{id}/create','create')->name('produto.create');
    Route::post('/produto/{id}/create','store')->name('produto.store');
});


Route::controller(CadastroController::class)->group(function (){
    Route::get('/cadastro/login', 'index')->name('cadastro.index');
    Route::post('/cadastro/login', 'logar');
    Route::get('/cadastro/register', 'create')->name('cadastro.create');
    Route::post('/cadastro/register', 'store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
