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
    Route::get('estoque/{id}/edit','edit')->name('estoque.edit');
    Route::post('estoque/{id}/edit','update');
    
});
Route::controller(ProdutoController::class)->group(function (){
    Route::prefix('produto')->group(function () {
        Route::get('{id}','index')->name('produto.index');
        Route::get('{id}/create','create')->name('produto.create');
        Route::post('{id}/create','store')->name('produto.store');
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
