@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 60px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Creation nouveau Fonctionnaire</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('fonctionnaires.store') }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Cin">Cin</label>
                                    <input type="text" class="form-control" 
                                    name="Cin" value="{{ old('Cin') }}" 
                                    placeholder="Cin">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Nom">Nom</label>
                                    <input type="text" class="form-control" 
                                    name="Nom" value="{{ old('Nom') }}" 
                                    placeholder="Nom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Prenom">Prenom</label>
                                    <input type="text" class="form-control" 
                                    name="Prenom" value="{{ old('Prenom') }}" 
                                    placeholder="Prenom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Sexe">Sexe</label>
                                    <select name="Sexe" id="Sexe" class="form-control">
                                        <option selected disabled>Choisir type de Sexe</option>
                                        
                                        <option value="Homme">Homme</option>
        
                                        <option  value="Femme">Femme</option> 
                                             
                                    </select>
                                </div>
                            </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateNaissance">Date Naissance</label>
                                    <input type="date" class="form-control" 
                                    name="DateNaissance" value="{{ old('DateNaissance') }}" 
                                    placeholder="DateNaissance">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="LieuNaissance">Lieu Naissance</label>
                                    <input type="text" class="form-control" 
                                    name="LieuNaissance" value="{{ old('LieuNaissance') }}" 
                                    placeholder="LieuNaissance">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" 
                                    name="Email" value="{{ old('Email') }}" 
                                    placeholder="Email">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Tel">Telephone</label>
                                    <input type="text" class="form-control" 
                                    name="Tel" value="{{ old('Tel') }}" 
                                    placeholder="Tel">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                    <input type="text" class="form-control" 
                                    name="Adresse" value="{{ old('Adresse') }}" 
                                    placeholder="Adresse">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Service">Service</label>
                                    <input type="text" class="form-control" 
                                    name="Service" value="{{ old('Service') }}" 
                                    placeholder="Service">
                                </div>
                              </div>


                            <div class="col-md-3">
                                <div class="form-group" style="margin-top:32px">
                                    
                                    <button type="submit" class="btn btn-primary ml-2">
                                        Enregistré
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

