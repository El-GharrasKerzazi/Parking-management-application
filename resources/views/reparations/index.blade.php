@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title')
    Page | Reparation
@endsection
@section('content_header')
<a class="btn btn-outline-success" href="{{ url('admin/home') }}" role="button">Dashboard</a>
@endsection
@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-12 mx-auto">
          <div class="row my-5">
               <div class="col-md-6 mx-auto">
                @include('layouts.alert')
               </div>
          </div>
          <div class="card my-3">
            <div class="card-header">
               <div class="text-center font-weight-bold text-uppercase">

                  <h4>Reparation</h4>


                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive-md col-md-12">
                    <table id="myTable" class="table table-bordered table-hover table-striped table-success table-responsive-lg">
                        <thead>
                           <tr>
                               <th>ID</th>
                               <th>Numéro_Reparation</th>
                               <th>Date_Reparation</th>
                               <th>Matricule</th>
                               <th>Cin</th>
                               <th>Action</th>
                               
                       
                               
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($reparations as $key => $reparation)
                           <tr>
                               <td>{{ $key+=1 }}</td>
                               <td>{{ $reparation->numero_reparation }}</td>
                               <td>{{ $reparation->date_reparation }}</td>
                               <td>{{ $reparation->vehicule->matricule }}</td>
                               <td>{{ $reparation->fonctionnaire->cin }}</td>
                               <td class="d-flex justify-content-center align-items-center">
                                  
                                   <a href="{{ route('reparations.show' , $reparation->id) }}" 
                                      class="btn btn-sm btn-primary">
                                      <i class="fas fa-eye"></i>
                                   </a>
                                   
                                   <a href="{{ route('reparations.edit' , $reparation->id) }}" 
                                      class="btn btn-sm btn-warning mx-2">
                                      <i class="fas fa-edit"></i>
                                   </a>
                                   <form  id="{{ $reparation->id }}" action="{{ route('reparations.destroy' , $reparation->id) }}" method="post">
                       
                                       @csrf
                                       @method('DELETE')
                                   </form>
                                       <button  onclick="deleteEmp({{ $reparation->id }})"
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
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
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