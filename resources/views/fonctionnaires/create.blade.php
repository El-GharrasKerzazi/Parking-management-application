@extends('adminlte::page')

@section('content_header')
<a class="btn btn-outline-danger" href="{{ route('fonctionnaires.index') }}" role="button">Back</a>
@endsection

@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Creation new Fonctionnaire</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('fonctionnaires.store') }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="cin">Cin</label>
                                    <input type="text" class="form-control" 
                                    name="cin" value="{{ old('cin') }}" 
                                    placeholder="Cin">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" 
                                    name="nom" value="{{ old('nom') }}" 
                                    placeholder="Nom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" class="form-control" 
                                    name="prenom" value="{{ old('prenom') }}" 
                                    placeholder="Prenom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" 
                                    name="age" value="{{ old('age') }}" 
                                    placeholder="Age">
                                </div>
                            </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control" 
                                    name="grade" value="{{ old('grade') }}" 
                                    placeholder="grade">
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

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ml-2">
                                         Submit
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

