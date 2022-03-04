<?php

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
Auth::routes();
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'oferta', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\OfertaController::class, 'index']);
    Route::post('store', [App\Http\Controllers\OfertaController::class, 'store']);
    Route::get('show/{porPage?}', [App\Http\Controllers\OfertaController::class, 'show']);
    Route::get('show/negociacao/{oferta_id}', [App\Http\Controllers\OfertaController::class, 'negociacao']);
});

Route::group(['prefix' => 'produto', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\ProdutoController::class, 'index']);
    Route::post('store', [App\Http\Controllers\ProdutoController::class, 'store']);
    Route::get('show/{produto_id?}', [App\Http\Controllers\ProdutoController::class, 'show']);
    Route::get('show/oferta/{oferta_id}', [App\Http\Controllers\ProdutoController::class, 'ofertaProduto']);
});

Route::group(['prefix' => 'mensagem', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\MensagemController::class, 'index']);
    Route::post('store', [App\Http\Controllers\MensagemController::class, 'store']);
    Route::post('show', [App\Http\Controllers\MensagemController::class, 'show']);
    Route::post('show/filtro', [App\Http\Controllers\MensagemController::class, 'showMessagens']);
});

Route::group(['prefix' => 'categoria', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\ClienteController::class, 'index']);
    Route::post('store', [App\Http\Controllers\ClienteController::class, 'store']);
    Route::get('show', [App\Http\Controllers\ClienteController::class, 'show']);
});

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');