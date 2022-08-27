<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api'
], function ($router) {

    //GLEDALAC
    Route::get('gledalac', [\App\Http\Controllers\GledalacController::class, 'index']);
    Route::get('gledalac/{id}', [\App\Http\Controllers\GledalacController::class, 'show']);

    //SALA
    Route::get('sala', [\App\Http\Controllers\SalaController::class, 'index']);
    Route::get('sala/{id}', [\App\Http\Controllers\SalaController::class, 'show']);
    Route::post('sala', [\App\Http\Controllers\SalaController::class, 'store']);
    Route::put('sala/{id}', [\App\Http\Controllers\SalaController::class, 'update']);
    Route::delete('sala/{id}', [\App\Http\Controllers\SalaController::class, 'destroy']);

    //FILM
    Route::get('film', [\App\Http\Controllers\FilmController::class, 'index']);
    Route::get('film/{id}', [\App\Http\Controllers\FilmController::class, 'show']);
    Route::post('film', [\App\Http\Controllers\FilmController::class, 'store']);
    Route::put('film/{id}', [\App\Http\Controllers\FilmController::class, 'update']);
    Route::delete('film/{id}', [\App\Http\Controllers\FilmController::class, 'destroy']);

    //SLIKA
    Route::get('slika', \App\Http\Controllers\SlikaController::class, 'index');
    Route::get('slika/{id}', [\App\Http\Controllers\SlikaController::class, 'show']);

    //REZERVACIJA
    Route::resource('rezervacija', \App\Http\Controllers\RezervacijaController::class);

    //PROJEKCIJA FILMA
    Route::resource('projekcija_filma', \App\Models\ProjekcijaFilma::class);
    

});
