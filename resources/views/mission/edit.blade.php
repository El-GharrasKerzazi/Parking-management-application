@extends('adminlte::page')


@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Modification mission</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('missions.update',$mission->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="CodeMission">Code Mission</label>
                                    <input type="text" class="form-control" 
                                    name="CodeMission" value="{{ old('CodeMission',$mission->CodeMission) }}" 
                                    placeholder="Code Mission">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateDepart">Date Depart</label>
                                    <input type="date" class="form-control" 
                                    name="DateDepart" value="{{ old('DateDepart',$mission->DateDepart) }}" 
                                    placeholder="Date Depart">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateRetour">Date Retour</label>
                                    <input type="date" class="form-control" 
                                    name="DateRetour" value="{{ old('DateRetour',$mission->DateRetour) }}" 
                                    placeholder="Date Retour">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Lieu">Lieu</label>
                                    <input type="text" class="form-control" 
                                    name="Lieu" value="{{ old('Lieu',$mission->Lieu) }}" 
                                    placeholder="Lieu">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Object">Object</label>
                                    <input type="text" class="form-control" 
                                    name="Object" value="{{ old('Object',$mission->Object) }}" 
                                    placeholder="Object">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Ville">Ville</label>
                                    <input type="text" class="form-control" 
                                    name="Ville" value="{{ old('Ville',$mission->Ville) }}" 
                                    placeholder="Ville">
                                </div>
                            </div>


                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Matricule</label>
                                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                                        <option value=""  disabled>Choisir une matricule</option>
                                         @foreach ($vehicules as $vehicule)
                                           
                                          <option class='font-weight-bold' selected value="{{ $vehicule->id }}">
                                             {{ $vehicule->Matricule }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Fonctionnaire</label>
                                    <select name="fonctionnaire_id" id="fonctionnaire_id" class="form-control">
                                        <option value=""  disabled>Choisir un fonctionnaire</option>
                                         @foreach ($fonctionnaires as $fonctionnaire)
                                           
                                          <option class='font-weight-bold' selected value="{{ $fonctionnaire->id }}">
                                             {{ $fonctionnaire->Nom }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4 ">
                                <div class="form-group mb-3 ">
                                    <button type="submit" class="btn btn-primary form-control" style="margin-top:32px">
                                        Modifier
                                   </button>
                                   
                                </div>
                            </div>
                        </form>
                      </div>

                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection

