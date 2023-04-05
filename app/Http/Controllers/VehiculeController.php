<?php

namespace App\Http\Controllers;

use App\Models\Parc;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicules =Vehicule::all();
        return view('vehicules.index')->with([
            "vehicules" => $vehicules
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
        return view("vehicules.create")->with([
            "parcs" => Parc::all(),
            "fonctionnaires" => Fonctionnaire::all()
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
            "matricule" => "required|unique:vehicules,matricule",
            "type" => "required",
            "marque" => "required",
            "date_assurance" => "required",
            "mission" => "required",
            "fonctionnaire_id" => "required|numeric",
            "parc_id" => "required|numeric"
        ]);

        //Store data :
        Vehicule::create([
            "matricule" => $request->matricule,
            "type" => $request->type,
            "marque" => $request->marque,
            "date_assurance" => $request->date_assurance,
            "mission" => $request->mission,
            "fonctionnaire_id" => $request->fonctionnaire_id,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("vehicules.index")->with([
            "success" => "vehicule ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        //

        return view("vehicules.edit")->with([
            "fonctionnaires" => Fonctionnaire::all(),
            "parcs" => Parc::all(),
            "vehicule" => $vehicule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        //

          //validation :
          $this->validate($request,[
            "matricule" => "required|unique:vehicules,matricule,".$vehicule->id,
            "type" => "required",
            "marque" => "required",
            "date_assurance" => "required",
            "mission" => "required",
            "fonctionnaire_id" => "required|numeric",
            "parc_id" => "required|numeric"
        ]);

        //Store data :
        $vehicule->update([
            "matricule" => $request->matricule,
            "type" => $request->type,
            "marque" => $request->marque,
            "date_assurance" => $request->date_assurance,
            "mission" => $request->mission,
            "fonctionnaire_id" => $request->fonctionnaire_id,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("vehicules.index")->with([
            "success" => "vehicule modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        //

        //delete data :
        $vehicule->delete();

        //redirect route :
        return redirect()->route("vehicules.index");
    }
}
