@extends('adminlte::page')

@section('title')
    Page | Home
@endsection

@section('css')
    <style>
        #thead{
            background-color: #2a2185;
            color: aliceblue;
        }
    </style>
@endsection
@section('content_header')
    <div class="ml-5"><button type="button" class="btn btn-success text-bold">Dashboard</button></div>
    
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
              
            <div class="col-md-12">
                <table class="table table-striped table-hover table-responsive-md">
                    
                        <thead id="thead">
                          <tr>
                            <th>Vehicule</th>
                            <th>Matricule</th>
                            <th>Marque</th>
                            <th>Type</th>
                            <th>Parking</th>
                          </tr>
                        </thead>
                        <tbody>
                             @foreach ($vehicules as $item)

                             <tr>
                                
                                <th>
                                    @if ($item->TypeCarb=='Essence')
                                    <img src="{{ asset('img/3993591_84522-removebg.png') }}" alt="" style="width: 60px;">

                                   @elseif($item->TypeCarb=='Diesel')
                                   <img src="{{ asset('img/ii.png') }}" alt="" style="width: 60px;">

                                   @elseif($item->TypeCarb=='Electrique')
                                   <img src="{{ asset('img/pp.png') }}" alt="" style="width: 60px;">

                                   @endif
                                </th>
                               
                                    
                              
                               
                                <th>{{ $item->Matricule }}</th>
                                <th>{{ $item->Marque }}</th>
                                <th>{{ $item->Type }}</th>
                                <th>{{ $item->parc->Nom_parc }}</th>
                              </tr>
                                 
                             @endforeach
                         
                        </tbody>
                      </table>
                  
            </div>

             
          

        
    </div>

    
</div>
@endsection