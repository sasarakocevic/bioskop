<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use App\Models\Brand;
use App\Models\Film;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bioskop::all(); //Model get all
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->only('naziv');
        $validator = Validator::make($data, [
            'naziv' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $bioskop = Bioskop::create($data);

        return response()->json($bioskop);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function get($id)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $bioskop = Bioskop::find($id);

        if (!$bioskop) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, cinema not found.',
            ], 404);
        }

        return $bioskop;
    }

    public function update(Request $request, Bioskop $bioskop)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $data = $request->only('naziv');
        $validator = Validator::make($data, [
            'naziv' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()], 200);
        }

        $bioskop -> update($data);

        return $bioskop;
    }

    public function delete(Bioskop $bioskop)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $bioskop->delete();

        return response()->noContent();
    }
}
