@extends('adminlte::page')

@section('content_header')
<a class="btn btn-outline-danger" href="{{ route('pannes.index') }}" role="button">Back</a>
@endsection

@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Creation new Panne</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('pannes.store') }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nom_panne">Nom_Panne</label>
                                    <input type="text" class="form-control" 
                                    name="nom_panne" value="{{ old('nom_panne') }}" 
                                    placeholder="Nom_Panne">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="type_panne">Type_Panne</label>
                                    <input type="text" class="form-control" 
                                    name="type_panne" value="{{ old('type_panne') }}" 
                                    placeholder="Type_Panne">
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Matricule_Vehicule</label>
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

                                 <div class="form-group">
                                     <button type="submit" class="btn btn-primary ml-2">
                                         Ajouté
                                     </button>

                                </div>
                        </form>
                      </div>

                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection

