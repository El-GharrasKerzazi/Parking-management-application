<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Vehicule;
use App\Models\Fonctionnaire;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return data from model :
        $missions = Mission::all();
        return view('mission.index',compact('missions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirect to  create page with data  vehicule and fonctionnaire :

        return view('mission.create')->with([
            'vehicules' => Vehicule::all(),
            'fonctionnaires' => Fonctionnaire::all()
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
        // validation 
            $this->validate($request,[
                'CodeMission' =>  'required',
                'DateDepart' => 'required',
                'DateRetour' => 'required',
                'Lieu' => 'required',
                'Object' => 'required',
                'Ville' => 'required',
                'vehicule_id' => 'required|numeric',
                'fonctionnaire_id' => 'required|numeric'
            ]);

            //Store data in database :
             Mission::create([
                "CodeMission" => $request->CodeMission,
                "DateDepart" => $request->DateDepart,
                "DateRetour" => $request->DateRetour,
                "Lieu" => $request->Lieu,
                "Object" => $request->Object,
                "Ville" => $request->Ville,
                "vehicule_id" => $request->vehicule_id,
                "fonctionnaire_id" => $request->fonctionnaire_id,
             ]);   
            
        //redirect route :
        return redirect()->route("missions.index")->with([
            "success" => "Mission ajoute avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mission = Mission::find($id);
   
        return response()->json($mission);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
         //Redirect to  create page with data  vehicule and fonctionnaire :

         return view('mission.edit')->with([
            'vehicules' => Vehicule::all(),
            'fonctionnaires' => Fonctionnaire::all(),
            'mission' => $mission
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
         // validation 
         $this->validate($request,[
            'CodeMission' =>  'required',
            'DateDepart' => 'required',
            'DateRetour' => 'required',
            'Lieu' => 'required',
            'Object' => 'required',
            'Ville' => 'required',
            'vehicule_id' => 'required|numeric',
            'fonctionnaire_id' => 'required|numeric'
        ]);

        //Update data in database :
         $mission->update([
            "CodeMission" => $request->CodeMission,
            "DateDepart" => $request->DateDepart,
            "DateRetour" => $request->DateRetour,
            "Lieu" => $request->Lieu,
            "Object" => $request->Object,
            "Ville" => $request->Ville,
            "vehicule_id" => $request->vehicule_id,
            "fonctionnaire_id" => $request->fonctionnaire_id,
         ]);   

        //redirect route :
        return redirect()->route("missions.index")->with([
            "success" => "Mission modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        //
           //delete data :
           $mission->delete();

           //redirect route :
           return redirect()->route("missions.index");
       }
    }

