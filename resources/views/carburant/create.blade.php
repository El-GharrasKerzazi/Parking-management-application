@extends('adminlte::page')

@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto " style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded" >
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Creation nouveau Carburant</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('carburants.store') }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="NemuroCarburant">Numéro Carburant</label>
                                    <input type="text" class="form-control" 
                                    name="NemuroCarburant" value="{{ old('NemuroCarburant') }}" 
                                    placeholder="NemuroCarburant">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="DateCarburant">Date Carburant</label>
                                    <input type="date" class="form-control" 
                                    name="DateCarburant" value="{{ old('DateCarburant') }}" 
                                    placeholder="DateCarburant">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Kilometrage">Kilometrage</label>
                                    <input type="text" class="form-control" 
                                    name="Kilometrage" value="{{ old('Kilometrage') }}" 
                                    placeholder="Kilometrage">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Quantite">Quantite</label>
                                    {{-- <span class="input-group-text">L</span> --}}
                                    <input type="text" class="form-control" 
                                    name="Quantite" value="{{ old('Quantite') }}" 
                                    placeholder="Quantite">
                                    
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Quantite">Prix</label>
                                   <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Dhs</div>
                                      </div>
                                    <input type="text" class="form-control" 
                                    name="Prix" value="{{ old('Prix') }}" 
                                    placeholder="Prix">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">.00</div>
                                      </div>
                                   </div>
                                </div>
                            </div>

                               <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="fonctionnaire">Vehicule_Matricule</label>
                                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                                        <option value="" selected disabled>Choisir une matricule</option>
                                         @foreach ($vehicules as $vehicule)
                                           
                                          <option class='font-weight-bold' value="{{ $vehicule->id }}">
                                             {{ $vehicule->Matricule }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                             
                               <div class="col-md-2 text-center mx-auto ">
                                <div class="form-group mb-3 ">
                                    <button type="submit" class="btn btn-primary form-control " style="margin-top:32px">
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

