<?php

namespace App\Http\Controllers;


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

        return view("fonctionnaires.create");
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
            "Cin" => "required|unique:fonctionnaires,Cin",
            "Nom" => "required",
            "Prenom" => "required",
            "Sexe" => "required",
            "DateNaissance" => "required",
            "LieuNaissance" => "required",
            "Email" => "required",
            "Tel" => "required",
            "Adresse" => "required",
            "Service" => "required",
        ]);

        //Store data :
        Fonctionnaire::create([
            "Cin" => $request->Cin,
            "Nom" => $request->Nom,
            "Prenom" => $request->Prenom,
            "Sexe" => $request->Sexe,
            "DateNaissance" => $request->DateNaissance,
            "LieuNaissance" => $request->LieuNaissance,
            "Email" => $request->Email,
            "Tel" => $request->Tel,
            "Adresse" => $request->Adresse,
            "Service" => $request->Service,

        ]);

        //redirect route :
        return redirect()->route("fonctionnaires.index")->with([
            "success" => "Fonctionnaire ajoute avec succés"
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
            "Cin" => "required",
            "Nom" => "required",
            "Prenom" => "required",
            "Sexe" => "required",
            "DateNaissance" => "required",
            "LieuNaissance" => "required",
            "Email" => "required",
            "Tel" => "required",
            "Adresse" => "required",
            "Service" => "required",
        ]);

        //Store data :
        $fonctionnaire->update([
            "Cin" => $request->Cin,
            "Nom" => $request->Nom,
            "Prenom" => $request->Prenom,
            "Sexe" => $request->Sexe,
            "DateNaissance" => $request->DateNaissance,
            "LieuNaissance" => $request->LieuNaissance,
            "Email" => $request->Email,
            "Tel" => $request->Tel,
            "Adresse" => $request->Adresse,
            "Service" => $request->Service,

        ]);

        //redirect route :
        return redirect()->route("fonctionnaires.index")->with([
            "success" => "Fonctionnaire modifie avec succés"
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
