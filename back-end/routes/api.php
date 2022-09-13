<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GledalacController;
use App\Http\Controllers\KartaController;
use App\Http\Controllers\RezervacijaController;
use App\Http\Controllers\PopunjenostController;

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

    //REZERVACIJA
    Route::get('rezervacija', [RezervacijaController::class, 'index']);
    Route::get('rezervacija/{id}', [RezervacijaController::class, 'show']);
    Route::post('rezervacija', [RezervacijaController::class, 'store']);

    //SALA
    Route::get('sala', [SalaController::class, 'index']);
    Route::get('sala/{id}', [SalaController::class, 'show']);
    Route::post('sala', [SalaController::class, 'store']);

    //FILM
    Route::get('film', [FilmController::class, 'index']);
    Route::get('film/{id}', [FilmController::class, 'show']);
    Route::post('film', [FilmController::class, 'store']);
    Route::delete('film/{id}', [FilmController::class, 'destroy']);
    Route::get('film/rezervacija/{rezervacija_id}', [FilmController::class, 'najgledanijiFilm']);

    //GLEDALAC
    Route::get('gledalac', [GledalacController::class, 'index']);
    Route::get('gledalac/{id}', [GledalacController::class, 'show']);
    Route::post('gledalac', [GledalacController::class, 'store']);

    //KARTA
    Route::resource('karta', KartaController::class);

});
