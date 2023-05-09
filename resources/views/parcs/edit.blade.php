@extends('adminlte::page')



@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-6 mx-auto" style="margin-top: 80px">
           <div class="card my-5 shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header ">
                 <div class="text-center font-weight ">

                    
                    <a class="btn btn-info" 
                    href="{{ route('parcs.index') }}" 
                    role="button">Modifier  Parking</a>

                </div>
                      <div class="card-body">
                        <form action="{{ route("parcs.update",$parc->id) }}"  method="POST" class="mt-3">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group mb-3">
                                <label for="Numero_parc">Numéro_Parking</label>
                                <input type="text" class="form-control" 
                                name="Numero_parc" value="{{ old('Numero_parc', $parc->Numero_parc)  }}" 
                                placeholder="Numéro_Parking">
                            </div>

                            <div class="form-group mb-3">
                                <label for="Nom_parc">Nom_Parking</label>
                                <input type="text" class="form-control" 
                                name="Nom_parc" value="{{ old('Nom_parc' , $parc->Nom_parc) }}" 
                                placeholder="Nom_Parking">
                            </div>
                            
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
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

