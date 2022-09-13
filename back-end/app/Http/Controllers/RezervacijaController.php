<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use Illuminate\Http\Request;

class RezervacijaController extends Controller
{

    public function index()
    {
        $data = Rezervacija::all(); //Model get all
        return $data;
    }

    public function store(Request $request)
    {
        $data = Rezervacija::insert([
            'datum' => $request->datum,
            'vrijeme' => $request->vrijeme,
            'sala_id' => $request->sala_id,
            'film_id' => $request->film_id,
        ]);

        return $data;
    }

    public function show($id)
    {
        $data = Rezervacija::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
