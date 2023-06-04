{{-- @extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-5 mx-auto" style="margin-top: 80px">

            <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header mx-auto">
                   <div class="btn btn-success text-center font-weight-bold">
        
                      <h4>Creation new parking</h4>
                  </div>
                </div>
                        <div class="card-body">
                          <form action="{{ route('parcs.store') }}"  method="POST" class="mt-3">
                              @csrf
                              
                              
                                <div class="form-group mb-3">
                                    <label for="Numero_parc">Numéro parking</label>
                                    <input type="text" class="form-control" 
                                    name="Numero_parc" value="{{ old('Numero_parc') }}" 
                                    placeholder="Numéro_Parking">
                                </div>
                              
        
                              
                                <div class="form-group mb-3">
                                    <label for="Nom_parc">Nom parking</label>
                                    <input type="text" class="form-control" 
                                    name="Nom_parc" value="{{ old('Nom_parc') }}" 
                                    placeholder="Nom_Parking">
                                </div>
                              
        
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">
                                    Enregistré
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
 --}}
