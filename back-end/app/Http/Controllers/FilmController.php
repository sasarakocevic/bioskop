<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Film;
use App\Models\Gledalac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{

    public function index()
    {
        $data = Film::all(); //Model get all
        return $data;
    }

    public function create(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->only('naziv', 'zanr', 'trajanje',
            'datum_izlaska', 'slika', 'opis');

        $validator = Validator::make($data, [
            'naziv' => 'required|string',
            'zanr' => 'required|string',
//            'trajanje' => 'required|integer',
//            'datum_izlaska' => 'required|integer',
            'slika' => 'required|string',
            'opis' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $film = Film::create($data);

        return $film;
    }

    public function store(Request $request)
    {
        $data = Film::create($request->all());
        return $data;
    }

    public function show($id)
    {
        $data = Film::findOrFail($id);
        return $data;
    }

    public function get($id)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $film = Film::with('naziv')->get()->find($id);
        if (!$film) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, movie not found.',
            ], 404);
        }

        return $film;
    }

    public function update(Request $request, Film $film)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->only('naziv', 'zanr', 'trajanje',
            'datum_izlaska', 'slika', 'opis');

        $validator = Validator::make($data, [
            'naziv' => 'required|string',
            'zanr' => 'required|string',
//            'trajanje' => 'required|integer',
//            'datum_izlaska' => 'required|integer',
            'slika' => 'required|string',
            'opis' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $film->update($data);

        return $film;
    }

    public function delete(Film $film)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $film->delete();

        return response()->noContent();
    }
}
