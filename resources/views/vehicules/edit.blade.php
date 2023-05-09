@extends('adminlte::page')



@section('content')
<div class="container">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 60px">
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
                                    <label for="Matricule">Matricule</label>
                                    <input type="text" class="form-control" 
                                    name="Matricule" value="{{ old('Matricule',$vehicule->Matricule) }}" 
                                    placeholder="Matricule">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Type">Type</label>
                                    <input type="text" class="form-control" 
                                    name="Type" value="{{ old('Type',$vehicule->Type) }}" 
                                    placeholder="Type">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="marque">Marque</label>
                                    <input type="text" class="form-control" 
                                    name="Marque" value="{{ old('Marque',$vehicule->Marque) }}" 
                                    placeholder="Marque">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Kilometrage">Kilometrage</label>
                                    <input type="text" class="form-control" 
                                    name="Kilometrage" value="{{ old('Kilometrage',$vehicule->Kilometrage) }}" 
                                    placeholder="Kilometrage">
                                    
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="TypeCarb">Type Carburant</label>
                                    <select name="TypeCarb" id="TypeCarb" class="form-control">
                                       
                                        
                                        <option value="Essence" {{ $vehicule->TypeCarb =="Essence" ? 'selected' : '' }}>Essence</option>
        
                                        <option  value="Diesel" {{ $vehicule->TypeCarb =="Diesel" ? 'selected' : '' }}>Diesel</option> 

                                        <option  value="Electrique" {{ $vehicule->TypeCarb =="Electrique" ? 'selected' : '' }}>Electrique</option> 
                                             
                                    </select>
                                </div>
                               </div>


                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateDebutAssurance">Date Assurance</label>
                                    <input type="date" class="form-control" 
                                    name="DateDebutAssurance" value="{{ old('DateDebutAssurance',$vehicule->DateDebutAssurance) }}" 
                                    placeholder="DateDebutAssurance">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="CoutCarburant">Cout Carburant</label>
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Dhs</div>
                                          </div>
                                        <input type="text" class="form-control" 
                                        name="CoutCarburant" value="{{ old('CoutCarburant',$vehicule->CoutCarburant) }}" 
                                        placeholder="CoutCarburant">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">.00</div>
                                          </div>
                                     </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="CoutAssurance">Cout Assurance</label>
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Dhs</div>
                                          </div>
                                        <input type="text" class="form-control" 
                                        name="CoutAssurance" value="{{ old('CoutAssurance',$vehicule->CoutAssurance) }}" 
                                        placeholder="CoutAssurance">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">.00</div>
                                          </div>
                                     </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="CoutReparation">Cout Reparation</label>
                                       <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Dhs</div>
                                          </div>
                                        <input type="text" class="form-control" 
                                        name="CoutReparation" value="{{ old('CoutReparation',$vehicule->CoutReparation) }}" 
                                        placeholder="CoutReparation">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">.00</div>
                                          </div>
                                       </div>
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grade">Parc</label>
                                    <select name="parc_id" id="parc_id" class="form-control">
                                        <option value="" selected disabled>Choisir une parc</option>
                                         @foreach ($parcs as $parc)
                                           
                                          <option class='font-weight-bold' value="{{ $parc->id }}" selected>
                                             {{ $parc->Nom_parc }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                               <div class="col-md-2 ">
                                <div class="form-group mb-3 " style="margin-top:32px">
                                    
                                    <button type="submit" class="btn btn-success form-control">
                                        Modifier
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

