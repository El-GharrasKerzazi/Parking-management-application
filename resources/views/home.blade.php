@extends('adminlte::page')

@section('title')
    Page | Home
@endsection
@section('content_header')
    <h1>dashboard</h1>
@endsection

@section('content')
<div class="container ">
    <div class="row my-5 ">
        <div class="col-md-4">
           <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ \App\Models\Panne::count() }}</h3>
                <p>Panne</p>
            </div>
            <div class="icon">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <a href="{{ url('admin/pannes') }}" class="small-box-footer">
            more info <i class="fas fa-arrow-circle-right"></i>
            </a>
           </div>
        </div>


        <div class="col-md-4">
            <div class="small-box bg-warning">
             <div class="inner">
                 <h3>{{ \App\Models\Fonctionnaire::count() }}</h3>
                 <p>Fonctionnaire</p>
             </div>
             <div class="icon">
                 <i class="fas fa-users"></i>
             </div>
             <a href="{{ url('admin/fonctionnaires') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
         </div>


         <div class="col-md-4">
            <div class="small-box bg-success">
             <div class="inner">
                 <h3>{{ \App\Models\Reparation::count() }}</h3>
                 <p>Reparation</p>
             </div>
             <div class="icon">
                 <i class="fas fa-wrench"></i>
             </div>
             <a href="{{ url('admin/reparations') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
         </div>

            <div class="col-md-4">
                <div class="small-box bg-danger">
                 <div class="inner">
                     <h3>{{ \App\Models\Vehicule::count() }}</h3>
                     <p>Vehicule</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-car"></i>
                 </div>
                 <a href="{{ url('admin/vehicules') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-primary">
                 <div class="inner">
                     <h3>{{ \App\Models\Parc::count() }}</h3>
                     <p>Parc</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-university"></i>
                 </div>
                 <a href="{{ url('admin/parcs') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="small-box bg-dark">
                 <div class="inner">
                     <h3>{{ \App\Models\User::count() }}</h3>
                     <p>Admin</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-user-circle"></i>
                 </div>
                 <a href="#" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>
         </div>
    </div>

    
</div>
@endsection