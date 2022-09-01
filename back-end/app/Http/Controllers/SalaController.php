<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Product;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalaController extends Controller
{
    public function index()
    {

         //return \DB::select("select * from sala");
        $data = Sala::all();
        return $data;
    }

    public function create(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->only('naziv', 'broj_mjesta', 'bioskop_id');

        $validator = Validator::make($data, [
            'naziv' => 'required|string',
            'broj_mjesta' => 'required|integer',
            'bioskop_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $sala = Sala::create($data);

        return $sala;
    }

    public function show($id)
    {
        $data = Sala::findOrFail($id);
        return $data;
    }

    public function get($id)
    {
        $sala = Sala::fnd($id);

        if (!$sala) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, hall not found.',
            ], 404);
        }

        return $sala;
    }

    public function getSalaModelsByBioskop($id)
    {
        $sala = Sala::where('bioksop_id', $id)->get();
        return $sala;
    }

    public function update(Request $request, Sala $sala)
    {
//        $sala = Sala::find($id);
//        $sala->update($request->all()); //model update
//        return $sala;

        $data = $request->only('naziv', 'broj_mjesta', 'bioskop_id');

        $validator = Validator::make($data, [
            'naziv' => 'required|string',
            'broj_mjesta' => 'required|integer',
            'bioskop_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $sala->update($data);

        return $sala;
    }

    public function delete(Sala $sala)
    {
        $sala->delete();

        return response()->noContent();
    }
}
