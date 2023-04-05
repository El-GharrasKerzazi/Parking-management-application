<?php

namespace App\Http\Controllers;

use App\Models\Parc;
use Illuminate\Http\Request;

class ParcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $parcs = Parc::all();
        return view("parcs.index",compact('parcs'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("parcs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation :
        $this->validate($request,[
            "numero_parc" => "required|numeric|unique:parcs,numero_parc",
            "nom_parc" => "required|unique:parcs,nom_parc",
            "emplacement" => "required"
        ]);

        //Store data :
        Parc::create([
            "numero_parc" => $request->numero_parc,
            "nom_parc" => $request->nom_parc,
            "emplacement" => $request->emplacement

        ]);

        //redirect route :
        return redirect()->route("parcs.index")->with([
            "success" => "parc ajoute avec succés"
        ]);
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parc  $parc
     * @return \Illuminate\Http\Response
     */
    public function show(Parc $parc)
    {
        // details data :
        
        return view('parcs.show')->with([
            'parc' => $parc
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parc  $parc
     * @return \Illuminate\Http\Response
     */
    public function edit(Parc $parc)
    {
        //
        
        
        return view('parcs.edit')->with([
            "parc" => $parc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parc  $parc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parc $parc)
    {
    

         //validation :
         $this->validate($request,[
            "numero_parc" => "required|numeric",
            "nom_parc" => "required",
            "emplacement" => "required"
        ]);

        //Update data :
        $parc->update([
            "numero_parc" => $request->numero_parc,
            "nom_parc" => $request->nom_parc,
            "emplacement" => $request->emplacement

        ]);

        //redirect route :
        return redirect()->route("parcs.index")->with([
            "success" => "parc modifie avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parc  $parc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parc $parc)
    {
        //

        //Delete data :
        $parc->delete();

        //redirect route :
        return redirect()->route("parcs.index");
    }
}
