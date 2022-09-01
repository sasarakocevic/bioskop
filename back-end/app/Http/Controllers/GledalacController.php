<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Gledalac;
use Illuminate\Http\Request;

class GledalacController extends Controller
{

    //svi gledaoci
    public function index()
    {
        $data = Gledalac::all(); //Model get all
        return $data;
    }

    public function create()
    {
        //
    }

    //dodavanje novog gledaoca
    public function store(Request $request)
    {
        $data = Gledalac::create($request->all());
        return $data;
    }

    public function get($id)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $gledalac = Gledalac::with('ime')->get()->find($id);
        if (!$gledalac) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, car model not found.',
            ], 404);
        }

        return $gledalac;
    }

    //prikaz jednog gledaoca
    public function show($id)
    {
        $data = Gledalac::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $gledalac = Gledalac::find($id);
        $gledalac->update($request->all()); //model update
        return $gledalac;
    }

    public function destroy($id)
    {
        $gledalac = Gledalac::findOrFail($id);
        $gledalac->delete($id);
        return '{"success":"Uspjesno ste obrisali gledaoca."}';
    }
}
