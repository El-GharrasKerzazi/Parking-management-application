@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Carburant
@endsection

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-4 mt-4">
            <div class="small-box" style="background-color: rgb(27, 178, 238)">
             <div class="inner">
                 <h3>{{ \App\Models\Vehicule::count() }}</h3>
                 <p class="text-bold">Vehicule</p>
             </div>
             <div class="icon">
                 <i class="fas fa-truck"></i>
             </div>
             <a href="{{ url('admin/vehicules') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
        </div>


        <div class="col-md-8 mt-4">
            <div class="small-box" style="background-color: rgb(83, 223, 70)">
             <div class="inner">
                 <h3>{{ \App\Models\Carburant::count() }}</h3>
                 <p class="text-bold">Carburant</p>
             </div>
             <div class="icon">
                 <i class="fas fa-battery-half"></i>
             </div>
             <a href="{{ url('admin/carburant') }}" class="small-box-footer">
             more info <i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
        </div>
          {{-- <div class="row my-5">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div> --}}
           <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header">
                    <div class="text-center font-weight-bold ">
     
                       <h4 class="btn btn-info">Carburant</h4>
     
     
                     </div>
                   </div>
                  <div class="card-body">
                    <div class="table-responsive-md col-md-12">
                        <table id="myTable" class="table table-bordered table-hover table-striped table-responsive-lg">
                            <thead style="background-color: rgb(114, 47, 177);color:aliceblue">
                               <tr>
                                   <th>ID</th>
                                   <th>Numéro Carburant</th>
                                   <th>Date Carburant</th>
                                   <th>Kilometrage</th>
                                   <th>Quantite</th>
                                   <th>Prix</th>
                                   <th>Matricule</th>
                                   <th>Action</th>
                                   
                           
                                   
                               </tr>
                            </thead>
                            <tbody>
                               @foreach ($carburants as $key => $carburant)
                               <tr>
                                   <td>{{ $key+=1 }}</td>
                                   <td>{{ $carburant->NemuroCarburant }}</td>
                                   <td>{{ $carburant->DateCarburant }}</td>
                                   <td>{{ $carburant->Kilometrage }}</td>
                                   <td>{{ $carburant->Quantite }}</td>
                                   <td>{{ $carburant->Prix }}</td>
                                   <td>{{ $carburant->vehicule->Matricule }}</td>
                                   <td class="d-flex justify-content-center align-items-center">
                                      
                                       <a href="{{ route('carburants.show' , $carburant->id) }}" 
                                          class="btn btn-sm btn-primary">
                                          <i class="fas fa-eye"></i>
                                       </a>
                                       
                                       <a href="{{ route('carburants.edit' , $carburant->id) }}" 
                                          class="btn btn-sm btn-warning mx-2">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <form  id="{{ $carburant->id }}" action="{{ route('carburants.destroy' , $carburant->id) }}" method="post">
                           
                                           @csrf
                                           @method('DELETE')
                                       </form>
                                           <button  onclick="deleteEmp({{ $carburant->id }})"
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
          timer: 3000
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