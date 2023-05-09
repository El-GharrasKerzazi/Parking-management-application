@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-primary font-weight-bold ">

                    <h4>Moification Carburant</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('carburants.update' ,$carburant->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="NemuroCarburant">Numéro Carburant</label>
                                    <input type="text" class="form-control" 
                                    name="NemuroCarburant" value="{{ old('NemuroCarburant',$carburant->NemuroCarburant) }}" 
                                    placeholder="Numero Carburant">  
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateCarburant">Date Carburant</label>
                                    <input type="date" class="form-control" 
                                    name="DateCarburant" value="{{ old('DateCarburant',$carburant->DateCarburant) }}" 
                                    placeholder="DateCarburant">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Kilometrage">Kilometrage</label>
                                    <input type="text" class="form-control" 
                                    name="Kilometrage" value="{{ old('Kilometrage',$carburant->Kilometrage) }}" 
                                    placeholder="Kilometrage">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Quantite">Quantite</label>
                                    <input type="text" class="form-control" 
                                    name="Quantite" value="{{ old('Quantite',$carburant->Quantite) }}" 
                                    placeholder="Quantite">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Prix">Prix</label>
                                    <input type="text" class="form-control" 
                                    name="Prix" value="{{ old('Prix',$carburant->Prix) }}" 
                                    placeholder="Prix">
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fonctionnaire">Vehicule_Matricule</label>
                                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                                        <option value="" selected disabled>Choisir une matricule</option>
                                         @foreach ($vehicules as $vehicule)
                                           
                                          <option class='font-weight-bold' value="{{ $vehicule->id }}" selected>
                                             {{ $vehicule->Matricule }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>


                               <div class="col-md-2 text-center mx-auto ">
                                <div class="form-group mb-3 ">
                                    <button type="submit" class="btn btn-success form-control " style="margin-top:32px">
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

