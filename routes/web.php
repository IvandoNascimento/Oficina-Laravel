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
    Route::prefix('estoque')->group(function () {
        Route::get('','index')->name('estoque.index');
        Route::get('create','create')->name('estoque.create');
        Route::post('create','store');
        Route::delete('{id}/remove','remove')->name('estoque.remove');
        Route::get('{id}/edit','edit')->name('estoque.edit');
        Route::post('{id}/edit','update');
    });
});
Route::controller(ProdutoController::class)->group(function (){
    Route::prefix('produto/{id}')->group(function () {
        Route::get('','index')->name('produto.index');
        Route::get('create','create')->name('produto.create');
        Route::post('create','store')->name('produto.store');
        Route::get('show/{idProduto}','show')->name('produto.show');
        Route::delete('remove','remove')->name('produto.remove');
        Route::get('edit/{idProduto}','edit')->name('produto.edit');
        Route::post('edit/{idProduto}','update');
    });
});



Route::controller(CadastroController::class)->group(function (){
    Route::prefix('cadastro')->group(function () {
        Route::get('login', 'index')->name('cadastro.index');
        Route::post('login', 'logar');
        Route::get('register', 'create')->name('cadastro.create');
        Route::post('register', 'store');
        Route::get('logout', function () {
            Auth::logout();
            return redirect()->route('cadastro.index');
        })->name('cadastro.logout');
    });
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
