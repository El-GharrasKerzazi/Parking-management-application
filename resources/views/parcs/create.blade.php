@extends('adminlte::page')

@section('content_header')
<a class="btn btn-outline-danger" href="{{ route('parcs.index') }}" role="button">Back</a>
@endsection

@section('content')
<div class="container ">

    @include('layouts.alert')
    <div class="row ">
        <div class="col-md-6 mx-auto">
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
                                <label for="numero_parc">Numéro_Parking</label>
                                <input type="text" class="form-control" 
                                name="numero_parc" value="{{ old('numero_parc') }}" 
                                placeholder="Numéro_Parking">
                            </div>

                            <div class="form-group mb-3">
                                <label for="nom_parc">Nom_Parking</label>
                                <input type="text" class="form-control" 
                                name="nom_parc" value="{{ old('nom_parc') }}" 
                                placeholder="Nom_Parking">
                            </div>

                            <div class="form-group mb-3">
                                <label for="emplacement">Emplacement</label>
                                <input type="text" class="form-control" 
                                name="emplacement" value="{{ old('emplacement') }}" 
                                placeholder="Emplacement">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                         Submit
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

