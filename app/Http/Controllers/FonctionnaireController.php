<?php

namespace App\Http\Controllers;

use App\Models\Parc;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;

class FonctionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $fonctionnaires = Fonctionnaire::all();
        return view("fonctionnaires.index",compact('fonctionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirect view create with data table parc :

        return view("fonctionnaires.create")->with([
            "parcs" => Parc::all()
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
            "cin" => "required|unique:fonctionnaires,cin",
            "nom" => "required",
            "prenom" => "required",
            "age" => "required|numeric",
            "grade" => "required",
            "parc_id" => "required|numeric"
        ]);

        //Store data :
        Fonctionnaire::create([
            "cin" => $request->cin,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "age" => $request->age,
            "grade" => $request->grade,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("fonctionnaires.index")->with([
            "success" => "fonctionnaire ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Fonctionnaire $fonctionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonctionnaire $fonctionnaire)
    {
        //
        return view("fonctionnaires.edit")->with([
            "parcs" => Parc::all(),
            "fonctionnaire" => $fonctionnaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonctionnaire $fonctionnaire)
    {
        //

        //validation :
        $this->validate($request,[
            "cin" => "required|unique:fonctionnaires,cin,".$fonctionnaire->id,
            "nom" => "required",
            "prenom" => "required",
            "age" => "required|numeric",
            "grade" => "required",
            "parc_id" => "required|numeric"
        ]);

        //Store data :
        $fonctionnaire->update([
            "cin" => $request->cin,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "age" => $request->age,
            "grade" => $request->grade,
            "parc_id" => $request->parc_id

        ]);

        //redirect route :
        return redirect()->route("fonctionnaires.index")->with([
            "success" => "fonctionnaire modifie avec succés"
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonctionnaire  $fonctionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonctionnaire $fonctionnaire)
    {
        //
         //Delete data :
         $fonctionnaire->delete();

         //redirect route :
         return redirect()->route("fonctionnaires.index");
    }
}
