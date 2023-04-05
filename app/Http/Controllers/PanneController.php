<?php

namespace App\Http\Controllers;

use App\Models\Panne;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class PanneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pannes = Panne::all();
         return view('pannes.index')->with([
            "pannes" => $pannes
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("pannes.create")->with([
            "vehicules" => Vehicule::all()
        ]);
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

        //validation :
        $this->validate($request,[
            "nom_panne" => "required",
            "type_panne" => "required",
            "vehicule_id" => "required|numeric"
        ]);

        //Store data :
        Panne::create([
            "nom_panne" => $request->nom_panne,
            "type_panne" => $request->type_panne,
            "vehicule_id" => $request->vehicule_id
           

        ]);

        //redirect route :
        return redirect()->route("pannes.index")->with([
            "success" => "panne ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function show(Panne $panne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function edit(Panne $panne)
    {
        //
        return view("pannes.edit")->with([
            "vehicules" => Vehicule::all(),
            "panne" => $panne
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panne $panne)
    {
        //

         //validation :
         $this->validate($request,[
            "nom_panne" => "required",
            "type_panne" => "required",
            "vehicule_id" => "required|numeric"
        ]);

        //Store data :
        $panne->update([
            "nom_panne" => $request->nom_panne,
            "type_panne" => $request->type_panne,
            "vehicule_id" => $request->vehicule_id
           

        ]);

        //redirect route :
        return redirect()->route("pannes.index")->with([
            "success" => "panne modifies avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panne  $panne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panne $panne)
    {
        //delete data :
        $panne->delete();

        //redirect route :
        return redirect()->route("pannes.index");
    }
}
