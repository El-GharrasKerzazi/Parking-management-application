@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-10 mx-auto" style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Moification Reparation</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('reparations.update' ,$reparation->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Numero_reparation">Numéro Reparation</label>
                                    <input type="text" class="form-control" 
                                    name="Numero_reparation" value="{{ old('Numero_reparation',$reparation->Numero_reparation) }}" 
                                    placeholder="Numéro_Reparation">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Date_reparation">Date Reparation</label>
                                    <input type="date" class="form-control" 
                                    name="Date_reparation" value="{{ old('Date_reparation',$reparation->Date_reparation) }}" 
                                    placeholder="Date_Reparation">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Type_reparation">Type Reparation</label>
                                    <input type="text" class="form-control" 
                                    name="Type_reparation" value="{{ old('Type_reparation',$reparation->Type_reparation) }}" 
                                    placeholder="Type_reparation">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="Prix_reparation">Prix reparation</label>
                                    <input type="text" class="form-control" 
                                    name="Prix_reparation" value="{{ old('Prix_reparation',$reparation->Prix_reparation) }}" 
                                    placeholder="Prix_reparation">
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

