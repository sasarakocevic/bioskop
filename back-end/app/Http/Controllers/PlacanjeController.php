<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Placanje;
use App\Models\Rezervacija;
use Illuminate\Http\Request;

class PlacanjeController extends Controller
{

    public function index()
    {
        $data = Placanje::all(); //Model get all
        return $data;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function get($id)
    {
        $placanje = Placanje::fnd($id);

        if (!$placanje) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, hall not found.',
            ], 404);
        }

        return $placanje;
    }

    public function update(Request $request, $id)
    {
        $placanje = Placanje::find($id);

        $placanje->update([
            'iznos' => $request->iznos,
            'vrijeme' => $request->vrijeme,
            'kupon' => $request->kupon,
            'nacin_placanja' => $request->nacin_placanja,
            'rezervacija_id' => $request->rezervacija_id
        ]);

        return $placanje;
    }

    public function delete(Placanje $placanje)
    {
        $placanje->delete();

        return response()->noContent();
    }
}
