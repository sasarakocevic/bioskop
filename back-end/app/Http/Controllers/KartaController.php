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
        $data = \DB::select(\DB::raw("SELECT COUNT(k.id) AS 'broj_karata', s.broj_mjesta, s.naziv_sale, f.naziv
FROM karta k
JOIN rezervacija r ON r.id = k.rezervacija_id
JOIN film f ON f.id = r.film_id
JOIN sala s ON s.id = r.sala_id
GROUP BY r.id"));

        return $data;
    }


}
