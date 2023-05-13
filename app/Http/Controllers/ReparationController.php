<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reparation;
use Illuminate\Http\Request;

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
            "Numero_reparation" => "required|unique:reparations,Numero_reparation",
            "Date_reparation" => "required",
            "Type_reparation" => "required",
            "Prix_reparation" => "required",
            "vehicule_id" => "required|numeric"
        ]);
    
        //Store data :
        reparation::create([
            "Numero_reparation" => $request->Numero_reparation,
            "Date_reparation" => $request->Date_reparation,
            "Type_reparation" => $request->Type_reparation,
            "Prix_reparation" => $request->Prix_reparation,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("reparations.index")->with([
            "success" => "Reparation ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reparation  $reparation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reparation = Reparation::find($id);
   
        return response()->json($reparation);
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
            "Numero_reparation" => "required",
            "Date_reparation" => "required",
            "Type_reparation" => "required",
            "Prix_reparation" => "required",
            "vehicule_id" => "required|numeric"
        ]);
        

        //Update data :
        $reparation->update([
            "Numero_reparation" => $request->Numero_reparation,
            "Date_reparation" => $request->Date_reparation,
            "Type_reparation" => $request->Type_reparation,
            "Prix_reparation" => $request->Prix_reparation,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("reparations.index")->with([
            "success" => "Reparation modifie avec succés"
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
