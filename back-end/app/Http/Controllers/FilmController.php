<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $data = Film::all(); //Model get all
        return $data;
    }

    public function store(Request $request)
    {
        $data = Film::insert([
            'naziv' => $request->naziv,
            'zanr' => $request->zanr,
            'trajanje' => $request->trajanje,
        ]);

        return $data;
    }

    public function show($id)
    {
        $data = Film::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete($id);
        return '{"Success":"Uspjesno ste obrisali film."}';
    }

    public function najgledanijiFilm()
    {
        $data = \DB::select(\DB::raw("SELECT f.naziv, COUNT(f.id) AS `broj_prikazivanja`
            FROM rezervacija r
            JOIN film f ON f.id = r.film_id
            WHERE r.datum > date_sub(NOW(), INTERVAL 1 DAY)
            GROUP BY f.naziv
            ORDER BY `broj_prikazivanja` DESC
            LIMIT 1"));

        return $data;
    }
}
