@extends('adminlte::page')

@section('content_header')
<a class="btn btn-outline-danger" href="{{ route('vehicules.index') }}" role="button">Back</a>
@endsection

@section('content')
<div class="container">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-primary font-weight-bold shadow-lg ">

                    <h4>Modification  Vehicule</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('vehicules.update',$vehicule->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="matricule">Matricule</label>
                                    <input type="text" class="form-control" 
                                    name="matricule" value="{{ old('matricule',$vehicule->matricule) }}" 
                                    placeholder="Matricule">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" 
                                    name="type" value="{{ old('type',$vehicule->type) }}" 
                                    placeholder="Type">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="marque">Marque</label>
                                    <input type="text" class="form-control" 
                                    name="marque" value="{{ old('marque',$vehicule->marque) }}" 
                                    placeholder="Marque">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="mission">Mission</label>
                                    <input type="text" class="form-control" 
                                    name="mission" value="{{ old('mission',$vehicule->mission) }}" 
                                    placeholder="Mission">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="date_assurance">Date_Assurance</label>
                                    <input type="date" class="form-control" 
                                    name="date_assurance" value="{{ old('date_assurance',$vehicule->date_assurance) }}" 
                                    placeholder="Date_Assurance">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fonctionnaire">Conducteur</label>
                                    <select name="fonctionnaire_id" id="fonctionnaire_id" class="form-control">
                                        <option value="" selected disabled>Choisir une fonctionngradeaire</option>
                                         @foreach ($fonctionnaires as $fonctionnaire)
                                           
                                          <option class='font-weight-bold' value="{{ $fonctionnaire->id }}">
                                             {{ $fonctionnaire->cin }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Parc</label>
                                    <select name="parc_id" id="parc_id" class="form-control">
                                        <option value="" selected disabled>Choisir une parc</option>
                                         @foreach ($parcs as $parc)
                                           
                                          <option class='font-weight-bold' value="{{ $parc->id }}">
                                             {{ $parc->nom_parc }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4 ">
                                <div class="form-group mb-3 ">
                                    <label for="date_assurance">Modifie</label>
                                    <button type="submit" class="btn btn-success form-control">
                                        Submit
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

