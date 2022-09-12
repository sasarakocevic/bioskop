<?php

namespace App\Http\Controllers;

use App\Models\Karta;
use Illuminate\Http\Request;

class KartaController extends Controller
{

    public function index()
    {
        $data = Karta::all();
        return $data;
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = Karta::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }

    public function listaPopunjenosti()
    {
        $data = \DB::select(\DB::raw("SELECT COUNT(k.id) as 'broj_karata', s.broj_mjesta, s.naziv_sale, f.naziv
            FROM karta k, rezervacija r, sala s, film f
            WHERE r.sala_id = s.id AND k.rezervacija_id = r.id AND r.film_id = f.id
            GROUP BY r.id
            LIMIT 1"));

        return $data;
    }

}
