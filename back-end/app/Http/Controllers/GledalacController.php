<?php

namespace App\Http\Controllers;

use App\Models\Gledalac;
use Illuminate\Http\Request;

class GledalacController extends Controller
{
    public function index()
    {
        $data = Gledalac::all(); //Model get all
        return $data;
    }

    public function store(Request $request)
    {
        $data = Gledalac::insert([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'karta_id' => $request->karta_id
        ]);

        return $data;
    }

    public function show($id)
    {
        $data = Gledalac::findOrFail($id);
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

    public function addKarta()
    {
        $data = \DB::select(\DB::raw("UPDATE gledalac
            SET karta_id = karta_id
            WHERE gledalac.id = gledalac_id
            "));

        return $data;
    }

}
