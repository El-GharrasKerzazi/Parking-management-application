@extends('adminlte::page')

@section('content_header')
    <h1>Details Parking</h1>
@endsection

@section('content')
<div class="container ">

    <div class="row ">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                   
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success 
                            text-center font-weight-bold text-uppercase"
                             href="{{ route('parcs.index') }}" 
                             role="button">{{ $parc->Nom_parc}}</a>
                        </div>
                
                    </div>
                    
                </div>
            
                <div class="card-body">
                  <form class="row g-3 p-3">
                    <div class="col-md-6">
                       <div class="form-group mb-3">
                        <label for="Numero_parc" class="form-label">Numéro_Parking</label>
                        <input type="text" class="form-control rounded-0"
                            name=Numero_parc"
                            disabled 
                            value="{{$parc->Numero_parc}}">
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="Nom_parc" class="form-label">Nom_Parking</label>
                            <input type="text" class="form-control rounded-0"
                                name="Nom_parc"
                                disabled 
                                value="{{$parc->Nom_parc}}">
                        </div>
                    </div>
                  </form>
                </div>
            
              </div>
        </div>
    </div>
</div>

@endsection






