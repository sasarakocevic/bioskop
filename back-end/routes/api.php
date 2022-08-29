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

    //ADMIN
    Route::post('register', [\App\Http\Controllers\AdminController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\AdminController::class, 'login']);
    Route::get('user', [\App\Http\Controllers\AdminController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AdminController::class, 'logout']);

    //BIOSKOP
    Route::get('bioskop', [\App\Http\Controllers\BioskopController::class, 'index']);
    Route::post('bioskop', [\App\Http\Controllers\BioskopController::class, 'create']);
    Route::get('bioskop/{bioskop_sale}', [\App\Http\Controllers\BioskopController::class, 'get']);
    Route::put('bioskop/{bioskop_sale}', [\App\Http\Controllers\BioskopController::class, 'update']);
    Route::delete('bioskop/{bioskop_sale}', [\App\Http\Controllers\BioskopController::class, 'delete']);

    //FILM
    Route::get('film', [\App\Http\Controllers\FilmController::class, 'index']);
    Route::get('film/{id}', [\App\Http\Controllers\FilmController::class, 'show']);
    Route::post('film', [\App\Http\Controllers\FilmController::class, 'store']);
    Route::put('film/{id}', [\App\Http\Controllers\FilmController::class, 'update']);
    Route::delete('film/{id}', [\App\Http\Controllers\FilmController::class, 'destroy']);

    //GLEDALAC
    Route::post('register', [\App\Http\Controllers\GledalacController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\GledalacController::class, 'login']);
    Route::get('user', [\App\Http\Controllers\GledalacController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\GledalacController::class, 'logout']);
    Route::get('gledalac', [\App\Http\Controllers\GledalacController::class, 'index']);
    Route::get('gledalac/{id}', [\App\Http\Controllers\GledalacController::class, 'show']);

    //PLACANJE
    Route::get('placanje', [\App\Http\Controllers\PlacanjeController::class, 'index']);
    Route::get('placanje/{id}', [\App\Http\Controllers\PlacanjeController::class, 'show']);
    Route::post('placanje', [\App\Http\Controllers\PlacanjeController::class, 'store']);
    Route::put('placanje/{id}', [\App\Http\Controllers\PlacanjeController::class, 'update']);
    Route::delete('placanje/{id}', [\App\Http\Controllers\PlacanjeController::class, 'destroy']);
    Route::get('rezervacija/{id}/placanje', [\App\Http\Controllers\PlacanjeController::class, 'getPlacanjeByRezervacija']);

    //PROJEKCIJA
    Route::get('projekcija', [\App\Http\Controllers\ProjekcijaController::class, 'index']);
    Route::get('projekcija/{id}', [\App\Http\Controllers\ProjekcijaController::class, 'show']);
    Route::post('projekcija', [\App\Http\Controllers\ProjekcijaController::class, 'store']);
    Route::put('projekcija/{id}', [\App\Http\Controllers\ProjekcijaController::class, 'update']);
    Route::delete('projekcija/{id}', [\App\Http\Controllers\ProjekcijaController::class, 'destroy']);
    Route::get('film/{id}/projekcija', [\App\Http\Controllers\ProjekcijaController::class, 'getProjekcijaByFilm']);
    Route::get('sala/{id}/projekcija', [\App\Http\Controllers\ProjekcijaController::class, 'getProjekcijaBySala']);

    //PROJEKCIJA SJEDISTE
    Route::get('projekcija_sjediste', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'index']);
    Route::get('projekcija_sjediste/{id}', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'show']);
    Route::post('projekcija_sjediste', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'store']);
    Route::put('projekcija_sjediste/{id}', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'update']);
    Route::delete('projekcija_sjediste/{id}', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'destroy']);
    Route::get('sjediste/{id}/projekcija_sjediste', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'getProjekcijaSjedisteBySjediste']);
    Route::get('projekcija/{id}/projekcija_sjediste', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'getProjekcijaSjedisteByProjekcija']);
    Route::get('rezervacija/{id}/projekcija_sjediste', [\App\Http\Controllers\ProjekcijaSjedisteController::class, 'getProjekcijaSjedisteByRezervacija']);

    //REZERVACIJA
    Route::get('rezervacija', [\App\Http\Controllers\RezervacijaController::class, 'index']);
    Route::get('rezervacija/{id}', [\App\Http\Controllers\RezervacijaController::class, 'show']);
    Route::post('rezervacija', [\App\Http\Controllers\RezervacijaController::class, 'store']);
    Route::put('rezervacija/{id}', [\App\Http\Controllers\RezervacijaController::class, 'update']);
    Route::delete('rezervacija/{id}', [\App\Http\Controllers\RezervacijaController::class, 'destroy']);
    Route::get('gledalac/{id}/rezervacija', [\App\Http\Controllers\RezervacijaController::class, 'getRezervacijaByGledalac']);
    Route::get('projekcija/{id}/rezervacija', [\App\Http\Controllers\RezervacijaController::class, 'getRezervacijaByProjekcija']);

    //SALA
    Route::get('sala', [\App\Http\Controllers\SalaController::class, 'index']);
    Route::get('sala/{id}', [\App\Http\Controllers\SalaController::class, 'show']);
    Route::post('sala', [\App\Http\Controllers\SalaController::class, 'store']);
    Route::put('sala/{id}', [\App\Http\Controllers\SalaController::class, 'update']);
    Route::delete('sala/{id}', [\App\Http\Controllers\SalaController::class, 'destroy']);
    Route::get('bioskop/{id}/sala', [\App\Http\Controllers\SalaController::class, 'getSalaByBioskop']);

    //SJEDISTE
    Route::get('sjediste', [\App\Http\Controllers\SjedisteController::class, 'index']);
    Route::get('sjediste/{id}', [\App\Http\Controllers\SjedisteController::class, 'show']);
    Route::post('sjediste', [\App\Http\Controllers\SjedisteController::class, 'store']);
    Route::put('sjediste/{id}', [\App\Http\Controllers\SjedisteController::class, 'update']);
    Route::delete('sjediste/{id}', [\App\Http\Controllers\SjedisteController::class, 'destroy']);
    Route::get('sala/{id}/sjediste', [\App\Http\Controllers\SjedisteController::class, 'getSjedisteBySala']);

});
