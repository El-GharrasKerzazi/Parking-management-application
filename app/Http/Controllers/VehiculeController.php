<?php

namespace App\Http\Controllers;

use App\Models\Parc;
use App\Models\Vehicule;
use Illuminate\Http\Request;

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
            "Matricule" => "required|unique:vehicules,Matricule",
            "Type" => "required",
            "Marque" => "required",
            "Kilometrage" => "required",
            "TypeCarb" => "required",
            "DateDebutAssurance" => "required",
            "CoutCarburant" => "required",
            "CoutAssurance" => "required",
            "CoutReparation" => "required",
            "parc_id" => "required|numeric"
        ]);

        //Store data :
        Vehicule::create([
            "Matricule" => $request->Matricule,
            "Type" => $request->Type,
            "Marque" => $request->Marque,
            "Kilometrage" => $request->Kilometrage,
            "TypeCarb" => $request->TypeCarb,
            "DateDebutAssurance" => $request->DateDebutAssurance,
            "CoutCarburant" => $request->CoutCarburant,
            "CoutAssurance" => $request->CoutAssurance,
            "CoutReparation" => $request->CoutReparation,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("vehicules.index")->with([
            "success" => "Vehicule ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
   

    public function show($id)
    {
        $vehicule = Vehicule::find($id);
   
        return response()->json($vehicule);
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
            "Matricule" => "required",
            "Type" => "required",
            "Marque" => "required",
            "Kilometrage" => "required",
            "TypeCarb" => "required",
            "DateDebutAssurance" => "required",
            "CoutCarburant" => "required",
            "CoutAssurance" => "required",
            "CoutReparation" => "required",
            "parc_id" => "required|numeric"
        ]);

        //Update data :
        $vehicule->update([
            "Matricule" => $request->Matricule,
            "Type" => $request->Type,
            "Marque" => $request->Marque,
            "Kilometrage" => $request->Kilometrage,
            "TypeCarb" => $request->TypeCarb,
            "DateDebutAssurance" => $request->DateDebutAssurance,
            "CoutCarburant" => $request->CoutCarburant,
            "CoutAssurance" => $request->CoutAssurance,
            "CoutReparation" => $request->CoutReparation,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("vehicules.index")->with([
            "success" => "Vehicule modifier avec succés"
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


   //redirect in page home for show ditails the vehicule

     public function push(Vehicule $vehicule)
    {
        
        $vehicules =Vehicule::all();
        return view('home',compact('vehicules'));
    }
}

