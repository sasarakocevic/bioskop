<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        $data = Sala::all(); //Model get all
        return $data;
    }

    public function store(Request $request)
    {
        $data = Sala::insert([
            'broj_mjesta' => $request->broj_mjesta,
            'naziv_sale' => $request->naziv_sale,
        ]);

        return $data;
    }

    public function show($id)
    {
        $data = Sala::findOrFail($id);
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
