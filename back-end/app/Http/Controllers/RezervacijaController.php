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

    public function create(Request $request)
    {
        $data = $request->only(
            'broj_sjedista',
            'vrijeme',
            'status',
            'gledalac_id',
            'projekcija_id', );

        $validator = Validator::make($data, [
            'broj_sjedista' => 'required|integer',
            'vrijeme' => 'required|integer',
            'status' => 'required|string',
            'model_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $rezervacija = Rezervacija::create($data);

        return $rezervacija;
    }

    public function get($id)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $rezervacija = Rezervacija::find($id);

        if (!$rezervacija) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, booking not found.',
            ], 404);
        }

        return $rezervacija;
    }

    public function getRezervacijaModelsByGledalac($id)
    {
        $rezervacija = Rezervacija::where('gledalac_id', $id)->get();
        return $rezervacija;
    }

    public function getRezervacijaModelsByProjekcija($id)
    {
        $rezervacija = Rezervacija::where('projekcija_id', $id)->get();
        return $rezervacija;
    }

    public function show($id)
    {
        $data = Rezervacija::findOrFail($id);
        return $data;
    }

    public function update(Request $request, Rezervacija $rezervacija)
    {
//        $rezervacija = Rezervacija::find($id);
//        $rezervacija->update($request->all()); //model update
//        return $rezervacija;

        $data = $request->only(
            'broj_sjedista',
            'vrijeme',
            'status',
            'gledalac_id',
            'projekcija_id', );

        $validator = Validator::make($data, [
            'broj_sjedista' => 'required|integer',
            'vrijeme' => 'required|integer',
            'status' => 'required|string',
            'model_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $rezervacija->update($data);

        return $rezervacija;
    }

    public function delete(Rezervacija $rezervacija)
    {
        $rezervacija->delete();

        return response()->noContent();
    }
}
