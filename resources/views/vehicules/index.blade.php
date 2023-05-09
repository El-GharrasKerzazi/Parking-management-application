@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Vehicules
@endsection

@section('content')
<div class="container ">
    <div class="row ">
            <div class="col-md-4 mt-4">
                <div class="small-box" style="background-color: rgb(172, 228, 99)">
                 <div class="inner">
                     <h3>{{ \App\Models\Carburant::count() }}</h3>
                     <p class="text-bold">Carburant</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-battery-half"></i>
                 </div>
                 <a href="{{ url('admin/carburants') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <div class="small-box" style="background-color: rgb(230, 165, 81)">
                 <div class="inner">
                     <h3>{{ \App\Models\Reparation::count() }}</h3>
                     <p class="text-bold">Reparation</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-wrench"></i>
                 </div>
                 <a href="{{ url('admin/reparations') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <div class="small-box" style="background-color: rgb(212, 59, 166)">
                 <div class="inner">
                     <h3>{{ \App\Models\Mission::count() }}</h3>
                     <p class="text-bold">Mission</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-spinner"></i>
                 </div>
                 <a href="{{ url('admin/missions') }}" class="small-box-footer">
                 more info <i class="fas fa-arrow-circle-right"></i>
                 </a>
                </div>
            </div>
          {{-- <div class="row">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div> --}}
          
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center font-weight-bold">
     
                       <h4 class="btn btn-info">Vehicule</h4>
     
     
                     </div>
                   </div>
                  <div class="card-body">
                    <div class="col-md-12">
                        <table id="myTable" class="table table-bordered table-striped  table-responsive-md table-hover">
                            <thead style="background-color: rgb(114, 47, 177);color:aliceblue">
                               <tr>
                                   <th>ID</th>
                                   <th>Matricule</th>
                                   <th>Type</th>
                                   <th>Marque</th>
                                   <th>Kilometrage</th>
                                   <th>Type Carburant</th>
                                   <th>Cout Assurance</th>
                                   <th>Parc</th>
                                   <th>Action</th>
                                   
                           
                                   
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($vehicules as $key => $vehicule)
                               <tr>
                                   <td>{{ $key+=1 }}</td>
                                   <td>{{ $vehicule->Matricule }}</td>
                                   <td>{{ $vehicule->Type }}</td>
                                   <td>{{ $vehicule->Marque }}</td>
                                   <td>{{ $vehicule->Kilometrage }}</td>
                                   <td>{{ $vehicule->TypeCarb}}</td>
                                   <td>{{ $vehicule->CoutAssurance}}</td>
                                   <td>{{ $vehicule->parc->Nom_parc }}</td>
                                   <td class="d-flex justify-content-center align-items-center">
                                      
                                       <a href="{{ route('vehicules.show' , $vehicule->id) }}" 
                                          class="btn btn-sm btn-primary">
                                          <i class="fas fa-eye"></i>
                                       </a>
                                       
                                       <a href="{{ route('vehicules.edit' , $vehicule->id) }}" 
                                          class="btn btn-sm btn-warning mx-2">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <form  id="{{ $vehicule->id }}" action="{{ route('vehicules.destroy' , $vehicule->id) }}" method="post">
                           
                                           @csrf
                                           @method('DELETE')
                                       </form>
                                           <button  onclick="deleteEmp({{ $vehicule->id }})"
                                               type="submite" 
                                               class="btn btn-sm btn-danger">
                                               <i class="fas fa-trash"></i>
                                           </button>
                                   </td>
                                   
                               </tr>
                               @endforeach
                            </tbody>
                       </table>
                    </div>
                  </div>
              </div>
            </div>
           </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel','print', 'colvis'
                ]
            });
        });
    </script>
    @if (session()->has('success'))
    <script>
          
          Swal.fire({
          position: 'top-auto',
          icon: 'success',
          title: "{{ session()->get('success') }}",
          showConfirmButton: false,
          timer: 3500
          })
    
    </script>
        
    @endif

    

<script>
       function deleteEmp(id){
            Swal.fire({
                 title: 'Es-tu sûr?',
                 text: "Vous ne pourrez pas revenir en arrière !",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#58d622',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Oui, supprimez-le !'
                 }).then((result) => {
                 if(result.isConfirmed) {
                    document.getElementById(id).submit();
            Swal.fire(
                 'Supprimé !',
                 'Votre fichier a été supprimé.',
                 'success'
               )
             }
           })
        }
    </script>
    

@endsection