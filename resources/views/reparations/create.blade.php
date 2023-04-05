@extends('adminlte::page')

@section('content_header')
<a class="btn btn-outline-danger" href="{{ route('reparations.index') }}" role="button">Back</a>
@endsection

@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Creation new Reparation</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('reparations.store') }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="numero_reparation">Numéro_Reparation</label>
                                    <input type="text" class="form-control" 
                                    name="numero_reparation" value="{{ old('numero_reparation') }}" 
                                    placeholder="Numéro_Reparation">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="date_reparation">Date_Reparation</label>
                                    <input type="date" class="form-control" 
                                    name="date_reparation" value="{{ old('date_reparation') }}" 
                                    placeholder="Date_Reparation">
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fonctionnaire">Vehicule_Matricule</label>
                                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                                        <option value="" selected disabled>Choisir une matricule</option>
                                         @foreach ($vehicules as $vehicule)
                                           
                                          <option class='font-weight-bold' value="{{ $vehicule->id }}">
                                             {{ $vehicule->matricule }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fonctionnaire">Mécanicien</label>
                                    <select name="fonctionnaire_id" id="fonctionnaire_id" class="form-control">
                                        <option value="" selected disabled>Choisir une Mécanicien</option>
                                         @foreach ($fonctionnaires as $fonctionnaire)
                                           
                                          <option class='font-weight-bold' value="{{ $fonctionnaire->id }}">
                                             {{ $fonctionnaire->cin }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-4 ">
                                <div class="form-group mb-3 ">
                                    <label for="date_assurance">Ajouté</label>
                                    <button type="submit" class="btn btn-primary form-control">
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

