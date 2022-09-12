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
        //
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
}
