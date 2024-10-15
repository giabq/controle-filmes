<?php

use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/filmes');
});

// Route::get('/filmes', [FilmesController::class, 'index']); // Quero que seja exibido um método de uma classe. Para isso, vou passar um array onde o 1º item é a classe e o 2º é o método da classe
// Route::get('/filmes/criar', [FilmesController::class, 'create']);
// Route::post('/filmes/salvar', [FilmesController::class, 'store']);

// Route::controller(FilmesController::class)->group(function () {
//     Route::get('/filmes', 'index')->name('filmes.index');
//     Route::get('/filmes/adicionar', 'create')->name('filmes.create');
//     Route::post('/filmes/salvar', 'store')->name('filmes.store');
// });

Route::resource('filmes', FilmesController::class);
Route::delete('/filmes/{filme}', [FilmesController::class, 'destroy'])->name('filmes.destroy');

