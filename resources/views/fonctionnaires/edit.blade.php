@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 60px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Modification une Fonctionnaire</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('fonctionnaires.update',$fonctionnaire->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Cin">Cin</label>
                                    <input type="text" class="form-control" 
                                    name="Cin" value="{{ old('Cin' ,$fonctionnaire->Cin) }}" 
                                    placeholder="Cin">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Nom">Nom</label>
                                    <input type="text" class="form-control" 
                                    name="Nom" value="{{ old('Nom',$fonctionnaire->Nom) }}" 
                                    placeholder="Nom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Prenom">Prenom</label>
                                    <input type="text" class="form-control" 
                                    name="Prenom" value="{{ old('Prenom',$fonctionnaire->Prenom) }}" 
                                    placeholder="Prenom">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Sexe">Sexe</label>
                                    <select name="Sexe" id="Sexe" class="form-control">
                                       
                                        
                                        <option value="Homme" {{ $fonctionnaire->Sexe =="Homme" ? 'selected' : '' }}>Homme</option>
        
                                        <option  value="Femme" {{ $fonctionnaire->Sexe =="Femme" ? 'selected' : '' }}>Femme</option> 
                                             
                                    </select>
                                </div>
                            </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateNaissance">Date Naissance</label>
                                    <input type="date" class="form-control"  selected
                                    name="DateNaissance" value="{{ old('DateNaissance',$fonctionnaire->DateNaissance) }}" 
                                    placeholder="DateNaissance">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="LieuNaissance">Lieu Naissance</label>
                                    <input type="text" class="form-control" 
                                    name="LieuNaissance" value="{{ old('LieuNaissance',$fonctionnaire->LieuNaissance) }}" 
                                    placeholder="LieuNaissance">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" 
                                    name="Email" value="{{ old('Email',$fonctionnaire->Email) }}" 
                                    placeholder="Email">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Tel">Telephone</label>
                                    <input type="text" class="form-control" 
                                    name="Tel" value="{{ old('Tel',$fonctionnaire->Tel) }}" 
                                    placeholder="Tel">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Adresse">Adresse</label>
                                    <input type="text" class="form-control" 
                                    name="Adresse" value="{{ old('Adresse',$fonctionnaire->Adresse) }}" 
                                    placeholder="Adresse">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Service">Service</label>
                                    <input type="text" class="form-control" 
                                    name="Service" value="{{ old('Service',$fonctionnaire->Service) }}" 
                                    placeholder="Service">
                                </div>
                              </div>




                           <div class="col-md-2">
                            <div class="form-group"  style="margin-top:32px">
                                <button type="submit" class="btn btn-primary">
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

