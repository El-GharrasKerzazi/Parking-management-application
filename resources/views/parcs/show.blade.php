@extends('adminlte::page')

@section('content_header')
    <h1>Details Parking</h1>
@endsection

@section('content')
<div class="container ">

    <div class="row ">
        <div class="col-md-10 mx-auto">
            <div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                   
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-success 
                            text-center font-weight-bold text-uppercase"
                             href="{{ route('parcs.index') }}" 
                             role="button">{{ $parc->nom_parc}}</a>
                        </div>
                
                    </div>
                    
                </div>

                <div class="card-body">
                  <form class="row g-3 p-3">
                    <div class="col-md-4">
                       <div class="form-group mb-3">
                        <label for="numero_parc" class="form-label">Numéro_Parking</label>
                        <input type="text" class="form-control rounded-0"
                            name="numero_parc"
                            disabled 
                            value="{{$parc->numero_parc}}">
                       </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="nom_parc" class="form-label">Nom_Parking</label>
                            <input type="text" class="form-control rounded-0"
                                name="nom_parc"
                                disabled 
                                value="{{$parc->nom_parc}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                       <div class="form-group mb-3">
                        <label for="emplacement" class="form-label">Emplacement</label>
                        <input type="text" class="form-control rounded-0" 
                        value="{{$parc->emplacement}}"
                        name="emplacement" 
                        disabled>
                       </div>
                    </div>
                  </form>
                </div>
          
              </div>
        </div>
    </div>
</div>

@endsection






