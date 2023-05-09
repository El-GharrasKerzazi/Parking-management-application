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
            "Numero_parc" => "required|numeric|unique:parcs,Numero_parc",
            "Nom_parc" => "required|unique:parcs,Nom_parc"
            
        ]);

        //Store data :
        Parc::create([
            "Numero_parc" => $request->Numero_parc,
            "Nom_parc" => $request->Nom_parc
           

        ]);

        //redirect route :
        return redirect()->route("parcs.index")->with([
            "success" => "Parc ajoute avec succés"
        ]);
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parc  $parc
     * @return \Illuminate\Http\Response
     */
    // public function show(Parc $parc)
    // {
    //     // details data :
        
    //     return view('parcs.index')->with([
    //         'parc' => $parc
    //     ]);
    // }
    public function show($id)
    {
        $parc = Parc::find($id);
   
        return response()->json($parc);
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
            "Numero_parc" => "required|numeric",
            "Nom_parc" => "required"
        ]);

        //Update data :
        $parc->update([
            "Numero_parc" => $request->Numero_parc,
            "Nom_parc" => $request->Nom_parc
            

        ]);

        //redirect route :
        return redirect()->route("parcs.index")->with([
            "success" => "Parc modifie avec succés"
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
