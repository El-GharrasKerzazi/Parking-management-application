@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-8 mx-auto" style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header mx-auto ">
                 <div class="btn btn-success font-weight-bold ">

                    <h4>Modification Panne</h4>
                    
                </div>
              </div>
                
                      <div class="card-body">
                        <form action="{{ route('pannes.update' ,$panne->id) }}"  method="POST" class="row g-3 p-3 mt-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Numero_panne">Numero panne</label>
                                    <input type="text" class="form-control" 
                                    name="Numero_panne" value="{{ old('Numero_panne',$panne->Numero_panne) }}" 
                                    placeholder="Numero_panne">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Date_panne">Date panne</label>
                                    <input type="text" class="form-control" 
                                    name="Date_panne" value="{{ old('Date_panne',$panne->Date_panne) }}" 
                                    placeholder="Date_panne">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Type_panne">Type Panne</label>
                                    <input type="text" class="form-control" 
                                    name="Type_panne" value="{{ old('Type_panne',$panne->Type_panne) }}" 
                                    placeholder="Type_Panne">
                                </div>
                            </div>

                               <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="grade">Matricule</label>
                                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                                        <option value=""  disabled>Choisir une matricule</option>
                                         @foreach ($vehicules as $vehicule)
                                           
                                          <option class='font-weight-bold' selected value="{{ $vehicule->id }}">
                                             {{ $vehicule->Matricule }}
                                         </option> 
                                             
                                         @endforeach
                                    </select>
                                </div>
                               </div>

                                 <div class="form-group" style="margin-top:32px">
                                     <button type="submit" class="btn btn-primary ml-2">
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

