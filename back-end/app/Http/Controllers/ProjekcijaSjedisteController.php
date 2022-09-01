<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Projekcija_sjediste;
use Illuminate\Http\Request;

class ProjekcijaSjedisteController extends Controller
{
    public function index()
    {
        $data = Projekcija_sjediste::all(); //Model get all
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete(ProductCategory $id)
    {
        if (!auth()->user()->is_admin) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $id->delete();

        return response()->noContent();
    }
}
