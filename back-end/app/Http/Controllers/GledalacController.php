<?php

namespace App\Http\Controllers;

use App\Models\Gledalac;
use Illuminate\Http\Request;

class GledalacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //svi gledaoci
    public function index()
    {
        $data = Gledalac::all(); //Model get all
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //dodavanje novog gledaoca
    public function store(Request $request)
    {
        $data = Gledalac::create($request->all());
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //prikaz jednog gledaoca
    public function show($id)
    {
        $data = Gledalac::findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gledalac = Gledalac::find($id);
        $gledalac->update($request->all()); //model update
        return $gledalac;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gledalac = Gledalac::findOrFail($id);
        $gledalac->delete($id);
        return '{"success":"Uspjesno ste obrisali gledaoca."}';
    }
}
