<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Carburant;
use Illuminate\Http\Request;

class CarburantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carburants = Carburant::all();
        return view('carburant.index',compact('carburants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carburant.create')->with([
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
            "NemuroCarburant" => "required|unique:carburants,NemuroCarburant",
            "DateCarburant" => "required",
            "Kilometrage" => "required",
            "Quantite" => "required",
            "Prix" => "required",
            "vehicule_id" => "required|numeric"
        ]);
    
        //Store data :
        carburant::create([
            "NemuroCarburant" => $request->NemuroCarburant,
            "DateCarburant" => $request->DateCarburant,
            "Kilometrage" => $request->Kilometrage,
            "Quantite" => $request->Quantite,
            "Prix" => $request->Prix,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("carburants.index")->with([
            "success" => "Carburant ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carburant  $carburant
     * @return \Illuminate\Http\Response
     */
    public function show(Carburant $carburant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carburant  $carburant
     * @return \Illuminate\Http\Response
     */
    public function edit(Carburant $carburant)
    {
        //
        return view('carburant.edit')->with([
            "vehicules" => Vehicule::all(),
            "carburant" =>$carburant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carburant  $carburant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carburant $carburant)
    {
        //
         //validation :
        $this->validate($request,[
            // "NemuroCarburant" => "required",
            "DateCarburant" => "required",
            "Kilometrage" => "required",
            "Quantite" => "required",
            "Prix" => "required",
            "vehicule_id" => "required|numeric"
        ]);
    
        //Store data :
        $carburant->update([
            "NemuroCarburant" => $request->NemuroCarburant,
            "DateCarburant" => $request->DateCarburant,
            "Kilometrage" => $request->Kilometrage,
            "Quantite" => $request->Quantite,
            "Prix" => $request->Prix,
            "vehicule_id" => $request->vehicule_id

        ]);

        //redirect route :
        return redirect()->route("carburants.index")->with([
            "success" => "Carburant modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carburant  $carburant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carburant $carburant)
    {
        //
         //Update data :
         $carburant->delete();

        //redirect route :
        return redirect()->route("carburants.index");
    }
}
