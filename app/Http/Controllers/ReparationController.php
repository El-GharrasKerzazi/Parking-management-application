<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reparation;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reparations = Reparation::all();
        return view('reparations.index',compact('reparations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reparations.create')->with([
            "fonctionnaires" => Fonctionnaire::all(),
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
            "numero_reparation" => "required|unique:reparations,numero_reparation",
            "date_reparation" => "required",
            "fonctionnaire_id" => "required|numeric",
            "vehicule_id" => "required|numeric"
        ]);
    
        //Store data :
        reparation::create([
            "numero_reparation" => $request->numero_reparation,
            "date_reparation" => $request->date_reparation,
            "fonctionnaire_id" => $request->fonctionnaire_id,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("reparations.index")->with([
            "success" => "reparation ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show(Reparation $reparation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparation $reparation)
    {
        //
        return view('reparations.edit')->with([
            "fonctionnaires" => Fonctionnaire::all(),
            "vehicules" => Vehicule::all(),
            "reparation" =>$reparation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reparation $reparation)
    {
        //
         //validation :
         $this->validate($request,[
            "numero_reparation" => "required|unique:reparations,numero_reparation,".$reparation->id,
            "date_reparation" => "required",
            "fonctionnaire_id" => "required|numeric",
            "vehicule_id" => "required|numeric"
        ]);

        //Update data :
        $reparation->update([
            "numero_reparation" => $request->numero_reparation,
            "date_reparation" => $request->date_reparation,
            "fonctionnaire_id" => $request->fonctionnaire_id,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("reparations.index")->with([
            "success" => "reparation modifie avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparation $reparation)
    {
        //
         //Update data :
         $reparation->delete();

        //redirect route :
        return redirect()->route("reparations.index");
    }
}
